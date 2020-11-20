<?php 
    session_start();
    require_once 'Connect.php';
    require_once '../helper/helper.php';

    try {
        $hovaten = isset($_POST['hovaten']) ? $_POST['hovaten'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $sodienthoai = isset($_POST['sodienthoai']) ? $_POST['sodienthoai'] : "";
        $sanphamquantam = isset($_POST['sanphamquantam']) ? $_POST['sanphamquantam'] : "";
        $sotienvay = isset($_POST['sotienvay']) ? $_POST['sotienvay'] : "";
        $submit = isset($_POST['submit']) ? $_POST['submit'] : "";

        $sql = "INSERT INTO user(hovaten, email, sodienthoai, sanphamquantam, sotienvay, trangthai) VALUES (?, ?, ?, ?, ?, ?)";
        $pre = $conn->prepare($sql);
        $data = array($hovaten, $email, $sodienthoai, $sanphamquantam, $sotienvay, 'chưa xem');
        if(!empty($hovaten) && !empty($email) && !empty($sodienthoai) && !empty($sanphamquantam) && !empty($sotienvay)){
            $pre->execute($data);
            $_SESSION['inserted'] = "Bạn đã gửi thành công";
            redirect('../index.php');
            exit();
        }else{
            // echo "Vui Long nhap du lieu";
            $_SESSION['danger'] = "Vui lòng nhập dữ liệu";
            redirect('../index.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }

?>