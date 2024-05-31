
<html>

    <form  method="post" enctype="multipart/form-data">
        ===>> <input type="file" name ="upload"><br><br>
        <input type="submit" name="submit" value="Upload">
     
    </form>
    <?php 

        if(isset($_POST['submit'])){
            if($_FILES['upload']['error'] > 0){
                echo "<br> Có lỗi xảy ra trong qua trình Upload!";
            }
            else{
                move_uploaded_file($_FILES['upload']['tmp_name'],
                '../upload/' .$_FILES['upload']['name'] );
                echo"Upload dữ liệu lên server thành công";
                echo"<pre>";
                print_r($_FILES['upload']);
                echo "<pre>";
                $file_path = '../upload/' . $_FILES['upload']['name'];
                $upload_date = date("Y-m-d H:i:s", filemtime($file_path));
                echo "Ngày tải lên: $upload_date";

               
                $st = '../upload/' . $_FILES['upload']['name'];
                echo"<br><br> <a href='$st'> Download </a>";
            }
        }
    ?>
    
</html> 