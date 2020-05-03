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
      <center><strong>Halaman Penggunaan Listrik</strong></center>
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
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>Alamat</th>
              <th>Nomor KWH</th>
              <th>Daya</th>
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
                <?=$data->alamat ?>
              </td>
              <td>
                <?=$data->nomor_kwh?>
              </td>
              <td>
                <?=$data->daya?> VA
              </td>


              <td>
                <a class="btn btn-primary" data-toggle="modal" data-target="#penggunaan" href="#" onclick="edit('<?=$data->id_pelanggan?>')">Tambah Penggunaan</a>
                <a class="btn btn-success" href="<?=base_url()?>admin_home/detail_Penggunaan/<?=$data->id_pelanggan?> ">Detail Penggunaan</a>
                <a class="btn btn-warning" href="<?=base_url()?>admin_home/detail_tagihan/<?=$data->id_pelanggan?>">Detail Tagihan</a></td>
            </tr>
            <?php } ?>
            </tfoot>
          </table>
        </div>
      </div>


        <!-- Modal Tambah Tarif-->
        <div class="modal fade" id="penggunaan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4><strong>Tambah Data Penggunaan</strong></h4>
            </div>
            <div class="modal-body">
              <br />

              <form action="<?=base_url('admin_home/tambah_penggunaan')?>" method="post" class="form-horizontal form-label-left">

                <input type="hidden" id="id_pelanggan" name="id_pelanggan" required="required" class="form-control col-md-7 col-xs-12">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pelanggan :
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" required="required" class="form-control col-md-7 col-xs-12" disabled>
                  </div>
                </div>

                <?php
                  $arr_bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bulan :
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="bulan" class="form-control col-md-7 col-xs-12">
                            <option></option>
                            <?php foreach ($arr_bulan as $key => $bulan): ?>
                              <option value="<?=$bulan?>"><?=$bulan?></option>
                            <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="tahun">
                      <option></option>
                      <?php
                      for($i=2019;$i<2030;$i++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Meter Awal : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="meter_awal" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Meter Akhir : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="meter_akhir" required="required" class="form-control col-md-7 col-xs-12">
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


      <script type="text/javascript">
        function edit(a) {
          $.ajax({
            type: "post",
            url: "<?=base_url()?>admin_home/data_pelanggan/" + a,
            dataType: "json",
            success: function (data) {
              $("#id_pelanggan").val(data.id_pelanggan);
              $("#nama_pelanggan").val(data.nama_pelanggan);
              $("#username").val(data.username);
              $("#nomor_kwh").val(data.nomor_kwh);
              $("#alamat").val(data.alamat);
              $("#status_pelanggan").val(data.status_pelanggan);
              $("#nama_tarif").val(data.nama_tarif);
            }
          });
        }
      </script>
</body>

</html>
