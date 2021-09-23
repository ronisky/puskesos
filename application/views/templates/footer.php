<footer class="main-footer">
    <span>Copyright &copy;Pusat Kesejahteraan Sosial Desa Katapang <?= date('Y'); ?></span>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik 'Logout' jika yakin ingin keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Sweat alert -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/dist/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/myscript.js"></script>

<!-- jQuery -->

<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>/dist/js/demo.js"></script>

<!-- InputMask -->
<script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>

<!-- date-range-picker -->
<script src="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Calendar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

<!-- Summernote -->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Dropify -->
<script src="<?= base_url('assets/'); ?>plugins/dropify/js/dropify.min.js"></script>

<!-- venobox -->
<script src="<?= base_url('assets/'); ?>plugins/venobox/venobox.min.js"></script>

<!-- ChartJS -->
<script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>

<script type='text/javascript'>
    $(window).load(function() {
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }

        function getYear(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year];
        }

        function calculate_age(dob) {
            var diff_ms = Date.now() - dob.getTime();
            var age_dt = new Date(diff_ms);

            return Math.abs(age_dt.getUTCFullYear() - 1970);
        }

        let currentDate = formatDate(Date.now());
        $('#tanggal_pendataan').val(currentDate);
        
        $('#tanggal_lahir').change(function() {
            let date = $('#tanggal_lahir').val();
            const age = calculate_age(new Date(String(date)));
            console.log(age);
            $('#usia').val(age);

            if (age <= 5) {
                $('#keluarga').prop('hidden', false);
                $('#kesehatan').prop('hidden', false);
                $('#ekonomi').prop('hidden', false);
                $('#lingkungan').prop('hidden', false);
                $('#pekerjaan_tetap').prop('hidden', true);
                $('#catatan_kepolisian').prop('hidden', true);
                $('#tempat_tinggal').prop('hidden', false);
                $('#korban_bencana').prop('hidden', true);
                $('#menikah').prop('hidden', true);
            } else if (age >= 5 && age <= 18) {
                $('#keluarga').prop('hidden', false);
                $('#kesehatan').prop('hidden', false);
                $('#ekonomi').prop('hidden', false);
                $('#lingkungan').prop('hidden', false);
                $('#pekerjaan_tetap').prop('hidden', true);
                $('#catatan_kepolisian').prop('hidden', false);
                $('#tempat_tinggal').prop('hidden', false);
                $('#korban_bencana').prop('hidden', false);
                $('#menikah').prop('hidden', true);
            } else if (age >= 19 && age <= 54) {
                $('#keluarga').prop('hidden', false);
                $('#kesehatan').prop('hidden', false);
                $('#ekonomi').prop('hidden', false);
                $('#lingkungan').prop('hidden', false);
                $('#pekerjaan_tetap').prop('hidden', false);
                $('#catatan_kepolisian').prop('hidden', false);
                $('#tempat_tinggal').prop('hidden', false);
                $('#korban_bencana').prop('hidden', false);
                $('#menikah').prop('hidden', false);
            } else if (age >= 54) {
                $('#keluarga').prop('hidden', false);
                $('#kesehatan').prop('hidden', false);
                $('#ekonomi').prop('hidden', false);
                $('#lingkungan').prop('hidden', false);
                $('#pekerjaan_tetap').prop('hidden', false);
                $('#catatan_kepolisian').prop('hidden', true);
                $('#tempat_tinggal').prop('hidden', false);
                $('#korban_bencana').prop('hidden', false);
                $('#menikah').prop('hidden', true);
            } else {
                $('#keluarga').prop('hidden', true);
                $('#kesehatan').prop('hidden', true);
                $('#ekonomi').prop('hidden', true);
                $('#lingkungan').prop('hidden', true);
                $('#pekerjaan_tetap').prop('hidden', true);
                $('#catatan_kepolisian').prop('hidden', true);
                $('#tempat_tinggal').prop('hidden', true);
                $('#korban_bencana').prop('hidden', true);
                $('#menikah').prop('hidden', true);
            }


        });

        $("#usia").change(function() {
            console.log($("#usia option:selected").val());
            if ($("#usia option:selected").val() <= 5) {
                $('#keluarga').prop('hidden', false);
                $('#kesehatan').prop('hidden', false);
                $('#ekonomi').prop('hidden', false);
                $('#lingkungan').prop('hidden', false);
                $('#pekerjaan_tetap').prop('hidden', true);
                $('#catatan_kepolisian').prop('hidden', true);
                $('#tempat_tinggal').prop('hidden', false);
                $('#korban_bencana').prop('hidden', true);
                $('#menikah').prop('hidden', true);
            } else if ($("#usia option:selected").val() >= 5 && $("#usia option:selected").val() <= 18) {
                $('#keluarga').prop('hidden', false);
                $('#kesehatan').prop('hidden', false);
                $('#ekonomi').prop('hidden', false);
                $('#lingkungan').prop('hidden', false);
                $('#pekerjaan_tetap').prop('hidden', true);
                $('#catatan_kepolisian').prop('hidden', false);
                $('#tempat_tinggal').prop('hidden', false);
                $('#korban_bencana').prop('hidden', false);
                $('#menikah').prop('hidden', true);
            } else if ($("#usia option:selected").val() >= 19 && $("#usia option:selected").val() <= 54) {
                $('#keluarga').prop('hidden', false);
                $('#kesehatan').prop('hidden', false);
                $('#ekonomi').prop('hidden', false);
                $('#lingkungan').prop('hidden', false);
                $('#pekerjaan_tetap').prop('hidden', false);
                $('#catatan_kepolisian').prop('hidden', false);
                $('#tempat_tinggal').prop('hidden', false);
                $('#korban_bencana').prop('hidden', false);
                $('#menikah').prop('hidden', false);
            } else if ($("#usia option:selected").val() >= 54) {
                $('#keluarga').prop('hidden', false);
                $('#kesehatan').prop('hidden', false);
                $('#ekonomi').prop('hidden', false);
                $('#lingkungan').prop('hidden', false);
                $('#pekerjaan_tetap').prop('hidden', false);
                $('#catatan_kepolisian').prop('hidden', true);
                $('#tempat_tinggal').prop('hidden', false);
                $('#korban_bencana').prop('hidden', false);
                $('#menikah').prop('hidden', true);
            } else {
                $('#keluarga').prop('hidden', true);
                $('#kesehatan').prop('hidden', true);
                $('#ekonomi').prop('hidden', true);
                $('#lingkungan').prop('hidden', true);
                $('#pekerjaan_tetap').prop('hidden', true);
                $('#catatan_kepolisian').prop('hidden', true);
                $('#tempat_tinggal').prop('hidden', true);
                $('#korban_bencana').prop('hidden', true);
                $('#menikah').prop('hidden', true);
            }
        });
    });
</script>

<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });


    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>


<script>
    // Update status
    $(document).on("click", "#updateStatus", function() {
        var id = $(this).data('id');
        $("#id_proposal").val(id);
    });
</script>

<script>
    // Update status pmks
    $(document).on("click", "#updateStatusPmks", function() {
        var id = $(this).data('id');
        $("#id_pengenalan").val(id);
    });
</script>

<!-- DataTabel -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<!-- Dropify -->
<script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                default: 'Drag atau upload file disini!',
                replace: 'Drag atau upload file disini atau klik untuk menimpa!',
                remove: 'dihapus',
                error: 'Error'
            }
        });
    });
</script>

<script>
    // Initialize Venobox
    $('.venobox').venobox({
        bgcolor: '',
        overlayColor: 'rgba(6, 12, 34, 0.85)',
        closeBackground: '',
        closeColor: '#fff'
    });
</script>