<?php

require_once '/../domain/ExchangeRate.php';

//класс для работы с курсом валют
class ExchangeRateRepository
{
    //получение определенного курса валют
    public function getTodayRate($currencyFrom, $currencyTo)
    {
        $currrcyRec = Connect::getInstance()->query("SELECT * FROM exchange_rate WHERE currency_from='{$currencyFrom}' AND currency_to='$currencyTo' ");
        $am = $currrcyRec->fetch(PDO::FETCH_ASSOC);
        return new ExchangeRate($am['id'], $am['currency_from'], $am['currency_to'], $am['value']);
    }

    //получение стоимости покупки валюты
    public function selectBuy()
    {
        $currrcyRec = Connect::getInstance()->query("SELECT value FROM exchange_rate WHERE currency_from='4' ");
        $all = $currrcyRec->fetchAll(PDO::FETCH_ASSOC);
        $list = array();
        while ($a = each($all)) {
            $list[] = new ExchangeRate($a['id'], $a['currency_from'], $a['currency_to'], $a['1']['value']);
        }
        return $list;
    }

    //получение стоимости продажи валюты
    public function selectSell()
    {
        $currrcyRec = Connect::getInstance()->query("SELECT value FROM exchange_rate WHERE currency_to='4' ");
        $all = $currrcyRec->fetchAll(PDO::FETCH_ASSOC);
        $list = array();
        while ($a = each($all)) {
            $list[] = new ExchangeRate($a['id'], $a['currency_from'], $a['currency_to'], $a['1']['value']);
        }
        return $list;
    }

}
