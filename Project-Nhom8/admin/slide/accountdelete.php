<?php
include ("../class/account_class.php");

?>
<?php
$account= new account;
   if(!isset($_GET['id_user'])|| $_GET['id_user']==NULL){
    echo "<script>window.location='accountlist.php'</script";
   }else{
    $id_user = $_GET['id_user']; 
   }
   $delete_account= $account -> delete_account($id_user);
   
?>