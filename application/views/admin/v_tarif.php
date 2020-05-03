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
			<center><strong>Halaman Tarif</strong></center>
		</h2><br>
		<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Tarif</a><br><br>

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
							<th>Kode Tarif</th>
							<th>Daya</th>
							<th>Tarif Per Kwh</th>
							<th>Beban</th>
							<th>Denda</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach ($DataTarif as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nama_tarif ?>
							</td>
							<td>
								<?=$data->daya ?></td>
							<td>
								<?= $data->terperkwh ?>
							</td>
							<td>
								<?=$data->beban ?>
							</td>
							<td>
								<?=$data->denda ?>
							</td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#" onclick="edit('<?=$data->id_tarif?>')">Edit</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#" onclick="edit('<?=$data->id_tarif?>')">Hapus</a>
								<?php if($data->status == 'Aktif'): ?>
								<a class="btn btn-warning" data-toggle="modal" data-target="#nonaktifkan" href="#" onclick="edit('<?=$data->id_tarif?>')">Non Aktifkan</a></td>
							<?php else: ?>
							<a class="btn btn-success" data-toggle="modal" data-target="#aktifkan" href="#" onclick="edit('<?=$data->id_tarif?>')">Aktifkan</a></td>
							<?php endif ?>
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
							<h4><strong>Tambah Data Tarif</strong></h4>
						</div>
						<div class="modal-body">
							<br />

							<form action="<?=base_url('admin_home/tambah_tarif')?>" method="post" class="form-horizontal form-label-left">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tarif :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="nama_tarif" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Daya :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="daya" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tarif Per KWH : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="terperkwh" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Beban : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="beban" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Denda : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="denda" required="required" class="form-control col-md-7 col-xs-12">
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
			  
			  <!-- Modal Edit Data Tarif-->
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

							<form action="<?=base_url('admin_home/edit_tarif')?>" method="post" class="form-horizontal form-label-left">
									
							<input type="hidden" id="id_tarif4" name="id_tarif" required="required" class="form-control col-md-7 col-xs-12">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tarif :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="nama_tarif" name="nama_tarif" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Daya :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="daya" name="daya" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tarif Per KWH : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="terperkwh" name="terperkwh" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Beban : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="beban" name="beban" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Denda : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" id="denda" name="denda" required="required" class="form-control col-md-7 col-xs-12">
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
						
				<!--  Konfirmasi Hapus Tarif -->
				<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <h3><strong>Hapus Data Tarif</strong></h3>
                        </div>
                        <div class="modal-body">
                            <h4>Anda Yakin Ingin Menghapus Tarif ?</h4>
                        </div>
                        <form action="<?=base_url('admin_home/hapus_tarif')?>" method="post" class="form-horizontal form-label-left">
                                    
                                    <input type="hidden" id="id_tarif" name="id_tarif" required="required" class="form-control col-md-7 col-xs-12">
            
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
			<script type="text/javascript">
				function edit(a) {
					$.ajax({
						type: "post",
						url: "<?=base_url()?>admin_home/data_tarif/" + a,
						dataType: "json",
						success: function (data) {
							$("#id_tarif").val(data.id_tarif);
							$("#id_tarif2").val(data.id_tarif);
							$("#id_tarif3").val(data.id_tarif);
							$("#id_tarif4").val(data.id_tarif);
							$("#nama_tarif").val(data.nama_tarif);
							$("#daya").val(data.daya);
							$("#terperkwh").val(data.terperkwh);
							$("#beban").val(data.beban);
							$("#denda").val(data.denda);
						}
					});
				}
			</script>
</body>

</html>