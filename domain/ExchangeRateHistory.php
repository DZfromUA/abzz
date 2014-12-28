<?php

//класс таблицы exchange_rate_history
class ExchangeRateHistory {
    private $id;
    private $currency_from;
    private $currency_to;
    private $value;
    private $change;
    private $date;


    function __construct($id, $currency_from, $currency_to, $value,$change,$date)
    {
        $this->id = $id;
        $this->currency_from = $currency_from;
        $this->currency_to = $currency_to;
        $this->value = $value;
        $this->change= $change;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getCurrency_from()
    {
        return $this->currency_from;
    }


    public function getCurrency_to()
    {
        return $this->currency_to;
    }


    public function getValue()
    {
        return $this->value;
    }



    public function getChange()
    {
        return $this->change;
    }

    public function getDate()
    {
        return $this->date;
    }




} 