<?php
include_once ("classes/Post.class.php");

if (isset($_GET['nr'])){
    $detail = new Post();

    $postID = $_GET['nr'];

     $r=$detail->Ophalen($postID);

}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- info over bootstrap =>      http://getbootstrap.com/components/       -->

    <title>post</title>
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


                <a href="loggedin.php" class="btn btn-default">terug</a>




            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!-- post van de gevonden resultaten -->
    <?php if (!empty($res)): foreach($res as  $r): ?>
        <a href="post.php?nr=<?php echo $r['id'] ; ?>">
            <div id="post">
                <img src="images/Posts/<?php echo $r['image'];?>" alt="foto post">
                <p><? echo $r['text'];?></p>
            </div>
        </a>
    <?php endforeach; endif; ?>




</div>




<div id="postGroot">
    <h1><?php echo $r['text'];?></h1>

    <img src="images/Posts/<?php echo $r['image'];?>" alt="foto post">
</div>
<div id="comment">
    <div commentinfo>
    <img src="images/avatar.png" alt="avatar">
    <p>naam eigenaar</p>
    </div>

    <form action="" method="post">
        <label for="inputcomment">commentaar</label>
        <input type="text" name="comment" id="inputcomment" >
        <input type="submit" value="verzenden">
    </form>

</div>
</body>
</html>