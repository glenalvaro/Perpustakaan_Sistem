<?php
 
class Login_model extends CI_Model
{
	public function daftarUser()
	{
		$data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
				'nisn' => htmlspecialchars($this->input->post('nisn', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), 
                 PASSWORD_DEFAULT),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tgl_terdaftar' => time(),
                'active' => 0,
                'id_akses' => 2,
                'foto' => 'default.png'         
           ];

           $this->db->insert('tb_user', $data);
	}
}

