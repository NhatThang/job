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
        $sanphamquantam = isset($_POST['sanphamquantam']) ? check_character($_POST['sanphamquantam']) : "";
        $sotienvay = isset($_POST['sotienvay']) ? check_character($_POST['sotienvay']) : "";
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
            $_SESSION['danger'] = "Vui lòng nhập dữ liệu";
            redirect('../index.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }

?>