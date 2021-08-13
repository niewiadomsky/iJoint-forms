<?php
require_once './php/validation.php';

function validation(){
    $validator = new Validation;

    $validator->name('first_name')->value($_POST['first_name'])->required();
    $validator->name('last_name')->value($_POST['last_name'])->required();
    $validator->name('email_address')->value($_POST['email_address'])->required();
    $validator->name('telephone')->value($_POST['telephone'])->required();

    $validator->name('billing_street_address')->value($_POST['billing_street_address'])->required();
    $validator->name('billing_city')->value($_POST['billing_city'])->required();
    $validator->name('billing_state')->value($_POST['billing_state'])->required();
    $validator->name('billing_postal_code')->value($_POST['billing_postal_code'])->required();

    $validator->name('delivery_street_address')->value($_POST['delivery_street_address'])->required();
    $validator->name('delivery_city')->value($_POST['delivery_city'])->required();
    $validator->name('delivery_state')->value($_POST['delivery_state'])->required();
    $validator->name('delivery_postal_code')->value($_POST['delivery_postal_code'])->required();

    return $validator->getErrors() ?? [];
}

function sendEmail(){
    $errors = validation();

    if(sizeof($errors) > 0)
        return ['success' => false, 'errors' => $errors];

    $name = $_POST['first_name'] . ' ' . $_POST['last_name'];
    $email = $_POST['email_address'];
    $products = json_decode($_POST['products'], true);
    $cart = '';

    foreach($products as $product){
        if(!empty($product['grammarges'])){
            foreach($product['grammarges'] as $grammarge){
                $cart .= $product['name'] . ' ' . $grammarge['grammarge'] . $grammarge['unit'] . ' Count: ' . $grammarge['count'] . ' Price: € ' . $grammarge['price']. ' Subtotal price: € '. $grammarge['count'] * $grammarge['price'] . "\n";
            }
        } else {
            $cart .= $product['name'] . ' ' . $product['count'] . ' Count: ' . $product['count'] . ' Price: € ' . $product['price'] . ' Subtotal price: € ' . $product['count'] * $product['price'] . "\n";
        }
    }

    $cart .= "\nSin IVA: € " . $_POST['total_price']. "\nIVA: € " . $_POST['total_price'] * 0.21 . "\nTotal price: € " . $_POST['total_price'] * 1.21;
    $delivery_address = $_POST['delivery_street_address'] . ' ' . $_POST['delivery_state'] . ' ' . $_POST['delivery_city'] . ' ' . $_POST['delivery_postal_code'];
    $billing_address = $_POST['billing_street_address'] . ' ' . $_POST['billing_state'] . ' ' . $_POST['billing_city'] . ' ' . $_POST['billing_postal_code'];

    $comment = $_POST['comment'];
    $message = $name . " \n" . $email . "\nTel: " . $_POST['telephone'] . "\n\nDelivery address: \n" . $delivery_address. "\n\nBilling address: \n" . $billing_address . "\n\nOrder: \n" . $cart . " \nComments: \n" . $comment . "\n\n";
    $recipient = "marketing@ijointcbd.com";
    $subject = "Order " . $name;
    $mailheader = "From: $email \r\n";
    return ['success' => mail($recipient, $subject, $message, $mailheader)];
}

if(!empty($_POST)) {
    $result = sendEmail();
    echo json_encode($result);
} else {
    echo json_encode(false);
}

