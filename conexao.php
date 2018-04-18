<?php

function conectar(){
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=sistemahx","dumon","dumon");        
    } catch (PDOException $ex) {
        echo $ex-getMessage();
    }
    return $pdo;
}