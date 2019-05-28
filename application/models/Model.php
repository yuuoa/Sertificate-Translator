<?php

class Model extends CI_Model
{
    function cekLogin($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function getProfile($id){
        $this->db->select('m.nama as nama, m.nim as nim, m.jk as jk, j.nama_jurusan, u.username as username, m.status');
        $this->db->from('jurusan as j');
        $this->db->from('mahasiswa as m');
        $this->db->from('akun as u');
        $this->db->where('m.username',$id);
        $this->db->where('m.id_jurusan = j.kode');
        $data = $this->db->get();
        return $data->row();
    }

    function getNama($id){
        $this->db->select('nama');
        $this->db->where('username', $id);
        $data = $this->db->get('mahasiswa');
        return $data->row();
    }

    function getStatus($nim){
        $this->db->select('status');
        $this->db->from('mahasiswa');
        $this->db->where('nim',$nim);
        $status = $this->db->get();
        return $status;
    }

    function createRequest($nim){
        $this->db->set('status',1);
        $this->db->where('nim',$nim);
        $this->db->update('mahasiswa');
    }
    
    function confirmRequest($nim){
        $this->db->set('status', 2);
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa');
    }

    function getRequest(){
        
        $this->db->select('m.nama as nama');
        $this->db->select('m.nim as nim');
        $this->db->select('m.jk as jk');
        $this->db->select('j.nama_jurusan');
        $this->db->select('i.tahun_lulus as tahun');
        $this->db->select('m.status as status');
        
        $this->db->from('mahasiswa as m');
        $this->db->from('jurusan as j');
        $this->db->from('ijazah as i');
        
        $this->db->where('m.id_jurusan = j.kode');
        $this->db->where('i.nim = m.nim');

        $data = $this->db->get();
        return $data->result();
    }

    public function getNim($username){
        $this->db->select('nim');
        $this->db->from('mahasiswa');
        $this->db->where('username', $username);
        $data = $this->db->get()->result();
        $nim = 0;
        foreach ($data as $d) {
            $nim = $d->nim;
        }
        return $nim;
    }
}
