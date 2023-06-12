<?php
require 'database.php';
if(isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    $tabExtension = explode('.', $name); //cut $name variable at every dot
    $extension = strtolower(end($tabExtension)); //end() gets last element 
    
    $authorisezExt = ['jpg', 'jpeg', 'png','gif']; //array of authorisez file extension
    $maxSize = 400000;

    if(in_array($extension, $authorisezExt) && $size<=$maxSize && $error==0){ //checking that extension is in array of authorised extensions
        $uniqueName  = uniqid("", true);
        $fileName = $uniqueName.'.'.$extension;
        
        move_uploaded_file($tmpName, './upload/'.$fileName);

        $req = $db->prepare('INSERT INTO file (name) VALUES (?)');
        $req->execute([$fileName]);

        echo "saved picture";
    }
    else{
        echo "wrong extension, size or error";
    }
    
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form action="file_upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>
    <h2>Pictures</h2>
    <?php
        $req = $db->query('SELECT name from file'); //get name from file
        while($data = $req->fetch()){
            echo '<img src="./upload/'.$data['name'].'"width="200px"><br>'; 
        }    
    ?>
</body>
</html>