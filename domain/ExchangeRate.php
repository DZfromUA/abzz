<?php
//класс таблицы exchange_rate
class ExchangeRate
{
    private $id;
    private $currency_from;
    private $currency_to;
    private $value;


    function __construct($id, $currency_from, $currency_to, $value)
    {
        $this->id = $id;
        $this->currency_from = $currency_from;
        $this->currency_to = $currency_to;
        $this->value = $value;
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



    public function getToday()
    {
        return $this->today;
    }


}
