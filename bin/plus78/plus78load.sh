#!/bin/sh
/usr/bin/php /var/www/symfony-app/bin/plus78/plus78load.php
f="/var/www/symfony-app/bin/plus78/SiteData.sql"
if [[ -f $f ]]; then
    mysql -u user_mp -pTsIq4a0UwyE5ncFyQX -D myproject < $f
fi
