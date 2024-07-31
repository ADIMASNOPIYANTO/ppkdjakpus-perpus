<?php

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}
if (isset($_POST['simpan'])){ 
    // jika param edit ada maka updet, selain itu maka tambah
    $id = isset($_GET['edit']) ? $_GET['edit'] : '';

    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = sha1( $_POST['password']);

    if (!$id) {
        $insert = mysqli_query($koneksi, "INSERT INTO user (nama_lengkap, email,password) VALUES ('$nama_lengkap','$email','$password')");
        header("location:?pg=user&edit=berhasil");
    }else{
        $update = mysqli_query($koneksi, "UPDATE user SET nama_lengkap ='$nama_lengkap', email = '$email', password = '$password' WHERE id = '$id'");
        header("location:?pg=user&edit=berhasil");
    }


    header("location:?pg=user&tambah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id = '$id'");
    header("location:?pg=user&hapus=bershasil");
}
?>
<div class="contine mt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Data User</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="m-3">
                            <label for="" class="form-label">Nama lengkap</label>
                            <input value="<?php echo ($rowEdit['nama_lengkap']) ?? ''?>" type="text" class="form-control" name="nama_lengkap">
                        </div>
                        <div class="m-3">
                            <label for="" class="form-label">Email</label>
                            <input value="<?php echo ($rowEdit['nama_lengkap']) ?? ''?>" type="text" class="form-control" name="email">
                        </div>
                        <div class="m-3">
                            <label for="" class="form-label">Password</label>
                            <input value="<?php echo ($rowEdit['password']) ?? ''?>" type="text" class="form-control" name="password">
                        </div>
                        <div class="m-3">
                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>