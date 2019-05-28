<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $username = $this->session->username;
        $data['nama'] = $this->session->nama;
        $data['nim'] = $this->session->nim;
        $data['mahasiswa'] = $this->Model->getProfile($username);
        

        $this->load->view('user/header', $data);
        $this->load->view('user/index', $data);
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

        $sql1 = $this->db->select()->from('ijazah');
        $sql2 = $sql1->join('mahasiswa', 'ijazah.nim = mahasiswa.nim');
        $sql3 = $sql2->join('jurusan', 'mahasiswa.id_jurusan = jurusan.kode');
        $sql4 = $sql3->where(["mahasiswa.nim"=>$this->session->nim]);
        $sql5 = $sql4->get()->row();

        switch ($sql5->nama_jurusan) {
            case "TEKNIK INFORMATIKA":
                $data['gelar'] =  "SARJANA TEKNIK (ST)"; 
                $data['nama_jurusan'] =  "Informatics Engineering";
                break;
            case "TEKNIK ELEKTRO":
                $data['gelar'] =  "SARJANA TEKNIK (ST)";
                $data['nama_jurusan'] =  "Electrical Engineering";
                break;
            case "AGROTEKNOLOGI":
                $data['gelar'] =  "SARJANA TEKNIK (ST)"; 
                $data['nama_jurusan'] =  "Argotechnology";
                break;
            case "MATEMATIKA":
                $data['gelar'] =  "SARJANA SAINS (S.Si)";
                $data['nama_jurusan'] =  "Mathematics"; 
                break;
            case "FISIKA":
                $data['gelar'] =  "SARJANA SAINS (S.Si)";
                $data['nama_jurusan'] =  "Physics";
                break;
            case "KIMIA":
                $data['gelar'] =  "SARJANA SAINS (S.Si)";
                $data['nama_jurusan'] =  "Chemistry";
                break;
            case "BIOLOGI":
                $data['gelar'] =  "SARJANA SAINS (S.Si)";
                $data['nama_jurusan'] =  "Biology";
                break;
        }

        $data['mhs'] = $sql5;
       
        $this->load->view('user/surat',$data);
    }
}