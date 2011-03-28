from BeautifulSoup import BeautifulSoup
from urllib import urlopen
import MySQLdb

conn = MySQLdb.connect (host = "localhost",
                        user = "root",
                        passwd = "1984",
                        db     = "craigslist")              

cursor = conn.cursor()

"""Go through all the searches and if they haven't been updated for X minutes - add to update queue
1. Update Searches
"""

"""
1a. Run search on CL
    * Delete any items that exist from the same previous search and are not in this current search
    * Add all results (that don't already exist) to this search's items and this user's items
"""


class Craigslist:

    def __init__(self):
        html="\n".join( urlopen( 'http://portland.craigslist.com' ).readlines())

        #starturl = "http://portland.craigslist.org/search/apa/mlt?query=%s&minAsk=%s&maxAsk=%s&bedrooms=%s&addTwo=%s"

    def __getSearches(self):


    def __getUsers(self):

    



if __name__ == "__main__":
    cl = Craigslist()

