<?php

require_once('vendor/autoload.php');

use Goutte\Client;

include('mage-list.php');
$source = $batch1;
$index = 1;

$last_position = "flag-{$index}.txt";
if(file_exists($last_position)) {
	$lastClient = file_get_contents($last_position);
	$index = array_search($lastClient, $source);
	if($index !== false) {
		$source = array_slice($source, $index);
	}
}

$file = "mage-batch-{$index}.csv";
if(file_exists($file)) {
	$fp = fopen($file, 'a');

} else {
	$fp = fopen($file, 'w');
	$csvHeader = array(
		'Site Url',
		'Global Rank',
		'Country Rank',
		'Category Rank',
		'Country S'
	);
	fputcsv($fp, $csvHeader, ';','"');
}


$client = new Client();
foreach($source as $link) {

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
	file_put_contents($last_position, $link);
}

fclose($fp);

