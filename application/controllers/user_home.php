<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_user','user');
        if ($this->session->userdata('login')!=TRUE) {
                redirect('home','refresh');
        }elseif ($this->session->userdata('id_level')!=NULL) {
				    redirect('admin_home','refresh');
				}

    }

    public function tagihan()
    {
        $data['DataTagihan'] = $this->user->getDataTagihan();
        $data['judul'] = "PPOB | Halaman Data Tagihan Pelanggan";
        $data['konten'] = "user/v_tagihan";
        $this->load->view('v_template', $data);
    }


	public function upload_bukti()
	{
	     	$config['upload_path'] = './assets/bukti/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '20000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('bukti')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('user_home/tagihan','refresh');
			}
			else{
				$update=$this->user->update_bayar();
				if($update){
					$this->session->set_flashdata('pesan', 'Berhasil Mengupload Bukti Bayar');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal Mengupload Bukti');
				}
				redirect('user_home/tagihan','refresh');
			}
	}


}
