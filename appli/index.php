<!DOCTYPE html>
<html lang='eng'>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Product adding</title>
    </head>
    <body>
        <nav>
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"> 
                MENU 
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php">Add new product</a></li>
                <li><a class="dropdown-item" href="recap.php">Recap</a></li>
            </ul>
        </nav>
        <h1 class ="text-center">Add a new product</h1>
        <form action="processing.php" method="post" class ="text-center"> <!--form action gives target file when form submitted
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>