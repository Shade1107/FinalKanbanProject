<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <form action="func4signup.php" method="POST">
            <h1 class="loginFormText"><img src="../image/logo3.png" width="120px" height="50px"></h1>
            <span class="Yloginspan">Welcome to our Kanban</span>
            <div class="Yinputfieldcenter ">
                <div class="mt-5 Yinputf">
                <input type="text" id="text" name="name" class="input-field mb-5" placeholder="Enter YourName" value="<?= isset($_SESSION['signup_data']['name']) ? htmlspecialchars($_SESSION['signup_data']['name']) : '' ?>">
                    <?php if (isset($_GET['NameEmpty'])): ?>
                        <p class="text-info" style="color: red !important;">Name is required</p>
                    <?php endif; ?>

                    <input type="email" id="email" name="email" class="input-field-psw  mb-5" placeholder="Enter Email" value="<?= isset($_SESSION['signup_data']['email']) ? htmlspecialchars($_SESSION['signup_data']['email']) : '' ?>">
                    <?php if (isset($_GET['EmailEmpty'])): ?>
                        <p class="text-info" style="color: red !important;">Email is required</p>
                    <?php elseif (isset($_GET['EmailExists'])): ?>
                        <p class="text-info" style="color: red !important;">This email is already in use</p>
                    <?php endif; ?>

                    <div class="psw-eye">
                        <input type="password" id="password" class="input-field-psw  mb-5" name="password" placeholder="Enter Password">
                        <i class="fa fa-eye toggle-password" onclick="togglePassword()" aria-hidden="true"></i>
                        
                        <?php if (isset($_GET['PasswordEmpty'])): ?>
                            <p class="text-info" style="color: red !important;">Password is required</p>
                        <?php endif; ?>
            </div>

        <div>
            <select class="input-field" id="gender" name="gender_id">
                <option value="">Select Gender</option>
                <option value="1" <?= (isset($_SESSION['signup_data']['gender_id']) && $_SESSION['signup_data']['gender_id'] == '1') ? 'selected' : '' ?>>Male</option>
                <option value="2" <?= (isset($_SESSION['signup_data']['gender_id']) && $_SESSION['signup_data']['gender_id'] == '2') ? 'selected' : '' ?>>Female</option>
            </select>
            <?php if (isset($_GET['GenderEmpty'])): ?>
                <p class="text-info" style="color: red !important;">Gender is required</p>
            <?php endif; ?>
        </div>


                    <button type="submit" class="button mt-4">Sign Up</button>
                </div>
            </div> 
            <span class="Yloginspan mt-3">Already have an account? <a href="login.php" class="YColor3e306b">Login</a></span>
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
</html>
