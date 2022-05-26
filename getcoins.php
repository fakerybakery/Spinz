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
    <title>Get Coins | Spinz</title>
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
<div id="body">
    <h1>Get Coins | SPINZ SANS SKILL</h1>
    <br><br>
    <button onclick="get(10)" id="button">Get 10</button>
    <button onclick="get(100)" id="button">Get 100</button>
    <br><br><br>
    <button onclick="window.location.href='redeem.php'" id="button">Redeem Coins</button>
    <br>
    <button onclick="window.location.href='./'" id="button"><b>Play!</b></button>
</div>
<script>
    function get(coin) {
        if (confirm('Are you sure that you would like to get ' + coin + ' coin(s)?')) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('coin').innerText = xhr.responseText;
                    alert('Success, you have successfully acquired ' + coin + ' coin(s)!');
                }
            }
            xhr.open('GET', 'coinmanage.php?coins=' + coin + '&time=' + Date.now());
            xhr.send();
        }
    }
</script>
</body>
</html>