		<!-- Contact Us -->
		<div class="touch-line">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<p>Pendapat dan saran anda akan kami tindak lanjuti !</p>
					</div>
					<div class="col-md-4">
						<a class="btn btn-lg btn-secondary btn-block" href="<?= base_url('home/kontak'); ?>">Kontak Kami </a>
					</div>
				</div>
			</div>
		</div>


		<!--footer starts from here-->
		<footer class="footer">
			<div class="container bottom_border">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col">
						<h5 class="headin5_amrc col_white_amrc pt2">Tentang Kami</h5>
						<!--headin5_amrc-->
						<p class="mb10">Organisasi Mahasiswa memiliki berbagaimacam kegiatan non akademik asah minat dan bakat mu diberbagai organisasi.</p>
						<ul class="footer-social">
							<li><a class="facebook hb-xs-margin" href="#"><span class="hb hb-xs spin hb-facebook"><i class="fab fa-facebook-f"></i></span></a></li>
							<li><a class="twitter hb-xs-margin" href="#"><span class="hb hb-xs spin hb-twitter"><i class="fab fa-twitter"></i></span></a></li>
							<li><a class="instagram hb-xs-margin" href="#"><span class="hb hb-xs spin hb-instagram"><i class="fab fa-instagram"></i></span></a></li>
							<li><a class="googleplus hb-xs-margin" href="#"><span class="hb hb-xs spin hb-google-plus"><i class="fab fa-google-plus-g"></i></span></a></li>
							<li><a class="dribbble hb-xs-margin" href="#"><span class="hb hb-xs spin hb-dribbble"><i class="fab fa-dribbble"></i></span></a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<h5 class="headin5_amrc col_white_amrc pt2">Menu</h5>
						<!--headin5_amrc-->
						<ul class="footer_ul_amrc">
							<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Home</a></li>
							<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Informasi</a></li>
							<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Pendaftaran Anggota</a></li>
							<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Kontak</a></li>
							<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Login</a></li>
						</ul>
						<!--footer_ul_amrc ends here-->
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col">
						<h5 class="headin5_amrc col_white_amrc pt2">Ikuti Kami</h5>
						<!--headin5_amrc ends here-->
						<ul class="footer_ul2_amrc">
							<li>
								<a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>
								<p>Organisasi Mahasiswa<a href="#"> https://www.lipsum.com/</a></p>
							</li>
							<li>
								<a href="#"><i class="fab fa-facebook fleft padding-right"></i> </a>
								<p>Organisasi Mahasiswa<a href="#"> https://www.lipsum.com/</a></p>
							</li>
							<li>
								<a href="#"><i class="fab fa-instagram fleft padding-right"></i> </a>
								<p>Organisasi Mahasiswa<a href="#"> https://www.lipsum.com/</a></p>
							</li>
						</ul>
						<!--footer_ul2_amrc ends here-->
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 ">
						<div class="news-box">
							<h5 class="headin5_amrc col_white_amrc pt2">Newsletter</h5>
							<p>Ingin Menerima Informasi Kegiatan Organisasi Mahasiswa...</p>
							<form action="#">
								<div class="input-group">
									<input class="form-control" placeholder="Search for..." type="text">
									<span class="input-group-btn">
										<button class="btn btn-secondary" type="button">Go!</button>
									</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<p class="copyright text-center">Sistem Informasi Organisasi Mahasiswa &copy; <?= date('Y'); ?>
				</p>
			</div>
		</footer>
		</div>

		<!-- Sweat alert -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="<?= base_url(); ?>assets/dist/js/sweetalert2.all.min.js"></script>
		<script src="<?= base_url(); ?>assets/dist/js/myscript.js"></script>


		<!-- Bootstrap core JavaScript -->
		<script src="<?= base_url('assets/'); ?>home/vendor/jquery/jquery.min.js"></script>
		<script src="<?= base_url('assets/'); ?>home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url('assets/'); ?>home/js/imagesloaded.pkgd.min.js"></script>
		<script src="<?= base_url('assets/'); ?>home/js/isotope.pkgd.min.js"></script>
		<script src="<?= base_url('assets/'); ?>home/js/filter.js"></script>
		<script src="<?= base_url('assets/'); ?>home/js/jquery.appear.js"></script>
		<script src="<?= base_url('assets/'); ?>home/js/owl.carousel.min.js"></script>
		<script src="<?= base_url('assets/'); ?>home/js/jquery.fancybox.min.js"></script>
		<script src="<?= base_url('assets/'); ?>home/js/script.js"></script>

		<!-- Dropify -->
		<script src="<?= base_url('assets/'); ?>plugins/dropify/js/dropify.min.js"></script>

		<!-- Summernote -->
		<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>


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
			$(function() {
				// Summernote
				$('.textarea').summernote()
			})
		</script>

		</body>

		</html>