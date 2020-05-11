<?php require "connection.php"; ?>
<?php require "ultra/actors.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form>
    <h3>Что можно посмотреть на видеокассетах</h3>

    <p>
        <input type="button" value="Выбрать" onclick="getFilmsByCarrier()">
    </p>
</form>
<table>
    <thead>
        <tr>
            <th>Название</th>
            <th>Дата выпуска</th>
            <th>Режиссер</th>
            <th>Актеры</th>
            <th>Жанры</th>
            <th>Страна</th>
        </tr>
    </thead>
    <tbody id="carrier-res">
        
    </tbody>
</table>

<form id="Form2">
    <h3>В каких фильмах участвовал выбранный актер</h3>
    <select name="actor_film">
        <?php
        foreach ($outputActor as $actor) {
            echo "<option value=\"$actor\">$actor</option>";
        }
        ?>
    </select>
    <p>
        <input type="button" value="Выбрать" onclick="getFilmsByActor()">
        <input type="button" value="Данные с LocalStorage" onclick="getLocal2(this)">
        <input type="button" value="Очистить форму" onclick="$('#actor-res').html('');">
    </p>
</form>
<ol id="actor-res"></ol>

<form action="date.php">
    <h3>Что посмотреть из нового (вышедшее в этом году)</h3>
    <p><input type="button" value="Выбрать" onclick="getFilmsByDate()"></p>
</form>
<table>
    <thead>
        <tr>
            <th>Название</th>
            <th>Дата выпуска</th>
            <th>Режиссер</th>
            <th>Актеры</th>
            <th>Жанры</th>
            <th>Страна</th>
        </tr>
    </thead>
    <tbody id="date-res">
        
    </tbody>
</table>

<script src="jquery-3.5.0.min.js"></script>
<script src="forms_ajax.js"></script>
</body>
</html>