<?php
session_start();
if(isset($_SESSION['user'])){
    //setcookie("user", $_SESSION['user'],time() +340);
    echo $_SESSION['user'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="nom" id="NomPost">Nom</label>
        <input name="nom" type="text">
        <label for="prenom" id="PrenomPost">Prénom</label>
        <input name="prenom" type="text">
        <button type="submit" >Envoyer</button>
    </form>
</body>
</html>