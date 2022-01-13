<?php
// contient les fonctions pour récupérer dans la DB
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('dbConnect.php');

function addToDoDb($todo,$date,$finish){
    $db=dbConnect();
    $insert = $db->prepare('INSERT INTO todo(todo, date, modify, finish) VALUES (:todo, :date, null, :finish)');
    $insert->bindParam(':todo',$todo);
    $insert->bindParam(':date', $date);
    $insert->bindParam(':finish', $finish);
    $affectedLines=$insert->execute();
    return $affectedLines;
}

function getToDo(){
    $db=dbConnect();
    $sqlQuery = 'SELECT todo, id FROM todo ORDER BY date DESC';
    $stm=$db->query($sqlQuery);
    return $stm;
}

function deleteToDo($id){
    $db=dbConnect();
    $sqlQuery= 'DELETE todo FROM todo WHERE id=:id';
    $stm=$db->prepare($sqlQuery);
    $stm->bindParam(':id', $id);
    $stm->execute();
}

