#!/bin/sh
cp ./zagran_pasport.php /var/www/engine/modules
cp ./zagran_pasport.tpl /var/www/templates/Default
cp -a ./tcpdf /var/www/engine/modules

#service apache2 restart