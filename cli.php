<?php
$stdIn = fopen("php://stdin", "r");
$userInput = 'start';

$cliController = 'start';
include 'index.php';
echo PHP_EOL;

while (($userInput = fgets($stdIn))) {
    $userInput = str_replace(["\n", "\r"], '', $userInput);
    if ($userInput == 'q') {
        break;
    }

    if ($userInput == 's' || $userInput == 'show') {
        $cliController = 'show';
        include 'index.php';
    } else {
        $cliController = 'play';
        include 'index.php';
    }
}
