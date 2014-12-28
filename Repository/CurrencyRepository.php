<?php

require_once '/../domain/Currency.php';
//класс для управления таблицей валют
class CurrencyRepository
{
    //метод для выборки всей существующей валюты
    public function selectCurrency()
    {
        $currrcyRec = Connect::getInstance()->query("SELECT * FROM currency WHERE name!='UAH'");
        $all = $currrcyRec->fetchAll(PDO::FETCH_ASSOC);
        $list = array();
        while ($a = each($all)) {
            $list[] = new Currency($a[1]['id'], $a[1]['name']);
        }
        return $list;
    }

}