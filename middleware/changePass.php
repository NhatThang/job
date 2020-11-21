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
        $matkhau = isset($_POST['matkhau']) ? check_character(($_POST['matkhau'])) : "";
        $matkhaumoi = isset($_POST['matkhaumoi']) ? check_character(md5(($_POST['matkhaumoi']))) : "";
        $md5mk = md5($matkhau);
        if(isset($_POST['matkhau']) && isset($_POST['matkhaumoi'])){
            $sql = "SELECT * FROM user WHERE password = '$md5mk'";
            $pre = $conn->prepare($sql);
            $pre->execute();
            $count = $pre->fetchColumn();
            if($count > 0){
                echo 'so count'. $count;
                $sql2 = "UPDATE user SET password = '$matkhaumoi' WHERE id = 18";
                $pre2 = $conn->prepare($sql2);
                $pre2->execute();
                if($pre2){
                    $_SESSION['changesuccess'] = 'Bạn đã thay đổi thành công';
                    redirect('../admin/changepass.php');
                }
            }else{
                $_SESSION['changefailed'] = 'Mật khẩu cũ không chính xác';
                redirect('../admin/changepass.php');
            }
        }
    } catch (PDOException $e) {
        echo "Failed: ".$e->getMessage();
    }
    
?>