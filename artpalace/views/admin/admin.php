<?php
if (isset($_SESSION['admin'])) {
    ?>

    <?php include "./layout/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bsgrid.min.css" />
    <link rel="stylesheet" href="./css/admin.min.css" />
    <link rel="stylesheet" href="./css/style.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 menu container-fluid">  
                <div class="menu_option container-fluid">
                    <div class="menu_option-head"><h1>P.ART</h1></div>
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
            <div class="col-md-9 container-fluid">

                <div class="row  content  dashboard">
                    <div class="dash col-lg-3 col-md-6 col-sm-6 container-fluid">
                        <div class="dashboard-box1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>  
                            <h5 >Total User's</h5>
                            <h4 style="color:white;">
                            <?php
                                    $sql="SELECT * from dangki";
                                    $result=$conn-> query($sql);
                                    $count=0;
                                    if ($result-> num_rows > 0){
                                        while ($row=$result-> fetch_assoc()) {
                                
                                            $count=$count+1;
                                        }
                                    }
                                    echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>
                    <div class="col-lg-3 dash col-md-6 col-sm-6 container-fluid">
                        <div class="dashboard-box2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                            </svg>
                            <h5>Catalogue</h5>
                            <h4 style="color:white;">
                            <?php
                                
                                $sql="SELECT * from danhmuc";
                                $result=$conn-> query($sql);
                                $count=0;
                                if ($result-> num_rows > 0){
                                    while ($row=$result-> fetch_assoc()) {
                            
                                        $count=$count+1;
                                    }
                                }
                                echo $count;
                            ?>
                            </h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 dash  container-fluid">
                        <div class="dashboard-box3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
                                <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5ZM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6z"/>
                                </svg>
                            <h5>Product</h5>
                            <h4 style="color:white;">
                            <?php
                                
                                $sql="SELECT * from sanpham";
                                $result=$conn-> query($sql);
                                $count=0;
                                if ($result-> num_rows > 0){
                                    while ($row=$result-> fetch_assoc()) {
                            
                                        $count=$count+1;
                                    }
                                }
                                echo $count;
                            ?>                        
                            </h4>
                        </div>
                    </div>
                    <div class="dash col-lg-3 col-md-6 col-sm-6 container-fluid">
                        <div class="dashboard-box4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                            </svg>
                            <h5>Total Order's</h5>
                            <h4 style="color:white;">
                            <?php
                            
                            $sql="SELECT * from dathang";
                            $result=$conn-> query($sql);// 
                            $count=0;
                            if ($result-> num_rows > 0){
                                while ($row=$result-> fetch_assoc()) {
                        
                                    $count=$count+1;
                                }
                            }
                            echo $count;
                            ?>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="list">
                    <div class="table1">
                        <div class=" tableheader">
                            <p>Product Details</p>
                            <div>
                                <button onclick="window.location.href='index.php?page=add_product'" class="addnew">+Add New</button>
                            </div>
                        </div>
                        <div class="tablesection">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        global $s;
                                        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
                                        $current_page = !empty($_GET['pageitem']) ? $_GET['pageitem'] : 1; //Trang hiện tại
                                    
                                        $offset = ($current_page - 1) * $item_per_page;
                                        $products = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY id_sanpham DESC  LIMIT ".$item_per_page." OFFSET ".$offset);
                                        $totalRecords = mysqli_query($conn, "SELECT * FROM sanpham");
                                        $totalRecords = $totalRecords -> num_rows;
                                        $totalPages = ceil($totalRecords / $item_per_page);

                                        while($valueAll = mysqli_fetch_array($products)){
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $valueAll['tensp'] ?></td>
                                        </td>
                                        <td>
                                            <img style="margin-left:85px;" src="<?php echo $valueAll['anhsp'] ?>"; height="100px;" alt="">
                                        </td>
                                        <td>
                                            <?php echo number_format($valueAll['giasp']); ?>
                                        </td>
                                        <td>
                                            <div style="display: inline-block;" class="action">
                                        <a href="index.php?page=edit_product&id=<?php echo $valueAll['id_sanpham']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                </svg>
                                        </a>

                                        <a href="index.php?page=delete_product&id=<?php echo $valueAll['id_sanpham']; ?>" class="td_delete" onclick="return confirm('Confirm delete operation?')"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                                </svg>       
                                        </a>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                            <?php 
                                ?> 
                                    <ul class="pagination justify-content-center">
                                        <?php
                                        $param = "page=admin&";

                                            if ($current_page > 3) {
                                                $first_page = 1;
                                                ?>
                                                <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $first_page ?>">First</a></li>
                                                <?php
                                            }
                                            if ($current_page > 1) {
                                                $prev_page = $current_page - 1;
                                                ?>
                                                <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $prev_page ?>">Previous</a></li>
                                            <?php 
                                            }
                                            ?>

                                            <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
                                                <?php if ($num != $current_page) { ?>
                                                    <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                                                        <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $num ?>"><?= $num ?></a></li>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <li class="page-item active"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $num ?>"><?= $num ?></a></li>
                                                <?php } ?>
                                            <?php } ?>

                                            <?php
                                            if ($current_page < $totalPages - 1) {
                                                $next_page = $current_page + 1;
                                                ?>
                                                <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $next_page ?>">Next</a></li>
                                            <?php
                                            }
                                            if ($current_page < $totalPages - 3) {
                                                $end_page = $totalPages;
                                                ?>
                                                <li class="page-item"><a class="page-link" href="?<?=$param?>per_page=<?= $item_per_page ?>&pageitem=<?= $end_page ?>">Last</a></li>
                                                <?php
                                            }
                                        ?> 
                                    </ul>
                                <?php
                            ?>

    </div>

</body>
</html>
                    <?php
}

?>
