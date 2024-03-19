<form action="index.php?content=account&action=login" method="post">
    <table width="450px" >
        <tr>
            <td width="150px">E-mail:</td>
            <td><input style="padding: 10px;" type="text" placeholder="e-mail" size="30" name="email"></td>
        </tr>
        <tr>
            <td>Κωδικός πρόσβασης:</td>
            <td><input style="padding: 10px;" type="password" placeholder="Κωδικός πρόσβασης" size="30" name="password"></td>
        </tr>
    </table>
    <input style="padding: 10px;" type="submit" value="Είσοδος">
    <a href="index.php?content=register"><input style="padding: 10px;" type="button" value="Εγγραφή"></a>
    <?php
        if (isset($_SESSION['account']['logged']))
        {  
            if ($_SESSION['account']['logged'] == 0)
            {
                echo '<br><span style="color:red;">Τα στοιχεία που καταχωρίσατε δεν είναι σωστά.</span>';
                unset($_SESSION['account']['logged']);
            }
            else
            {
                $_GET['content']=NULL;
            }
        }
        
    ?>
</form>