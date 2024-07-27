<?php
include 'db_connection.php';

if (isset($_GET['q'])) {
    $search = $_GET['q'];
    $sql = "SELECT * FROM inventory WHERE itemName LIKE '%$search%' OR category LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($conn->error) {
        echo "SQL Error: " . $conn->error;
        exit();
    }

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row['itemName'] . " - " . $row['category'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No results found";
    }
}
$conn->close();
?>
