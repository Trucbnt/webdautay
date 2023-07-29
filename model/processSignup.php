<?php
$acc = $pass = "";
if (isset($_POST["account"]) && isset($_POST["password"])) {
    $acc = $_POST["account"];
    $pass = $_POST["password"];
    try {
        $conn = new PDO("mysql:host=localhost;dbname=mydatabase", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $getQuery =  "SELECT * FROM INFOACCOUNT WHERE account  = :account";
   
        $stmt =  $conn->prepare($getQuery);
        $stmt->bindParam(':account' , $acc);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result =  $stmt->fetch();
        if (!$result) { 
            $addQuery = "INSERT INTO INFOACCOUNT(account , password) VALUES(:account ,:password )";
            $stmt =  $conn->prepare($addQuery);
            $stmt->bindParam(":account", $acc);
            $stmt->bindParam(":password", $pass);
            $stmt->execute();
            echo "success";
            header("Location: ../banner/layoutsuccess.html");
            exit();
        }else{
            $messErr = "Account already exists";
            header("Location: ../view/signup.php?account=$acc&password=$pass&messErr=$messErr");
            exit();
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
