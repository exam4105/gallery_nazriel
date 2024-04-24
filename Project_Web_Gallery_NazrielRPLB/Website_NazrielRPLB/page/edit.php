<div class="container">
    <div class="row" style="justify-content: center;">
        <div class="col-5">
            <div class="card" style="margin-top:40px;">
                <div class="card-body">
                    <h4>Halaman Upload</h4>
                    <?php
                    $submit = @$_POST['update'];
                    if ($submit == 'Update') {
                        $IDFoto = @$_POST['FotoID'];
                        $judul_foto = @$_POST['judul_foto'];
                        $deskripsi_foto = @$_POST['deskripsi_foto'];
                        $nama_file = @$_FILES["namafile"]["name"];
                        $tmp_foto = @$_FILES['namafile']['tmp_name'];
                        $tanggal = date('Y-m-d');
                        $album_id = @$_POST['album_id'];
                        $user_id = @$_SESSION['user_id'];
                        if (move_uploaded_file($tmp_foto, 'uploads/' . $nama_file)) {
                            $insert = mysqli_query($conn, "UPDATE foto SET JudulFoto = '$judul_foto', DeskripsiFoto = '$deskripsi_foto', LokasiFile = '$nama_file' WHERE FotoID = '$IDFoto' ");
                            echo 'Gambar Berhasil Tersimpan';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=home">';
                        } else {
                            echo 'Gambar Gagal Disimpan';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                        }
                    }
                    $album = mysqli_query($conn, "SELECT * FROM album ");
                    $IDFoto = $_GET['IDFoto'];
                    $foto = mysqli_query($conn, "SELECT * FROM foto WHERE FotoID = '$IDFoto' ");
                    $DataFoto = mysqli_fetch_array($foto);

                    ?>
                    <form action="?url=edit&IDFoto=<?php echo $IDFoto; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Foto</label>
                            <input type="hidden" class="form-control" value="<?php echo $DataFoto['FotoID']; ?>" required name="FotoID">
                            <input type="text" class="form-control" value="<?php echo $DataFoto['JudulFoto']; ?>" name="judul_foto">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Foto</label>
                            <textarea name="deskripsi_foto" class="form-control" cols="30" rows="5"><?php echo $DataFoto['DeskripsiFoto']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Pilih Gambar </label>
                            <img src="uploads/<?php echo $DataFoto['LokasiFile']; ?>" alt="" style="margin-top: 20px; height: 100px; width: 150px; margin-left: 50px; border-radius: 20px;">
                            <input type="file" name="namafile" class="form-control" style="margin-top: 20px ;">
                            <small class="text-danger">File harus berupa: *.jpg, *.png *.gif</small>
                        </div>
                        <input type="submit" value="Update" name="update" class="btn btn-primary my-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>