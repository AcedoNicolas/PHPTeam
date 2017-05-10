<?php
include_once ("classes/Db.php");

class Post{
        // feature 5
    function Create(){}




        // feature 7
    function Search($zoek)
    {
        //connectie maken (PDO)
        //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
        //$conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");
        $conn = Db::getInstance();
        //query
        //$statement = $conn->prepare("SELECT * FROM `images` WHERE text like ':key'");
        $statement = $conn->prepare("SELECT * FROM `images` WHERE ( text like :key) or (eigenaar like :key)or (locatie like :key)");
        $statement->bindValue(':key', '%' . $zoek . '%');

        //query starten
        $statement->execute();

        // uitlezen
        $count = $statement->rowCount();
        if ($count > 0) {

            //$row = $statement->fetch(PDO::FETCH_ASSOC);




            while ($row = $statement->fetch()) {
                $this->data[] = $row;
            }
            return $this->data;

        }else {
            //$msg = "We hebben helaas niets gevonden";
            echo 'We hebben helaas niets gevonden';
            //return $msg;
        }
    }






    function Ophalen ($id){
        //$conn= new PDO("mysql:host=localhost;dbname=IMDterest","root","");
        //$conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");
        $conn = Db::getInstance();
        //query
        $statement = $conn->prepare("SELECT * FROM `images` WHERE id = :id");
        $statement->bindValue(':id',$id);
        //query starten
       $statement->execute();
       $row = $statement->fetch();
        //var_dump($row);
        return $row;

    }


// feature 11

// persoon klikt op post
// klikt op de verwijder knop
// popup met 'wil je dit echt verwijderen'
// klik ja => verwijder
    public $m_iIdpost;
    public $m_sGebruiker;

public function DeletePost()
{
// maak connectie
    //$conn= new PDO("mysql:host=localhost;dbname=IMDterest","root","");
    //$conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");
    $conn = Db::getInstance();

// zoek ik 'images' waar id = id van de post en waar eigenaar = session'fullname'
    $statement = $conn->prepare("SELECT * FROM `images` WHERE id = :id");
    $statement->bindParam(':id',$this->m_iIdpost);
    $statement->execute();
    $res = $statement->fetch();

$count = $statement->rowCount();
// als row count = 1
if ($count = 1){
    if ($res['eigenaar'] == $this->m_sGebruiker){
        // dan verwijder
        // querry maken 'delete'
        //execute om te verwijderen
        $statement = $conn->prepare("DELETE FROM `images` WHERE id = '$this->m_iIdpost'");
        $msg=$statement->execute();
        return $msg;
    }else{
        $msg = "De foto is niet van jou, je kan hem niet wissen";
        return $msg;
    }
    // else = niet verwijderen (message tonen)
}else{
    $msg= " Er is een fout opgetreden, kan de foto niet wissen";
    return $msg;
}
}

    function humanTiming ($time)
    {

        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'jaar',
            2592000 => 'maand',
            604800 => 'week',
            86400 => 'dag',
            3600 => 'uur',
            60 => 'minuten',
            1 => 'seconden'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'':'');
        }

    }


}