<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Log_model extends CI_Model {
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tb_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function getDataAktivitas()
    {
        $query = "SELECT * FROM `tb_log` WHERE `log_desc` = 'Telah keluar dari sistem'  ORDER BY `log_id` DESC LIMIT 8";
        return $this->db->query($query)->result_array();
    }

    public function totalBuku()
    {   
        $query = $this->db->get('tb_buku');
        if($query->num_rows()>0) {
          return $query->num_rows();
        }
        else {
          return 0;
        }
    }

    public function totalAnggota()
    {   
        $query = $this->db->query("SELECT * FROM tb_user where id_akses =2");
        return $query->num_rows();
    }

    public function totalKategori()
    {   
        $query = $this->db->get('tb_kategori_buku');
        if($query->num_rows()>0) {
          return $query->num_rows();
        }
        else {
          return 0;
        }
    }

    public function totalPeminjaman()
    {   
        $query = $this->db->get('tb_peminjaman');
        if($query->num_rows()>0) {
          return $query->num_rows();
        }
        else {
          return 0;
        }
    }
}