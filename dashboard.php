<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashborad</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="content">
    <div>
        Welcome <?php echo $_SESSION["name"]; ?>! Click to <a href="logout.php">Logout</a>.
    </div>

    <div></div>
</div>
</body>
</html>
