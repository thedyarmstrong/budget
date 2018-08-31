<?php
$servername = "192.168.15.233";
$username = "jayatta";
$password = "bm5092da";
$dbname = "budget";

session_start();
if(!isset($_SESSION['nama_user'])){
  header("location:login.php");
    // die('location:login.php');//jika belum login jangan lanjut
}

    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    if($_POST['no'] && $_POST['waktu']) {
        $id = $_POST['no'];
        $waktu = $_POST['waktu'];
        $tanggal = date("Y-m-d");


        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM selesai WHERE no = '$id' AND waktu = '$waktu'";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) {

        ?>

        <!-- MEMBUAT FORM -->
        <form action="realisasidireksiproses.php" method="post" name="Form" onsubmit="return validateForm()">

            <input type="hidden" name="no" value="<?php echo $baris['no']; ?>">
            <input type="hidden" name="waktu" value="<?php echo $baris['waktu']; ?>">
            <input type="hidden" name="tanggalrealisasi" value="<?php echo $tanggal; ?>">
            <input type="hidden" name="status" value="Realisasi (Direksi)">

            <div class="form-group">
              <label for="rincian" class="control-label">Realisasi Biaya (IDR) :</label>
                <input type="number" class="form-control" id="a" name="realisasi">
            </div>

            <div class="form-group">
              <label for="rincian" class="control-label">Uang Kembali (IDR) :</label>
                <input type="number" class="form-control" id="a" name="uangkembali">
            </div>

            <div class="form-group">
              <label for="sel1">Term:</label>
                <select class="form-control" id="sel1" name="term">
                <option disabled selected>Pilih Term</option>
                <?php
                $sql2 = "SELECT term FROM bpu WHERE no = '$id' AND waktu = '$waktu' ORDER BY term";
                $result2 = $koneksi->query($sql2);
                foreach ($result2 as $baris2) {
                ?>
                  <option><?php echo $baris2['term']; ?></option>
                <?php
                }
                ?>
                </select>
            </div>

              <button class="btn btn-primary" type="submit" name="submit">OK</button>

        </form>

      <?php } }
    $koneksi->close();
?>
