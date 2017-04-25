<?php
include_once("classes/User.class.php");


if (!empty($_POST)) {
    try {
        $user = new user();
        $user->Fullname = $_POST["fullname"];
        $user->Username = $_POST["username"];
        $user->Email = $_POST["email"];
        $user->Password = $_POST["pass"];
        $user->Save();

        header("Location: loggedin.php");
        //$succes = "the user has been saved.";
    } catch (Exception $e) {
        $error = $e->getMessage();
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
    <!-- info over bootstrap =>      http://getbootstrap.com/components/       -->

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

            <label for="fullname">Jouw naam</label>
            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="volledige naam">

            <label for="username">username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="username">

            <label for="email">email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="email">

            <label for="pass">wachtwoord</label>
            <input type="password" name="pass" id="pass" class="form-control" placeholder="wachtwoord">

            <button class="btn btn-default">inschrijven</button>
            <p>log je <a href="login.php">hier</a> aan</p>
        </form>
    </div>


    <!-- alert boodschap -->


    <?php if (isset($error)): ?>
        <div class="alert alert-danger error" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>

    <!-- <?php /*if(isset($succes)):*/ ?>
        <div class="succes"><?php /*echo $succes; */ ?></div>
    --><?php /*endif; */ ?>


</div>


<!-- <footer> hier komen nog links in</footer> -->
</body>
</html>