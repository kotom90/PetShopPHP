<?php
    include_once 'sql.php';
    //Χρήση ερωτημάτων της βάσης και παραγωγή αποτελεσμάτων.
    
    
    //############### --login/register-- ################
    function doLogin()
    {
        $result = mysqli_query($GLOBALS['conn'], sql_site_login());
        $foundRes = mysqli_num_rows($result);
        $account = mysqli_fetch_assoc($result);
        if ($foundRes)
        {
            $_SESSION['account']['logged'] = 1;
            $_SESSION['account']['userId'] = $account['id'];
            $_SESSION['account']['role'] = $account['role'];
        }
        else
        {
            $_SESSION['account']['logged'] = 0;
        }
                    
    }
    
    function doRegister()
    {
        $result = mysqli_query($GLOBALS['conn'], sql_site_register());
        return mysqli_num_rows($result);
    }
    
    //############### --categories-- ################
    function get_categories()
    {
        $result = mysqli_query($GLOBALS['conn'], sql_get_categories());
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    
    function get_category_of_catId($catId)
    {

        $result = mysqli_query($GLOBALS['conn'], sql_get_category_of_catId($catId));
        $obj = mysqli_fetch_object($result);
        return $obj;
    }
    
    
    
    
    //############### --products-- ################
    
    function get_products_from_list($productsArr)
    {
        $result = mysqli_query($GLOBALS['conn'], sql_get_products_from_list($productsArr));
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    
    function get_products_of_catId($catId)
    {
        $result = mysqli_query($GLOBALS['conn'], sql_get_products_of_catId($catId));
        return $result;
    }
    
    function get_product($prodId)
    {
        $result = mysqli_query($GLOBALS['conn'], sql_get_product($prodId));
        return mysqli_fetch_assoc($result);
    }
    
    function get_sum_price_of_products($productsArr)
    {
        
        //echo $productsIdStr;
        $result = mysqli_query($GLOBALS['conn'], sql_get_price_of_products($productsArr));
        $sum = 0;
        while ($row = mysqli_fetch_array($result))
        {
            $sum += $row['price'] * $productsArr[$row['id']]['qty'];
        }
        return $sum;
    }
    
    function get_top5_products_interval($startDate, $endDate)
    {
        $result = mysqli_query($GLOBALS['conn'], sql_get_top5_products_interval($startDate, $endDate));
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    
    
    //############### --orders-- ################
    function get_all_user_orders_interval($startDate, $endDate)
    {
        $result = mysqli_query($GLOBALS['conn'], sql_get_all_user_orders_interval($startDate, $endDate));
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    
    function get_max_order_id()
    {
        $result = mysqli_query($GLOBALS['conn'], sql_get_max_order_id());
        return mysqli_fetch_row($result)[0];
    }
    
    function registerOrder($productsArr)
    {
        $orderId_new= get_max_order_id() + 1;
        foreach($productsArr as $prodId => $prod)
        {
            $order = array($orderId_new ,$_SESSION['account']['userId'] ,$prodId ,$prod['qty'] , "'".getDateTimeNow()."'", get_product($prodId)['price'] * $prod['qty'], "'Κατατέθηκε'");
            //echo sql_register_order($order);
            $result = mysqli_query($GLOBALS['conn'], sql_register_order($order));
        }
    }
    
    
    //############### --time-- ################
    function getDateTimeNow()
    {
        $result = mysqli_query($GLOBALS['conn'],sql_get_datetime_now());
        return mysqli_fetch_row($result)[0];
    }
?>

