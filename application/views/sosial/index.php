<style>
    table,
    tr,
    td,
    th {
        text-align: center;

    }

    .img-fluid {
        max-height: 75px;
        min-height: 75px;
        max-width: 75px;
        min-width: 75px;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }
</style>
<!-- Main content -->
<section class="content">
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger col-lg-3 text-center" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body ">

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newProposalModal">Tambah Pengajuan Baru</a>

            <table id="example1" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Judul Proposal</th>
                        <th scope="col">No Induk Kependudukan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Lampiran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sosial as $so) : ?>
                        <tr>
                            <th scope="row"><?= $i;  ?></th>
                            <td><?= $so['nama']; ?></td>
                            <td><?= $so['nama_proposal']; ?></td>
                            <td><?= $so['nis']; ?></td>
                            <td><?= $so['alamat']; ?></td>
                            <td>
                                <a href="<?= base_url('assets/verivikasi/gambar/') . $so['foto']; ?>" class="venobox">
                                    <img src="<?= base_url('assets/verivikasi/gambar/') . $so['foto']; ?>" class="img-fluid m-b-12">
                            </td>
                            <td>
                                <a href="<?= base_url('sosial/ubahsosial/');  ?><?= $so['id_proposal']; ?>" class="btn btn-success"><span class="fa fa-edit"> Edit</a>

                                <a href="<?= base_url(); ?>administrator/hapusSosial/<?= $so['id_proposal']; ?>" class="btn btn-danger tombol-hapus"><span class="fa fa-trash"> Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- /.card-body -->
        <div class="card-footer text-center">
            <a class="">PUSKESOS As-Salaam</a>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="newProposalModal" tabindex="-1" role="dialog" aria-labelledby="newProposalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="newProposalModalLabel">Tambah Proposal Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('sosial'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="tempat_tgllahir" name="tempat_tgllahir" placeholder="Tempat, Tanggal Lahir" value="<?= set_value('tempat_tgllahir'); ?>"></input>
                </div>
                <div class="form-group">
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <input id="nama_proposal" name="nama_proposal" value="Sosial" readonly class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="No Induk Kependudukan">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="No Induk Kartu Keluarga">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="dtks" name="dtks" placeholder="DTKS">
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap"></textarea>
                </div>
                <div class="form-group">
                    <textarea type="textarea" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan" value="<?= set_value('keperluan'); ?>"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" value="Bidang Sosial" hidden>
                </div>

                <div class="form-group">
                    <textarea type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan" value="<?= set_value('tujuan'); ?>"></textarea>
                </div>

                <div class="form-group">
                    <select id="agama" name="agama" class="form-control">
                        <option value="">Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" class="dropify" id="foto" name="foto">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>