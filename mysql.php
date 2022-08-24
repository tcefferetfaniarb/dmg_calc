<?php

function connectMySQL() {
    $dsn = "mysql:host=localhost;dbname=outward_dmg_calc;charset=UTF8";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo;
}