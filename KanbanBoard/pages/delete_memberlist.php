<?php
    //require section
    require_once("../Repositories/UserRepository.php");
    require_once("../Database/DatabaseConnection.php");
?>


<?php
    
        $userRepo = new UserRepository(DatabaseConnection::getInstance());
        $result = $userRepo->delete($_GET['id']);
        if($result){
            header("Location: memberlist.php");
        }  
    
   
?> 





