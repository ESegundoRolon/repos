<?php

// vector bucle for
$vector = array();
for ($i = 0 ; $i<5 ; $i++)
{
	//o usar array_push($vector,$i);
	$vector[$i]=$i+1;
}
var_dump($vector);

// vector bucle while
$vector2 = array();
$i=0;
while($i<5)
{
	$vector2[$i] = $i+1;
	$i++;
}
var_dump($vector2);

// vector bucle for inverso
$vector3 = array();
for ($i = 5 ; $i>0 ; $i--)
{
	//o usar array_push
	$vector3[$i]=$i;
}
var_dump($vector3);

// vector bucle while inverso
$vector4 = array();
$i=5;
while($i>0)
{
	$vector4[$i] = $i;
	$i--;
}
var_dump($vector4);
?>