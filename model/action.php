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
    $itemsPerPage = 4; // Số sản phẩm trên mỗi trang

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
}
?>