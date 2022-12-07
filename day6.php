<?php

$input = trim(file_get_contents('day6.txt'));

$portion = substr($input, 0, 4);
$array = str_split($portion);
$portion2 = substr($input, 0, 14);
$array2= str_split($portion2);
$whole_array = str_split(substr($input, 4));
$whole_array2 = str_split(substr($input, 14));
$marker = 4;
$marker2 = 14;
while (count($array) !== count(array_unique($array))) {
    $array = array_merge(array_slice($array, 1, 3), [array_shift($whole_array)]);
    $marker += 1;
}

while (count($array2) !== count(array_unique($array2))) {
    $array2 = array_merge(array_slice($array2, 1, 13), [array_shift($whole_array2)]);
    $marker2 += 1;
}




echo "Part 1: " . $marker . "\n";
echo "Part 2: " . $marker2;
