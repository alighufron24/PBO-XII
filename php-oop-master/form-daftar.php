<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Template/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-daftar-image{
            background: url("https://images.unsplash.com/photo-1540206395-68808572332f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=562&q=80");
            background-position: center;
            background-size: cover;
        }
    </style>

    <?php
            include ('mylib/myDb.php');
        ?>

        <?php
            $Db = new MyDb();
            //print_r($data_warga);
            if(isset($_POST['daftar'])){
                //echo "Tombol Daftar Telah Di klik";
                $noktp=$_POST['no_ktp'];
                $nama = $_POST['nama_lengkap'];
                $alamat = $_POST['alamat_lengkap'];
                $nohp = $_POST['no_hp'];
                $querysimpan = $Db->add_data($noktp,$nama,$alamat,$nohp);
                //print_r($_POST);
                if($querysimpan == TRUE){
                    echo "<script>
                            alert('Berhasil tersimpan');
                            document.location.href = 'index.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Gagal tersimpan');
                            document.location.href = 'index.php';
                        </script>";
                }
            }
        ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-daftar-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-5 "><b>Form Tambah Data Warga</b></h1>
                            </div>
                            <form action="" method="POST" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="no_ktp" name="no_ktp"
                                        placeholder="Nomor KTP">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap"
                                        placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="alamat_lengkap" name="alamat_lengkap" placeholder="Alamat Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Nomor HP">                                    
                                </div>
                                    <button type="submit" name="daftar" class="col-sm-12 btn btn-primary mt-5 btn-user btn-block">
                                        Tambahkan Data
                                    </button>
                                    <a href="index.php" class="col-sm-12 btn btn-dark btn-user btn-block">
                                        Kembali
                                    </a>
                                    <hr>
                            </form>
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; <a href="https://www.instagram.com/a.ghuf">Ali Ghufron</a> 2020</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="Template/vendor/jquery/jquery.min.js"></script>
    <script src="Template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="Template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="Template/js/sb-admin-2.min.js"></script>

</body>

</html>