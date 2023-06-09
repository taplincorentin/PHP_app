<?php

    ob_start()
    
    ?>
    <button class='btn text-primary'><a href='processing.php?action=clear'>EMPTY</a></button>
    <h1 class ="text-center text-primary">RECAP</h1>
    
    <?php
        session_start(); 
        //if 'products' key doesn't exist or null, display message
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p class='text-primary text-center'>NO PRODUCTS</p>";
        }
        else{
            echo "<table class='table text-primary text-center fs-3'>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Name</th>",
                            "<th>Price</th>",
                            "<th>Quantity</th>",
                            "<th>Total</th>",
                            "<th></th>",   
                        "</tr>",
                    "</thead>",
                    "<tbody>";

            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td>".$index."</th>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='processing.php?action=minusOne&id=$index' class='btn btn-primary btn-sm'> - </a>"
                            .$product['quant'].
                            "<a href='processing.php?action=plusOne&id=$index' class='btn btn-primary btn-sm'>+</a></td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='processing.php?action=delete&id=$index' class='btn btn-danger btn-sm'>x</a></td>",
                        
                    "</tr>";
                $totalGeneral+=$product['total'];
            }
            echo "<tr>",
                    "<td colspan=4> Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2,",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
                "</tbody>",
                "</table>";
        }
        

        
        $title = "Recap";
        $content =ob_get_clean();
                
        require "template.php";
?>