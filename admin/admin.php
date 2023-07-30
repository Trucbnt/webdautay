<?php
$err = $maProduct =   "";
if (isset($_GET['error'])) {
    $err = $_GET['error'];
    $maProduct = $_GET['maProduct'];
}
try {
    $conn = new PDO("mysql:host=localhost;dbname=mydatabase", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM product";
    $stmt =  $conn->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $products =  $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>

<body>
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
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['maProduct'] ?></td>
                    <td><img src="../img/<?php echo $product['imgProduct'] ?>" alt=""></td>
                    <td><?php echo $product['nameProduct'] ?></td>
                    <td><?php echo $product['priceNew'] ?></td>
                    <td><?php echo $product['priceOld'] ?></td>
                    <td class="descript"><?php echo $product['descript'] ?></td>
                    <td><button class="btn btn-outline-primary">thêm</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</script>

</html>