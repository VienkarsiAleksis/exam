<?php
include("./controller.php");

$a = output();
$data = $a['output'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grāmatas izstrāde</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="cont">
        <div class="border">
            <div class="left">
                <h1>Grāmatas izstrāde</h1>
                <input type="text" id = "name" placeholder = "name">
                <p id = "errName"></p>
                <input type="email" id = "email" placeholder = "email">
                <p id = "errEmail"></p>
                <input type="zinojums" id = "zinojums" placeholder = "zinojums">
                <p id = "errZinojums"></p>
                <p id = "msg"></p>
                <button onclick = "add()">POST</button>
            </div>
            <div name = "output" class = "output">
                <?php foreach($data as $dati){ ?>
                  <div class = "yes">
                    <p><?= $dati[1]?>(<?=$dati[2]?>)</p>
                    <p><?=$dati[3]?></p>
                  </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src = "./script.js"></script>
</body>
</html>