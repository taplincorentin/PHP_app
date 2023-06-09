<?php
ob_start()



?>
        <h1 class ="text-center text-primary">ADD A NEW PRODUCT</h1>
        <form action="processing.php" method="post" class ="text-center text-primary"> <!--form action gives target file when form submitted
                                                            method gives HTTP method that will be used to transmit form to server -->
            <p>
                <label>
                    Product name :
                    <input type='text' name='name'>
                </label>
            </p>
            <p>
                <label>
                    Product price :
                    <input type='number' step='any' name='price'>
                </label>
            </p>

            
            <p>
                <label>
                    Desired quantity :
                    <input type='number' name='quant' value='1'>
                </label>
            </p>
            <p>
                <input type='submit' name='submit' value="Add the product" class="btn btn-primary">
            </p>
        </form>


<?php
session_start();
$title = "Product adding";
$content =ob_get_clean();
        
require "template.php";
?>