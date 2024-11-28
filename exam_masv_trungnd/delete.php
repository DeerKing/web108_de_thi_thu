<?
session_start();
$id = $_GET['id'];
if($id >= 0){
    unset($_SESSION['arr_nhan_vien'][$id]);
    header("Location: index.php");//Chuyển về trang index.php
}
?>