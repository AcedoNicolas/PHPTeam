<?php
include_once ("classes/User.class.php");
session_start();
?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Imdterest groep 14</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- info over bootstrap =>      http://getbootstrap.com/components/       -->
   
    <!-- linken css
    <link rel="stylesheet" href="css/.css">
    -->
    <style>
        .imdlogo{
            width: 15%;
        }
        
        .leegstatus{
            margin-top: 250px;
        }
    
    </style>
    
</head>
<body>
    
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="images/logoimd.png" alt=" logo imd" class="imdlogo">
      <a class="navbar-brand" href="#">IMDterest</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Zoek inspiratie">
        </div>
        <button type="submit" class="btn btn-default">Zoek</button>
      </form>
      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mijn account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="changepassword.php">Wijzig wachtwoord</a></li>
              <li><a href="logout.php">Log out</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
    
    <div class="jumbotron leegstatus">
      <div class="container">
          <h1> Hallo,
          <?php
          if (isset($_SESSION['fullname'])){
              echo $_SESSION['fullname'];
          }
          ?>
          </h1>
  <p>Je hebt nog geen pins leuk gevonden, ontdek ze hier !</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">pins zoeken</a></p>
        </div>
</div>
    
    <!-- <footer> hier komen nog links in</footer> -->
</body>
</html>