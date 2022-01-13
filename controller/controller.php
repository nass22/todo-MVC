<?php
require('model/model.php');

function addToDo($todo, $date, $finish){
    $affectedLines = addToDoDb($todo, $date, $finish);
    
    if ($affectedLines === false) {
        throw new Exception("Impossible d\'ajouter le todo");
    } else {
        echo 'Todo ajouté!';
        header('Location:index.php');
    }
}

function addGetToDo(){
    $resp=getToDo();
    require('view/indexView.php');
}

function deleteLine($id){
    deleteToDo($id);
    echo "Todo supprimé";
    header("Location: index.php");
}

function allDelete(){
    deleteTable();
    echo "Table vidée";
    header("Location: index.php");
}
