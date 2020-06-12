<?php
session_start();
$_SESSION['SERVER_ERROR'] = '{"bitRate":128,"rows":32,"addrArr":["::","::","1c7c:f113:e780:7cf:1e1c:7800::","2040:8912:440:408:9122:4400::","2040:8912:440:408:9122:4400::","1c70:f0a3:8780:70f:1e22:7800::","240:a0a2:500:40a:1422:5000::","240:90a2:480:409:1222:4800::","1c7c:8843:e440:7c8:911c:4400::","::","::"]}';
?>
<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Bitart - lelenet.pl</title>
        <link rel="icon" href="Xd.png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script type="text/javascript" src="ipaddr.js"></script>
        <script type="text/javascript" src="converter.js"></script>
        <script type="text/javascript" src="bit.js"></script>
        <script type="text/javascript" src="row.js"></script>
    </head>
    <body>
        <a href="."><img src="logo.png" alt="aaaaaaaaa" href="index.php"></a>
        <div class="debug">
            <div style="text-align: center">
                <div class="fl">Szerokość: <input type="radio" id="i32" name="res" value="32" checked>
                    <label for="i32">32</label>
                    <input type="radio" id="i128" name="res" value="128">
                    <label for="i128">128</label>
                </div>
                <div class="fl">Wysokość: <input type="text" value="32" id="height" placeholder="max 200"></div>
                <div class="fl">Kolor startowy: <input type="radio" id="white" name="color" value="white" checked>
                    <label for="white">biały</label>
                    <input type="radio" id="black" name="color" value="black">
                    <label for="black">czarny</label>
                </div>
                <div class="fl button" onclick="NewMap()">Generuj</div>
            </div>
            <p>LPM - czarny<br/>PPM - biały</p>
        </div>
        <div class="container debug">
            <table style="border-collapse: collapse">
                <tbody class="container" id="map"></tbody>
            </table>
        </div>
        <div class="debug">
            <div style="text-align: center">
                <div class="fl">Autor: <input type="text" id="author" placeholder="Podpisz się..."></div>
                <div class="fl">Opis: <textarea id="description" cols="120" rows="2" placeholder="Napisz coś o tym obrazku" maxlength="200"></textarea></div>
                <div class="g-recaptcha" data-sitekey="6Lc7veYUAAAAAIe5UEG4ZAYgUocj86yCULy8VuFj"></div>
                <div class="button" style="clear: both; text-align: center" onclick="SaveToJSON()">Opublikuj</div>
                <div style="text-align: center">
                    <p id="json"></p>
                </div>
            </div>
        </div>
        <div class="debug">
            <div style="text-align: center">
                <div><p>Szukaj:</p> <input type="text" value="" onkeyup="ListDisplay(this.value)"></div>
                <table style="width: 100%; table-layout:fixed">
                    <thead>
                        <th style="width: 20%">Autor</th><th style="width: 70%">Opis</th><th style="width: 10%"></th>
                    </thead>
                    <tbody id="list">
                    
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="debug">kopirajt Szymon Miłkowski</footer>
        <script type="text/javascript" src="map.js"></script>
        <script type="text/javascript" src="listElement.js"></script>
        <script type="text/javascript" src="readWrite.js"></script>
    </body>
</html>