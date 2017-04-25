<?php


class Login
{

    public function Trylogin()
    {
        session_start();


        if (isset($_SESSION['user_id'])) {
            header("Location: /");
        }


        if (!empty($_POST['email']) && !empty($_POST['password'])):
            $conn = new PDO("mysql:host=localhost;dbname=imdterest", "root", "");

            $records = $conn->prepare('SELECT id,email,password,fullname FROM Users WHERE email = :email');
            $records->bindParam(':email', $_POST['email']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);


            if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

                $_SESSION['user_id'] = $results['id'];
                header("Location: loggedin.php");
                $_SESSION['email'] = $results['email'];
                $_SESSION['fullname'] = $results['fullname'];

            } else {
                $message = 'Sorry, those credentials do not match';
            }
        endif;

    }


}






