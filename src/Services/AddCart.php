<?php

if(!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['id_list'])) {
    $_SESSION['id_list'] = [];
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    echo $id;

    if(!isset($_SESSION["id_list"])){
        $_SESSION["id_list"] = [];
    }

    if(!in_array($id, $_SESSION["id_list"])){
        $_SESSION["id_list"][] = $id;
        header("Location: /");
    }

    header("Location: /");
}