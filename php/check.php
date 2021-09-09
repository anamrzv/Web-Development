<?php
session_start();

if (isset($_GET['submit'])) {
    mainFunc();
} elseif (isset($_POST['clear'])) {
    clear();
}
header("Location: index.php");
exit();

function clear(){
    if (isset($_SESSION['rows'])) {
        $_SESSION['rows'] = array();
    }
}

function mainFunc()
{
    $start = microtime(true);
    if (isset($_GET['x']) && isset($_GET['y']) && isset($_GET['r'])) {
        $X = $_GET['x'];
        $Y = $_GET['y'];
        $R = $_GET['r'];
        if (is_numeric($Y) && $Y < 5 && $Y > -3 && in_array($X, array(-4, -3, -2, -1, 0, 1, 2, 3, 4)) && in_array($R, array(1, 2, 3, 4, 5))) {
            if (isInCircle($X, $Y, $R) || isInRectangle($X, $Y, $R) || isInTriangle($X, $Y, $R)) {
                $result = "Попадание";
            } else $result = "Промах";

            date_default_timezone_set('Europe/Moscow');
            $finish = microtime(true);
            $executionTime = round($finish - $start, 5);
            $currentTime = date('d.m.y H:i:s');

            $tableRow = "<tr><td>$X</td><td>$Y</td><td>$R</td><td>$currentTime</td><td>$executionTime</td><td>$result</td></tr>";

            if (isset($_SESSION['rows'])) {
                $_SESSION['rows'][] = $tableRow;
            } else {
                $_SESSION['rows'] = array($tableRow);
            }
            header("Location: index.php");
        } else return;
    }
}

function isInCircle($X, $Y, $R)
{
    return (pow($X, 2) + pow($Y, 2) <= pow($R, 2) && ($Y >= 0) && ($X <= 0));
}

function isInRectangle($X, $Y, $R)
{
    return (($X >= 0) && ($Y <= 0) && ($X <= $R / 2) && ($Y <= $R));
}

function isInTriangle($X, $Y, $R)
{
    return (($X >= 0) && ($Y >= 0) && ($Y <= -2 * $X + $R));
}

