<?php

spl_autoload_register(function ($class) {
    include_once("classes/" . $class . ".php");
});
session_start();

if (!empty($_POST)) {


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
<form name="changeprofile" id="changeprofile" action="#" method="post">
    <fieldset>
        <label>Fullname</label>
        <input id="fullname" name="fullname" type="text" placeholder="Full Name"
               value="<?php echo $_SESSION['fullname'] ?>"/>
    </fieldset>
    

    <fieldset>
        <label>Password</label>
        <input id="password" name="password" type="password" placeholder="Enter new password"/>
    </fieldset>

    <fieldset>
        <button id="update" type="submit">Save changes</button>
    </fieldset>

</form>


<!-- <footer> hier komen nog links in</footer> -->
</body>
</html>