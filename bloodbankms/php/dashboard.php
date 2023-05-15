<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <title>Blood Bank Management System</title>
</head>
<body>
<?php 
    include ('side-bar.php');
    include_once('server.php');
    ?>

        <div class="home allContent-section" id="#home">
            <div class="cardBox">
                <div class="card">
                    <div> 
                    <div class="number"> 
                            <?php 
                                // Query the number of rows in the table
                                $sql = 'SELECT COUNT(donorID) AS num_rows FROM donor';
                                $result = mysqli_query($db, $sql);
                                if (!$result) {
                                    die('Error executing query: ' . mysqli_error($db));
                                }

                                // Fetch the result and store the number of rows in a variable
                                $row = mysqli_fetch_assoc($result);
                                $num_rows = $row['num_rows'];
                                echo "$num_rows";
                            ?> 
                        </div>
                        <div class="cardName
                        <div class="cardName">Donor</div>
                    </div>
                    <div class="iconBox">
                       <i class="fa-solid fa-hand-holding-medical"></i>
                    </div>
                </div>
                <div class="card">
                    <div> 
                        <div class="number"> 
                            <?php 
                                // Query the number of rows in the table
                                $sql = 'SELECT COUNT(requestID) AS num_rows FROM request';
                                $result = mysqli_query($db, $sql);
                                if (!$result) {
                                    die('Error executing query: ' . mysqli_error($db));
                                }

                                // Fetch the result and store the number of rows in a variable
                                $row = mysqli_fetch_assoc($result);
                                $num_rows = $row['num_rows'];
                                echo "$num_rows";
                            ?> 
                        </div>
                        <div class="cardName">Blood Request</div>
                    </div>
                    <div class="iconBox">
                       <i class="fa-solid fa-droplet"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                    <div class="number"> 
                            <?php 
                                // Query the number of rows in the table
                                $sql = 'SELECT COUNT(hoID) AS num_rows FROM handed_over';
                                $result = mysqli_query($db, $sql);
                                if (!$result) {
                                    die('Error executing query: ' . mysqli_error($db));
                                }

                                // Fetch the result and store the number of rows in a variable
                                $row = mysqli_fetch_assoc($result);
                                $num_rows = $row['num_rows'];
                                echo "$num_rows";
                            ?>
                        </div>
                        <div class="cardName">Completed Requests</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-solid fa-box"></i>
                    </div>
                    </a>
                </div>
                <div class="card">
                    <div>
                    <div class="number">
                            <?php 
                                // Query the number of rows in the table
                                $sql = 'SELECT COUNT(stockID) AS num_rows FROM blood_stocks WHERE NOT EXISTS ( SELECT * FROM handed_over WHERE blood_stocks.stockID = handed_over.stockID)';
                                $result = mysqli_query($db, $sql);
                                if (!$result) {
                                    die('Error executing query: ' . mysqli_error($db));
                                }

                                // Fetch the result and store the number of rows in a variable
                                $row = mysqli_fetch_assoc($result);
                                $num_rows = $row['num_rows'];
                                echo "$num_rows";
                            ?> 
                        </div>
                        <div class="cardName">Available Stocks</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-cubes-stacked"></i>
                    </div>
                </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/side-bar.js"></script>
    <script src="../js/hamburger-toggle.js"></script>
</body>
</html>