<?php
$handle = fopen("domainlist.txt", "r");
if ($handle) {
    file_put_contents("domain_list_as_php_array.php", "<?php
    \$domains = [
    ");
    $count = 0;
    while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        $line = trim($line, "'");
        if(strlen($line) <= 2) {
            continue;
        }
        file_put_contents("domain_list_as_php_array.php", "'{$line}',\n", FILE_APPEND);
//        if($count++ > 10) {
//            break;
//        }
    }
    file_put_contents("domain_list_as_php_array.php", "''];", FILE_APPEND);
    fclose($handle);
} else {
    // error opening the file.
}