<?php

class User
{
    private $m_sFullname;
    private $m_sEmail;
    private $m_sPassword;


    public function __set($p_sProporty, $p_vValue)
    {
        switch ($p_sProporty) {
            case "Fullname":
                $this->m_sFullname = $p_vValue;
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

        }
    }

    public function Save()
    {
        //connectie maken (PDO)
        //$conn= new PDO("mysql:host=localhost;dbname=IMDterest","root","");
        //$conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");
        $conn = Db::getInstance();
        //query
        $statement = $conn->prepare("INSERT INTO Users (fullname,email,password) VALUES (:Fullname,:Email,:Password)");
        $statement->bindValue(":Fullname", $this->m_sFullname);
        $statement->bindValue(":Email", $this->m_sEmail);
        $statement->bindValue(":Password", $this->m_sPassword);



        //query starten
        $res = $statement->execute();

        //fail of pass?
        return($res);
    }

    public function setAvatar()
    {
        //$target = "images/Posts/avatar" . basename($_FILES['image']['name']);

            //$conn = new PDO("mysql:host=localhost;dbname=IMDterest", "root", "");
           // $conn = new PDO("mysql:host=localhost;dbname=jorisd1q_IMDterest", "jorisd1q_joDeis", "jo-ris-D-22L");
            $conn = Db::getInstance();
            //$image = $_FILES['image']['name'];
            $id = $_SESSION['user_id'];
        $statement=$conn->prepare("SELECT * from Users WHERE ID = $id");
            //$res=$statement->execute();


        /*
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                        $msg="Gelukt!";

                    }
                    else{
                        $msg = "Probeer opnieuw!";



                }*/
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
}
