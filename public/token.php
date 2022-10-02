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




<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Spectrematic | Trading Bot</title>
        <!-- External CSS -->
        <link rel="stylesheet" href="mt/vendor/sweetalert2/dist/sweetalert2.min.css">
        <link type="text/css" rel="stylesheet" href="https://wss.hyper-api.com/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://wss.hyper-api.com/assets/css/slick.css">

        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="32x32" href="images/fev.png">

        <!-- Custom Stylesheet -->
        <link type="text/css" rel="stylesheet" href="https://wss.hyper-api.com/assets/css/login.css">

    </head>

    <body>
        <!-- Loader -->
        <div class="loader" style="display:none">
            <div class="loader_div"></div>
        </div>

        <!-- Login page -->
        <div class="login_wrapper">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="login_box">
                        <a class="logo_text">
                            <img style="max-width: 55px;" src="https://wss.hyper-api.com/assets/img/logo.png"> Spectrematic Bot
                        </a>
                        <div class="login_form">
                            <div class="login_form_inner">
                                <h3>Authorize <span> Spectrematic Bot </span></h3>
                                <p>Your Token Is : <br><b><span id='token'><?php print_r($access_token);?></span></b></p>



                                <form method="post">
                                    <div class="form-group" style="text-align:left;color:white;font-weight:bold">
                                        Instructions :<br>
                                        <ul>
                                            <li>Keep your API token data carrefully.</li>
                                            <li>Copy and paste API token to our bot</li>
                                        </ul>
                                    </div>
                                    <div class="form-group" style="display:inline;    width: 100%;">
                                        <input type="button" class="btn-md btn-theme btn-block" style="width:100%;float:left" id="clip" value="Copy API Token">

                                    </div>


                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. Login page -->

    </body>



</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="mt/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
    clip.addEventListener('click', function(e) {
        myFunction();
    },false);

    function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    }
    function myFunction() {
    copyToClipboard("#token");
    Swal.fire({
        icon: 'success',
        title: 'Success',
        html: "API token has been successfully copied, please use CTRL + V to paste"
        }).then(function(){
            window.close() ;
        });
    }

</script>
