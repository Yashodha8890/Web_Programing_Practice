<?php include 'header_adminpages.php';
include '../config/db.php';
?>

<!-- //Sql querry to fetch data from the table. -->
<?php 


$sql = "SELECT * from order_details";

// Execute the SQL query and store the result
$result = $conn->query($sql); ?>

<table class='table table-light table-responsive'>
    <tr style="width:100%">
        <th>Order No</th>
        <th>Item Name</th>
        <!-- <th>ItemId</th> -->
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total Unit Price</th>
        <th>Order Status</th>
        <th>Member Id</th>
        <th>Actions</th>
                
    </tr>

    <?php
    if ($result->num_rows > 0) 
    {
        $itemNo = 0;
        // Loop through the result set and display data in rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['orderNo']. "<td>";
            echo "<td>" . $row['itemName']. "<td>";
            // echo "<td>" . $row['itemId']. "<td>";
            echo "<td>" . $row['quantity']. "<td>";
            echo "<td>" . $row['unitPrice']. "<td>";
            echo "<td>" . $row['totalUnitPrice']. "<td>";
            echo "<td>" . $row['orderStatus']. "<td>";
            echo "<td>" . $row['memberId']. "<td>";


            echo "<td> 
                <div class='btn'>
                    <a class='btn btn-primary' href='update_food_items.php?id=" .$row['itemId']."'> Edit</a>
                    <input type='btn btn-brand' class='btn btn-danger' value='Delete'>
                </div>
            </td>"; 
            
            echo "</tr>";
        }

    } 

    else 
    {
        // Display a message if no results are found
        echo "No results";
    }
    
    // close the connection when done
    $conn->close();
 ?>

</table>