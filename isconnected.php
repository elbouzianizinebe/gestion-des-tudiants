<?php
if (!isset($_COOKIE["isADMIN"])) {
    header("Location: /login.php");
    exit;
}
?>