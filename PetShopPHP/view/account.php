<div class="account_wrapper" align="center">
    <table class="account_table">
        <tr>
            <td>
                <?php
                    if (empty($_SESSION['account']['logged']))
                    {
                        echo '<a href="?content=login">Είσοδος / Εγγραφή</a>';
                    }
                    else
                        echo '<a href="?action=logout">Έξοδος</a>';
                ?>
            </td>
        </tr>
        <?php
            if (!empty($_SESSION['account']['logged']))
            {
                if ($_SESSION['account']['role'] == 'admin')
                    include './view/admin.php';
            }
                
        ?>
        
    </table>
</div>
