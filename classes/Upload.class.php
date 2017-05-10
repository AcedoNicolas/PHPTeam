<?php

class Upload
{
    public function TryUpload()
    {
        // voorlopig upload php code hier
        $eigenaar = $_SESSION['fullname'];
        $locatie = $_SESSION['location'];


        //var_dump($eigenaar);

        if (isset($_POST['upload'])) {

            $target = "images/Posts/" . basename($_FILES['image']['name']);

            //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
            $conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");

            $image = $_FILES['image']['name'];
            $text = $_POST['text'];

            //$statement = $conn->prepare("INSERT INTO Images (image, text, eigenaar, locatie) VALUES ('$image','$text','$eigenaar','$locatie')");
            $statement = $conn->prepare("INSERT INTO images (image, text, eigenaar, locatie) VALUES (:image, :text, :eigenaar, :locatie)");
            $statement->bindValue(":image", $image);
            $statement->bindValue(":text", $text);
            $statement->bindValue(":eigenaar", $eigenaar);
            $statement->bindValue(":locatie", $locatie);


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