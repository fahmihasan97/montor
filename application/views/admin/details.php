<?= $this->session->flashdata('pesan');
foreach ($data as $admin) : ?>
	<div class="col-xs-6 col-md-1-5">
    <div>
        <b><font size="3">Detail Tower</font></b>
    </div>

    <div><font size="5"><b><?= $admin->kode ?> / <?= $admin->tl ?></b></font></div><br><br><br>

    <div><font size="3"><b>Wilayah Kerja &emsp; &emsp; &ensp; Hasil Assestment</b></font></div>
    <div><font size="3"><?= $admin->wilayah ?> &emsp; &emsp; &emsp; &emsp; Skor : <?= $admin->skor ?> / <font color="red"><b><?= $admin->status ?></font></b></font></div>

    <div>&emsp; &ensp; &emsp; &emsp; &emsp; &emsp; &ensp; &emsp; &emsp; &emsp;<?= $admin->tgl ?></div>
    <div><font size="3"><b>Jenis Tower </b></font></div>
    <div><?= $admin->jenis ?></div><br><br>

    <div><blockquote style="border-left: 5px solid #fce27c; background-color: #f6ebc1; padding: .5em 1em; }blockquote p {margin: 0;"><font size="3"><b>Rincian Kondisi </b></font>
    <div><font size="2"><?= $admin->rincian ?></font></div></div><br></blockquote>
    <div><blockquote style="border-left: 5px solid #fce27c; background-color: #f6ebc1; padding: .5em 1em; }blockquote p {margin: 0;"><font size="3"><b>Penyebab Kondisi </b></font>
    <div><font size="2"><?= $admin->penyebab ?></font></div></div><br></blockquote>
    <div><blockquote style="border-left: 5px solid #fce27c; background-color: #f6ebc1; padding: .5em 1em; }blockquote p {margin: 0;"><font size="3"><b>Kontrol Existing </b></font>
    <div><font size="2"><?= $admin->kontrol ?></font></div></div><br></blockquote>
    <div><blockquote style="border-left: 5px solid #fce27c; background-color: #f6ebc1; padding: .5em 1em; }blockquote p {margin: 0;"><font size="3"><b>Rencana </b></font>
    <div><font size="2"><?= $admin->rencana ?></font></div></div><br></blockquote>
    <div><blockquote style="border-left: 5px solid #fce27c; background-color: #f6ebc1; padding: .5em 1em; }blockquote p {margin: 0;"><font size="3"><b>Status Penanganan </b></font>
    <div><font size="2"><?= $admin->penanganan ?></font></div></div><br></blockquote>
    <div><blockquote style="border-left: 5px solid #fce27c; background-color: #f6ebc1; padding: .5em 1em; }blockquote p {margin: 0;"><font size="3"><b>Keterangan </b></font>
    <div><font size="2"><?= $admin->keterangan ?></font></div></div><br></blockquote>
    <a href="#" class="thumbnail">
    <img src="<?=base_url()?>template/data/<?=$admin->foto?>" alt="foto"></a>


<?php
endforeach; ?>
