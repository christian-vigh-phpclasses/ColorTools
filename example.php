<?php
	/******************************************************************************************

		This example shows the conversion some color values into different colorimetric
		models.

	 ******************************************************************************************/

	require_once ( 'Colors.phpclass' ) ;

	if  ( php_sapi_name ( )  !=  'cli' )
		echo "<pre>" ;

	$test_colors		=  array
	   (
		'#A0A0A0',
		'#FFF',
		'RGB(1,2,3)',
		'Graphite',
		'#0000FF'
	    ) ;


	foreach  ( $test_colors  as  $test_color )
	   {
		echo "Color to test : $test_color\n" ;
		$color	=  new Color ( $test_color ) ;
		echo "Color value in different colorimetric models :" ;
		echo "\t" . str_replace ( "\n", "\n\t", print_r ( $color -> ToArray ( ), true ) ) . "\n" ;
	    }