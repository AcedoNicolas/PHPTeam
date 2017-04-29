<?php
class Post{
        // feature 5
    function Create(){}




        // feature 7
    function Search($zoek)
    {
        //connectie maken (PDO)
        $conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");

        //query
        //$statement = $conn->prepare("SELECT * FROM `images` WHERE text like ':key'");
        $statement = $conn->prepare("SELECT * FROM `images` WHERE text like :key");
        $statement->bindValue(':key', '%' . $zoek . '%');

        //query starten
        $statement->execute();
        // uitlezen

        $count = $statement->rowCount();

        if ($count > 0) {

            while ($row = $statement->fetch()) {
                //var_dump($row);
                $this->data[] = $row;
            }
            return $this->data;

        }else{
            echo 'We hebben helaas niets gevonden';
        }
    }






    function Ophalen ($id){
        $conn= new PDO("mysql:host=localhost;dbname=IMDterest","root","");
        //query
        //$statement = $conn->prepare("SELECT * FROM `images` WHERE id is :id");
        $statement = $conn->prepare("SELECT * FROM `images` WHERE id = :id");
        //$statement = $conn->prepare("SELECT * FROM `images`");
        $statement->bindValue(':id',$id);
        //query starten
       $statement->execute();
        $row = $statement->fetch();
        //var_dump($row);
        return $row;

    }









}