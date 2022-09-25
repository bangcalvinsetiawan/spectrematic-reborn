<?php
error_reporting("E_ALL");
ini_set('display_errors', 1);
$code = $_GET['code'];
$header_values = array("Accept: application/json", "Content-Type: application/x-www-form-urlencoded");
$url = 'https://wss.hyper-api.com/token.php';
$post_arr = array("code" => $code, "grant_type" => "authorization_code");
$process = curl_init($url);
curl_setopt($process, CURLOPT_HTTPHEADER, $header_values);
curl_setopt($process, CURLOPT_USERPWD, "2999a8b9e1ecc9bd2f8d7d85aa46b0f7:0ca33103c520ed2edd261cf66eed06");
curl_setopt($process, CURLOPT_POST, 1);
curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($post_arr));
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($process);
$json_object = json_decode($result, true);

$access_token = $json_object['access_token'];
 //echo $access_token;
 //print_r($access_token);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="GpBNaDN9RrOrYDlnlYnXuqPESpXqrWBFb3faYGdP" />

    <title>Spectrematic</title>

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" />
    <link rel="apple-touch-icon" sizes="120x120" href="https://spectrematic.com/backend/img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="https://spectrematic.com/backend/img/favicon/favicon-32x32.png" />
    <link type="text/css" href="https://spectrematic.com/backend/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
    <link type="text/css" href="https://spectrematic.com/backend/vendor/notyf/notyf.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://spectrematic.com/backend/css/fontawesome/backend/css/all.css" />
    <link rel="stylesheet" href="https://spectrematic.com/backend/css/fontawesome/js/all.js" />
    <link type="text/css" href="https://spectrematic.com/backend/css/volt.css" rel="stylesheet" /> -->
  </head>
  <body>
    <div class="mt-2 text-end">
      <span>
        <i class="fa fa-bar-chart" aria-hidden="true"></i> :
        <b> <span style="color: Green; font-size: 150%">•</span> <span id="mserver">Reconnecting</span></b> 
    </span>
    </div>

    <a
      href="https://wss.hyper-api.com/authorize.php?app_id=2999a8b9e1ecc9bd2f8d7d85aa46b0f7&grant=oauth&response_type=code&client_id=2999a8b9e1ecc9bd2f8d7d85aa46b0f7&state=spectrematic_mt"
      class="btn btn-primary btn-sm"
      id="btnGetToken"
      type="button"
    >
      Login
    </a>
   <!-- <form>
      <input type="password" id="txtToken" size="50" placeholder="Paste your API Token here" />
    </form>-->

    <table>
      <tr>
        <th>
          <select class="form-select" aria-label="Default Select Market" for="simpleinput" id="cmb_market"></select>
        </th>
      </tr>
    </table>
    <span id="spot"></span>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="js/websocket.js"></script>
    <script src="js/utility.js"></script>
    <script src="js/ws.j" type="text/javascript"></script>
   
<script>
    
    var AppId = "2999a8b9e1ecc9bd2f8d7d85aa46b0f7";
var msocket, msocket_status;
msocket_status = 0;
last_market = "";
var token = "<?php echo $access_token; ?>";
 
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

  </body>
</html>
