<?php
// the message
// echo "hi";
if (!isset($_POST["nom"]))
    echo json_encode(["status" => "error", "message" => "Vous n'avez pas écrit un nom."]);
else if (!isset($_POST["email"]))
    echo json_encode(["status" => "error", "message" => "Vous n'avez pas mis votre adresse email."]);

else if (!isset($_POST["objet"]))
    echo json_encode(["status" => "error", "message" => "Vous n'avez pas mis d'objet à votre message."]);

else if (!isset($_POST["message"]))
    echo json_encode(["status" => "error", "message" => "Vous n'avez pas écrit de message."]);

else {
    $to = "bastienbouquin@gmail.com, " . $_POST["email"];
    $msg = "Message de : " . $_POST["nom"] . "\r\n" . "\r\n" . $_POST["message"];

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    $headers = "From: " . $_POST["nom"] . " <" . $_POST["email"] . ">";
    
    // send email
    mail($_POST["email"],$_POST["objet"],$msg);
    mail("bastienbouquin@gmail.com",$_POST["objet"],$msg);
    
    echo json_encode(["status" => "success", "message" => 
    "Votre message a bien été envoyé.
    Vous devrez aussi recevoir une copie du message."]);

}    
?>