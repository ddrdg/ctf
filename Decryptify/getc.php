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

// Target invite code that we're trying to match
$target_invite_code = "MTM0ODMzNzEyMg==";

// Example email
$email = "alpha@fake.thm";

// Loop through constant values from 0 upwards until the invite code matches
$constant_value = 0;
while (true) {
    // Generate the invite code for the current constant value
    $invite_code = generate_invite_code($email, $constant_value);
    
    // Check if the generated invite code matches the target
    if ($invite_code === $target_invite_code) {
        echo "Found matching constant value: $constant_value\n";
        echo "Invite Code for $email: $invite_code\n";
        break;
    }
    
    // Increment the constant value and try again
    $constant_value++;
}

?>
