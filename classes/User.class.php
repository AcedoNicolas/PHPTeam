<?php

class User{
    private $m_sFullname;
    private $m_sUsername;
    private $m_sEmail;
    private $m_sPassword;


    public function __set($p_sProporty,$p_vValue){
        switch ($p_sProporty){
            case "Fullname":
                $this->m_sFullname = $p_vValue;
                break;

            case "Username":
                $this->m_sUsername  = $p_vValue;
                break;

            case "Email":
                $this->m_sEmail  = $p_vValue;
                break;

            case "Password":
                $options = [
                    'cost' => 12,
                ];
                $this->m_sPassword  = password_hash($p_vValue, PASSWORD_DEFAULT, $options);
                break;

        }
    }

    public function __get($p_sProporty){
        switch ($p_sProporty){
            case "Fullname":
                return $this->m_sFullname;
                break;

            case "Username":
                return $this->m_sUsername;
                break;

            case "Email":
                return $this->m_sEmail;
                break;

            case "Password":
                return $this->m_sPassword;
                break;

        }


    }

    public function Save(){
        //connectie maken (PDO)
        $conn= new PDO("mysql:host=localhost;dbname=IMDterest","root","");

        //query
        $statement = $conn->prepare("INSERT INTO Users (fullname,username,email,password) VALUES (:Fullname,:Username,:Email,:Password)");
        $statement->bindValue(":Fullname",$this->m_sFullname);
        $statement->bindValue(":Username",$this->m_sUsername);
        $statement->bindValue(":Email",$this->m_sEmail);
        $statement->bindValue(":Password",$this->m_sPassword);



        //query starten
        $res = $statement->execute();

        //fail of pass?
        return($res);

    }

    public function Login($email, $password){

    }



}
