<?php include 'header_adminpages.php';
include '../config/db.php';
?>

<!-- //Sql querry to fetch data from the table. -->
<?php $sql = "SELECT * FROM food_items";

// Execute the SQL query and store the result
$result = $conn->query($sql); ?>

<table class='table table-responsive display-flex '>
    <tr style="width:100%">
        <th>Item Id</th>
        <th>Category Id</th>
        <th>Item Name</th>
        <th>Item Description</th>
        <th>Unit Price</th>
        <th>Actions</th>
                
    </tr>

    <?php
    if ($result->num_rows > 0) 
    {
        
        // Loop through the result set and display data in rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['itemId']. "<td>";
            echo "<td>" . $row['categoryId']. "<td>";
            echo "<td>" . $row['itemName']. "<td>";
            echo "<td>" . $row['itemDescription']. "<td>";
            echo "<td>" . $row['unitPrice']. "<td>";
            echo "<td> 
                <div class='btn-group'>
                    <a class='btn btn-primary' href='update_food_items.php?id=" .$row['itemId']."'> Edit</a>
                    <input type='button' class='btn btn-danger' value='Delete'>
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