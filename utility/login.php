<?php
    
//PDO connection

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "local";

try{
    $db = new PDO("mysql:=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    print "Errore!: ". $e->getMessage() . "<br>";
    die();
}

/*--------------------------------
LOGIN
---------------------------------*/

$email = $_POST['email'];
$password = $_POST['password'];

//Query

$q = $db->prepare("SELECT * FORM utenti WHERE email = '$email'");
$q->execute();
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->rowCount();

if($row > 0)
{
    while($row=$q->fetch())
    {
        if($row['password'] === $password)
        {
            session_start();
            $_SESSION['id'] = $row['id'];

            header("location: ../welcome.php");
        }
        else
        {
            header("location: ../error.php");
        }
    }
}
else
{
    echo "Utente non presente in archivio!";
}

?>