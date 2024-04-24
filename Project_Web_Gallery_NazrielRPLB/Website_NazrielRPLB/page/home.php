<div class="container my-4 p-5 bg-hero rounded">
    <div class="py-5 text-white">
        <p class="display-5 fw-bold">Gallery Foto</p>
        <p class="fs-3 col-md-10">Gallery Foto ini dibuat oleh Nazriel Ramdhani siswa SMK ANGKASA LANUD HUSEIN SASTRANEGARA BANDUNG</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php
        $tampil = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID");
        foreach ($tampil as $tampils) :
        ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card" style="border-radius: 10px; margin-bottom: 30px;">
                    <img src="uploads/<?= $tampils['LokasiFile'] ?>" class="object-fit-cover" style="border-top-left-radius: 10px;
                     border-top-right-radius: 10px; aspect-ratio: 16/9;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $tampils['JudulFoto'] ?></h5>
                        <p class="card-text text-muted">by: <?= $tampils['Username'] ?></p>
                        <a href="?url=detail&&id=<?= $tampils['FotoID'] ?>" class="btn btn-primary">Detail</a>
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <a href="?url=edit&&IDFoto=<?= $tampils['FotoID'] ?>" class="btn btn-success">Edit</a>
                            <a href="#" onclick="return confirmDelete(<?= $tampils['FotoID'] ?>)" class="btn btn-danger">Hapus</a>
                            <script>
                                function confirmDelete(id) {
                                    var result = confirm("Apakah anda yakin ingin menghapus foto dengan ID <?= $tampils['FotoID'] ?>?");
                                    if (result) {
                                        window.location.href = "?url=hapus&&id=" + id;
                                    }
                                    return false;
                                }
                            </script>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    function confirmDelete(id) {
        var result = confirm("Apakah anda yakin ingin menghapus foto dengan ID <?= $tampils['FotoID'] ?>?");
        if (result) {
            window.location.href = "?url=hapus&&id=" + id;
        }
        return false;
    }
</script>