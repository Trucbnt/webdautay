<?php
    $account =  $pass ="";
    if(isset($_POST["account"]) && isset($_POST["password"])){
        $account = $_POST["account"];
        $pass = $_POST["password"];
        if($account =="admin" && $pass=="123456"){
            setcookie("admin","200",time()+200 , "/");
            header("Location: ../admin/admin.php");
            exit();
        }
        try{
            $conn = new PDO("mysql:host=localhost;dbname=mydatabase", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE  , PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM INFOACCOUNT WHERE account = :account AND password = :password";
            $stmt =  $conn->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindParam(":account", $account);
            $stmt->bindParam(":password", $pass);
            $stmt->execute();
            $record =  $stmt->fetch(); 
            if($record){
                header("Location:  ../index1.php");
                exit();
            }else{
                $err = "thông tin mật khẩu tài khoản không chính xác ";
                header("Location: ../view/login.php?error=$err");
                exit();
            }
        }catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }
?>