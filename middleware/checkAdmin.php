<?php session_start();
    require_once '../DB/Connect.php';
    require_once '../helper/helper.php';
    
    try {
        function check_character($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $taikhoan = isset($_POST['taikhoan']) ? check_character(($_POST['taikhoan'])) : "";
        $matkhau = isset($_POST['matkhau']) ? check_character(($_POST['matkhau'])) : "";
        $md5mk = md5($matkhau);
        if(isset($_POST['taikhoan']) && isset($_POST['matkhau'])){

            $sql = "SELECT * FROM user WHERE taikhoan = :taikhoan AND password = :matkhau AND roles='admin'";
            $pre = $conn->prepare($sql);
            $pre->bindParam(':taikhoan', $taikhoan, PDO::PARAM_STR);
            $pre->bindParam(':matkhau', $md5mk, PDO::PARAM_STR);
            $pre->execute();
            $count = $pre->fetchColumn();
            if($count > 0){
                $_SESSION['admin'] = 'admin';
                redirect("../admin/index.php");
            }else{
                $_SESSION['failedLg'] = 'Tài khoản hoặc mật khẩu không chính xác';
                redirect('../index.php');
                exit();
            }
        }
    } catch (PDOException $e) {
        echo "Failed ".$e->getMessage();
    }
    
?>