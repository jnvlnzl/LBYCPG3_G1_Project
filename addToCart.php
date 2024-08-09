<?php
// Connect to the database
$host = 'localhost';
$dbname = 'ecor'; // Replace with your actual database name
$username = 'root'; // Replace with your actual database username
$password = 'ANY'; // Replace with your actual database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Fetch itemID from GET request
$itemID = isset($_GET['itemID']) ? intval($_GET['itemID']) : 0;

if ($itemID > 0) {
    // Remove "../" from the start of the image path
    $item['img'] = str_replace('../', '', $item['img']);

    // Fetch item details from the database
    $stmt = $pdo->prepare("SELECT itemID, itemName, img FROM inventory WHERE itemID = :itemID");
    $stmt->execute(['itemID' => $itemID]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        // Load existing cart data
        $cartFile = 'bag.json';
        if (file_exists($cartFile)) {
            $cartData = json_decode(file_get_contents($cartFile), true);
        } else {
            $cartData = [];
        }

        // Check if item already exists in the cart
        $itemExists = false;
        foreach ($cartData as &$cartItem) {
            if ($cartItem['itemID'] == $item['itemID']) {
                $cartItem['quantity'] += 1;
                $itemExists = true;
                break;
            }
        }

        // If item does not exist in the cart, add it
        if (!$itemExists) {
            $item['quantity'] = 1;
            $cartData[] = $item;
        }

        // Save updated cart data back to JSON file without escaping slashes
        file_put_contents($cartFile, json_encode($cartData, JSON_UNESCAPED_SLASHES));
    }
}

// Redirect back to the catalog page
header('Location: catalog.html');
exit;
?>
