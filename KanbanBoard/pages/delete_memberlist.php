<?php
 $path = realpath(__DIR__ ."/../"); 
    //require section
    require_once("$path/KanbanBoard/Repositories/UserRepository.php");
    require_once("$path/KanbanBoard/Database/DatabaseConnection.php");
?>


<?php
    
        $userRepo = new UserRepository(DatabaseConnection::getInstance());
        $result = $userRepo->delete($_GET['id']);
        if($result){
            header("Location: memberlist.php");
        }  
    
   
?> 





