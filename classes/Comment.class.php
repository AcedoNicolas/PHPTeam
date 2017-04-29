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


        //query starten
        $statement->execute();
        // uitlezen

        echo 'gelukt';
        var_dump($_SESSION);
    }


        public
        function GetRecentActivities()
        {
            if ($link = mysqli_connect($this->m_sHost, $this->m_sUser, $this->m_sPassword, $this->m_sDatabase)) {
                $sSql = "select * from tblactivities ORDER BY pk_activity_id DESC LIMIT 5";
                $rResult = mysqli_query($link, $sSql);
                return $rResult;
            } else {
                // er kon geen connectie gelegd worden met de databank
                throw new Exception('Ooh my, something terrible happened to the database connection');
            }


        }

}