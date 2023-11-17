<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title'] ?></h1>
    <div class="row">
        <div class="col-lg">
            <div class="card card-shadow mb-4 border-left-danger">
                <div class="card-header mb-0">
                    <a href="<?= BASEURL . 'alternatif/form' ?>" class="btn btn-primary mb-3">Tambah Alternatif</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?= Flasher::flash(); ?>

                        <table class="table table-hover datatable" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">No</th>
                                    <th scope="col" class="text-center">NO. KTP</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Alamat</th>
                                    <th scope="col" class="text-center">Tempat, Tgl Lahir</th>
                                    <th scope="col" width="10%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data['alternatif'] as $k) { ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $k->id_keluarga ?></td>
                                        <td><?= strtoupper($k->nama) ?></td>
                                        <td><?= $k->alamat ?></td>
                                        <td><?= ucwords($k->tempat_lahir) . ', ' . $tanggal->tanggal_indo($k->tgl_lahir) ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-outline-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <a class="dropdown-item" href="<?= BASEURL . 'alternatif/form/' . $k->id_keluarga ?>">Detail</a>

                                                    <a class="dropdown-item" href="<?= BASEURL . 'alternatif/hapus_alternatif/' . $k->id_keluarga ?>" onclick="return confirm('Menghapus data alternatif juga akan menghapus penilaian pada alternatif. Lanjutkan?')">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>