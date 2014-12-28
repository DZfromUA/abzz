<?php

require_once '/../Repository/ExchangeRateRepository.php';
require_once '/../Repository/CurrencyRepository.php';
require_once '/../Repository/OperationRepository.php';
require_once '/../Repository/ExchangeRateHistoryRepository.php';

//класс контроллер
class Exchange
{
    //метод операций по обмену валюты
    public function exOperation($currencyFrom, $currencyTo, $value)
    {
        $rep = new ExchangeRateRepository();
        $rate = $rep->getTodayRate($currencyFrom, $currencyTo);
        $rateSide = $rep->getTodayRate($currencyTo, $currencyFrom);
        $operation = new OperationRepository();

        if ($value != 0) {

            if ($currencyFrom == 4) {

                $resultExchange = $value / $rate->getValue();
                $temp = $resultExchange * $rateSide->getValue();
                $profit = ($temp - $value) / 2;
                $operation->makeOperation($rate->getId(), $value, $resultExchange, $profit);
            } else {
                $resultExchange = $value * $rateSide->getValue();
                $temp = $resultExchange / $rate->getValue();
                $profit = ($value - $temp) / 2;
                $operation->makeOperation($rate->getId(), $value, $resultExchange, $profit);
            }
        }

    }


    public function getAll()
    {
        $nameM = new CurrencyRepository();
        return $nameM->selectCurrency();
    }

    public function getUaBuy()
    {
        $getMoney = new ExchangeRateRepository();
        return $getMoney->selectBuy();
    }

    public function getUaSell()
    {
        $getMoney = new ExchangeRateRepository();
        return $getMoney->selectSell();
    }

    public function getReport($from,$to){
        $operation = new OperationRepository();
        return $operation->makeReport($from,$to);
    }

    public function exToday($buy1, $buy2, $buy3, $sell1, $sell2, $sell3)
    {
        $upDateCur = new ExchangeRateHistoryRepository();
        return $upDateCur->changeCurrency($buy1, $buy2, $buy3, $sell1, $sell2, $sell3);
    }
}