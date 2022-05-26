<?php
session_start();
if ($_SESSION['coins'] > 0) {
    $rand = [1, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 'NOPE'];
    $out = false;
    for ($k = 0; $k < rand(100, 10000); $k++) {
        shuffle($rand);
        shuffle($rand);
        shuffle($rand);
    }
    $val1 = $rand[0];
    for ($k = 0; $k < rand(100, 10000); $k++) {
        shuffle($rand);
        shuffle($rand);
        shuffle($rand);
    }
    $val2 = $rand[0];
    shuffle($rand);
    for ($k = 0; $k < rand(100, 10000); $k++) {
        shuffle($rand);
        shuffle($rand);
        shuffle($rand);
    }
    $val3 = $rand[0];
    if (($val1 == 'NOPE') || ($val2 == 'NOPE') || ($val3 == 'NOPE')) {
        $out = true;
    }
    if (($val1 == $val2) && ($val2 == $val3)) {
        $out = false;
    } else {
        $out = true;
    }
    header('Content-type: text/plain');
    if (!$out) {
        echo "WIN\n";
        $_SESSION['coins'] += 50;
    } else {
        echo "LOSE\n";
        $_SESSION['coins'] -= 10;
    }
    echo $val1 . "\n" . $val2 . "\n" . $val3 . "\n" . $_SESSION['coins'];
}