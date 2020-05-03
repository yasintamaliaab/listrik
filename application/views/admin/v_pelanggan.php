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

input[type="checkbox"], input[type="radio"]{
	position: absolute;
	right: 9000px;
}

/*Check box*/
input[type="checkbox"] + .label-text:before{
	content: "\f096";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 5px;
}

input[type="checkbox"]:checked + .label-text:before{
	content: "\f14a";
	color: #2980b9;
	animation: effect 250ms ease-in;
}

input[type="checkbox"]:disabled + .label-text{
	color: #aaa;
}

input[type="checkbox"]:disabled + .label-text:before{
	content: "\f0c8";
	color: #ccc;
}

/*Radio box*/

input[type="radio"] + .label-text:before{
	content: "\f10c";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 5px;
}

input[type="radio"]:checked + .label-text:before{
	content: "\f192";
	color: #8e44ad;
	animation: effect 250ms ease-in;
}

input[type="radio"]:disabled + .label-text{
	color: #aaa;
}

input[type="radio"]:disabled + .label-text:before{
	content: "\f111";
	color: #ccc;
}

/*Radio Toggle*/

.toggle input[type="radio"] + .label-text:before{
	content: "\f204";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 10px;
}

.toggle input[type="radio"]:checked + .label-text:before{
	content: "\f205";
	color: #16a085;
	animation: effect 250ms ease-in;
}

.toggle input[type="radio"]:disabled + .label-text{
	color: #aaa;
}

.toggle input[type="radio"]:disabled + .label-text:before{
	content: "\f204";
	color: #ccc;
}


