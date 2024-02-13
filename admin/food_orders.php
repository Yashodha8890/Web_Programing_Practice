<?php include 'header_adminpages.php';
include '../config/db.php';
?>

<!-- //Sql querry to fetch data from the table. -->
<?php 


$sql = "SELECT * from order_details";

// Execute the SQL query and store the result
$result = $conn->query($sql);


// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table class='table table-striped table-responsive'>
            <thead>
                <tr>
                    <th>Order No</th>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Unit Price(€)</th>
                    <th>Total Price(€)</th>
                    <th>Order Status</th>
                    <th>Member Id</th>                    
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

    // Loop through the result set and display data in rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['orderNo']}</td>
                <td>{$row['itemName']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['unitPrice']}</td>
                <td>{$row['totalUnitPrice']}</td>
                <td>{$row['orderStatus']}</td>
                <td>{$row['memberId']}</td>
                <td><a class='btn btn-primary btn-sm' href='manage_orders.php?orderNo=$row[orderNo]'>Update</a></td>
                <td><a class='btn btn-danger btn-sm' href='manage_orders.php?orderNo=$row[orderNo]'>Delete</a></td>
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
