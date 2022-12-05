<?php

$input = file_get_contents('day5.txt');

$rows = explode("\n", $input);

$columns = [
    1 => [],
    2 => [],
    3 => [],
    4 => [],
    5 => [],
    6 => [],
    7 => [],
    8 => [],
    9 => [],
];

$moves = false;
foreach ($rows as $ii => $row) {
    $crates = str_split($row, 4);
    $crates = array_map('trim', $crates);

    if (is_numeric($crates[0])) {
        $moves = true;
    }

    if (!$moves) {
        for ($jj = 0; $jj < 9; $jj += 1) {
            if (!empty($crates[$jj])) {
                $columns[$jj + 1][] = $crates[$jj];
            }
        }
    } elseif (!is_numeric($crates[0]) && !empty(trim($row))) {
        $row = str_replace(["move ", " from ", " to "], ["", "-", "-"], $row);
        list($no_of_crates, $column_from, $column_to) = explode('-', $row);

        // PART 2
        $columns[$column_to] = array_merge(array_slice($columns[$column_from], 0, $no_of_crates), $columns[$column_to]);
        $columns[$column_from] = array_slice($columns[$column_from], $no_of_crates);

        // PART 1
        /* $jj = 0;
        while ($jj < $no_of_crates) {
            $columns[$column_to] = array_merge([array_shift($columns[$column_from])], $columns[$column_to]);
            $jj += 1;
        } */
    }
}

$first_row = "";
foreach ($columns as $column) {
    $first_row .= str_replace(["[", "]"], "", $column[0]);
}


echo "Part 1: " . $first_row;
