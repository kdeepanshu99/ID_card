<?php
require_once __DIR__ . '/composer/vendor/autoload.php';


if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    if(is_numeric($_POST['phone'])){
      if(strlen($_POST['phone']) == 10) {
        $phone = $_POST['phone'];
      }
      else {
        echo "<script type='text/javascript'>
              alert('Please check the number again.');
              window.location.href='./index.php';
            </script>";
      die;
    }
    }
    else {
      echo "<script type='text/javascript'>
              alert('Please enter numbers only');
              window.location.href='./index.php';
            </script>";
      die;
    }

//    FOR IMAGE
    $file_name = $_FILES['img']['name'];
    $file_type = $_FILES['img']['type'];
    $temp_name = $_FILES['img']['tmp_name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $image = explode('/', $file_type);
    if($image[0] == 'image') {
      if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
        move_uploaded_file($temp_name, 'images/' . $file_name);
      }
      else {
        echo "Sorry! Only JPG, JPEG and PNG files are allowed";
      }
    }
    else {
      echo "<script type='text/javascript'>
              alert('Please select the image file only.');
              window.location.href='./index.php';
            </script>";
      die;
    }

    $mpdf = new \Mpdf\Mpdf();
    $html= "<head>
                <title>ID CARD</title>
                <link href='css/style2.css' rel='stylesheet' type='text/css'>
            </head>
            <body>
            <div class='container'>
                <img src='images/$file_name' width='180' height='220'>
                <hr>
                <h2>$name</h2>
                <p>Email: <span style='color:blue;'>$name</span></p>
                <p>Phone: <span>$phone</span></p>
            </div>
            </body>";
    $mpdf->WriteHTML($html);
    $mpdf->Output();
}


?>
