<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_home extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->model('m_admin','admin');
        if ($this->session->userdata('login')!=TRUE) {
						redirect('admin/login','refresh');
				}elseif ($this->session->userdata('id_level')==FALSE) {
				    redirect('home','refresh');
				}
		}

		public function index()
    {
        $data['DataAdmin'] = $this->admin->getDataAdmin();
				$data['DataLevel'] = $this->admin->getDataLevel();
        $data['judul'] = "PPOB | Halaman Data Admin";
				$data['konten'] = "admin/v_admin";
				$this->load->view('v_template', $data);
    }

		public function data_admin()
    {
        $data['DataAdmin'] = $this->admin->getDataAdmin();
				$data['DataLevel'] = $this->admin->getDataLevel();
        $data['judul'] = "PPOB | Halaman Data Admin";
				$data['konten'] = "admin/v_admin";
				$this->load->view('v_template', $data);
    }

	 public function tambah_admin()
	 {
				$this->admin->tambah_admin();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Admin');
				redirect('admin_home/data_admin');
	 }

	 public function detail_admin($id)
	 {
				$data = $this->admin->detail_admin($id);
				echo json_encode($data);
	 }

	 public function edit_admin()
	 {
				$this->admin->edit_admin();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Admin');
				redirect('admin_home/data_admin');
	 }

	 public function hapus_admin()
	 {
				$this->admin->hapus_admin();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Admin');
				redirect('admin_home/data_admin');
	 }

	 public function data_level()
	 {
			 $data['DataLevel'] = $this->admin->getDataLevel();
			 $data['judul'] = "PPOB | Halaman Data Level Admin";
			 $data['konten'] = "admin/v_level";
			 $this->load->view('v_template', $data);
	 }

	 public function detail_level($id)
	 {
				$data = $this->admin->detail_level($id);
				echo json_encode($data);
	 }


	 public function tambah_level()
	 {
				$this->admin->tambah_level();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Level Admin');
				redirect('admin_home/data_level');
	 }

	 public function edit_level()
	 {
				$this->admin->edit_level();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Level Admin');
				redirect('admin_home/data_level');
	 }

	 public function hapus_level()
	 {
				$this->admin->hapus_level();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Level Admin');
				redirect('admin_home/data_level');
	 }

    public function tarif()
    {
        $data['DataTarif'] = $this->admin->getDataTarif();
        $data['judul'] = "PPOB | Halaman Tarif";
				$data['konten'] = "admin/v_tarif";
				$this->load->view('v_template', $data);
    }

     public function tambah_tarif()
    {
        if($this->input->post('tambah')){
            $this->admin->tambah_tarif();
            $this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Tarif');
            redirect('admin_home/tarif');
        }
    }

    public function data_tarif($id){
				$data=$this->admin->data_tarif($id);
				echo json_encode($data);
    }

    public function hapus_tarif()
    {
        $this->admin->hapus_tarif();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Tarif');
				redirect('admin_home/tarif');
    }

    public function aktif_tarif()
    {
      $this->admin->aktif_tarif();
			$this->session->set_flashdata('pesan_sukses', 'Sukses Mengaktifkan Tarif');
			redirect('admin_home/tarif');
    }

    public function nonaktif_tarif()
    {
        $this->admin->nonaktif_tarif();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menonaktifkan Tarif');
				redirect('admin_home/tarif');
    }

    public function edit_tarif()
    {
        $this->admin->edit_tarif();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Tarif');
				redirect('admin_home/tarif');
    }

    public function pelanggan()
    {
        $data['DataPelanggan'] = $this->admin->getDataPelanggan();
				$data['DataTarif'] = $this->admin->getDataTarif();
        $data['judul'] = "PPOB | Halaman Data Pelanggan";
				$data['konten'] = "admin/v_pelanggan";
				$this->load->view('v_template', $data);
    }

		public function data_pelanggan($id){
				$data=$this->admin->data_pelanggan($id);
				echo json_encode($data);
    }

    public function tambah_pelanggan(){
				$data=$this->admin->tambah_pelanggan();
		    $this->session->set_flashdata('pesan_sukses', 'Sukses Menambahkan Data Pelanggan');
				redirect('admin_home/pelanggan');
    }

    public function edit_pelanggan()
    {
      $this->admin->edit_pelanggan();
			$this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Pelanggan');
			redirect('admin_home/pelanggan');
    }

		public function hapus_pelanggan()
		{
				$this->admin->hapus_pelanggan();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Pelanggan');
				redirect('admin_home/pelanggan');
		}

		public function pembayaran()
    {
        $data['DataPembayaran'] = $this->admin->getDataPembayaran();
        $data['judul'] = "PPOB | Halaman Data Pembayaran";
        $data['konten'] = "admin/v_pembayaran";
        $this->load->view('v_template', $data);
		}


		public function data_pembayaran($id){
			$data=$this->admin->data_pembayaran($id);
			echo json_encode($data);
	}

		public function konfirmasi_pembayaran(){
				$data=$this->admin->konfirmasi_pembayaran();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Mengonfirmasi Pembayaran');
				redirect('admin_home/pembayaran');
		}

		public function tolak_pembayaran(){
			$data=$this->admin->tolak_pembayaran();
			$this->session->set_flashdata('pesan_sukses', 'Sukses Menolak Pembayaran');
			redirect('admin_home/pembayaran');
    }

    public function riwayat()
    {
        $data['DataRiwayat'] = $this->admin->getDataRiwayat();
        $data['judul'] = "PPOB | Halaman Data Riwayat";
        $data['konten'] = "admin/v_riwayat";
        $this->load->view('v_template', $data);
    }

		public function penggunaan_listrik()
    {
        $data['DataPelanggan'] = $this->admin->getDataPelanggan();
        $data['DataTarif'] = $this->admin->getDataTarif();
        $data['judul'] = "PPOB | Halaman Penggunaan Listrik";
        $data['konten'] = "admin/v_penggunaan_listrik";
				$this->load->view('v_template', $data);
		}

	 public function tambah_penggunaan()
	 {
		 	if($this->admin->cek_penggunaan()==TRUE){
					$this->session->set_flashdata('pesan_sukses', 'Tagihan bulan ini sudah ada');
			 }
			 else{
				$proses=$this->admin->tambah_penggunaan();
				if($proses){
						$this->session->set_flashdata('pesan_sukses', 'Tambah penggunaan Berhasil');
				} else {
						$this->session->set_flashdata('pesansukses', 'Tambah penggunaan gagal');
				}
			}
			redirect('admin_home/penggunaan_listrik');
	 }

	 public function detail_penggunaan($id)
	{
		$data['DataPenggunaan'] = $this->admin->getDataPenggunaan($id);
		$data['judul'] = "PPOB | Halaman Data Penggunaan";
		$data['konten'] = "admin/v_penggunaan_detail";
		$this->load->view('v_template', $data);
	}

	public function data_penggunaan($id){
			$data=$this->admin->data_penggunaan($id);
			echo json_encode($data);
	}

	public function edit_penggunaan(){
			$data=$this->admin->edit_penggunaan();
			echo json_encode($data);
			$this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Penggunaan Pelanggan');
			redirect('admin_home/detail_penggunaan/'.$this->input->post('id_pelanggan'));
	}

	public function detail_tagihan($id)
	{
			$data['DataTagihan'] = $this->admin->getDataTagihan($id);
			$data['DataTarif'] = $this->admin->getDataTarif();
			$data['judul'] = "PPOB | Halaman Data Pelanggan";
			$data['konten'] = "admin/v_tagihan";
			$this->load->view('v_template', $data);
	}

}

?>
