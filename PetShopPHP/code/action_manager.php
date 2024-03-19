<?php
    include_once 'controller.php';
    if (!empty($_GET['action']))
    {
        switch($_GET['action'])
        {
            case "login":
                doLogin();
                break;
            case "logout":
                unset($_SESSION['account']);
                break;
            case "register":
                doRegister();
                break;
            case "addToCart":
                if (!isset($_SESSION['cart'][$_GET['prodId']]))
                    $_SESSION['cart'][$_GET['prodId']]['qty'] = 0;
                $_SESSION['cart'][$_GET['prodId']]['qty'] += $_POST['qty'];
                //print_r($_SESSION['cart']);
                echo get_sum_price_of_products($_SESSION['cart']);
                break;
            case "clrsession":
                echo 'session clear!';
                session_unset();
                break;
            case "createOrder":
                if (isset($_SESSION['account']['logged']))
                {
                    if ($_SESSION['account']['logged'] == 1)
                        registerOrder($_SESSION['cart']);
                }
            case NULL:
                break;
        }
    }
?>

