<?php

if(isset($_POST['address'])) {
    $address = $_POST['address'];
    
    // Check if the address contains "Balaju"
    if (strpos($address, 'Balaju') !== false) {
        header("Location: https://buy.stripe.com/test_00g7tgeideKc9xecMN");
        exit();
    }
    
    // Check if the address contains "Thamel"
    if (strpos($address, 'Thamel') !== false) {
        header("Location: https://buy.stripe.com/test_eVafZM0rn9pS38Q8wy");
        exit();
    }
}

exit();

?>
