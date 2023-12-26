<?php
    if(isset($_POST['upload'])){

        $name = $_POST['name'];
        $price = $_POST['price'];
        $mota = $_POST['content'];
        $idcata = $_POST['categori'];
        $imgage_name = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $folder = "./upload/" .$imgage_name;
        move_uploaded_file($tmp_name, $folder);

        $sql = "INSERT INTO sanpham (tensp, anhsp, giasp, mota, id_danhmuc)
        VALUES ('$name', '$folder', '$price', '$mota', '$idcata')";
    
        if(mysqli_query($conn, $sql)){
            header("Location: index.php?page=admin");
        }
        else{
            echo "Lưu thất bại";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/bsgrid.min.css" />
    <link rel="stylesheet" href="./css/admin.min.css" />
</head>
<body>

    <div class="with70">
        <div class="row">
            <div class="col-md-3">
                <div class="menu_option">
                    <div class="menu_option-head">Menu</div>
                    <ul>
                        <li><a href="index.php?page=admin">Trang chủ</a></li>
                        <li class="active-bg"><a href="#">Thêm sản phẩm</a></li>
                        <li><a href="index.php?page=manage_order">Quản lý đơn hàng</a></li>
                        <li><a href="./index.php">Thoát</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="menu_option-head2">Thêm sản phẩm</div>
                <form action="" method="POST" class="list" style="padding-left: 10px;" enctype="multipart/form-data">
    
                    <div class="wrap-field">
                        <label>Tên sản phẩm</label>
                        <div class="right-wrap-field">
                            <input type="text" name="name" required>
                        </div>
                    </div>
    
                    <div class="wrap-field">
                        <label>Ảnh sản phẩm</label>
                        <div class="right-wrap-field">
                            <input type="file" name="img" onchange="readURL(this);" required>
                            <img src="" alt="" id="preImg" style="max-width: 300px;"/><br>
                        </div>

                    </div>
    
                    <div class="wrap-field">
                        <label>Giá</label>
                        <div class="right-wrap-field">
                            <input type="text" name="price" required>
                        </div>
                    </div>
    
                    <div class="wrap-field">
                        <label>Danh mục</label>
                        <div class="right-wrap-field">
                            <select name="categori" id="">
                                <option value="1" selected>1 - Sản phẩm cho chó</option>
                                <option value="2">2 - Sản phẩm cho mèo</option>
                                <option value="3">3 - Tất cả sản phẩm</option>
                                <option value="4">4 - Con giống</option>
                                <option value="5">5 - Nổi bật</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="wrap-field2">
                        <label>Mô tả</label>
                        <div class="right-wrap-field2">
                            <textarea name="content" id="product-content" required></textarea>
                            <div class="save">
                                <button type="submit" name="upload">Lưu</button>
                                <a href="index.php?page=admin" class="cancel">Hủy</a>
                            </div>
                        </div>
                    </div>
    
                </form>
    
                <!-- pagination -->
                
            </div>
        </div>
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preImg').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

    <script src="./script/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>
</html>