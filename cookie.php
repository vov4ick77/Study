<?php
function showForm() {
    echo '
    <form action="" method="POST">
    <label for="login">Login</label><br>
    <input type="text" name="login" /><br>
    <label for="passwd">Password</label><br>
    <input type="password" name="passwd" /><br><br>
    <input type="submit" name="log" value="Sign in" />
    </form>';
}
function check($login, $passwd) {
    if (($login == "admin") && ($passwd == "827ccb0eea8a706c4c34a16891f84e7b")) return true;
    else return false;
}
if (isset($_POST['log'])) {
    $login = $_POST['login'];
    $passwd = md5($_POST['passwd']);
    if (check($login, $passwd)) {
        $key = "eyJWD3CctcPzBRzLVEZnMnvtHa";
        setcookie("session", $key);
        header("Location: cookie.php");
    } else echo "Неверные данные";
}
?>
<html>
<head>
</head>
<body>
<?php
if (empty($_GET['id'])) {
    $key = $_COOKIE['session'];
    if ($key) echo "Здравствуй, админ!";
    else echo showForm();
}
$server = "localhost";
$user = "root";
$password = "pass";
$db = "news";
echo "<title>Новости со всего света</title>";
$link = new mysqli($server, $user, $password, $db);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM world_news WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Error: " . mysqli_error($link));
    if ($result) {
        echo "<ul>";
        while ($row = mysqli_fetch_row($result)) {
            echo "<li>" . $row[0] . ':' . $row[1] . "</li>";
        }
        echo "</ul>";
        mysqli_free_result($result);
    }
}
?>
</body>
</html>
