<?php
     include('../Admin/config.php') ;
     if(isset($_GET['id']) && isset($_GET['image_name']))
     {
         $id = $_GET['id'] ;
         $image_name = $_GET['image_name'] ;
         
         if($image_name != "")
         {
             $path = "images/food/".$image_name ;
             $remove = unlink($path) ;
             if($remove==false)
             {
                 $_SESSION['upload'] = "<div class='error'>Failed to remove image</div>" ;
                     header('location:manage-food.php') ;
                     die() ;
             }
         }
         
         
          $sql = "DELETE  FROM food WHERE id=$id" ;
            $res = mysqli_query($conn,$sql) ;
         if($res==TRUE)
         {
             $_SESSION['delete'] = "<div class='success'>Food deleted successfully</div>" ;
             header('location:manage-food.php') ;
             
         }
         else
         {
             $_SESSION['upload'] = "<div class='error'>Failed to remove delete food</div>" ;
                     header('location:manage-food.php') ;
         }
     }
     else
     {
         //echo "redirect" ;
         $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access</div>" ;
         header('location:manage-food.php') ;
     }
?>