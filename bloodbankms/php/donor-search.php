<?php
// Connect to the database
include_once('server.php');

// Get the search term from the form input
$searchTerm = $_POST['query'];

// Build the SQL query
$sql = "SELECT donorPrefix, donorID, FirstName, LastName, Age, Gender, BloodType, MobileNumber, EmailAddress, Address, Date
        FROM Donor
        WHERE CONCAT(donorPrefix, donorID) LIKE '%{$searchTerm}%'";

// Execute the query and get the result
$result = mysqli_query($db, $sql);

// Display the search results in a table format
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Name</th>';
echo '<th>Age</th>';
echo '<th>Gender</th>';
echo '<th>Blood Type</th>';
echo '<th>Mobile Number</th>';
echo '<th>Email Address</th>';
echo '<th>Address</th>';
echo '<th>Date</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['donorPrefix'] . '' . $row['donorID'] . '</td>';
    echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
    echo '<td>' . $row['Age'] . '</td>';
    echo '<td>' . $row['Gender'] . '</td>';
    echo '<td>' . $row['BloodType'] . '</td>';
    echo '<td>' . $row['MobileNumber'] . '</td>';
    echo '<td>' . $row['EmailAddress'] . '</td>';
    echo '<td>' . $row['Address'] . '</td>';
    echo '<td>' . $row['Date'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
