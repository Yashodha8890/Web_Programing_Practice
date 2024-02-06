<?php
    include 'header_adminpages.php';
?>
<form method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <div class="container container-additem">
            <h2 class="text-center">Add Items</h2>
            <label for="formGroupExampleInput">Item Name :</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="itemName" placeholder="" required><br/>
            <label for="formGroupExampleInput">Item Catergory :</label>
            <select class="form-select" aria-label="Default select example" name="catergory">
                <option selected>Select Catergory</option>
                <option value="1">Sri Lankan</option>
                <option value="2">Indian</option>
                <option value="3">Malaysian</option>
                <option value="4">Snacks</option>
            </select><br/>
            <label for="formGroupExampleInput">Item Description :</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="description" placeholder="" required><br/>
            <label for="formGroupExampleInput">Unit Price :</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="unitPrice" placeholder="" required><br/>
                <input type="submit" class="btn btn-primary text-center" name="addItem" value="Save Item"> <br/><br/>            
        </div>
        <div class="col-sm-3"></div>
    </div>
</form>


<?php
    //Processing data of the form in the same page
    //Check for a post request
    
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(isset($_POST['addItem']))
                {
                    $itemName = $_POST["itemName"];
                    $itemCategory = $_POST["catergory"];
                    $description = $_POST["description"];
                    $price = $_POST["unitPrice"];
            
                    //connecting to DB service
                    include 'db.php';

                    //Write SQL statement to add data to the table
                    $sql="insert into food_items(itemName,itemCategory,description,price) values('$itemName','$itemCategory','$description','$price')";
                    //$sql="insert into studentsinfo (fname, lname, city, groupid) values('$fname', '$lname', '$city', '$groupid')";

                    if($conn -> query($sql)==TRUE)
                    {
                        echo "Your data was saved.";
                    }

                    else
                    {
                        echo "Error" . $sql . "<br>" . $conn -> error;
                    }    

                    //closing the opened db connection
                    $conn->close();
                
                }
            }
        
    ?>

<?php include 'footer.php';
?>