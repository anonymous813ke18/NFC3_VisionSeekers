<?php
include '../db-connection.php'; 
header('Content-Type: application/json');

// Make sure $conn is a MySQLi connection object from db-connection.php
if (!$conn) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// SQL query
$sql = "SELECT 
            CASE 
                WHEN age BETWEEN 1 AND 15 THEN '1-15'
                WHEN age BETWEEN 16 AND 30 THEN '16-30'
                WHEN age BETWEEN 31 AND 45 THEN '31-45'
                WHEN age BETWEEN 46 AND 60 THEN '46-60'
                ELSE '60+'
            END AS age_group,
            COUNT(*) AS count
        FROM (
            SELECT TIMESTAMPDIFF(YEAR, cdob, CURDATE()) AS age
            FROM children
        ) AS age_data
        GROUP BY age_group";

// Execute query
$result = $conn->query($sql);

$ageGroups = [];
$counts = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $ageGroups[] = $row['age_group'];
        $counts[] = $row['count'];
    }
} else {
    echo json_encode(['error' => 'Query failed: ' . $conn->error]);
    exit();
}

// Calculate percentages
$total = array_sum($counts);
$percentages = array_map(function ($count) use ($total) {
    return ($count / $total) * 100;
}, $counts);

$result = [
    'age_groups' => $ageGroups,
    'counts' => $percentages
];

// Return JSON response
echo json_encode($result);

$conn->close();
?>
