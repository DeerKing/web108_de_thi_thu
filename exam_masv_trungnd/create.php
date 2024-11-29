<?php 
session_start();
if(isset($_SESSION['arr_nhan_vien'])){
    $arr_nhan_vien = $_SESSION['arr_nhan_vien'];
}else 
    $arr_nhan_vien = [];
$id = count($arr_nhan_vien) + 1;//Đếm mảng trong session để lấy $id mới
// print_r($_SESSION['arr_nhan_vien']);
//Xử lý form
if(isset($_POST['save'])){
    $name = htmlspecialchars($_POST['name']);
    $dpartment = htmlspecialchars($_POST['dpartment']);
    $position = htmlspecialchars($_POST['position']);
    $email = htmlspecialchars($_POST['email']);
    $dob = $_POST['dob'];
    
    $new_nhan_vien = [
        'id' => $id,
        'name' => $name,
        'dpartment' => $dpartment,
        'position' => $position,
        'email' => $email,
        'dob' => $dob,
        'image' => ''
    ];
    //Xử lý upload
    
    $file = $_FILES['image'];
    // print_r($file);die();
    $path = 'uploads/';
    if($file['image'] != ''){
        //Kiểm tra file upload có phải là hình ảnh hay không
        if(getimagesize($file['tmp_name'])){
            $image_name = time().$file['name'];
            $new_nhan_vien['image'] = $image_name;
            move_uploaded_file($file['tmp_name'], $path.$image_name);
        }
    }
    //Lưu nhân viên mới vào session
    $_SESSION['arr_nhan_vien'][$id] = $new_nhan_vien;
    header("Location: index.php");//Chuyển về trang index.php
}
?>
<!doctype html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>Thêm nhân viên</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <table >
            <tr>
                <td>name</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>dpartment</td>
                <td><input type="text" name="dpartment" id="dpartment"></td>
            </tr>
            <tr>
                <td>position</td>
                <td><input type="text" name="position" id="position"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>dob</td>
                <td><input type="date" name="dob" id="dob"></td>
            </tr>
            <tr>
                <td>image</td>
                <td><input type="file" name="image" id="image"></td>
            </tr>
        </table>
        <button type="submit" name="save">Lưu</button>
    </form>
</body>