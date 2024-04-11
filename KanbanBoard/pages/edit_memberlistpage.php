<?php

session_start();

$path = realpath(__DIR__ ."/../"); 
require_once("$path/Database/DatabaseConnection.php");
require_once("$path/Repositories/UserRepository.php");

$id = $_GET['id'];
$userRepo = new UserRepository(DatabaseConnection::getInstance());
$user = $userRepo->find($id);

$imagePath = (isset($user->img) && !empty($user->img)) ? "../image/".$user->img."?v=".time() : "../image/default.jpg";


$selectedGender = $user->gender_id;
$maleSelected = ($selectedGender == 1) ? 'selected' : '';
$femaleSelected = ($selectedGender == 2) ? 'selected' : '';


$selectedRole = $user->role_id;
$adminSelected = ($selectedRole == 1) ? 'selected' : '';
$memberSelected = ($selectedRole == 2) ? 'selected' : '';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
  }
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" />
    <style>
        body {
            margin-top: 20px;
        }

        .avatar {
            width: 200px;
            height: 200px;
            border: 1px solid white;
            border-radius: 50%;
        }

        .backDiv {
            float: left;
        }

        .editDiv {
            float: left;
            margin-left: 930px;
        }

        #edit {
            text-decoration: none;
            font-size: 20px;
            color: lightcyan;
        }

        .btn-custom {
            border: 1px solid black;
            background-color: #79305a;
        }

        .gender-select {
            width: 555px;
            height: 40px;
        }

        .btn-custom {
            border: 1px solid black;
            background-color: #79305a;
            color: white;
        }
    </style>
</head>

<body>
    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="edit_memberlist.php">
        <div class="container bootstrap snippets bootdey">
            <h1 class="text-primary">Edit Profile</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="<?= $imagePath ?>"  class="avatar img-circle img-thumbnail" alt="avatar">
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <h3>Personal info</h3>

                    <input class="form-control" value="<?= $user->id ?>" type="text" name="id" hidden>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?= $user->name ?>" type="text" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?= $user->email ?>" type="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Password:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?= $user->password ?>" name="password" required>
                        </div>
                    </div>
                    
                    <br>
                    <div class="form-group">
                    <label class="col-lg-3 control-label">Gender:</label>
                        <select class="form-select gender-select" aria-label="Default select example" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="1"  ". <?= $maleSelected ?> .">Male</option>
                            <option value="2"  ". <?= $femaleSelected ?> .">Female</option>
                        </select>
                    </div>

                    <br>
                    <div class="form-group">
                    <label class="col-lg-3 control-label">Role:</label>
                        <select class="form-select gender-select" aria-label="Default select example" name="role" required>
                            <option value="">Change Role</option>
                            <option value="1" ". <?= $adminSelected ?> .">Admin</option>
                            <option value="2" ". <?= $memberSelected ?> .">Member</option>
                        </select>
                    </div>

                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <a href="javascript:history.back()"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#79305a" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
                        </svg></a>
                </div>
                <div class="col-md-6 text-end">
                    <input type="submit" name="save" value="Save" class="btn btn-custom">
                </div>
            </div>
        </div>
    </form>

    <!-- This is link of adding small images
		which are used in the link section -->
    <script src="../js/javascript.js"></script>
    <script src="https://kit.fontawesome.com/704ff50790.js" crossorigin="anonymous"></script>
</body>

</html>
