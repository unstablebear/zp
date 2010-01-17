#!/bin/sh
cp ./zagran_pasport.php /var/www/engine/modules
cp ./zagran_pasport.tpl /var/www/templates/Default

rm -rf /var/www/engine/modules/tcpdf
cp -a ./tcpdf /var/www/engine/modules

rm -rf /var/www/engine/modules/pdf_forms
cp -a ./pdf_forms /var/www/engine/modules
#cp ./jquery-1.3.2.min.js /var/www/engine
#cp ./jquery.datePicker-2.1.2.js /var/www/engine
rm -rf /var/www/engine/js
cp -R ./js /var/www/engine

rm -rf /var/www/uploads/forms_images
mkdir /var/www/uploads/forms_images
chmod a+rwx /var/www/uploads/forms_images
#service apache2 restart