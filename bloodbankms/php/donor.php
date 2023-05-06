<main class="table">
    <div class="table-header">
        <h2> Donor </h2>
        <div class="search" id="search-bar">
            <input type="text" id="search" placeholder="Search">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
   
    <div class="table-body">
        <table>
            <thead>
                <tr>
                    <th class="text-center"> ID </th>
                    <th class="text-center"> Name </th>
                    <th class="text-center"> Age </th>
                    <th class="text-center"> Gender </th>
                    <th class="text-center"> Blood Type </th>
                    <th class="text-center"> Mobile Number </th>
                    <th class="text-center"> Email address </th>
                    <th class="text-center"> Address </th>
                    <th class="text-center"> Date </th>
                    <th class="text-center"> Actions </th>
                </tr>
            </thead>        
<?php
include_once ('server.php');

// execute the query
$sql = "SELECT *  
        FROM donor";
$result = mysqli_query($db, $sql);

// display the results
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
    echo '<td>';
    echo '<button class="btn-add" type="button" onclick="insertBloodStock('.$row['donorID'].')"> <i class="fa-solid fa-check-to-slot"></i> </button>';
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
}
?>

            <script>
            $(document).ready(function() {
            // Listen for input event on search input field
            $('#search').on('input', function() {
                // Get search query
                var query = $(this).val().trim();

                    // Make AJAX call to fetch search results
                    $.ajax({
                        url: '../php/donor-search.php',
                        type: 'POST',
                        data: { query: query },
                        success: function(data) {
                            // Update table with search results
                            $('.table-body').html(data);
                        },
                        error: function() {
                            alert('Error in fetching search results');
                        }
                    });
                });
            });

            function insertBloodStock(donorID) {
            $.ajax({
                url: '../php/insertBloodStock.php',
                type: 'POST',
                data: {donorID: donorID},
                success: function(data) {
                alert('Blood stock inserted successfully');
                $('.allContent-section').load('../php/donor.php');
                },
                error: function() {
                alert('Error in inserting blood stock');
                }
            });
            }

            function deleteDonor(donorID) {
            $.ajax({
                url: '../php/donor-delete.php',
                type: 'POST',
                data: {donorID: donorID},
                success: function(data) {
                    alert('Donor deleted successfully');
                    $('.allContent-section').load('../php/donor.php');
                },
                error: function() {
                    alert('Error in deleting donor');
                }
            });
            }
            function loadEditRecordPage(donorID) {
            $.ajax({
                url: "donor-edit-record.php",
                type: "GET",
                data: { donorID: donorID },
                success: function(data) {
                    $(".allContent-section").html(data);
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
            }


            </script>
        </table>
    </div>
</main>
