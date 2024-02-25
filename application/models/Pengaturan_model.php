<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{

	public function getDataPengaturan()
	{
		return $this->db->get('tb_pengaturan')->result_array();
	}
	
	public function editPengaturanById($id)
	{
		helper_log("edit", "Mengubah data pengaturan");

		$nama_sistem 				= $this->input->post('nama_sistem');
		$no_telpon 					= $this->input->post('no_telpon');
		$alamat 					= $this->input->post('alamat');
		$hari_kerja 				= $this->input->post('hari_kerja');
		$jam_kerja 					= $this->input->post('jam_kerja');
		$denda 						= $this->input->post('denda');
		$lama_peminjaman 			= $this->input->post('lama_peminjaman');
		$maksimal_peminjaman 		= $this->input->post('maksimal_peminjaman');
		$tambahan_waktu_pinjam 		= $this->input->post('tambahan_waktu_pinjam');
		$api_key_youtube 			= $this->input->post('api_key_youtube');
		$channel_id_youtube 		= $this->input->post('channel_id_youtube');

	
		//slider1 web
		$slider1 = $_FILES['slider1']['name'];
		//slider2 web
		$slider2 = $_FILES['slider2']['name'];
		//slider3 web
		$slider3 = $_FILES['slider3']['name'];
		//tanda tangan gambar
		$ttd1 = $_FILES['ttd1']['name'];
		//stempel gambar
		$stempel1 = $_FILES['stempel1']['name'];


        //fungsi gambar slider 1
		 if ($slider1) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/images/slider/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('slider1')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('slider_1', $new_image);
                } else {
                    $this->session->set_flashdata('flash-error','Gambar di slider 1 gagal di upload ukuran maksimal 2 MB!');
					redirect('pengaturan');
                }
            }

        //fungsi gambar slider 2
		 if ($slider2) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/images/slider/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('slider2')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('slider_2', $new_image);
                } else {
                     $this->session->set_flashdata('flash-error','Gambar di slider 2 gagal di upload ukuran maksimal 2 MB!');
					redirect('pengaturan');
                }
            }

        //fungsi gambar slider 3
		 if ($slider3) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/images/slider/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('slider3')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('slider_3', $new_image);
                } else {
                     $this->session->set_flashdata('flash-error','Gambar di slider 3 gagal di upload ukuran maksimal 2 MB!');
					redirect('pengaturan');
                }
            }

         //fungsi gambar tanda tangan
		 if ($ttd1) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/images/scan/tanda_tangan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('ttd1')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('scan_ttd', $new_image);
                } else {
                     $this->session->set_flashdata('flash-error','Gambar tanda tangan gagal di upload ukuran maksimal 2 MB!');
					redirect('pengaturan');
                }
            }

         //fungsi gambar cap stempel
		 if ($stempel1) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/images/scan/cap_stempel/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('stempel1')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('scan_cap', $new_image);
                } else {
                     $this->session->set_flashdata('flash-error','Gambar stempel gagal di upload ukuran maksimal 2 MB!');
					redirect('pengaturan');
                }
            }

		$data = [

			'nama_sistem'			=> $nama_sistem,
			'no_telpon'				=> $no_telpon,
			'alamat'				=> $alamat,
			'hari_kerja' 			=> $hari_kerja,
			'jam_kerja' 			=> $jam_kerja,
			'denda' 				=> $denda,
			'lama_peminjaman' 		=> $lama_peminjaman,
			'maksimal_peminjaman' 	=> $maksimal_peminjaman,
			'tambahan_waktu_pinjam' => $tambahan_waktu_pinjam,
			'api_key_youtube' 		=> $api_key_youtube,
			'channel_id_youtube'	=> $channel_id_youtube

		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_pengaturan', $data);
	}

}