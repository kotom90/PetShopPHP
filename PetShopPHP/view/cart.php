<div class="grid-item body-grid-item">
    <div class="grid-container">

        <!--Δημιουργία πλαισίου για ένα προιόν-->
        <div class="grid-cart">  
            <table cellpadding="0" class="carttable">
                <tr>
                    <th colspan="2">Προιόν</th>
                    <th>Τιμή</th>
                    <th>Ποσότητα</th>
                    <th>Σύνολο</th>
                    <th>Διαγραφή</th>
                </tr>
                <?php
                $products = get_products_from_list($_SESSION['cart']);
                
                foreach($products as $product)
                {
                    $qty = $_SESSION['cart'][$product['id']]['qty'];
                    $total_product = $qty * $product['price'];
                ?>
                
                    <tr>
                        <td colspan='2'><?php echo $product['name']?></td>
                        <td><?php echo $product['price']?></td>
                        <td>
                            <form>  
                                <input type='number' name='qty' value='<?php echo $qty ?>' >
                            </form>
                        </td>
                        <td>€<?php echo $total_product?></td>
                        <td align='center' ><a href=''><img class='delimg' src='images/delete.png'></a></td>
                    </tr>
                <?php    
                }
                ?>
                
            </table>
            <h3 align="right">Κόστος παραγγελίας: €<?php echo get_sum_price_of_products($_SESSION['cart']); ?></h3>
        </div> 

        <!--Δημιουργία πλαισίου για ένα προιόν-->
        <div class="grid-shipping">  
            <form class="shippingform" action="index.php?content=cart&action=createOrder" method="post">
                <table class="shippingtable">
                    <?php 
                    if (!isset($_SESSION['account']['logged']))
                    {
                        echo '<span style="color:red; font-size:40px;">Παρακαλoύμε συνδεθείτε για να ολοκληρώσετε την παραγγελία.';      
                    }
                    ?>
                    <tr> 
                        <td>Ονομα</td>   
                        <td><input align="right" type="text" id="firstName" name="firstName" size="30" required></td> 
                        <td>Επώνυμο</td>  
                        <td><input align="right" type="text" id="lastName" name="lastName" size="30" required ></td> 
                    </tr>

                    <tr>
                        <td>Κινητό</td>
                        <td align="right"><input type="text" name="phone" size="15"></td> 
                        <td>Email</td> 
                        <td align="right"><input type="text" name="email" size="30"></td>                       
                    </tr>
                </table>
                <table class="shippingtable"> 
                    <tr>
                        <td align="right">Διεύθυνση
                            <input type="text" name="odos" placeholder="Οδός, Αριθμός" required size="15"> 
                            <input type="text" name="tk" placeholder="T.K" required size="5"> </td>                       
                        <td align="right"><input type="text" name="perioxi" placeholder="Πόλη/Περιοχή" required size="20">
                            <select id="nomos" name="nomos">
                                <option value="">Νομός</option>
                                <option value="Athens">Αθήνα</option>
                                <option value="Thessaloniki">Θεσσαλονικη</option>
                            </select>
                        </td>                   
                     </tr>
                </table>
                <table class="shippingtable">
                     <tr>
                        <td>Αποστολή</td>
                        <td>
                            <input type="radio" name="shipment" value="takeaway" checked>Παραλαβή από το κατάστημα<br> 
                            <input type="radio" name="shipment" value="courier">Παράδοση με δική μας μεταφορική ή courier<br>
                            <input type="radio" name="shipment" value="selfcourier">Παράδοση με μεταφορική ή courier της επιλογής σας<br>
                        </td>                              
                    </tr>

                    <tr>
                        <td>Πληρωμή</td>
                        <td>
                            <input type="radio" name="payment" value="card" checked>Πιστωτική, Χρεωστική ή Προπληρωμένη κάρτα Online<br>
                            <input type="radio" name="payment" value="katathesi">Τραπεζική κατάθεση<br> 
                        </td>                   
                    </tr>

                    <tr>
                        <td>Σχόλια</td>
                        <td>
                            <textarea rows="3" cols="65" name="info" placeholder="π.χ. Διαθεσιμότητα για ημερομηνία  και ώρα παράδοσης"></textarea>
                        </td> 
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="checkbox">Συμφωνώ με τους όρους χρήσης και την πολιτική απορρήτου<br>
                        </td>               
                    </tr>

                    <tr>
                        <td style="text-align:center" colspan="2">
                             <input type="submit" value="Υποβολή">
                             <input type="reset" value="Αρχικοποίηση">
                        </td>                   
                    </tr>              
                </table>
            </form>  
        </div>
    </div>
</div>

<div class="grid-item footer-grid-item">         
    <ul>
        <li><a href="#">Τρόποι Πληρωμής</a></li> |
        <li><a href="#">Τρόποι Αποστολής</a></li> |
        <li><a href="#">Όροι χρήσης</a></li> |
        <li><a href="#">Πολιτική απορρήτου</a></li> |
        <li><a href="#">Επικοινωνία</a></li>
    </ul>
</div>
