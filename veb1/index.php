<?php
include_once 'config.php';
// login - admin    password - 123456
if (isset($_POST['enter'])) {       //Пользователь нажимает "Войти"
    $user = $_POST['user'];
    $password = $_POST['password'];
    $query = "SELECT id from users where name='".$user."' and password='".crypt($password, $salt)."'";
    $result = mysqli_query($connection, $query);
    $output = mysqli_fetch_row($result);
    if ($output) {
        session_start(['cookie_lifetime' => 24000]);
        $_SESSION['user'] = $user;
        setcookie('user', $user);
        header("Refresh:0");
    }
    else {
        echo 'Неверное имя пользователя или пароль';
    }    
}

if (isset($_POST['exit'])) {      //Пользователь нажимает "Выйти"
    session_unset();
    unset($_COOKIE['user']);
    setcookie('user', '', time()-3600);
}
?>
<!DOCTYPE>
<html>
    <head>
        <title>session and cookie</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <?php
        if (isset($_COOKIE['user'])) {
            echo "Добро пожаловать ".$_COOKIE['user']."
            <form method='post'>
            <input type='submit' name='exit' value='Выйти'>
        </form>";
        }
        else {
                echo "<form method='post'>
                <input type='text' name='user' required placeholder='Login'>
                <input type='password' name='password' required placeholder='password'>
                <input type='submit' name='enter' value='Войти'>
            </form>";
        }
        ?>  
    </body>
</html>