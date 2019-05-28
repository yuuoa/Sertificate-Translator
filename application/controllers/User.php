<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $username = $this->session->username;
        $data['nama'] = $this->session->nama;
        $data['title'] = 'Sistem Translasi Ijazah';
        $data['nim'] = $this->session->nim;
        $data['mahasiswa'] = $this->Model->getProfile($username);

        $this->load->view('user/header', $data);
        $this->load->view('user/index');
        $this->load->view('user/footer');
    }

    public function request($nim){
        $this->Model->createRequest($nim);
        echo '<script>alert("Berhasil Membuat Request");window.location.href="' . base_url('user/index') . '"</script>';
    }
    
    public function cetak(){
        /*
        $sql1   = $this->db->select()->from("ijazah")->where(["mahasiswa.nim"=>$this->session->nim]);
        $sql2   = $this->db->select()->from("jurusan")->where(["jurusan.nama"=>$this->session->jurusan_id]);
        $sql3   = $sql1->join("mahasiswa","ijazah.nim = mahasiswa.nim");
        $sql4   = $sql2->get()->row();
        */
        //$data['mhs'] = $sql3;
        $this->db->select('ij.no_ijazah, ij.tahun_lulus,ij.nim');
        $this->db->from('ijazah as ij, mahasiswa mh ');
        $this->db->where('ij.nim', $this->session->nim);
        $query = $this->db->get();
        $data['IJAZAH'] = $query->result();
        $data['MAHASISWA'] = $this->db->get('mahasiswa')->result();
        $data['JURUSAN'] = $this->db->get('jurusan')->result();
        
        $this->load->view('user/sertificate',$data);
    }
}