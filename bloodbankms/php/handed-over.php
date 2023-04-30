<main class="table">
    <div class="table-header">
        <h2> Handed Over </h2>
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
                    <th class="text-center"> Stock ID </th>
                    <th class="text-center"> Request ID </th>
                    <th class="text-center"> Name </th>
                    <th class="text-center"> Date </th>
                </tr>
            </thead>
            <?php
            include_once ('server.php');

            // execute the query
            $sql = "SELECT *  
                    FROM ho_success";
            $result = mysqli_query($db, $sql);

            // display the results
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['hoPrefix'] . '' . $row['hoID'] . '</td>';
                echo '<td>' . $row['stockPrefix'] . '' . $row['stockID'] . '</td>';
                echo '<td>' . $row['reqPrefix'] . '' . $row['requestID'] . '</td>';
                echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
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
                        url: '../php/handed-over-search.php',
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
