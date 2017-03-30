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
            $conn= new PDO("mysql:host=localhost;dbname=imdterest","root","");

            $records = $conn->prepare('SELECT id,email,password FROM Users WHERE email = :email');
            $records->bindParam(':email', $_POST['email']);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);

            $message = '';

            if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

                $_SESSION['user_id'] = $results['id'];
                header("Location: loggedin.php");

            } else {
                $message = 'Sorry, those credentials do not match';
            }
        endif;

    }



}






