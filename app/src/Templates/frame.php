<?php
/**
 * @var string $files
 * @var string $content
 * @var \App\Inc\Navigator $navigator
 */
?>
<!doctype html>
<html lang="de-de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projekt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: lightgreen;
        }
    </style>
    <base href="/">
    <?= $files ?>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-10 p-2">
            <div class="rounded shadow bg-white">
                <?= $content ?>
            </div>
        </div>
        <div class="col-2 p-2 ">
            <div class="rounded shadow bg-white sticky-top">
                <?= $navigator->render() ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
