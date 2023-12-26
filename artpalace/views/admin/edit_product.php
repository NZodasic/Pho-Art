<?php 
    if(isset($_POST['update']) && isset($_GET['id'])){

        $name = $_POST['name'];
        $price = $_POST['price'];
        $mota = $_POST['content'];
        $idcata = $_POST['categori'];

        $id = $_GET['id'];

        $sql_up = "SELECT * FROM sanpham WHERE id_sanpham = $id";
        $queryup = mysqli_query($conn, $sql_up);
        $row_up = mysqli_fetch_assoc($queryup);

        if($_FILES['img']['name'] == ''){ //neu ko tai len anh
            $imgage_name = $row_up['anhsp'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $folder = $imgage_name;
            move_uploaded_file($tmp_name, $folder);

        }else{ //up anh len thi cap nhap
            $imgage_name = $_FILES['img']['name'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $folder = "./upload/" .$imgage_name;
            move_uploaded_file($tmp_name, $folder);
        }


        $sql = "UPDATE `sanpham` SET `tensp` = '$name', `anhsp` = '$folder', `giasp` = '$price', `mota` = '$mota', `id_danhmuc` = '$idcata' WHERE `id_sanpham` = '$id'";
        if(mysqli_query($conn, $sql)){
            header("Location: index.php?page=admin");
        }
        else{
            echo "Sửa thất bại";
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
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                            </svg>
                            <a href="index.php?page=admin">Mainpage</a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/>
                              </svg>
                            <a href="index.php?page=add_product">Add Product</a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-list-ul" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                              </svg>
                            <a href="index.php?page=manage_order">Manage Your Order</a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
                              </svg>
                            <a href="index.php?page=thongke">Dashboard</a></li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                              </svg>
                            <a href="./index.php">Exit</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="menu_option-head2">Modify product</div>
                <form action="" method="POST" class="list" style="padding-left: 10px;" enctype="multipart/form-data">
            <?php
                $products = getID();
                foreach($products as $keyFind => $valueFind){

                    ?>
                        <div class="wrap-field">
                            <label>Product's name</label>
                            <div class="right-wrap-field">
                                <input type="text" name="name" value="<?php echo $valueFind['tensp']; ?>">
                            </div>
                        </div>
        
                        <div class="wrap-field">
                            <label>Product's image</label>
                            <div class="right-wrap-field">
                                <input type="file" name="img" onchange="readURL(this);" value="<?php echo $valueFind['anhsp']; ?>">
                                <img src="<?php echo $valueFind['anhsp']; ?>" alt="" id="preImg" style="max-width: 300px;"/><br>
                            </div>

                        </div>
        
                        <div class="wrap-field">
                            <label>Price</label>
                            <div class="right-wrap-field">
                                <input type="text" name="price" value="<?php echo $valueFind['giasp']; ?>">
                            </div>
                        </div>
        
                        <div class="wrap-field">
                            <label>category</label>
                            <div class="right-wrap-field">
                                <select name="categori" id="">
                                    <option value="<?php echo $valueFind['id_danhmuc']; ?>"><?php echo $valueFind['id_danhmuc']; ?></option>
                                    <option value="1">1 - Sản phẩm cho chó</option>
                                    <option value="2">2 - Sản phẩm cho mèo</option>
                                    <option value="3">3 - Tất cả sản phẩm</option>
                                    <option value="4">4 - Con giống</option>
                                    <option value="5">5 - Nổi bật</option>
                                </select>
                            </div>
                        </div>

                        <div class="wrap-field2">
                            <label>Description</label>
                            <div class="right-wrap-field2">
                                <textarea name="content" id="product-content"><?php echo $valueFind['mota']; ?></textarea>
                                <div class="save">
                                    <button type="submit" name="update">Lưu</button>
                                    <a href="index.php?page=admin" class="cancel">Hủy</a>
                                </div>
                            </div>
                        </div>

                        

                    <?php
                }
            ?>
    
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