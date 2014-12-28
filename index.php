<?php
require_once 'service/Exchange.php';
require_once 'database/Connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type"
          content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language"
          content="ru"/>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <title>Main</title>
</head>
<body>

<!-- Текущий курс валют-->
<h3 style="margin-bottom: auto;">Курсы валют на сегодня</h3>
<table cellpadding="4">
    <tr>
        <td id="curr">
            <h4>Валюта</h4>

            <div id="listCurrency"></div>
        </td>
        <td>
            <h4>Покупка</h4>

            <div id="fieldsBuy"></div>

        </td>
        <td>
            <h4>Продажа</h4>

            <div id="fieldsSell"></div>

        </td>
    </tr>

</table>

<br>
<!-- Изменение курса валюты -->
<button class="btn" id="showUp">Изменить курсы валют</button>
<br>

<div id="upTable" style="display: none;">
    <table cellpadding="4">
        <td>
            <h3 id="getCurr" style="margin-top: 20px;"></h3><br>
        </td>
        <td>
            <input type="text" name="buy1" placeholder="Покупка" required id="str1"><br>
            <input type="text" name="buy2" placeholder="Покупка" required id="str2"><br>
            <input type="text" name="buy3" placeholder="Покупка" required id="str3"><br>
        </td>
        <td>
            <input type="text" name="sell1" placeholder="Продажа" required id="str4"><br>
            <input type="text" name="sell2" placeholder="Продажа" required id="str5"><br>
            <input type="text" name="sell3" placeholder="Продажа" required id="str6"><br>
        </td>
    </table>
    <button class="btn" type="submit" name="updateCurrency" id="updateCurrency" value="изменить">изменить</button>
</div>
<br>
<!-- Отчет о прибыли -->
<button class="btn" id="change2">Получить отчет о прибыли:</button>
<div id="money2" style="display: none;">
    <label for="from">ОТ</label>
    <input type="date" name="from" id="from">
    <label for="to">ДО</label>
    <input type="date" name="to" id="to">
    <button class="btn" id="report">Получить отчет</button>
</div>

<!-- Обмен валюты-->
<h3>Обмен валюты (можно из национальной валюты или в националную валюту)</h3>

<div>
    <label for="count">Введите количество:</label>
    <input type="number" min="0" id="countCurr" name="countCurr" required>
    из
    <select name="firstCurr" id="firstCurr">
        <option value="1">USD</option>
        <option value="2">EUR</option>
        <option value="3">GBP</option>
        <option value="4">UAH</option>
    </select>
    в
    <select name="secondCurr" id="secondCurr">
        <option value="1">USD</option>
        <option value="2">EUR</option>
        <option value="3">GBP</option>
        <option value="4">UAH</option>
    </select>
    <button class="btn" name="updateCurrency" id="operation">поменять</button>

</div>
<table cellspacing="4" cellpadding="5">
    <tr>
        <td><h4>Дата операции</h4></td>

        <td><h4>Получена валюта</h4></td>

        <td><h4>Внесено</h4></td>

        <td><h4>Валюта отдана</h4></td>

        <td><h4>Выдано</h4></td>

        <td><h4>Прибыль(в UAH)</h4></td>
    </tr>
    <tr>
        <td><p id="date"></p></td>

        <td><p id="cur_to"></p></td>

        <td><p id="cash_in"></p></td>

        <td><p id="cur_from"></p></td>

        <td><p id="cash_out"></p></td>

        <td><p id="profit"></p></td>

    </tr>
</table>
<div id="hello"></div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>

</body>
</html>