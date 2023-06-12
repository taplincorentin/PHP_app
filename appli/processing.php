<?php
    session_start();
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;
    if(isset($_POST['submit'])){
        
        //filter_input() validates or "cleans" transmitted variables  if filter fails it returns false or null
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $quant = filter_input(INPUT_POST, "quant", FILTER_VALIDATE_INT);
        $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $tmpName = $_FILES['file']['tmp_name'];
        $fName = $_FILES['file']['name'];  //get file name for extension
        
        
        //get extension, store and rename uniquely the attached picture
        $tabExtension = explode('.', $fName);            //cut $name variable at every dot
        $extension = strtolower(end($tabExtension));    //end() gets last element
        $fileName  = uniqid("", true).'.'.$extension;                  //making unique name for the file
        move_uploaded_file($tmpName, './pictures/'.$fileName);

        //checking there are no null or false value after filter
        if($name && $price && $quant){

            $product = [
                "name" => $name,
                "price" => $price,
                "quant" => $quant,
                "total" => $price*$quant,
                "fileName" => $fileName,
                "text" => $text
            ];

            $_SESSION['products'][] = $product;
            $_SESSION['message'] = $name." added to cart";
        }
        else {
            $_SESSION['message'] = "! Wrong input ! Not added to cart";
        }
        header("Location: recap.php");
    }

    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "delete":
                if(isset($id) && isset($_SESSION['products'][$id])){
                    $name1=$_SESSION['products'][$id]['name'];
                    $filePath='./pictures/'.$_SESSION['products'][$id]['fileName'];
                    
                    unlink($filePath);
                    unset($_SESSION['products'][$id]);      
                    
                    $_SESSION['message'] = $name1." removed from cart";                    
                    header("Location: recap.php");
                    die();
                }

            case "clear":
                unset($_SESSION['products']);
                $_SESSION['message'] = "Cart emptied";

                //empty picture folder
                $pictures = glob('./pictures/*');
                foreach($pictures as $picture){
                    unlink($picture);
                }

                header("Location:index.php");
                die();
            
            case "plusOne":
                $name1=$_SESSION['products'][$id]['name'];
                $_SESSION['products'][$id]['quant']++;
                //calc new total
                $_SESSION['products'][$id]['total']+=$_SESSION['products'][$id]['price'];
                
                $_SESSION['message'] = "plus one ".$name1;
                
                header("Location: recap.php");
                die();
                
            case "minusOne":
                if($_SESSION['products'][$id]['quant']==1){
                    $name1=$_SESSION['products'][$id]['name'];
                    $filePath='./pictures/'.$_SESSION['products'][$id]['fileName'];
                    unlink($filePath);
                    unset($_SESSION['products'][$id]);
                    $_SESSION['message'] = $name1." removed from cart";
                    header("Location: recap.php");
                    die();
                }
                else {
                    $name1=$_SESSION['products'][$id]['name'];
                    $_SESSION['products'][$id]['quant']--;
                    $_SESSION['products'][$id]['total']-=$_SESSION['products'][$id]['price'];
                    
                    $_SESSION['message'] = "minus one ".$name1;
                    
                    header("Location: recap.php");
                    die();
                }
        }
    }
    

    
?>