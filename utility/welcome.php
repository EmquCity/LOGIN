<?php
    session_start();
    $sessionid = $_SESSION['id'];

    if($sessionid == " ")
    {
        header('location: error.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Login avvenuto con sucesso</h1>
</body>
</html>