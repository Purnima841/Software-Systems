#!/usr/bin/php
<?php

foreach($argv as $value)
{
	echo "$value\t";
}
$x=$argv[1];
$y=$argv[2];
echo "\nx = $x\t";
echo "\ny = $y\n";

$xl= count($x);
$yl = count($y);

for($i=1;$i< $a;$a++)
{
	if(!ctype_alpha($argv[$i]))
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

$c = substr_count($x,$y);
$a = count($y);
$b = $a + 1;
$repeat = str_repeat(".",$b);
echo "\n";
echo "number of times sub-string repeated: $c\n";
for($i = 1; $i <= $c; $i++)
{
$pos = strpos($x,$y);
echo "positions at which the sub-string repeated is:";
echo "$pos\n";
$x = substr_replace($x,$repeat,$pos,$b);
}
?>
