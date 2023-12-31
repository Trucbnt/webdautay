<?php
require_once "./model/action.php";
$err = $maProduct =   "";
if (isset($_GET['error'])) {
    $err = $_GET['error'];
    $maProduct = $_GET['maProduct'];
}
connect();
$conn = connect();
tinhtrang($conn);
$tinhtrang = tinhtrang($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/media.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .wap__btnChiaTrang {
            margin: 20px auto;
            width: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-outline-dark {
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="app">
        <div class="header">
            <nav class="navbar">
                <ul class="navbar__list">
                    <li><a href="" class="navbar__item">Trang chủ</a></li>
                    <li><a href="" class="navbar__item">Bánh mì</a></li>
                    <li><a href="" class="navbar__item">Nước uống</a></li>
                    <li><a href="" class="navbar__item">Khuyến mãi</a></li>
                    <li><a href="" class="navbar__item">Liên hệ</a></li>
                </ul>
                <div class="navbar__account">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div class="navbar__account-user">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6v-Quj0rUbKfkYkO5xry7QsyV_3dNemjlbw&usqp=CAU" alt="" class="navbar__account-user--img">
                        <span class="navbar__account-user--name">Bùi Ngọc Trúc</span>
                        <div class="navbar__account--wrap">
                            <ul class="navbar__account--list">
                                <li><a href="" class="navbar__account--item">Thông tin tài khoản</a></li>
                                <li><a href="" class="navbar__account--item">Đơn hàng</a></li>
                                <li><a href="index.php" class="navbar__account--item">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header__cart-list ">
                        <h4 class="header__cart-heading">Sản Phẩm Đã Thêm</h4>
                        <ul class="header__cart-list-item">
                            <li class="header__cart-item">
                                <img src="img/sp1.png" alt="" class="header__cart-item-img">
                                <div class="header__cart-item-info">
                                    <div class="header__cart-item-head">
                                        <h5 class="header__cart-item-name"> Bánh mì pate giò đặc biệt </h5>
                                        <div class="header__cart-price-wrap">
                                            <span class="header__cart-item-price">25.000đ</span>
                                            <span class="header__cart-item-multiply">x</span>
                                            <span class="header__cart-item-quantity">1</span>
                                        </div>
                                    </div>
                                    <div class="header__cart-item-body">
                                        <span class="header__cart-description"> Phân loại : Bạc</span>
                                        <span class="header__cart-delete"> Xóa</span>
                                    </div>
                                </div>
                            </li>
                            <li class="header__cart-item">
                                <img src="img/sp2.png" alt="" class="header__cart-item-img">
                                <div class="header__cart-item-info">
                                    <div class="header__cart-item-head">
                                        <h5 class="header__cart-item-name"> Bánh mì bò hũ tiếu </h5>
                                        <div class="header__cart-price-wrap">
                                            <span class="header__cart-item-price">25.000đ</span>
                                            <span class="header__cart-item-multiply">x</span>
                                            <span class="header__cart-item-quantity">1</span>
                                        </div>
                                    </div>
                                    <div class="header__cart-item-body">
                                        <span class="header__cart-description"> Phân loại : vàng </span>
                                        <span class="header__cart-delete"> Xóa</span>
                                    </div>
                                </div>
                            </li>
                            <li class="header__cart-item">
                                <img src="img/sp3.png" alt="" class="header__cart-item-img">
                                <div class="header__cart-item-info">
                                    <div class="header__cart-item-head">
                                        <h5 class="header__cart-item-name"> Bánh mì pate giò đặc biệt </h5>
                                        <div class="header__cart-price-wrap">
                                            <span class="header__cart-item-price">25.000đ</span>
                                            <span class="header__cart-item-multiply">x</span>
                                            <span class="header__cart-item-quantity">1</span>
                                        </div>
                                    </div>
                                    <div class="header__cart-item-body">
                                        <span class="header__cart-description"> Phân loại : Bạc</span>
                                        <span class="header__cart-delete"> Xóa</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a class="header__cart-view-btn btn btn--primary">Xem giỏ hàng</a>
                    </div>
                </div>
            </nav>
            <div class="search">
                <form action="" class="search__form">
                    <input type="text" class="search__input" placeholder="  Tìm kiếm sản phẩm">
                    <button name="" class="search__btn"><i class="fa-solid fa-magnifying-glass search--icon"></i></button>
                </form>
            </div>
        </div>

        <canvas id="canvas" width="226" height="86" style="display: block; margin: 100px auto 15px auto; "></canvas>
            <img src="img/banner1.png" alt="" class="banner" id="banner">
        <div class="content">
            <h1 class="content__heading">Khuyến mãi tháng 8</h1>
            <div class="product">
                <?php foreach ($tinhtrang["product"] as  $product) : ?>
                    <section class="product__item">
                        <img src="./img/<?php echo $product['imgProduct'] ?>" alt="" class="product__img">
                        <span class="product__title"><?php echo $product['nameProduct'] ?></span>
                        <div class="product__price">
                            <span class="product__price--new"><?php echo $product['priceNew'] ?>đ</span>
                            <span class="product__price--old"><?php echo $product['priceOld'] ?>đ</span>
                        </div>
                        <button class="product--btn">Mua Ngay</button>
                        <div class="product__descript"><?php echo $product['descript'] ?></div>
                    </section>
                <?php endforeach; ?>
            </div>
            <div class="wap__btnChiaTrang">
                <?php for ($i = 1; $i <= $tinhtrang["totalPages"]; $i++) {
                    echo "<a href='?page={$i}' class=\"btn btn-outline-dark btn-ms\">{$i}</a> ";
                } ?>
            </div>
        </div>
        <?php include "./banner/footer.html" ?>
    </div>

</body>
<script>
    var canvas = document.getElementById("canvas");
    var content = canvas.getContext("2d");
    content.fillStyle = "#eead09"
    content.beginPath();
    content.ellipse(106 / 2, 86 / 2, 106 / 2, 86 / 2, 0, 0, 2 * Math.PI);
    content.fill();
    content.closePath();
    content.fillStyle = "#a55e06"
    content.beginPath();
    content.ellipse(106 + (226 - 106) / 2, 86 / 2, (226 - 106) / 2, 30, 0, 0, 2 * Math.PI);
    content.fill();
    content.closePath();
    content.fillStyle = "#fff"
    content.beginPath();
    content.font = "bold  26px test"
    content.fillText("Bánh mì", 15, 100 / 2)
    content.fill();
    content.closePath();
    content.fillStyle = "#fff"
    content.beginPath();
    content.font = "bold  26px test"
    content.fillText("VIỆT", 140, 100 / 2)
    content.fill();
    content.closePath();
</script>
<script src="js/main.js"></script>
<script>
    var banner = document.getElementById("banner");
    var index = 1;
    setInterval(function() {
        if (index > 3) {
            index = 1;
        }
        banner.src = `img/banner${index}.png`;
        index++;
    }, 2000);
</script>

</html>