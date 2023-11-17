<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title'] ?></h1>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-shadow mb-4 border-left-warning">
                <!-- <div class="card-header mb-0">

                </div> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <?= Flasher::flash(); ?>

                        <table class="table table-hover table-bordered datatable" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" width="5%" class="text-center">#</th>
                                    <th scope="col" class="text-center">Username</th>
                                    <th scope="col" class="text-center">Akses</th>
                                    <th scope="col" width="20%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data['user'] as $k) { ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $k->username ?></td>
                                        <td><?= ucwords($k->role) ?></td>
                                        <td class="text-center">
                                            <a href="<?= BASEURL . 'users/' . $k->id_user ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                            <a href="<?= BASEURL . 'users/hapus_user/' . $k->id_user ?>" onclick="return confirm('Anda yakin data akan di hapus?')" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <?php
            $id = explode('/', $_GET['url']);
            if (isset($id[1])) {
                $id = $data['detail']->id_user;
                $username = $data['detail']->username;
                $role = $data['detail']->role;
                $textBtn = "Edit";
            } else {
                $id = NULL;
                $username = NULL;
                $role = NULL;
                $textBtn = "Tambah";
            }
            ?>
            <div class="card card-shadow border-left-success">
                <div class="card-header mb-0">
                    <?= $textBtn ?> Data User
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?= Flasher::flash(); ?>
                        <form action="<?= BASEURL . 'users' ?>" method="post">
                            <input type="hidden" name="id_user" value="<?= $id ?>">
                            <div class="form-group">
                                <label for="username">Username<sup class="text-danger">*</sup></label>
                                <input type="hidden" name="username_lama" class="form-control" value="<?= $username ?>" required>
                                <input type="text" name="username" class="form-control" value="<?= $username ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" minlength="5" <?= $textBtn == "Tambah" ? "required" : ""  ?>><?= $textBtn == "Edit" ? "<small class='text-danger'>Kosongkan password jika tidak diedit</small>" : "" ?>
                            </div>
                            <div class="form-group">
                                <label>Akses</label>
                                <select class="form-control" name="role" required>
                                    <option value="">- Pilih Akses -</option>
                                    <option value="pengelola" <?= $role == "pengelola" ? "selected" : "" ?>>Pengelola</option>
                                    <option value="kepala sekolah" <?= $role == "kepala sekolah" ? "selected" : "" ?>>Kepala sekolah</option>
                                </select>
                            </div>
                            <a href="<?= BASEURL . 'users' ?>" class="btn btn-outline-dark mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary" name="submit" value="<?= $textBtn ?>">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>