@keyframes effect{
	0%{transform: scale(0);}
	25%{transform: scale(1.3);}
	75%{transform: scale(1.4);}
	100%{transform: scale(1);}
}
</style>
	<div class="container-fluid">
		<h2>
			<center><strong>Halaman Data Pelanggan</strong></center>
		</h2><br>
		<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Pelanggan</a><br><br>

		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			<p><center><font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font></center></p>
				<table id="tabletarif" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pelanggan</th>
                            <th>Username</th>
                            <th>Alamat</th>
							<th>Daya</th>
                            <th>Jenis Tarif</th>
							<th>Nomor KWH</th>

							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach ($DataPelanggan as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nama_pelanggan ?>
							</td>
							<td>
								<?=$data->username ?>
              </td>
							<td>
                <?=$data->alamat?>
							</td>
							<td>
                <?=$data->daya?>
							</td>
							<td>
                <?=$data->nama_tarif?>
							</td>
              <td>
                <?=$data->nomor_kwh?>
							</td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#" onclick="edit('<?=$data->id_pelanggan?>')">Edit</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#" onclick="edit('<?=$data->id_pelanggan?>')">Hapus</a>

						</tr>
						<?php } ?>
						</tfoot>
				  </table>
        </div>
      </div>

				<!-- Modal Tambah Tarif-->
				<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4><strong>Tambah Data Pelanggan</strong></h4>
						</div>
						<div class="modal-body">
							<br />

							<form action="<?=base_url('admin_home/tambah_pelanggan')?>" method="post" class="form-horizontal form-label-left">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pelanggan :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="nama_pelanggan" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Kwh : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="number" name="nomor_kwh" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Tarif : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
                            <select  class="form-control col-md-7 col-xs-12" name="id_tarif" required="required">
                                <option>Pilih Tarif</option>
                                  <?php foreach ($DataTarif as $data) {  ?>
                                      <option value="<?=$data->id_tarif?>"><?= $data->nama_tarif ?></option>
                                  <?php } ?>
                            </select>
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

                <div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="password" id="sp" name="password" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

                <div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
									<label>
											<input type="checkbox" name="check" type="checkbox" onclick="FPassword()"> <span class="label-text">Lihat Password</span>
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

			 <!-- Modal Edit Data Pelanggan-->
			 <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4><strong>Edit Data Tarif</strong></h4>
						</div>
						<div class="modal-body">
							<br />

							<form action="<?=base_url('admin_home/edit_pelanggan')?>" method="post" class="form-horizontal form-label-left">

							<input type="hidden" id="id_pelanggan" name="id_pelanggan" required="required" class="form-control col-md-7 col-xs-12">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pelanggan :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="nama_pelanggan" name="nama_pelanggan" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="alamat" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor KWH : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="nomor_kwh" name="nomor_kwh" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

									<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Tarif : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" id="id_tarif" name="id_tarif" required="required">
                        <option>Pilih Tarif</option>
                            <?php foreach ($DataTarif as $data) { ?>
                                  <option value="<?=$data->id_tarif?>"><?= $data->nama_tarif ?></option>
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

			 <!--  Konfirmasi Hapus Pelanggan -->
			 <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
									 <div class="modal-dialog" role="document">
											 <div class="modal-content">
											 <div class="modal-header">
													 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													 <span aria-hidden="true">&times;</span>
													 </button>
													 <h3><strong>Hapus Data Pelanggan</strong></h3>
											 </div>
											 <div class="modal-body">
													 <h4>Anda Yakin Ingin Menghapus Pelanggan ?</h4>
											 </div>
											 <form action="<?=base_url('admin_home/hapus_pelanggan')?>" method="post" class="form-horizontal form-label-left">

																	 <input type="text" id="id_pelanggan1" name="id_pelanggan" required="required" class="form-control col-md-7 col-xs-12">

																	 <div class="modal-footer">
																			 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
																			 <input type="submit" value="Konfirmasi" class="btn btn-primary">
																	 </div>
																	 </div>
																	 </form>
									 </div>
				 </div>

			 <!--  Konfirmasi Aktifkan Tarif -->
			 <div class="modal fade" id="aktifkan" tabindex="-1" role="dialog" aria-hidden="true">
									 <div class="modal-dialog" role="document">
											 <div class="modal-content">
											 <div class="modal-header">
													 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													 <span aria-hidden="true">&times;</span>
													 </button>
													 <h3><strong>Aktifkan Tarif</strong></h3>
											 </div>
											 <div class="modal-body">
													 <h4>Anda Yakin Ingin Mengaktifkan Tarif ?</h4>
											 </div>
											 <form action="<?=base_url('admin_home/aktif_tarif')?>" method="post" class="form-horizontal form-label-left">

																	 <input type="hidden" id="id_tarif2" name="id_tarif" required="required" class="form-control col-md-7 col-xs-12">

																	 <div class="modal-footer">
																			 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
																			 <input type="submit" value="Konfirmasi" class="btn btn-primary">
																	 </div>
																	 </div>
																	 </form>
									 </div>
				 </div>

			 <!--  Konfirmasi Non Aktifkan Tarif -->
			 <div class="modal fade" id="nonaktifkan" tabindex="-1" role="dialog" aria-hidden="true">
									 <div class="modal-dialog" role="document">
											 <div class="modal-content">
											 <div class="modal-header">
													 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													 <span aria-hidden="true">&times;</span>
													 </button>
													 <h3><strong>Non-Aktifkan Tarif</strong></h3>
											 </div>
											 <div class="modal-body">
													 <h4>Anda Yakin Ingin Menonaktifkan Tarif ?</h4>
											 </div>
											 <form action="<?=base_url('admin_home/nonaktif_tarif')?>" method="post" class="form-horizontal form-label-left">

																	 <input type="hidden" id="id_tarif3" name="id_tarif" required="required" class="form-control col-md-7 col-xs-12">

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
						url: "<?=base_url()?>admin_home/data_pelanggan/" + a,
						dataType: "json",
						success: function (data) {
							$("#id_pelanggan").val(data.id_pelanggan);
							$("#id_pelanggan1").val(data.id_pelanggan);
							$("#id_pelanggan2").val(data.id_pelanggan);
							$("#id_pelanggan3").val(data.id_pelanggan);
							$("#nama_pelanggan").val(data.nama_pelanggan);
							$("#username").val(data.username);
							$("#nomor_kwh").val(data.nomor_kwh);
							$("#alamat").val(data.alamat);
							$("#status_pelanggan").val(data.status_pelanggan);
							$("#nama_tarif").val(data.nama_tarif);
							$("#id_tarif").val(data.id_tarif);
						}
					});
				}
			</script>
</body>

</html>
