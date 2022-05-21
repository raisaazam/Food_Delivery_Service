<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        
        <form action="" method="post" enctype="multipart/form-data">
            <br><br>
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" placeholder="Title of food">
                    </td>
                </tr>
                <br><br>
                
                <?php
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'] ;
                    unset($_SESSION['upload']) ;
                }
                ?>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="5">Details of your food</textarea>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" placeholder="price of food">
                    </td>
                </tr>
                
                <tr>
                    <td>Insert Image</td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                
                
                <tr>
                    
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" style="background-color : green ; padding: 5px 10px;">
                        
                    </td>
                </tr>
            </table>
        </form>
      <?php  
        if(isset($_POST['submit'])){
            $title = $_POST['title'] ;
            $description = $_POST['description'] ;
            $category = $_POST['category'] ;
            $price = $_POST['price'] ;
            
            if(isset($_POST['featued'])){
                $featured = $_POST['featured'] ;
            }
            else{
                $featured = "No" ;
            }
            
             if(isset($_POST['active'])){
                $active = $_POST['active'] ;
            }
            else{
                $active = "No" ;
            }
            
            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'] ; 
                
                //whelther images is selected or not
                
                if($image_name!=""){
                    $ext =end(explode('.',$image_name)) ;//explode the extension
                    $image_name = "Food-name-".rand(0000,9999).".".$ext ; //new image name
                    $src = $_FILES['image']['tmp_name'] ; //source Path
                    $dst = "images/food/".$image_name ; //destination path
                    $upload = move_uploaded_file($src,$dst); //upload image
                    if($upload==false){
                        $_SESSION['upload'] = "<div class='error'>Failed to upload Image</div>";
                        header('location:add-food.php') ;
                        die() ;
                    }
                    
                }
            }
            else{
                $image_name = "" ; //not selected for default value
            }
            
            //insert data
            
            $sql2 = "INSERT INTO food SET 
            title ='$title' ,
            description = '$description',
            price = '$price',
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured' ,
            active = '$active'";
           
            $res2 = mysqli_query($conn,$sql2) ;
            
            if($res2 == true)
            {
                 
               $_SESSION['add'] = "<div class='success' >Added Food Successfully</div>" ;
                   header('location:manage-food.php') ;          

            }
            else
            {
                 $_SESSION['add'] = "<div class='error' >Failed to add food</div>" ;
                 
            }
        }
        
       ?> 
        
    </div>
</div>




<?php include('partials/footer.php'); ?>
