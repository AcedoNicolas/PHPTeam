<?php
session_start();
include("classes/User.class.php");
$user = $_SESSION['email'];
if ($user) {
    if ($_POST['submit']) {
        $oldpassword = ($_POST['oldpassword']);
        $newpassword = ($_POST['newpassword']);
        $repeatnewpassword = ($_POST['repeatnewpassword']);

        $conn= new PDO("mysql:host=localhost;dbname=imdterest", "root", "");

        $records = $conn->prepare('SELECT password FROM Users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        } else {
            $message = 'Sorry, those credentials do not match';
        }
    } else {
        echo"  <form action='changepassword.php' method='POST'>
        old password: <input type='text' name='oldpassword'><p>
        New password: <input type ='password' name ='newpassword'><br>
        Repeat New password: <input type ='password' name ='repeatnewpassword'><br>
        <input type='submit' name='submit' value='Change password'>
</p>
</form>
    ";
    }
} else {
    die("Je moet ingelogd zijn om je passwoord te veranderen.");
}


?>



<!DOCTYPE html>
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

        <form action="" method="post" id="loginFORM">




            <label for="password">wachtwoord</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="wachtwoord">

            <button class="btn btn-default">log in</button>
            <p>Schrijf je <a href="login.php">hier</a> in</p>

        </form>

    </div>

    <!-- alert boodschap -->
    <?php if (isset($error)):?>
        <div class="alert alert-danger error" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>

    <!-- <?php /*if(isset($succes)):*/?>
            <div class="succes"><?php /*echo $succes; */?></div>
        --><?php /*endif; */?>

</div>



<!-- <footer> hier komen nog links in</footer> -->
</body>
</html>