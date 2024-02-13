<?php include 'header_adminpages.php';
include '../config/db.php';
?>

<!-- //Sql querry to fetch data from the table. -->

<?php

$sql = "SELECT food_items.itemId, food_categories.categoryId, food_categories.categoryName, food_items.itemName,food_items.itemDescription,food_items.unitPrice
        FROM food_items
        LEFT JOIN food_categories ON food_items.categoryId = food_categories.categoryId
        ORDER BY food_items.itemId";

// Execute the SQL query and store the result
$result = $conn->query($sql);


// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table class='table table-striped table-responsive'>
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Item Name</th>
                    <th>Item Description</th>
                    <th>Unit Price (€)</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

    // Loop through the result set and display data in rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['itemId']}</td>
                <td>{$row['categoryId']}</td>
                <td>{$row['categoryName']}</td>
                <td>{$row['itemName']}</td>
                <td>{$row['itemDescription']}</td>
                <td>{$row['unitPrice']}</td>
                <td><a class='btn btn-primary btn-sm' href='update_food_items.php?itemId=$row[itemId]'>Update</a></td>
                <td><a class='btn btn-danger btn-sm' href='update_food_items.php?itemId=$row[itemId]'>Delete</a></td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    // Display a message if no results are found
    echo "No results";
}
// close the connection when done
$conn->close();
?>