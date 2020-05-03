<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function getDataTarif(){
        $this->db->select('*');
        $this->db->from('tarif');
        $this->db->where('status !=', 'Non Aktif');
        return $this->db->get()->result();
    }

    public function masuk(){
        $nama_pelanggan=$this->input->post('nama_pelanggan');
        $alamat=$this->input->post('alamat');
        $nomor_kwh=$this->input->post('nomor_kwh');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $datasimpan=array(
            'nama_pelanggan'=>$nama_pelanggan,
            'alamat'=>$alamat,
            'nomor_kwh'=>$nomor_kwh,
            'username'=>$username,
            'password'=>md5($password),
            'status_pelanggan'=>"Aktif",
            'id_tarif'=>$this->input->post('id_tarif')
        );
        $this->db->insert('pelanggan',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_login(){
        $password = $this->input->post('password');
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($password));
        return $this->db->get();
    }

    public function get_tarif(){
        $this->db->select('*');
        $this->db->from('tarif');
        return $this->db->get();
    }

    public function data_user($a)
	{
        return $this->db
                    ->where('id_pelanggan', $a)
                    ->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
                    ->get('pelanggan')
                    ->result();
    }

    public function getDataTagihan()
	{
        $this->db->select('
                tagihan.id_tagihan, 
                tagihan.bulan,
                tagihan.tahun,
                tagihan.jumlah_meter,
                tagihan.status,
                tarif.terperkwh
                ');
        $this->db->from('tagihan');
        $this->db->where('penggunaan.id_pelanggan',$this->session->userdata('id_pelanggan'));
        $this->db->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan');
        $this->db->join('tarif','tarif.id_tarif=pelanggan.id_tarif');
        $this->db->order_by('id_tagihan','desc');

        return $this->db->get()->result();
    }

    public function cek_pembayaran($id_tagihan)
	{
		return $this->db
			->where('id_tagihan',$id_tagihan)
			->get('pembayaran')->row();
    }
    
    public function update_bayar()
	{

		$cek_bayar=$this->db
				->where('id_tagihan',$this->input->post('id_tagihan'))
				->get('pembayaran');

		$dt_tagihan=$this->db
				->where('id_tagihan',$this->input->post('id_tagihan'))
				->get('tagihan')->row();

		$tarif_perkwh=$this->db->where('id_tarif',$this->session->userdata('id_tarif'))->get('tarif')->row();
		if($cek_bayar->num_rows()>0){
			$dt_bayar=$cek_bayar->row();
			$data=array(
				'bukti'=>$this->upload->data('file_name'),
				'status'=>'Belum Dikonfirmasi'
			);
            $this->db->where('id_pembayaran',$dt_bayar->id_pembayaran)
                     ->update('pembayaran',$data);
            
            $datatag=array(
				'status'=>'Belum Dikonfirmasi',
            );
            $this->db->where('id_tagihan', $this->input->post('id_tagihan'))
                     ->update('tagihan',$datatag);

            if($this->db->affected_rows() > 0){
                return TRUE;
            } else {
                return FALSE;
            }

		} else {
            $biaya_admin = 2500;
			$data=array(
				'id_tagihan'=>$this->input->post('id_tagihan'),
				'tanggal_pembayaran'=>date('Y-m-d'),
				'bulan_bayar'=>$dt_tagihan->bulan.'-'.$dt_tagihan->tahun,
				'biaya_admin'=> $biaya_admin,
				'total_bayar'=>( $biaya_admin +($dt_tagihan->jumlah_meter*$tarif_perkwh->terperkwh)),
				'status'=>'Belum Dikonfirmasi',
				'bukti'=>$this->upload->data('file_name'),
            );
            $this->db->insert('pembayaran',$data);
            
            $datatag=array(
				'status'=>'Belum Dikonfirmasi',
            );
            $this->db->where('id_tagihan', $this->input->post('id_tagihan'))
                     ->update('tagihan',$datatag);

            if($this->db->affected_rows() > 0){
                return TRUE;
            } else {
                return FALSE;
            }		
		}
	}



}

?>
