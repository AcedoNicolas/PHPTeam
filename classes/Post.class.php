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
         /*while ($row = $statement->fetch()){
              $row['text']."</br>";

         }*/

        /* $row = $statement->fetch();
         return $row;*/


         //return    $row['text'];


            while($row = $statement->fetch()){
            $this->data[]=$row;
            //print_r($rows);
        }
            return $this->data;


        }









}