<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class M_master extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
	//--======================================== TEMPLATE ========================================================
	function data_karyawan() {        
		$this->db->select('k.*,j.namajabatan ');
		$this->db->from('datakaryawans k ');
		$this->db->join('masterjabatans j', 'k.idjabatankaryawan=j.id', 'left');	
		$this->db->order_by('k.namakaryawan','ASC');
		$data = $this->db->get();
		return $data->result();	
	}
	function tambah_karyawan() {
		$data = array ('namakaryawan'	 =>$this->input->post('karyawan-nama'),
						'jeniskelaminkaryawan'	=>$this->input->post('karyawan-jkel'),
						'tanggallahirkaryawan'		 =>$this->input->post('karyawan-tgl'),
						'alamatkaryawan'		   =>$this->input->post('karyawan-alamat'),
						'nohpkaryawan'		=>$this->input->post('karyawan-nohp'),
						'emailkaryawan' =>$this->input->post('karyawan-email'),
						'sosmedkaryawan'	   =>$this->input->post('karyawan-sosmed'),
						'nikkaryawan'	   =>$this->input->post('karyawan-nik'),
						'idjabatankaryawan'	=>$this->input->post('karyawan-jabatan')
					);
		$this->db->insert('datakaryawans',$data);
	}
	function edit_karyawan() {
		$id 	= $this->input->post('ekaryawan-id');
		$data = array ('namakaryawan'	 =>$this->input->post('ekaryawan-nama'),
		'jeniskelaminkaryawan'	=>$this->input->post('ekaryawan-jkel'),
		'tanggallahirkaryawan'		 =>$this->input->post('ekaryawan-tgl'),
		'alamatkaryawan'		   =>$this->input->post('ekaryawan-alamat'),
		'nohpkaryawan'		=>$this->input->post('ekaryawan-nohp'),
		'emailkaryawan' =>$this->input->post('ekaryawan-email'),
		'sosmedkaryawan'	   =>$this->input->post('ekaryawan-sosmed'),
		'nikkaryawan'	   =>$this->input->post('ekaryawan-nik'),
		'idjabatankaryawan'	=>$this->input->post('ekaryawan-jabatan')
	);
		$this->db->where('id', $id);
		$this->db->update('datakaryawans', $data);
	}	
	function hapus_karyawan(){
		$id 	= $this->input->post('dkaryawan-id');
		$this->db->where('id', $id);
		$this->db->delete('datakaryawans');
	}
	//--======================================== END TEMPLATE ========================================================


	
	function data_jabatan() {        
		$sql = $this->db->get("masterjabatans");
        return $sql->result();
	}
	function tambah_jabatan() {
		$data = array ('namajabatan'	 =>$this->input->post('jabatan-jabatan')
					);
		$this->db->insert('masterjabatans',$data);
	}
	function edit_jabatan() {
		$id 	= $this->input->post('ejabatan-id');
		$data = array ('namajabatan'=>$this->input->post('ejabatan-jabatan')
	);
		$this->db->where('id', $id);
		$this->db->update('masterjabatans', $data);
	}	
	function hapus_jabatan(){
		$id 	= $this->input->post('djabatan-id');
		$this->db->where('id', $id);
		$this->db->delete('masterjabatans');
	}



	function data_hewan() {        
		$sql = $this->db->get("masterhewans");
        return $sql->result();
	}
	function data_rashewan() {        
		$sql = $this->db->get("masterrashewans");
        return $sql->result();
	}
	function data_sosmed() {        
		$sql = $this->db->get("mastersosmeds");
        return $sql->result();
	}
	function data_types() {        
		$sql = $this->db->get("mastertypes");
        return $sql->result();
	}
	function data_users() {        
		$sql = $this->db->get("masterusers");
        return $sql->result();
	}
	
	//Edit from this point
	
	function GetDataKecamatan() {
        $sql = $this->db->get("kecamatan");
        return $sql->result();
	}
	
	function GetDataPuskesmas() {
        $sql = $this->db->get("ref_healthservices");
        return $sql->result();
	}
	
	function GetDataPoli() {
        $this->db->select('*');
		$this->db->from('ref_clinics');
		$this->db->where('active',1);
		$data = $this->db->get();
		return $data->result();
	}
	
	function GetDataPoli_d() {
        $this->db->select('*');
		$this->db->from('setting a');
		$this->db->join('ref_clinics d', 'a.id_poli = d.id', 'left');
		$this->db->where('a.status',1);
		$this->db->where('d.active',1);
		$data = $this->db->get();
		return $data->result();
	}
	
	function m_kecamatan() {
       $data = array('nama_kecamatan' => $this->input->post('nama'));
	   $this->db->insert('kecamatan',$data);
	}
	
	function data_kecamatan() {
       $data = $this->db->get('kecamatan');
	   return $data->result();
	}
	
	function m_edit_kecamatan(){
		$id 	= $this->input->post('id');
		$data 	= array('nama_kecamatan' => $this->input->post('nm_kec'));
		$this->db->where('id_kecamatan', $id);
		$this->db->update('kecamatan', $data);
	}
	
	function m_delete_kecamatan(){
		$id 	= $this->input->post('id');
		$this->db->where('id_kecamatan', $id);
		$this->db->delete('kecamatan');
	}
	
	function m_puskesmas() {
       $data = array('code' => $this->input->post('kode'),
	   				 'name' => $this->input->post('nama'),
					 'jenis' => $this->input->post('jenis'),
	   				 'id_kecamatan'=>$this->input->post('kecamatan'));
	   $this->db->insert('ref_healthservices',$data);
	}
	
	function data_puskesmas() {
		$this->db->select('*');
		$this->db->from('ref_healthservices a');
		$this->db->join('kecamatan b', 'a.id_kecamatan = b.id_kecamatan', 'left');
		$this->db->order_by('id', 'DESC');
        $data = $this->db->get();
	    return $data->result();
	}
	
	function edit_puskesmas() {
		$this->db->select('*');
		$this->db->from('ref_healthservices a');
		$this->db->join('kecamatan b', 'a.id_kecamatan = b.id_kecamatan', 'left');
		$this->db->where('a.id', $_GET['id']);
        $data = $this->db->get();
	    return $data->result();
	}
	
	function m_edit_puskesmas() {
		$id 	= $this->input->post('id');
		$data 	= array( 'code' 			=> $this->input->post('kode'),
						  'name' 			=> $this->input->post('nama'),
						  'jenis'		   => $this->input->post('jenis'),
						  'id_kecamatan'	=> $this->input->post('kecamatan'));
		$this->db->where('id', $id);
		$this->db->update('ref_healthservices', $data);
	}
	
	function m_delete_puskesmas(){
		$id 	= $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('ref_healthservices');
	}
	
	function m_poli() {
       $data = array('id' => $this->input->post('id'),
	   				 'name' => $this->input->post('nama'),
	   				 'active' => $this->input->post('act'));
	   $this->db->insert('ref_clinics',$data);
	}
	
	function dt_poli() {
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$data = $this->db->get('ref_clinics');
		return $data->result();
	}
	
	function data_poli() {
		$this->db->order_by('id', 'DESC');
		$data = $this->db->get('ref_clinics');
		return $data->result();
	}
	
	function m_edit_poli() {
	   $this->db->where('id', $this->input->post('id'));
       $data = array('name' => $this->input->post('nama'),
	   				 'active' => $this->input->post('act'));
	   $this->db->update('ref_clinics',$data);
	}
	
	function m_delete_poli() {
	   $this->db->where('id', $this->input->post('id'));
	   $this->db->delete('ref_clinics');
	}
	
	function m_add_account(){
		$data = array ('code_puskesmas'	=> $this->input->post('pus'),
					   'nip'	  => $this->input->post('nip'),
					   'nama'     => $this->input->post('nama'),
					   'hp'	   => $this->input->post('hp'),
					   'status'   => 2,
					   'username' => $this->input->post('username'),
					   'password' => md5($this->input->post('password')));
		$this->db->insert('admin', $data);
	}
	
	function m_data_petugas(){
		$this->db->select('a.*, b.name');
		$this->db->from('admin a');
		$this->db->join('ref_healthservices b', 'a.code_puskesmas = b.code', 'left');
		$this->db->where('a.status !=',1);
		$data = $this->db->get();
		return $data->result();
	}
	
	function m_dt_petugas(){
		$this->db->select('a.*, b.name');
		$this->db->from('admin a');
		$this->db->join('ref_healthservices b', 'a.code_puskesmas = b.code', 'left');
		$this->db->where('a.id',$_GET['id']);
		$data = $this->db->get();
		return $data->result();
	}
	
	function m_edit_petugas(){
		$data = array ('code_puskesmas'	=> $this->input->post('pus'),
					   'nip'	  => $this->input->post('nip'),
					   'nama'     => $this->input->post('nama'),
					   'hp'	   => $this->input->post('hp'),
					   'username' => $this->input->post('username'),
					   'password' => md5($this->input->post('password')));
		$this->db->where('id', $_SESSION['id']);
		$this->db->update('admin', $data);
	}
	
	function m_delete_petugas() {
	   $this->db->where('id', $this->input->post('id'));
	   $this->db->delete('admin');
	}
	
	function data_setting() {
	    $this->db->select('a.*, b.*, c.name as nama_puskesmas, d.name as nama_poli');
		$this->db->from('setting a');
		$this->db->join('kecamatan b', 'a.id_kecamatan = b.id_kecamatan', 'left');
		$this->db->join('ref_healthservices c', 'a.id_puskesmas = c.code', 'left');
		$this->db->join('ref_clinics d', 'a.id_poli = d.id', 'left');
		$this->db->order_by('a.id_setting','DESC');
		$data = $this->db->get();
		return $data->result();
	}
	
	function dt_setting() {
	    $this->db->select('a.*, b.*, c.name as nama_puskesmas, d.name as nama_poli');
		$this->db->from('setting a');
		$this->db->join('kecamatan b', 'a.id_kecamatan = b.id_kecamatan', 'left');
		$this->db->join('ref_healthservices c', 'a.id_puskesmas = c.code', 'left');
		$this->db->join('ref_clinics d', 'a.id_poli = d.id', 'left');
		$this->db->order_by('a.id_setting','DESC');
		$this->db->where('a.id_setting',$_GET['id']);
		$data = $this->db->get();
		return $data->result();
	}
	
	function m_newSetting() {
		$data = array ('id_kecamatan'	 =>$this->input->post('kecamatan'),
						'id_puskesmas'	=>$this->input->post('puskesmas'),
						'id_poli'		 =>$this->input->post('poli'),
						'kuota'		   =>$this->input->post('kuota'),
						'jam_buka'		=>$this->input->post('jam_buka'),
						'waktu_pelayanan' =>$this->input->post('wkt_pelayanan'),
						'tgl_aktif'	   =>$this->input->post('tgl_aktif'),
						'tgl_nonaktif'	=>$this->input->post('tgl_nonaktif'),
						'status'		  =>$this->input->post('status'));
		$this->db->insert('setting',$data);
	}
	
	function m_edit_setting(){
		$data = array ('kuota' 			=> $this->input->post('kuota_edit'),
						'jam_buka' 		=> $this->input->post('jam_buka_edit'),
						'waktu_pelayanan' => $this->input->post('wkt_pelayanan_edit'),
						'tgl_aktif'	   => $this->input->post('tgl_aktif_edit'),
						'tgl_nonaktif'	=> $this->input->post('tgl_nonaktif_edit'),
						'status'		  => $this->input->post('status_edit'),
						'status_tgl'	  => $this->input->post('status_tgl_edit') );
		$this->db->where('id_setting', $this->input->post('id_setting'));
		$this->db->update('setting', $data);
	}
	
	function m_delete_setting() {
	   $this->db->where('id_setting', $this->input->post('id'));
	   $this->db->delete('setting');
	}
	
	function antrian_queue(){
		$cari = $_GET['c'];
		if($cari=='yes'){
			$tgl     = $this->input->post('tgl');
			$this->db->where('a.tgl_berkunjung', $tgl);
		}else{
			$this->db->where('a.tgl_berkunjung', date('Y-m-d'));
		}
		$this->db->select('a.*, c.name as nama_puskesmas, c.code as kode, d.name as nama_poli');
		$this->db->from('antrian a');
		$this->db->join('ref_healthservices c', 'a.id_puskesmas = c.code', 'left');
		$this->db->join('ref_clinics d', 'a.id_poli = d.id', 'left');
		$this->db->order_by("a.id_pasien","desc");
		$data = $this->db->get();
		return $data->result();
	}
	
	function antrian_cetak(){
		$this->db->select('a.*, b.*, c.name as nama_puskesmas, c.code as id_puskesmas, d.name as nama_poli, d.id as id_poli');
		$this->db->from('antrian a');
		$this->db->join('kecamatan b', 'a.id_kecamatan = b.id_kecamatan', 'left');
		$this->db->join('ref_healthservices c', 'a.id_puskesmas = c.code', 'left');
		$this->db->join('ref_clinics d', 'a.id_poli = d.id', 'left');
		$this->db->where('a.no_identitas',$_GET['id']);
		$this->db->where('a.id_kecamatan',$_GET['kec']);
		$this->db->where('a.id_puskesmas',$_GET['pus']);
		$this->db->where('a.id_poli',$_GET['pol']);
		$this->db->where('a.tgl_berkunjung',$_GET['tgl']);
		$data = $this->db->get();
		return $data->result();
	}
	
	function setting_puskesmas() {
	   $this->db->where('id', $_SESSION['IdPuskesmas']);
	   $query = $this->db->get('nama_puskesmas');
	   return $query->result();
	}
	
	function edit_namaPuskesmas() {
	   $this->db->where('id', $_SESSION['IdPuskesmas']);
	   $this->db->update('nama_puskesmas', array('nama_puskesmas'=>$this->input->post('nama')));
	   $this->session->unset_userdata('NamePuskesmas');
	   $sess['NamePuskesmas']=$this->input->post('nama');
	   $this->session->set_userdata($sess);
	}
	
}

?>