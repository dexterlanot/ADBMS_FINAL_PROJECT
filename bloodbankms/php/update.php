<?php
include_once ('server.php');

    // Get search query from form submission
    $search_query = $_POST["search_query"];

    // Perform database query to retrieve matching data
    $sql = "SELECT * FROM donor WHERE donorID LIKE '%" . $search_query . "%'";
    $result = mysqli_query($db, $sql);

    // Display search results
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<form method='POST' action='update.php'>";
            echo "<tr><td>" . $row["donorID"] . "</td>";
            echo "<td><input type='text' name='name' value='" . $row["FirstName"] . $row["LastName"] . "'></td>";
            echo "<td><input type='text' name='email' value='" . $row["EmailAddress"] . "'></td>";
            echo "<td><input type='submit' value='Save'></td></tr>";
            echo "</form>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }

?>

<!-- Display search form -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="search_query">Search:</label>
    <input type="text" name="search_query" required>
    <input type="submit" value="Search">
</form>
?>