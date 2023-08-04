<?php
require_once "../model/action.php";
$err = $maProduct =   "";
if (isset($_GET['error'])) {
    $err = $_GET['error'];
    $maProduct = $_GET['maProduct'];
}
$conn = connect();
tinhtrang($conn);
$tinhtrang = tinhtrang($conn);
if (isset($_GET['deleteProduct']) && isset($_GET['imgPath'])) {
    $maXoa = $_GET['deleteProduct'];
    $imgName = $_GET['imgPath'];
    $conn = connect();
    deleteImage($imgName);
    deleteProduct($conn, $maXoa);
}
if(isset($_GET['editProduct'])){
    editProduct($_GET['editProduct']);

}
$maProduct =$imgProduct=$priceNew = $peiceOld = $descript = $nameProduct ="";
if (isset($_POST['btnEditSubmit'])) {
    $maProduct = $_POST["maProduct"];
    $nameProduct = $_POST["nameProduct"];
    $imgProduct = $_FILES["fieldImg"]["name"];
    $priceNew = $_POST["priceNew"];
    $priceOld = $_POST["priceOld"];
    $descript = $_POST["descript"];
    $maProductCurrent = $_GET["maProductCurrent"];

    try {
        // Sử dụng Prepared Statements để tránh SQL Injection
        $queryUpdate = "UPDATE product 
                        SET 
                        maProduct = :maProduct,
                        nameProduct = :nameProduct,
                        imgProduct = :imgProduct,
                        priceNew = :priceNew,
                        priceOld = :priceOld,
                        descript = :descript
                        WHERE maProduct = :maProductCurrent";
        
        $stmt = $conn->prepare($queryUpdate);
        $stmt->bindParam(':maProduct', $maProduct);
        $stmt->bindParam(':nameProduct', $nameProduct);
        $stmt->bindParam(':imgProduct', $imgProduct);
        $stmt->bindParam(':priceNew', $priceNew);
        $stmt->bindParam(':priceOld', $priceOld);
        $stmt->bindParam(':descript', $descript);
        $stmt->bindParam(':maProductCurrent', $maProductCurrent);

        if ($stmt->execute()) {
            echo "Update successful.";
            header("Location: ".$_SERVER["PHP_SELF"]);
            exit();
        } else {
            echo "Update failed.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        img {
            width: 70px;
            height: 50px;
            object-fit: fill;
        }

        .formUpload {
            width: 500px;
            top: 100px;
            left: calc(50% - 250px);
            padding: 15px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px #2e2e2e;
            border-radius: 5px;
            position: absolute;
            z-index: 100;
            background-color: #fff;
        }

        .btn-primary {
            margin: 0 auto;
        }

        .btnAddproduct {
            margin: 20px auto;
            display: block;
            height: 40px;
            border: 1px solid #ccc;
        }

        .err-message {
            color: red;
        }

        .descript {
            width: 400px;
        }

        .btn.btn-outline-dark {
            margin: 0 5px;
        }

        /* .btnChiaTrang:hover{

        } */
        .wap__btnChiaTrang {
            margin: 20px auto;
            width: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .viewIndex {
            border: none;
            margin: 20px 10px;
        }
    </style>
</head>
<body>
    <button class="viewIndex btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> trang chủ </button>
    <table class="table">
        <thead>
            <tr>
                <th>code Product</th>
                <th>Img Product</th>
                <th>Name product</th>
                <th>Price Old</th>
                <th>Price New</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tinhtrang["product"] as $product) : ?>
                <tr>
                    <td><?php echo $product['maProduct'] ?></td>
                    <td><img src="../img/<?php echo $product['imgProduct'] ?>" alt=""></td>
                    <td><?php echo $product['nameProduct'] ?></td>
                    <td><?php echo $product['priceNew'] ?></td>
                    <td><?php echo $product['priceOld'] ?></td>
                    <td class="descript"><?php echo $product['descript'] ?></td>
                    <td>
                        <a href="?deleteProduct=<?php echo ($product['maProduct']."&imgPath=".$product['imgProduct']) ?>" class="btn btn-outline-danger">Xóa</a>
                        <a href="?editProduct=<?php echo $product['maProduct'] ?>" class="btn btn-outline-info btn--edit">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="wap__btnChiaTrang">
        <?php for ($i = 1; $i <= $tinhtrang["totalPages"]; $i++) {
            echo "<a href='?page={$i}' class=\"btn btn-outline-dark\">{$i}</a> ";
        } ?>
    </div>

    <button class="btnAddproduct btn  btn-primary">Thêm sản phẩm</button>
    <form action="../model/upload.php" method="POST" class="formUpload toast " enctype="multipart/form-data" id="formadd">
        <div class="toast-header mb-3">
            <strong class="me-auto">thêm sản phẩm </strong>
            <button style="float: right;" type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class=" mb-3">
            <label for="maProduct" class="form-label">Mã sản phẩm (int) :</label>
            <input type="number" class="form-control" id="maProduct" placeholder="nhập mã sản phẩm" name="maProduct" required="" value="<?php echo $maProduct ?>">
            <span class="err-message"><?php echo $err ?></span>
        </div>
        <div class="mb-3">
            <label for="nameProduct" class="form-label">Tên Sản Phẩm :</label>
            <input type="text" class="form-control" id="nameProduct" placeholder="nhập tên sản phẩm" name="nameProduct" required="">
        </div>

        <div class="row mb-3">
            <div class=" col">
                <label for="priceNew" class="form-label">giá mới :</label>
                <input type="number" class="form-control" id="priceNew" placeholder="giá mới" name="priceNew" required="">
            </div>
            <div class=" col">
                <label for="priceOld" class="form-label">giá cũ : </label>
                <input type="number" class="form-control" id="priceOld" placeholder="giá cũ" name="priceOld" required="">
            </div>
        </div>
        <div class="mb-3">
            <label for="descript">Mô tả sản phẩm : </label>
            <textarea class="form-control" rows="3" id="descript" name="descript" required=""></textarea>
        </div>
        <div class="mb-3">
            <label for="fieldImg" class="form-label">ảnh sản phẩm : </label> <br>
            <input type="file" name="fieldImg" id="fieldImg" required="">
        </div>
        <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
    </form>
</body>
<script>
    var btnadd = document.querySelector(".btnAddproduct");
    var form = document.getElementById("formadd");
    btnadd.addEventListener("click", function(e) {
        form.classList.add("show");
    })
    document.querySelector(".viewIndex").addEventListener("click", function(e) {
        window.location.href = "../index1.php";
    });
</script>

</html>