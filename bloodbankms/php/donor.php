<main class="table">
    <div class="table-header">
        <h2> Donor </h2>
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
                    <th class="text-center"> Donated </th>
                </tr>
            </thead>
            <?php
            include_once ('server.php');

            // execute the query
            $sql = "SELECT donorPrefix,donorID,FirstName,LastName,Age,Gender,BloodType,MobileNumber,EmailAddress,Address,Date  
                    FROM Donor";
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
                echo '<button type="button" onclick="insertBloodStock('.$row['donorID'].')"> <i class="fa-solid fa-check"></i> </button>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            <script>
            function insertBloodStock(donorID) {
            $.ajax({
                url: '../php/insertBloodStock.php',
                type: 'POST',
                data: {donorID: donorID},
                success: function(data) {
                alert('Blood stock inserted successfully');
                },
                error: function() {
                alert('Error in inserting blood stock');
                }
            });
            }
            </script>
        </table>
    </div>
</main>
