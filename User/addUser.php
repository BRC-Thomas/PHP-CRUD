<?php
    if(isset($_POST['send'])){
        if(isset($_POST['username']) && 
        isset($_POST['email']) &&
        $_POST['username'] != "" && 
        $_POST['email'] != ""
        ){
            include_once '../connect_ddb.php';
            extract($_POST);

            $sql = "INSERT INTO users (username,email) VALUES ('$username','$email')"; // modif a faire pour sécuriser
            if(mysqli_query($cnx,$sql)) {
                header('location:showUser.php');
            } else {
                header('location:addUser.php?message=AddFail');
            }
        } else{
            header('location:addUser.php?message=EmptyFields');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Ajouter un utilisateur</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="email">
        <input type="submit" name="send" value="Ajouter">
        <a class="link back" href="showUser.php">Annuler</a>
    </form>
</body>
</html>