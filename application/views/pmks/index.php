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
                     <div class="card-body">
                         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newProposalModal">Tambah Pengajuan Data</a>

                         <table id="example1" class="table table-bordered table-hover text-center">

                             <thead>
                                 <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">Nama Responden</th>
                                     <th scope="col">Tempat Tanggal Lahir</th>
                                     <th scope="col">Umur</th>
                                     <th scope="col">Telepon</th>
                                     <th scope="col">Nama Kepala Keluarga</th>
                                     <th scope="col">Alamat</th>
                                     <th scope="col">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($pengenalan as $pm) : ?>
                                     <tr>
                                         <th scope="row"><?= $i;  ?></th>
                                         <td><?= $pm['nama_responden']; ?></td>
                                         <td><?= $pm['tempat_tanggallahir']; ?></td>
                                         <td><?= $pm['usia']; ?></td>
                                         <td><?= $pm['no_telepon']; ?></td>
                                         <td><?= $pm['nama_kk']; ?></td>
                                         <td><?= $pm['alamat']; ?></td>


                                         <td>
                                             <a href="<?= base_url('pmks/ubahpmks/');  ?><?= $pm['id_pengenalan']; ?>" class="btn btn-success"><span class="fa fa-edit"> Edit</a>

                                             <a href="<?= base_url(); ?>administrator/hapusPmks/<?= $pm['id_pengenalan']; ?>" class="btn btn-danger tombol-hapus"><span class="fa fa-trash"> Hapus</a>

                                         </td>
                                     </tr>
                                     <?php $i++; ?>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
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

             <!-- /.content-wrapper -->
             <!-- Modal -->
             <div class="modal fade" id="newProposalModal" tabindex="-1" role="dialog" aria-labelledby="newProposalModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-xl">
                     <div class="modal-content bg-primary ">
                         <div class="modal-header">
                             <h5 class="modal-title" id="newProposalModalLabel">Tambah Data</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <form action="<?= base_url('pmks'); ?>" method="post">
                             <div class="modal-body">
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="form-group">
                                             <label>Nama Responden : </label>
                                             <input type="text" class="form-control" id="nama_responden" name="nama_responden">
                                         </div>
                                         <div class="form-group">
                                             <label>Usia: </label>
                                             <input type="text" class="form-control" id="usia" name="usia">
                                         </div>
                                         <div class="form-group">
                                             <label>Nama Kepala Keluarga: </label>
                                             <input type="text" class="form-control" id="nama_kk" name="nama_kk">
                                         </div>

                                         <div class="form-group">
                                             <label>Nama Pendata: </label>
                                             <input type="text" class="form-control" id="nama_pendata" name="nama_pendata">
                                         </div>
                                         <div class="form-group">
                                             <label>Alamat: </label>
                                             <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="form-group">
                                             <label>Tempat & Tanggal Lahir : </label>
                                             <input type="text" class="form-control" id="tempat_tanggallahir" name="tempat_tanggallahir">
                                         </div>
                                         <div class="form-group">
                                             <label>No Telepon: </label>
                                             <input type="text" class="form-control" id="no_telepon" name="no_telepon">
                                         </div>
                                         <div class="form-group">
                                             <label>Nama Pengawas: </label>
                                             <input type="text" class="form-control" id="nama_pengawas" name="nama_pengawas">
                                         </div>
                                         <div class="form-group">
                                             <label>Tanggal Pendataan: </label>
                                             <input type="date" class="form-control" id="tanggal_pendataan" name="tanggal_pendataan">
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-outline-light">Tambah</button>
                                         </div>

                                     </div>
                                 </div>
                         </form>
                     </div>
                 </div>
             </div>
             </div>