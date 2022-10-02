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

    var AppId = "2999a8b9e1ecc9bd2f8d7d85aa46b0f7";
    var msocket, msocket_status;
    msocket_status = 0;
    last_market = "";
    var token = "d96958eb80f4aa3a69a5c93fbc3f396ed46676a8";

    //var token =$("#txtToken").val("540fb97fb8d9a3f53fae23a590cd3da44d52906f");

    if (getCookie("_active_market")) {
    if ($("#cmb_market").find("option:contains('" + getCookie("_active_market") + "')").length > 0) {
        $("#cmb_market option[value=" + getCookie("_active_market") + "]").attr("selected", "selected");
    }
    }



    function Mark(){
        var msg0 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 60,
            subscribe: "1",
        },
        token: token,
        };
        msocket.send(JSON.stringify(msg0));
    }

    cmb_market.addEventListener(
    "change",
    function (e) {
        if ($("#cmb_market option").filter(":selected").val() != getCookie("_active_market")) {

        var msg0 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 60,
            subscribe: "0",
        },
        token: token,
        };
        msocket.send(JSON.stringify(msg0));

        setCookie("_active_market", $("#cmb_market option").filter(":selected").val(), "365");
        }

        var msg0 = {
        action: "marketdatasubscribe",
        data: {
            asset_id: getCookie("_active_market"),
            period: 60,
            subscribe: "1",
        },
        token: token,
        };
        msocket.send(JSON.stringify(msg0));
    },
    false
    );
    /* API market data */
    msocket = new ReconnectingWebSocket("wss://wss.hyper-api.com:5553/spectreai/", AppId);
    msocket.addEventListener("open", function (event) {
    msocket_status = 1;
    $("#mserver").text("Connected");
    var msg = {
                action: "assets",
                data: {},
                token: token,
                };
                msocket.send(JSON.stringify(msg));

        var msg = {
        action: "marketdatasubscribe",
        data: {
            asset_id:getCookie("_active_market"),
            period:60,
            subscribe: "1",
        },
        token: token,
        };
        msocket.send(JSON.stringify(msg));

    });

    msocket.addEventListener("close", function (event) {
    $("#mserver").text("Disconnect");
    msocket_status = 0;
    });

    msocket.addEventListener("message", function (event) {
    var js = JSON.parse(event.data);

    switch (js.action) {
        case "assets":
        for (var s = 0; s < js.assets.length - 1; s++) {
            var sid = js.assets[s].id;
            var sname = js.assets[s].asset;

            var isOpen = js.assets[s].isMarketOpen;
            var s_name = sname;
            if (isOpen == "1") {
            $("#cmb_market").append("<option value='" + sid + "'>"+ sname + "</option>");
            }
        }
        if (getCookie("_active_market")) {
            $("#cmb_market option[value=" + getCookie("_active_market") + "]").attr("selected", "selected");

        } else {
            setCookie("_active_market", "100", "365");
            $("#cmb_market option[value=100]").attr("selected", "selected");
        }
        break;
    }



    if (js.hasOwnProperty("msg")) {
        //console.log(js.msg.close);
        var spot_price = js.msg.close;
        if (parseFloat($("#spot").text()) > 0) {
        if (parseFloat(spot_price) > parseFloat($("#spot").text())) {
            $("#spot").css("color", "green");

        }
        if (parseFloat(spot_price) < parseFloat($("#spot").text())) {
            $("#spot").css("color", "#ff471a");

        }

        }
        $("#spot").append(' ; ' +spot_price);

    } else {
        $("#spot").html("");

    }

    });
    /* end API market data */




</script>
