<table class="table table-reposive">
	<form action="" method="POST">
	<tr><th>Penghantar</th><td><input type="text" name="tl" class="form-control" value="<?= $tl ?>"></td></tr>
	<tr><th>Kode</th><td><input type="text" name="kode" class="form-control" value="<?= $kode ?>"></td></tr>
	                 
                              </select></td></tr>
	<tr><th>Wilayah</th><td><input type="text" name="wilayah" class="form-control" value="<?= $wilayah ?>"></td></tr>
	<tr><th>Skor</th><td><input type="number" name="skor" class="form-control" value="<?= $skor ?>"></td></tr>
	<tr><th>Status</th><td><select class="form-control" name="status" required="">
	                          <option value="KRITIS">KRITIS</option>
	                          <option value="WASPADA">WASPADA</option>
	                          <option value="EX-KRITIS">EX-KRITIS</option>
                              </select></td></tr>
	<tr><th>Tgl Justify</th><td><input type="date" name="tgl" class="form-control" value="<?= $tgl ?>"></td></tr>
	<tr><th>Jenis</th><td><input type="text" name="jenis" class="form-control" value="<?= $jenis ?>"></td></tr>
	<tr><th>Rincian</th><td><input type="text" name="rincian" class="form-control" value="<?= $rincian ?>"></td></tr>
	<tr><th>Penyebab</th><td><input type="text" name="penyebab" class="form-control" value="<?= $penyebab ?>"></td></tr>
	<tr><th>Kontrol</th><td><input type="text" name="kontrol" class="form-control" value="<?= $kontrol ?>"></td></tr>
	<tr><th>Rencana</th><td><input type="text" name="rencana" class="form-control" value="<?= $rencana ?>"></td></tr>
	<tr><th>Penanganan</th><td><input type="text" name="penanganan" class="form-control" value="<?= $penanganan ?>"></td></tr>
	<tr><th>Keterangan</th><td><input type="text" name="keterangan" class="form-control" value="<?= $keterangan ?>"></td></tr>
    <tr><td></td><th><input type="submit" name="kirim" value="Submit" class="btn btn-primary"></th></tr>
    </form>	 
</table>
 
 