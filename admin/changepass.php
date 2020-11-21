<?php session_start();
    require_once '../DB/Connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Change Password</title>

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Thay đổi mật khẩu</h1>
                                    </div>
                                    <form class="user" method="post" action="../middleware/changePass.php">
                                        <div class="form-group">
                                            <input type="text" name="matkhau" required class="form-control form-control-user" id="exampleInputEmail" placeholder="Nhập mật khẩu cũ...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="matkhaumoi" required class="form-control form-control-user" id="exampleInputEmail" placeholder="Nhập mật khẩu mới...">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="changepass">
                                            Thay đổi
                                        </button>
                                    </form>
                                    <hr>
                                    <?php if(isset($_SESSION['changesuccess'])){echo "<script>alert('Bạn đã thay đổi thành công');</script>";}?>
                                    <?php if(isset($_SESSION['changefailed'])){echo "<script>alert('Mật khẩu cũ không chính xác');</script>";}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin/js/sb-admin-2.min.js"></script>

</body>

</html>
<?php 
    if(isset($_SESSION['changesuccess']) || isset($_SESSION['changefailed'])){session_destroy();}
?>