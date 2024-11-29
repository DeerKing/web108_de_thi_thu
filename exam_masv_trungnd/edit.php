<?php 
session_start();
$id = $_GET['id'];
$nhan_vien_sua = $_SESSION['arr_nhan_vien'][$id];
//Xử lý form
if(isset($_POST['edit'])){
    $name = htmlspecialchars($_POST['name']);
    $dpartment = htmlspecialchars($_POST['dpartment']);
    $position = htmlspecialchars($_POST['position']);
    $email = htmlspecialchars($_POST['email']);
    $dob = $_POST['dob'];
    
    $nhan_vien_sua = [
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
    //Kiểm tra xem file image có khác ''
    if($file['image'] != ''){
        //Kiểm tra file upload có phải là hình ảnh hay không
        if(getimagesize($file['tmp_name'])){
            $image_name = time().$file['name'];
            $nhan_vien_sua['image'] = $image_name;
            move_uploaded_file($file['tmp_name'], $path.$image_name);
        }
    }
    //Lưu nhân viên mới vào session
    $_SESSION['arr_nhan_vien'][$id] = $nhan_vien_sua;
    header("Location: index.php");//Chuyển về trang index.php
}
?>
<!doctype html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>Sửa nhân viên</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <table >
            <tr>
                <td>name</td>
                <td><input type="text" name="name" id="name" value="<?php echo $nhan_vien_sua['name']?>"></td>
            </tr>
            <tr>
                <td>dpartment</td>
                <td><input type="text" name="dpartment" id="dpartment" value="<?php echo $nhan_vien_sua['dpartment']?>"></td>
            </tr>
            <tr>
                <td>position</td>
                <td><input type="text" name="position" id="position" value="<?php echo $nhan_vien_sua['position']?>"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email" id="email" value="<?php echo $nhan_vien_sua['email']?>"></td>
            </tr>
            <tr>
                <td>dob</td>
                <td><input type="date" name="dob" id="dob" value="<?php echo $nhan_vien_sua['dob']?>"></td>
            </tr>
            <tr>
                <td>image</td>
                <td><input type="file" name="image" id="image"></td>
            </tr>
        </table>
        <button type="submit" name="edit">Lưu</button>
    </form>
</body>