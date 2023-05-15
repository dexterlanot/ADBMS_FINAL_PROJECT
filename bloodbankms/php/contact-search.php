<?php
// Connect to the database
include_once('server.php');

// Get the search term from the form input
$searchTerm = $_POST['query'];

// Build the SQL query
$sql = "SELECT *
        FROM contact
        WHERE Name LIKE '%{$searchTerm}%'
        OR EmailAddress LIKE '%{$searchTerm}%'";

// Execute the query and get the result
$result = mysqli_query($db, $sql);

// Display the search results in a table format
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th>Mobile Number</th>';
echo '<th>Email Address</th>';
echo '<th>Message</th>';
echo '<th>Date</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['Name'];
    echo '<td>' . $row['MobileNumber'] . '</td>';
    echo '<td>' . $row['EmailAddress'] . '</td>';
    echo '<td>' . $row['Message'] . '</td>';
    echo '<td>' . $row['Date'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
