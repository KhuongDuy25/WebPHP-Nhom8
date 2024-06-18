<?php
include "../../database/database.php";

?>

<!-- hàm -->
<?php
  class account{
    private $db;
    public function __construct(){
        $this ->db= new Database();
    }
    public function insert_account($username,$password,$email,$role){
        $query= "INSERT INTO tbl_user (username,password,email,role) VALUE('$username','$password','$email','$role')";
        $result = $this ->db->insert( $query);
        return $result;
    }
    public function show_account(){
        $query= "SELECT * FROM tbl_user";
        $result = $this ->db->select( $query);
        return $result;
    }
    public function get_account($id_user){
        $query= "SELECT * FROM tbl_user WHERE id_user='$id_user'";
        $result = $this ->db->select( $query);
        return $result;
    }
    public function update_account($id_user,$username,$password,$email,$role){
        $query ="UPDATE tbl_user SET username='$username', password = '$password' , email = '$email' ,role='$role'  WHERE id_user='$id_user'";
        $result = $this ->db->update( $query);
        header('Location:accountlist.php');
        return $result;
    }
    public function delete_account($id_user){
        $query= "DELETE FROM tbl_user WHERE id_user='$id_user'";
        $result = $this ->db->delete( $query);
        header('Location:accountlist.php');
        return $result;
    }


  }

?>