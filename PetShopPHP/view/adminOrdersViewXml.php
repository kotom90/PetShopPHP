<?php 
    //ημερομηνίες που έχει επιλέξει ο διαχειριστής
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    
    //φέρνει όλες τις παραγγελίες μεταξύ των ημερομηνιών που δόθηκαν.
    $orders = get_all_user_orders_interval($startDate, $endDate);

    // Creates an instance of the DOMImplementation class
    $imp = new DOMImplementation;

    // Creates a DOMDocumentType instance
    $dtd = $imp->createDocumentType('petShop', '', 'xml_orders_top5.dtd');

    // Creates a DOMDocument instance
    $doc = $imp->createDocument("", "", $dtd);

    // Set other properties
    $doc->encoding = 'UTF-8';
    $doc->standalone = false;

    //$doc = new DOMDocument('1.0', 'UTF-8');
    $doc->formatOutput = true;

    //Δημιουργία ριζικού στοιχείου petShop και ενσωμάτωση στο αρχείο.
    $petShopElement = $doc->createElement("petShop");
    $doc->appendChild($petShopElement);

    //Δημιουργία στοιχείου orders και ενσωμάτωση στο αρχείο ως παιδί του ριζικού στοιχείου petShop
    $ordersElement = $doc->createElement("orders");
    $petShopElement->appendChild($ordersElement);


    //για κάθε παραγγελία
    foreach ($orders as $order)
    {
        //Δημιουργία στοιχείου order και ενσωμάτωση στο αρχείο ως παιδί του στοιχείου orders.
        $orderElement = $doc->createElement("order");
        $ordersElement->appendChild($orderElement);
        //Θέτει την ιδιότητα id στην παραγγελία.
        $orderElement->setAttribute("id", $order['order_id']);

        //Δημιουργία στοιχείου clientName και ενσωμάτωση στο αρχείο ως παιδί του order που μόλις δημιουργήθηκε.
        $clientNameElement = $doc->CreateElement('clientName');
        $clientNameElement->nodeValue = $order['name'].' '.$order['surname'];
        $orderElement->appendChild($clientNameElement);

        //Δημιουργία στοιχείου total και ενσωμάτωση στο αρχείο ως παιδί του order που μόλις δημιουργήθηκε.
        $totalElement = $doc->CreateElement('total');
        $totalElement->nodeValue = $order['total'];
        $orderElement->appendChild($totalElement);
    }
    
    //φέρνει τα 5 δημοφιλέστερα προϊόντα.
    $top5Products = get_top5_products_interval($startDate, $endDate);

    //Δημιουργία στοιχείου top5Products και ενσωμάτωση στο αρχείο ως παιδί του ριζικού στοιχείου petShop
    $top5ProductsElement = $doc->createElement('top5Products');
    $petShopElement->appendChild($top5ProductsElement);
    
    //για κάθε προϊόν
    foreach ($top5Products as $prod)
    {
        //Δημιουργία στοιχείου product και ενσωμάτωση στο αρχείο ως παιδί του στοιχείου top5Products.
        $productElement = $doc->createElement('product');
        $productElement->setAttribute('id', $prod['prod_id']);
        //Θέτει την ιδιότητα id στο προϊόν.
        $top5ProductsElement->appendChild($productElement);

        //Δημιουργία στοιχείου name και ενσωμάτωση στο αρχείο ως παιδί του στοιχείου product που μόλις δημιουργήθηκε.
        $nameElement = $doc->createElement('name');
        $nameElement->nodeValue = $prod['name'];
        $productElement->appendChild($nameElement);

        //Δημιουργία στοιχείου qty και ενσωμάτωση στο αρχείο ως παιδί του στοιχείου product που μόλις δημιουργήθηκε.
        $qtyElement = $doc->createElement('qty');
        $qtyElement->nodeValue = $prod['qty'];
        $productElement->appendChild($qtyElement);
    }
    
    //αποθηκεύει το αρχείο xml ως αρχείο στη μονάδα αποθήκευσης με όνομα xml_orders_top5.xml
    $doc->save("xml_orders_top5.xml");

    //δημιουργία ενός νέου αρχείου DOM.
    $xslDoc = new DOMDocument("1.0", "UTF-8");
    //φόρτωση του αρχείου μορφοποίησης xml_orders_top5.xsl
    $xslDoc->load("xml_orders_top5.xsl");

    //δημιουργία ενός νέου αρχείου DOM.
    $xmlDoc = new DOMDocument("1.0", "UTF-8");
    //φόρτωση του αρχείου xml που μόλις δημιουργήθηκε
    $xmlDoc->load("xml_orders_top5.xml");

    //γίνεται επαλήθευση του xml σύμφωνα με το DTD
    if ($xmlDoc->validate()) 
    {
        //αν το αρχείο είναι έγκυρο τότε δημιουργείται ένας επεξεργαστής xslt και εμφανίζεται το xml με βάση τη μορφοποίηση του xsl.
        $proc = new XSLTProcessor();
        $proc->importStylesheet($xslDoc);
        echo $proc->transformToXML($xmlDoc);
    } 

    else    //αλλιώς εμφανίζεται το ακόλουθο σφάλμα.
        echo 'Το αρχείο xml δεν είναι έγκυρο σύμφωνα με τις προδιαγραφές του DTD.';
?>
