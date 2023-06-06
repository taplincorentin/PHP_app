<!DOCTYPE html>
<html lang='eng'>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Product adding</title>
    </head>
    <body>

        <h1>Add a new product</h1>
        <form action="processing.php" method="post">
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
                <input type='submit' name='submit' value="Add the product">
            </p>
        </form>

    </body>
</html>