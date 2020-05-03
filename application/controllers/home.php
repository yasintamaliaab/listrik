<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->model('m_user','user');
        if ($this->session->userdata('login')!=TRUE) {
                redirect('user/login','refresh');
        }

    }

	public function index()
	{
		if ($this->session->userdata('id_level')!=NULL) {
				redirect('admin_home','refresh');
		}
		else{
            $data['DataTagihan'] = $this->user->getDataTagihan();
            $data['judul'] = "PPOB | Halaman Data Tagihan Pelanggan";
            $data['konten'] = "user/v_tagihan";
            $this->load->view('v_template', $data);
		}
	}

	public function logout_user()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Sukses Keluar Akun');
        redirect('user/login','refresh');
	}

	public function logout_admin()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Sukses Keluar Akun');
        redirect('admin/login','refresh');
    }

}
