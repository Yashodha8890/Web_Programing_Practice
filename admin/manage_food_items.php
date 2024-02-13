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
$result = $conn->query($sql); ?>

<table class='table table-responsive table-responsive'>
    <tr>
        <th width="5%">Item Id</th>
        <th width="10%">Category Id</th>
        <th width="20%">Category Name</th>
        <th width="20%">Item Name</th>
        <th width="30%">Item Description</th>
        <th width="5%">Unit Price</th>
        <th width="10%">Actions</th>
                
    </tr>

    <?php
    if ($result->num_rows > 0) 
    {
        $itemNo = 0;
        // Loop through the result set and display data in rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['itemId']. "<td>";
            echo "<td>" . $row['categoryId']. "<td>";
            echo "<td>" . $row['categoryName']. "<td>";
            echo "<td>" . $row['itemName']. "<td>";
            echo "<td>" . $row['itemDescription']. "<td>";
            echo "<td>" . $row['unitPrice']. "<td>";
            echo "<td> 
                <div>                
                <a class='btn btn-primary' <a href='update_food_items.php?id=$row[id]'>$row['itemId']"'> Edit</a>
                <a class='btn btn-danger'> Delete</a>
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