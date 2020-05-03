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
			<center><strong>Halaman Konfirmasi Pembayaran</strong></center>
		</h2><br>

		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			<p><center><font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font></center></p>
				<table id="tabletarif" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Nama Pelanggan</th>
							<th>Nomor KWH</th>
							<th>Tanggal</th>
							<th>Bulan Bayar</th>
							<th>Total Bayar</th>
							<th>Bukti</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach ($DataPembayaran as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nomor_kwh ?>
							</td>
							<td>
								<?=$data->nama_pelanggan ?>
							</td>
							<td>
								<?=$data->tanggal_pembayaran ?>
							</td>
							<td>
								<?=$data->bulan_bayar ?>
							</td>
							<td>
								<?=$data->total_bayar ?>
							</td>
							<td>
								<img src="<?=base_url('assets/bukti/'.$data->bukti )?>" width="60px;">
							</td>
							<td>
								<?=$data->status ?>
							</td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#terima" href="#"
									onclick="edit('<?=$data->id_pembayaran?>')"> Konfirmasi</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#tolak" href="#"
									onclick="edit('<?=$data->id_pembayaran?>')">Tolak</a></td>
							</td>
						</tr>
						<?php } ?>
						</tfoot>
				</table>
			</div>
		</div>


		<!--  Konfirmasi Terima Pembayaran -->
		<div class="modal fade" id="terima" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h3><strong>Konfirmasi Pembayaran</strong></h3>
					</div>
					<div class="modal-body">
						<h4>Anda Yakin Ingin Mengonfirmasi ?</h4>
					</div>
					<form action="<?=base_url('admin_home/konfirmasi_pembayaran')?>" method="post"
						class="form-horizontal form-label-left">

						<input type="hidden" id="id_pembayaran" name="id_pembayaran" required="required"
							class="form-control col-md-7 col-xs-12">

						<input type="hidden" id="id_tagihan" name="id_tagihan" required="required"
							class="form-control col-md-7 col-xs-12">

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<input type="submit" value="Konfirmasi" class="btn btn-primary">
						</div>
				</div>
				</form>
			</div>
		</div>

		<!--  Konfirmasi Non Aktifkan Tarif -->
		<div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h3><strong>Tolak Pembayaran</strong></h3>
					</div>
					<div class="modal-body">
						<h4>Anda Yakin Ingin Menolak Pembayaran ?</h4>
					</div>
					<form action="<?=base_url('admin_home/tolak_pembayaran')?>" method="post"
						class="form-horizontal form-label-left">

						<input type="hidden" id="id_pembayaran1" name="id_pembayaran" required="required"
							class="form-control col-md-7 col-xs-12">

						<input type="hidden" id="id_tagihan1" name="id_tagihan" required="required"
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
	<script type="text/javascript">
		function edit(a) {
			$.ajax({
				type: "post",
				url: "<?=base_url()?>admin_home/data_pembayaran/" + a,
				dataType: "json",
				success: function (data) {
					$("#id_pembayaran").val(data.id_pembayaran);
					$("#id_pembayaran1").val(data.id_pembayaran);
					$("#id_tagihan").val(data.id_tagihan);
					$("#id_tagihan1").val(data.id_tagihan);
				}
			});
		}
	</script>
</body>

</html>
