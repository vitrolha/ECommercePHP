<?php
if(!isset($_SESSION)){
    session_start();
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

    $key = array_search($id, $_SESSION["id_list"]);
    if ($key !== false) {
        unset($_SESSION["id_list"][$key]);
    }

    header("Location: /?page=Cart");
}