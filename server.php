<?php
$todo_string = file_get_contents("./todo.json"); //prendo i dati da "todo.json"
$todo_list = json_decode($todo_string, true); //traduco la stringa ricevuta dal file json in un array associativo
//Se viene effettuata la richiesta per inserire una nuova task
if (isset($_POST['submit'])) {
    //Nuova task
    $newTask = [
        "task" => $_POST['submit'], //nome
        "success" => false //successo
    ];
    $todo_list[] = $newTask; //inserisco la nuova task nella todo list
    $new_todo_list = json_encode($todo_list); //trasformo l'array associativo in una stringa
    file_put_contents("./todo.json", $new_todo_list); //inserisco la stringa nel file json
    $todo_string = file_get_contents("./todo.json"); //prendo i dati da "todo.json"
    $todo_list = json_decode($todo_string, true); //traduco la stringa ricevuta dal file json in un array associativo
}
//Se si vuole cancellare una task
if (isset($_POST['delete'])) {
    $index = $_POST['delete']; //salvo l'indice della task
    unset($todo_list[$index]); //elimino la task
    $new_todo_list = json_encode($todo_list); //trasformo l'array associativo in una stringa
    file_put_contents("./todo.json", $new_todo_list); //inserisco la stringa nel file json
    $todo_string = file_get_contents("./todo.json"); //prendo i dati da "todo.json"
    $todo_list = json_decode($todo_string, true); //traduco la stringa ricevuta dal file json in un array associativo
}
//Se si vuole cambiare lo stato di una task
if (isset($_POST['status'])) {
    $index = $_POST['status']; //salvo l'indice della task
    $todo_list[$index]["success"] = !$todo_list[$index]["success"];
    $new_todo_list = json_encode($todo_list); //trasformo l'array associativo in una stringa
    file_put_contents("./todo.json", $new_todo_list); //inserisco la stringa nel file json
    $todo_string = file_get_contents("./todo.json"); //prendo i dati da "todo.json"
    $todo_list = json_decode($todo_string, true); //traduco la stringa ricevuta dal file json in un array associativo
}
header('Content-Type: application/json'); //imposto l'header Content-type
echo $todo_string; //stampo la stringa del file json
?>