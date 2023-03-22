<?php

$todo_string = file_get_contents("./todo.json"); //prendo i dati da "todo.json"
//$todo_list = json_decode($todo_string, true); //traduco la stringa ricevuta dal file json in un array associativo

header('Content-Type: application/json'); //imposto l'header Content-type
echo $todo_string; //stampo la stringa del file json

?>