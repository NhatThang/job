<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12">
                <h3 class="text-center color-content">ĐĂNG KÝ NHẬN TƯ VẤN</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php if(isset($_SESSION['inserted'])){echo "<div class='alert alert-success'>".$_SESSION['inserted']."</div>";}?>
                <?php if(isset($_SESSION['danger'])){echo "<div class='alert alert-danger'>".$_SESSION['danger']."</div>";}?>
                <form action="request/index3.php" method="POST">
                    <div class="form-group mb-1">
                        <input type="text" name="hovaten" id="" class="form-control info" placeholder="Họ và tên" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-1">
                        <input type="email" name="email" id="" class="form-control info" placeholder="Email" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-1">
                        <input type="text" name="sodienthoai" id="" class="form-control info" placeholder="Số điện thoại" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-1">
                        <input type="text" name="diachi" id="" class="form-control info" placeholder="Địa chỉ" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-1">
                        <select name="hinhthucvay" id="" class="form-control info">
                            <option value="">Hình thức vay</option>
                            <option value="Vay theo lương">Vay theo lương</option>
                            <option value="Vay theo Bảo hiểm nhân thọ">Vay theo Bảo hiểm nhân thọ</option>
                            <option value="Vay theo Đăng ký Kinh Doanh">Vay theo Đăng ký Kinh Doanh</option>
                            <option value="Vay theo hóa đơn">Vay theo hóa đơn</option>
                            <option value="Vay thế chấp">Vay thế chấp</option>
                        </select>
                    </div>
                    <div class="form-group mb-1">
                        <input type="number" name="sotienvay" id="" class="form-control info" placeholder="Số tiền vay" aria-describedby="helpId">
                    </div>
                    <div class="form-group mb-1">
                        <input type="text" name="congviec" id="" class="form-control info" placeholder="Công việc" aria-describedby="helpId">
                    </div>
                    <div class="btn-submit mt-3">
                        <button type="submit" name="submit">Gửi đi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
<?php session_destroy(); ?>
