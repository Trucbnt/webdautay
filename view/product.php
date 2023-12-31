<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/media.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="app">
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
                <a href="login.php" class="navbar__account--login">Đăng nhập</a>
            </div>
            <div class="header__cart-list ">
                <h4 class="header__cart-heading">Sản Phẩm Đã Thêm</h4>
                <ul class="header__cart-list-item">
                    <li class="header__cart-item">
                        <img src="../img/sp1.png" alt="" class="header__cart-item-img">
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
                        <img src="../img/sp2.png" alt="" class="header__cart-item-img">
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
                        <img src="../img/sp3.png" alt="" class="header__cart-item-img">
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
        </nav>
        <canvas id="canvas" width="226" height="86" style="display: block; margin: 15px auto; "></canvas>
        <header class="header">
            <img src="../img/banner.png" alt="" class="banner">
        </header>
        <div class="content">
            <h1 class="content__heading">Khuyến mãi tháng 8</h1>
            <div class="product">
                <section class="product__item">
                    <img src="../img/sp1.png" alt="" class="product__img">
                    <span class="product__title">Bánh mì pate giò đặc biệt</span>
                    <div class="product__price">
                        <span class="product__price--new">25.000đ</span>
                        <span class="product__price--old">35.000đ</span>
                    </div>
                    <button class="product--btn">Mua Ngay</button>
                </section>
                <section class="product__item">
                    <img src="../img/sp2.png" alt="" class="product__img">
                    <span class="product__title">Bánh mì bò hũ tiếu</span>
                    <div class="product__price">
                        <span class="product__price--new">25.000đ</span>
                        <span class="product__price--old">35.000đ</span>
                    </div>
                    <button class="product--btn">Mua Ngay</button>
                </section>
                <section class="product__item">
                    <img src="../img/sp3.png" alt="" class="product__img">
                    <span class="product__title">Bánh mì xá xíu đặc biệt</span>
                    <div class="product__price">
                        <span class="product__price--new">25.000đ</span>
                        <span class="product__price--old">35.000đ</span>
                    </div>
                    <button class="product--btn">Mua Ngay</button>
                </section>
                <section class="product__item">
                    <img src="../img/sp1.png" alt="" class="product__img">
                    <span class="product__title">Bánh mì pate giò đặc biệt</span>
                    <div class="product__price">
                        <span class="product__price--new">25.000đ</span>
                        <span class="product__price--old">35.000đ</span>
                    </div>
                    <button class="product--btn">Mua Ngay</button>
                </section>
            </div>
        </div>
       <?php include "../banner/footer.html" ?>

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

</html>