<?php 
function connect(){
    try {
        $conn = new PDO("mysql:host=localhost;dbname=mydatabase", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // lấy trang đầu tiên 
        // Hiển thị danh sách sản phẩm
        return $conn;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// chia trang 
function tinhtrang($conn){
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $itemsPerPage = 5; // Số sản phẩm trên mỗi trang

    // Tính toán vị trí bắt đầu của sản phẩm trong cơ sở dữ liệu
    $startFrom = ($currentPage - 1) * $itemsPerPage;
    // Lấy tổng số sản phẩm
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM product");
    $stmt->execute();
    $totalItems = $stmt->fetch()['total'];

    // Lấy danh sách sản phẩm theo trang
    $query = "SELECT * FROM product LIMIT :startFrom, :itemsPerPage";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(":startFrom", $startFrom , PDO::PARAM_INT);
    $stmt->bindValue(":itemsPerPage",$itemsPerPage , PDO::PARAM_INT);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $products = $stmt->fetchAll();

    // Tính toán số trang
    $totalPages = ceil($totalItems / $itemsPerPage);
    return  ["product"=>$products ,"totalPages"=> $totalPages];
}

// lấy ra records có bản ghi trùng với maProduct để kiểm tra xem sản phẩm đã tồn tại chưa
function getDuplicateRecords($conn , $maProduct){
    $queryGet = "SELECT * FROM product WHERE maProduct = :maProduct";
    $stmt0 = $conn->prepare($queryGet);
    $stmt0->bindParam(":maProduct" , $maProduct);
    $stmt0->setFetchMode(PDO::FETCH_ASSOC);
    $stmt0->execute();
    $duplicateRecords = $stmt0->fetch();
    return $duplicateRecords;
}

// xem sản phẩm vào cơ sở dữ liệu
function addProduct($conn , $maProduct , $nameProduct ,  $imgProduct, $priceNew, $priceOld, $descript){
    $queryadd = "INSERT INTO product(maProduct,nameProduct,imgProduct,priceNew,priceOld,descript)
    VALUES(:maProduct , :nameProduct , :imgProduct ,:priceNew , :priceOld , :descript);";
   $stmt = $conn->prepare($queryadd);
   $stmt->bindParam(":maProduct", $maProduct);
   $stmt->bindParam(":nameProduct", $nameProduct);
   $stmt->bindParam(":imgProduct", $imgProduct);
   $stmt->bindParam(":priceNew", $priceNew);
   $stmt->bindParam(":priceOld", $priceOld);
   $stmt->bindParam(":descript", $descript);
   $stmt->execute();
}
function deleteProduct($conn , $maProduct){
    $queryDelete = "DELETE FROM product WHERE maProduct = :maProduct";
   $stmt = $conn->prepare($queryDelete);
   $stmt->bindParam(":maProduct", $maProduct);
   $stmt->execute();
   header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<?php
function editProduct($maProductCurrent ){
    $conn = connect();
    $query = "SELECT * FROM product WHERE maProduct = :maProductCurrent";
    $stmt =  $conn->prepare($query);
    $stmt->bindParam(":maProductCurrent", $maProductCurrent);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $product = $stmt->fetch();
    ?>
    <form action="../admin/admin.php?maProductCurrent=<?php echo $maProductCurrent ?>" method="POST" class="formUpload toast show " enctype="multipart/form-data" id="formEdit">
        <div class="toast-header mb-3">
            <strong class="me-auto">thêm sản phẩm </strong>
            <button style="float: right;" type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class=" mb-3">
            <label for="maProduct" class="form-label">Mã sản phẩm (int) :</label>
            <input type="number" class="form-control" id="maProduct" placeholder="nhập mã sản phẩm" name="maProduct" required="" value="<?php echo $product["maProduct"]  ?>">
        </div>
        <div class="mb-3">
            <label for="nameProduct" class="form-label">Tên Sản Phẩm :</label>
            <input type="text" class="form-control" id="nameProduct" placeholder="nhập tên sản phẩm" name="nameProduct" required="" value="<?php echo $product["nameProduct"]  ?>">
        </div>

        <div class="row mb-3">
            <div class=" col">
                <label for="priceNew" class="form-label">giá mới :</label>
                <input type="number" class="form-control" id="priceNew" placeholder="giá mới" name="priceNew" required="" value="<?php echo $product["priceNew"]  ?>">
            </div>
            <div class=" col">
                <label for="priceOld" class="form-label">giá cũ : </label>
                <input type="number" class="form-control" id="priceOld" placeholder="giá cũ" name="priceOld" required="" value="<?php echo $product["priceOld"]  ?>">
            </div>
        </div>
        <div class="mb-3">
            <label for="descript">Mô tả sản phẩm : </label>
            <textarea class="form-control" rows="3" id="descript" name="descript" required="" value="<?php echo $product["descript"]?>"></textarea>
        </div>
        <div class="mb-3">
            <label for="fieldImg" class="form-label">ảnh sản phẩm : </label> <br>
            <input type="file" name="fieldImg" id="fieldImg" required="">
        </div>
        <button type="submit" class="btn btn-primary" name="btnEditSubmit">Submit</button>
    </form>
    <?php 
}
?>
<?php
// xoa anh trong thu muc
function deleteImage($imgName) {
    // Kiểm tra xem tệp tồn tại hay không trước khi xóa
    $imgPath = '../img/' . $imgName;
    if (file_exists($imgPath)) {
        // Thực hiện xóa tệp
        if (unlink($imgPath)) {
            echo "Xóa ảnh thành công.";
        } else {
            echo "Không thể xóa ảnh.";
        }
    } else {
        echo "Không tìm thấy ảnh.";
    }
}

?>