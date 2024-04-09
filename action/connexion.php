<?php
include './../pass.php';

// L'utilisateur est déjà connecté
if (isset($_COOKIE['password']) && $_COOKIE['password'] == $password_global) {
    header('Location: ../admin.php');
    setcookie('password', '', time() - 3600, '/', null, false, true);
    header('Location: ../admin.php');
    exit();
}

if (isset($_POST['password']) && $_POST['password'] == $password_global) {
    setcookie('password', $password_global, time() + 365 * 24 * 3600, '/', null, false, true);
    header('Location: ../admin.php');
} else {
    setcookie('password', '', time() - 3600, '/', null, false, true);
    header('Location: ../admin.php?error=wrongauth');
}


?>