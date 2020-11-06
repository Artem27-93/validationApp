
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
    <?php
        if(empty($_COOKIE['user'])):
    ?>


    <div class="container mt-5">
        <h1 class="title">Welcome</h1>
        <div id="firstPage">
            <button id="reg" >Registration</button>
            <button id="log">Login</button>
        </div>


        <div class="row">
            <div id="regForm" class="col">
                <h1>Registration form</h1></br>
                <form action="validationForm/check.php" method="POST">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Enter login" required></br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required></br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter your password" required></br>
                    <button class="btn btn-success" type="submit">Regisrted</button>
                </form>
            </div>

            <div id="loginForm" class="col">
                <h1>Authorizing</h1></br>
                <form action="validationForm/auth.php" method="POST">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Enter login" required></br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter your password" required></br>
                    <button class="btn btn-success" type="submit">Login</button>
                </form>
            </div>

        </div>
            <?php else: ?>
            <p>Привет <?=$_COOKIE['user']?>.Чтобы выйти, нажмите <a href="exit.php">здесь</a></p>

<!--   ----------------Home page----------------->
                <div id="tabs">
                    <div class="block1">
                        <div class="tab whiteborder">Home</div>
                        <div class="tab">Profile</div>
                        <div class="tab">Statistic</div>
                    </div>
                    <div class="block2">
                        <div class="tabContent">
                            <div id="content">
                            <div class="component">
                                <h3 class="category">ClientPH</h3>
                                <div class="component_ins">
                                    <p>Очередь - <span class="span"></span></p>
                                    <button class="btn">Start</button>
                                </div>
                            </div>
                            <div class="component">
                                <h3 class="category">DOC</h3>
                                <div class="component_ins">
                                    <p>Очередь - <span class="span"></span></p>
                                    <button class="btn">Start</button>
                                </div>
                            </div>
                            <div class="component">
                                <h3 class="category">Other</h3>
                                <div class="component_ins">
                                    <p>Очередь - <span class="span"></span></p>
                                    <button class="btn">Start</button>
                                </div>
                            </div>
                            </div>
                            <div id="profile">
                                <div class="img">
                                    <img id="image" src="/" alt="picture.jpeg">
                                </div>
                                <div class="questions">
                                    <ol>
                                        <li>
                                            <span class="question"></span></br>
                                            <input type="checkbox"  name="check" class="check_yes checks"><label for="check_yes">Yes</label>
                                            <input type="checkbox" name="check" class="check_no checks"><label for="check_no">No</label>
                                        </li>
                                        <li>
                                            <span class="question"></span></br>
                                            <input type="checkbox" class="check_yes checks"><label for="check_yes">Yes</label>
                                            <input type="checkbox" class="check_no checks"><label for="check_no">No</label>
                                        </li>
                                        <li>
                                            <span class="question"></span></br>
                                            <input type="checkbox" class="check_yes checks"><label for="check_yes">Yes</label>
                                            <input type="checkbox" class="check_no checks"><label for="check_no">No</label>
                                        </li>
                                    </ol>
                                </div>
                                <button disabled onclick="document.location='index.php'" type="submit" id ="btnNext" class="btn-success"  >Next</button>
                                <h2 class="title_category"></h2>

                            </div>
                        </div>
                        <div class="tabContent">About user info</div>
                        <div class="tabContent">Statistic info</div>
                    </div>
                </div>
        <?php endif;?>
   </div>
    <script src="main.js"></script>
</body>
</html>
