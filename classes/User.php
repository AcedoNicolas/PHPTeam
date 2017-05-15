<?php

class User
{
    private $m_sFullname;
    private $m_sEmail;
    private $m_sPassword;
    private $m_sAvatar;


    public function __set($p_sProporty, $p_vValue)
    {
        switch ($p_sProporty) {
            case "Fullname":
                $this->m_sFullname = $p_vValue;
                break;

            case "Email":
                $this->m_sEmail = $p_vValue;
                break;

            case "Password":
                $options = [
                    'cost' => 12,
                ];
                $this->m_sPassword = password_hash($p_vValue, PASSWORD_DEFAULT, $options);
                break;

            case "Avatar":

                $this->m_sAvatar = $p_vValue;
                break;

        }
    }

    public function __get($p_sProporty)
    {
        switch ($p_sProporty) {
            case "Fullname":
                return $this->m_sFullname;
                break;

            case "Email":
                return $this->m_sEmail;
                break;

            case "Password":
                return $this->m_sPassword;
                break;

            case "Avatar":

                $this->m_sAvatar;

                break;
        }
    }

    public function Save()
    {
        //connectie maken (PDO)
        //$conn= new PDO("mysql:host=localhost;dbname=IMDterest","root","");
        //$conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");
        $conn = Db::getInstance();
        //query
        $statement = $conn->prepare("INSERT INTO Users (fullname,email,avatar,password) VALUES (:Fullname,:Email,:Avatar,:Password)");
        $statement->bindValue(":Fullname", $this->m_sFullname);
        $statement->bindValue(":Email", $this->m_sEmail);
        $statement->bindValue(":Avatar", $this->m_sAvatar);
        $statement->bindValue(":Password", $this->m_sPassword);


        //query starten
        $res = $statement->execute();

        //fail of pass?
        return ($res);
    }


    public function Trylogin()
    {
        if (isset($_SESSION['user_id'])) {
            echo "user al ingelogd";
            header("Location: loggedin.php ");
        }


        if ((!empty($this->m_sEmail)) && (!empty($this->m_sPassword))) {
            // $conn= new PDO("mysql:host=localhost;dbname=imdterest","root","");
            //$conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");
            $conn = Db::getInstance();

            $records = $conn->prepare('SELECT id,email,password,fullname,avatar FROM Users WHERE email = :email');
            $records->bindParam(':email', $_POST['email']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);


            if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
                $_SESSION['user_id'] = $results['id'];
                header("Location: loggedin.php");
                $_SESSION['email'] = $results['email'];
                $_SESSION['fullname'] = $results['fullname'];
                $_SESSION['avatar'] = $results['avatar'];
            } else {
                $message = 'Sorry, those credentials do not match';
            }
        }
    }


    public function updateUser(){

        $conn= Db::getInstance();


        $statement = $conn->prepare("UPDATE users SET Fullname=:fullname, Username=:username WHERE email=:user");
        $statement->bindValue(':fullname', $this->Fullname);
        $statement->bindValue(':user', $this->Email);

        return $statement->execute();

    }

    public function updatePassword(){

        $conn = Db::getInstance();
        $statement = $conn->prepare('UPDATE users SET password = :password WHERE email = :user');
        $statement->bindValue(':password', $this->Password);
        $statement->bindValue(':user', $this->m_sEmail);
        return $statement->execute();

    }

}
