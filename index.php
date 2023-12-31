<?php

include_once("./app/database/connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>オレサマ掲示板</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include("app/parts/header.php"); ?>
    <?php include("app/parts/newThreadButton.php"); ?>
    <?php include("app/parts/validation.php"); ?>
    <?php include("app/parts/thread.php"); ?>

    <script>
    async function audio() {
        console.log("AUDIO");
        let play_sound = new Audio('./assets/sounds/se_13_gun.wav');
        await play_sound.play();
    }
    </script>
</body>

</html>