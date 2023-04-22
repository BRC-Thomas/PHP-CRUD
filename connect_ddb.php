<?php 
$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'crud';

// //Créer la connexion
$cnx = mysqli_connect($host,$username,$password,$dbname);

// //Check connection
if(!$cnx){
    die('Connection failed : ' . mysqli_connect_error());
}


/*******************************/

// try {
// //     // chaine de connexion à la base de données
// //     $dsn = 'mysql:host=127.0.0.1;dbname=crud';

// //     // option de connexion : encodage UTF8 pour MySQL
// //     $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

// //     // création d'une instance de connexion à la base de données et ouverture de la connexion
//     $cnx = new PDO('mysql:host=127.0.0.1;dbname=crud', $username, $password);

// //     // choix de la méthode d'information en cas d'erreur : levée d'exception
//     $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//     // echo 'connexion effectuée';
// } catch (PDOException $e) {
//     $msg = 'ERREUR PDO dans ' . $e->getFile() . ' : ' . $e->getLine() . ' : ' . $e->getMessage();
//     die($msg);
// }

?>