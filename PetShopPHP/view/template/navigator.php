<!--Αντικείμενο πλέγματος: πλοηγός -->
<div class="grid-item menu-grid-item">
    <ul>
        <?php 
            $categories = get_categories();
            echo "<li><a ";
            if (empty($_GET['content']))
                echo "class='activeTab'";
            echo "href='index.php'>Αρχική</a></li>";

            foreach ($categories as $category)
            {
                //print_r($category);
                echo "<li><a ";
                if (isset($_GET['catId']))
                {
                    if ($_GET['catId'] === $category['id'])    //Έλεγχος επιλεγμένου tab.
                    {
                        echo "class='activeTab' ";
                    }
                }
                $catId = $category['id'];
                $catname = $category['name'];
                echo "href='index.php?content=category&catId=$catId'>$catname</a></li>";   //Κατασκευή link για την κάθε κατηγορία.
            }
        ?>
    </ul>
</div>
