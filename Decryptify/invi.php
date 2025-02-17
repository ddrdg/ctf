<?php

function calculate_seed_value($email, $constant_value) {
    // Get the length of the email
    $email_length = strlen($email);
    // Get the first 8 characters of the email and convert it to hexadecimal
    $email_hex = hexdec(substr($email, 0, 8)); 
    // Calculate the seed value
    $seed_value = hexdec($email_length + $constant_value + $email_hex);
    return $seed_value;
}

function generate_invite_code($email, $constant_value) {
    // Calculate the seed value
    $seed_value = calculate_seed_value($email, $constant_value);
    // Generate the random value based on the seed
    mt_srand($seed_value);
    $random = mt_rand();
    // Return the Base64-encoded invite code
    return base64_encode($random);
}

// Example email and constant value
$email = "hello@fake.thm";
$constant_value = 99999; // This is based on your scenario

// Generate the invite code
$invite_code = generate_invite_code($email, $constant_value);
echo "Invite Code: " . $invite_code;

?>
