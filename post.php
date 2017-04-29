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

//altijd alle laatste activiteiten ophalen
$recentActivities = $activity->GetRecentActivities();
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
    <link rel="stylesheet" href="css/commentStyle.css">

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

<div id="commentSection">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="page-header">Comments</h2>
                <section class="comment-list">
                    <!-- First Comment -->

                    <?php if(count($recentActivities) > 0): ?>

                    <?php foreach($recentActivities as $key=>$singleActivity):?>


                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" src="<?php echo $_SESSION['avatar']; ?>" />
                                <figcaption class="text-center"><?php echo $_SESSION['fullname'] ;?></figcaption>
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
    <!--<div commentinfo>
    <img src="images/avatar.png" alt="avatar">
    <p>naam eigenaar</p>
    </div>-->






<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="widget-area no-padding blank">
                <div class="status-upload">
                    <form action="" method="post">
                        <textarea placeholder="Vertel wat je van deze afbeelding denkt" name="activitymessage" ></textarea>

                        <input type="submit" class="btn btn-success green" value="comment" ><i class="fa fa-share"></i>
                    </form>
                </div><!-- Status Upload  -->
            </div><!-- Widget Area -->
        </div>
    </div>
</div>



</div>


</body>
</html>