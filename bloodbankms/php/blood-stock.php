<main class="table">
    <div class="table-header">
        <h2> Blood Stocks </h2>
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
                    <th class="text-center"> Donor ID </th>
                    <th class="text-center"> Name </th>
                    <th class="text-center"> Blood Type </th>
                    <th class="text-center"> Date </th>
                </tr>
            </thead>
            <?php
            include_once ('server.php');

            // execute the query
            $sql = "SELECT *  
                    FROM stocks";
            $result = mysqli_query($db, $sql);

            // display the results
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['stockPrefix'] . '' . $row['stockID'] . '</td>';
                echo '<td>' . $row['donorPrefix'] . '' . $row['donorID'] . '</td>';
                echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
                echo '<td>' . $row['BloodType'] . '</td>';
                echo '<td>' . $row['Date'] . '</td>';
                echo '</tr>';
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
                        url: '../php/blood-stock-search.php',
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

            </script>
        </table>
    </div>
</main>
