<?php
// Connect to the database
include_once('server.php');

// Get the search term from the form input
$searchTerm = $_POST['query'];

// Build the SQL query
$sql = "SELECT *  
        FROM ho_success
        WHERE CONCAT(hoPrefix, hoID) LIKE '%{$searchTerm}%'
        OR FirstName LIKE '%{$searchTerm}%'
        OR LastName LIKE '%{$searchTerm}%'";

// Execute the query and get the result
$result = mysqli_query($db, $sql);

// Display the search results in a table format
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Stock ID</th>';
echo '<th>Request ID</th>';
echo '<th>Names</th>';
echo '<th>Date</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['hoPrefix'] . '' . $row['hoID'] . '</td>';
    echo '<td>' . $row['stockPrefix'] . '' . $row['stockID'] . '</td>';
    echo '<td>' . $row['reqPrefix'] . '' . $row['requestID'] . '</td>';
    echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
    echo '<td>' . $row['Date'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
