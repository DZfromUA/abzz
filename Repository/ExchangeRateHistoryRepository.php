<?php

require_once '/../domain/ExchangeRateHistory.php';

//класс для изменения стоимости валют
class ExchangeRateHistoryRepository
{
    //метод для обновления курса валют, и сохранение страых курсов
    public function changeCurrency($buy1, $buy2, $buy3, $sell1, $sell2, $sell3)
    {
        if (!empty($buy1) AND !empty($buy2) AND !empty($buy3) AND !empty($sell1) AND !empty($sell2) AND !empty($sell3)) {
            $allCur = Connect::getInstance()->query("SELECT * FROM exchange_rate  ");
            $all = $allCur->fetchAll(PDO::FETCH_ASSOC);

            $arr = array(
                '0' => $buy1,
                '1' => $sell1,
                '2' => $sell2,
                '3' => $buy2,
                '4' => $buy3,
                '5' => $sell3
            );
            $list = array();
            while ($a = each($all)) {
                $list[] = new ExchangeRate($a[1]['id'], $a[1]['currency_from'], $a[1]['currency_to'], $a[1]['value']);
            }

            $date = date('Y-m-d');
            $i = 0;

            foreach ($list as $getAll) {
                $change = $arr[$i++] - $getAll->getValue();
                Connect::getInstance()->query("INSERT INTO `exchange_rate_history`"
                    . "( `currency_from`, `currency_to`, `val`, `change`, `date`) VALUES "
                    . "('{$getAll->getCurrency_from()}','{$getAll->getCurrency_to()}','{$getAll->getValue()}'
                ,'{$change}','$date')");
            }
            $num = 0;
            foreach ($arr as $currUp) {
                ++$num;
                Connect::getInstance()->query("UPDATE `exchange_rate` SET `value`='{$currUp}' WHERE  `id`='{$num}'");

            }
        }
    }
}
