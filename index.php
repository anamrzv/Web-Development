<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/bun.jpg">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/body.css">
    <title>Ana's Web</title>
</head>

<body>
<table id="body-table">
    <tr>
        <th class="header">
            <a href="https://github.com/anamrzv"><img src="img/bun.jpg" title="icon" alt="icon" width="70" height="70"></a>
            <div>
                <p>Морозова Анастасия Александровна P3230</p>
                <p>Вариант 30010</p>
            </div>
        </th>
    </tr>

    <tr class="body">
        <th class="choose-area">
            <img id="figure" src="img/figure.jpg" alt="graph" width="200" height="200">
            <form id="coordinates-form" method="get" action="check.php">
                <div class="checkbox-area">
                    <p>Выберите X:</p>
                    <div class="x">
                        <label>-4<input type="checkbox" name="x" value="-4" onclick="controlCheckbox(this)"></label>
                        <label>-3<input type="checkbox" name="x" value="-3" onclick="controlCheckbox(this)"></label>
                        <label>-2<input type="checkbox" name="x" value="-2" onclick="controlCheckbox(this)"></label>
                        <label>-1<input type="checkbox" name="x" value="-1" onclick="controlCheckbox(this)"></label>
                        <label>0<input type="checkbox" name="x" value="0" onclick="controlCheckbox(this)"
                                       checked></label>
                        <label>1<input type="checkbox" name="x" value="1" onclick="controlCheckbox(this)"></label>
                        <label>2<input type="checkbox" name="x" value="2" onclick="controlCheckbox(this)"></label>
                        <label>3<input type="checkbox" name="x" value="3" onclick="controlCheckbox(this)"></label>
                        <label>4<input type="checkbox" name="x" value="4" onclick="controlCheckbox(this)"></label>
                    </div>

                    <p>Выберите Y:</p>
                    <div class="y">
                        <input id="yField" type="text" name="y" required="" placeholder="Число в интервале (-3;5)">
                    </div>

                    <p>Выберите R:</p>
                    <div class="r">
                        <label>1<input type="checkbox" name="r" value="1" onclick="controlCheckbox(this)"
                                       checked></label>
                        <label>2<input type="checkbox" name="r" value="2" onclick="controlCheckbox(this)"></label>
                        <label>3<input type="checkbox" name="r" value="3" onclick="controlCheckbox(this)"></label>
                        <label>4<input type="checkbox" name="r" value="4" onclick="controlCheckbox(this)"></label>
                        <label>5<input type="checkbox" name="r" value="5" onclick="controlCheckbox(this)"></label>
                    </div>

                    <div class="buttons-area">
                        <button id="function-btn" type="submit" class="gradient-button" name="submit">Отправить</button>
                    </div>
                </div>
            </form>
        </th>
    </tr>

    <tr>
        <th>
            <form method="post" action="check.php">
                <button type="submit" class="gradient-button" name="clear">Очистить</button>
            </form>
            <div class="table-area">
                <table id="main-table">
                    <caption>История выполнений</caption>
                    <tr>
                        <th class="col">X</th>
                        <th class="col">Y</th>
                        <th class="col">R</th>
                        <th class="col">Текущее время</th>
                        <th class="col">Время исполнения</th>
                        <th class="col">Результат</th>
                    </tr>
                    <?php
                    if (isset($_SESSION['rows'])) {
                        echo "<tbody>";
                        foreach ($_SESSION['rows'] as $row) {
                            echo $row;
                        }
                        echo "</tbody>";
                    }
                    ?>
                </table>
            </div>
        </th>
    </tr>
</table>

<script src="js/validate.js"></script>
</body>
</html>