<?php

session_start(); 


class Request
{
    public static function get($key, $default = null) {
        return isset($_GET[$key]) ? htmlspecialchars($_GET[$key]) : $default;
    }

    public static function post($key, $default = null) {
        return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : $default;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['name'] = Request::post('name');
    $_SESSION['age'] = Request::post('age');
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    $_SESSION['name'] = Request::get('name');
    $_SESSION['age'] = Request::get('age');
}

if (isset($_SESSION['name']) && isset($_SESSION['age'])) {
    setcookie('userName', $_SESSION['name'], time() + 3600); 
    echo "Привіт, " . $_SESSION['name'] . "! Вам " . $_SESSION['age'] . " років.<br>";
    echo "Ім'я, збережене у cookie: " . ($_COOKIE['userName'] ?? 'Не встановлено') . "<br>";
}
