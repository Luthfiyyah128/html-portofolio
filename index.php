<?php

    //panggil koneksi Database
    include "koneksi.php";

?>
<!doctype html>
<html lang="en">


  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - PHP & MySQL + Modal Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>

      <div class="container">

      <div class="mt-3">
        <h3 class="text-center">CRUD - PHP & MySQL + Modal Bootstrap 5</h3>
        <h3 class="text-center">Ngodingpintar</h3>
      </div>

      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            Data Mahasiswa
        </div>
        <div class="card-body">
            
            <!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
  Tambah Data
</button>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>No.</th>
                    <th>Nim</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>

                <?php

                //persiapan menampilkan data
                 $no = 1;
                 $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs DESC");
                while ($data = mysqli_fetch_array($tampil)) :
                ?> 
        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nim'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['prodi'] ?></td>
                            
        <td>
            <a href="0" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
            <a href="0" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
        </td>
    </tr>
    <!-- Awal Modal Ubah -->
<div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
        <input type="hidden" name="id_mhs" value="<?=$data['id_mhs']?>"> 
        <div class="modal-body">
        

        <div class="mb-3">
  <label class="form-label">NIM</label>
  <input type="text" class="form-control" name="tnim" value= "<?=$data['nim']?>" 
  placeholder="Masukkan NIM Anda!">
</div>
<div class="mb-3">
  <label class="form-label">Nama Lengkap</label>
  <input type="text" class="form-control" name="tnama" value= "<?=$data['nama']?>"
  placeholder="Masukkan Nama Lengkap Anda!">
</div>


<div class="mb-3">
  <label class="form-Label">Alamat</label>
  <textarea class="form-control" name="talamat" rows="3"><?= $data['alamat'] ?></textarea>
</div>

<div class="mb-3">
  <label class="form-Label">Prodi</label>
  <select class="form-select" name="tprodi">
    <option value="<?= $data['prodi'] ?>"><?= $data['prodi'] ?></option> 
    <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
    <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
    <option value="S1 - Teknologi Informasi">S1 - Teknologi Informasi</option>
  </select>
</div>

        ...
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal Ubah -->



<!-- Awal Modal Hapus -->
<div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
        <input type="hidden" name="id_mhs" value="<?=$data['id_mhs']?>"> 
        <div class="modal-body">
        
            <h5 class="text-center"> Apakah anda yakin akan menghapus data ini? <br>
            <span class="text-danger"><?=$data['nim']?> - <?=$data['nama']?></span>
            </h5>
...
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bhapus">Ya, Hapus aja!</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Akhir Modal Hapus -->
    <!-- Akhir Modal -->

    </div>
        </div>
    </div>
    




<?php endwhile; ?>
   </table>


<!-- Awal Modal -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
      <div class="modal-body">
        

        <div class="mb-3">
  <label class="form-label">NIM</label>
  <input type="text" class="form-control" name="tnim" placeholder="Masukkan NIM Anda!">
</div>
<div class="mb-3">
  <label class="form-label">Nama Lengkap</label>
  <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Lengkap Anda!">
</div>


<div class="mb-3">
  <label class="form-Label">Alamat</label>
  <textarea class="form-control" name="talamat" rows="3"></textarea>
</div>

<div class="mb-3">
  <label class="form-Label">Prodi</label>
  <select class="form-select" name="tprodi">
    <option></option>
    <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
    <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
    <option value="S1 - Teknologi Informasi">S1 - Teknologi Informasi</option>
  </select>
</div>

        ...
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal -->

         </div>
        </div>
    </div>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html> 

<?php
// Panggil koneksi Database
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - PHP & MySQL + Modal Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="mt-3">
            <h3 class="text-center">CRUD - PHP & MySQL + Modal Bootstrap 5</h3>
            <h3 class="text-center">Ngodingpintar</h3>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <!-- Form Pencarian -->
                <form method="GET" action="" class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Cari mahasiswa (NIM/Nama/Alamat/Prodi)" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </div>
                </form>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nim</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    // Persiapan menampilkan data
                    $no = 1;
                    $search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
                    $query = "SELECT * FROM tmhs";
                    if ($search) {
                        $query .= " WHERE nim LIKE '%$search%' OR nama LIKE '%$search%' OR alamat LIKE '%$search%' OR prodi LIKE '%$search%'";
                    }
                    $query .= " ORDER BY id_mhs DESC";
                    $tampil = mysqli_query($koneksi, $query);
                    
                    if (mysqli_num_rows($tampil) > 0) {
                        while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td><?= $data['prodi'] ?></td>
                        <td>
                            <a href="0" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $data['id_mhs'] ?>">Ubah</a>
                            <a href="0" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $data['id_mhs'] ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; } else { ?>
                    <tr>
                        <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>