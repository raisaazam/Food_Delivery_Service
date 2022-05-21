<?php include('../partial-front/nav.php') ; ?>
<section class="food-search">
    <div class="container">
        <h2 class="text-center text-white">Fill the form to confirm your Order</h2>
        <form action="#" class="order">
            <fieldset>
                <legend>Selected Food</legend>
                <div class="food-menu-img">
                    <img src="images/image15.jpeg" alt="mousse" class="img-responsive img-curve">
                    
                    <div class="food-menu-desc">
                         <h4>Chocolate Mousse</h4>
                         <p class="food-price">200 Taka</p>
                        
                        <div class="order-label">Quantity</div>
                        <input type="number " name="qty" class="input-responsive" value="1" required>
                    </div>
                </div>
            </fieldset>
            
            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="Your Name" class="input-responsive" required>
                
                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="Your Email" class="input-responsive" required>
                
                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="Your Contact" class="input-responsive" required>
                
                <div class="order-label">Address</div>
                <textarea  name="address" rows="8" placeholder="Your Address" class="input-responsive" required></textarea> <br><br>
                <input type="submit" name="submit" value="Confirm Order" style=" padding: 5px 10px;" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>
<?php include('../partial-front/foot.php') ; ?>