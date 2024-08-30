<?php
include '../db-connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Make sure $conn is a MySQLi connection object from db-connection.php
if (!$conn) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Query
$query = "SELECT spn_firstname, SUM(spn_amount) AS total_amount 
          FROM sponsorer 
          GROUP BY spn_firstname";

$result = $conn->query($query);

$sponsors = [];
$amounts = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $sponsors[] = $row['spn_firstname'];
        $amounts[] = $row['total_amount'];
    }
} else {
    echo json_encode(['error' => 'Query failed: ' . $conn->error]);
    exit();
}

echo json_encode([
    'sponsors' => $sponsors,
    'amounts' => $amounts
]);

$conn->close();
?>
