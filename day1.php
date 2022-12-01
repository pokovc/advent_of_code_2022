<?php

$input = file_get_contents('day1.txt');

$elves = explode("\n\n", $input);
$max = 0;
$top_three = [];

foreach ($elves as $elf) {
    $calories = array_sum(explode("\n", $elf));
    $max = max($calories, $max);

    if (count($top_three) < 3) {
        $top_three[] = $calories;
    } else {
        $min = min($top_three);
        if ($calories > $min) {
            $index = array_search($min, $top_three);
            $top_three[$index] = $calories;
        }
    }
}

echo "Part 1: " . $max . "\n";
echo "Part 2:" . array_sum($top_three);


