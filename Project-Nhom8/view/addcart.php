<?php 
ob_start();
include "../view/header.php";

if(isset($_SESSION['id_user'])){
    $idUser = $_SESSION['id_user'];
}else{
    header("location:../index.php");
}

if($_GET['product_id']){
    $idsp = $_GET['product_id'];

    $queryy="SELECT * FROM tbl_product WHERE product_id = '$idsp'";
    $resultt =mysqli_query($db,$queryy);
    $row=mysqli_fetch_assoc($resultt);

    $tenSanPham = $row['product_name'];
    $anhSanPham = $row['product_img'];
    $price = $row['product_price'];
}

?>

<style>
    h1{
        font-weight: 500;
        margin: 30px;
        font-size: 30px;
        margin-left: 100px;
    }
    .cart{
        /* margin: 30px 150px; */
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

    }
    .soluong1 >input{
        width: 40px;
        height: 30px;
        text-align: center;
        /* border-top: 3px solid #b2b2b2;
        border-bottom: 3px solid #b2b2b2;
        border-left: none;
        border-right: none;
        margin-top: -2px; */
    }
    .soluong1 > button{
        /* background-color: #b2b2b2; */
        width: 40px;
        border: #b2b2b2 solid 1px;
        

        }
        .soluong1 > button:hover{
            background-color: #b2b2b2;
        }
    .soluong1{
        display: flex;
        margin: 5px 20px;
       
    }
    td img{
        width: 100px;
        height: 100px;
    }
    .giohang >a button{
        border: 1px solid #b2b2b2;
        width: 150px;
        height: 30px;
        background-color: red;
        margin-left: 150px;
        color: aliceblue;
    }
     button:hover{
        cursor: pointer;
    }
    table{
    width: 80%;
    text-align: center;
    margin-top: 20px;
    margin: 30px 150px;

    
}
table td >input{
    width: 50px;
}
button{
    background-color: red;
    color: aliceblue;
    width: 150px;
    height: 50px;
    border: none;
    margin-left: 150px;
}
table tr th,td{
    border: 3px solid #b2b2b2;
}
table{
    border-collapse: collapse;
}


  </style>

<form action="" method="post">
        <table>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Số lượng</th>
                </tr>
                    <?php 

                        echo "
                        <tr>


                        <td>$tenSanPham</td>
                        <td>
                        <img  class='img__oder' src='$anhSanPham' alt=''>
                        </td>
                        <td><input type='number' name='number' value='1' id=''></td>
                        
                        </tr>
                        ";
                    ?>
                <tr>

                </tr>
                
            </table>
            <button type="submit" name="add">Thêm vào giỏ hàng</button>
        </form>


<?php 
if(isset($_POST['add'])){
    $number = $_POST['number'];

    // có 2 th 1 
    //th1 là chưa có sản phẩm này thì cứ vc thêm
    //th2 là đã có sp thì lại chia ra 2 th 
                    //th1 kiểm tra xem nếu mà cx size đã chọn thì cộng thêm vào số lượng
                    //th2 nếu khác size thì vẫn tạo thêm như bthg

    $queryy="SELECT * FROM tbl_order_details WHERE product_id = '$idsp' AND id_user= '$idUser' ";
    $resultt =mysqli_query($db,$queryy);
                
    if($row=mysqli_fetch_assoc($resultt)){
        $numberkiemtra = $row['num'];
        $number+=$numberkiemtra;
    
        $query = ("UPDATE tbl_order_details SET num='$number',price='$price' WHERE product_id ='$idsp' ");
        $resultt =mysqli_query($db,$query);

        if(isset($_GET['idn'])){
            $idn = $_GET['idn'];
            $data->select("SELECT * FROM nhomsanpham WHERE idNhom ='$idn' ");
            $row= $data->fech();
            $tenNhom= $row['tenNhom'];
            header("location:$tenNhom.php?idn=$idn");
    
        }else{
            header("location:product.php");
        }
    }else{

    $query= "INSERT INTO tbl_order_details(product_id,price,num,id_user) Value('$idsp','$price',' $number','$idUser') ";
    $resultt =mysqli_query($db,$query);


    if(isset($_GET['idn'])){
        $idn = $_GET['idn'];
        $data->select("SELECT * FROM nhomsanpham WHERE idNhom ='$idn' ");
        $row= $data->fech();
        $tenNhom= $row['tenNhom'];
        header("location:$tenNhom.php?idn=$idn");

    }else{
        header("location:../view/product.php");
    }
    }
}
ob_end_flush();

?>