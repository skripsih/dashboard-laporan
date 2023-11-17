<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title'] ?></h1>
    <?php
    $dataNilai = json_decode(json_encode($data['penilaian']), true);
    $nilaiKosong = array_filter($dataNilai, function ($var) {
        return ($var['id_penilaian'] == NULL);
    });
    if (count($nilaiKosong) > 0) {
        // var_dump($nilaiKosong);
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-shadow mb-4 border-left-danger">
                    <div class="card-body">
                        <div class="alert alert-danger">
                            <h5>
                                <b>Peringatan</b>
                                <p class="justify-content-center mt-2" style="font-size: 16px;">
                                    Periksa kembali penilaian alernatif pada kriteria <b>
                                        <?php
                                        foreach ($nilaiKosong as $nk) {
                                            echo " " . $nk['nama_kriteria'] . ",";
                                        }
                                        ?>
                                    </b>.Pada Kriteria tersebut ada beberapa alternatif yang belum mendapat penilaian
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-shadow mb-4 border-left-info">
                    <div class="card-header mb-0">
                        <h5 class="card-title">Keterangan Kriteria <a class="float-right btn btn-primary" data-toggle="collapse" href="#collapsible-kriteria" role="button" aria-expanded="false" aria-controls="collapsible-kriteria">Tampilkan</a></h5>

                    </div>
                    <div id="collapsible-kriteria" class="collapse">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered datatable" cellspacing="0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="3%">NO</th>
                                        <th>KODE</th>
                                        <th scope="col" class="text-center">NAMA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data['kriteria'] as $s) {
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= 'C' . $i ?></td>
                                            <td><?= strtoupper($s->nama_kriteria) ?></td>

                                        </tr>
                                    <?php
                                        $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php //die; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-shadow mb-4 border-left-danger">
                    <div class="card-header mb-0">
                        NILAI ALTERNATIF
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered datatable" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">NAMA</th>
                                    <?php
                                    $i = 1;
                                    foreach ($data['kriteria'] as $k) { ?>
                                        <th scope="col" class="text-center"><?= 'C' . $i ?></th>
                                    <?php
                                        $i++;
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data['alternatif'] as $s) {
                                ?>
                                    <tr>
                                        <td><?= strtoupper($s->nama) ?></td>
                                        <?php
                                        foreach ($data['kriteria'] as $k) {
                                            $subkr = $this->model('KriteriaModel')->nilaiPenilaianSubKr($s->id_keluarga, $k->id_kriteria);
                                        ?>
                                            <td><?= $subkr->nilai ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php
                                    $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-shadow mb-4 border-left-warning">
                    <div class="card-header mb-0">
                        NORMALISASI
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered datatable" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">NAMA</th>
                                    <?php
                                    $i = 1;
                                    foreach ($data['kriteria'] as $k) { ?>
                                        <th><?= "C" . $i; ?></th>
                                    <?php
                                        $i++;
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data['alternatif'] as $al) {
                                ?>
                                    <tr>
                                        <td><?= $al->nama ?></td>
                                        <?php
                                        foreach ($data['kriteria'] as $k) {
                                            $subkr = $this->model('KriteriaModel')->nilaiPenilaianSubKr($al->id_keluarga, $k->id_kriteria);

                                            //TIPE KRITERIA BENEFIT
                                            $n_maksmin = $this->model('KriteriaModel')->nilai_maksimal_kriteria($k->id_kriteria);

                                            $n_matrixR = round($subkr->nilai / $n_maksmin->nilai_maks, 3);

                                        ?>
                                            <td><?= $n_matrixR ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-shadow mb-4 border-left-success">
                    <div class="card-header mb-0">
                        PREFERENSI
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered datatable" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">NAMA</th>
                                    <?php
                                    $i = 1;
                                    foreach ($data['kriteria'] as $k) { ?>
                                        <th><?= "C" . $i; ?></th>
                                    <?php
                                        $i++;
                                    } ?>
                                    <th style="background-color: indianred;">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $t_preferensi = 0;
                                foreach ($data['alternatif'] as $al) {
                                ?>
                                    <tr>
                                        <td><?= $al->nama ?></td>
                                        <?php

                                        foreach ($data['kriteria'] as $k) {
                                            $subkr = $this->model('KriteriaModel')->nilaiPenilaianSubKr($al->id_keluarga, $k->id_kriteria);

                                            //TIPE KRITERIA BENEFIT
                                            $n_maksmin = $this->model('KriteriaModel')->nilai_maksimal_kriteria($k->id_kriteria);
                                            $n_matrixR = round($subkr->nilai / $n_maksmin->nilai_maks, 3);

                                            $n_preferensi = round(($k->bobot_nilai / 100) * $n_matrixR, 3);
                                            $t_preferensi += $n_preferensi;
                                        ?>
                                            <td><?= $n_preferensi ?></td>
                                        <?php } ?>
                                        <td style="background-color: indianred;" class="text-white"><?= $t_preferensi ?></td>
                                    </tr>
                                <?php

                                    $this->model('AlternatifModel')->simpan_nilai_akhir($al->id_keluarga, $t_preferensi);
                                    $i++;
                                    $t_preferensi = 0;
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-shadow mb-4 border-left-primary">
                    <div class="card-header mb-0">
                        HASIL RANKING
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered datatable" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Ranking</th>
                                    <th scope="col" class="text-center">NO. KTP</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Alamat</th>
                                    <th scope="col" class="text-center">Tempat, Tgl Lahir</th>
                                    <th scope="col" class="text-center">Nilai SAW</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $ranking = $this->model('AlternatifModel')->ranking();
                                foreach ($ranking as $k) { ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?= $i++; ?></th>
                                        <td><?= $k->id_keluarga ?></td>
                                        <td><?= strtoupper($k->nama) ?></td>
                                        <td><?= $k->alamat ?></td>
                                        <td><?= ucwords($k->tempat_lahir) . ', ' . $tanggal->tanggal_indo($k->tgl_lahir) ?></td>
                                        <td><?= $k->nilai_saw ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="alert alert-info mt-3">
                            <h5>
                                <b>Kesimpulan : </b>
                                <p class="justify-content-center mt-2" style="font-size: 16px;">
                                    Berdasarkan data masyarakat yang didata dan sesuai dengan keputusan kepala desa bahwa yang berhak mendapatkan bantuan sosial yaitu keluarga yang mendapatkan rangking nilai 1 sampai dengan 20. karena kalau dilihat dari data yang berhasil diolah dan didata yang memenuhi sesuai dengan data kriteria dan nilai bobot nya yang telah ditentukan.
                                </p>

                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>