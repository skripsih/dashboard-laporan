<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title'] ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-shadow mb-4 border-left-danger">
                <div class="card-header mb-0">
                    <a href="#" class="btn btn-success btn-labeled btn-labeled-left" data-toggle="modal" data-target="#kriteriaFormModal<?= count($data['kriteria']) + 1 ?>"><b><i class="fas fa-plus"></i></b> Tambah Kriteria & Sub Kriteria</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?= Flasher::flash(); ?>
                        <table class="table table-hover datatable" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" width="5%" class="text-center">#</th>
                                    <th scope="col" class="text-center">Nama Kriteria</th>
                                    <th scope="col" class="text-center">Bobot (%)</th>
                                    <th scope="col" width="20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data['kriteria'] as $k) { ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= ucwords($k->nama_kriteria) ?></td>
                                        <td><?= ucwords($k->bobot_nilai) ?></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#kriteriaFormModal<?= $i ?>"><i class="fas fa-fw fa-edit"></i></a>
                                            <a href="<?= BASEURL . 'kriteria/hapus_kriteria/' . $k->id_kriteria ?>" onclick="return confirm('Menghapus data kriteria juga akan menghapus penilaian alternatif pada kriteria ini. Lanjutkan?')" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php  $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
$kriteria = $this->model('KriteriaModel')->semua_kriteria();
$jmlModal = count($kriteria) + 1;
$index = 1;
for ($i = 1; $i <= $jmlModal; $i++) {
    $index = $i - 1;
    if (isset($kriteria[$index]->nama_kriteria)) {
        $id_kriteria = $kriteria[$index]->id_kriteria;
        $nama_kriteria = $kriteria[$index]->nama_kriteria;
        // $tipe_kriteria = $kriteria[$index]->tipe_kriteria;
        $bobot = $kriteria[$index]->bobot_nilai;
        $titleModal = "Edit Kriteria";
        $txtButton = "Edit";
        $param = "parameter_edit";
        $parent_param = "parent_param";
        $idparam = "parameter_edit" . $i;
        $data_idparam = 'data-idparam="parameter_edit' . $i . '"';
        $btn_class = "edit_param";
        $subkriteria = $this->model('KriteriaModel')->subKriteriaByIdKriteria($id_kriteria);
    } else {
        $id_kriteria = null;
        $nama_kriteria = null;
        $tipe_kriteria = null;
        $bobot = null;
        $titleModal = "Tambah Kriteria";
        $txtButton = "Tambah";
        $param = null;
        $parent_param = "parent";
        $idparam = "parameter";
        $data_idparam = null;
        $btn_class = "add_kriteria";
        $subkriteria = [];
    }

?>
    <div class="modal fade" id="kriteriaFormModal<?= $i ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="kriteriaFormModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info alert-styled-left col-md-12">
                                Jika ada penambahan atau pengurangan kriteria dan sub kriteria, <span class="font-weight-semibold">sesuaikan kembali penilaian alternatif pada kriteria ini</span>.
                            </div>
                        </div>
                    </div>
                    <form id="formKriteria<?= $id_kriteria ?>" action="<?= BASEURL . 'kriteria/simpan_kriteria' ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="h6 font-weight-bold"><?= $titleModal ?></p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <!-- <label class="control-label">Nama Kriteria</label> -->
                                    <input type="hidden" name="id_kriteria" value="<?= $id_kriteria ?>">
                                    <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" required value="<?= $nama_kriteria ?>" placeholder="Nama kriteria...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <!-- <label class="control-label">Bobot</label> -->
                                    <input type="number" step="0" class="form-control" name="bobot_nilai" min="0" max="100" id="bobot" required value="<?= $bobot ?>" placeholder="Bobot nilai...">
                                </div>
                            </div>
                            <div class="col-md-1"></div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 border-top">
                                <p class="h6 font-weight-bold mt-2">Sub Kriteria</p>
                                <div class="parameter <?= $param ?>" id="<?= $idparam ?>">
                                    <?php
                                    if (count($subkriteria) > 0) {
                                        foreach ($subkriteria as $sk) {
                                    ?>
                                            <div class="row" id="<?= $parent_param ?>">
                                                <input type="hidden" name="id_sub_kriteria[]" value="<?= $sk->id_sub_kriteria ?>">
                                                <div class="col-md-5 mt-2">
                                                    <input type="text" class="form-control" name="nama_sub[]" id="nama_sub" placeholder="Nama sub kriteria..." required value="<?= ucwords($sk->nama_sub) ?>">
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <input type="number" step="0" class="form-control" name="nilai[]" min="1" id="bobot" placeholder="Nilai sub kriteria" required value="<?= ucwords($sk->nilai) ?>">
                                                </div>
                                                <div class="col-md-3 mt-2">
                                                    <select class="form-control" name="keterangan[]" required>
                                                        <option value="">- Keterangan -</option>
                                                        <option value="Sangat Baik" <?= $sk->keterangan == "Sangat Baik" ? "selected" : "" ?>>Sangat Baik</option>
                                                        <option value="Baik" <?= $sk->keterangan == "Baik" ? "selected" : "" ?>>Baik</option>
                                                        <option value="Cukup" <?= $sk->keterangan == "Cukup" ? "selected" : "" ?>>Cukup</option>
                                                        <option value="Kurang" <?= $sk->keterangan == "Kurang" ? "selected" : "" ?>>Kurang</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1 mt-2">
                                                    <a href="javascript:void(0);" class="rmv_btn_edit_param btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <div class="row" id="<?= $parent_param ?>">
                                            <input type="hidden" name="id_sub_kriteria[]" value="">
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="nama_sub[]" id="nama_sub" placeholder="Nama sub kriteria..." required>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" step="0" class="form-control" name="nilai[]" min="1" id="bobot" placeholder="Nilai sub kriteria" required>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control" name="keterangan[]" required>
                                                    <option value="">- Keterangan -</option>
                                                    <option value="Sangat Baik">Sangat Baik</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Cukup">Cukup</option>
                                                    <option value="Kurang">Kurang</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:void(0);" class="remove_button btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="<?= $btn_class ?> btn btn-success mt-2" <?= $data_idparam ?>><i class="fa fa-plus"></i> Sub Kriteria</a>
                    <a href="<?= BASEURL . 'kriteria' ?>" class="btn btn-secondary mt-2">Keluar</a>
                    <button type="submit" name="submit" value="<?= $txtButton ?>" form="formKriteria<?= $id_kriteria ?>" class="btn btn-primary mt-2">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>