#NOTE: enable disk/memory caching in firefox about:config

from selenium import selenium
from BeautifulSoup import BeautifulSoup
import unittest, time, re, os, urllib, shutil,time

BASE_LINK = "http://portland.craigslist.com/apa/"
BASE_PATH = "/home/jon/documents/code/python/craigslist/"
DOWNLOAD_BASE_PATH = "/home/jon/documents/code/python/craigslist/"
FILE = "/home/jon/code/selenium/eserviceinfo/files.csv"

DEBUG=0

cur_path = BASE_PATH
cur_link = BASE_LINK

initial_dl = 0

count = 0 # track how many we've downloaded and restart when limit reached
COUNT_LIMIT = 40

proxy = {'http':'http://localhost:8118'}
urlopener = urllib.FancyURLopener(proxy)

class NewTest(unittest.TestCase):
    def setUp(self):
        self.cur_path = cur_path
        self.initial_dl = initial_dl
        #self.log_file = open(FILE, "w")
        #self.log_file.close()
        self.verificationErrors = []
        self.selenium = selenium("localhost", 4444, "*custom /usr/bin/firefox -P /home/jon/.mozilla/firefox/eserviceinfo", cur_link)
        self.selenium.start()
    
    def test_init(self):
        sel = self.selenium
        sel.set_timeout(999999)
        sel.open(cur_link + "/browse.php")
        #sel.open(cur_link + "/equipment_mfg/1_32.html")
        #sel.open(cur_link + "/equipment_mfg/aiwa_32.html")

        self.drill_down()

    #    def store_html_source() in db

    # UTILITY FUNCTIONS
    def mkdir(self, path):
        if not os.path.exists(path):
            os.mkdir(path)
        else: print "!!!could not make " + path

    
    def findLinks(self, html_source, searches=[]):
        # grab out all equipment_type/mfg links and put it list
        #FIXME - make more general, by making searches a dict and  add start and end tags (i.e. ",<,>,etc) to searches -- so searches={'search':['start','end']}
        """ hell, on second thought, scrap this and use html parser """

        links = {}

        for search in searches:
            links[search] = []
            num_links = html_source.count( search )

            # get links
            start = 0
            for link in range(num_links):
                link_dict = {}
                # get link relative
                start     = html_source.find(search, start)
                end     = html_source.find('"', start)
                link_dict['relative'] = html_source[start:end]
                start = end
                # get link text
                start = html_source.find('<span', start)
                start = html_source.find('>', start)+1
                end   = html_source.find('<', start)
                link_dict['text'] = html_source[start:end]

                # insert the link_dict
                links[search].append( link_dict )
                start = end

            if DEBUG:
                print "LINKS"
                for search in links:
                    print search.capitalize() + " LINKS"
                    for link in links[search]:
                        print link

        return links


    def drill_down(self, click_link='', category=''):
        sel = self.selenium
        # set cur_path
            # make sure this isn't the initial run
                # note don't do this the first time we drill down (will remove base path last dir)
        if click_link != '' and category != '':
            # create new category dir and update cur_path
            new_cur_path = self.cur_path + '/' + category
            self.mkdir(new_cur_path)
            self.cur_path = new_cur_path
        print self.cur_path

        if click_link != '':
            print "sel.click(\"//a[@href="+click_link+"]\")"
            click_link_unescape = urllib.unquote(click_link)
            sel.click('//a[@href="'+click_link_unescape+'"]')
            sel.wait_for_page_to_load(999999)

        #print sel.get_location()
        html_source = sel.get_html_source()

        # get equipment_*.html links for drilling down
        links = self.findLinks( html_source, \
                        ["/equipment_type", "/equipment_mfg", "/downloadsm"])

        eq_type_links = links['/equipment_type']
        eq_mfg_links = links['/equipment_mfg']
        downloadsm_links = links['/downloadsm']

        # loop thru links and drill down
        print "NUM_LINKS = " +str(len(eq_type_links+eq_mfg_links))+"\n"
        for link in eq_type_links + eq_mfg_links + downloadsm_links:
            relative = link['relative']
            text     = link['text']
            print "'"+ relative + " - " + text +"'\n"
            # create corresponding folder in the hierarchy

            if relative.find('downloads') == -1:
                if relative:
                    print "ABOUT TO DRILL into"+ relative + " - " + text
                    self.drill_down(relative, text)
            else:
                # get download
                self.getAtomic(relative)

        self.cur_path = self.cur_path.rsplit('/', 1)[0]
        sel.go_back()
        sel.wait_for_page_to_load(999999)
        return
            
    def getAtomic(self, link):
        s = self.selenium
        print "ATOMIC = " +link
        print BASE_LINK+link
        try:
            print "in try select_window"
            s.select_window(2)
            s.open(BASE_LINK+link)
        except:
            print "try failed in open_window"
            s.open_window(BASE_LINK+link, 2)
            s.select_window(2)
        # unescape url entities (automatically escape with get_html_source)
        #link = urllib.unquote(link)
        #s.click("//a[@href='"+ link +"']")
        try:
            s.wait_for_page_to_load(15000)
        except:
            s.wait_for_page_to_load(30000)

        source = s.get_html_source()
        # check if multipart and process
        if source.find("No multipart") != -1:
            s.click("link=To download*")
            try:
                s.wait_for_page_to_load(15000)
            except:
                print "exception"

            while len(os.listdir(DOWNLOAD_BASE_PATH)) == 0:
                print "download failed so try again"
                s.click("link=To download*")
                try:
                    s.wait_for_page_to_load(30000)
                except:
                    print "exception"

            # do initial download
            while len(os.listdir(DOWNLOAD_BASE_PATH)) > 1:
                print "sleeping..."
                time.sleep(10)
            try:
                file_name = os.listdir(DOWNLOAD_BASE_PATH)[0]
            except:
                while len(os.listdir(DOWNLOAD_BASE_PATH)) > 1:
                    print "sleeping..."
                    time.sleep(10)
            file_name = os.listdir(DOWNLOAD_BASE_PATH)[0]

            #do md5sum -- if unequal download again
            start = source.find("MD5 Checksum:")+len("MD5 Checksum:")
            start = start + len("</td><td class='blacktext'>")
            end = source.find("<", start)
            orig_md5 = source[start:end]
            file_md5 = ''

            while orig_md5 != file_md5:
                file_md5 = os.popen('md5sum "' + DOWNLOAD_BASE_PATH + "/" + file_name+'"').read().split(' ')[0]
                print orig_md5 + " == " + file_md5
                if orig_md5 != file_md5:
                    print "md5 mismatch, delete and re-download"
                    os.remove(DOWNLOAD_BASE_PATH + "/" + file_name)

                    while len(os.listdir(DOWNLOAD_BASE_PATH)) == 0:
                        print "download failed so try again"
                        s.click("link=To download*")
                        try:
                            s.wait_for_page_to_load(15000)
                        except:
                            print "exception"

                    # do initial download
                    while len(os.listdir(DOWNLOAD_BASE_PATH)) > 1:
                        print "sleeping..."
                        time.sleep(10)
                    try:
                        file_name = os.listdir(DOWNLOAD_BASE_PATH)[0]
                    except:
                        while len(os.listdir(DOWNLOAD_BASE_PATH)) > 1:
                            print "sleeping..."
                            time.sleep(10)
                file_name = os.listdir(DOWNLOAD_BASE_PATH)[0]

            if DEBUG:
                print "shutil.move(" + DOWNLOAD_BASE_PATH + '/' + file_name \
                                    + ', ' + self.cur_path +")"

            print "shutil.move(" + DOWNLOAD_BASE_PATH + '/' + file_name \
                                    + ', ' + self.cur_path +")"
            
            log_file = open(FILE, 'a')
            log_file.write('"'+link+'",'+'"'+self.cur_path+'/'+file_name+'"'+"\n")
            log_file.close()
          
            shutil.move(DOWNLOAD_BASE_PATH + '/' + file_name, self.cur_path + '/')
            #sel.go_back()
            #sel.wait_for_page_to_load(999999)
        else:
            # find and store the multipart links
            soup = BeautifulSoup(source)
            soup_links = soup('a')
            dl_links = []
            for link in soup_links:
                if link['href'].find('download.php') != -1:
                    dl_links.append(link)
            # remove last link which is repeat of first link
            dl_links = dl_links[:-1]
            print dl_links
            for dl in dl_links:
                print dl['href']

                try:
                    s.click("//a[@href='"+dl['href']+"']")
                    print "clicked"
                    s.wait_for_page_to_load(60000)
                    print "after wait for page"
                except:
                    print "exception"

                print os.listdir(DOWNLOAD_BASE_PATH)

                while len(os.listdir(DOWNLOAD_BASE_PATH)) > 1:
                    print "sleeping..."
                    time.sleep(10)
                
                try:
                    file_name = os.listdir(DOWNLOAD_BASE_PATH)[0]
                except:
                    s.click("link=To download*")
                    print "failed - clicked the to download link"

                try:
                    s.wait_for_page_to_load(60000)
                    print "after wait for page"
                except:
                    print "exception"
                
                while len(os.listdir(DOWNLOAD_BASE_PATH)) == 0:
                    print "download failed so try again"
                    s.click("link=To download*")
                    try:
                        s.wait_for_page_to_load(15000)
                    except:
                        print "exception"

                print os.listdir(DOWNLOAD_BASE_PATH)

                while len(os.listdir(DOWNLOAD_BASE_PATH)) > 1:
                    print "sleeping..."
                    time.sleep(10)
                
                file_name = os.listdir(DOWNLOAD_BASE_PATH)[0]

                """
                #do md5sum -- if unequal download again
                dl_source = s.get_html_source()
                start = dl_source.find("MD5 Checksum:")+len("MD5 Checksum:")
                start = start + len("</td><td class='blacktext'>")
                end = dl_source.find("<", start)
                orig_md5 = dl_source[start:end]
                file_md5 = ''

                while orig_md5 != file_md5:
                    file_md5 = os.popen('md5sum "' + DOWNLOAD_BASE_PATH + "/" + file_name+'"').read().split(' ')[0]
                    
                    print orig_md5 + " == " + file_md5
                  
                    if orig_md5 != file_md5:
                        print "md5 mismatch, delete and re-download"
                        os.remove(DOWNLOAD_BASE_PATH + "/" + file_name)

                        while len(os.listdir(DOWNLOAD_BASE_PATH)) == 0:
                            print "download failed so try again"
                            s.click("link=To download*")
                            try:
                                s.wait_for_page_to_load(15000)
                            except:
                                print "exception"

                        # do initial download
                        while len(os.listdir(DOWNLOAD_BASE_PATH)) > 1:
                            print "sleeping..."
                            time.sleep(10)
                        try:
                            file_name = os.listdir(DOWNLOAD_BASE_PATH)[0]
                        except:
                            while len(os.listdir(DOWNLOAD_BASE_PATH)) > 1:
                                print "sleeping..."
                                time.sleep(10)
                    file_name = os.listdir(DOWNLOAD_BASE_PATH)[0]
                """
                log_file = open(FILE, 'a')
                log_file.write('"'+dl['href']+'",'+'"'+self.cur_path+'/'+file_name+'"'+"\n")
                log_file.close()

                print "shutil.move(" + DOWNLOAD_BASE_PATH + '/' + file_name + ', ' + self.cur_path +"/)"

                
                shutil.move(DOWNLOAD_BASE_PATH + '/' + file_name, self.cur_path + '/')
        
        s.select_window('')
        return

    def tearDown(self):
        self.selenium.stop()
        self.assertEqual([], self.verificationErrors)

if __name__ == "__main__":
    unittest.main()
