<?php

require_once('vendor/autoload.php');

use Goutte\Client;

include('mage-list.php');

$file = "mage-batch-1.csv";

$fp = fopen($file, 'w');

$csvHeader = array(
	'Site Url',
	'Global Rank',
	'Country Rank',
	'Category Rank',
	'Country S'
);

	$client = new Client();

fputcsv($fp, $csvHeader, ';','"');

foreach($batch1 as $link) {

	$url = 'https://www.similarweb.com/website/'. $link;

	$crawl = $client->request('GET', $url);
        
if(
    $crawl->filter('.rankingItem-value')->count() > 0 &&
    $crawl->filter('.rankingItem-subTitle')->count() > 0
) {
    	fputcsv($fp, array(
		$link,
		$crawl->filter('.rankingItem-value')->first()->text(),
		$crawl->filter('.rankingItem-value')->eq(1)->text(),
		$crawl->filter('.rankingItem-value')->last()->text(),
		$crawl->filter('.rankingItem-subTitle')->eq(1)->text(),
	),';','"');

} else {
        fputcsv($fp, array(
		$link,
		"no-data",
		"no-data",
		"no-data",
		"no-data",
	),';','"');
}

}

fclose($fp);

