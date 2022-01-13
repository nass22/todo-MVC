<?php
//Permet de display les erreurs
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('model.php');

function addToDo($todo, $date, $finish){
    $affectedLines = addToDoDb($todo, $date, $finish);
    
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le todo');
    } else {
        echo 'Todo ajouté!';
        header('Location:index.php');
    }
}

function addGetToDo(){
    $resp=getToDo();
    require('indexView.php');
}

function deleteLine($id){
    deleteToDo($id);
    echo "Todo supprimé";
    header("Location: index.php");
}

