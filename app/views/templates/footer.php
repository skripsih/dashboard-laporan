</div>

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span class="font-weight-bold">SPK UNTUK PENERIMAAN BANTUAN SOSIAL TAHUNAN DI KECAMATAN AMBALAWI DENGAN METODE SAW <br />&copy; IDA ROYANI | 185610024 | UNIVERSITAS TEKNOLOGI DIGITAL INDONESIA</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Yakin untuk keluar ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= BASEURL . 'auth/logout' ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= BASEURL ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEURL ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= BASEURL ?>js/sb-admin-2.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= BASEURL ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugins -->
<script src="<?= BASEURL ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASEURL ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASEURL ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= BASEURL ?>js/demo/datatables-demo.js"></script>



<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10;
        var addButton = $('.add_kriteria');
        var editButton = $('.edit_param');
        var wrapperAdd = $('#parameter');
        var wrapperEdit = $('div.parameter_edit');
        var parentEdit = $('div#parent_param:last');

        var fieldHTML = '<div class="row mt-2" id="parent">' +
            '<div class="col-md-5">' +
            '<input type="text" class="form-control" name="nama_sub[]" id="nama_sub" placeholder="Nama sub kriteria..." required>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<input type="number" step="0" class="form-control" name="nilai[]" min="1" id="bobot" placeholder="Nilai minimal 1" required>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<select class="form-control" name="keterangan[]" required>' +
            '<option value="">- Keterangan -</option>' +
            '<option value="Sangat Baik">Sangat Baik</option>' +
            '<option value="Baik">Baik</option>' +
            '<option value="Cukup">Cukup</option>' +
            '<option value="Kurang">Kurang</option>' +
            '</select>' +
            '</div>' +
            '<div class="col-md-1">' +
            '<a href="javascript:void(0);" class="remove_button btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a>' +
            '</div>' +
            '</div>';
        var fieldHTML2 = '<div class="row mt-2" id="parent_param">' +
            '<div class="col-md-5">' +
            '<input type="hidden" name="id_sub_kriteria[]" value="">' +
            '<input type="text" class="form-control" name="nama_sub[]" id="nama_sub" placeholder="Nama sub kriteria..." required>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<input type="number" step="0" class="form-control" name="nilai[]" min="1" id="bobot" placeholder="Nilai sub kriteria" required>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<select class="form-control" name="keterangan[]" required>' +
            '<option value="">- Keterangan -</option>' +
            '<option value="Sangat Baik">Sangat Baik</option>' +
            '<option value="Baik">Baik</option>' +
            '<option value="Cukup">Cukup</option>' +
            '<option value="Kurang">Kurang</option>' +
            '</select>' +
            '</div>' +
            '<div class="col-md-1">' +
            '<a href="javascript:void(0);" class="rmv_btn_edit_param btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a>' +
            '</div>' +
            '</div>';
        var x = 1;
        $(addButton).click(function() {
            if (x < maxField) {
                x++;
                $(wrapperAdd).append(fieldHTML);
            } else {
                alert('Maksimal 10 sub kriteria')
            }
        });
        $(wrapperAdd).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).closest('#parent').remove();
            x--;
        });
        $(editButton).click(function() {
            this.param = $(this).data('idparam');
            if (x < maxField) {
                x++;
                $('div#' + this.param + ':last').append(fieldHTML2);
            }
        });
        $(wrapperEdit).on('click', '.rmv_btn_edit_param', function(e) {
            e.preventDefault();
            $(this).closest('#parent_param').remove();
            x--;
        });
    });
</script>

</body>

</html>