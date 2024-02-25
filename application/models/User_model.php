<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	//panggil model di controller profil kartu anggota
	public function detail_Anggota($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function getDataAnggota()
	{
		$query = "SELECT * FROM `tb_user` WHERE `id_akses` = 2  ORDER BY `id` DESC";
		return $this->db->query($query)->result_array();
	}

	public function detail_AnggotaById($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function getAnggotaById($id)
    {
        return $this->db->get_where('tb_user', ['id' => $id])->row_array();
    }

    public function editAnggotaById($id)
    {
        helper_log("edit", "Mengubah data siswa");

        $data['anggota'] = $this->db->get_where('tb_user', ['id' => $id])->row_array();

        // cek jika ada gambar yang di upload
        $upload_image = $_FILES['image'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/profil/';
            $config['file_name'] = $data['anggota']['nisn']; //beri nama nisn pada foto yang diupload

            $this->load->library('upload', $config);

            // upload foto baru
            if ($this->upload->do_upload('image')) {
                $old_image = $data['anggota']['foto'];
                $path = './assets/images/profil/';

                // hapus foto lama selain foto default
                if ($old_image != 'default.png') {
                    unlink(FCPATH . $path . $old_image);
                }
                // ganti foto lama dengan baru
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {

                $data = [
                    'nama' => $this->input->post('nama', true),
                    'email' => $this->input->post('email', true),
                    'kelas' => $this->input->post('kelas', true),
                    'jurusan' => $this->input->post('jurusan', true),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'tgl_lahir' => $this->input->post('tgl_lahir', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'id_akses' => $this->input->post('id_akses', true)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('tb_user', $data);

                $this->session->set_flashdata('flash', 'Data Anggota Diupdate');
                redirect('anggota');
            }
        }

       $data = [

              'nama' => $this->input->post('nama', true),
              'email' => $this->input->post('email', true),
              'kelas' => $this->input->post('kelas', true),
              'jurusan' => $this->input->post('jurusan', true),
              'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
              'tgl_lahir' => $this->input->post('tgl_lahir', true),
              'no_hp' => $this->input->post('no_hp', true),
              'id_akses' => $this->input->post('id_akses', true)
       ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_user', $data);
    }

    public function user_lock($id = '', $val = 0)
	{
		$sql = "UPDATE tb_user SET active = ? WHERE id = ?";
		$hasil = $this->db->query($sql, array($val, $id));
		$this->session->success = ($hasil === TRUE ? 1 : -1);
	}

	public function hapusAnggotaById($id)
    {
        helper_log("delete", "Menghapus data siswa");
        $this->db->where($id);
        return $this->db->delete('tb_user');
    }

    public function updatePasswordById($id)
    {
        $password_baru = $this->input->post('pass_1');
        $password_security = password_hash($password_baru, PASSWORD_DEFAULT);
        $this->db->set('password', $password_security);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_user');
    }

    public function tambahAnggota()
    {
        helper_log("add", "Menambah data siswa");

        $gambar = $_FILES['image']['name'];

        if ($gambar = '') {
        } else {

            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/profil/';
            $config['file_name'] = $this->input->post('nisn', true); //beri nama nisn pada foto yang diupload

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {

                $no_image = 'default.png';

                $data = [
                    'nama' => $this->input->post('nama', true),
                    'nisn' => $this->input->post('nisn', true),
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password_new'), 
                     PASSWORD_DEFAULT),
                    'kelas' => $this->input->post('kelas', true),
                    'jurusan' => $this->input->post('jurusan', true),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'tgl_lahir' => $this->input->post('tgl_lahir', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'alamat' => $this->input->post('alamat', true),
                    'tgl_terdaftar' => time(),
                    'active' => 1,
                    'id_akses' => $this->input->post('id_akses', true),
                    'foto' => $no_image
                ];

                $this->db->insert('tb_user', $data);
                $this->session->set_flashdata('flash', 'Data Anggota Ditambahkan');

                redirect('anggota');
            } else {
                $gambar = $this->upload->data('file_name', true);

                $data = [
                    'nama' => $this->input->post('nama', true),
                    'nisn' => $this->input->post('nisn', true),
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password_new'), 
                     PASSWORD_DEFAULT),
                    'kelas' => $this->input->post('kelas', true),
                    'jurusan' => $this->input->post('jurusan', true),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'tgl_lahir' => $this->input->post('tgl_lahir', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'alamat' => $this->input->post('alamat', true),
                    'tgl_terdaftar' => time(),
                    'active' => 1,
                    'id_akses' => $this->input->post('id_akses', true),
                    'foto' => $gambar

                ];
                $this->session->set_flashdata('flash', 'Data Anggota Ditambahkan');
                $this->db->insert('tb_user', $data);
            }
        }
    }

    public function hapus_Terpilih($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_user');
    }


    //model untuk petugas
    public function getDataPetugas()
    {
        $query = "SELECT * FROM `tb_user` WHERE `id_akses` != 2  ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
    }

    public function tambahPetugas()
    {
        $gambar = $_FILES['image']['name'];

        if ($gambar = '') {
        } else {

            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/profil/';
            $config['file_name'] = $this->input->post('nisn', true); //beri nama nisn pada foto yang diupload

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {

                $no_image = 'default.png';

                $data = [
                    'nama' => $this->input->post('nama', true),
                    'nisn' => $this->input->post('nisn', true),
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password_new'), 
                     PASSWORD_DEFAULT),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'tgl_lahir' => $this->input->post('tgl_lahir', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'alamat' => $this->input->post('alamat', true),
                    'tgl_terdaftar' => time(),
                    'active' => 0,
                    'id_akses' => $this->input->post('id_akses', true),
                    'foto' => $no_image
                ];

                $this->db->insert('tb_user', $data);
                $this->session->set_flashdata('flash', 'Data Petugas Ditambahkan');

                redirect('petugas');
            } else {
                $gambar = $this->upload->data('file_name', true);

                $data = [
                    'nama' => $this->input->post('nama', true),
                    'nisn' => $this->input->post('nisn', true),
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password_new'), 
                     PASSWORD_DEFAULT),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'tgl_lahir' => $this->input->post('tgl_lahir', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'alamat' => $this->input->post('alamat', true),
                    'tgl_terdaftar' => time(),
                    'active' => 0,
                    'id_akses' => $this->input->post('id_akses', true),
                    'foto' => $gambar

                ];
                $this->session->set_flashdata('flash', 'Data Petugas Ditambahkan');
                $this->db->insert('tb_user', $data);
            }
        }
    }

     public function editPetugasById($id)
    {
        $data['petugas'] = $this->db->get_where('tb_user', ['id' => $id])->row_array();

        // cek jika ada gambar yang di upload
        $upload_image = $_FILES['image'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/profil/';
            $config['file_name'] = $data['petugas']['nisn']; //beri nama nisn pada foto yang diupload

            $this->load->library('upload', $config);

            // upload foto baru
            if ($this->upload->do_upload('image')) {
                $old_image = $data['petugas']['foto'];
                $path = './assets/images/profil/';

                // hapus foto lama selain foto default
                if ($old_image != 'default.png') {
                    unlink(FCPATH . $path . $old_image);
                }
                // ganti foto lama dengan baru
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {

                $data = [
                    'nama' => $this->input->post('nama', true),
                    'email' => $this->input->post('email', true),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'tgl_lahir' => $this->input->post('tgl_lahir', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'id_akses' => $this->input->post('id_akses', true)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('tb_user', $data);

                $this->session->set_flashdata('flash', 'Data Petugas Diupdate');
                redirect('petugas');
            }
        }

       $data = [

              'nama' => $this->input->post('nama', true),
              'email' => $this->input->post('email', true),
              'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
              'tgl_lahir' => $this->input->post('tgl_lahir', true),
              'no_hp' => $this->input->post('no_hp', true),
              'id_akses' => $this->input->post('id_akses', true)
       ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_user', $data);
    }


}