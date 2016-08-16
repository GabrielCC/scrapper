<?php

require_once('vendor/autoload.php');

use Goutte\Client;

include('domain_list_as_php_array.php');
$batch_size = 20000;

$index = 1;
if(isset($argv[1])) {
	$index = $argv[1];
};

$index = $index - 1;
$source = array_slice($domains, $batch_size * $index, $batch_size);

$last_position = "flags/flag-{$index}.txt";
if(file_exists($last_position)) {
	$lastClient = file_get_contents($last_position);
	$index = array_search($lastClient, $source);
	if($index !== false) {
		$source = array_slice($source, $index);
	}
}

$file = "output/mage-batch-{$index}.csv";
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
    $time = microtime(true);

	$url = 'https://www.similarweb.com/website/'. $link;

	$crawl = $client->request('GET', $url);
        
	if(
		$crawl->filter('.rankingItem-value')->count() > 0 &&
		$crawl->filter('.rankingItem-subTitle')->count() > 0
	) {
        write($fp, array(
			$link,
			$crawl->filter('.rankingItem-value')->first()->text(),
			$crawl->filter('.rankingItem-value')->eq(1)->text(),
			$crawl->filter('.rankingItem-value')->last()->text(),
			$crawl->filter('.rankingItem-subTitle')->eq(1)->text(),
		));

	} else {
			write($fp, array(
			$link,
			"no-data",
			"no-data",
			"no-data",
			"no-data",
		));
	}
	file_put_contents($last_position, $link);
    $elapsed_time = microtime(true) - $time;
    var_dump($elapsed_time);
}

fclose($fp);


function write($fp, $array) {
    $tries = 0;
    do {
        $status = fputcsv($fp, $array, ';', '"');
    }while($status === false && $tries++ <= 5);
    if($status === false) {
        throw new Exception('error writing to file');
    }
}

