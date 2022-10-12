<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ url('mt/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ url('mt/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('mt/assets/demo/chart-bar-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ url('mt/js/datatables-simple-demo.js') }}"></script>
<script src="{{ url('mt/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ url('mt/vendor/moment/moment.js') }}"></script>
<script src="{{ url('mt/vendor/moment/moment-timezone-with-data.js') }}"></script>
<script src="htps://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ url('mt/js/websocket.js') }}"></script>
<script src="{{ url('mt/js/utility.js') }}"></script>
<script src="js/.js"></script>
<script>
    //2999a8b9e1ecc9bd2f8d7d85aa46b0f7  0ca33103c520ed2edd261cf66eed06
    //601823bea3f866c6cd380a0d3f28d5e3

    var AppId = "2999a8b9e1ecc9bd2f8d7d85aa46b0f7";
    var fsocket, fsocket_status, transaction_id, last_investment, last_market, last_direction, last_duration, step_marti, last_status;
    var chart_url = "https://dapp.spectre.pm/cz.html";

    var msocket, msocket_status;
    var OnTrade = false;
    var OnMarti = false;
    let portrait = window.matchMedia("(orientation: portrait)");
    let SignalMonitor;
    let SignalMonitorX;
    var myticker = [];
    var myticke = [];
    lblTradeStatus ="Analisisa";
    Demo = false;
    lossvirtual = 0;
    lossvirtua = 0;
    msocket_status = 0;
    fsocket_status = 0;
    step_marti = 0;
    transaction_id = "";
    last_duration = "";
    last_direction = "";
    last_market = "";
    last_status = "N";
    tableprofit = "";
    tableN = "";
    (table = ""), (tableS = ""), (coi = 0);
    tableL = [];
    total = 0;
    //var token ="";
    last_investment = $("#txt_invest").val();
    //token = $("#{txt_t}").val();
    //if(window.open("")){
    // window.localStorage.setItem("access_token

    //  if (window.localStorage.getItem("access_token") == null) {alert(1);
    //         window.open('login.php')

    //     }
    // Mark();
    //};
    //var token = window.localStorage.getItem("access_token");
    /*if (window.localStorage.getItem("tokenx") == null) {
            open('./login.html')
$("#pdod option").filter(":selected").val() == "BUYLIMIT"
        }*/
        seve.addEventListener(
    "click",
    function (e) {
        if ($("#pdod option").filter(":selected").val() == "BUY LIMIT") {
            setCookie("tic-priseBL", $('#PointicBL').val(),"-365");
            setCookie("tic-priseBL", $('#PointicBL').val(),"365");
            setCookie("priseBL", "BUY LIMIT","365");
            if (getCookie("tic-priseBL")) {
                $("#ticBL").text(getCookie("tic-priseBL"));
            }
            if (getCookie("priseBL")) {
                $("#BL").text(getCookie("priseBL"));
            }
        }
        if ($("#pdod option").filter(":selected").val() == "SELL LIMIT") {
            setCookie("tic-priseSL", $('#PointicSL').val(),"-365");
            setCookie("tic-priseSL", $('#PointicSL').val(),"365");
            setCookie("priseSL", "SELL LIMIT","365");
            if (getCookie("tic-priseSL")) {
                $("#ticSL").text(getCookie("tic-priseSL"));
            }
            if (getCookie("priseSL")) {
                $("#SL").text(getCookie("priseSL"));
            }
        }
        if ($("#pdod option").filter(":selected").val() == "BUY STOP") {
            setCookie("tic-priseBS", $('#PointicBS').val(),"-365");
            setCookie("tic-priseBS", $('#PointicBS').val(),"365");
            setCookie("priseBS", "BUY STOP","365");
            if (getCookie("priseBS")) {
                $("#BS").text(getCookie("priseBS"));
             }
             if (getCookie("tic-priseBS")) {
                $("#ticBS").text(getCookie("tic-priseBS"));
             }
        }
        if ($("#pdod option").filter(":selected").val() == "SELL STOP") {
            setCookie("tic-priseSS", $('#PointicSS').val(),"-365");
            setCookie("tic-priseSS", $('#PointicSS').val(),"365");
            setCookie("priseSS", "SELL STOP","365");
            if (getCookie("tic-priseSS")) {
                $("#ticSS").text(getCookie("tic-priseSS"));
            }
            if (getCookie("priseSS")) {
                $("#SS").text(getCookie("priseSS"));
            }
        }
        $("#AddOrder").modal('hide');
        $("#listOrder").modal('show');

    });
    // if (getCookie("tic-priseBL")) {
    //       $("#ticBL").text(getCookie("tic-priseBL"));
    // }
    // if (getCookie("tic-priseSL")) {
    //       $("#ticSL").text(getCookie("tic-priseSL"));
    // }
    // if (getCookie("tic-priseBS")) {
    //       $("#ticBS").text(getCookie("tic-priseBS"));
    // }
    // if (getCookie("tic-priseSS")) {
    //       $("#ticSS").text(getCookie("tic-priseSS"));
    // }
    // if (getCookie("priseBL")) {
    //       $("#BL").text(getCookie("priseBL"));
    // }
    // if (getCookie("priseSL")) {
    //       $("#SL").text(getCookie("priseSL"));
    // }
    // if (getCookie("priseBS")) {
    //       $("#BS").text(getCookie("priseBS"));
    // }
    // if (getCookie("priseSS")) {
    //       $("#SS").text(getCookie("priseSS"));
    // }




    // setCookie("_authToken", "a5a88308819e1b47aaa4e810af906bc38dd35074");
    // if (getCookie("_authToken")) {
    // $("#txt_t").val(getCookie("_authToken"));
    // }

    //load last account type
    if (getCookie("_authAccountType")) {
    $("#cmbAccountType option[value=" + getCookie("_authAccountType") + "]").attr("selected", "selected");
    }

    //load candle time frame
    if (getCookie("_active_period")) {
    $("#cmb_time_frame option[value=" + getCookie("_active_period") + "]").attr("selected", "selected");
    } else {
    setCookie("_active_period", "1m", "365");
    $("#cmb_time_frame option[value=" + getCookie("_active_period") + "]").attr("selected", "selected");
    }
    /*
    if (getCookie("_active_duration")) {
    if ($("#cmb_duration").find("option:contains('" + getCookie("_active_duration") + "')").length > 0) {
        $("#cmb_duration option[value=" + getCookie("_active_duration") + "]").attr("selected", "selected");
    } else {
        setCookie("_active_duration", "60s", "365");
        $("#cmb_duration option[value=" + "10s" + "]").attr("selected", "selected");
    }
    } else {
    setCookie("_active_duration", "10s", "365");
    $("#cmb_duration option[value=" + "60s" + "]").attr("selected", "selected");
    }*/

    if (getCookie("_setSignalSource")) {
    $("#cmb_signal option[value=" + getCookie("_setSignalSource") + "]").attr("selected", "selected");
    }

    if (getCookie("_setIfSignalFalse")) {
    $("#cmb_if_signal_false option[value=" + getCookie("_setIfSignalFalse") + "]").attr("selected", "selected");
    }

    if (getCookie("_setAfterMaxStep")) {
    $("#cmb_after_step option[value=" + getCookie("_setAfterMaxStep") + "]").attr("selected", "selected");
    }

    if (getCookie("_active_market")) {
    if ($("#cmb_market").find("option:contains('" + getCookie("_active_market") + "')").length > 0) {
        $("#cmb_market option[value=" + getCookie("_active_market") + "]").attr("selected", "selected");
    }
    }

    if (getCookie("_setBaseInvest")) {
    $("#txt_invest").val(getCookie("_setBaseInvest"));
    }

    if (getCookie("_setStopLoss")) {
    $("#txt_stoploss").val(getCookie("_setStopLoss"));
    }

    if (getCookie("_setTakeProfit")) {
    $("#txt_takeprofit").val(getCookie("_setTakeProfit"));
    }

    if (getCookie("_setMultiplier")) {
    $("#txt_muliplier").val(getCookie("_setMultiplier"));
    }

    if (getCookie("_setMaxStep")) {
    $("#txt_max_step").val(getCookie("_setMaxStep"));
    }

    if (getCookie("_setPlaySound")) {
    if (getCookie("_setPlaySound") == 1) {
        $("#customSwitch2").prop("checked", true);
    } else {
        $("#customSwitch2").prop("checked", false);
    }
    }

    if (getCookie("_setSignalTemplate")) {
    var bTemp = JSON.parse(getCookie("_setSignalTemplate"));
    if (bTemp.length > 0) {
        var objTemp = "";
        for (var c = bTemp.length - 1; c >= 0; c--) {
        objTemp = bTemp[c] + "\n" + objTemp;
        }
        $("#txtSignalTemplate").val(objTemp);
    }
    }
    function chart() {
    selectedChartID = getCookie("_active_market");
    if (getCookie("_active_market") == 100) {
        selectedChartName = "EPIC5000";
    }
    if (getCookie("_active_market") == 102) {
        selectedChartName = "EPIC3000";
    }
    if (getCookie("_active_market") == 101) {
        selectedChartName = "EPIC1000";
    }
    if (getCookie("_active_market") == 1002) {
        selectedChartName = "AAPL";
    }
    if (getCookie("_active_market") == 201) {
        selectedChartName = "AAPLr";
    }
    if (getCookie("_active_market") == 200) {
        selectedChartName = "FBr";
    }
    if (getCookie("_active_market") == 203) {
        selectedChartName = "TSLAr";
    }
    if (getCookie("_active_market") == 202) {
        selectedChartName = "TWTRr";
    }
    if (getCookie("_active_market") == 601) {
        selectedChartName = "ETHUSDv";
    }
    if (getCookie("_active_market") == 402) {
        selectedChartName = "AAVE/USD";
    }
    if (getCookie("_active_market") == 1017) {
        selectedChartName = "ABNB";
    }
    if (getCookie("_active_market") == 612) {
        selectedChartName = "AUTOMUSDv";
    }
    if (getCookie("_active_market") == 406) {
        selectedChartName = "AVAX/USD";
    }
    if (getCookie("_active_market") == 420) {
        selectedChartName = "BAT/USD";
    }
    if (getCookie("_active_market") == 602) {
        selectedChartName = "BCHUSDv";
    }
    if (getCookie("_active_market") == 418) {
        selectedChartName = "BNT/USD";
    }
    if (getCookie("_active_market") == 1021) {
        selectedChartName = "BUD";
    }
    if (getCookie("_active_market") == 410) {
        selectedChartName = "CAKE/USD";
    }
    if (getCookie("_active_market") == 423) {
        selectedChartName = "CEL/USD";
    }
    if (getCookie("_active_market") == 1012) {
        selectedChartName = "COIN";
    }
    if (getCookie("_active_market") == 408) {
        selectedChartName = "COMP/USD";
    }
    if (getCookie("_active_market") == 1005) {
        selectedChartName = "DAL";
    }
    if (getCookie("_active_market") == 603) {
        selectedChartName = "DASHUSDv";
    }
    if (getCookie("_active_market") == 613) {
        selectedChartName = "DOGEUSDv";
    }
    if (getCookie("_active_market") == 617) {
        selectedChartName = "DOTUSDv";
    }
    if (getCookie("_active_market") == 425) {
        selectedChartName = "ENJ/USD";
    }
    if (getCookie("_active_market") == 614) {
        selectedChartName = "EOSUSDv";
    }
    if (getCookie("_active_market") == 1015) {
        selectedChartName = "ETSY";
    }
    if (getCookie("_active_market") == 615) {
        selectedChartName = "FILUSDv";
    }
    if (getCookie("_active_market") == 1018) {
        selectedChartName = "FSLY";
    }
    if (getCookie("_active_market") == 411) {
        selectedChartName = "FTM/USD";
    }
    if (getCookie("_active_market") == 426) {
        selectedChartName = "FTT/USD";
    }
    if (getCookie("_active_market") == 1010) {
        selectedChartName = "GOOG";
    }
    if (getCookie("_active_market") == 419) {
        selectedChartName = "GRT/USD";
    }
    if (getCookie("_active_market") == 1003) {
        selectedChartName = "GS";
    }
    if (getCookie("_active_market") == 256) {
        selectedChartName = "HDFC";
    }
    if (getCookie("_active_market") == 253) {
        selectedChartName = "HDFCBANK";
    }
    if (getCookie("_active_market") == 254) {
        selectedChartName = "HINDUNILVR";
    }
    if (getCookie("_active_market") == 427) {
        selectedChartName = "HT/USD";
    }
    if (getCookie("_active_market") == 250) {
        selectedChartName = "ICICIBANK";
    }
    if (getCookie("_active_market") == 255) {
        selectedChartName = "INFY";
    }
    if (getCookie("_active_market") == 259) {
        selectedChartName = "ITC";
    }
    if (getCookie("_active_market") == 1004) {
        selectedChartName = "JPM";
    }
    if (getCookie("_active_market") == 1019) {
        selectedChartName = "K";
    }
    if (getCookie("_active_market") == 1020) {
        selectedChartName = "KHC";
    }
    if (getCookie("_active_market") == 413) {
        selectedChartName = "UMA/USD";
    }
    if (getCookie("_active_market") == 401) {
        selectedChartName = "UNI/USD";
    }
    if (getCookie("_active_market") == 620) {
        selectedChartName = "VETUSDv";
    }
    if (getCookie("_active_market") == 621) {
        selectedChartName = "WAVESUSDv";
    }
    if (getCookie("_active_market") == 1007) {
        selectedChartName = "WMT";
    }
    if (getCookie("_active_market") == 600) {
        selectedChartName = "XBTUSDv";
    }
    if (getCookie("_active_market") == 608) {
        selectedChartName = "XLMUSDv";
    }
    if (getCookie("_active_market") == 605) {
        selectedChartName = "XMRUSDv";
    }
    if (getCookie("_active_market") == 622) {
        selectedChartName = "XRPUSDv";
    }
    if (getCookie("_active_market") == 618) {
        selectedChartName = "XTZUSDv";
    }
    if (getCookie("_active_market") == 412) {
        selectedChartName = "YFI/USD";
    }
    if (getCookie("_active_market") == 258) {
        selectedChartName = "KOTAKBANK";
    }
    if (getCookie("_active_market") == 400) {
        selectedChartName = "LINK/USD";
    }
    if (getCookie("_active_market") == 604) {
        selectedChartName = "LTCUSDv";
    }
    if (getCookie("_active_market") == 403) {
        selectedChartName = "LUNA/USD";
    }
    if (getCookie("_active_market") == 424) {
        selectedChartName = "MANA/USD";
    }
    if (getCookie("_active_market") == 607) {
        selectedChartName = "MATICUSDv";
    }
    if (getCookie("_active_market") == 1009) {
        selectedChartName = "MCD";
    }
    if (getCookie("_active_market") == 404) {
        selectedChartName = "MKR/USD";
    }
    if (getCookie("_active_market") == 1013) {
        selectedChartName = "MRNA";
    }
    if (getCookie("_active_market") == 1026) {
        selectedChartName = "MSFT";
    }
    if (getCookie("_active_market") == 204) {
        selectedChartName = "MSFTr";
    }
    if (getCookie("_active_market") == 41) {
        selectedChartName = "MX/USD";
    }
    if (getCookie("_active_market") == 616) {
        selectedChartName = "NEOUSDv";
    }
    if (getCookie("_active_market") == 1008) {
        selectedChartName = "LFX";
    }
    if (getCookie("_active_market") == 1029) {
        selectedChartName = "NKLA";
    }
    if (getCookie("_active_market") == 1022) {
        selectedChartName = "NOC";
    }
    if (getCookie("_active_market") == 1011) {
        selectedChartName = "PLTR";
    }
    if (getCookie("_active_market") == 1016) {
        selectedChartName = "PTON";
    }
    if (getCookie("_active_market") == 1025) {
        selectedChartName = "PYPL";
    }
    if (getCookie("_active_market") == 251) {
        selectedChartName = "RELIANCE";
    }
    if (getCookie("_active_market") == 415) {
        selectedChartName = "REN/USD";
    }
    if (getCookie("_active_market") == 1024) {
        selectedChartName = "RIO";
    }
    if (getCookie("_active_market") == 414) {
        selectedChartName = "RUNE/USD";
    }
    if (getCookie("_active_market") == 407) {
        selectedChartName = "SNX/USD";
    }
    if (getCookie("_active_market") == 1023) {
        selectedChartName = "SPCE";
    }
    if (getCookie("_active_market") == 1027) {
        selectedChartName = "SPOT";
    }
    if (getCookie("_active_market") == 1014) {
        selectedChartName = "SQ";
    }
    if (getCookie("_active_market") == 409) {
        selectedChartName = "SHUSI/USD";
    }
    if (getCookie("_active_market") == 252) {
        selectedChartName = "TCS";
    }
    if (getCookie("_active_market") == 428) {
        selectedChartName = "TEL/USD";
    }
    if (getCookie("_active_market") == 619) {
        selectedChartName = "THETAUSDv";
    }
    if (getCookie("_active_market") == 609) {
        selectedChartName = "TRXUSD";
    }
    if (getCookie("_active_market") == 17) {
        selectedChartName = "EUR/AUD";
    }
    if (getCookie("_active_market") == 23) {
        selectedChartName = "EUR/CAD";
    }
    if (getCookie("_active_market") == 7) {
        selectedChartName = "EUR/CHF";
    }
    if (getCookie("_active_market") == 4) {
        selectedChartName = "EUR/GBP";
    }
    if (getCookie("_active_market") == 6) {
        selectedChartName = "EUR/JPY";
    }
    if (getCookie("_active_market") == 25) {
        selectedChartName = "EUR/NZD";
    }
    if (getCookie("_active_market") == 1) {
        selectedChartName = "EUR/USD";
    }
    if (getCookie("_active_market") == 12) {
        selectedChartName = "GBP/AUD";
    }
    if (getCookie("_active_market") == 27) {
        selectedChartName = "GBP/CAD";
    }
    if (getCookie("_active_market") == 13) {
        selectedChartName = "GBP/CHF";
    }
    if (getCookie("_active_market") == 10) {
        selectedChartName = "GBP/JPY";
    }
    if (getCookie("_active_market") == 35) {
        selectedChartName = "GBP/NZD";
    }
    if (getCookie("_active_market") == 3) {
        selectedChartName = "GPB/USD";
    }
    if (getCookie("_active_market") == 28) {
        selectedChartName = "CAD/CHF";
    }
    if (getCookie("_active_market") == 18) {
        selectedChartName = "CAD/JPY";
    }
    if (getCookie("_active_market") == 26) {
        selectedChartName = "CHF/JPY";
    }

    asset_name_replaced = selectedChartName.replace("/", "");
    $("iframe").attr("src", chart_url + "?asset_name=" + selectedChartName + "&asset_id=" + selectedChartID + "&asset_replace=" + asset_name_replaced);
    };
    function Mark(){
        var msg = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: $("#cmb_time_frame option").filter(":selected").val(),
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket.send(JSON.stringify(msg));
        var msg2 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 300,
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket2.send(JSON.stringify(msg2));
        var msg1 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 60,
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket1.send(JSON.stringify(msg1));
        var msg3 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 900,
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket3.send(JSON.stringify(msg3));
        var msg0 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: $("#cmb_time_frame option").filter(":selected").val(),
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket.send(JSON.stringify(msg0));
    }

    setInterval(function () {
    var myw = "UTC+7";
    var now = new moment();
    var wLocal = now.tz(myw).format("HH:mm:ss");
    $("#mytimeLocal").text(wLocal);
    }, 1000);
    setInterval(function () {
    var mytz = "UTC";
    var now = new moment();
    var waktu = now.tz(mytz).format("HH:mm:ss");
    $("#mytime").text(waktu);
    }, 1000);
    async function getTimeScheduleX() {
    $("#PointicLS").val();
    }

    async function getTimeSchedule() {
    var now = new moment();
    var waktu = now.format("HH:mm:ss");
    switch ($("#cmb_signal option").filter(":selected").val()) {
        case "manual":
        $("#Ticpoin").hide();
        $("#Limit").hide();
        clearInterval(SignalMonitor);
        break;

        case "ctpoint":
        $("#Jam").hide();
        $("#Limit").hide();
        if (Poin < 0) {
            if (Math.abs(parseFloat(Poin)) >= $("#Pointic").val()) {
            if (OnTrade == false) {
                if ($("#btnStart").text() == "Stop") {
                OnTrade = true;
                Signal='PUT';
                LastDirection = "SELL";
                //alert("Result : Sending Order PUT ");
                OpenOrder(LastDirection);
                }
            }
            }
        }
        if (Poin > 0) {
            if (Math.abs(parseFloat(Poin)) >= $("#Pointic").val()) {
            if (OnTrade == false) {
                if ($("#btnStart").text() == "Stop") {
                OnTrade = true;
                Signal='CALL';
                LastDirection = "CALL";
                //alert("Result : Sending Order CALL ");
                OpenOrder(LastDirection);
                }
            }
            }
        }
        break;

        case "ctpointF":
        $("#Jam").hide();
        $("#Limit").hide();
        if (Poin > 0) {
            if (Math.abs(parseFloat(Poin)) >= $("#Pointic").val()) {
            if (OnTrade == false) {
                if ($("#btnStart").text() == "Stop") {
                OnTrade = true;
                Signal='PUT';
                LastDirection = "SELL";
                //alert("Result : Sending Order PUT ");
                OpenOrder(LastDirection);
                }
            }
            }
        }
        if (Poin < 0) {
            if (Math.abs(parseFloat(Poin)) >= $("#Pointic").val()) {
            if (OnTrade == false) {
                if ($("#btnStart").text() == "Stop") {
                OnTrade = true;
                Signal='CALL';
                LastDirection = "CALL";
                //alert("Result : Sending Order CALL ");
                OpenOrder(LastDirection);
                }
            }
            }
        }
        break;

        case "pattern":

        // alert(sopen)
        $("#Limit").hide();
        $("#Ticpoin").hide();
        $("#Jam").hide();
        if (OnTrade == false && OnMarti == false) {
            if (Open > Clos) {
            if ($("#btnStart").text() == "Stop") {
                Signal='CALL';
                OpenOrder("CALL");
            }
            } else {
            if ($("#btnStart").text() == "Stop") {
                Signal='PUT';
                OpenOrder("SELL");
            }
            }
            if (OnTrade == 0) {
            OnTrade = 1;
            }
        }
        break;

        case "Rul3":
         alert(spot_price)
        $("#Ticpoin").hide();
        $("#Limit").hide();
        $("#Jam").hide();
        if (Poin3 > 0) {
            if (Poin2 > 0) {
                if (Poin1 > 0) {
                    if (OnTrade == false) {
                if ($("#btnStart").text() == "Stop") {
                OnTrade = true;
                Signal='PUT';
                LastDirection = "SELL";
                //alert("Result : Sending Order CALL ");
                OpenOrder(LastDirection);
                }
            }
                }
            }
        }
        if (Poin3 < 0) {
            if (Poin2 < 0) {
                if (Poin1 < 0) {
                    if (OnTrade == false) {
                if ($("#btnStart").text() == "Stop") {
                OnTrade = true;
                Signal='CALL';
                LastDirection = "CALL";
                //alert("Result : Sending Order CALL ");
                OpenOrder(LastDirection);
                }
            }
                }
            }
        }
        break;




        case "x":
             //alert(spot_price1)
            $("#Ticpoin").hide();
            $("#Jam").hide();
            $("#LimitB").show();
            if (Math.abs(parseFloat(spot_price1)) <= "isikanvariabel"){
                    if (OnTrade == false) {
                    if ($("#btnStart").text() == "Stop") {
                    OnTrade = true;
                    alert('Ontrade');
                    // LastDirection = "CALL";
                    Signal='CALL';
                    // OpenOrder(LastDirection);
                    var msg = {
                            action: "newtrade",
                            data: {
                            account_type: $("#cmbAccountType option").filter(":selected").val(),
                            direction: "isikanvariabel",
                            asset_id: "isikanvariabel",
                            expiration: "isikanvariabel",
                            investment: "isikanvariabel",
                            },
                            token: $("#txt_t").val(),
                        };
                        fsocket.send(JSON.stringify(msg));
                    }
                    if (OnTrade == 0) {
                OnTrade = 1;
                }
                    }
                }

        break;


        @forelse ( $orders as $order )
        case "Pending":
                    // alert(spot_price1)
                    $("#Ticpoin").hide();
                    $("#Jam").hide();
                    $("#LimitS").show();
                    if (Math.abs(parseFloat(spot_price1)) <?php
                            $acuan=$order->signal;
                            echo ($acuan=="BUY LIMIT") ? "<=" : ($acuan=="BUY STOP" ? ">=" : ($acuan=="SELL LIMIT" ? ">=" : "<="));
                            ?> "{{ $order->price }}") {
                        if (OnTrade == false) {
                        if ($("#btnStart").text() == "Stop") {
                        OnTrade = true;
                        var msg = {
                                action: "newtrade",
                                data: {
                                account_type: $("#cmbAccountType option").filter(":selected").val(),
                                direction: "<?php
                                $acuan=$order->signal;
                                 echo ($acuan=="BUY LIMIT") ? "call" : ($acuan=="BUY STOP" ? "call" : ($acuan=="SELL LIMIT" ? "SELL" : "SELL"));
                            ?>",
                                asset_id: "{{ $order->market }}",
                                expiration: "{{ $order->duration }}",
                                investment: "{{ $order->investment }}",
                                },
                                token: $("#txt_t").val(),
                            };
                            fsocket.send(JSON.stringify(msg));
                        //alert(Ontrade);
                    // LastDirection = "SELL";
                        Signal='{{ $order->signal }}';
                    // OpenOrder(LastDirection);
                        }
                        if (OnTrade == 0) {
                    OnTrade = 1;
                    }
                        }
                    }
                break;
             @empty
                case "Pending":
                    // alert(spot_price1)
                    $("#Ticpoin").hide();
                    $("#Jam").hide();
                    $("#LimitS").show();
                    if (Math.abs(parseFloat(spot_price1)) <= "nodata") {
                        if (OnTrade == false) {
                        if ($("#btnStart").text() == "Stop") {
                        OnTrade = true;
                        var msg = {
                                action: "newtrade",
                                data: {
                                account_type: $("#cmbAccountType option").filter(":selected").val(),
                                direction: "Call",
                                asset_id: "nodata",
                                expiration: "nodata",
                                investment: "nodata",
                                },
                                token: $("#txt_t").val(),
                            };
                            fsocket.send(JSON.stringify(msg));
                        //alert(Ontrade);
                    // LastDirection = "SELL";
                        Signal='BUY -STOP';
                    // OpenOrder(LastDirection);
                        }
                        if (OnTrade == 0) {
                    OnTrade = 1;
                    }
                        }
                    }
                break;
            @endforelse
            case "Pending-order":
                    // alert(spot_price1)
                    $("#Ticpoin").hide();
                    $("#Jam").hide();
                    $("#LimitS").show();
                    if (Math.abs(parseFloat(spot_price1)) <= $("#ticBL").text()) {
                        if (OnTrade == false) {
                     if ($("#btnStart").text() == "Stop") {
                        OnTrade = true;
                        //alert(Ontrade);
                        LastDirection = "CALL";
                        Signal='BUY LIMIT';
                        OpenOrder(LastDirection);
                        }
                        $("#ticBL").text('DONE -> ' + getCookie("tic-priseBL"));
                        setCookie("tic-priseBL", $('#PointicBL').val(),"-365");
                        setCookie("priseBL", "BUY LIMIT","-365");

                        $("#OBL").remove();
                        if (OnTrade == 0) {
                    OnTrade = 1;
                    }
                        }
                    };
                    if (Math.abs(parseFloat(spot_price1)) >= $("#ticSL").text()) {
                        if (OnTrade == false) {
                     if ($("#btnStart").text() == "Stop") {
                        OnTrade = true;
                        //alert(Ontrade);
                        LastDirection = "PUT";
                        Signal='SELL LIMIT';
                        OpenOrder(LastDirection);
                        }
                        $("#ticSL").text('DONE -> ' + getCookie("tic-priseSL"));
                        setCookie("priseSL", "SELL LIMIT","-365");
                        setCookie("tic-priseSL", $('#PointicSL').val(),"-365");

                        $("#OSL").remove();
                        if (OnTrade == 0) {
                    OnTrade = 1;
                    }
                        }
                    };
                    if (Math.abs(parseFloat(spot_price1)) >= $("#ticBS").text()) {
                        if (OnTrade == false) {
                     if ($("#btnStart").text() == "Stop") {
                        OnTrade = true;
                        //alert(Ontrade);
                        LastDirection = "CALL";
                        Signal='BUY STOP';
                        OpenOrder(LastDirection);
                        }
                        $("#ticBS").text('DONE -> ' + getCookie("tic-priseBS"));
                        setCookie("tic-priseBS", $('#PointicBS').val(),"-365");
                        setCookie("priseBS", "BUY STOP","-365");
                        $("#OBS").remove();

                        if (OnTrade == 0) {
                    OnTrade = 1;
                    }
                        }
                    };
                    if (Math.abs(parseFloat(spot_price1)) <= $("#ticSS").text()) {
                        if (OnTrade == false) {
                     if ($("#btnStart").text() == "Stop") {
                        OnTrade = true;
                        //alert(Ontrade);
                        LastDirection = "CALL";
                        Signal='SELL STOP';
                        OpenOrder(LastDirection);
                        }
                        $("#ticSS").text('DONE -> ' + getCookie("tic-priseSS"));
                        setCookie("tic-priseSS", $('#PointicSS').val(),"-365");
                        setCookie("priseSS", "SELL STOP","-365");

                        $("#OSS").remove();
                        if (OnTrade == 0) {
                    OnTrade = 1;
                    }
                        }
                    };
                break;


            case "S_Stop":
            // alert(spot_price1)
            $("#Ticpoin").hide();
            $("#Jam").hide();
            // $("#Limit").show();
            if (Math.abs(parseFloat(spot_price1)) <= $("#PointicLS").val()) {
                if (OnTrade == false) {
                if ($("#btnStart").text() == "Stop") {
                OnTrade = true;
                Signal='PUT';
                LastDirection = "SELL";
                //alert("Result : Sending Order CALL ");
                OpenOrder(LastDirection);
                }
                if (OnTrade == 0) {
            OnTrade = 1;
            }
            }



            }
            break;
            case "B_Stop":
            // alert(spot_price1)
            $("#Ticpoin").hide();
            $("#Jam").hide();
            // $("#Limit").show();
            if (Math.abs(parseFloat(spot_price1)) >= $("#PointicLB").val()) {
                if (OnTrade == false) {
                if ($("#btnStart").text() == "Stop") {
                OnTrade = true;
                //alert(Ontrade);
                LastDirection = "CALL";
                Signal='CALL';
                OpenOrder(LastDirection);
                }
                if (OnTrade == 0) {
            OnTrade = 1;
            }
                }


            }
            break;

        case "timesignaltemplate":
        $("#Ticpoin").hide();
        $("#Limit").hide();
        if (OnTrade == false && OnMarti == false) {
            var dSignal = scanTimeSignalTemplate(waktu);
            //console.log(dSignal);
            if (dSignal != "N") {
            OnTrade = true;
            if (dSignal == "S") {
                OpenOrder("SELL");
                Signal='PUT';
            }
            if (dSignal == "B") {
                OpenOrder("Call");
                Signal='CALL';
            }
            }
        }
        break;
    }
    }

            /* Menu*/
            out.addEventListener(
    "click",
    function (e) {
        setCookie("_authToken", $("#txt_t").val(), "-365");
        location.reload();
    },
    false
    );
    if(($("#txt_t").val())==""){
        // window.open('https://wss.hyper-api.com/authorize.php?app_id=2999a8b9e1ecc9bd2f8d7d85aa46b0f7&grant=oauth&response_type=code&client_id=2999a8b9e1ecc9bd2f8d7d85aa46b0f7&state=smbot');
    //window.open("login.html");
    };
    // spot.addEventListener(
    // "click",
    // function (e) {
    //     // setCookie("_limit", $("#spot").text(), "365");

    //     S=parseFloat($("#PointLimit option").filter(":selected").val());
    //     B=parseFloat($("#spot").text())-S;
    //     A=parseFloat($("#spot").text())+S;

    //     // Bl=getCookie("_limit");
    //     // Sl=getCookie("_limit");
    //     $("#PointicLS").val(B.toFixed(5));
    //     $("#PointicLB").val(A.toFixed(5));
    // //alert(S)
    // });
    Dasboard.addEventListener(
    "click",
    function (e) {
        // if($("#home")){
            $("#settingshow").hide();
            $("#tabprofitshow").hide();
            $("#homeshow").show();
        // }
    });
    setting.addEventListener(
    "click",
    function (e) {
            Mark();
            $("#settingshow").show();
            $("#tabprofitshow").hide();
            $("#homeshow").hide();
        // };
        });
    tabprofit.addEventListener(
    "click",
    function (e) {
        //if($("#tabprofit")){
            $("#settingshow").hide()
            $("#tabprofitshow").show();
            $("#homeshow").hide();
        //  }
    });

    btnPut.addEventListener(
    "click",
    function (e) {
        // console.log("test");
        //if ($("#btnConnect").text() == "Disconnect") {
        if (fsocket_status == 1) {
            if (OnTrade == false && OnMarti == false) {
            if ($("#cmb_signal option").filter(":selected").val() === "manual") {
                if ($("#cmb_duration option").filter(":selected").val()) {
                if ($("#cmb_market option").filter(":selected").val()) {
                    Signal='PUT';
                    //if ($("#btnStart").text() == "Stop") {
                    OnTrade = true;
                    var msg = {
                        action: "newtrade",
                        data: {
                        account_type: $("#cmbAccountType option").filter(":selected").val(),
                        direction: "SELL",
                        asset_id: $("#cmb_market option").filter(":selected").val(),
                        expiration: $("#cmb_duration option").filter(":selected").val(),
                        investment: last_investment,
                        },
                        token: $("#txt_t").val(),
                    };
                    fsocket.send(JSON.stringify(msg));
                /* } else {
                    alert("Oops...Please Start First !");
                    }*/
                } else {
                    alert("Oops...Please select market for trade !");
                }
                } else {
                alert("Oops...Please select trade duration !");
                }
            } else {
                alert("Oops...Please select signal from Manual  !");
            }
            } else {
            alert("Oops...You have active transaction, please wait until transaction is finish !");
            }
        } else {
            alert("Oops...Connection to the spectre server is loss !");
        }
        /*} else {
        alert("Oops...Please connect first to use this service !");
        }*/
    },
    false
    );

    btnCal.addEventListener(
    "click",
    function (e) {
        //if ($("#btnConnect").text() == "Disconnect") {
        if (fsocket_status == 1) {
            if (OnTrade == false && OnMarti == false) {
            if ($("#cmb_signal option").filter(":selected").val() === "manual") {
                if ($("#cmb_duration option").filter(":selected").val()) {
                if ($("#cmb_market option").filter(":selected").val()) {
                    Signal='CALL';
                    //if ($("#btnStart").text() == "Stop") {
                    OnTrade = true;
                    var msg = {
                        action: "newtrade",
                        data: {
                        account_type: $("#cmbAccountType option").filter(":selected").val(),
                        direction: "Call",
                        asset_id: $("#cmb_market option").filter(":selected").val(),
                        expiration: $("#cmb_duration option").filter(":selected").val(),
                        investment: last_investment,
                        },
                        token: $("#txt_t").val(),
                    };
                    fsocket.send(JSON.stringify(msg));
                /*  } else {
                    alert("Oops...Please Start First !");
                    }*/
                } else {
                    alert("Oops...Please select market for trade !");
                }
                } else {
                alert("Oops...Please select trade duration !");
                }
            } else {
                alert("Oops.....Please select signal source from Manual Triger !");
            }
            } else {
            alert("Oops....You have active transaction, please wait until transaction is finish !");
            }
        } else {
            alert("Oops...Connection to the spectre server is loss !");
        }
        /*} else {
        alert("Oops...Please connect first to use this service !");
        }*/
    },
    false
    );


    btnGetPrice.addEventListener(
    "click",
    function (e) {
        switch ($("#btnGetPrice").text()) {
        case "Get Market":
            if (msocket_status == 1) {
            if (fsocket_status == 1) {
                if ($("#cmb_market").has("option").length > 0) {
                $("#cmb_market").attr("disabled", "disabled");
                $("#cmb_time_frame").attr("disabled", "disabled");
                $("#btnGetPrice").text("Change Market");
                myticker = [];
                $(".dynamicsparkline").sparkline(myticker, {
                    lineColor: "white",
                    lineWidth: "3.25",
                    height: "75",
                    width: "100%",
                    maxSpotColor: "blue",
                    minSpotColor: "red",
                    spotColor: "green",
                    fillColor: "",
                });
                Mark();
                /*var msg = {
                    action: "marketdatasubscribe",
                    data: {
                    asset_id: $("#cmb_market option").filter(":selected").val(),
                    period: $("#cmb_time_frame option").filter(":selected").val(),
                    subscribe: "1",
                    },
                    token: token,
                };
                msocket.send(JSON.stringify(msg));*/
                var msg = {
                    action: "AvailableExpiries",
                    data: { asset_id: getCookie("_active_market") },
                    token: $("#txt_t").val(),
                };
                fsocket.send(JSON.stringify(msg));
                } else {
                alert("Oops...Market data is not ready !");
                }
                chart();
            } else {
                alert("Oops...Connection to the spectre server is not yet connected !");
            }
            } else {
            alert("Oops...Connection to the spectre market data server is not yet connected !");
            }
            break;

        case "Change Market":
            $("#cmb_market").removeAttr("disabled");
            $("#cmb_time_frame").removeAttr("disabled");
            $("#btnGetPrice").text("Get Market");
            myticker = [];
            $(".dynamicsparkline").sparkline(myticker, {
            lineColor: "white",
            lineWidth: "3.25",
            height: "75",
            width: "100%",
            maxSpotColor: "blue",
            minSpotColor: "red",
            spotColor: "green",
            fillColor: "",
            });
        /* var msg = {
            action: "marketdatasubscribe",
            data: {
                asset_id: $("#cmb_market option").filter(":selected").val(),
                period: $("#cmb_time_frame option").filter(":selected").val(),
                subscribe: "1",
            },
            token: token,
            };
            msocket.send(JSON.stringify(msg));*/
            break;
        }
    },
    false
    );

    btnStart.addEventListener(
    "click",
    function (e) {
        if ($("#btnStart").text() == "Start") {
        // if ($("#btnConnect").text() == "Disconnect") {
            if ($("#cmb_market").has("option").length > 0) {
            if ($("#cmb_duration").has("option").length > 0) {
                $("#btnStart").text("Stop");
                $("#lblStartBalance").text($("#lblCurrentBalance").text());
                $("#lblPL").text("0.00").css("color", "White");
                $("#loss_t").text("0");
                $("#win_t").text("0");
                $("#lblTotalLoss").text("0.00");
                $("#lblTotalWin").text("0.00");
                $("#lblTransactionId").text("-");
                $("#lblEntryPrice").text("-");
                $("#lblEntryTime").text("-");
                $("#lblTradeStatus").text("Analisis");
                $("#lblInvest").text("-");
                $("#lblContract").text("-");
                $("#txt_invest").attr("disabled", "disabled");
                $("#Status").show();

                step_marti = 0;
                OnTrade = false;
                OnMarti = false;
                total = 0;
                transaction_id = "";
                last_investment = $("#txt_invest").val();
                if ($("#lossvirtual").val() != 0) {
                Demo = true;
                } else {
                Demo = false;
                }
                saveTimeSignalTemplate();
                if ($("#cmb_signal option").filter(":selected").val() != "manual") {
                // $("#Jam").show();
                SignalMonitorX = setInterval(getTimeScheduleX, 1000);
                SignalMonitor = setInterval(getTimeSchedule, 1000);
                } else {
                clearInterval(SignalMonitor);
                Demo = false;
                }
            } else {
                alert("Oops...Please select trade duration. If empty please Get Market  first !");
            }
            } else {
            alert("Oops...Please select trade market !");
            }
        /* } else {
            alert("Oops...Please Connect first !");
        }*/
        } else {
        $("#btnStart").text("Start");
        $("#lblTransactionId").text("-");
        $("#lblEntryPrice").text("-");
        $("#lblEntryTime").text("-");
        $("#lblTradeStatus").text("Analisis");
        $("#lblTotalLoss").text("0.00");
        $("#lblTotalWin").text("0.00");
        $("#trx_atv").hide()
        $("#loss_t").text("0");
        $("#win_t").text("0");
        $("#lblInvest").text("-");
        $("#lblContract").text("-");
        $("#txt_invest").removeAttr("disabled");
        clearInterval(SignalMonitor);

        }
    },
    false
    );
    /*
    btnConnect.addEventListener(
    "click",
    function (e) {
        if ($("#btnConnect").text() == "Connect") {
        if (token) {
            if (fsocket_status == 1) {
            if ($("#cmbAccountType option").filter(":selected").val() == 4) {
                $("#VirtualSistem").show();
            } else {
                $("#VirtualSistem").show();
            }

            if (!Demo) {
                var msg = {
                action: "userdata",
                data: {
                    account_type: $("#cmbAccountType option").filter(":selected").val(),
                },
                token: $("#txt_t").val(),
                id: $("#txtId").val(),
                };
                fsocket.send(JSON.stringify(msg));
            } else {
                var msg = {
                action: "userdata",
                data: { account_type: 1 },
                token: token,
                id: $("#txtId").val(),
                };
                fsocket.send(JSON.stringify(msg));
            }
            // Mark();
            } else {
            alert("Oops...Connection to the spectre server is not yet connected !");
            }
        } else {
            alert("Oops...Please insert your API Token !");
        }
        } else {
        location.reload();
        if (fsocket_status == 1) {
            var msg = {
            action: "tradesubscribe",
            data: { subscribe: 0 },
            token: $("#txt_t").val(),
            };
            fsocket.send(JSON.stringify(msg));
        }
        $("#txtToken").removeAttr("disabled");
        $("#cmbAccountType").removeAttr("disabled");
        $("#btnConnect").text("Connect");
        $("#hisTory").attr("disabled", "disabled");
        $("#btnStart").attr("disabled", "disabled");

        $("#btnStart").text("Start");

        $("#lblAccId").text("-");
        $("#lblStartBalance").text("0.00");
        $("#lblCurrentBalance").text("0.00");
        $("#lblPL").text("0.00");
        $("#lblTotalLoss").text("0.00");
        $("#lblTotalWin").text("0.00");
        $("#lblTransactionId").text("-");
        $("#lblEntryPrice").text("-");
        $("#lblEntryTime").text("-");
        $("#lblTradeStatus").text("N/A");
        $("#lblInvest").text("-");
        $("#lblContract").text("-");
        $("#txt_invest").removeAttr("disabled");
        }
    },
    false
    );

    /* fungsi Buy/Sell */
    function OpenOrder(direction) {
    // console.log("Ekeskusi" + direction);
    if (fsocket_status == 1) {
        if (!Demo) {
        var msg = {
            action: "newtrade",
            data: {
            account_type: $("#cmbAccountType option").filter(":selected").val(),
            direction: direction,
            asset_id: $("#cmb_market option").filter(":selected").val(),
            expiration: $("#cmb_duration option").filter(":selected").val(),
            investment: last_investment,
            },
            token: $("#txt_t").val(),
        };
        fsocket.send(JSON.stringify(msg));
        } else {
        var msg = {
            action: "newtrade",
            data: {
            account_type: 1,
            direction: direction,
            asset_id: $("#cmb_market option").filter(":selected").val(),
            expiration: $("#cmb_duration option").filter(":selected").val(),
            investment: 1,
            },
            token: $("#txt_t").val(),
        };
        fsocket.send(JSON.stringify(msg));
        }
    }
    }

    /* signal Template Set */
    function scanTimeSignalTemplate(waktu) {
    var tsSignal = "N";
    var aWaktu = waktu.split(":");
    var aJam = aWaktu[0];
    var aMenit = aWaktu[1];
    var awExec = aJam + ":" + aMenit;
    // console.log("Scan signal " + awExec);
    if (getCookie("_setSignalTemplate")) {
        var bData = JSON.parse(getCookie("_setSignalTemplate"));
        //console.log(bData);
        if (bData.length > 0) {
        for (var c = 0; c <= bData.length; c++) {
            if (bData[c]) {
            var csData = bData[c].split(" ");
            var csWaktu = csData[0] + ":00";
            var csSignal = csData[1];
            // console.log("Scan waktu " + csWaktu + " -> " + awExec);
            if (csWaktu == waktu) {
                tsSignal = csSignal;
                //console.log("Ada signal ");
                break;
            }
            }
        }
        }
    }
    return tsSignal;
    }

    /* signal Template Set */
    function saveTimeSignalTemplate() {
    var data = $("#txtSignalTemplate").val();
    var baris_signal = data.split(/\n/);
    baris_signal = jQuery.unique(baris_signal);
    baris_signal.sort();
    var stringArray = new Array();
    var sWaktu, sSignal;
    for (var i in baris_signal) {
        var lsignal = baris_signal[i];
        lsignal = lsignal.split(" ");
        if (lsignal.length > 0) {
        sWaktu = lsignal[0];
        sSignal = lsignal[1];
        var wExec = sWaktu.split(":");
        if (wExec.length > 0) {
            if (sSignal == "S" || sSignal == "B") {
            var buffer = sWaktu + " " + sSignal.toLocaleUpperCase();
            stringArray.push(buffer);
            }
        }
        }
    }
    setCookie("_setSignalTemplate", JSON.stringify(stringArray), "365");
    }

    cmb_time_frame.addEventListener(
    "change",
    function (e) {
        if ($("#cmb_time_frame option").filter(":selected").val() != getCookie("_active_period")) {
        var msg0 = {
            action: "marketdatasubscribe",
            data: {
                asset_id: $("#cmb_market option").filter(":selected").val(),
                period: $("#cmb_time_frame option").filter(":selected").val(),
                subscribe: "0",
            },
            token: $("#txt_t").val(),
            };
            msocket.send(JSON.stringify(msg0));
        setCookie("_active_period", $("#cmb_time_frame option").filter(":selected").val(), "365");
        var msg0 = {
            action: "marketdatasubscribe",
            data: {
                asset_id: $("#cmb_market option").filter(":selected").val(),
                period: $("#cmb_time_frame option").filter(":selected").val(),
                subscribe: "1",
            },
            token: $("#txt_t").val(),
            };
            msocket.send(JSON.stringify(msg0));
        }
    },
    false
    );

    // cmb_duration.addEventListener('change', function(e) {
    if ($("#cmb_duration option").filter(":selected").val()) {
    setCookie("_active_duration", $("#cmb_duration option").filter(":selected").val(), "365");
    }
    // },false);
    // portrait.addEventListener("change", function(e) {
    //     if(e.matches) {
    //         $("#PotR").hide();
    //         $("#Landscape").show();
    //         //alert('Landscape')
    //         // Portrait mode
    //     } else {
    //         // Landscape
    //         $("#PotR").show();
    //         $("#Landscape").hide();
    //         Mark();
    //     }
    // });

    cmb_if_signal_false.addEventListener(
    "change",
    function (e) {
        if ($("#cmb_if_signal_false option").filter(":selected").val() != getCookie("_setIfSignalFalse")) {
        setCookie("_setIfSignalFalse", $("#cmb_if_signal_false option").filter(":selected").val(), "365");
        }
    },
    false
    );

    cmb_after_step.addEventListener(
    "change",
    function (e) {
        if ($("#cmb_after_step option").filter(":selected").val() != getCookie("_setAfterMaxStep")) {
        setCookie("_setAfterMaxStep", $("#cmb_after_step option").filter(":selected").val(), "365");
        }
    },
    false
    );

    cmb_market.addEventListener(
    "change",
    function (e) {
        if ($("#cmb_market option").filter(":selected").val() != getCookie("_active_market")) {
            var msg3 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 900,
            subscribe: "0",
        },
        token: $("#txt_t").val(),
        };
        msocket3.send(JSON.stringify(msg3));
        var msg2 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 300,
            subscribe: "0",
        },
        token: $("#txt_t").val(),
        };
        msocket2.send(JSON.stringify(msg2));
        var msg1 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 60,
            subscribe: "0",
        },
        token: $("#txt_t").val(),
        };
        msocket1.send(JSON.stringify(msg1));
        var msg0 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: $("#cmb_time_frame option").filter(":selected").val(),
            subscribe: "0",
        },
        token: $("#txt_t").val(),
        };
        msocket.send(JSON.stringify(msg0));

        setCookie("_active_market", $("#cmb_market option").filter(":selected").val(), "365");
        chart();
        }
        var msg1 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 60,
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket1.send(JSON.stringify(msg1));
        var msg2 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 300,
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket2.send(JSON.stringify(msg2));
        var msg3 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 900,
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket3.send(JSON.stringify(msg3));
        var msg0 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: $("#cmb_time_frame option").filter(":selected").val(),
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket.send(JSON.stringify(msg0));
    },
    false
    );

    cmb_signal.addEventListener(
    "change",
    function (e) {
        /*  if ($("#cmb_signal option").filter(":selected").val()!=getCookie("_setSignalSource")){
            setCookie("_setSignalSource",$("#cmb_signal option").filter(":selected").val(),"365");
        }*/
        if ($("#cmb_signal option").filter(":selected").val() === "manual") {
        $("#Auto").hide();
        $("#man").show();
        } else {
        $("#man").hide();
        $("#Auto").show();
        };
        if ($("#cmb_signal option").filter(":selected").val() === "timesignaltemplate") {
        $("#Ticpoin").hide();
        $("#Jam").show();
        } else {
        $("#Jam").hide();
        };

        if ($("#cmb_signal option").filter(":selected").val() === "ctpoint" || "ctpointF") {
        $("#Ticpoin").show();
        $("#Limit").hide();
        } else {
        $("#Ticpoin").hide();
        };
        if ($("#cmb_signal option").filter(":selected").val() === "timesignaltemplate") {
        $("#Ticpoin").hide();
        $("#Limit").hide();
        };
        if ($("#cmb_signal option").filter(":selected").val() === "pattern") {
            $("#Ticpoin").hide();
            $("#Limit").hide();
        };
        if ($("#cmb_signal option").filter(":selected").val() === "Pending") {
            $("#Ticpoin").hide();
            $("#Limit").show();
            $("#BLimit").show();
            //$("#SLimit").hide();
            $("#BStop").hide();
            $("#SStop").hide();
            $("#PointicLB").hide();
           // $("#PointicLS").show();
        };
        if ($("#cmb_signal option").filter(":selected").val() === "Pending-order") {
            $("#Ticpoin").hide();
            $("#Limit").show();
            $("#BLimit").hide();
            $("#SLimit").show();
            $("#BStop").hide();
            $("#SStop").hide();
            $("#PointicBL").show();
            pdod.addEventListener(
                "change",
                function (e) {
            if ($("#pdod option").filter(":selected").val() === "BUY LIMIT"){
                $("#PointicBL").show();
                $("#PointicSL").hide();
                $("#PointicSS").hide();
                $("#PointicBS").hide();
            }
            if ($("#pdod option").filter(":selected").val() === "SELL LIMIT"){
                $("#PointicBL").hide();
                $("#PointicSL").show();
                $("#PointicSS").hide();
                $("#PointicBS").hide();
            }
            if ($("#pdod option").filter(":selected").val() === "BUY STOP"){
                $("#PointicBL").hide();
                $("#PointicSL").hide();
                $("#PointicSS").hide();
                $("#PointicBS").show();
            }
            if ($("#pdod option").filter(":selected").val() === "SELL STOP"){
                $("#PointicBL").hide();
                $("#PointicSL").hide();
                $("#PointicSS").show();
                $("#PointicBS").hide();
            }
        });


        };
        if ($("#cmb_signal option").filter(":selected").val() === "B_Stop") {
            $("#Ticpoin").hide();
            $("#Limit").show();
            $("#BLimit").hide();
            $("#SLimit").hide();
            $("#BStop").show();
            $("#SStop").hide();
            $("#PointicLB").hide();
            $("#PointicLS").show();
        };
        if ($("#cmb_signal option").filter(":selected").val() === "S_Stop") {
            $("#Ticpoin").hide();
            $("#Limit").show();
            $("#BLimit").hide();
            $("#SLimit").hide();
            $("#BStop").hide();
            $("#SStop").show();
            $("#PointicLB").show();
            $("#PointicLS").hide();
        };

        if ($("#cmb_signal option").filter(":selected").val() === "Rul3") {
            $("#Ticpoin").hide();
            $("#Limit").hide();
        };

        if ($("#cmb_signal option").filter(":selected").val() != "manual") {
        if ($("#btnConnect").text() == "Disconnect") {
            SignalMonitor = setInterval(getTimeSchedule, 1000);
            SignalMonitorX = setInterval(getTimeScheduleX, 1000);
        }
        } else {
        $("#Ticpoin").hide();
        $("#Jam").hide();
        $("#Limit").hide();
        clearInterval(SignalMonitor);
        }
    },
    false
    );

    customSwitch2.addEventListener(
    "change",
    function (e) {
        if ($("#customSwitch2").is(":checked")) {
        setCookie("_setPlaySound", "1", "365");
        } else {
        setCookie("_setPlaySound", "0", "365");
        }
    },
    false
    );
    cmbAccountType.addEventListener(
    "change",
    function (e) {
        if ($("#cmbAccountType option").filter(":selected").val() != getCookie("_authAccountType")) {
    var msg = {
                action: "userdata",
                data: {
                    account_type: $("#cmbAccountType option").filter(":selected").val(),
                },
                token: $("#txt_t").val(),

                };
                fsocket.send(JSON.stringify(msg));
        }
    },
    false
    );

    $("#txt_muliplier").keypress(function (e) {
    if (e.which == 46) {
        if ($(this).val().indexOf(".") != -1) {
        return false;
        }
    }
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
    });

    $("#txt_muliplier").keyup(function (e) {
    setCookie("_setMultiplier", $("#txt_muliplier").val(), "365");
    });

    $("#txt_invest").keypress(function (e) {
    if (e.which == 46) {
        if ($(this).val().indexOf(".") != -1) {
        return false;
        }
    }
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
    });

    $("#txt_invest").keyup(function (e) {
    setCookie("_setBaseInvest", $("#txt_invest").val(), "365");
    });

    $("#txt_stoploss").keypress(function (e) {
    if (e.which == 46) {
        if ($(this).val().indexOf(".") != -1) {
        return false;
        }
    }
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
    });

    $("#txt_stoploss").keyup(function (e) {
    setCookie("_setStopLoss", $("#txt_stoploss").val(), "365");
    });

    $("#txt_takeprofit").keypress(function (e) {
    if (e.which == 46) {
        if ($(this).val().indexOf(".") != -1) {
        return false;
        }
    }
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
    });

    $("#txt_takeprofit").keyup(function (e) {
    setCookie("_setTakeProfit", $("#txt_takeprofit").val(), "365");
    });

    $("#txt_max_step").keypress(function (e) {
    if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
    });

    $("#txt_max_step").keyup(function (e) {
    setCookie("_setMaxStep", $("#txt_max_step").val(), "365");
    });

    $("#txtSignalTemplate").keyup(function (e) {
    saveTimeSignalTemplate();
    });

    /* end object handler */

    /* api spectre trader */
    fsocket = new ReconnectingWebSocket("wss://wss.hyper-api.com:5553/spectreai/", AppId);

    fsocket.addEventListener("open", function (event) {
    fsocket_status = 1;
    $("#fserver").css('color','green');

    var msg = {
                action: "userdata",
                data: {
                    account_type: $("#cmbAccountType option").filter(":selected").val(),
                },
                token:$("#txt_t").val(),

                };
                fsocket.send(JSON.stringify(msg));
                var msg = {
                action: "assets",
                data: {},
                token: $("#txt_t").val(),
                };
                fsocket.send(JSON.stringify(msg));


            var msg = {
            action: "AvailableExpiries",
            data: { asset_id: getCookie("_active_market") },
            token: $("#txt_t").val(),
            };
            fsocket.send(JSON.stringify(msg));

    if ($("#btnConnect").text() == "Disconnect") {
        var msg = {
        action: "tradesubscribe",
        data: { subscribe: 1 },
        token: $("#txt_t").val(),
        };
        fsocket.send(JSON.stringify(msg));

    }
    });

    fsocket.addEventListener("close", function (event) {
    $("#fserver").text('color','red');
    //$('#myModal').modal('show');
    fsocket_status = 0;
    });

    fsocket.addEventListener("message", function (event) {
    var js = JSON.parse(event.data);
    tableprofit =
        '<table class="table table-sm table-bordered table-hover" style="font-size: 12px; td.padding:2px;"><thead><tr><td>No</td><td>Trx Id</td> <td>Assets</td><td>Volume</td><td>Duration</td><td> Contract</td><td>Entry Price</td><td>Exit Price</td><td> Result</td></tr></thead><tbody>' +
        tableN +
        "</tbody></table>";
    $("#datatablesSimple").html(tableprofit);
    switch (js.action) {
        case "userdata":
        if (js.userdata.hasOwnProperty("user_id")) {
            var user_id = js.userdata.user_id;
            var account_type = js.userdata.account_type;
            //cek apakah user sudah terdaftar ?
            setCookie("_authAccountType", js.userdata.account_type, "365");
            setCookie("_authToken", $("#txt_t").val(), "365");
            setCookie("_authTrader", user_id, "365");
            $("#txtToken").attr("disabled", "disabled");
        // $("#cmbAccountType").attr("disabled", "disabled");
            $("#btnConnect").text("Disconnect");
            $("#btnStart").removeAttr("disabled");
            $("#hisTory").removeAttr("disabled");
            $("#hisTor").show();
            $("#btnStart").text("Start");

            $("#lblAccId").text(js.userdata.user_id);
            $("#lblStartBalance").text(js.userdata.account_balance);
            $("#lblCurrentBalance").text(js.userdata.account_balance);
            $("#lblPL").text("0.00");
            $("#lblTotalLoss").text("0.00");
            $("#lblTotalWin").text("0.00");
            $("#loss_t").text("0");
            $("#ein_t").text("0");
            if (js.userdata.account_type == 4){
                if (js.userdata.account_balance < 100) {
                window.open('/deposit');
            }
            };

            if (fsocket_status == 1) {
            var msg = {
                action: "tradesubscribe",
                data: { subscribe: 1 },
                token: $("#txt_t").val(),
            };
            fsocket.send(JSON.stringify(msg));

            if ($("#cmb_market").has("option").length == 0) {
                var msg = {
                action: "assets",
                data: {},
                token: $("#txt_t").val(),
                };
                fsocket.send(JSON.stringify(msg));
            }
            }
            // var msg = {
            //   action: "AvailableExpiries",
            //   data: { asset_id: getCookie("_active_market") },
            //   token: token,
            // };
            // fsocket.send(JSON.stringify(msg));
        } else {
            alert("Oops...Invalid API Token !");
        }
        break;

        case "newtrade":
        if (js.hasOwnProperty("error_msg")) {
            console.log("Entry failed : " + js.newtrade.error_msg);
        } else {
            transaction_id = js.newtrade.transaction_id;
            var entry_price = js.newtrade.entry_price;
            var entry_time = js.newtrade.track_data.created_on;
            var expire_time = js.newtrade.track_data.expired_on;
            last_invest = js.newtrade.investment;
            var direction = js.newtrade.track_data.direction;
            last_direction = direction == "PUT" ? "SELL" : "Call";
            last_market = js.newtrade.track_data.asset;
            last_duration = js.newtrade.expiration_value;
            //var ref_id=js.data.Refid;

            if (js.status == "success") {
            $("#trx_atv").show();
            $("#Status").hide();
            OnTrade = true;
            $("#lblTransactionId").text(transaction_id);
            $("#lblEntryPrice").text(entry_price);
            $("#lblEntryTime").text(entry_time);
            $("#lblTradeStatus").css('color','orange').text(Signal);
            $("#lblInvest").text(last_invest);
            $("#lblContract").text(direction);
            // setCookie("_limit", $("#spot").text(), "-365");
            //  setCookie("_limitD", $("#spot").text("Done"), "365");
            $("#PointicLS").val("Done");
            $("#PointicLB").val("Done");
            position: direction;
            acctype: js.data.account_type;
            transaction_id: transaction_id;
            volume: last_invest;
            duration: last_duration;
            market: last_market;
            create_date: entry_time;
            entry: entry_price;
            trader_id: getCookie("_authTrader");
            if ($("#customSwitch2").is(":checked") == true) {
                // playSound("./media/sound/signal.mp3");
            }
            } else {
            $("#Status").show()
                $("#lblTradeStatus").css('color','orange').text('Analisis');
            if ($("#customSwitch2").is(":checked") == true) {
                // playSound("./media/sound/signal.mp3");
            }
            }
        }
        break;

        case "assets":
        for (var s = 0; s < js.assets.length - 1; s++) {
            var sid = js.assets[s].id;
            var sname = js.assets[s].asset;

            var isOpen = js.assets[s].isMarketOpen;
            var s_name = sname;
            if (isOpen == "1") {
            $("#cmb_market").append("<option value='" + sid + "'>"+ sname + "</option>");
            $("#cmb_marketlis").append("<option value='" + sid + "'>"+ sname + "</option>");
            }
        }
        if (getCookie("_active_market")) {
            $("#cmb_market option[value=" + getCookie("_active_market") + "]").attr("selected", "selected");

        } else {
            setCookie("_active_market", "100", "365");
            $("#cmb_market option[value=100]").attr("selected", "selected");
        }
        break;

        case "AvailableExpiries":
        $("#cmb_duration").find("option").remove();
        for (var x = 0; x < js.availableexpiries.length - 1; x++) {
            if (js.availableexpiries[x] != "C") {
            var tfname;
            switch (js.availableexpiries[x]) {
                case "CEO1M":
                tfname = "End Of Candle 1 Minute";
                break;
                case "CEO5M":
                tfname = "End Of Candle 5 Minute";
                break;
                case "CEO15M":
                tfname = "End Of Candle 15 Minute";
                break;
                case "CEO30M":
                tfname = "End Of Candle 30 Minute";
                break;
                case "CEO1H":
                tfname = "End Of Candle 1 Hour";
                break;
                default:
                tfname = js.availableexpiries[x];
            }
            $("#cmb_duration").append("<option value='" + js.availableexpiries[x] + "'>" + tfname + "</option>");
            $("#cmb_duration2").append("<option value='" + js.availableexpiries[x] + "'>" + tfname + "</option>");
            }
        }

        if (getCookie("_active_duration")) {
            if ($("#cmb_duration").find("option:contains('" + getCookie("_active_duration") + "')").length > 0) {
            $("#cmb_duration option[value=" + getCookie("_active_duration") + "]").attr("selected", "selected");
            } else {
            setCookie("_active_duration", "1s", "365");
            $("#cmb_duration option[value=" + "60s" + "]").attr("selected", "selected");
            }
        } else {
            /*setCookie("_active_duration", "60s", "365");
            $("#cmb_duration option[value=" + "60s" + "]").attr("selected", "selected");*/
        }
        break;

        case "TradeDetails":
        if (js.tradedetails.profit != null) {
            transaction_id = "";
            if (js.tradedetails.profit >= 0) {
            $("#trx_atv").hide();
            $("#lblTradeStatus").text("WIN");
            setCookie("_limit", $("#spot").text(), "365");

        S=parseFloat($("#PointLimit option").filter(":selected").val());
        B=parseFloat($("#spot").text())-S;
        A=parseFloat($("#spot").text())+S;

        // Bl=getCookie("_limit");
        // Sl=getCookie("_limit");
        $("#PointicLS").val(B.toFixed(5));
        $("#PointicLB").val(A.toFixed(5));
            // step_marti = 0;
            // lost_t = 0;
            // win_t++;
            if ($("#customSwitch2").is(":checked") == true) {
                // playSound("assets/sounds/signal.wav");
            }
            last_invest = $("#txt_invest").val();
            } else {
            $("#trx_atv").hide();
            $("#lblTradeStatus").text("LOSS");
            setCookie("_limit", $("#spot").text(), "365");

        S=parseFloat($("#PointLimit option").filter(":selected").val());
        B=parseFloat($("#spot").text())-S;
        A=parseFloat($("#spot").text())+S;

        // Bl=getCookie("_limit");
        // Sl=getCookie("_limit");
        $("#PointicLS").val(B.toFixed(5));
        $("#PointicLB").val(A.toFixed(5));
            // step_marti++;
            // win_t = 0;
            // lost_t++;
            if ($("#customSwitch2").is(":checked") == true) {
                // playSound("assets/sounds/signal.wav");
            }
            //marti disini
            }
        }

        break;

        case "tradesubscribe":
                if (transaction_id) {
                    var msg = {
                        action: "TradeDetails",
                        data: { transaction_id: transaction_id },
                        token: $("#txt_t").val(),
                    };
                    fsocket.send(JSON.stringify(msg));
                }
                if (Demo) {
                    var regex1 = /Outcome/g;
                    var match = event.data.match(regex1);
                    if (match == null) {
                        var profit = js.msg.profit;
                        var ast = js.msg.currency;
                        var Durasi = js.msg.expiration_text;
                        var trx_info = js.msg.exit_price;
                        var Entry = js.msg.entry_price;
                        var last_balance = js.msg.outcome_balance;
                        var trx_id = js.msg.transaction_id;
                        var ref_id = js.msg.RefId;
                        var user_type = js.msg.account_type;
                        var investment = js.msg.investment;
                        var direction = js.msg.direction;
                        if (trx_id == transaction_id) {
                            var trx = trx_id;
                            var profi = profit;
                            var time_resul = trx_info;
                            transaction_id = "";
                            OnTrade = false;
                            //Demo$///
                            $("#lblCurrentBalanc").text(last_balance);
                            var plD =
                                parseFloat($("#lblCurrentBalanc").text()) -
                                parseFloat($("#lblStartBalance").text());
                            $("#lblP").text(plD.toFixed(3));
                            //End_____
                            if (parseFloat(profit) == 0) {
                                $("#lblTradeStatus").text("TIE");
                                lossvirtual = 0;
                                Bg = "#";
                                color = "green";
                                table =
                                    "<tr style='background:" +
                                    Bg +
                                    ";color:" +
                                    color +
                                    "'><td>Demo[" +
                                    lossvirtual +
                                    "]<td>" +
                                    trx +
                                    "</td><td>" +
                                    ast +
                                    "</td><td>" +
                                    investment +
                                    "</td><td>" +
                                    Durasi +
                                    "<td>" +
                                    direction +
                                    "</td><td>" +
                                    Entry +
                                    "</td><td>" +
                                    trx_info +
                                    "</td><td>" +
                                    profi +
                                    "</td></tr>";
                                tableN = table + tableS;
                                tableS = tableN;
                                coi++;
                                tableL[coi] = table.length;
                                if (coi > 0x32)
                                    tableS = tableS.slice(0, -tableL[coi - 0x32]);
                                OnTrade = false;
                                //last_investment = 1;
                            } else if (parseFloat(profit) < 0) {
                                if (
                                                    $("#cmb_Ves option")
                                                        .filter(":selected")
                                                        .val() == "Vesloss"
                                                ) {
                                                lossvirtual++;
                                                }else{
                                                    lossvirtual=0;
                                                }

                                Bg = "#";
                                color = "red";
                                table =
                                    "<tr style='background:" +
                                    Bg +
                                    ";color:" +
                                    color +
                                    "'><td>Demo[" +
                                    lossvirtual +
                                    "]<td>" +
                                    trx +
                                    "</td><td>" +
                                    ast +
                                    "</td><td>" +
                                    investment +
                                    "</td><td>" +
                                    Durasi +
                                    "<td>" +
                                    direction +
                                    "</td><td>" +
                                    Entry +
                                    "</td><td>" +
                                    trx_info +
                                    "</td><td>" +
                                    profi +
                                    "</td></tr>";
                                tableN = table + tableS;
                                tableS = tableN;
                                coi++;
                                tableL[coi] = table.length;
                                if (coi > 0x32)
                                    tableS = tableS.slice(0, -tableL[coi - 0x32]);
                                $("#lblTradeStatus").text("LOSS");

                                    if (lossvirtual >= $("#lossvirtual").val()) {
                                        if (
                                                    $("#cmb_Ves option")
                                                        .filter(":selected")
                                                        .val() == "Vesloss"
                                                ) {
                                                    Demo=false;
                                                }else{
                                                    Demo=true;
                                                }
                                    }

                            // last_investment = 1;
                            } else {
                                $("#lblTradeStatus").text("WIN");
                                if (
                                                    $("#cmb_Ves option")
                                                        .filter(":selected")
                                                        .val() == "Veswin"
                                                ) {
                                                lossvirtual++;
                                                }else{
                                                    lossvirtual=0;
                                                }
                                Bg = "#";
                                color = "green";
                                table =
                                    "<tr style='background:" +
                                    Bg +
                                    ";color:" +
                                    color +
                                    "'><td>Demo[" +
                                    lossvirtual +
                                    "]<td>" +
                                    trx +
                                    "</td><td>" +
                                    ast +
                                    "</td><td>" +
                                    investment +
                                    "</td><td>" +
                                    Durasi +
                                    "<td>" +
                                    direction +
                                    "</td><td>" +
                                    Entry +
                                    "</td><td>" +
                                    trx_info +
                                    "</td><td>" +
                                    profi +
                                    "</td></tr>";
                                tableN = table + tableS;
                                tableS = tableN;
                                coi++;
                                tableL[coi] = table.length;
                                if (coi > 0x32)
                                    tableS = tableS.slice(0, -tableL[coi - 0x32]);
                                    if (lossvirtual >= $("#lossvirtual").val()) {
                                        if (
                                                    $("#cmb_Ves option")
                                                        .filter(":selected")
                                                        .val() == "Veswin"
                                                ) {
                                                    Demo=false;
                                                }else{
                                                    Demo=true;
                                                }
                                    }
                                step_marti = 0;
                                OnMarti = false;
                                OnTrade = false;
                            // last_investment = 1;
                            }
                        }
                    }
                } else {
                    lossvirtual = 0;
                    var regex1 = /Outcome/g;
                    var match = event.data.match(regex1);
                    if (match == null) {
                        var profit = js.msg.profit;
                        var ast = js.msg.currency;
                        var Durasi = js.msg.expiration_text;
                        var trx_info = js.msg.exit_price;
                        var Entry = js.msg.entry_price;
                        var last_balance = js.msg.outcome_balance;
                        var trx_id = js.msg.transaction_id;
                        var ref_id = js.msg.RefId;
                        var user_type = js.msg.user_account_type;
                        var investment = js.msg.investment;
                        var direction = js.msg.direction;
                        // var tx="";
                        if (trx_id == transaction_id) {
                            // tz++;
                            // var tt =0;
                            var trx = trx_id;
                            var profi = profit;
                            var time_resul = trx_info;
                            // var direction=exit_price;
                            transaction_id = "";
                            OnTrade = false;
                            //alert(trx_id);
                            $("#lblCurrentBalance").text(last_balance);
                            var pl =
                                parseFloat($("#lblCurrentBalance").text()) -
                                parseFloat($("#lblStartBalance").text());
                            $("#lblPL")
                                .text(pl.toFixed(3))
                                .css("color", pl > 0 ? "green" : "#F5322F");
                            plt = pl.toFixed(3);
                            if (parseFloat(profit) == 0) {
                                $("#lblTradeStatus").css('color','white').text("TIE");
                                total++;
                                Bg = "#a9eafc";
                                color = "Black";
                                table =
                                    "<tr style='background:" +
                                    Bg +
                                    ";color:" +
                                    color +
                                    "'><td>" +
                                    total +
                                    "<td>" +
                                    trx +
                                    "</td><td>" +
                                    ast +
                                    "</td><td>" +
                                    investment +
                                    "</td><td>" +
                                    Durasi +
                                    "<td>" +
                                    direction +
                                    "</td><td>" +
                                    Entry +
                                    "</td><td>" +
                                    trx_info +
                                    "</td><td>" +
                                    profi +
                                    "</td></tr>";
                                tableN = table + tableS;
                                tableS = tableN;
                                coi++;
                                tableL[coi] = table.length;
                                if (coi > 0x32)
                                    tableS = tableS.slice(0, -tableL[coi - 0x32]);
                                if ($("#customSwitch2").is(":checked") == true) {
                                    playSound("./media/sound/signal.mp3");
                                }
                                OnTrade = false;
                                last_investment = investment;
                                $("#lblTotalWin").text(
                                    parseFloat($("#lblTotalWin").text()) + 1
                                );
                            } else if (parseFloat(profit) > 0) {
                                $("#lblTradeStatus").css('color','green').text("WIN");


                                total++;
                                Bg = "#77f2bd";
                                color = "Black";
                                table =
                                    "<tr style='background:" +
                                    Bg +
                                    ";color:" +
                                    color +
                                    "'><td>" +
                                    total +
                                    "<td>" +
                                    trx +
                                    "</td><td>" +
                                    ast +
                                    "</td><td>" +
                                    investment +
                                    "</td><td>" +
                                    Durasi +
                                    "<td>" +
                                    direction +
                                    "</td><td>" +
                                    Entry +
                                    "</td><td>" +
                                    trx_info +
                                    "</td><td>" +
                                    profi +
                                    "</td></tr>";
                                tableN = table + tableS;
                                tableS = tableN;
                                coi++;
                                tableL[coi] = table.length;
                                if (coi > 0x32)
                                    tableS = tableS.slice(0, -tableL[coi - 0x32]);
                                if ($("#lossvirtual").val() != 0){
                                    Demo=true;
                                }
                                // lost_t = 0;
                                // win_t++;
                                // alert(trx);
                                if ($("#customSwitch2").is(":checked") == true) {
                    playSound("{{ url('mt/assets/sounds/itm.wav') }}");
                }
                                step_marti = 0;
                                OnMarti = false;
                                OnTrade = false;
                                last_investment = $("#txt_invest").val();
                                $("#lblTotalWin").text(
                                    parseFloat($("#lblTotalWin").text()) + 1
                                );
                            } else {
                                $("#lblTradeStatus").css('color','red').text("LOSS");

                                total++;
                                step_marti++;
                                // win_t = 0;
                                // lost_t++;
                                OnMarti = true;
                                Bg = "#f29877";
                                color = "Black";
                                table =
                                    "<tr style='background:" +
                                    Bg +
                                    ";color:" +
                                    color +
                                    "'><td>" +
                                    total +
                                    "<td>" +
                                    trx +
                                    "</td><td>" +
                                    ast +
                                    "</td><td>" +
                                    investment +
                                    "</td><td>" +
                                    Durasi +
                                    "<td>" +
                                    direction +
                                    "</td><td>" +
                                    Entry +
                                    "</td><td>" +
                                    trx_info +
                                    "</td><td>" +
                                    profi +
                                    "</td></tr>";
                                tableN = table + tableS;
                                tableS = tableN;
                                coi++;
                                tableL[coi] = table.length;
                                if (coi > 0x32)
                                    tableS = tableS.slice(0, -tableL[coi - 0x32]);
                                    if ($("#lossvirtual").val() != 0){
                                    if (
                                                    $("#cmb_VesLoss option")
                                                        .filter(":selected")
                                                        .val() == "lossV"
                                                ) {
                                                    Demo = true;
                                                }else{
                                                    Demo = false;
                                                }
                                }
                                // $("#lblTotalLoss").text(parseFloat($("#lblTotalLoss").text())+1);
                                if ($("#customSwitch2").is(":checked") == true) {
                    playSound("{{ url('mt/assets/sounds/otm.wav') }}");
                }
                                //  }
                                $("#lblTotalLoss").text(
                                    parseFloat($("#lblTotalLoss").text()) + 1
                                );
                                // step_marti++;
                                // OnMarti = true;
                            }
                            // if (win_t > 1) {
                            //     var win_tt = $("#win_t").text();
                            //     if (win_tt < win_t) {
                            //         $("#win_t").html(win_t);
                            //     }
                            // } else if (lost_t > 1) {
                            //     var loss_tt = $("#loss_t").text();
                            //     if (loss_tt < lost_t) {
                            //         $("#loss_t").html(lost_t);
                            //     }
                            // }
                            // cek take profit
                            if (parseFloat($("#txt_takeprofit").val()) > 0) {
                                //console.log("cek profit disini");
                                if (
                                    parseFloat($("#lblPL").text()) > 0 &&
                                    parseFloat($("#lblPL").text()) >=
                                        parseFloat($("#txt_takeprofit").val())
                                ) {
                                    $("#btnStart").text("Start");
                                    $("#txt_invest").removeAttr("disabled");
                                    Swal.fire({
                                        icon: "success",
                                        title: "Notification",
                                        html:
                                            "Horrey... your take profit <b style='color: green'>" +
                                            plt +
                                            "</b> has been reached !",
                                    }).then(function () {
                                        // location.reload();
                                    });
                                }
                            }

                            //cek stop loss
                            if (parseFloat($("#txt_stoploss").val()) > 0) {
                                if (
                                    parseFloat($("#lblPL").text()) < 0 &&
                                    Math.abs(parseFloat($("#lblPL").text())) >=
                                        parseFloat($("#txt_stoploss").val())
                                ) {
                                    $("#btnStart").text("Start");
                                    $("#txt_invest").removeAttr("disabled");
                                    Swal.fire({
                                        icon: "warning",
                                        title: "Notification",
                                        html: "Oops... Stoploss is reached !",
                                    }).then(function () {
                                        // location.reload();
                                    });
                                }
                            }

                            //martingale disini
                            if (
                                parseFloat(profit) <= 0 &&
                                $("#btnStart").text() == "Stop"
                            ) {
                                //cek jika sinyal salah
                                if (
                                    $("#cmb_if_signal_false option")
                                        .filter(":selected")
                                        .val() == "stop"
                                ) {
                                    $("#btnStart").text("Start");
                                    Swal.fire({
                                        icon: "warning",
                                        title: "Notification",
                                        html: "Oops... Stop Trade By Signal false settings !",
                                    }).then(function () {
                                        // location.reload();
                                    });
                                } else {
                                    //kalkukasi nilai investment baru
                                    if (parseFloat($("#txt_muliplier").val()) > 0) {
                                        if (parseFloat(profit) < 0) {
                                            last_investment = (
                                                parseFloat(last_investment) *
                                                parseFloat(
                                                    $("#txt_muliplier").val()
                                                )
                                            ).toFixed(3);
                                        }
                                    } //end kalkukasi nilai investment baru
                                    //jka tidak sama dengan waitnew
                                    if (
                                        $("#cmb_if_signal_false option")
                                            .filter(":selected")
                                            .val() != "waitnew"
                                    ) {
                                        if (
                                            parseFloat($("#txt_max_step").val()) > 0
                                        ) {
                                            if (
                                                parseFloat(step_marti) >=
                                                parseFloat($("#txt_max_step").val())
                                            ) {
                                                //cek aksi setelah step marti tercapai
                                                if (
                                                    $("#cmb_after_step option")
                                                        .filter(":selected")
                                                        .val() == "stop"
                                                ) {
                                                    $("#btnStart").text("Start");
                                                    alert(
                                                        "Oops... Maximum step multiplier is reached !"
                                                    );
                                                } else {

                                                    last_investment =
                                                        $("#txt_invest").val();
                                                    step_marti = 0;
                                                    OnMarti = false;
                                                }
                                            }
                                        }

                                        // if (
                                        //     $("#cmb_signal option")
                                        //         .filter(":selected")
                                        //         .val() != "manual"
                                        // ) {
                                            var ndirection = last_direction;
                                            if (
                                                $("#cmb_if_signal_false option")
                                                    .filter(":selected")
                                                    .val() == "reversal"
                                            ) {
                                            // OpenOrder(ndirection);
                                                ndirection =
                                                    last_direction == "SELL"
                                                        ? (last_direction = "Call")
                                                        : (last_direction = "SELL");
                                                if (parseFloat($("#txt_muliplier").val()) > 0) {
                                                    if (parseFloat(profit) <= 0){
                                                        OpenOrder(ndirection);
                                                    }
                                                }

                                            }
                                            if (
                                                $("#cmb_if_signal_false option")
                                                    .filter(":selected")
                                                    .val() == "follow"
                                            ) {
                                            // OpenOrder(ndirection);
                                                ndirection =
                                                    last_direction == "SELL"
                                                        ? (last_direction = "SELL")
                                                        : (last_direction = "CALL");
                                                if (parseFloat($("#txt_muliplier").val()) > 0) {
                                                    if (parseFloat(profit) <= 0){
                                                        OpenOrder(ndirection);
                                                    }
                                                }

                                            }


                                    } else {
                                        OnMarti = false;
                                        if (
                                            parseFloat($("#txt_max_step").val()) > 0
                                        ) {
                                            if (
                                                parseFloat(step_marti) >=
                                                parseFloat($("#txt_max_step").val())
                                            ) {
                                                //cek aksi setelah step marti tercapai
                                                if (
                                                    $("#cmb_after_step option")
                                                        .filter(":selected")
                                                        .val() == "stop"
                                                ) {
                                                    $("#btnStart").text("Start");
                                                    alert(
                                                        "Oops... Maximum step multiplier is reached !"
                                                    );
                                                } else {
                                                    // OnTrade=false;                                   //  console.log("Marti reset invest & step !");
                                                    //reset stake & step
                                                    last_investment =
                                                        $("#txt_invest").val();
                                                    step_marti = 0;
                                                    OnMarti = false;
                                                }
                                            }
                                        }
                                    } //jka tidak sama dengan waitnew
                                } //end cek jika sinyal salah
                            }else{
                            OnMarti = false;
                            if (parseFloat($("#txt_muliplier").val()) > 0) {
                                        if (parseFloat(profit) < 0) {
                                            last_investment = (
                                                parseFloat(last_investment) *
                                                parseFloat(
                                                    $("#txt_muliplier").val()
                                                )
                                            ).toFixed(3);
                                        }
                                    }
                            }
                            // end martingale
                        }
                    }
                }

                break;




    }
    });

    /* end api spectre trader */

    /* API market data */
    msocket = new ReconnectingWebSocket("wss://wss.hyper-api.com:5553/spectreai/", AppId);
    msocket.addEventListener("open", function (event) {
    msocket_status = 1;
    $("#mserver").css('color','green');
    // $("#myModal").modal("hide");
    //* if ($("#btnGetPrice").text() == "Change Market") {
        var msg = {
        action: "marketdatasubscribe",
        data: {
            asset_id: $("#cmb_market option").filter(":selected").val(),
            period: $("#cmb_time_frame option").filter(":selected").val(),
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket.send(JSON.stringify(msg));
        chart();
        mark();
    // }*/
    });

    msocket.addEventListener("close", function (event) {
    $("#mserver").css('color','red');
    // $('#myModal').modal('show');
    msocket_status = 0;
    });

    msocket.addEventListener("message", function (event) {
    var js = JSON.parse(event.data);

    if (js.hasOwnProperty("msg")) {
        // console.log(js.msg.close);
        var spot_price = js.msg.close;
        if (parseFloat($("#spot").text()) > 0) {
        if (parseFloat(spot_price) > parseFloat($("#spot").text())) {
            $("#spot").css("color", "green");
             $('#xspot').css('color','green');
        }
        if (parseFloat(spot_price) < parseFloat($("#spot").text())) {
            $("#spot").css("color", "#ff471a");
             $('#xspot').css('color','#fc9595');
        }
        if (parseFloat(spot_price) < parseFloat($("#lblEntryPrice").text())) {
            $("#Aktiv").css("background", "#b8fcd2");
        }
        if (parseFloat(spot_price) > parseFloat($("#lblEntryPrice").text())) {
            $("#Aktiv").css("background", "#facecd");
        }
        }
        $("#spot").html(spot_price);
        $("#xspot").html(spot_price);
        $("#price_open").html('OPEN '+js.msg.open);
        $("#price_high").html('HIGHT ' + js.msg.high);
        $("#price_low").html('LOW ' +js.msg.low);
        var open_to_price_point = ((js.msg.open - js.msg.close) * 100000).toFixed(0);
        // (Math.abs(parseFloat(js.msg.open)-parseFloat(js.msg.close))*100000).toFixed(0);
        $("#price_point").html(Math.abs(parseFloat(open_to_price_point).toFixed(0)));
        var to_price_point = (Math.abs(parseFloat(js.msg.open) - parseFloat(js.msg.high)) * 100000).toFixed(0);
        var e_point = (Math.abs(parseFloat(js.msg.open) - parseFloat(js.msg.low)) * 100000).toFixed(0);
        $("#price_h").html(to_price_point);
        var Bls=js.msg.close;
        $("#price_E").html(e_point);
        spot_price1 = Bls;
        Poin = open_to_price_point;
        Hight = to_price_point;
        Open = js.msg.open;
        Low = e_point;
        Clos = js.msg.high;
        Candel = ((Open - spot_price) * 10000).toFixed(0);
        Candle = Candel;

        if (Candel > 0) {
        $("#price_point").css("color", "red");
        } else {
        $("#price_point").css("color", "green");
        }

        //sparkline
        myticker.push(spot_price);
        if (myticker.length > 30) {
        myticker.splice(0, 1); //delete element array pertama
        }
        myticke.push(Candel);
        if (myticke.length > 30) {
        myticke.splice(0, 1); //delete element array pertama
        }
        $(".dynamicsparklin").sparkline(myticke, {
        type: "bar"
        });
        $(".dynamicsparkline").sparkline(myticker, {
        lineColor: "#f6f8f7",
        lineWidth: "1",
        height: "50",
        width: "100%",
        maxSpotColor: "blue",
        minSpotColor: "red",
        spotColor: text(spot_price),
        fillColor: "",
        });
    } else {
        $("#spot").html("0.00000");
        $("#price_open").html("0.00000");
        $("#price_high").html("0.00000");
        $("#price_low").html("0.00000");
        $("#price_point").html("0");
        $("#xspot").css("color", "#000000");
    }
    //  }
    //break;
    });
    /* end API market data */
    /* API market data */
    msocket1 = new ReconnectingWebSocket("wss://wss.hyper-api.com:5553/spectreai/", AppId);
    msocket1.addEventListener("open", function (event) {
    msocket_status = 1;
    //*if ($("#btnGetPrice").text() == "Change Market") {
        var msg = {
        action: "marketdatasubscribe",
        data: {
            asset_id: $("#cmb_market option").filter(":selected").val(),
            period: 60,
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket1.send(JSON.stringify(msg));
    //}*/
    });

    msocket1.addEventListener("close", function (event) {
    msocket_status = 0;
    });

    msocket1.addEventListener("message", function (event) {
    var js = JSON.parse(event.data);

    if (js.hasOwnProperty("msg")) {
        //console.log(js.msg.close);
        var spot_price = js.msg.close;
        var sopen = js.msg.open;
        if (parseFloat($("#spot").text()) > 0) {
        if (parseFloat(spot_price) > parseFloat($("#spot").text())) {
            $("#xspot").css("color", "green");
            // $('#Spt').css('background','green');
        }
        if (parseFloat(spot_price) < parseFloat($("#spot").text())) {
            $("#xspot").css("color", "#ff471a");
            // $('#Spt').css('background','#fc9595');
        }
        if (parseFloat(spot_price) < parseFloat($("#lblEntryPrice").text())) {
            $("#Aktiv").css("background", "#b8fcd2");
        }
        if (parseFloat(spot_price) > parseFloat($("#lblEntryPrice").text())) {
            $("#Aktiv").css("background", "#facecd");
        }
        }
        $("#spot1").html(" TF 1M ");
    /* $("#price_open1").html(sopen);
        $("#price_high").html(js.msg.high);
        $("#price_low").html(js.msg.low);*/
        var open_to_price_point = ((js.msg.open - js.msg.close) * 100000).toFixed(0);
        // (Math.abs(parseFloat(js.msg.open)-parseFloat(js.msg.close))*100000).toFixed(0);
    // $("#price_point").html(Math.abs(parseFloat(open_to_price_point).toFixed(0)));
        var to_price_point = (Math.abs(parseFloat(js.msg.open) - parseFloat(js.msg.high)) * 100000).toFixed(0);
        var e_point = (Math.abs(parseFloat(js.msg.open) - parseFloat(js.msg.low)) * 100000).toFixed(0);
    // $("#price_h").html(to_price_point);
    // $("#price_E").html(e_point);

        Poin1 = open_to_price_point;
        Hight = to_price_point;
        Open1 = js.msg.open;
    // spot_price1 = spot_price;
        Low = e_point;
        Clos = js.msg.high;
        Candel = ((Open - spot_price) * 10000).toFixed(0);
        Candle = Candel;
    //alert(sopen);
    /*if(js.msg.open=js.msg.close){
        alert('Op');
    }*/
        if (Candel > 0) {
        $("#spot1").css("color", "red");
        } else {
        $("#spot1").css("color", "green");
        }

        //sparkline
        myticker.push(spot_price);
        if (myticker.length > 30) {
        myticker.splice(0, 1); //delete element array pertama
        }
        $(".dynamicsparkline").sparkline(myticker, {
        lineColor: "#f6f8f7",
        lineWidth: "1",
        height: "50",
        width: "100%",
        maxSpotColor: "blue",
        minSpotColor: "red",
        spotColor: "green",
        fillColor: "",
        });
    } else {
        $("#spot1").html("0.00000");
        $("#price_open").html("0.00000");
        $("#price_high").html("0.00000");
        $("#price_low").html("0.00000");
        $("#price_point").html("0");
        $("#xspot").css("color", "#000000");
    }
    //  }
    //break;
    });
    /* end API market data */
    /* API market data */
    msocket2 = new ReconnectingWebSocket("wss://wss.hyper-api.com:5553/spectreai/", AppId);
    msocket2.addEventListener("open", function (event) {
    msocket_status = 1;
    //*if ($("#btnGetPrice").text() == "Change Market") {
        var msg = {
        action: "marketdatasubscribe",
        data: {
            asset_id: $("#cmb_market option").filter(":selected").val(),
            period: 300,
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket2.send(JSON.stringify(msg));
    // }*/
    });

    msocket2.addEventListener("close", function (event) {
    msocket_status = 0;
    });

    msocket2.addEventListener("message", function (event) {
    var js = JSON.parse(event.data);

    if (js.hasOwnProperty("msg")) {
        //console.log(js.msg.close);
        var spot_price = js.msg.close;
        if (parseFloat($("#spot").text()) > 0) {
        if (parseFloat(spot_price) > parseFloat($("#spot").text())) {
            $("#xspot").css("color", "green");
            // $('#Spt').css('background','green');
        }
        if (parseFloat(spot_price) < parseFloat($("#spot").text())) {
            $("#xspot").css("color", "#ff471a");
            // $('#Spt').css('background','#fc9595');
        }
        if (parseFloat(spot_price) < parseFloat($("#lblEntryPrice").text())) {
            $("#Aktiv").css("background", "#b8fcd2");
        }
        if (parseFloat(spot_price) > parseFloat($("#lblEntryPrice").text())) {
            $("#Aktiv").css("background", "#facecd");
        }
        }
        $("#spot2").html(" TF 5M ");
        /*$("#price_open").html(js.msg.open);
        $("#price_high").html(js.msg.high);
        $("#price_low").html(js.msg.low);*/
        var open_to_price_point = ((js.msg.open - js.msg.close) * 100000).toFixed(0);
        // (Math.abs(parseFloat(js.msg.open)-parseFloat(js.msg.close))*100000).toFixed(0);
    // $("#price_point").html(Math.abs(parseFloat(open_to_price_point).toFixed(0)));
        var to_price_point = (Math.abs(parseFloat(js.msg.open) - parseFloat(js.msg.high)) * 100000).toFixed(0);
        var e_point = (Math.abs(parseFloat(js.msg.open) - parseFloat(js.msg.low)) * 100000).toFixed(0);
    // $("#price_h").html(to_price_point);
    // $("#price_E").html(e_point);

        Poin2 = open_to_price_point;
        Hight = to_price_point;
        Open = js.msg.open;
        Low = e_point;
        Clos = js.msg.high;
        Candel = ((Open - spot_price) * 10000).toFixed(0);
        Candle = Candel;

        if (Candel > 0) {
        $("#spot2").css("color", "red");
        } else {
        $("#spot2").css("color", "green");
        }

        //sparkline
        myticker.push(spot_price);
        if (myticker.length > 30) {
        myticker.splice(0, 1); //delete element array pertama
        }
        $(".dynamicsparkline").sparkline(myticker, {
        lineColor: "#f6f8f7",
        lineWidth: "1",
        height: "50",
        width: "100%",
        maxSpotColor: "blue",
        minSpotColor: "red",
        spotColor: "green",
        fillColor: "",
        });
    } else {
        $("#spot2").html("0.00000");
        $("#price_open").html("0.00000");
        $("#price_high").html("0.00000");
        $("#price_low").html("0.00000");
        $("#price_point").html("0");
        $("#xspot").css("color", "#000000");
    }
    //  }
    //break;
    });
    /* end API market data */
    /* API market data */
    msocket3 = new ReconnectingWebSocket("wss://wss.hyper-api.com:5553/spectreai/", AppId);
    msocket3.addEventListener("open", function (event) {
    msocket_status = 1;
    //* if ($("#btnGetPrice").text() == "Change Market") {
        var msg = {
        action: "marketdatasubscribe",
        data: {
            asset_id: $("#cmb_market option").filter(":selected").val(),
            period: 900,
            subscribe: "1",
        },
        token: $("#txt_t").val(),
        };
        msocket3.send(JSON.stringify(msg));
    // }*/
    });

    msocket3.addEventListener("close", function (event) {
    msocket_status = 0;
    });

    msocket3.addEventListener("message", function (event) {
    var js = JSON.parse(event.data);

    if (js.hasOwnProperty("msg")) {
        //console.log(js.msg.close);
        var spot_price = js.msg.close;
        if (parseFloat($("#spot").text()) > 0) {
        if (parseFloat(spot_price) > parseFloat($("#spot").text())) {
            $("#xspot").css("color", "green");
            // $('#Spt').css('background','green');
        }
        if (parseFloat(spot_price) < parseFloat($("#spot").text())) {
            $("#xspot").css("color", "#ff471a");
            // $('#Spt').css('background','#fc9595');
        }
        if (parseFloat(spot_price) < parseFloat($("#lblEntryPrice").text())) {
            $("#Aktiv").css("background", "#b8fcd2");
        }
        if (parseFloat(spot_price) > parseFloat($("#lblEntryPrice").text())) {
            $("#Aktiv").css("background", "#facecd");
        }
        }
        $("#spot3").html("TF 15M ");
    /* $("#price_open").html(js.msg.open);
        $("#price_high").html(js.msg.high);
        $("#price_low").html(js.msg.low);*/
        var open_to_price_point = ((js.msg.open - js.msg.close) * 100000).toFixed(0);
        // (Math.abs(parseFloat(js.msg.open)-parseFloat(js.msg.close))*100000).toFixed(0);
    //  $("#price_point").html(Math.abs(parseFloat(open_to_price_point).toFixed(0)));
        var to_price_point = (Math.abs(parseFloat(js.msg.open) - parseFloat(js.msg.high)) * 100000).toFixed(0);
        var e_point = (Math.abs(parseFloat(js.msg.open) - parseFloat(js.msg.low)) * 100000).toFixed(0);
    // $("#price_h").html(to_price_point);
    // $("#price_E").html(e_point);

        Poin3 = open_to_price_point;
        Hight = to_price_point;
        Open = js.msg.open;
        Low = e_point;
        Clos = js.msg.high;
        Candel = ((Open - spot_price) * 10000).toFixed(0);
        Candle = Candel;

        if (Candel > 0) {
        $("#spot3").css("color", "red");
        } else {
        $("#spot3").css("color", "green");
        }

        //sparkline
        myticker.push(spot_price);
        if (myticker.length > 30) {
        myticker.splice(0, 1); //delete element array pertama
        }
        $(".dynamicsparkline").sparkline(myticker, {
        lineColor: "#f6f8f7",
        lineWidth: "1",
        height: "50",
        width: "100%",
        maxSpotColor: "blue",
        minSpotColor: "red",
        spotColor: "green",
        fillColor: "",
        });
    } else {
        $("#spot3").html("0.00000");
        $("#price_open").html("0.00000");
        $("#price_high").html("0.00000");
        $("#price_low").html("0.00000");
        $("#price_point").html("0");
        $("#xspot").css("color", "#000000");
    }
    //  }
    //break;
    });
    /* end API market data */

    //setInterval({UpdateChart(),3000});
    async function CheckConnection() {
    do {
        await new Promise((resolve, reject) => setTimeout(resolve, 100));
    } while (fsocket_status == 0);
    return true;
    }


</script>
<script src="{{ url('mt/js/vendors.bundle.js') }}"></script>
<script src="{{ url('mt/vendor/sparkline/spark.js') }}"></script>
<script src="{{ url('mt/js/app.bundle.js') }}"></script>
<script type="text/javascript"></script>
