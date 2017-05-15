<?php
spl_autoload_register(function ($class) {
    include_once("classes/" . $class . ".php");
});
session_start();
$eigenaar = $_GET['user'];
?><html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- info over bootstrap =>      http://getbootstrap.com/components/       -->

    <!-- linken css-->
    <link rel="stylesheet" href="css/style.css">


    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<body>
<p>
    <h1>

    <?php
    echo $eigenaar;

    ?>

</h1>
<img src="<?php echo $_SESSION['avatar']; ?>" alt="avatar foto" id="avatar">
<h2>Mijn posts</h2>

<div class="row">
    <?php
    //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
    $conn = Db::getInstance();

    $records = $conn->prepare('SELECT * FROM images where eigenaar = :eigenaar');
    $records->bindParam(':eigenaar',$eigenaar);
    $records->execute();
    while ($row = $records->fetch(PDO::FETCH_ASSOC)): ?>
        <a href="post.php?nr=<?php echo $row['id'];?>">

            <div class="col-md-4 portfolio-item">
                <img class="projectImg" src="<?php echo "images/Posts/".$row['image']; ?>" alt="titre">
                <div class="caption text-center">
                    <h3><?php echo $row['text'];?></h3>
                    <p>Van:
                        <b><?php echo $row['eigenaar'] ; ?></b>
                    </p>
                </div>
            </div>
        </a>
    <?php endwhile; ?>

</div>
</div>

</p>
</body>
</html>