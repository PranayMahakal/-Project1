<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $cakeType = $_POST["cakeType"];
    $cakeSize = $_POST["cakeSize"];
    $cakeFlavor = $_POST["cakeFlavor"];
    $instructions = $_POST["instructions"];

    // Additional processing can be done here, such as storing the order in a database

    // Send a confirmation email to the customer
    $customerSubject = "Cake Order Confirmation";
    $customerMessage = "Dear $name,\n\nThank you for placing an order with Cake Studio!\n\n";
    $customerMessage .= "Order Details:\n";
    $customerMessage .= "Cake Type: $cakeType\n";
    $customerMessage .= "Cake Size: $cakeSize\n";
    $customerMessage .= "Cake Flavor: $cakeFlavor\n";
    $customerMessage .= "Special Instructions:\n$instructions\n\n";
    $customerMessage .= "We will contact you shortly to confirm your order and arrange for payment.\n\n";
    $customerMessage .= "Best regards,\nThe Cake Studio Team";

    // Send the confirmation email to the customer
    $customerHeaders = "From:pranaymahakal4421@gmail.com";
    mail($email, $customerSubject, $customerMessage, $customerHeaders);

    // Send the order details to the owner of Cake Studio
    $ownerEmail = "adimandepatil@gmail.com"; // Replace with the owner's email address
    $ownerSubject = "New Cake Order from $name";
    $ownerMessage = "You have received a new cake order:\n\n";
    $ownerMessage .= "Customer Name: $name\n";
    $ownerMessage .= "Customer Email: $email\n";
    $ownerMessage .= "Customer Phone: $phone\n";
    $ownerMessage .= "Cake Type: $cakeType\n";
    $ownerMessage .= "Cake Size: $cakeSize\n";
    $ownerMessage .= "Cake Flavor: $cakeFlavor\n";
    $ownerMessage .= "Special Instructions:\n$instructions";

    // Send the order details email to the owner
    $ownerHeaders = "From: pranaymahakal4421@gmail.com";
    mail($ownerEmail, $ownerSubject, $ownerMessage, $ownerHeaders);

    // Redirect to a thank you page or display a confirmation message
    header("Location: thank_you.html");
    exit;
}
?>