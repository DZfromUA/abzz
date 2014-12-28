<?php
require_once 'service/Exchange.php';
require_once 'database/Connect.php';

$result = array();
if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
    $ex = new Exchange();
    switch ($_REQUEST['action']) {
        case 'main' :
            foreach ($ex->getAll() as $key => $value) {
                $result['listCurrency'] .= $value->getName() . "<br>";
            }
            $getUabuy = $ex->getUaBuy();
            foreach ($getUabuy as $uaBuy) {
                $result['buy'] .= $uaBuy->getValue() . "<br>";
            }
            foreach ($ex->getUaSell() as $uaSell) {
                $result['sell'] .= $uaSell->getValue() . "<br>";
            }
            break;

        case 'updateCurrency' :
            $ex->exToday($_POST['buy1'], $_POST['buy2'], $_POST['buy3'], $_POST['sell1'], $_POST['sell2'], $_POST['sell3']);
            break;

        case 'operation' :
            $ex->exOperation($_POST['firstCurr'], $_POST['secondCurr'], $_POST['countCurr']);
            break;

        case 'report' :
            $report = $ex->getReport($_POST['from'], $_POST['to']);
            foreach ($report as $getR) {
                $result['date'] .= $getR->getDate() . "<br>";
                $result['cur_to'] .= $getR->getCurTo() . "<br>";
                $result['cash_in'] .= $getR->getCash_in() . "<br>";
                $result['cur_from'] .= $getR->getCurFrom() . "<br>";
                $result['cash_out'] .= $getR->getCash_out() . "<br>";
                $result['profit'] .= $getR->getProfit() . "<br>";
            }

            break;
    }
} else {
    $result['error'] = "where you action?";
}

echo json_encode($result);