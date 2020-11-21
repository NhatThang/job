<?php 
session_start();
require_once '../DB/Connect.php';
require_once '../helper/helper.php';
    try {
        function check_character($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $hovaten = isset($_POST["hovaten"]) ? check_character($_POST["hovaten"]) : "";
        $email = isset($_POST["email"]) ? check_character($_POST["email"]) : "";
        $sodienthoai = isset($_POST["sodienthoai"]) ? check_character($_POST["sodienthoai"]) : "";
        $diachi = isset($_POST["diachi"]) ? check_character($_POST["diachi"]) : "";
        $hinhthucvay = isset($_POST["hinhthucvay"]) ? check_character($_POST["hinhthucvay"]) : "";
        $sotienvay = isset($_POST["sotienvay"]) ? check_character($_POST["sotienvay"]) : "";
        $congviec = isset($_POST["congviec"]) ? check_character($_POST["congviec"]) : "";
        $sanphamquantam = isset($_POST["sanphamquantam"]) ? check_character($_POST["sanphamquantam"]) : "";
        $trangthai = isset($_POST["trangthai"]) ? $_POST["trangthai"] : "";
        $id = isset($_POST["idEdit"]) ? check_character($_POST["idEdit"]) : "";
        $sql = "UPDATE user SET hovaten='$hovaten', email='$email', sodienthoai='$sodienthoai', diachi='$diachi',
                                hinhthucvay='$hinhthucvay', sotienvay='$sotienvay', congviec='$congviec', sanphamquantam='$sanphamquantam',
                                trangthai='$trangthai' WHERE id=:id";
        $pre = $conn->prepare($sql);
        $pre->bindParam(':id', $id, PDO::PARAM_INT);
        $pre->execute();
        if($pre == TRUE){
            $_SESSION['updated'] = 'Bạn đã update thành công';
            redirect("edit.php?idEdit=$id");
            exit();
        }
    } catch (PDOException $e) {
        echo "Failed ".$e->getMessage();
    }

?>