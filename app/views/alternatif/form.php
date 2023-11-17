<?php

$id = explode('/', $_GET['url']);
if (isset($id[2])) {
    $id_keluarga = $data['detail']->id_keluarga;
    $ktp = $data['detail']->ktp;
    $nama_alternatif = $data['detail']->nama;
    $alamat = $data['detail']->alamat;
    $agama = $data['detail']->agama;
    $tempat_lahir = $data['detail']->tempat_lahir;
    $tanggal_lahir = $data['detail']->tgl_lahir;
    $jekel = $data['detail']->jekel;
    $readonly = true;
    $textBtn = "Edit";
} else {
    $id_keluarga = NULL;
    $nama = NULL;
    $alamat = NULL;
    $agama = NULL;
    $tempat_lahir = NULL;
    $tanggal_lahir = NULL;
    $jekel = NULL;
    $readonly = false;
    $textBtn = "Tambah";
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title'] ?></h1>
    <div class="row">
        <div class="col-lg">
            <div class="card card-shadow mb-4 border-left-warning">
                <div class="card-body">
                    <?= Flasher::flash(); ?>
                    <form action="<?= BASEURL . 'alternatif/simpan_alternatif' ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card alert alert-info">
                                    Data Peserta
                                </div>
                                <div class="form-group">
                                    <label for="nama">NO KTP</label>
                                    <input type="text" name="ktp" class="form-control" id="ktp" value="<?= $id_keluarga ?>" required>

                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $nama ?>" required>

                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="2" required><?= $alamat ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select name="jekel" class="form-control" required>
                                                <option value="L" <?php if ($jekel == 'l') {
                                                                        echo 'selected';
                                                                    } ?>>Laki - laki</option>
                                                <option value="P" <?php if ($jekel == 'p') {
                                                                        echo 'selected';
                                                                    } ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $tempat_lahir ?>" required>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select name="agama" class="form-control" required>
                                                <option value="">- Pilih Agama -</option>
                                                <option value="Islam" <?= $agama == "Islam" ? "selected" : "" ?>>Islam</option>
                                                <option value="Katolik" <?= $agama == "Katolik" ? "selected" : "" ?>>Katolik</option>
                                                <option value="Protestan" <?= $agama == "Protestan" ? "selected" : "" ?>>Protestan</option>
                                                <option value="Hindu" <?= $agama == "Hindu" ? "selected" : "" ?>>Hindu</option>
                                                <option value="Buddha" <?= $agama == "Buddha" ? "selected" : "" ?>>Buddha</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control datepicker" value="<?= $tanggal_lahir ?>" required>
                        
                            </div>
                        </div>
                    </div>

                            </div>
                            <div class="col-md-6">
                                <div class="card alert alert-warning">
                                    Data Penilaian Kriteria
                                </div>
                                <?php
                                $indexkr = 0;
                                foreach ($data['kriteria'] as $k) {
                                    $subkriteria = $this->model('KriteriaModel')->subKriteriaByIdKriteria($k->id_kriteria);
                                    if ($readonly) {
                                        $id_sub_kriteria = $data['penilaian'][$indexkr]->id_sub_kriteria;
                                    } else {
                                        $id_sub_kriteria = null;
                                    }
                                ?>
                                    <div class="form-group">
                                        <label><?= ucwords($k->nama_kriteria) ?></label>
                                        <select name="kriteria[<?= $k->id_kriteria ?>]" class="form-control" required>
                                            <option value="">- Pilih Sub Kriteria -</option>
                                            <?php foreach ($subkriteria as $sk) { ?>
                                                <option value="<?= $sk->id_sub_kriteria ?>" <?= $id_sub_kriteria == $sk->id_sub_kriteria ? "selected" : "" ?>><?= '[ '.$sk->nilai.' ] '.ucwords($sk->nama_sub) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php
                                    $indexkr++;
                                }
                                ?>
                            </div>
                        </div>
                        <a href="<?= BASEURL . 'alternatif' ?>" class="btn btn-outline-dark">Batal</a> &nbsp;
                        <button type="submit" name="submit" class="btn btn-primary" value="<?= $textBtn ?>">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->