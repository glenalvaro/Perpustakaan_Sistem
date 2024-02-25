<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunguman_model extends CI_Model
{
	//ambil data pengunguman pada database untuk membuat pagination
 	public function get_hal_pengunguman($limit, $start)
 	{
      $this->db->order_by('id', 'DESC');
   	  $query = $this->db->get('tb_pengunguman', $limit, $start);
      return $query;
  	}

	//Membuat limit data saat tampil di dashboard
	public function getPengungumanDashboard()
	{
		$query = "SELECT * FROM `tb_pengunguman` ORDER BY `id` DESC LIMIT 2";
		return $this->db->query($query)->result_array();
	}

	public function detail_Pengunguman($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function createPengunguman()
	{
		helper_log("add", "Menambah data pengumuman");

		date_default_timezone_set('Asia/Makassar');

		$data = [
			'judul_pengunguman' => $this->input->post('judul_pengunguman'),
			'isi_pengunguman' => $this->input->post('isi_pengunguman'),
			'tgl_pengunguman' => $this->input->post('tgl_pengunguman'),
			'jam' => date("H:i:s"),
			'nama_pembuat' => $this->input->post('nama_pembuat')
		];
		$this->db->insert('tb_pengunguman', $data);
		$this->session->set_flashdata('flash', 'Data Pengunguman Ditambahkan');
	}

	public function getPengungumanById($id)
    {
        return $this->db->get_where('tb_pengunguman', ['id' => $id])->row_array();
    }

    public function hapusPengungumanById($id)
    {
        $this->db->where($id);
        return $this->db->delete('tb_pengunguman');
    }

    public function editPengunguman($id)
    {
    	date_default_timezone_set('Asia/Makassar');

    	$data['pengunguman'] = $this->db->get_where('tb_pengunguman', ['id' => $id])->row_array();

		$judul_pengunguman 	= $this->input->post('judul_pengunguman');
		$isi_pengunguman 	= $this->input->post('isi_pengunguman');
		$tgl_pengunguman 	= $this->input->post('tgl_pengunguman');
		$nama_pembuat 		= $this->input->post('nama_pembuat');

		$data = [
			'judul_pengunguman' => $judul_pengunguman,
			'isi_pengunguman' 	=> $isi_pengunguman,
			'tgl_pengunguman' 	=> $tgl_pengunguman,
			'jam' 				=> date("H:i:s"),
			'nama_pembuat' 		=> $nama_pembuat
		];

		 $this->db->where('id', $this->input->post('id'));
		 $this->db->update('tb_pengunguman', $data);
    }

}