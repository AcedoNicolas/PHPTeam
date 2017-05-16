<?php

spl_autoload_register(function ($class) {
    include_once("../classes/" . $class . ".php");
});
session_start();


$like = new Comment();

$klik = 0;
//controleer of er een update wordt verzonden
if ((isset($_POST['like'])) || (isset($_POST['dislike']))) {
    try {
        if ((isset($_POST['like'])) && (!empty($_POST['like']))) {
            $klik = true;
        }
        if ((isset($_POST['dislike']))&& (!empty($_POST['like']))) {
            $klik = false;
        }
        $like->idUser = $_SESSION['user_id'];
        $like->idPost = $_SESSION['post_id'];


        $response['feedback']=$like->likeDoorgeven($klik);
        $response['likes']=$like->likesUitlezen();
        $response['dislikes']=$like->dislikesUitlezen();
        $response['status'] = 'succes';

    } catch (Exception $e) {
        $error = $e->getMessage();
        $response['status'] = 'error';
    }

    header('Content-Type: application/json');
    // json_encode is om de array terug te sturen naar javascript {code = .., message = ..}
    echo json_encode($response);
}
