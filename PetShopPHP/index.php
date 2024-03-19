<?php
    session_start();
    include_once './code/db_connect.php';
    include_once './code/action_manager.php';
    include_once './code/controller.php';
    include_once './code/sql.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pet Shop</title>
        <link rel="stylesheet" href="css/style.css?<?=time()?>">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action="index.php?action=clrsession" method="post">
            <button type="submit">clear session</button>
        </form>
        <!--Βασικό πλαίσιο σελίδας (wrapper) -->
        <div class="wrapper">
            <!--Βασικό πλέγμα σελίδας (mainGrid χωρισμένο σε 3 μέρη) -->
            <div class="mainGrid">
                <?php
                /*
                 * Διαχείρηση εμφανιζόμενων τμημάτων, δυναμικών και στατικών, ώστε να μην επαναλαμβάνονται 
                 * τα στατικά τμήματα σε περισσότερο από 1 αρχεία.
                */
                    include './view/template/header.php';               //περιεχομένο κεφαλίδας
                    include './view/template/navigator.php';            //περιεχομένο πλοηγού.
                    include './view/template/ads.php';                  //περιεχομένο προωθητικών ενεργειών.
                    if (!isset($_GET['content']))                       //αν δεν έχει επιλεχθεί περιεχόμενο content=='null' τότε
                    {
                        include './view/main.php';                      //εμφανίζει το αρχικό
                    }
                    else
                    {
                        /*if (!empty($_SESSION['logged']))
                        {
                            include './view/main.php';                  //εμφανίζεται η αρχική σελίδα.
                        }
                        else*/
                            include './view/'.$_GET['content'].'.php';  //αλλιώς εμφανίζει αυτό που επιλέχθηκε από το σύνδεσμο
                    }
                    include './view/template/footer.php';               //εμφάνιση στατικού περιεχομένου υποσέλιδου.
                ?>
            </div>
        </div>
    </body>
</html>
