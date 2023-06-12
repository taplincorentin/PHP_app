<?php

    ob_start();
    
 
        session_start();
        echo "<h1 class='text-center'>CART</h1>";
     
        //if 'products' key doesn't exist or null, display message
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p class='text-center'>NO PRODUCTS</p>";
        }
        else{
            echo "<table class='table text-center fs-3'>",
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
                        "<td>".$index."</td>",
                        "<td><button type='button' data-bs-toggle='modal' data-bs-target='#myModal-$index'>"
                        .$product['name']."</button>
                        <div id='myModal-$index' class='modal fade' aria-labelledby='myModal' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h1>Info</h1>
                                    </div>
                                    <div class='modal-body'>
                                    <img src='./pictures/".$product['fileName']."'width='200px'>
                                    <p>".$product['text']."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='processing.php?action=minusOne&id=$index' class='btn btn-dark btn-sm'> - </a>"
                            .$product['quant'].
                            "<a href='processing.php?action=plusOne&id=$index' class='btn btn-dark btn-sm'>+</a></td>",
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
        
                echo '<a class="btn btn-danger" href="processing.php?action=clear"><i class="fa-regular fa-trash-can"></i>EMPTY</a>';
        }
        

        
        $title = "Recap";
        $content =ob_get_clean();
                
        require "template.php";
?>