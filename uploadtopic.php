<?php

if (isset($_POST['upload'])) {

// Deze code zou in de class Post moeten komen oop werken


    $target = "images/Posts/" . basename($_FILES['image']['name']);

    $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");

    $image = $_FILES['image']['name'];
    $text = $_POST['text'];

    $statement = $conn->prepare("INSERT INTO Images (image, text) VALUES ('$image','$text')");
    $statement->bindValue(":image", $image);
    $statement->bindValue(":text", $text);
    $res = $statement->execute();

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg="Gelukt!";

    }
    else{
        $msg = "Probeer opnieuw!";
    }


}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
$records = $conn->prepare('SELECT * FROM images');
$records->execute();
while($row = $records->fetch(PDO::FETCH_ASSOC) ){
    echo "<div id='img_div'>";
        echo "<img src='images/Posts/".$row['image']."'>";
        echo "<p>".$row['text']."</p>";
            echo "</div>";
}


?>

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


</body>
</html>
