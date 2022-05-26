<?php
session_start();
if (!isset($_SESSION['coins'])) {
    $_SESSION['coins'] = 0;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redeem Coins | Spinz</title>
    <style>
        @import url('fonts/index.css');
        body, html {
            margin: 0;
            padding: 0;
            background: #FF7575;
            font-family: 'Shadows Into Light Two', sans-serif;
            text-align: center;
            color: white;
        }
        #num1 {
            background: #F8A0A0;
        }
        #num2 {
            background: #CA5757;
        }
        #num3 {
            background: #F8A0A0;
        }
        #num1, #num2, #num3 {
            display: inline-block;
            padding: 15px;
            border-radius: 15px;
        }
        span {
            display: block;
            color: white;
            font-family: 'Shadows Into Light Two', sans-serif;
            font-size: 25pt;
            transition: 0.25s;
            border-radius: 5px;
        }
        button {
            font-family: 'Shadows Into Light Two', sans-serif;
            background: #FF7F7F;
            color: white;
            border: 0;
            border-radius: 15px;
            padding: 15px 25px;
            cursor: pointer;
            outline: none;
        }
        button:hover, button:focus {
            background: #EC6767;
        }
        button:active {
            background: #CA5757;
        }
        .coins {
            background: #F3CA00;
            position: absolute;
            left: 5px;
            top: 5px;
            border-radius: 1000px;
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
<div class="coins">
    <span id="coin"><?=$_SESSION['coins']?></span>
    Coins!
</div>
<h3 id="win">Click "SPINZ" to play!</h3>
<div id="body">
    <h1>Redeem Coins | SPINZ SANS SKILL</h1>
    <br><br>
    <button onclick="redeem()" id="button">Redeem All Coins</button>
    <br><br><br>
    <button onclick="window.location.href='getcoins.php'" id="button">Get Coins</button>
    <br>
    <button onclick="window.location.href='./'" id="button"><b>Play!</b></button>
</div>
<script>
    function redeem() {
        if (confirm('Are you sure that you would like to redeem all your coins?')) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('coin').innerText = xhr.responseText;
                    alert('Success, you have successfully redeemed all your coins!');
                }
            }
            xhr.open('GET', 'coinmanage.php?redeem=true&time=' + Date.now());
            xhr.send();
        }
    }
</script>
</body>
</html>