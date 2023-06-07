<?php
    session_start();
?>

<!DOCTYPE html>
<html lang='eng'>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        
        <title>Products recap</title>
</head>
<body class="border border-primary border-4">
    <div>    
        <nav>
        <button class="text-primary btn dropdown-toggle" type="button" data-bs-toggle="dropdown"> 
            MENU 
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-primary" href="index.php">Add new product</a></li>
            <li><a class="dropdown-item text-primary" href="recap.php">Recap</a></li>
        </ul>
    </nav>
    
        <button class='btn text-primary'><a href='processing.php?action=clear'>Empty</a></button>
    </div>
    <h1 class ="text-center text-primary">RECAP</h1>
    <?php 
        //if 'products' key doesn't exist or null, display message
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p class='text-primary text-center'>Nothing has been added</p>";
        }
        else{
            echo "<table class='table text-primary text-center'>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Name</th>",
                            "<th>Price</th>",
                            "<th>Quantity</th>",
                            "<th>Total</th>",
                            "<th>Delete</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";

            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td>".$index."</th>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>".$product['quant']."</td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><button name ='button".$index."'type='button' class='btn btn-primary btn-sm' ><a href='processing.php?action=delete".$index."'></a></button></td>",
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
        

        //checking if there are any products before showing how many there are
        if (!empty($_SESSION['products'])){
            echo "<p class='text-end text-primary'>Number of different products : ".count($_SESSION['products'])."</p>";
        } else {
            echo "<p class='text-end text-primary'>Number of different products : 0</p>";
        }

        
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>