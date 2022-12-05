<?php

$input = file_get_contents('day3.txt');

$rucksacks = explode("\n", $input);

$priorities = array_merge(range('a', 'z'), range('A', 'Z'));
$priorities_map = array_flip($priorities);

$sum = 0;
$sum_of_groups = 0;
$rucksacks_in_group = [];
foreach ($rucksacks as $ii => $rucksack) {
    if (empty($rucksack)) {
        continue;
    }

    $rucksacks_in_group[] = $rucksack;

    $rucksack_compartments = str_split($rucksack, strlen($rucksack) / 2);
    $rucksack_compartments = array_map(function ($compartment) {
        return str_split($compartment);
    }, $rucksack_compartments);

    $intersect = array_intersect($rucksack_compartments[0], $rucksack_compartments[1]);
    $intersect = array_unique($intersect);

    foreach ($intersect as $char) {
        $sum += $priorities_map[$char] + 1;
    }

    if (count($rucksacks_in_group) % 3 === 0) {
        $rucksacks_in_group = array_map(function ($rucksack) {
            return str_split($rucksack);
        }, $rucksacks_in_group);

        $intersect = array_intersect($rucksacks_in_group[0], $rucksacks_in_group[1], $rucksacks_in_group[2]);
        $intersect = array_unique($intersect);

        foreach ($intersect as $char) {
            $sum_of_groups += $priorities_map[$char] + 1;
        }

        $rucksacks_in_group = [];
    }
}

echo "Part 1: " . $sum . "\n";
echo "Part 2: " . $sum_of_groups;
