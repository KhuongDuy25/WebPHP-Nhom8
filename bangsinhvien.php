<html>
<style>
        table {
            width: 600px;
            background-color: blue;
            color: white;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: center; 
        }

    </style>

<table >
        <th>MSSV</th>
        <th>Họ và tên</th>
        <th>Kỳ</th>
        <th>Môn học</th>
        <th>Mã Môn học</th>


    <?php

        $link = new mysqli('localhost','root','','test');
        mysqli_query($link,'SET NAMES UTF8');
        
        $query="SELECT sinhvien.MSSV, sinhvien.hoten,dangky.ky,monhoc.TenMH,monhoc.MaMH
        FROM sinhvien
        LEFT JOIN dangky ON sinhvien.MSSV = dangky.MSSV
        right JOIN monhoc ON dangky.MaMH = monhoc.MaMH";
        $result=mysqli_query($link,$query);
        if(mysqli_num_rows($result)){
            $i=0;
            while($row=mysqli_fetch_array($result)){
                $i++;
                $mssv = $row['MSSV'];
                $hoten = $row['hoten'];
                $ky = $row['ky'];
                $monhoc = $row['TenMH'];
                $Ma = $row['MaMH'];
                
                echo"
                    <tr>
                        <td>$mssv</td>
                        <td>$hoten</td>
                        <td>$ky</td>
                        <td>$monhoc</td>
                        <td>$Ma</td>
                
                    </tr>           
            ";

            }
        }
    ?>
        </table>
        <br>
        <br>
        <br>
       
        
<form method="post">
        Họ và tên: <input type="text" name="hoten"><br><br>
        MSSV: <input type="text" name="MSSV"><br><br>
        Kỳ học đăng ký:<input type="text" name="ky"><br><br>
        Môn đăng kí:<input type="text" name="TenMH"><br><br>
        Mã môn học:<input type="text" name="MaMH"><br><br>
        <input type="submit" value="Nhập" name="insert">
       </form>
       


<?php
$link = new mysqli('localhost', 'root', '', 'test');
mysqli_query($link, 'SET NAMES UTF8');

if (isset($_POST['insert']) && $_POST['hoten'] != '' && $_POST['MSSV'] != '' && $_POST['ky'] != '' && $_POST['TenMH'] != '') {
    $hoten = $_POST['hoten'];
    $mssv = $_POST['MSSV'];
    $ky = $_POST['ky'];
    $monhoc = $_POST['TenMH'];
    $Ma = $_POST['MaMH'];

    $check_query = "SELECT COUNT(*) as count FROM sinhvien WHERE mssv = '$mssv'";
    $check_result = mysqli_query($link, $check_query);
    $row = mysqli_fetch_assoc($check_result);
    $count = $row['count'];

    if ($count == 0) {
        $query1 = "INSERT INTO sinhvien (hoten, mssv) VALUES ('$hoten', '$mssv')";
        $query2 = "INSERT INTO dangky (MSSV, ky, MaMH) VALUES ('$mssv', '$ky', '$Ma')";
        $query3 = "INSERT INTO monhoc (MaMH, TenMH) VALUES ('$Ma', '$monhoc')";

        $result1 = mysqli_query($link, $query1);
        $result2 = mysqli_query($link, $query2);
        $result3 = mysqli_query($link, $query3);

        if ($result1 && $result2 && $result3) {
            echo "Dữ liệu đã được chèn thành công.";
        } else {
            echo "Đã xảy ra lỗi khi chèn dữ liệu: " . mysqli_error($link);
        }
    } else {
        echo "MSSV đã tồn tại trong bảng sinhvien.";
    }
}
?>


</html>