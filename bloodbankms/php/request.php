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
                    <th class="text-center"> Actions </th>
                </tr>
            </thead>
        <?php
        include_once('server.php');
        // execute the query
        $sql = "SELECT *  
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
                echo '<td><button class="btn-approve" onclick="approveRequest(' . $row['requestID'] . ')"><i class="fa-solid fa-check"></i></button>';
                echo '<button class="btn-decline" onclick="declineRequest(' . $row['requestID'] . ')"><i class="fa-solid fa-xmark"></i></button></td>';
            } else {
                echo '<td>' . $row['Status'] . '</td></form>';
            }
            echo '<td>';
            echo '<button class="btn-edit" type="button" onclick="reqloadEditRecordPage('.$row['requestID'].')"> <i class="fa-solid fa-pen"></i> </button>';
            $req_query = "SELECT * FROM handed_over WHERE requestID = ".$row['requestID'];
            $req_query_result = mysqli_query($db, $req_query);
            $req_query_count = mysqli_num_rows($req_query_result);
        
            // display delete button only if donor has no associated records in blood_stock table
            if ($req_query_count == 0) {
                echo '<button class="btn-del" type="button" onclick="deleteReq('.$row['requestID'].')"> <i class="fa-solid fa-trash-can"></i> </button></td>';
            } else {
                echo '<button class="btn-del" type="button" disabled style="cursor: not-allowed; background-color: gray; color: white;"> <i class="fa-solid fa-trash-can"></i> </button></td>';
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
                        alert('Blood handed over successfully');
                        $('.allContent-section').load('../php/request.php');
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
                        alert('Sorry there is no available stock');
                        $('.allContent-section').load('../php/request.php');
                    },
                    error: function() {
                        alert('Error in updating request status');
                    }
                });
            }
            //DELETE
            function deleteReq(requestID) {
            $.ajax({
                url: '../php/req-delete.php',
                type: 'POST',
                data: {requestID: requestID},
                success: function(data) {
                    alert('Request deleted successfully');
                    $('.allContent-section').load('../php/request.php');
                },
                error: function() {
                    alert('Error in deleting request');
                }
            });
            }

            function reqloadEditRecordPage(requestID) {
            $.ajax({
                url: "req-edit-record.php",
                type: "GET",
                data: { requestID: requestID },
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
