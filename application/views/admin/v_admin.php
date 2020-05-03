<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>
		<?=$judul?>
	</title>
</head>

<body>
	<style>
		input[type="checkbox"],
		input[type="radio"] {
			position: absolute;
			right: 9000px;
		}

		/*Check box*/
		input[type="checkbox"]+.label-text:before {
			content: "\f096";
			font-family: "FontAwesome";
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			width: 1em;
			display: inline-block;
			margin-right: 5px;
		}

		input[type="checkbox"]:checked+.label-text:before {
			content: "\f14a";
			color: #2980b9;
			animation: effect 250ms ease-in;
		}

		input[type="checkbox"]:disabled+.label-text {
			color: #aaa;
		}

		input[type="checkbox"]:disabled+.label-text:before {
			content: "\f0c8";
			color: #ccc;
		}

		/*Radio box*/

		input[type="radio"]+.label-text:before {
			content: "\f10c";
			font-family: "FontAwesome";
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			width: 1em;
			display: inline-block;
			margin-right: 5px;
		}

		input[type="radio"]:checked+.label-text:before {
			content: "\f192";
			color: #8e44ad;
			animation: effect 250ms ease-in;
		}

		input[type="radio"]:disabled+.label-text {
			color: #aaa;
		}

		input[type="radio"]:disabled+.label-text:before {
			content: "\f111";
			color: #ccc;
		}

		/*Radio Toggle*/

		.toggle input[type="radio"]+.label-text:before {
			content: "\f204";
			font-family: "FontAwesome";
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			width: 1em;
			display: inline-block;
			margin-right: 10px;
		}

		.toggle input[type="radio"]:checked+.label-text:before {
			content: "\f205";
			color: #16a085;
			animation: effect 250ms ease-in;
		}

		.toggle input[type="radio"]:disabled+.label-text {
			color: #aaa;
		}

		.toggle input[type="radio"]:disabled+.label-text:before {
			content: "\f204";
			color: #ccc;
		}


		@keyframes effect {
			0% {
				transform: scale(0);
			}

			25% {
				transform: scale(1.3);
			}

			75% {
				transform: scale(1.4);
			}

			100% {
				transform: scale(1);
			}
		}
	</style>
	<div class="container-fluid">
		<h2>
			<center><strong>Halaman Data Admin</strong></center>
		</h2><br>
		<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Admin</a><br><br>

		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<p>
					<center>
						<font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font>
					</center>
				</p>
				<table id="tableAdmin" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Admin</th>
							<th>Username</th>
							<th>Level</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach ($DataAdmin as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nama_admin ?>
							</td>
							<td>
								<?=$data->username ?>
							</td>
							<td>
								<?=$data->nama_level?>
							</td>

							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#"
									onclick="edit('<?=$data->id_admin?>')">Edit</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#"
									onclick="edit('<?=$data->id_admin?>')">Hapus</a>

						</tr>
						<?php } ?>
						</tfoot>
				</table>
			</div>
		</div>

		<!-- Modal Tambah Admin-->
		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4><strong>Tambah Data Admin</strong></h4>
					</div>
					<div class="modal-body">
						<br />

						<form action="<?=base_url('admin_home/tambah_admin')?>" method="post"
							class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Admin :
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="nama_admin" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Level : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="id_level" required="required">
										<option>Pilih Level</option>
										<?php foreach ($DataLevel as $data) {  ?>
										<option value="<?=$data->id_level?>"><?= $data->nama_level ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username :
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="password" id="sp" name="password" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<label>
										<input type="checkbox" name="check" type="checkbox" onclick="FPassword()"> <span
											class="label-text">Lihat Password</span>
									</label>
								</div>
							</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
					</div>
				</div>
				</form>
			</div>
		</div>

		<!-- Modal Edit Data Admin-->
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4><strong>Edit Data Admin</strong></h4>
					</div>
					<div class="modal-body">
						<br />

						<form action="<?=base_url('admin_home/edit_admin')?>" method="post" class="form-horizontal form-label-left">

							<input type="hidden" id="id_admin" name="id_admin" required="required"
								class="form-control col-md-7 col-xs-12">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Admin :
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="nama_admin" name="nama_admin" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="username" name="username" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Level : </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="id_level" name="id_level" required="required">
										<option>Pilih Level</option>
										<?php foreach ($DataLevel as $data) { ?>
										<option value="<?=$data->id_level?>"><?= $data->nama_level ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
					</div>
				</div>
				</form>
			</div>
		</div>

		<!--  Konfirmasi Hapus Admin -->
		<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h3><strong>Hapus Data Admin</strong></h3>
					</div>
					<div class="modal-body">
						<h4>Anda Yakin Ingin Menghapus Admin ?</h4>
					</div>
					<form action="<?=base_url('admin_home/hapus_admin')?>" method="post" class="form-horizontal form-label-left">

						<input type="hidden" id="id_admin1" name="id_admin" required="required"
							class="form-control col-md-7 col-xs-12">

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<input type="submit" value="Konfirmasi" class="btn btn-primary">
						</div>
				</div>
				</form>
			</div>
		</div>

		<!--  Konfirmasi Aktifkan Admin -->
		<div class="modal fade" id="aktifkan" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h3><strong>Aktifkan Admin</strong></h3>
					</div>
					<div class="modal-body">
						<h4>Anda Yakin Ingin Mengaktifkan Admin ?</h4>
					</div>
					<form action="<?=base_url('admin_home/aktif_Admin')?>" method="post" class="form-horizontal form-label-left">

						<input type="hidden" id="id_Admin2" name="id_Admin" required="required"
							class="form-control col-md-7 col-xs-12">

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<input type="submit" value="Konfirmasi" class="btn btn-primary">
						</div>
				</div>
				</form>
			</div>
		</div>

		<!--  Konfirmasi Non Aktifkan Admin -->
		<div class="modal fade" id="nonaktifkan" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h3><strong>Non-Aktifkan Admin</strong></h3>
					</div>
					<div class="modal-body">
						<h4>Anda Yakin Ingin Menonaktifkan Admin ?</h4>
					</div>
					<form action="<?=base_url('admin_home/nonaktif_Admin')?>" method="post"
						class="form-horizontal form-label-left">

						<input type="hidden" id="id_Admin3" name="id_Admin" required="required"
							class="form-control col-md-7 col-xs-12">

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<input type="submit" value="Konfirmasi" class="btn btn-primary">
						</div>
				</div>
				</form>
			</div>
		</div>



	</div>
	<script>
		function FPassword() {
			var x = document.getElementById("sp");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
	<script type="text/javascript">
		function edit(a) {
			$.ajax({
				type: "post",
				url: "<?=base_url()?>admin_home/detail_admin/" + a,
				dataType: "json",
				success: function (data) {
					$("#id_admin").val(data.id_admin);
					$("#id_admin1").val(data.id_admin);
					$("#nama_admin").val(data.nama_admin);
					$("#id_level").val(data.id_level);
					$("#username").val(data.username);
				}
			});
		}
	</script>
</body>

</html>
