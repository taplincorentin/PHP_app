<!DOCTYPE html>
<html lang='eng'>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <title><?= $title ?></title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
            <a class="navbar-brand"></a>
            <div class="container-fluid">
            <ul class='navbar-nav'>
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa-solid fa-cart-plus" style="font-size:25px;"></i>ADD</a></li>
                <li class="nav-item"><a class="nav-link" href="recap.php"><i class="fa-solid fa-cart-shopping" style="font-size:25px;"></i>CART</a></li>
            </ul>
            </div>
        </nav>



        <?= $content ?>


        <?php
            
             //checking if there are any products before showing how many there are
            if (!empty($_SESSION['products'])){
                echo "<p class='text-end'>Number of different products : ".count($_SESSION['products'])."</p>";
                echo "<div class='alert alert-info'><strong>Last action: </strong>".$_SESSION['message']."</div>";
            } else {
                echo "<p class='text-end'>Number of different products : 0</p>";
            } 
            
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>