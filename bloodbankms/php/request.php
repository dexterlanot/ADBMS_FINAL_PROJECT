<main class="table">
    <div class="table-header">
        <h2> Blood Request </h2>
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
                    <th class="text-center"> Physician </th>
                    <th class="text-center"> Date </th>
                    <th class="text-center"> Status </th>
                </tr>
            </thead>
        <?php
        include_once('server.php');
        // execute the query
        $sql = "SELECT reqPrefix,requestID,FirstName,LastName,Age,Gender,BloodType,MobileNumber,EmailAddress,Address,Physician,Date,Status  
        FROM request";
        $result = mysqli_query($db, $sql);


        // display the results
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['reqPrefix'] . '' . $row['requestID'] . '</td>';
            echo '<td class="name">' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
            echo '<td>' . $row['Age'] . '</td>';
            echo '<td>' . $row['Gender'] . '</td>';
            echo '<td>' . $row['BloodType'] . '</td>';
            echo '<td>' . $row['MobileNumber'] . '</td>';
            echo '<td>' . $row['EmailAddress'] . '</td>';
            echo '<td>' . $row['Address'] . '</td>';
            echo '<td>' . $row['Physician'] . '</td>';
            echo '<td>' . $row['Date'] . '</td>';
            if ($row['Status'] == 'Pending') {
                echo '<td><button class="btn-approve" onclick="approveRequest(' . $row['requestID'] . ')">Approve</button>';
                echo '<button class="btn-decline" onclick="declineRequest(' . $row['requestID'] . ')">Decline</button></td>';
            } else {
                echo '<td>' . $row['Status'] . '</td>';
            }
            echo '</tr>';
        }
        ?>
        <script>
            // SEARCH
            $(document).ready(function() {
            // Listen for input event on search input field
            $('#search').on('input', function() {
                // Get search query
                var req_query = $(this).val().trim();

                    // Make AJAX call to fetch search results
                    $.ajax({
                        url: '../php/request-search.php',
                        type: 'POST',
                        data: { req_query: req_query },
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
            //APPROVE BUTTON
            function approveRequest(requestID) {
                $.ajax({
                    url: 'request-status-update.php',
                    type: 'POST',
                    data: { requestID: requestID, newStatus: 'Approved' },
                    success: function(data) {
                        // Refresh the table with updated data
                        $('.table-body').html(data);
                    },
                    error: function() {
                        alert('Error in updating request status');
                    }
                });
            }
            //DECLINE BUTTON
            function declineRequest(requestID) {
                $.ajax({
                    url: 'request-status-update.php',
                    type: 'POST',
                    data: { requestID: requestID, newStatus: 'Declined' },
                    success: function(data) {
                        // Refresh the table with updated data
                        $('.table-body').html(data);
                    },
                    error: function() {
                        alert('Error in updating request status');
                    }
                });
            }
        </script>
        </table>
    </div>
</main>
