

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link rel="stylesheet" href="../css/css/stylehome.css">
    <link rel="icon" href="../css/img/logo (2).jpg">
    <link rel="stylesheet" href="../css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/icon/fontawesome-free-6.4.0-web/css/all.css">
<style>
   .phanhoi h1{
        margin: 0 150px;
        font-weight: 500;
    }
    .name{
        display: flex;
        align-items: center;
        justify-content: center;
    }
   .phanhoi form{
        
        margin-top: 30px;
        margin-left: 150px;
        display: flex;
        flex-direction: column;
    }
    .lienhe{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .phanhoi{
        flex: 1;
    }
    #map{
        flex: 1;
      
    }
    /* .map img{
        width: 700px;
    } */
   .phanhoi input{
        border: 1px solid #c4c2c2;
        border-radius: 3px;
        height: 35px;
        margin: 20px;
    }
   .phanhoi textarea{
    
        margin: 20px;
    }
   .phanhoi label{
        font-size: 20px;
    }
   .phanhoi button{
        height: 35px;
        width: 100px;
        background-color: red;
        color: aliceblue;
        border: none;
    }
  .phanhoi  button:hover{
        cursor: pointer;
    }
    
</style>

</head>
<body>
<?php 
include "./header.php";
?>
<div class="lienhe">
    <div class="phanhoi">
    <h1>Phản hồi</h1>
    <form action="" method="post">
        <div class="name">
            <input name="firstname" required type="text" placeholder="Nhập tên">
            <input name="lastname" required type="text" placeholder="Nhập họ">
        </div>
        <input name="email" required type="email" placeholder="Nhập email">
        <input name="phone" required type="text" placeholder="Nhập số điện thoại">
        <input name="subject_name" type="text" placeholder="Nhập chủ đề">
        <label  for="">Nội dung <span style="color: red;">*</span></label>
        <textarea required name="note" id="" cols="30" rows="10"></textarea>
        <button type="submit" name="submit">PHẢN HỒI</button>
    </form>
    </div>
    <div id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.039313450939!2d105.77247841477826!3d20.988870335423142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134558b71a5dd47%3A0x499ae1ec08c853e3!2sP.%20Nguy%E1%BB%85n%20Tr%C3%A1c%2C%20Y%C3%AAn%20Ngh%C4%A9a%2C%20H%C3%A0%20%C4%90%C3%B4ng%2C%20H%C3%A0%20N%E1%BB%99i%2C%20Vi%E1%BB%87t%20Nam!5e0!3m2!1sen!2s!4v1644562291259!5m2!1sen!2s" 
width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
</div>
<?php 
include "./footer.php";
?>
</body>
</html>

<?php
//   include("../database/database.php");
  $db= mysqli_connect("localhost","root","","the_coffee");
  if($_SERVER['REQUEST_METHOD']==='POST'){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $subject_name=$_POST['subject_name'];
    $note=$_POST['note'];
    $sql= "INSERT INTO tbl_feedback (firstname, lastname, email , phone,subject_name, note) VALUE ('$firstname','$lastname','$email','$phone','$subject_name','$note')";
    mysqli_query($db,$sql);
  }
?>


<!-- script -->

<!-- <script src="http://maps.google.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.js"></script>
<script>
var map = new GMaps({
    el: '#map',
    lat:  40.730610,
    lng: -73.935242
});

map.addMarker({
    lat: 40.700610,
    lng: -73.997242,
    title: 'New York'
});

map.setZoom(8);
</script> -->