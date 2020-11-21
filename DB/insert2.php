<?php 
    session_start();
    require_once 'Connect.php';
    require_once '../helper/helper.php';

    try {
        function check_character($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $hovaten = isset($_POST['hovaten']) ? check_character($_POST['hovaten']) : "";
        $email = isset($_POST['email']) ? check_character($_POST['email']) : "";
        $sodienthoai = isset($_POST['sodienthoai']) ? check_character($_POST['sodienthoai']) : "";
        $diachi = isset($_POST['diachi']) ? check_character($_POST['diachi']) : "";
        $hinhthucvay = isset($_POST['hinhthucvay']) ? check_character($_POST['hinhthucvay']) : "";
        $sotienvay = isset($_POST['sotienvay']) ? check_character($_POST['sotienvay']) : "";
        $congviec = isset($_POST['congviec']) ? check_character($_POST['congviec']) : "";
        $submit = isset($_POST['submit']) ? check_character($_POST['submit']) : "";

        $sql = "INSERT INTO user(hovaten, email, sodienthoai, diachi, hinhthucvay, sotienvay, congviec, trangthai) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $pre = $conn->prepare($sql);
        $data = array($hovaten, $email, $sodienthoai, $diachi, $hinhthucvay, $sotienvay, $congviec, 'chưa xem');
        if(!empty($hovaten) && !empty($email) && !empty($sodienthoai) && !empty($diachi) && !empty($hinhthucvay) && !empty($sotienvay) && !empty($congviec)){
            $pre->execute($data);
            $_SESSION['inserted'] = "Bạn đã gửi thành công";
            redirect('../form2.php');
            exit();
        }else{
            // echo "Vui Long nhap du lieu";
            $_SESSION['danger'] = "Vui lòng nhập dữ liệu";
            redirect('../form2.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }

?>