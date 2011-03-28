<?php
class SearchesController extends AppController {

	var $name = 'Searches';
    var $uses = array('Search', 'Item', 'ItemType', 'Location');
    var $components = array('GeoCoder');
    var $helpers = array('Phoogle'); 
	#var $scaffold;

    function index() {
        $this->set('googleApiKey',API_KEY);
        if (!empty($this->data)) {
            


            /* ============== DO SEARCH ===================== */

            # open craigslist search url: "http://portland.craigslist.org/search/apa/mlt?query=%s&minAsk=min&maxAsk=max&bedrooms=2&addTwo=purrr"
            
            #print_r($this->data);
            // set nice variable names -- i.e. $query isntead of $this->data['Search']['query']
            foreach ($this->data['Search'] as $key => $val) {
                # empty out false checkboxes
                if ($val == '0') {
                    $val = '';
                } elseif ($val == '1') {
                    switch ($key) {
                        case "addTwo":
                            $val = "purrr";
                            break;
                        case "addThree":
                            $val = "wooof";
                            break;
                        case "srchType":
                            $val = "T";
                            break;
                    }
                }

                $exp = "$".$key." = '".$val."';";
                eval($exp);
            }
            $catAbbreviation = "apa";
            $this->data['Search']['url'] = $url = "http://portland.craigslist.org/search/" . $catAbbreviation . "/" .
                $county.
                "?query=".$query.
                "&minAsk=".$minAsk.
                "&maxAsk=".$maxAsk.
                "&bedrooms=".$bedrooms.
                "&addTwo=".$addTwo.
                "&addThree=".$addThree.
                "&srchType=".$srchType;
            $html = file_get_contents($url);
            #echo $url;

            #echo $html;

            # check if this search has already been retrieved
            if(!($search = $this->Search->find($this->data['Search']))) {
                $this->Search->save($this->data);
                $this->update_searches($this->Search->id);
            } else {
                $this->Search->id = $search['Search']['id'];
            }


            /* Show map */
            $here = $this->Item->geocode("1975 NW Everett St, Portland OR");
            $items = $this->Item->findAllByDistance($here, 10);
            $new_items = array();
            foreach ($items as $i => $item) {
                if ($item['Item']['bedrooms'] >= $this->data['Search']['bedrooms']) 
                    $new_items[] = $item;
            }

            $this->set('items', $new_items);


        }
    }

    function maptest() {
        /* Show map */
        #$here = $this->Item->geocode("1975 NW Everett St, Portland OR");
        $here = array( 'lon' => "-122.692", 'lat' => "45.5252");
        #print_r($here);die;
        $items = $this->Item->findAllByDistance($here, 5);
        $this->set('items', $items);
    }

    /* clean up expired items */
    function cleanitems() {
        $cl_items = array();
        $searches = $this->Search->find('all');
        foreach ($searches as $i => $search) {
            $id = $search['Search']['id'];
            $cl_items[$id] = array();
            $url = $this->Search->field('url', 'Search.id='.$id);
            $items = $this->Search->find('id='.$id);# . $this->Search->id);
            $html = file_get_contents($url);
            $s = 1;
            $next_page = true;

            while ($next_page) {
                # put all item urls in an array for easy comparison
                
                # ungreedy matching /U
                preg_match_all("/<p>.*<\/p>/U", $html, $items);
                
                foreach ($items[0] as $i => $val) {
                    # get url
                    preg_match('/<a\shref="([^"]*)/', $val, $matches);
                    $cl_items[$id][ $matches[1] ] = 'true';
                }

                # follow next page link if it exists
                preg_match('#<b>Next&gt;&gt;</b></a>#', $html, $matches);
                if (!empty($matches)) {
                    $html = file_get_contents($url . "&s=".$s."00");
                    $next_page = true;
                    $s += 1;
                } else 
                    $next_page = false;
            }
        }
        #print_r($cl_items);
        /* Remove expired items */
        # probably better to just go through items, but eh.. 
        foreach ($searches as $i => $search) {
            $search_id = $search['Search']['id'];
            foreach ($search['Item'] as $i => $item) {
                $url = $item['url'];
                if (!array_key_exists($url, $cl_items[$search_id])) {
                    $item_id = $item['id'];
                    $this->Item->del($item_id);
                    echo $item_id . " - " . $url . "<br>\n";
                }

            }
        }
    }

