<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form karyawan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Form Karyawan</h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_karyawan"])) {
                    // memeriksa ketika load file ini
                    // apakah membawa data GET dg nama "id_karyawan"
                    // jika true, maka form karyawan digunakan utk edit

                    # mengakses data karyawan dari id_karyawan yg dikirim
                    include "connection.php";
                    $id_karyawan = $_GET["id_karyawan"];
                    $sql = "select * from karyawan where id_karyawan='$id_karyawan'";
                    # eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $karyawan = mysqli_fetch_array($hasil);
                    ?>

                <form action="process-karyawan.php" method="post">
                    ID
                    <input type="text" name="id_karyawan"
                    class="form-control mb-2" required
                    value="<?=$karyawan["id_karyawan"] ?>" readonly>

                    Nama 
                    <input type="text" name="nama_karyawan"
                    class="form-control mb-2" required
                    value="<?=$karyawan["nama_karyawan"] ?>">

                    Alamat 
                    <input type="text" name="alamat"
                    class="form-control mb-2" required
                    value="<?=$karyawan["alamat"] ?>">

                    Nomor Telepon
                    <input type="text" name="no_hp"
                    class="form-control mb-2" required
                    value="<?=$karyawan["no_hp"] ?>">

                    <button type="submit" class="btn btn-primary btn-block"
                    name="simpan_karyawan" onclick="return confirm('Apakah anda yakin?')">
                        Save
                    </button>
                </form>

                    <?php
                }else {
                    // jika false, maka form karyawan digunakan utk insert
                    ?>

                <form action="process-karyawan.php" method="post">
                    ID 
                    <input type="text" name="id_karyawan"
                    class="form-control mb-2" required>

                    Nama
                    <input type="text" name="nama_karyawan"
                    class="form-control mb-2" required>

                    Alamat 
                    <input type="text" name="alamat"
                    class="form-control mb-2" required>

                    Nomor Telepon
                    <input type="text" name="no_hp"
                    class="form-control mb-2" required>

                    <button type="submit" class="btn btn-primary btn-block"
                    name="simpan_karyawan" onclick="return confirm('Apakah anda yakin?')">
                        Save
                    </button>
                </form>

                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>