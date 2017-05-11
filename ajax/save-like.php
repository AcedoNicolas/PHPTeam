<?php
header('Content-Type: application/json');

include_once("../classes/Comment.class.php");
$like = new Comment();

//controleer of er een update wordt verzonden

if (isset($_POST['like'])) {
    $klik = true;

    try {
        $like->likeDoorgeven($klik);
        $feedback = [
            "code" => 200,
            "message" => htmlspecialchars($_POST['like'])

        ];
    } catch (Exception $e) {
        $error = $e->getMessage();
        $feedback = [
            "code" => 500,
            "message" => $error

        ];
    }
    // json_encode is om de array terug te sturen naar javascript {code = .., message = ..}
    echo json_encode($feedback);
}











/*if(!empty($_POST['']))
{
    $activity->Text = $_POST['activitymessage'];
    try
    {
        $activity->SavePost();
        $feedback = [
            "code" => 200,
            "message" => htmlspecialchars($_POST['activitymessage'])

        ];
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
        $feedback = [
            "code" => 500,
            "message" => $error

        ];
    }

    // json_encode is om de array terug te sturen naar javascript {code = .., message = ..}
    echo json_encode($feedback);
}*/
