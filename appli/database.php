<?php
    try{
        $db = new PDO('mysql:host=localhost;dbname=picture_fruits', 'root');
    } 
    catch(PDOException $e){
        die('Database error : '.$e->getMessage());
    }
?>