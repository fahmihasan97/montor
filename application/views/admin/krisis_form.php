<table class="table table-reposive">
	<form action="" method="POST">
	<tr><th>Kode</th><td><input type="text" name="kode" class="form-control" value="<?= $kode ?>"></td></tr>
	<tr><th>T / L</th><td><select class="form-control" name="tl" required="">
	                          <option value="BLD-SKH">Balongbendo - Sekarputih</option>
	                          <option value="DYO-BBN">Driyorejo - Babadan</option>
	                          <option value="GRT-KRN">Grati - Krian</option>
	                          <option value="GRS-KRN">Gresik - Krian</option>
	                          <option value="DYO-BBN">Kebonagung - Sengguruh</option>
	                          <option value="KBG-SGH">Kebonagung - Sengguruh</option>
	                          <option value="KBG-STM">Kebonagung - Sutami</option>
	                          <option value="NBG-KRN">Ngimbang - Krian</option>
	                          <option value="SKH-MJG">Sekarputih - Mojoagung</option>
	                          <option value="SKH-NGO">Sekarputih - Ngoro</option>
	                          <option value="SKH-SMN-MDN">Sekarputih - Siman - Mendalan</option>
	                          <option value="SKH-TRK">Sekarputih - Tarik</option>
                              <option value="SKG-MDN">Sengkaling - Mendalan</option>
	                          <option value="SMN-MDN-SKH">Siman - Mendalan - Sekarputih</option>
	                          <option value="SBB-APA">Surabaya Barat - Altaprima</option>
	                          <option value="SBB-BLO">Surabaya Barat - Balongbendo</option>
	                          <option value="SBB-SWN">Surabaya Barat - Sawahan</option>
	                          <option value="SBB-TNS">Surabaya Barat - Tandes</option>
	                          <option value="TRK-DYO-MWN">Tarik - Driyorejo - Miwon</option>
	                          <option value="UGN-KRN">Ungaran - Krian</option>
	                          <option value="UGN-NBG">Ungaran - Ngimbang</option>
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
 
 