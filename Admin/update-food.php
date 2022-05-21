<?php include('partials/menu.php'); 
ob_start();
?>


<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'] ; //get all details
    $sql2 ="SELECT * FROM food WHERE id=$id" ;
    $res2 = mysqli_query($conn,$sql2) ;
    $row2 = mysqli_fetch_assoc($res2);
    
    $title = $row2['title'] ;
    $description = $row2['description'] ;
    $price = $row2['price'] ;
    $current_image = $row2['image_name'] ;
    
    $featured = $row2['featured'] ;
    $active = $row2['active'] ;
}
else
{
     header('location:manage-food.php') ;
}
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>
        
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title ; ?>" placeholder="Title of food">
                    </td>
                </tr>
                <br><br>
                
                 <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" value="<?php echo $description ; ?>">Details of your food</textarea>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price ; ?>" placeholder="price of food">
                    </td>
                </tr>
                
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php
                        if($current_image == "")
                        {
                            echo "<div class='error'>Image Not Available</div>" ;
                        }
                        else
                        {
                            ?>
                            <img src="images/food/<?php echo $current_image ; ?> "width="150px " >
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                
                 <tr>
                    <td>Select New Image</td>
                    <td>
                        <input type="file" name="image" value="<?php echo $image_name ; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">
                            
                            
                            //desktop text doc file  
                            
                            
                       <option value="1">Appetizer</option>
                            <option value="2">Main Dish</option>
                            <option value="3">Desserts</option>
                            <option value="4">Beverage</option>
                       </select> 
                    </td>
                </tr>
                
                 <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured =="Yes"){echo "checked" ;} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured =="No"){echo "checked" ;} ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                
                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active =="Yes"){echo "checked" ;} ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active =="No"){echo "checked" ;} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                
                
                <tr>
                    
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ;?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image ; ?>">
                        <input type="submit" name="submit" value="Update Food" style="background-color : green ; padding: 5px 10px;">
                        
                    </td>
                </tr>
            </table>
            
            
        </form>
        
        <?php
             if(isset($_POST['submit']))
             {
                 $title = $_POST['title'] ;
                 $description = $_POST['description'] ;
                 $price = $_POST['price'] ;
                 $current_image = $_POST['current_image'] ;
                 
                 $featured = $_POST['featured'] ;
                 $active = $_POST['active'] ; 
                 
                 if(isset($_FILES['image']['name']))
                 {
                     $image_name = $_FILES['image']['name'] ; //upload button clicked and new image name
                     
                     if($image_name!= "")
                     {
                         $ext = end(explode('.',$image_name)) ;
                         $image_name = "Food-name-".rand(0000,9999).".".$ext ;
                         $src = $_FILES['image']['tmp_name'] ; //source Path
                    $dst = "images/food/".$image_name ; //destination path
                    $upload = move_uploaded_file($src,$dst); //upload image
                         
                         if($upload==false){
                        $_SESSION['upload'] = "<div class='error'>Failed to upload New Image</div>";
                        header('location:manage-food.php') ;
                        die() ;
                        }
                          if($current_image!="")
                    {
                        $remove_path = "../images/food".$current_image ;
                        $remove = unlink($remove_path) ;
                        
                        if($remove==false)
                        {
                            $_SESSION['removed-failed'] = "<div class='error'>Failed to remove Image</div>";
                            header('location:manage-food.php') ;
                            die() ;
                        }
                    }
                
                     }
                      else{
                        $image_name = $current_image;
                    }
                 }
                 else{
                     $image_name= $current_image ;
                 }
             
                 
                 $sql3= "UPDATE food SET 
                    title ='$title' ,
                    description = '$description',
                    price = '$price',
                    image_name = '$image_name',
                    
                    featured = '$featured' ,
                    active = '$active'
                    WHERE id=$id
                    ";
                 $res3 = mysqli_query($conn,$sql3) ;
                 
                 if($res3 == true)
            {
                 
               $_SESSION['update'] = "<div class='success' >Updated Food Successfully</div>" ;
                   header('location:manage-food.php') ;    
                    // window.location.replace("http://manage-food.php");

            }
            else
            {
                 $_SESSION['update'] = "<div class='error' >Failed to update food</div>" ;
                
                 
            }
             }
             
        
        ?>
        
        
    </div>
</div>

<?php include('partials/footer.php'); ?>
