<?php 
    $path = realpath(__DIR__ ."/../"); 
    require_once("$path/header_footer/header.php");
    require_once("$path/Database/DatabaseConnection.php");
    require_once("$path/Repositories/UserRepository.php");
    //$projmemberRepo = new projectMemberRepository(DatabaseConnection::getInstance());
    $memberRepo = new UserRepository(DatabaseConnection::getInstance());
    $members = $memberRepo->getAll();;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css  -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <!-- title logo  -->
    <link rel="icon" type="image/png" href="../image/logo2_2.PNG">
    <title>Memberlist</title>
</head>
<body class="YHomeBodyColor">

<section class="Ycolumn-container MiYcolumn-container pb-5">


    <div class="container pt-3" >
    <a href="javascript:history.back()" class=""><i class="fa-solid fa-left-long"> </i></a>

            <table class="table MiYtable text-center " >
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Image </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th onclick="togglePassword()">Password</th>
                        <th>Gender</th>
                        <th>Role</th>
                        
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach ($members as $m) : ?>
                            <tr id="listItem_<?=$m->id?>" style="color:white">
                                <td ><?= $m->id ?></td>
                                <td><img src="../image/<?=$m->img?>" style="max-width: 50px; max-height: 50px;"></td>
                                <td><?= $m->name ?></td>
                                <td><?= $m->email ?></td>  
                                <td data-password="<?= $m->password ?>">***</td>   
                                <td><?= $m->getGender()->name ?></td>     
                                <td><?= $m->getRole()->name ?></td>

                                     
                            </tr>
                        <?php endforeach ?>
                    </tbody>
            </table>
    </div>

</section>

<!-- to call footer (myo) -->
    <?php 
     require_once("$path/header_footer/footer.php");
    ?>
    <!-- <script src="../js/lightbox.js"></script> -->

<script src="../js/password.js">        </script>
</body>
</html>
 