<?php
// Connect to the database
include_once('server.php');

// Get the search term from the form input
$searchTerm = $_POST['query'];

// Build the SQL query
$sql = "SELECT *
        FROM donor
        WHERE CONCAT(donorPrefix, donorID) LIKE '%{$searchTerm}%'
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
echo '<th>Name</th>';
echo '<th>Age</th>';
echo '<th>Gender</th>';
echo '<th>Blood Type</th>';
echo '<th>Mobile Number</th>';
echo '<th>Email Address</th>';
echo '<th>Address</th>';
echo '<th>Date</th>';
echo '<th>Actions</th>';
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
    echo '<td>' . '<button class="btn-add" type="button" onclick="insertBloodStock('.$row['donorID'].')"> <i class="fa-solid fa-check-to-slot"></i> </button>';
    echo '<button class="btn-edit" type="button" onclick="loadEditRecordPage('.$row['donorID'].')"> <i class="fa-solid fa-pen"></i> </button>';
    $blood_stock_query = "SELECT * FROM blood_stocks WHERE donorID = ".$row['donorID'];
    $blood_stock_result = mysqli_query($db, $blood_stock_query);
    $blood_stock_count = mysqli_num_rows($blood_stock_result);

    // display delete button only if donor has no associated records in blood_stock table
    if ($blood_stock_count == 0) {
        echo '<button class="btn-del" type="button" onclick="deleteDonor('.$row['donorID'].')"> <i class="fa-solid fa-trash-can"></i> </button></td>';
    } else {
        echo '<button class="btn-del" type="button" disabled style="cursor: not-allowed; background-color: gray; color: white;"> <i class="fa-solid fa-trash-can"></i> </button></td>';
    echo '</tr>';
}
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
