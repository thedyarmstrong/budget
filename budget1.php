<form action="selesai.php" method="POST">

  <div class="form-group">
    <label for="status">Jenis Pengajuan :</label>
    <select class="form-control" id="status" name="jenis">
      <option selected disabled>Pilih Jenis Pengajuan</option>
      <option value="B1">B1</option>
      <option value="B2">B2</option>
      <option value="Rutin">Umum (Rutin)</option>
      <option value="NonRutin">Umum (NonRutin)</option>
    </select>
  </div>

    <div class="form-group">
      <label for="email">Nama Pengajuan :</label>
      <input type="text" class="form-control" id="email" name="nama">
    </div>

    <div class="form-group">
      <label for="status">Tahun :</label>
      <select class="form-control" id="status" name="tahun">
        <option selected disabled>Pilih Tahun</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
      </select>
    </div>

    <div class="form-group">
      <label for="pengaju">Pengaju :</label>
      <input type="text" class="form-control" id="pengaju" name="pengaju" value="<?php echo $_SESSION['nama_user']; ?>" readonly>
    </div>

    <div class="form-group">
      <label for="divisi">Divisi :</label>
      <input type="text" class="form-control" id="divisi" name="divisi" value="<?php echo $_SESSION['divisi']; ?>" readonly>
    </div>

    <input type="hidden" name="status" value="Belum Di Ajukan">

    <button type="submit" class="btn btn-success" name="submit">Submit</button>

</form>
