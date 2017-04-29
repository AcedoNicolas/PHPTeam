<?php
class Post{

    function Create(){}





    function Search($zoek){
        //connectie maken (PDO)
        $conn= new PDO("mysql:host=localhost;dbname=IMDterest","root","");

        //query
        //$statement = $conn->prepare("SELECT * FROM `images` WHERE text like ':key'");
        $statement = $conn->prepare("SELECT * FROM `images` WHERE text like :key");
        $statement->bindValue(':key','%'.$zoek.'%');


        //query starten
       $statement->execute();

        // uitlezen

            while ($row = $statement->fetch()) {
                $this->data[] = $row;
            }
            try {
                return $this->data;
            }
            catch(Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
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