<?php

require_once('vendor/autoload.php');

use Goutte\Client;

include('mage-list.php');

$last_position = 'flag-2.txt';
if(file_exists($last_position)) {
	$lastClient = file_get_contents($last_position);
	$index = array_search($lastClient, $batch2);
	if($index !== false) {
		$batch2 = array_slice($batch2, $index);
	}
}

$file = "mage-batch-2.csv";
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
foreach($batch2 as $link) {

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

