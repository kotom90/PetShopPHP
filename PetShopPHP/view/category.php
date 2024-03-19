<div class="grid-item body-grid-item">
    <h3 style="float:left;">Κατηγορίες</h3>
    <h3 style="margin-left:250px;">
        <?php 
            $category = get_category_of_catId($_GET['catId']);
            echo $category->name;
        ?>
    </h3>
    <div class="grid-container">
        <div class="grid-category">  
            <table class="categorytable">
                <tr><td><a href="">Τροφή</a></td></tr>
                <tr><td><a href="">Συμπληρώματα διατροφής</a></td></tr>
                <tr><td><a href="">Αξεσουάρ φαγητού</a></td></tr>
                <tr><td><a href="">Φάρμακα</a></td></tr>
                <tr><td><a href="">Περιλαίμια</a></td></tr>
                <tr><td><a href="">Καθαριότητα</a></td></tr>
                <tr><td><a href="">Σπιτάκια</a></td></tr>
                <tr><td><a href="">Κρεβάτια</a></td></tr>
                <tr><td><a href="">Παιχνίδια</a></td></tr>
                <tr><td><a href="">Ρούχα</a></td></tr>      
            </table>
        </div> 

        <?php
            $catId = $_GET['catId'];
            $products = get_products_of_catId($catId);
            while($product = mysqli_fetch_object($products))
            {
                echo "
                <form action='index.php?content=category&catId=$catId&action=addToCart&prodId=$product->id' method='post'>
                    <div class='grid-product'> 
                        <table>
                            <tr>
                                <th colspan='2'><a href='#'>$product->name</a></th>
                            </tr>                     
                            <td>
                                <a href='#'><img class='prodimg' align='center' src='$product->image' ></a>
                            </td>
                            <td>
                                $product->description
                            </td>
                        </table>
                        <table width='100%'>
                            <td>
                                €$product->price
                            </td>
                            <td>
                                <input type='number' name='qty' value='1'/>
                            </td>
                            <td align='center'>
                                <button class='button' type='submit'>Προσθήκη στο καλάθι</button>
                            </td>
                        </table>
                    </div>
                </form>
                ";
            }
        ?>     
    </div>
</div>