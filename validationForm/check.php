<?php
error_reporting(E_ALL);

    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

    if(strlen($login) < 5 || strlen($login) > 15){
        echo "Недопустимая длина логина";

       die();
    } else if(strlen($name) < 1 || strlen($name) > 10){
        echo "Недопустимая длина имени";
         die();
    } else if(strlen($pass) < 4 || strlen($pass) > 15) {
        echo "Недопустимая длина пароля(от 4 до 15 символов)";
        die();
    }
    $pass = md5($pass."gmbh"); // хеш пароля

    $dbconn = pg_connect("host=ec2-54-76-215-139.eu-west-1.compute.amazonaws.com dbname=dcbpsp0k5sldbg user=rnqvwmovcyqzod password=46cef4c9e7ac99a7752b9dfad18047e3c49cc77e4edaf279748d5456ca09b4a7")
        or die('Не удалось соединиться: ' . pg_last_error());
    $query = "INSERT INTO public.Users(\"login\",\"name\",\"password\") VALUES ('$login','$name','$pass')";
    $result = pg_query($dbconn,$query) or die('Ошибка запроса: ' . pg_last_error());

    header('Location: /index.php');
    pg_close($dbconn);
?>
