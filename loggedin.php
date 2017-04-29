<?php
include_once ("classes/User.class.php");
include_once ("classes/Post.class.php");
include_once ("classes/Upload.class.php");
session_start();
// nu kan je nog zonder passwoord naar de deze pagina komen. mag niet.


// bekijken of er al een sessie bestaat

// if sessie bestaat
        // bekijk of het id, pass of gegevens kloppen (geen idee welk)


//if sessie niet bestaat
    // redirect naar login.php
$res = "";
 if ((isset($_GET['zoek'])) && (!empty($_GET['zoek']))){
     $zoekopdracht = $_GET['zoek'];

     $search = new Post();
     $res = $search->Search($zoekopdracht);
      }

if ((isset($_POST['avatar'])) && (!empty($_POST['avatar']))){
     $g = new User();
     //$g->setAvatar();
}

if((isset($_POST['upload']))&&(!empty($_POST))) {
    try {


        $upload = new upload();
        $upload->image = $_FILES['image']['name'];
        $upload->text = $_POST['text'];
        $upload->TryUpload();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- info over bootstrap =>      http://getbootstrap.com/components/       -->
   
    <!-- linken css-->
    <link rel="stylesheet" href="css/style.css">


    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
        $(document).ready(function(){
            $("#popup").hide();

            $("#BtnAvatar").click(function(){
                $("#popup").show();
                $("#TotalContainer").css({"filter": "blur(3px)"});

            });
            // if klik close, dan
            $("#opslaan").click(function(){
                $("#popup").hide();
            });
        });
    </script>

</head>
<body>
    <div id="TotalContainer">
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
      <img src="images/logoimd.png" alt="logo imd" class="imdlogo">
      <a class="navbar-brand" href="loggedin.php">IMDterest</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <form action="" method="get" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Zoek inspiratie" name="zoek">
        </div>
        <button type="submit" class="btn btn-default">Zoek</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
          <li> <img src="<?php echo $_SESSION['avatar']; ?>" alt="avatar foto" id="avatar"></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mijn account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
              <li><a href="#" id="BtnAvatar" name="BtnAvatar">profielfoto aanpassen</a></li>
            <li><a href="changepassword.php">Wijzig wachtwoord</a></li>

              <li><a href="logout.php">Log out</a></li>
          </ul>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Upload inspiratie</button>

        <!-- Modal -->
        <div id="myModal2" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload inspiratie</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="LoginForm" enctype='multipart/form-data'>

                            <div>
                                <input type="file" name="image">
                            </div>
                            <div>
                                <textarea name="text" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-default" id="BtnLogin" name="upload">Upload</button>
                            </div>
                        </form>
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <h2><?php if (isset($feedback)){echo $feedback;} ?></h2>

<!-- post van de gevonden resultaten -->
<?php if (!empty($res)): foreach($res as  $r): ?>
    <a href="post.php?nr=<?php echo $r['id'] ; ?>">
    <div id="post">
        <img src="images/Posts/<?php echo $r['image'];?>" alt="foto post">
        <p><? echo $r['text'];?></p>
    </div>
    </a>
<?php endforeach; endif; ?>

        <div class="container">
            <div class="row">
            <!-- niet oop gewerkt, beter om in de classe post een functie te maken -->
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
                $records = $conn->prepare('SELECT * FROM images');
                $records->execute();
                while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class=\"col-md-3 portfolio-item\">  <a href=\"#\">";

                    echo "<img class='img-responsive' src='images/Posts/" . $row['image'] . "'></a>";
                    echo "<p>" . $row['text'] . "</p>";
                    echo "<p> Door: " . $row['eigenaar'] . "</p>";
                    echo "</div>";


                }


                ?>

                <div class="col-md-3 portfolio-item">
                    <a href="#">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                    </a>
                </div>
                <div class="col-md-3 portfolio-item">
                    <a href="#">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                    </a>
                </div>
                <div class="col-md-3 portfolio-item">
                    <a href="#">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                    </a>
                </div>
                <div class="col-md-3 portfolio-item">
                    <a href="#">
                        <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                    </a>
                </div>
            </div>
        </div>

<?php if (empty($res)): ?>
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
          <p>
          <a href="uploadtopic.php">Upload een inspiratie!</a>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">pins zoeken</a></p>
        </div>
</div>
        <?php endif; ?>
    </div>



    <!-- change profielfoto -->
    <div class="popup" id="popup">
        <form action="" method="post">
            <ul>
                <li><h3>Upload hier je foto</h3></li>
                <li> <input type="file" name="avatar"></li>
                <li> <input type="submit" id="opslaan" class="btn btn-primary" href="#" value="Opslaan"><p>of <a
                                href="">sluiten</a></p></li>
            </ul>
        </form>
    </div>



    <!-- <footer> hier komen nog links in</footer> -->
</body>
</html>