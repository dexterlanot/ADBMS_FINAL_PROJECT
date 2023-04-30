<?php
// Connect to the database
include_once('server.php');

// Get the search term from the form input
$searchTerm = $_POST['query'];

// Build the SQL query
$sql = "SELECT *  
        FROM stocks
        WHERE CONCAT(stockPrefix, stockID) LIKE '%{$searchTerm}%'
        OR FirstName LIKE '%{$searchTerm}%'
        OR LastName LIKE '%{$searchTerm}%'
        OR BloodType LIKE '%{$searchTerm}%'";

// Execute the query and get the result
$result = mysqli_query($db, $sql);

// Display the search results in a table format
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Donor ID</th>';
echo '<th>Name</th>';
echo '<th>Blood Type</th>';
echo '<th>Date</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['stockPrefix'] . '' . $row['stockID'] . '</td>';
    echo '<td>' . $row['donorPrefix'] . '' . $row['donorID'] . '</td>';
    echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
    echo '<td>' . $row['BloodType'] . '</td>';
    echo '<td>' . $row['Date'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
