<?php

for($i = 1; $i <= 10; $i++ ){
    $index = $i;
    $output = "[program:scrapper{$index}]
command=php -f /home/cornel_bratu/scrapper/app.php {$index}
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper{$index}-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)";

    echo $output;
    echo "\n\r";
}