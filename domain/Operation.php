<?php

//класс таблицы operations
class Operation
{
    private $id;
    private $exchange_id;
    private $cash_in;
    private $cash_out;
    private $profit;
    private $date;
    private $curFrom;
    private $curTo;

    function __construct($id, $exchange_id, $cash_in, $cash_out, $profit, $date,$curFrom, $curTo)
    {
        $this->id = $id;
        $this->exchange_id = $exchange_id;
        $this->cash_in = $cash_in;
        $this->cash_out = $cash_out;
        $this->profit = $profit;
        $this->date = $date;
        $this->curFrom = $curFrom;
        $this->curTo= $curTo;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getExchange_id()
    {
        return $this->exchange_id;
    }


    public function getCash_in()
    {
        return $this->cash_in;
    }


    public function getCash_out()
    {
        return $this->cash_out;
    }

    public function getProfit()
    {
        return $this->profit;
    }


    public function getDate()
    {
        return $this->date;
    }

    public function getCurFrom()
    {
        return $this->curFrom;
    }

    public function getCurTo()
    {
        return $this->curTo;
    }


}