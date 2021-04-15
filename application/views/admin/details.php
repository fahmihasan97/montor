<style type="text/css">
        .notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    width: 500px;
    height: 120px;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
            box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}
    </style>

<?= $this->session->flashdata('pesan');

foreach ($data as $admin) : ?>
    <div class="col-xs-6 col-md-1-5">
    <div class="container">
    <div>
        <b><font size="3">Detail Tower Penghantar</font></b>
    </div>

    <div><font size="5"><b><?= $admin->tower ?> / <?= $admin->penghantar ?></b></font></div><br><br>


    <font size="3"><b>Tanggal</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?= $admin->tgl ?> </font></b><br><br>
    <font size="3"><b>Wilayah UPT &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Wilayah ULTG </font></b><br>
    <div><font size="3"><?= $admin->upt ?> &emsp; &emsp; &emsp; <?= $admin->ultg ?></font><br><br></div>
    <div><font size="3"><b>Jenis Tower </b></font></div>
    <div><?= $admin->jenis ?></div><br><br>
    <div><font size="3"><b>Document</b></font></div>
    <div><a href="<?= $admin->tautan ?>">Lihat </a></div><br><br>

    <div><div class="notice notice-success"><strong>Kelengkapan Dokumen</strong>
    <div><font size="2">KKP : <?= $admin->kkp ?></font></div>
    <div><font size="2">Assesmen Lingkungan : <?= $admin->kelling ?></font></div>
    <div><font size="2">Assesmen Pondasi : <?= $admin->kelpo ?></font></div>
    <div><font size="2">Kelengkapan Foto : <?= $admin->kelfo ?></font></div></div></div><br>

    <div><div class="notice notice-success"><strong>Skor / Penilaian</strong>
    <div><font size="2">Assesmen Lingkungan : <?= $admin->skoli ?></font></div>
    <div><font size="2">Assesmen Pondasi : <?= $admin->skopo ?></font></div>
    <div><font size="2">Sifat Hujan : <?= $admin->skohu ?></font></div></div></div><br>

    <div><div class="notice notice-success"><strong>Klasifikasi</strong>
    <div><font size="2">Ancaman Lingkungan : <?= $admin->klali ?></font></div>
    <div><font size="2">Ancaman Pondasi : <?= $admin->klapo ?></font></div>
    <div><font size="2">Sifat Hujan : <?= $admin->klahu ?></font></div></div><br>

    <div><div class="notice notice-info"><strong>Anomali</strong>
    <div><font size="2"><?= $admin->anomali ?></font></div></div><br></div>

    <div><div class="notice notice-info"><strong>Keterangan</strong>
    <div><font size="2"><?= $admin->keterangan ?></font></div></div><br></div>

    <div><div class="notice notice-info"><strong>Penanganan Sementara</strong>
    <div><font size="2"><?= $admin->penanganan ?></font></div></div><br></div>

    <div><div class="notice notice-info"><strong>Risiko</strong>
    <div><font size="2"><?= $admin->risiko ?></font></div></div><br></blockquote>
    <div><div class="notice notice-info"><strong>Mitigasi Penundaan</strong>
    <div><font size="2"><?= $admin->mitigasi ?></font></div></div><br></blockquote>
    <div><div class="notice notice-info"><strong>Keterangan</strong>
    <div><font size="2"><?= $admin->keterangan ?></font></div></div><br></blockquote>
    <a href="#" class="thumbnail">
    <img src="<?=base_url()?>template/data/<?=$admin->foto1?>" alt="foto"></a><br>
    <a href="#" class="thumbnail">
    <img src="<?=base_url()?>template/data/<?=$admin->foto2?>" alt="foto"></a><br>
    <a href="#" class="thumbnail">
    <img src="<?=base_url()?>template/data/<?=$admin->foto3?>" alt="foto"></a><br>
    <a href="#" class="thumbnail">
    <img src="<?=base_url()?>template/data/<?=$admin->foto4?>" alt="foto"></a>
</div>
</div>


<?php
endforeach; ?>
