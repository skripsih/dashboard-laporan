<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title'] ?></h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-shadow mb-4 border-left-primary">
                <div class="card-header mb-0">
                    DATA URUTAN PENERIMAAN BANTUAN SOSIAL TAHUNAN DI KECAMATAN AMBALAWI
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered" id="laporan" cellspacing="0">
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

                            foreach ($data['ranking'] as $k) { ?>
                                <tr>
                                    <th scope="row" class="text-center <?= $i<= 10 ? "bg-success text-white" : "" ?>"><?= $i++; ?></th>
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
                                Berdasarkan data masyarakat yang didata dan sesuai dengan keputusan kriteria bahwa yang berhak mendapatkan bantuan sosial yaitu keluarga yang mendapatkan rangking nilai 1 sampai dengan 20. karena dilihat dari data yang berhasil diolah dan didata yang memenuhi sesuai dengan data kriteria dan nilai bobot nya yang telah ditentukan.
                            </p>

                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>