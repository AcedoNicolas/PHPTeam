 <?php
include_once ("classes/Post.class.php");
include_once ("classes/Comment.class.php");
session_start();

/* post ophalen en laten zien */
if ((isset($_GET['nr']))&&(!empty($_GET['nr']))){
    $detail = new Post();
    $postID = $_GET['nr'];
    $r=$detail->Ophalen($postID);
}
else{
    header("location:loggedin.php");
}

/* comment plaatsen */
$activity = new Comment();

//controleer of er een update wordt verzonden
if(!empty($_POST['activitymessage']))
{
    $activity->Text = $_POST['activitymessage'];
    try
    {
        //$comm = $_POST['activitymessage'];
        $activity->SavePost();
    }
    catch (Exception $e)
    {
        $feedback = $e->getMessage();
    }
}
//altijd alle laatste comments ophalen
$recentActivities = $activity->GetRecentActivities();


// foto verwijderen
if(isset($_POST['Dltbutton2'])){
    $Del = new Post();
    $Del->m_iIdpost = $_GET['nr'];
    $Del->m_sGebruiker = $_SESSION['fullname'];
    $res2 = $Del->DeletePost();
    if ($res2 === true){
        $feedback = "de foto is goed verwijderd";
        header('location: post.php');
    }else{
        $feedback = $res2;
    }
}

 $tijd = strtotime("$r[time]");
 $time = new Post();
 $verlopentijd = $time->humanTiming($tijd);

// een foto liken
         if ((isset($_POST['like'])) || (isset($_POST['dislike']))){

                 if (isset($_POST['like'])){
                     $klik= true;
                 }if (isset($_POST['dislike'])){
                     $klik = false;
                 }
             $like = new Comment();
                 $like->idUser = $_SESSION['user_id'];
                 $like->idPost = $_GET['nr'];
             $feed = $like->likeDoorgeven($klik);
         }

 // likes weergeven
$geef = new Comment();
$showlikes=$geef->likesUitlezen();
$showDislikes=$geef->dislikesUitlezen();

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/commentStyle.css">

    <!-- info over bootstrap =>      http://getbootstrap.com/components/       -->
    <link rel="stylesheet" href="css/style.css">

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
    <p><?php echo "Geplaatst door: <b>".$r['eigenaar']. "</b> in <b>". $r['locatie']. "</b> : <b>".$verlopentijd. "</b>  geleden" ;?></p>
    <div id="likes">

        <?php if (isset($showlikes)): ?>
            <p>Deze foto heeft <?php echo "<b>".$showlikes."</b>" ;?> likes</p>
        <?php endif; ?>

        <?php if (isset($showDislikes)): ?>
            <p>Deze foto heeft <?php echo "<b>".$showDislikes."</b>" ;?> Dislikes</p>
        <?php endif; ?>

        <?php if (isset($feed)){ echo "<p class='errorText'>".$feed."</p>";} ;?>

        <form action="" method="post">
            <p>like de foto nu</p>
            <input type="submit" id="btnlike" name="like" value="like">
            <input type="submit" id="btndislike" name="dislike" value="dislike">
        </form>
    </div>
    <div>
        <form action="" method="post">
            <input type="submit" value="verwijder deze foto" name="Dltbutton">
        </form>
        <p class="errorText"><?php if (isset($feedback)){echo $feedback;} ;?></p>
    </div>

    <!-- weet je zeker dat je dit wilt verwijderen -->
    <?php if (isset($_REQUEST['Dltbutton'])):?>
    <div id="popupDelete">
        <form action="" method="post">
            <p>weet je zeker dat je dit wilt verwijderen?</p>
            <input type="submit" name="Dltbutton2" value="ja">
            <a href="">nee</a>

        </form>
    </div>
    <?php endif; ?>

</div>


<div id="commentSection">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="page-header">Comments</h2>
                <section class="comment-list">
                    <!-- First Comment -->

                    <?php if(count($recentActivities) > 0): ?>

                    <?php foreach($recentActivities as $key=>$singleActivity):?>

                    <?php   $commentGeg = new comment();
                            $userID = $singleActivity['idUser'];
                            $persoon=$commentGeg->GegevensOphalen($userID);
                    ?>

                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="<?php echo $persoon[0]['avatar']; ?>" />
                                <figcaption class="text-center"><?php echo $persoon[0]['fullname'] ;?></figcaption>
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <!--<header class="text-left">
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                                    </header> -->
                                    <div class="comment-post">
                                        <p>
                                            <?php echo $singleActivity['comment_des'] ;?>

                                        </p>
                                        <p class="kleinText">gepotst op: <?php echo $singleActivity['time']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <p> <?php echo "Schrijf de eerste commentaar !"; ?></p>


                    <?php endif; ?>

                </section>
            </div>
        </div>
    </div>
</div>


<div id="comment">





<div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="widget-area no-padding blank">

                <div class="status-upload">
                    <form action="" method="post">
                        <textarea placeholder="Vertel wat je van deze afbeelding denkt" id="activitymessage" name="activitymessage" ></textarea>

                        <input type="submit" class="btn btn-success green" value="comment" id="btnSubmit"><i class="fa fa-share"></i>
                    </form>
                </div><!-- Status Upload  -->
            </div><!-- Widget Area -->
        </div>
    </div>
</div>



</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
<!--<script src="js/Feature9-ajax.js"></script> -->
<!--<script src="js/likes.js"></script>-->

</body>
</html>