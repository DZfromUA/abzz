<?php
require_once '/../domain/Operation.php';

//класс для управления операциями
class OperationRepository
{
    //метод для осуществления операции
    public function makeOperation($ex_id, $cash_in, $cash_out, $profit)
    {
        $date = date('Y-m-d');
        Connect::getInstance()->query("INSERT INTO operations (exchange_id,cash_in, cash_out,profit,date) value ('{$ex_id}','{$cash_in}', '{$cash_out}', '{$profit}','{$date}')");

    }

    //метод для получения отчета о прибыли
    public function makeReport($from, $to)
    {
        if (!empty($from) AND !empty($to)) {
            //$makeRep = Connect::getInstance()->query("SELECT * FROM operations WHERE date>'{$from}' AND date<'{$to}'");
            $makeRep = Connect::getInstance()->query("SELECT operations.*, currency.`name` as curFrom, cr.`name` as curTo FROM operations
                LEFT JOIN exchange_rate ON exchange_id = exchange_rate.id
                LEFT JOIN currency ON exchange_rate.currency_from = currency.id
                LEFT JOIN currency as cr ON exchange_rate.currency_to = cr.id
                 WHERE date>'{$from}' AND date<'{$to}'");
            $get = $makeRep->fetchAll(PDO::FETCH_ASSOC);
            $rep = array();
            while ($a = each($get)) {
                $rep[] = new Operation($a[1]['id'], $a[1]['exchange_id'], $a[1]['cash_in'], $a[1]['cash_out'], $a[1]['profit'], $a[1]['date'],$a[1]['curFrom'],$a[1]['curTo']);
            }
            return $rep;
        }
    }
}