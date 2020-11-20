<?php 
session_start();
require_once '../DB/Connect.php';
require_once '../helper/helper.php';
    try {
        $hovaten = isset($_POST["hovaten"]) ? $_POST["hovaten"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $sodienthoai = isset($_POST["sodienthoai"]) ? $_POST["sodienthoai"] : "";
        $diachi = isset($_POST["diachi"]) ? $_POST["diachi"] : "";
        $hinhthucvay = isset($_POST["hinhthucvay"]) ? $_POST["hinhthucvay"] : "";
        $sotienvay = isset($_POST["sotienvay"]) ? $_POST["sotienvay"] : "";
        $congviec = isset($_POST["congviec"]) ? $_POST["congviec"] : "";
        $sanphamquantam = isset($_POST["sanphamquantam"]) ? $_POST["sanphamquantam"] : "";
        $trangthai = isset($_POST["trangthai"]) ? $_POST["trangthai"] : "";
        $id = isset($_POST["idEdit"]) ? $_POST["idEdit"] : "";
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