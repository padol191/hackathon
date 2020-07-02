<?php
session_start();
if (isset($_POST["submit"])) {
    include_once 'DBConnect.php';
    
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $database = new dbConnect();
    
    $db = $database->openConnection();
    
    $sql = "select * from tbl_registered_users where email = '$email' and password= '$password'";
    $user = $db->query($sql);
    $result = $user->fetchAll(PDO::FETCH_ASSOC);
    
    $id = $result[0]['id'];
    $name = $result[0]['name'];
    $email = $result[0]['email'];
    $_SESSION['name'] = $name;
    $_SESSION['id'] = $id;
    
    $database->closeConnection();
    header('location: dashboard.php');
}
?>