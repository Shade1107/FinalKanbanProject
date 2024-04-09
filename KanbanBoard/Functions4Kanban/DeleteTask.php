<?php
$path = realpath(__DIR__."/../");
require_once("$path/Database/DatabaseConnection.php");
require_once("$path/Repositories/TaskRepository.php");

$TaskRepo = new TaskRepository(DatabaseConnection::getInstance());

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['DeleteTask'])){

    if (isset($_POST["task_id"])){
        $task_id      =  $_POST["task_id"];
        $result =  $TaskRepo->delete($task_id);
                header('Location: ../home_admin.php'); 
    }
}
?>