<?php include 'header_adminpages.php';
?>
<div class="container container-additem">
    <div class="row">    
        <div class="col-sm-3">
        <h2 class="text-center">Add Categories</h2>
            <form method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
                <label for="formGroupExampleInput1">Item Catergory name:</label>
                <input type="text" class="form-control" id="formGroupExampleInput1" name="catName" placeholder="" required><br/>
                <input type="submit" class="btn btn-primary text-center" name="addCategory" value="Save Category"> <br/><br/>
            </form>
        </div>
        <div class="col-sm-9">
            <h2 class="text-center">Add Items</h2>
            <form method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
                <label for="formGroupExampleInput2">Item Name :</label>   
                <input type="text" class="form-control" id="formGroupExampleInput2" name="itemName" placeholder="" required><br/>
                <label for="addImage">Image :</label>   
                <input type="file" accept="image/png, image/jpeg, image/jpg" class="box" id="addImage" name="addImage" ><br/><br/>
                <label for="cat">Item Catergory :</label>
                <select class="form-select" aria-label="Default select example" id="cat" name="catergoryId">
                            <option selected>Select Catergory</option>
                            <option value="1">Sri Lankan</option>
                            <option value="2">Indian</option>
                            <option value="3">Malaysian</option>
                            <option value="4">Snacks</option>
            </select><br/>
                <label for="formGroupExampleInput3">Item Description :</label>
                    <input type="text" class="form-control" id="formGroupExampleInput3" name="description" placeholder="" required><br/>
                    <label for="formGroupExampleInput4">Unit Price :</label>
                    <input type="text" class="form-control" id="formGroupExampleInput4" name="unitPrice" placeholder="" required><br/>
                    <input type="submit" class="btn btn-primary text-center" name="addItem" href="manage_food_items.php" value="Save Item"> <br/><br/> 
                    <!-- <a class='btn btn-submit btn-sm' name="addItem" href='manage_food_items.php'>Save Item</a> -->
            </form>
        </div>
</div>

<!--Save Item catergories--->
<?php
    //Processing data of the form in the same page
    //Check for a post request
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addCategory']))
        {
            $categoryName = $_POST["catName"];
                        
            //connecting to DB service
            include '../config/db.php';

            //Write SQL statement to add data to the table
            $sql="insert into food_categories(categoryName) values('$categoryName')";
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
            // }        
    ?>

<?php
    //Processing data of the form in the same page
    //Check for a post request
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addItem']))
        {       
            $itemName = $_POST["itemName"];     
            $itemImage = $_POST["addImage"];        
            $catergoryId = $_POST["catergoryId"];
            $itemDescription = $_POST["description"];
            $unitPrice = $_POST["unitPrice"];
            
            //connecting to DB service
            include '../config/db.php';

            //Write SQL statement to add data to the table
            $sql="insert into food_items(itemName,image,categoryId,itemDescription,unitPrice) values('$itemName','$itemImage','$catergoryId','$itemDescription','$unitPrice')";
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
            // }        
    ?>


