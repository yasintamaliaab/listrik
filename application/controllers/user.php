<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_user','user');
        if ($this->session->userdata('login')==TRUE) {
                redirect('home','refresh');
        }
    
    }


    public function register()
    {
        $data['DataTarif'] = $this->user->getDataTarif();
        $this->load->view('user/v_registrasi', $data);
	}

	public function login()
	{
		$this->load->view('user/v_login');
	}

    public function register_akun(){

		if($this->input->post('submit')){

            $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
            $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
            $this->form_validation->set_rules('nomor_kwh', 'nomor_kwh', 'trim|required');
            $this->form_validation->set_rules('username', 'username', 'trim|required');		
            $this->form_validation->set_rules('password', 'password', 'trim|required');
            
			if ($this->form_validation->run() == TRUE) {
				
				if($this->user->masuk()==TRUE){
				$this ->session->set_flashdata('pesan_sukses', 'Sukses Menyimpan Data Anda');
			
				redirect('user/login','refresh');
				}
			
				else{
				$this->session->set_flashdata('pesan_gagal', 'Gagal Menyimpan Data Anda');
				$this->load->view('user/register','refresh');
				}

			} 
			
			else {
					$this->session->set_flashdata('pesan_gagal', validation_errors());
					$this->load->view('user/register','refresh');
				 }

		}
		
    }

    public function proses_login(){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('username','username', 'trim|required');
            $this->form_validation->set_rules('password','password', 'trim|required');
            if($this->form_validation->run() ==TRUE){
               if($this->user->get_login()->num_rows()>0){
                   $data=$this->user->get_login()->row();
                    $array=array(
                        'login'=> TRUE,
                        'nama_pelanggan'=>$data->nama_pelanggan,
                        'id_pelanggan'=>$data->id_pelanggan,
                        'id_tarif'=>$data->id_tarif
                    );
                    $this->session->set_userdata($array);
                    $this->session->set_flashdata('pesan', 'Sukses Masuk Ke Akun');
                    redirect('home','refresh');
                }else{
                    $this->session->set_flashdata('pesan_gagal','Username Atau Password Yang Anda Masukkan Salah');
                    redirect('user/login','refresh');
                }
            }else{
                $this->session->set_flashdata('pesan_gagal',validation_errors());
                 redirect('user/login','refresh');
            }
        }
    }


}
