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
	<div class="container-fluid">
		<h2>
			<center><strong>Halaman Data Level Admin</strong></center>
		</h2><br>
		<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Level</a><br><br>

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
							<th>Nama Level</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach ($DataLevel as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nama_level?>
							</td>

							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#"
									onclick="edit('<?=$data->id_level?>')">Edit</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#"
									onclick="edit('<?=$data->id_level?>')">Hapus</a>

						</tr>
						<?php } ?>
						</tfoot>
				</table>
			</div>
		</div>

		<!-- Modal Tambah Level Admin-->
		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4><strong>Tambah Data Level</strong></h4>
					</div>
					<div class="modal-body">
						<br />

						<form action="<?=base_url('admin_home/tambah_level')?>" method="post"
							class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Level :
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="nama_level" required="required"
										class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

			<!-- Modal Edit Data Level Admin-->
			<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4><strong>Edit Data Level Admin</strong></h4>
						</div>
						<div class="modal-body">
							<br />
							<form action="<?=base_url('admin_home/edit_level')?>" method="post"
								class="form-horizontal form-label-left">

								<input type="hidden" id="id_level" name="id_level" required="required"
									class="form-control col-md-7 col-xs-12">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Level :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="nama_level" name="nama_level" required="required"
											class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
									<input type="submit" name="edit" value="Simpan" class="btn btn-primary">
								</div>
							</form>
					</div>	
				 </div>
				</div>
			</div>

			<!--  Konfirmasi Hapus Level Admin -->
			<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h3><strong>Hapus Data Level Admin</strong></h3>
						</div>
						<div class="modal-body">
							<h4>Anda Yakin Ingin Menghapus Level Admin ?</h4>
						</div>
						<form action="<?=base_url('admin_home/hapus_level')?>" method="post"
							class="form-horizontal form-label-left">

							<input type="hidden" id="id_level1" name="id_level" required="required"
								class="form-control col-md-7 col-xs-12">

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								<input type="submit" value="Konfirmasi" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
					
	
			</div>
		</div>

		<script type="text/javascript">
			function edit(a) {
				$.ajax({
					type: "post",
					url: "<?=base_url()?>admin_home/detail_level/" + a,
					dataType: "json",
					success: function (data) {
						$("#id_level").val(data.id_level);
						$("#id_level1").val(data.id_level);
						$("#nama_level").val(data.nama_level);
					}
				});
			}
		</script>
</body>

</html>
