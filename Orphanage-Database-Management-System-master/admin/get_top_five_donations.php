<?php
include '../db-connection.php';
header('Content-Type: application/json');

// Make sure $conn is a MySQLi connection object from db-connection.php
if (!$conn) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// SQL query
$sql = "SELECT program, SUM(amount) AS total_amount
        FROM donation
        GROUP BY program
        ORDER BY total_amount DESC
        LIMIT 5";

// Execute query
$result = $conn->query($sql);

$programs = [];
$amounts = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $programs[] = $row['program'];
        $amounts[] = $row['total_amount'];
    }
} else {
    echo json_encode(['error' => 'Query failed: ' . $conn->error]);
    exit();
}

// Prepare data for chart
$result = [
    'programs' => $programs,
    'amounts' => $amounts
];

// Return JSON response
echo json_encode($result);

$conn->close();
?>
