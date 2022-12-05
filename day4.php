<?php

$input = file_get_contents('day4.txt');

$pairs = explode("\n", $input);

$number_of_contains = 0;
$number_of_overlaps = 0;

foreach ($pairs as $ranges) {
    if (empty($ranges)) {
        continue;
    }
    list($range1, $range2) = explode(',', $ranges);
    list($start, $end) = explode('-', $range1);
    $range1 = range($start, $end);

    list($start, $end) = explode('-', $range2);
    $range2 = range($start, $end);

    if (array_diff($range1, $range2) === [] || array_diff($range2, $range1) === []) {
        $number_of_contains += 1;
    }

    if (array_intersect($range1, $range2)) {
        $number_of_overlaps += 1;
    }
}



echo "Part 1: " . $number_of_contains . "\n";
echo "Part 2: " . $number_of_overlaps;
