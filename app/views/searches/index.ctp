<?php

$phoogle->addAddress("1631 NW Thurman St, Portland OR, 97209", "CMD");
$phoogle->addGeoPoint("-122.692", "45.5252", "Jon Austin");
foreach($items as $i => $item) {
    $item = $item['Item'];
    $phoogle->addGeoPoint($item['lat'], $item['lon'], "<div style='margin-right: 6px; font-size: 11pt; font-weight: bold; width:260px'>" .
                                                "<a href='http://portland.craigslist.com" . $item['url'] . "'>$" . $item['price'] . " - " . $item['bedrooms'] . "br - " . $item['name'] . "</a>" . 
                                                "</div>" .
                                                "<br>" . 
                                                $item['address'] .
                                                "<br>" . 
                                                "<a href=" . $item['googlemap'] . "> googlemaps</a>"
                                            );
}
$phoogle->showMap();
?>
