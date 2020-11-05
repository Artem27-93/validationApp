<?php
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);


    if(mb_strlen($login) < 5 || mb_strlen($login) > 15){
        echo "Недопустимая длина логина";
        exit();
    } else if(mb_strlen($name) < 1 || mb_strlen($name) > 10){
        echo "Недопустимая длина имени";
        exit();
    } else if(mb_strlen($pass) < 4 || mb_strlen($pass) > 15) {
        echo "Недопустимая длина пароля(от 4 до 15 символов)";
        exit();
    }
    $pass = md5($pass."gmbh"); // хеш пароля

    $dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=root")
        or die('Не удалось соединиться: ' . pg_last_error());
    $query = "INSERT INTO \"public\".\"Users\"(\"login\",\"name\",\"password\") VALUES ('$login','$name','$pass')";
    $result = pg_query($dbconn,$query) or die('Ошибка запроса: ' . pg_last_error());
    pg_close($dbconn);

    header('Location: /app');
?>