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
        $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");

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

            $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
            $statement = $conn->prepare("SELECT * FROM `tblactivities` WHERE idPost = $idPost");
            $statement->execute();

            $row = $statement->fetchAll(PDO::FETCH_ASSOC);

                return $row;
                    }

        public function GegevensOphalen($id)
        {
            $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");

            $statement = $conn->prepare("SELECT id,fullname, avatar FROM `Users` WHERE id = $id");
            $statement->execute();

            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        }

}