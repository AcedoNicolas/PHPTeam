<?php

class Upload
{
    public function TryUpload()
    {




        // voorlopig upload php code hier
        $eigenaar = $_SESSION['fullname'];
        //var_dump($eigenaar);

        if (isset($_POST['upload'])) {

            $target = "images/Posts/" . basename($_FILES['image']['name']);

            $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");

            $image = $_FILES['image']['name'];
            $text = $_POST['text'];

            $statement = $conn->prepare("INSERT INTO Images (image, text, eigenaar) VALUES ('$image','$text','$eigenaar')");
            $statement->bindValue(":image", $image);
            $statement->bindValue(":text", $text);
            $statement->bindValue(":eigenaar", $eigenaar);

            $res = $statement->execute();


            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Gelukt!";

            } else {
                $msg = "Probeer opnieuw!";
            }



        }

    }
}

?>