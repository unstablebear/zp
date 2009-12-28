#!/bin/sh
cp ./zagran_pasport.php /var/www/engine/modules
cp ./zagran_pasport.tpl /var/www/templates/Default
cp -a ./tcpdf /var/www/engine/modules
cp -a ./pdf_forms /var/www/engine/modules
#cp ./jquery-1.3.2.min.js /var/www/engine
#cp ./jquery.datePicker-2.1.2.js /var/www/engine
cp -R ./jquery /var/www/engine
#service apache2 restart