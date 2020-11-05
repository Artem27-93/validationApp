<?php
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

    $pass = md5($pass."gmbh");

    $dbconn = pg_connect("host=ec2-54-76-215-139.eu-west-1.compute.amazonaws.com dbname=dcbpsp0k5sldbg user=rnqvwmovcyqzod password=46cef4c9e7ac99a7752b9dfad18047e3c49cc77e4edaf279748d5456ca09b4a7")
    or die('Не удалось соединиться: ' . pg_last_error());
    $query = "SELECT * FROM \"public\".\"Users\" WHERE \"login\" = '$login' AND \"password\" = '$pass'";
    $result = pg_query($dbconn,$query);
    $user = pg_fetch_assoc($result);

    if(!$user){
        echo "Такой пароль не найден.<a href='/app'>попробуйте снова!</a>";

        exit();
    }

    setcookie('user', $user['name'], time() + 60,"/");
    header('Location: /app/index.php');
    pg_close($dbconn);
?>