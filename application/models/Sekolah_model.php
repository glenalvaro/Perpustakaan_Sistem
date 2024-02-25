<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah_model extends CI_Model
{
	public function getDataSekolah()
    {
        return $this->db->get('tb_sekolah')->result_array();
    }

    public function getSekolahById($id)
    {
        return $this->db->get_where('tb_sekolah', ['id' => $id])->row_array();
    }

    public function editSekolah($id)
    {
        helper_log("edit", "Mengubah data sekolah");

        $data['sekolah'] = $this->db->get_where('tb_sekolah', ['id' => $id])->row_array();

        // cek jika ada gambar yang di upload
        $upload_image = $_FILES['image'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']     = '1048';
            $config['upload_path'] = './assets/images/logo/';
            $config['file_name'] = $data['sekolah']['npsn']; //beri nama npsn pada foto yang diupload

            $this->load->library('upload', $config);

            // upload foto baru
            if ($this->upload->do_upload('image')) {
                $old_image = $data['sekolah']['logo'];
                $path = './assets/images/logo/';

                // hapus foto lama selain foto default
                if ($old_image != 'default_logo.png') {
                    unlink(FCPATH . $path . $old_image);
                }
                // ganti foto lama dengan baru
                $new_image = $this->upload->data('file_name');
                $this->db->set('logo', $new_image);
            } else {

                $data = [
                    'nama_sekolah'  => $this->input->post('nama_sekolah', true),
                    'nama_kepsek'   => $this->input->post('nama_kepsek', true),
                    'nip_kepsek'    => $this->input->post('nip_kepsek', true),
                    'nama_operator' => $this->input->post('nama_operator', true),
                    'akreditasi'    => $this->input->post('akreditasi', true),
                    'npsn'          => $this->input->post('npsn', true),
                    'status'        => $this->input->post('status', true),
                    'alamat'        => $this->input->post('alamat', true),
                    'kelurahan'     => $this->input->post('kelurahan', true),
                    'kecamatan'     => $this->input->post('kecamatan', true),
                    'kabupaten'     => $this->input->post('kabupaten', true),
                    'provinsi'      => $this->input->post('provinsi', true),
                    'kode_pos'      => $this->input->post('kode_pos', true),
                    'latitude'      => $this->input->post('latitude', true),
                    'longitude'     => $this->input->post('longitude', true)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('tb_sekolah', $data);

                $this->session->set_flashdata('flash', 'Data Sekolah Diupdate');
                redirect('sekolah');
            }
        }

            $data = [
                    'nama_sekolah'  => $this->input->post('nama_sekolah', true),
                    'nama_kepsek'   => $this->input->post('nama_kepsek', true),
                    'nip_kepsek'    => $this->input->post('nip_kepsek', true),
                    'nama_operator' => $this->input->post('nama_operator', true),
                    'akreditasi'    => $this->input->post('akreditasi', true),
                    'npsn'          => $this->input->post('npsn', true),
                    'status'        => $this->input->post('status', true),
                    'alamat'        => $this->input->post('alamat', true),
                    'kelurahan'     => $this->input->post('kelurahan', true),
                    'kecamatan'     => $this->input->post('kecamatan', true),
                    'kabupaten'     => $this->input->post('kabupaten', true),
                    'provinsi'      => $this->input->post('provinsi', true),
                    'kode_pos'      => $this->input->post('kode_pos', true),
                    'latitude'      => $this->input->post('latitude', true),
                    'longitude'     => $this->input->post('longitude', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_sekolah', $data);
    }


}
