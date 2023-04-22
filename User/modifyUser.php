<?php
    $user_id = $_GET['id'];
    if(isset($_POST['send'])){
        if(isset($_POST['username']) && 
        isset($_POST['email']) &&
        $_POST['username'] != "" && 
        $_POST['email'] != ""
        ){
            include_once '../connect_ddb.php';
            extract($_POST);
            $sql = "UPDATE users SET username = '$username', email = '$email' WHERE user_id = $user_id" ;

            if(mysqli_query($cnx,$sql)) {
                header('location:showUser.php');
            } else {
                header('location:addUser.php?message=UpdateFail');
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
    <?php 
        include_once '../connect_ddb.php';

        //liste des infos utilisateur
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = mysqli_query($cnx,$sql);
        // informations de l'utilisateur
        while($row = mysqli_fetch_assoc($result)){
    ?>
    <form action="" method="POST">
        <h1>Modifier un utilisateur</h1>
        <input type="text" name="username" placeholder="Username" value="<?=$row['username']?>"> 
        <input type="email" name="email" placeholder="email" value="<?=$row['email']?>">
        <input type="submit" name="send" value="Modifier">
        <a class="link back" href="showUser.php">Annuler</a>
    </form>
    <?php
    }
    ?>
</body>
</html>