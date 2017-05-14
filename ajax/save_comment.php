<?php

//include_once("../classes/Comment.class.php");
 spl_autoload_register(function ($class) {
     include_once("../classes/" . $class . ".class.php");
 });
session_start();

$activity = new Comment();
$geg = new comment();
//controleer of er een update wordt verzonden
if (!empty($_POST['activitymessage'])) {
    $activity->Text = $_POST['activitymessage'];


    try {
        //$activity->idPost = $_GET['nr'];
        $activity->idUser = $_SESSION['user_id'];
        $activity->idPost = $_SESSION['post_id'];
        //$activity->idUser = 3;

        $activity->SavePost();
        $response['status'] = 'succes';
        $response['message'] = htmlspecialchars($_POST['activitymessage']);
//juiste id hebben om juiste naam en avatar up te loaden
        $response['persoon'] =$geg->GegevensOphalen($_SESSION['user_id']);

    } catch (Exception $e) {
        $feedback = "er is iets fout gelopen bij het plaatsen van jouw reactie, probeer het later nog eens ";
        $error = $e->getMessage();
       $response['status'] = "error";
        $response['message'] = $feedback;


    }
    header('Content-type: application/json');
    // json_encode is om de array terug te sturen naar javascript {code = .., message = ..}
    echo json_encode($response);
}
