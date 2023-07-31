<?php
require_once "action.php";
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fieldImg"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["btnSubmit"])) {
    $check = getimagesize($_FILES["fieldImg"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "file của bạn không phải 1 ảnh";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "ảnh đã tồn tại";
    $uploadOk = 0;
}

// Check file size
// 500000 byte = 500 kb
if ($_FILES["fieldImg"]["size"] > 500000) {
    echo "thất bại , kích thước ảnh quá lớn";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "chỉ chấp nhận ảnh jpg  , png , jpeg , gif";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "xin lỗi không thế upload";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fieldImg"]["tmp_name"], $target_file)) {
        $maProduct = $imgProduct =  $nameProduct = $priceNew = $priceOld  = $descript = "";
        if (isset($_POST["maProduct"]) && isset($_POST["nameProduct"]) && isset($_POST["priceOld"]) && isset($_POST["priceNew"]) && isset($_POST["descript"])) {
            $maProduct = $_POST["maProduct"];
            $nameProduct = $_POST["nameProduct"];
            $priceNew = $_POST["priceNew"];
            $priceOld = $_POST["priceOld"];
            $descript = $_POST["descript"];
            $imgProduct = $_FILES["fieldImg"]["name"];
            connect();
            $conn = connect();
            $result = getDuplicateRecords($conn , $maProduct);
            if($result){
                header("Location: ../admin/admin.php?error=mã sản phẩm đã tồn tại&maProduct=".$maProduct);
                exit();
            }else{
                addProduct($conn , $maProduct , $nameProduct ,  $imgProduct, $priceNew, $priceOld, $descript);
                header("Location: ../admin/admin.php");
                exit();
            }
        }
    } else {
        echo "xin lỗi tải ảnh thất bại";
    }
}
?>