<?php

$input = file_get_contents('day2.txt');

$rounds = explode("\n", $input);

$score = 0;
$score2 = 0;

$map_opponent = [
    'A' => 'rock',
    'B' => 'paper',
    'C' => 'scissors'
];

$map_me = [
    'X' => 'rock',
    'Y' => 'paper',
    'Z' => 'scissors'
];

foreach ($rounds as $round) {
    if (empty(trim($round))) {
        continue;
    }

    list($opponent, $me) = explode(' ', $round);

    $score += points($map_opponent[$opponent], $map_me[$me]);
    $score2 += points($map_opponent[$opponent], $map_me[$me], false);
}

function points ($a, $b, $part1 = true) {
    if (!$part1) {
        if ($b === "rock") {
            // lose
            switch ($a) {
                case "rock": $b = "scissors"; break;
                case "paper": $b = "rock"; break;
                case "scissors": $b = "paper"; break;
            }
        } elseif ($b === "paper") {
            // draw
            $b = $a;
        } else {
            // lose
            switch ($a) {
                case "rock": $b = "paper"; break;
                case "paper": $b = "scissors"; break;
                case "scissors": $b = "rock"; break;
            }
        }
    }

    if ($a === "rock") {
        if ($b === "scissors") {
            return 3;
        }

        if ($b === "paper") {
            return 2 + 6;
        }

        return 1 + 3;
    }

    if ($a === "paper") {
        if ($b === "scissors") {
            return 3 + 6;
        }

        if ($b === "rock") {
            return 1;
        }

        return 2 + 3;
    }

    if ($a === "scissors") {
        if ($b === "rock") {
            return 1 + 6;
        }

        if ($b === "paper") {
            return 2;
        }

        return 3 + 3;
    }
}

echo "Part 1: " . $score . "\n";
echo "Part 1: " . $score2;
