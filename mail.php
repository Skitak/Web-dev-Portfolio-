<?php
// the message

if (!isset($_POST["nom"]))
    return json_encode(["status" => "error", "message" => "Vous devez écrire un nom."]);

if (!isset($_POST["email"]))
    return json_encode(["status" => "error", "message" => "Vous devez écrire une adresse email valide."]);

if (!isset($_POST["objet"]))
    return json_encode(["status" => "error", "message" => "Vous devez ajouter un objet à votre message."]);

if (!isset($_POST["message"]))
    return json_encode(["status" => "error", "message" => "Vous devez écrire un message."]);
$msg = $_POST["nom"];

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($_POST["email"],$_POST["objet"],$msg);

return json_encode(["status" => "success", "message" => 
"Votre message a bien été envoyé. Si vous n'avez pas reçu de copie du mail envoyé, il est possible qu'une erreur ait eu lieu.
Dans ce cas "])
?>