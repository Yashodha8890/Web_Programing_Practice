<?php include 'header_adminpages.php';

    include '../config/db.php';

    $a = $_GET['itemId'];

    $result = mysqli_query($conn,"SELECT * FROM food_items WHERE id= '$a'");
    $row= mysqli_fetch_array($result);
?>

<h2>Update food Items: </h2>
<form name= "form1" method="post" action="">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="" name="itemId" required value="<?php echo $row['itemId']; ?>">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="" name="categoryId" required value="<?php echo $row['categoryId']; ?>" >
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="" name="itemName" required value="<?php echo $row['itemName']; ?>">
    </div>

    <div class="col">
      <input type="text" class="form-control" placeholder="" name="itemDescription" required value="<?php echo $row['itemDescription']; ?>">    
    </div>

    <div class="col">
      <input type="text" class="form-control" placeholder="" name="unitPrice" required value="<?php echo $row['unitPrice']; ?>">    
    </div>

  </div>
<br>
  <div class="row">
  <div><button type="submit" class="btn btn-primary" name="submit">Update your Information</button></div>
  <div><button type="submit" class="btn btn-primary" name="delete">Delete your Information</button></div>
</div>
</form>
<?php 
/* 
The isset() function is used to check if a variable is set and not NULL.
 In this case, it's checking if the $_POST['submit'] 
value is set and not NULL. If the form has been submitted, the value of $_POST['submit'] will be set,
and the code inside the if block will be executed. If the form has not been submitted, 
the value of $_POST['submit'] will not be set, and the code inside the if block will not be executed.
*/
if (isset($_POST['submit']))
{
    
    $itemName = $_POST["itemName"];            
    $catergoryId = $_POST["catergoryId"];
    $itemDescription = $_POST["description"];
    $unitPrice = $_POST["unitPrice"];
    
    $query = mysqli_query($conn,"UPDATE food_items set itemName='$itemName', itemDescription='$itemDescription', unitPrice='$unitPrice' where id='$a'");
    if($query)
    {
        echo "<h2>Your information is updated Successfully</h2>";
        // if you want to redirect to update page after updating
    }
    else { echo "Record Not modified";}
}
  if (isset($_POST['delete']))
  {
      $query = mysqli_query($conn,"DELETE FROM food_items where id='$a'");
      if($query)
      {
        echo "Record Deleted with id: $a <br>";
        // if you want to redirect to update page after updating
        //header("location: update.php");
      }
        else 
        { 
          echo "Record Not Deleted";
        }
        
  }
$conn->close();

?>