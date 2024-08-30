<?php
include '../db-connection.php';
header('Content-Type: application/json');

// Make sure $conn is a MySQLi connection object from db-connection.php
if (!$conn) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// SQL query
$sql = "SELECT MONTH(donation_date) AS month, COUNT(d_id) AS donor_count
        FROM donation
        GROUP BY YEAR(donation_date), MONTH(donation_date)";

// Execute query
$result = $conn->query($sql);

$months = [];
$donorCounts = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Convert month number to month name
        $months[] = date('F', mktime(0, 0, 0, $row['month'], 10));
        $donorCounts[] = $row['donor_count'];
    }
} else {
    echo json_encode(['error' => 'Query failed: ' . $conn->error]);
    exit();
}

// Prepare data for chart
$result = [
    'months' => $months,
    'donor_counts' => $donorCounts
];

// Return JSON response
echo json_encode($result);

$conn->close();
?>
