<?php
    $servername = "192.168.15.233";
    $username = "jayatta";
    $password = "bm5092da";
    $dbname = "budget";

    // membuat koneksi
    $koneksi = new mysqli($servername, $username, $password, $dbname);

    // melakukan pengecekan koneksi
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    if($_POST['waktu']) {
        $waktu = $_POST['waktu'];


        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM pengajuan WHERE waktu = '$waktu'";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) {
        ?>

        <!-- MEMBUAT FORM -->
        <form action="tambahpengajuproses.php" method="post">

            <input type="hidden" name="waktu" value="<?php echo $baris['waktu']; ?>">
            <input type="hidden" name="pengaju" value="<?php echo $baris['pengaju']; ?>">
            <input type="hidden" name="divisi" value="<?php echo $baris['divisi']; ?>">

            <div class="form-group">
              <label for="rincian" class="control-label">Rincian & Keterangan :</label>
                <input type="text" class="form-control" id="rincian" name="rincian">
            </div>

            <div class="form-group">
              <label for="kota" class="control-label">Kota :</label>
                <input type="text" class="form-control" id="kota" name="kota">
            </div>

            <div class="form-group">
              <label for="status">Status :</label>
              <select class="form-control" id="status" name="status">
                <option selected disabled>Pilih Status</option>
                <option value="UM">Uang Muka</option>
                <option value="Biaya">Biaya</option>
                <option value="Vendor/Supplier">Vendor/Supplier</option>
                <option value="Honor Eksternal">Honor Eksternal</option>
              </select>
            </div>

            <div class="form-group">
              <label for="penerima" class="control-label">Penerima :</label>
                <input type="text" class="form-control" id="penerima" name="penerima">
            </div>

            <div class="form-group">
              <label for="harga1" class="control-label">Harga (IDR) :</label>
                <input type="text" class="form-control" id="harga1" name="harga" onkeyup="sum();">
            </div>

            <div class="form-group">
              <label for="quantity1" class="control-label">Quantity :</label>
                <input type="text" class="form-control" id="quantity1" name="quantity" onkeyup="sum();">
            </div>

            <div class="form-group">
              <label for="total1">Total Harga (IDR) :</label>
              <input type="text" class="form-control" id="total1" name="total" onkeyup="sum();">
            </div>

              <button class="btn btn-primary" type="submit" name="submit">Update</button>

        </form>

      <?php } }
    $koneksi->close();
?>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
function sum() {
      var txtSecondNumberValue = document.getElementById('harga1').value;
      var txtTigaNumberValue = document.getElementById('quantity1').value;
      var result = parseFloat(txtSecondNumberValue) * parseFloat(txtTigaNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total1').value = result;
      }
}
</script>
