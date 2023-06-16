<?php

function validate($data)
{
    // Remove HTML special characters
    $sanitizedString = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

    // Trim whitespace from the beginning and end
    $sanitizedString = trim($sanitizedString);

    // Remove slashes
    $sanitizedString = stripslashes($sanitizedString);

    return $sanitizedString;
}

?>