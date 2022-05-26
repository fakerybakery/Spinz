<?php
session_start();
if (!isset($_SESSION['coins']) || ($_SESSION['coins'] == 0)) {
    header('Location: getcoins.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spinz</title>
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
    <h1>SPINZ SANS SKILL</h1>
    <p>How it works: A number will be highlighted. Get 3 in a row, win! But, if you get a "OUT", you instantly lose! <u>You lose 10 points when you lose, <b>but you gain 50 points if you win!</b></u></p>
    <div id="num1">
        <span id="n11">1</span>
        <span id="n12">2</span>
        <span id="n13">3</span>
        <span id="n14">4</span>
        <span id="n15">5</span>
        <span id="n1nope">OUT</span>
    </div>
    <div id="num2">
        <span id="n21">1</span>
        <span id="n22">2</span>
        <span id="n23">3</span>
        <span id="n24">4</span>
        <span id="n25">5</span>
        <span id="n2nope">OUT</span>
    </div>
    <div id="num3">
        <span id="n31">1</span>
        <span id="n32">2</span>
        <span id="n33">3</span>
        <span id="n34">4</span>
        <span id="n35">5</span>
        <span id="n3nope">OUT</span>
    </div>
    <br><br>
    <button onclick="spinz()" id="button">SPINZ</button>
    <br><br><br>
    <button onclick="window.location.href='redeem.php'" id="button">Redeem Coins</button>
    <br><br><br>
    <button onclick="window.location.href='getcoins.php'" id="button">Get Coins</button>
    <p><b>Pro Tip:</b> Press the [spacebar] to spin automatically!</p>
</div>
<script>
    document.getElementById('button').focus();
    function spinz() {
        document.getElementById('n11').removeAttribute('style');
        document.getElementById('n12').removeAttribute('style');
        document.getElementById('n13').removeAttribute('style');
        document.getElementById('n14').removeAttribute('style');
        document.getElementById('n15').removeAttribute('style');
        document.getElementById('n1nope').removeAttribute('style');
        document.getElementById('n21').removeAttribute('style');
        document.getElementById('n22').removeAttribute('style');
        document.getElementById('n23').removeAttribute('style');
        document.getElementById('n24').removeAttribute('style');
        document.getElementById('n25').removeAttribute('style');
        document.getElementById('n2nope').removeAttribute('style');
        document.getElementById('n31').removeAttribute('style');
        document.getElementById('n32').removeAttribute('style');
        document.getElementById('n33').removeAttribute('style');
        document.getElementById('n34').removeAttribute('style');
        document.getElementById('n35').removeAttribute('style');
        document.getElementById('n3nope').removeAttribute('style');
        document.getElementById('button').innerText = 'Please wait...';
        document.getElementById('button').disabled = true;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText == '') {
                    alert("Oops, you're out of coins!");
                }
                var val = xhr.responseText.split("\n");
                document.getElementById('button').innerText = 'SPINZ';
                document.getElementById('button').disabled = false;
                document.getElementById('button').focus();
                var win = false;
                if ((val[1] == val[2]) && (val[2] == val[3])) {
                    document.getElementById('win').innerText = 'You Win!';
                    win = true;
                } else {
                    document.getElementById('win').innerText = 'You Lose';
                }
                if (val[1] == 'NOPE') {
                    document.getElementById('n1nope').style.background = '#691A1A';
                    document.getElementById('win').innerText = 'You Lose';
                    win = false;
                } else {
                    document.getElementById('n1' + val[1]).style.background = '#691A1A';
                }
                if (val[2] == 'NOPE') {
                    document.getElementById('n2nope').style.background = '#691A1A';
                    document.getElementById('win').innerText = 'You Lose';
                    win = false;
                } else {
                    document.getElementById('n2' + val[2]).style.background = '#691A1A';
                }
                if (val[3] == 'NOPE') {
                    document.getElementById('n3nope').style.background = '#691A1A';
                    document.getElementById('win').innerText = 'You Lose';
                    win = false;
                } else {
                    document.getElementById('n3' + val[3]).style.background = '#691A1A';
                }
                if (win) {
                    document.getElementById('win').style.fontSize = '100pt';
                    document.getElementById('body').remove();
                    document.body.innerHTML += '<button onclick="window.location.reload()">Keep Playing</button><br><br><br><button onclick="window.location.href=\'redeem.php\'">Redeem Coins</button><br><br><br><button onclick="window.location.href=\'getcoins.php\'">Get Coins</button>';
                }
                document.getElementById('coin').innerText = val[4];
            }
        }
        setTimeout(function() {
            xhr.open('GET', 'spinz.php?time=' + Date.now());
            xhr.send();
        }, Math.random() * 100);
    }
</script>
</body>
</html>