    function update_searches($search_id=0) {
        ini_set('max_execution_time', 10000);
        $catAbbreviation = "apa";
        if ($search_id == 0)
            $searches = $this->Search->find('all');
        else 
            $searches = $this->Search->find('Search.id='.$search_id);
        foreach ($searches as $i => $search) {
            $this->Search->id = $id = $search['Search']['id'];
            $url = $search['Search']['url'];
            $html = file_get_contents($url);

            $s=1;
            $next_page = true;
            $cl_item_urls = array();
            while ($next_page === true) {
                /*  grab each item */
                # get date posted
                $items = array();
                # ungreedy matching /U
                preg_match_all("/<p>.*<\/p>/U", $html, $items);
                
                foreach ($items[0] as $i => $val) {
                    $item = array();
                    $item_find = array();
                    # get date
                    preg_match("/<p>\s*([^-]*)\s/", $val, $matches);
                    $date_posted = date('Y-m-d', strtotime(trim($matches[1])));
                    $item_find['Item.date_posted'] = $item['Item']['date_posted'] = $date_posted;

                    # get url
                    preg_match('/<a\shref="([^"]*)/', $val, $matches);
                    $item_find['Item.url'] = $item['Item']['url'] = $matches[1];
                    $cl_item_urls[ $matches[1] ] = true;
                    $item_url = "http://portland.craigslist.org/".$item['Item']['url'];

                    # get price
                    preg_match('/html">\$(\d+)/', $val, $matches);
                    $item_find['Item.price'] = $item['Item']['price'] = $matches[1];

                    # get name
                    switch($catAbbreviation) {
                        case "apa":
                            $item['Item']['item_type_id'] = $this->ItemType->field('id', "value='apa'");
                            #get name
                            preg_match('/html">\$\d+[^\/]*\/\s(\dbr)\s-\s([^<]*)/', $val, $matches);
                            $bedrooms = trim($matches[1], 'br');
                            $item_find['Item.bedrooms'] = $item['Item']['bedrooms'] = $bedrooms;
                            $item_find['Item.name'] = $item['Item']['name'] = str_replace('"', '', trim($matches[2], '- '));

                            #get name_loc
                            preg_match('/<font.size="[\-]1">\s\((.*)\)/', $val, $matches);
                            $item_find['Item.name_loc'] = $item['Item']['name_loc'] = $matches[1];

                            #hasPic?
                            preg_match('/<span.class="p">\simg<\/span>/', $val, $matches);
                            if (!empty($matches)) {
                                $item_find['Item.hasPic'] = $item['Item']['hasPic'] = '1';
                            }
                            break;
                    }

                    $oldItem = $this->Item->find("Item.url='". $item['Item']['url'] . "'");
                    if (!$oldItem) {
                        #print_r($item);
                        # new item
                        // save related stuff
                        if ($this->Search->id) {
                            $item['Search']['id'] = $this->Search->id;
                        }

                        /* Deal with Item pages */
                        $item['html'] = $item['Item']['html'] = file_get_contents($item_url);
                        #$item['User'] = $this->Session->read('userid');
                        
                        # get google map
                            preg_match('#http://maps.google.com[^"]*#', $item['Item']['html'], $matches);
                        if (!empty($matches)) {
                            # parse googlemap url
                            $item['Item']['googlemap'] = $matches[0];
                        }
                        preg_match("#http://maps.google.com/\?q=loc%3A+(.*)#", $item['Item']['googlemap'], $matches);
                        if (empty($matches)) {
                            preg_match("#http://maps.google.com/maps\?q=(.*)#", $item['Item']['googlemap'], $matches);
                        }

                        $item['Item']['address'] = trim(str_replace("+", " ", $matches[1]));

                        $latlong = $this->GeoCoder->getLatLng($item['Item']['address']);
                        $item['Item']['lat'] = $latlong['lat'];
                        $item['Item']['lon'] = $latlong['lng'];
                        $this->Location->geocode($item['Item']['address']);

                        $this->Item->save($item);
                        $this->Item->id = '';
                    } else {
                        # old item
                            # REMOVE
                            $this->Item->id = $oldItem['Item']['id'];
                            $this->Item->save($item);
                        $item = $oldItem;

                        # re-fetch item info if modified is > MAX_WAIT min old
                        $last_valid_update = strtotime('-'. MAX_WAIT . ' min');
                        $item_last_update = strtotime( $oldItem['Item']['updated'] );
                        if (($item_last_update - $last_valid_update) >= ( MAX_WAIT * 60 ) ) {
                            # data is stale so update
                            $item['html'] = $item['Item']['html'] = file_get_contents($item_url);

                            # Deal with Item pages
                                preg_match('#http://maps.google.com[^"]*#', $item['Item']['html'], $matches);
                            if (!empty($matches)) {
                                # parse googlemap url
                                $item['Item']['googlemap'] = $matches[0];
                            }
                            preg_match("#http://maps.google.com/\?q=loc%3A+(.*)#", $item['Item']['googlemap'], $matches);
                            if (empty($matches)) {
                                preg_match("#http://maps.google.com/maps\?q=(.*)#", $item['Item']['googlemap'], $matches);
                            }
                            $item['Item']['address'] = trim(str_replace("+", " ", $matches[1]));
                            $latlong = $this->GeoCoder->getLatLng($item['Item']['address']);
                            $item['Item']['lat'] = $latlong['lat'];
                            $item['Item']['lon'] = $latlong['lng'];
                            
                            $this->Item->save($item);
                        }
                    }
                }


                # follow next page link if it exists
                preg_match('#<b>Next&gt;&gt;</b></a>#', $html, $matches);
                if (!empty($matches)) {
                    $html = file_get_contents($url . "&s=".$s."00");
                    $next_page = true;
                    $s += 1;
                } else 
                    $next_page = false;
                
            }

            /* Remove stale items from DB */
            $search = $this->Search->find('id=' . $this->Search->id);
            foreach ($search['Item'] as $i => $item) {
                $url = $item['url'];
                if (!array_key_exists($url, $cl_item_urls)) {
                    $item_id = $item['id'];
                    $this->Item->del($item_id);
                    echo $item_id . " - " . $url . "<br>\n";
                }

            }
        }
    }


}
?>
