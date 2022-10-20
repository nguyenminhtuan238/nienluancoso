<?php
try{
    $host='mysql:host=localhost;dbname=bandothethao';
    $username="root";
    $password="1900561";
    $conn = new PDO($host,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("ket noi that bai". $e->getMessage());
}

?>