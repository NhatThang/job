<?php 
    require_once '../DB/Connect.php';
    require_once '../helper/helper.php';
    session_start();
    $idDelete = isset($_GET['idDelete']) ? $_GET['idDelete'] : "";
    try {
        $sql = "DELETE FROM user WHERE id = :id";
        $pre = $conn->prepare($sql);
        $pre->bindParam(':id', $idDelete, PDO::PARAM_INT);
        $pre->execute();
        if($pre){
            $_SESSION['deleted'] = 'Xóa thành công';
            redirect('tables.php');
            exit();
        // echo "xoa thanh cong";
        }
    } catch (PDOException $e) {
        echo "Failed ".$e->getMessage();
    }
?>