<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function get_login(){
        $password = md5($this->input->post('password'));
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $password);
        return $this->db->get();
    }

    public function getDataAdmin(){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('level','level.id_level=admin.id_level');
        return $this->db->get()->result();
    }

    public function tambah_admin(){
        $password=$this->input->post('password');
        $datasimpan=array(
            'nama_admin'=>$this->input->post('nama_admin'),
            'username'=>$this->input->post('username'),
            'password'=>md5($password),
            'id_level'=>$this->input->post('id_level')
        );
        $this->db->insert('admin',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function detail_admin($a)
	{
        return $this->db
                    ->where('id_admin', $a)
                    ->get('admin')
                    ->row();
    }

    public function edit_admin()
    {
        $data = array(
            'nama_admin' => $this->input->post('nama_admin'),
            'username'=>$this->input->post('username'),
            'id_level'=>$this->input->post('id_level'),
        );

        return $this->db->where('id_admin', $this->input->post('id_admin'))
                    ->update('admin', $data);
    }

    public function hapus_admin(){
        $this->db->where('id_admin', $this->input->post('id_admin'));
        $this->db->delete('admin');
    }

    public function getDataLevel(){
        $this->db->select('*');
        $this->db->from('level');
        return $this->db->get()->result();
    }

    public function detail_level($a)
	{
        return $this->db
                    ->where('id_level', $a)
                    ->get('level')
                    ->row();
    }

    public function tambah_level(){
        $datasimpan=array(
            'nama_level'=>$this->input->post('nama_level'),
        );
        $this->db->insert('level',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit_level()
    {
        $data = array(
            'nama_level' => $this->input->post('nama_level'),
        );

        return $this->db->where('id_level', $this->input->post('id_level'))
                    ->update('level', $data);
    }

    public function hapus_level(){
        $this->db->where('id_level', $this->input->post('id_level'));
        $this->db->delete('level');
    }

    public function getDataTarif(){
        $this->db->select('*');
        $this->db->from('tarif');
        return $this->db->get()->result();
    }

    public function tambah_tarif(){
        $nama_tarif=$this->input->post('nama_tarif');
        $daya=$this->input->post('daya');
        $terperkwh=$this->input->post('terperkwh');
        $beban=$this->input->post('beban');
        $denda=$this->input->post('denda');
        $datasimpan=array(
            'nama_tarif'=>$nama_tarif,
            'daya'=>$daya,
            'terperkwh'=>$terperkwh,
            'beban'=>$beban,
            'denda'=>$denda,
            'status'=> "Aktif"
        );
        $this->db->insert('tarif',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function data_tarif($a)
	{
        return $this->db
                    ->where('id_tarif', $a)
                    ->get('tarif')
                    ->row();
    }

    public function hapus_tarif(){
        $this->db->where('id_tarif', $this->input->post('id_tarif'));
        $this->db->delete('tarif');
    }

    public function aktif_tarif(){

        $data = array(
            'status' => "Aktif"
        );

        $this->db->where('id_tarif', $this->input->post('id_tarif'))
                 ->update('tarif', $data);
    }

    public function nonaktif_tarif(){
        $data = array(
            'status' => "Non Aktif"
        );

        $this->db->where('id_tarif', $this->input->post('id_tarif'))
                 ->update('tarif', $data);
    }

    public function edit_tarif()
    {
        $data = array(
            'nama_tarif' => $this->input->post('nama_tarif'),
            'daya'=>$this->input->post('daya'),
            'terperkwh'=>$this->input->post('terperkwh'),
            'beban'=>$this->input->post('beban'),
            'denda'=>$this->input->post('denda')
        );

        return $this->db->where('id_tarif', $this->input->post('id_tarif'))
                    ->update('tarif', $data);
    }

    public function getDataPelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->join('tarif','tarif.id_tarif=pelanggan.id_tarif');
        return $this->db->get()->result();
    }

    public function data_pelanggan($a)
  	{
        return $this->db
                    ->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
                    ->where('id_pelanggan', $a)
                    ->get('pelanggan')
                    ->row();
    }

    public function tambah_pelanggan(){
        $nama_pelanggan= $this->input->post('nama_pelanggan');
        $nomor_kwh =$this->input->post('nomor_kwh');
        $alamat= $this->input->post('alamat');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $id_tarif=$this->input->post('id_tarif');
        $datasimpan=array(
            'nama_pelanggan'=>$nama_pelanggan,
            'nomor_kwh'=>$nomor_kwh,
            'alamat'=>$alamat,
            'username'=>$username,
            'password'=>md5($password),
            'id_tarif'=>$id_tarif,
            'status_pelanggan'=> "Aktif"
        );
        $this->db->insert('pelanggan',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit_pelanggan()
    {
        $nama_pelanggan=$this->input->post('nama_pelanggan');
        $nomor_kwh=$this->input->post('nomor_kwh');
        $alamat=$this->input->post('alamat');
        $username=$this->input->post('username');
        $id_tarif=$this->input->post('id_tarif');
        $datasimpan=array(
            'nama_pelanggan'=>$nama_pelanggan,
            'nomor_kwh'=>$nomor_kwh,
            'alamat'=>$alamat,
            'username'=>$username,
            'id_tarif'=>$id_tarif,
        );
        return $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'))
                    ->update('pelanggan', $datasimpan);
    }

    public function hapus_pelanggan(){
        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
        $this->db->delete('pelanggan');
    }

    public function aktif_pelanggan(){

        $data = array(
            'status' => "Aktif"
        );

        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'))
                 ->update('pelanggan', $data);
    }

    public function nonaktif_pelanggan(){
        $data = array(
            'status' => "Non Aktif"
        );

        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'))
                 ->update('pelanggan', $data);
    }

    public function getDataPembayaran()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->where('pembayaran.status', 'Belum Dikonfirmasi');
        $this->db->join('tagihan','tagihan.id_tagihan=pembayaran.id_tagihan');
        $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan');
        return $this->db->get()->result();
    }

    public function data_pembayaran($a)
    {
      return $this->db
                  ->where('id_pembayaran', $a)
                  ->get('pembayaran')
                  ->row();
    }

    public function konfirmasi_pembayaran(){

        $data = array(
            'status' => "Lunas",
            'id_admin' => $this->session->userdata('id_admin')
        );

        $this->db->where('id_pembayaran', $this->input->post('id_pembayaran'))
                 ->update('pembayaran', $data);

        $datatag = array(
            'status' => "Lunas",
        );

        $this->db->where('id_tagihan', $this->input->post('id_tagihan'))
                 ->update('tagihan', $datatag);

        if($this->db->affected_rows() > 0){
          return TRUE;
          } else {
          return FALSE;
        }
    }

    public function tolak_pembayaran(){

        $data = array(
            'status' => "Pembayaran Ditolak",
            'id_admin' => $this->session->userdata('id_admin')
        );

        $this->db->where('id_pembayaran', $this->input->post('id_pembayaran'))
                 ->update('pembayaran', $data);

        $datatag = array(
            'status' => "Pembayaran Ditolak Silahkan Upload Lagi"
        );
        $this->db->where('id_tagihan', $this->input->post('id_tagihan'))
                 ->update('tagihan', $datatag);

        if($this->db->affected_rows() > 0){
          return TRUE;
          } else {
          return FALSE;
        }
    }

    public function getDataPenggunaan($id)
    {
        $this->db->select('*');
        $this->db->from('penggunaan');
        $this->db->where('penggunaan.id_pelanggan', $id);
        $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan');
        return $this->db->get()->result();
    }

    public function cek_penggunaan()
	{
		$cek=$this->db->where('bulan',$this->input->post('bulan'))
					->where('tahun',$this->input->post('tahun'))
					->where('id_pelanggan',$this->input->post('id_pelanggan'))
					->get('penggunaan');
		if($cek->num_rows()>0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

    public function tambah_penggunaan()
    {
     $data_Penggunaan=array(
       'id_pelanggan'=>$this->input->post('id_pelanggan'),
       'bulan'=>$this->input->post('bulan'),
       'tahun'=>$this->input->post('tahun'),
       'meter_awal'=>$this->input->post('meter_awal'),
       'meter_akhir'=>$this->input->post('meter_akhir')
     );
     $this->db->insert('penggunaan', $data_Penggunaan);

     $tm_penggunaan=$this->db
             ->where('id_pelanggan',$this->input->post('id_pelanggan'))
             ->order_by('id_penggunaan','desc')
             ->limit(1)
             ->get('penggunaan')->row();

     $data_tagihan=array(
       'id_penggunaan'=>$tm_penggunaan->id_penggunaan,
       'status'=>$this->input->post('status'),
       'bulan'=>$this->input->post('bulan'),
       'tahun'=>$this->input->post('tahun'),
       'jumlah_meter'=>($this->input->post('meter_akhir') - $this->input->post('meter_awal')),
       'status'=> 'Belum Dibayar'
     );
     $this->db->insert('tagihan', $data_tagihan);

     if($this->db->affected_rows() > 0){
       return TRUE;
     } else {
       return FALSE;
     }
   }

   public function data_penggunaan($a)
   {
       return $this->db
                   ->where('id_penggunaan', $a)
                   ->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
                   ->get('penggunaan')
                   ->row();
   }

   public function edit_penggunaan()
   {
       $datasimpan=array(
           'bulan'=>$this->input->post('bulan'),
           'tahun'=>$this->input->post('tahun'),
           'meter_awal'=>$this->input->post('meter_awal'),
           'meter_akhir'=>$this->input->post('meter_akhir')
       );
       $this->db->where('id_penggunaan', $this->input->post('id_penggunaan'))
                   ->update('penggunaan', $datasimpan);

      $meter = (($this->input->post('meter_akhir'))-($this->input->post('meter_awal')));
      $updatemeter=array(
            'jumlah_meter'=> $meter
      );
      $this->db->where('id_penggunaan', $this->input->post('id_penggunaan'))
               ->update('tagihan', $updatemeter);
   }

   public function getDataTagihan($id)
   {
       $this->db->select('*');
       $this->db->from('tagihan');
       $this->db->where('id_pelanggan', $id);
       $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
       return $this->db->get()->result();
   }

   public function getDataRiwayat()
   {
       $this->db->select('
           pelanggan.nomor_kwh,
           pelanggan.nama_pelanggan,
           pembayaran.tanggal_pembayaran,
           pembayaran.bulan_bayar,
           pembayaran.biaya_admin,
           pembayaran.total_bayar,
           pembayaran.status,
           pembayaran.bukti,
           admin.nama_admin');
       $this->db->from('pembayaran');
       $this->db->where('pembayaran.status !=', '');
       $this->db->order_by('id_pembayaran', 'desc');
       $this->db->join('admin','admin.id_admin=pembayaran.id_admin');
       $this->db->join('tagihan','tagihan.id_tagihan=pembayaran.id_tagihan');
       $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
       $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan');
       return $this->db->get()->result();
   }

}

?>
