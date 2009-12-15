<?php
if( ! defined( 'DATALIFEENGINE' ) ) {
	die( "Hacking attempt!" );
}
$tpl->load_template( 'zagran_pasport.tpl' );
$tpl->copy_template = "<form>" . $tpl->copy_template . "</form>";

$tpl->compile( 'content' );

?>
