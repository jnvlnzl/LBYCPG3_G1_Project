<?php
// Check if the itemID is provided in the URL
if (isset($_GET['itemID'])) {
    $itemID = $_GET['itemID'];

    // Path to the JSON file
    $cartFile = 'bag.json';

    // Check if the file exists
    if (file_exists($cartFile)) {
        // Load the existing cart data
        $cartData = json_decode(file_get_contents($cartFile), true);

        // Find the item in the cartData array and remove it
        foreach ($cartData as $key => $item) {
            if ($item['itemID'] == $itemID) {
                // Remove the item from the array
                unset($cartData[$key]);
                break;
            }
        }

        // Reindex the array (optional but recommended)
        $cartData = array_values($cartData);

        // Save the updated cart data back to the JSON file
        file_put_contents($cartFile, json_encode($cartData, JSON_PRETTY_PRINT));
    }
}

// Redirect back to the bag (cart) page
header('Location: bag.php');
exit;