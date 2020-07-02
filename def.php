<?php
if (isset($_POST["submit"])) {
    include_once 'DBConnect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $database = new dbConnect();

    $db = $database->openConnection();
    $sql1 = "select name, email from tbl_registered_users where email='$email'";

    $user = $db->query($sql1);
    $result = $user->fetchAll();
    $_SESSION['emailname'] = $result[0]['email'];

    if (empty($result)) {
        $sql = "insert into tbl_registered_users (name,email, password) values('$name','$email','$password')";

        $db->exec($sql);

        $database->closeConnection();
        $response = array(
            "type" => "success",
            "message" => "You have registered successfully.<br/><a href='login.php'>Now Login</a>."
        );
    } else {
        $response = array(
            "type" => "error",
            "message" => "Email already in use."
        );
    }
}
?>
