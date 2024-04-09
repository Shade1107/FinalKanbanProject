<?php
session_start();
$LoginError = isset($_SESSION['LoginError']) ? $_SESSION['LoginError'] : ''; 
unset($_SESSION['LoginError']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Kanban Board</title>
      <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
      <!-- bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
      <link rel="icon" type="image/png" href="../image/logo2_2.PNG">
      <!-- custom css  -->
      <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body class="fed1dc">
   <div class="container-fluid row">
      <div class="col-lg-6  YloginImg ee92a9">
        <div class="Yimg bg-info Yimg1"></div>
        <div class="Yimg bg-secondary Yimg2"></div>
        <div class="Yimg bg-danger Yimg3"></div>
        <div class="Yimg bg-warning Yimg4"></div>
        <div class="Yimg bg-success Yimg5"></div>

      </div>
      <div class="loginForm  col-lg-6 ee92a9 ">
            <form action="../Functions4Kanban/Funcz4login.php" method="POST">
                <h1 class="loginFormText">⟁ Kanban Board</h1>

                <span class="Yloginspan">Welcome to our Kanban</span>
                <div class="Yinputfieldcenter ">
                      <div class="mt-5 Yinputf">
                        
                          
                          <input type="email" name="email" id="email" class="input-field mb-5" placeholder="Enter Email">
                        
                          <div class="psw-eye">
                            <input type="password" name="password" id="password" class="input-field-psw mb-5" placeholder="Enter Password">
                            <i class="fa fa-eye toggle-password" onclick="togglePassword()" aria-hidden="true"></i>
                          
                        </div>
                        <?php if (isset($LoginError)) echo '<div style="color:red;">'.$LoginError.'</div>';?>
                          <button type="submit" class="button mt-1" name="signin" id="signin">Login</button>
                        </div>
                </div> 
                <span class="Yloginspan mt-3"><a href="signup.php" class="YColor3e306b">CREAT A NEW ACCOUNT ?</a></span>
             </form>

      </div>

  </div>

  <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var icon = document.querySelector(".toggle-password");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</body>
</html>