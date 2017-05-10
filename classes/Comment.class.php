<?php
/**
 * Created by PhpStorm.
 * User: jorisdelvaux
 * Date: 29/04/17
 * Time: 12:49
 */
Class Comment
{
    public $m_sText;


    public function __set($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty) {
            case "Text":
                $this->m_sText = $p_vValue;
                break;
        }
    }

    public function __get($p_sProperty)
    {
        $vResult = null;
        switch ($p_sProperty) {
            case "Text":
                $vResult = $this->m_sText;
                break;
        }


    }

    public function SavePost()
    {
        //connectie maken (PDO)
        //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
        $conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");

        //query
        $statement = $conn->prepare("INSERT INTO tblactivities (comment_des, idUser, idPost) VALUES (:Text, :User, :Post)");
        $statement->bindValue(':Text', $this->m_sText);
        $statement->bindValue(':User', $_SESSION['user_id']);
        $statement->bindValue(':Post', $_GET['nr']);
        $statement->execute();
    }


        public function GetRecentActivities()
        {
            $idPost = $_GET['nr'];

            //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
            $conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");
            $statement = $conn->prepare("SELECT * FROM `tblactivities` WHERE idPost = $idPost");
            $statement->execute();

            $row = $statement->fetchAll(PDO::FETCH_ASSOC);

                return $row;
                    }

        public function GegevensOphalen($id)
        {
            //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
            $conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");

            $statement = $conn->prepare("SELECT id,fullname, avatar FROM `Users` WHERE id = $id");
            $statement->execute();

            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        }



        public function likeDoorgeven ($klik)
        {
            //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
            $conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");


            $statement = $conn->prepare("SELECT * FROM `likes` WHERE idUser = :User AND idPost = :Post");
            $statement->bindValue(':User', $_SESSION['user_id']);
            $statement->bindValue(':Post', $_GET['nr']);
            $statement->execute();
            $check = $statement->fetchAll(PDO::FETCH_ASSOC);

            // mag liken
            //if (($check['actie']== 0 )){

                $statement = $conn->prepare("INSERT INTO likes (actie, idUser, idPost) VALUES (:like, :User, :Post)");
                $statement->bindValue(':like', $klik);
                $statement->bindValue(':User', $_SESSION['user_id']);
                $statement->bindValue(':Post', $_GET['nr']);
                $statement->execute();


           // }
            // mag enkel disliken

/*
            if ($_SESSION['like'] == $_SESSION['user_id'] . "-" . $_GET['nr']."-".$klik) {

            $feedbackLike = "je kaan maar 1 keer liken";
            return $feedbackLike;
        }
            else{
                $statement->execute();
                $_SESSION['like'] = $_SESSION['user_id'] . "-" . $_GET['nr']."-".$klik;

            }
*/

        }
        public function likesUitlezen(){
            $idPost = $_GET['nr'];
            //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
            $conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");

            $statement = $conn->prepare("SELECT * FROM `likes` WHERE idPost = $idPost AND actie = 1");
            $statement->execute();

            $row = $statement->rowCount();
            return $row;




        }
        public function dislikesUitlezen(){

            $idPost = $_GET['nr'];
            //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
            $conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");

            $statement = $conn->prepare("SELECT * FROM `likes` WHERE idPost = $idPost AND actie = 0");
            $statement->execute();

            $row = $statement->rowCount();
            return $row;

        }

}