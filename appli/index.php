<?php
ob_start()



?>
        <h1 class='text-center'>ADD A NEW PRODUCT</h1>
        <form action="processing.php" method="post" class> <!--form action gives target file when form submitted
                                                               method gives HTTP method that will be used to transmit form to server -->
            <div> 
            <p  class="form-group">
                <label>Product name :</label>
                <input type='text' name='name' class="form-control">
            </p>
            <p  class="form-group">
                <label>Product price :</label>
                <input step='any' name='price' class="form-control">    
            </p>
            <p class="form-group">
                <label>Desired quantity :</label>
                <input name='quant' value='1' class="form-control">
            </p>
            <p>
                <input type='submit' name='submit' value="Add the product" class="btn btn-dark">
            </p>
            </div>
        </form>


<?php
session_start();
$title = "Product adding";
$content =ob_get_clean();
        
require "template.php";
?>