#!/usr/bin/php
<?php
$c = count($argv);
for($i = 1; $i < $c; $i++)
	{
	if(!ctype_alpha($argv[$i]))
		{
		echo "Error:\n [$i] $argv[$i]\n";
 		echo "Ending Script";
		die();

		}
	}

$r = $argv[0];
$str = implode(" ",$argv);
$str = strtolower($str);
$str = ltrim($str,$r);
for($i = 0; $i < $c; $i++)
{
	$argv[$i] = strtolower($argv[$i]);
}
sort($argv);

$sort = count_chars($str,3);
$a = strlen($sort);
$n = 0;
for($i = 0; $i < $c; $i++)
{
	for($j = $i - 1; $j >= 0; $j--)
	{
	if($argv[$i] == $argv[$j])
	{	
		$n++;
		break;	
	}
	}
	if($n == 0)
	{
		$counter = substr_count($str, $argv[$i]);
		if($counter > 0)
		{
		echo "number of times $argv[$i] repeated:  $counter\n";
		}
	}
	$n = 0;
}
?>
