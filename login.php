<?php
session_start();

spl_autoload_register(function ($class) {
    include_once("classes/" . $class . ".php");
});

if ((isset($_POST['BtnLogin']))&&(!empty($_POST))) {
    try {
        $login = new User();
        $login->Email = $_POST["email"];
        $login->Password = $_POST["password"];
        $login->Trylogin();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
} elseif ((isset($_POST['BtnRegister']))&&(!empty($_POST))) {
    try {
        $user = new user();
        $fullnameErr = $emailErr = $passErr = "";
        if (empty($_POST["fullname"])) {
            $fullnameErr = "Full name is required";
        } else {
            $user->Fullname= $_POST["fullname"];
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $user->Email = $_POST["email"];
        }

        if (empty($_POST['pass'])) {
            $passErr = "password is required";
        } else {
            $user->Password = $_POST["pass"];
        }


        if (empty($fullnameErr || $emailErr || $passErr)) {
            $user->Save();
            header("Location: loggedin.php");
            //$succes = "the user has been saved.";
        }
    } catch (Exception $e) {
        $error= $e->getMessage();
    }
}



?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Imdterest groep 14</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- test  info over bootstrap =>      http://getbootstrap.com/components/       -->
   
    <!-- css linken -->
    <link rel="stylesheet" href="css/loginStyle.css">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
           $("#RegisterForm").hide();

            $("#BtnToRegister").click(function(){
                $("#LoginForm").hide();
                $("#RegisterForm").show();
            });
            $("#BtnToLogin").click(function(){
                $("#RegisterForm").hide();
                $("#LoginForm").show();

            });
        });
    </script>

</head>
<body>
    <div class="background-image"></div>
    
    <div id="loginDIV">
       <div id="links">
            <img src="images/foto1.jpg" alt="intro foto login">
        </div>
            
        <div id="rechts" class="">
           <img src="images/logoimd.png" alt="logo imd">
            <h1>Welkom bij IMDterest</h1>
            <p>De ideeëncatalogus voor creative mensen </p>
            
            <form action="" method="post" id="LoginForm">
              
               
                <label for="email">email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="email">
                
                <label for="password">wachtwoord</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="wachtwoord">
                
                <button class="btn btn-default" id="BtnLogin" name="BtnLogin">log in</button>
                <p>Schrijf je <a href="#" id="BtnToRegister">hier</a> in</p>

            </form>

            <form action="" method="post" id="RegisterForm">

                <label for="fullname">Jouw naam</label>
                <p class="MsgError"><?php if (!empty($fullnameErr)) {
    echo $fullnameErr;
} ?></p>
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="volledige naam">


                <label for="email">email</label>
                <p class="MsgError"><?php if (!empty($emailErr)) {
    echo $emailErr;
}; ?></p>

                <input type="text" name="email" id="email" class="form-control" placeholder="email">


                <label for="pass">wachtwoord</label>
                <p class="MsgError"><?php if (!empty($passErr)) {
    echo $passErr;
} ?></p>

                <input type="password" name="pass" id="pass" class="form-control" placeholder="wachtwoord">


                <button class="btn btn-default" id="BtnRegister" name="BtnRegister">inschrijven</button>
                <p>log je <a href="#" id="BtnToLogin" >hier</a> aan</p>
            </form>

        </div>
        
         <!-- alert boodschap -->
        <?php if (isset($error)):?>
            <div class="alert alert-danger error" role="alert"><?php echo $error; ?></div>
        <?php endif; ?>


    </div>
    
    
    
    <!-- <footer> hier komen nog links in</footer> -->
</body>
</html>