[program:scrapper1]
command=php -f /home/cornel_bratu/scrapper/app.php 1
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper1-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
[program:scrapper2]
command=php -f /home/cornel_bratu/scrapper/app.php 2
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper2-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
[program:scrapper3]
command=php -f /home/cornel_bratu/scrapper/app.php 3
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper3-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
[program:scrapper4]
command=php -f /home/cornel_bratu/scrapper/app.php 4
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper4-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
[program:scrapper5]
command=php -f /home/cornel_bratu/scrapper/app.php 5
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper5-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
[program:scrapper6]
command=php -f /home/cornel_bratu/scrapper/app.php 6
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper6-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
[program:scrapper7]
command=php -f /home/cornel_bratu/scrapper/app.php 7
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper7-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
[program:scrapper8]
command=php -f /home/cornel_bratu/scrapper/app.php 8
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper8-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
[program:scrapper9]
command=php -f /home/cornel_bratu/scrapper/app.php 9
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper9-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
[program:scrapper10]
command=php -f /home/cornel_bratu/scrapper/app.php 10
directory=/home/cornel_bratu/scrapper
log_stdout=true
log_stderr=true
logfile=/var/log/supervisor/scrapper10-log.log
user=root
autostart=true              ; start at supervisord start (default: true)
autorestart=true            ; retstart at unexpected quit (default: true)
logfile_maxbytes=1MB        ; max # logfile bytes b4 rotation (default 50MB)
logfile_backups=10          ; # of logfile backups (default 10)
