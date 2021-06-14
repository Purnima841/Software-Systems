#!/usr/bin/php
<?php

// loop through each element in the $argv array
echo "\narray before sorting\n";
foreach($argv as $value)
{
  echo "$value\t";
}

$length = count($argv); 

echo "\nfind k-th smallest number among the input you have given. here k is arg[1]--->";
echo $argv[1]; 

sort($argv);
echo "\nafter sorting the array\n";
for ($i=0 ; $i < $length-1 ; $i++)
{
  	echo "$argv[$i]\t";
	if (ctype_alpha($argv[$i]))
	{
	echo "<b>Error:</b> [$i] $argv<br>";
  echo "Ending Script";
  die();
	set_error_handler("customError",E_USER_ERROR);
// set_error_handler("customError",E_USER_WARNING);

//trigger error
$test=2;
if ($test>=1) {
  //trigger_error("Value must be 1 or below",E_USER_WARNING);
  trigger_error("Value must be an integer",E_USER_ERROR);

	}
	}
}
	
		$k = $argv[0];
		echo "\n k-th smallest element in the sorted array is-";
	$l=$k-1;	
	echo "$argv[$l]";
	

?>

