<?php
/**
 * Created by PhpStorm.
 * User: jorisdelvaux
 * Date: 29/04/17
 * Time: 12:49
 */
class Comment
{
    private $m_sText;
    private $m_iidUser;
    private $m_iidPost;


    public function __set($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty) {
            case "Text":
                $this->m_sText = htmlspecialchars($p_vValue);
                break;
            case "idUser":
                $this->m_iidUser  = $p_vValue;
                break;
            case "idPost":
                $this->m_iidPost  = $p_vValue;
                break;
        }
    }

    public function __get($p_sProperty)
    {
        $vResult = null;
        switch ($p_sProperty) {
            case "Text":
                return  $this->m_sText;
                break;
            case "idUser":
                return $this->m_iidUser;
                break;
            case "idPost":
                return $this->m_iidPost;
                break;
        }
    }

    public function SavePost()
    {
        //connectie maken (PDO)
        $conn = Db::getInstance();
        //query
        $statement = $conn->prepare("INSERT INTO tblactivities (comment_des, idUser, idPost) VALUES (:Text, :User, :Post)");
        $statement->bindValue(':Text', $this->m_sText);
        $statement->bindValue(':User', $this->m_iidUser);
        $statement->bindValue(':Post', $this->m_iidPost);
        $statement->execute();
    }


    public function GetRecentActivities()
    {

            $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM `tblactivities` WHERE idPost = $this->m_iidPost ORDER BY `id` DESC ");
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function GegevensOphalen($id)
    {
            $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT ID,fullname, avatar FROM `Users` WHERE id = $id");
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }



    public function likeDoorgeven($klik)
    {
            $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM `likes` WHERE idUser = :User AND idPost = :Post");
        $statement->bindValue(':User', $this->m_iidUser);
        $statement->bindValue(':Post', $this->m_iidPost);
        $statement->execute();
        $rij = $statement->fetchAll(PDO::FETCH_ASSOC);
        $aantal = $statement->rowCount();



        $likenstm = $conn->prepare("INSERT INTO likes (actie, idUser, idPost) VALUES (:like, :User, :Post)");
        $likenstm->bindValue(':like', $klik);
        $likenstm->bindValue(':User', $this->m_iidUser);
        $likenstm->bindValue(':Post', $this->m_iidPost);
// selectie if else zal niet helemaal juist zijn ? want er komt soms  return a teveel.
            if ($aantal > 0) {
                // if ingevoerde = O
                // je mag liken maar dislike wordt verwijderd
                if ($rij[0]['actie']== 0) {
                    $likenstm->execute();

                    $verwijder = $conn->prepare("DELETE FROM `likes` WHERE `id` = :id AND 'actie'=0");
                    $verwijder->bindValue(':id', $rij[0]['id']);
                    $verwijder->execute();

                    // if ingevoerde = 1
                    // je mag disliken, maar like wordt verwijderd
                }
                if ($rij[0]['actie']== 1) {
                    $likenstm->execute();

                    $verwijder = $conn->prepare("DELETE FROM `likes` WHERE `id` = :id AND 'actie'=0");
                    $verwijder->bindValue(':id', $rij[0]['id']);
                    $verwijder->execute();
                }
                    return $a = 'je mag maar 1 keer liken';

            } else {
                $likenstm->execute();
            }
    }
    public function likesUitlezen()
    {

            $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM `likes` WHERE idPost = $this->m_iidPost AND actie = 1");
        $statement->execute();

        $row = $statement->rowCount();
        return $row;
    }
    public function dislikesUitlezen()
    {
            $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM `likes` WHERE idPost =$this->m_iidPost AND actie = 0");
        $statement->execute();

        $row = $statement->rowCount();
        return $row;
    }
}
