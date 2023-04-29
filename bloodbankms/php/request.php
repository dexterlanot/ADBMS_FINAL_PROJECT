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
                    <th class="text-center"> Status </th>
                </tr>
            </thead>
        <?php
        include_once('server.php');
        // execute the query
        $sql = "SELECT donorPrefix,donorID,FirstName,LastName,Age,Gender,BloodType,MobileNumber,EmailAddress,Address,Date,Status  
        FROM Donor";
        $result = mysqli_query($db, $sql);


        // display the results
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['donorPrefix'] . '' . $row['donorID'] . '</td>';
            echo '<td class="name">' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
            echo '<td>' . $row['Age'] . '</td>';
            echo '<td>' . $row['Gender'] . '</td>';
            echo '<td>' . $row['BloodType'] . '</td>';
            echo '<td>' . $row['MobileNumber'] . '</td>';
            echo '<td>' . $row['EmailAddress'] . '</td>';
            echo '<td>' . $row['Address'] . '</td>';
            echo '<td>' . $row['Date'] . '</td>';
        
            if (isset($row['Status'])) {
                if ($row['Status'] == 'Pending') {
                    echo '<td><form method="post">';
                    echo '<input type="hidden" name="donorID" value="' . $row['donorID'] . '">';
                    echo '<button type="submit" name="approve" class="btn btn-primary">Approve</button>';
                    echo '<button type="submit" name="decline" class="btn btn-danger">Decline</button>';
                    echo '</form></td>';
                    if (isset($_POST['approve'])) {
                        $donorID = $_POST['donorID'];
                        // update donor status to 'Approved' using $donorID
                        $update_query = "UPDATE donor SET Status = 'Accepted' WHERE donorID = $donorID";
                        $result = mysqli_query($db, $update_query);
                    
                        // insert data into another table
                        $insert_query = "INSERT INTO blood_stocks (donorID) VALUES ($donorID)";
                        mysqli_query($db, $insert_query);
                                    
                    } else if (isset($_POST['decline'])) {
                        $donorID = $_POST['donorID'];
                        $update_query = "UPDATE donor SET Status = 'Declined' WHERE donorID = $donorID";
                        // update donor status to 'Declined' using $donorID
                    }
                } else {
                    echo '<td>' . $row['Status'] . '</td>';
                }
            }            
            echo '</tr>';
        }    
        ?>
        </table>
    </div>
</main>
