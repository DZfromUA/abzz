$(document).ready(function () {
    var main = function () {
        $.ajax({
            url: "/ajax.php",
            type: "POST",
            dataType: "json",
            data: "action=main",
            success: function (jsonCurr) {
                $("#listCurrency").html(jsonCurr.listCurrency);
                $("#getCurr").html(jsonCurr.listCurrency);
                $("#fieldsBuy").html(jsonCurr.buy);
                $("#fieldsSell").html(jsonCurr.sell);
            }
        });
    };
    main();

    $("#updateCurrency").click(function () {
        var buy = $("#str1").val();
        var buy1 = $("#str2").val();
        var buy2 = $("#str3").val();
        var sell = $("#str4").val();
        var sell1 = $("#str5").val();
        var sell2 = $("#str6").val();
        $.ajax({
            url: "/ajax.php",
            type: "POST",
            dataType: "json",
            data: "action=updateCurrency&buy1=" + buy + "&buy2=" + buy1 + "&buy3=" + buy2 + "&sell1=" + sell + "&sell2=" + sell1 + "&sell3=" + sell2,
            success: function (jsonCurr) {
                alert("Обновление курсов валют успешно завершено!");
                main();
            }
        });
    });

    $("#operation").click(function () {

        if ($("#firstCurr").val() != $("#secondCurr").val()) {

            var firstCurr = $("#firstCurr").val();
            var secondCurr = $("#secondCurr").val();
            var countCurr = $("#countCurr").val();

            $.ajax({
                url: "/ajax.php",
                type: "POST",
                dataType: "json",
                data: "action=operation&firstCurr=" + firstCurr + "&secondCurr=" + secondCurr + "&countCurr=" + countCurr,
                success: function (jsonCurr) {
                    alert("Обмен завершен успешно!");
                }
            });
        }
        else {
            alert("Запрос не верен! вы пытаетесь поменять одну и ту же валюту!");
        }

    });
    $("#report").click(function () {
        var from = $("#from").val();
        var to = $("#to").val();

        $.ajax({
            url: "/ajax.php",
            type: "POST",
            dataType: "json",
            data: "action=report&from=" + from + "&to=" + to,
            success: function (jsonCurr) {

                $("#date").html(jsonCurr.date);
                $("#cur_to").html(jsonCurr.cur_to);
                $("#cash_in").html(jsonCurr.cash_in);
                $("#cur_from").html(jsonCurr.cur_from);
                $("#cash_out").html(jsonCurr.cash_out);
                $("#profit").html(jsonCurr.profit);
            }
        });
    });


    $("#showUp").click(function () {
        $("#upTable").toggle(500);
    });

    $("#change2").click(function () {
        $("#money2").toggle(500);
    });
});