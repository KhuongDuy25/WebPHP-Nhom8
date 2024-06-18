<?php
include "../../database/database.php";

?>


<?php
class product{
    private $db;
    public function __construct(){
        $this ->db= new Database();
    }

    public function show_category(){
        $query= "SELECT * FROM tbl_category ORDER BY category_id ASC";
        $result = $this ->db->select( $query);
        return $result;
    }
    public function insert_product(){
        $product_name=$_POST['product_name'];
        $category_id=$_POST['category_id'];
        $product_price=$_POST['product_price'];
        $product_img=$_POST['product_img'];
        // $product_img=$_FILES['product_img']['name'];
        // $uploadDir_img_logo = "upload/";

        // $file_tmp = isset($_FILES['product_img']['tmp_name']) ? $_FILES['product_img']['tmp_name'] : ""; 
        // $file_name = isset($_FILES['product_img']['name']) ? $_FILES['product_img']['name'] : ""; 

        // // $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s"); ///Lay gio cua he thong
        // $file__name__=$file_name;
        // move_uploaded_file( $file_tmp, $uploadDir_img_logo.$file__name__);
        // // move_uploaded_file($_FILES['product_img']['tmp_name'],"upload/".$_FILES['product_img']['name']);
        $query= "INSERT INTO tbl_product (product_name,cartegory_id,product_img,product_price) 
        VALUE('$product_name','$category_id','$product_img','$product_price')";
        $result = $this ->db->insert( $query);
        header('Location:productlist.php');
        return $result;
    }
    public function show_product(){
    
        $query= "SELECT * FROM tbl_product";
        $result = $this ->db->select( $query);
        return $result;
    }
    public function get_product($product_id){
        $query= "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this ->db->select( $query);
        return $result;
    }
    public function update_product($product_name,$category_id,$product_img,$product_price){
        $query ="UPDATE tbl_product SET  cartegory_id = '$category_id',product_img= '$product_img' product_price = '$product_price'  WHERE product_name = '$product_name' ";
        $result = $this ->db->update( $query);
        header('Location:productlist.php');
        return $result;
    }
    public function delete_product($product_id){
        $query= "DELETE FROM tbl_product WHERE product_id='$product_id'";
        $result = $this ->db->delete( $query);
        header('Location:productlist.php');
        return $result;
    }

}
?>