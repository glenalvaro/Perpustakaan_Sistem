<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model
{

	public function getDataInfo()
	{
		$queryData = "SELECT * FROM `tb_info` ORDER BY `id` DESC";
		return $this->db->query($queryData)->result_array();
	}

	public function detail_InfoById($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function createInfo()
	{
		$data = [
			'judul_info' => $this->input->post('judul_info'),
			'deskripsi' => $this->input->post('deskripsi'),
		];
		$this->db->insert('tb_info', $data);
		$this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
	}

	public function hapusInfoById($id)
    {
        $this->db->where($id);
        return $this->db->delete('tb_info');
    }

    public function getInfoById($id)
    {
        return $this->db->get_where('tb_info', ['id' => $id])->row_array();
    }

    public function editInfo($id)
    {
    	$data['info'] = $this->db->get_where('tb_info', ['id' => $id])->row_array();

		$judul_info = $this->input->post('judul_info');
		$deskripsi 	= $this->input->post('deskripsi');

		$data = [
			'judul_info'    => $judul_info,
			'deskripsi' 	=> $deskripsi
		];

		 $this->db->where('id', $this->input->post('id'));
		 $this->db->update('tb_info', $data);
    }

}