<?php

$input = trim(file_get_contents('day7.txt'));

$rows = explode("\n", $input);

$path = [];
$sizes = [];

foreach ($rows as $row) {
    $row = explode(" ", $row);
    if ($row[1] === "cd") {
        if ($row[2] === "..") {
            array_pop($path);
        } else {
            $path[] = $row[2];
        }
    } elseif ($row[1] === "ls") {
        continue;
    } elseif ($row[0] === "dir") {
        continue;
    } else {
        for ($ii = 1; $ii <= count($path); $ii += 1) {
            $path_string = implode('/', array_slice($path, 0, $ii));
            if (!array_key_exists($path_string, $sizes)) {
                $sizes[$path_string] = 0;
            }

            $sizes[$path_string] += $row[0];
        }
    }
}

$total_disk_space = 70000000;
$max_used_disk_space = $total_disk_space - 30000000;
$used_disk_space = $sizes['/'];
$need_to_delete = $used_disk_space - $max_used_disk_space;

$part1 = 0;
$part2 = 1000000000;
foreach ($sizes as $path => $size) {
    if ($size < 100000) {
        $part1 += $size;
    } elseif ($size > $need_to_delete) {
        $part2 = min($part2, $size);
    }
}



echo "Part 1: " . $part1 . "\n";
echo "Part 2: " . $part2;

