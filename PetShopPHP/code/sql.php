<?php

//Δημιουργία ερωτημάτων.
    
    function sql_site_login()
    {
        if (!empty($_POST))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "SELECT * FROM user WHERE email ='$email' AND password = '$password'";
            return $query;
        }
    }
    
    function sql_site_register()
    {
        if (!empty($_POST))
        {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = null_parse($_POST['address']);
            $birthday = null_parse($_POST['birthday']);

            $query = "INSERT INTO user (name, surname, mobile, email, password, address, birthday) "
                    . "VALUES ('$name','$surname','$mobile','$email','$password',$address,$birthday)";
            return $query;
        }
    }
    
    //############### --categories-- ################
    
    function sql_get_categories()
    {
        $query = "SELECT * FROM category";
        return $query;
    }
    
    function sql_get_category_of_catId($catId)
    {

        $query = "SELECT * FROM category WHERE id=$catId";
        return $query;
    }
    
    //############### --products-- ################
    
    function sql_get_products_from_list($productsArr)
    {
        $productsIdStr = implode(',', array_keys($productsArr));
        $query = "SELECT * FROM product WHERE id IN ($productsIdStr)";
        return $query;
    }
    
    function sql_get_products_of_catId($catId)
    {

        $query = "SELECT * FROM product WHERE categoryId=$catId";
        return $query;
    }
    
    function sql_get_price_of_products($productsArr)
    {
        $productsIdStr = implode(',', array_keys($productsArr));
        $query = "SELECT id,price FROM product WHERE id IN ($productsIdStr)";
        return $query;
    }
    
    function sql_get_product($prodId)
    {
        $query = "SELECT * FROM product WHERE id = $prodId";
        return $query;
    }
    
    function sql_get_top5_products_interval($startDate, $endDate)
    {
        $query = "SELECT prod_id, product.name, SUM(qty) as qty FROM product, ordert
                    WHERE prod_id = product.id AND ordert.date >= '$startDate' AND ordert.date <= '$endDate' 
                    Group By prod_id
                    ORDER BY qty DESC
                    LIMIT 5";
        return $query;
    }
    
    
    
    
    //############### --orders-- ################
    function sql_get_max_order_id()
    {
        $query = "SELECT MAX(order_id) FROM ordert";
        return $query;
    }
    
    function sql_register_order($order)
    {
        $orderStr = implode(',', array_values($order));
        $query = "INSERT INTO ordert (order_id, user_id, prod_id, qty, date, total_cost, status) "
                . "VALUES ($orderStr)";
        return $query;
    }
    
    function sql_get_all_user_orders_interval($startDate, $endDate)
    {
        return $query = "SELECT order_id, name, surname, SUM(total_cost) as total FROM user,ordert
                         Where user.id = user_id AND ordert.date >= '$startDate' AND ordert.date <= '$endDate'
                         Group By order_id";
    }
    
    
    //############### --time-- ################
    function sql_get_datetime_now()
    {
        return "SELECT NOW()";
    }
    
    function null_parse($param)
    {
        return empty($param) ? 'NULL' : "'".$param."'"; //Αν είναι κενό να επιστρέψει NULL αλλιώς να το βάλει σε μονά εισαγωγικά.
    }
?>

