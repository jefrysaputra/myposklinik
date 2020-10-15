<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		// untuk login
		// if ($this->session->userdata('nama')=="") {
		// 		redirect('login');
		// 	}

		//load model
		 $this->load->model('M_master');
		// $this->load->model('Home_model');
	}
	

	public function index()
	{
		//$data['clinic'] = $this->Home_model->GetClinics();
		$data['title'] = 'Home';
		$data['isi'] = 'contents/index';
		$this->load->view('wrapper', $data);
	}

	//====================================================  TEMPLATE  ==============================================
	function karyawan_data()
	{
		$data['k'] = $this->M_master->data_karyawan();
		$data['j'] = $this->M_master->data_jabatan();
		$data['j2'] = $this->M_master->data_jabatan();
		$data['title'] = 'Data Karyawan';		
		$data['isi'] = 'contents/karyawan_data';
		$this->load->view('wrapper', $data);
	}	
	function karyawan_input()
	{		
		$this->M_master->tambah_karyawan();
		$this->session->set_flashdata('msg', "<script>		
		$(document).ready(function () {
			Toast.fire({
			icon: 'success',
			title: 'Data Karyawan berhasil masuk.'	
		  })
		});
		</script>");
		redirect('view/karyawan_data');
	}
	function karyawan_edit()
	{		
		$this->M_master->edit_karyawan();
		$this->session->set_flashdata('msg', "<script>		
		$(document).ready(function () {
			Toast.fire({
			icon: 'success',
			title: 'Data Karyawan berhasil diubah.'	
		  })
		});
		</script>");	
		redirect('view/karyawan_data');
	}

	function karyawan_hapus()
	{		
		$this->M_master->hapus_karyawan();
		$this->session->set_flashdata('msg', "<script>		
		$(document).ready(function () {
			Toast.fire({
			icon: 'success',
			title: 'Data Karyawan berhasil dihapus.'	
		  })
		});
		</script>");	
		redirect('view/karyawan_data');
	}
	//====================================================  END TEMPLATE  ==============================================

	function jabatan_data()
	{		
		$data['j'] = $this->M_master->data_jabatan();	
		$data['title'] = 'Data Jabatan';		
		$data['isi'] = 'contents/jabatan_data';
		$this->load->view('wrapper', $data);
	}	
	function jabatan_input()
	{		
		$this->M_master->tambah_jabatan();
		$this->session->set_flashdata('msg', "<script>		
		$(document).ready(function () {
			Toast.fire({
			icon: 'success',
			title: 'Data Jabatan berhasil masuk.'	
		  })
		});
		</script>");
		redirect('view/jabatan_data');
	}
	function jabatan_edit()
	{		
		$this->M_master->edit_jabatan();
		$this->session->set_flashdata('msg', "<script>		
		$(document).ready(function () {
			Toast.fire({
			icon: 'success',
			title: 'Data jabatan berhasil diubah.'	
		  })
		});
		</script>");	
		redirect('view/jabatan_data');
	}
	function jabatan_hapus()
	{		
		$this->M_master->hapus_jabatan();
		$this->session->set_flashdata('msg', "<script>		
		$(document).ready(function () {
			Toast.fire({
			icon: 'success',
			title: 'Data jabatan berhasil dihapus.'	
		  })
		});
		</script>");	
		redirect('view/jabatan_data');
	}




	// edit from this point
/*

	function kecamatan_input()
	{
		$data['title'] = 'Input Kecamatan';
		$data['isi'] = 'contents/kecamatan_input';
		$this->load->view('layout/wrapper', $data);
	}
	
	function kecamatan_data()
	{
		$data['k'] = $this->m_prosses->data_kecamatan();
		$data['title'] = 'Data Kecamatan';
		$data['isi'] = 'contents/kecamatan_data';
		$this->load->view('layout/wrapper', $data);
	}
	
	function puskesmas_input()
	{
		$data['d'] = $this->m_prosses->data_kecamatan();
		$data['title'] = 'Input Puskesmas';
		$data['isi'] = 'contents/puskesmas_input';
		$this->load->view('layout/wrapper', $data);
	}
	
	function puskesmas_data()
	{
		$data['k'] = $this->m_prosses->data_puskesmas();
		$data['title'] = 'Data Puskesmas';
		$data['isi'] = 'contents/puskesmas_data';
		$this->load->view('layout/wrapper', $data);
	}
	
	function puskesmas_edit()
	{
		$data['k'] = $this->m_prosses->edit_puskesmas();
		$data['d'] = $this->m_prosses->data_kecamatan();
		$data['title'] = 'Edit Puskesmas';
		$data['isi'] = 'contents/puskesmas_edit';
		$this->load->view('layout/wrapper', $data);
	}
	
	function poli_input()
	{
		$data['k'] = $this->m_prosses->dt_poli();
		$data['title'] = 'Input Poli';
		$data['isi'] = 'contents/poli_input';
		$this->load->view('layout/wrapper', $data);
	}
	
	function poli_data()
	{
		$data['k'] = $this->m_prosses->data_poli();
		$data['title'] = 'Data Poli';
		$data['isi'] = 'contents/poli_data';
		$this->load->view('layout/wrapper', $data);
	}
	
	function petugas_input()
	{
		$data['puskesmas'] = $this->m_prosses->data_puskesmas();
		$data['title'] = 'Tambah Petugas';
		$data['isi'] = 'contents/petugas_input';
		$this->load->view('layout/wrapper', $data);
	}
	
	function petugas_data()
	{
		$data['k'] = $this->m_prosses->m_data_petugas();
		$data['title'] = 'Data Petugas';
		$data['isi'] = 'contents/petugas_data';
		$this->load->view('layout/wrapper', $data);
	}
	
	function petugas_edit()
	{
		$data['pus'] = $this->m_prosses->setting_puskesmas();
		$data['k'] = $this->m_prosses->m_dt_petugas();
		$data['puskesmas'] = $this->m_prosses->data_puskesmas();
		$data['title'] = 'Edit Petugas';
		$data['isi'] = 'contents/petugas_edit';
		$this->load->view('layout/wrapper', $data);
	}
	
	function setting_input()
	{
		$data['kecamatan'] = $this->m_prosses->GetDataKecamatan();
		$data['puskesmas'] = $this->m_prosses->GetDataPuskesmas();
		$data['poli'] 	  = $this->m_prosses->GetDataPoli();
		$data['title'] = 'Tambah Setting';
		$data['isi'] = 'contents/setting_input';
		$this->load->view('layout/wrapper', $data);
	}
	
	function setting_data()
	{
		$data['setting'] = $this->m_prosses->data_setting();
		$data['title'] = 'Data Setting';
		$data['isi'] = 'contents/setting_data';
		$this->load->view('layout/wrapper', $data);
	}
	
	function setting_edit()
	{
		$data['kecamatan'] = $this->m_prosses->GetDataKecamatan();
		$data['puskesmas'] = $this->m_prosses->GetDataPuskesmas();
		$data['poli'] 	  = $this->m_prosses->GetDataPoli();
		$data['setting'] = $this->m_prosses->dt_setting();
		$data['title'] = 'Edit Setting';
		$data['isi'] = 'contents/setting_edit';
		$this->load->view('layout/wrapper', $data);
	}

	function pasien_data()
	{
		$data['queue'] = $this->m_prosses->antrian_queue();
		$data['title'] = 'Data Antrian';
		$data['isi'] = 'contents/antrian_data';
		$this->load->view('layout/wrapper', $data);
	}
	
	function pasien_cetak()
	{
		$data['k'] = $this->m_prosses->antrian_cetak();
		$data['title'] = 'Cetak Nomor Antrian';
		$data['isi'] = 'contents/antrian_cetak';
		$this->load->view('layout/wrapper', $data);
	}
	
	function daftar()
	{
		$data['kecamatan'] = $this->m_prosses->GetDataKecamatan();
		$data['puskesmas'] = $this->m_prosses->GetDataPuskesmas();
		$data['poli'] 	  = $this->m_prosses->GetDataPoli_d();
		$data['title'] = 'Pendaftaran';
		$data['isi'] = 'contents/daftar';
		$this->load->view('layout/wrapper', $data);
	}
	*/
	
}

?>