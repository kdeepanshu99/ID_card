<?php
require_once __DIR__ . '/composer/vendor/autoload.php';


if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

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
      echo "Please select the image file only.";
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
