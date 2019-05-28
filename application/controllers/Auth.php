<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Sistem Translasi Ijazah';
        $this->load->view('auth/header',$data);
        $this->load->view('auth/index');
        $this->load->view('template/footer');
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $cek = $this->Model->cekLogin("akun", $where)->num_rows();
        if ($cek > 0) {
            $this->db->where('username', $username);
            $akun = $this->db->get('akun');
            $nama = "";

            foreach ($akun->result() as $a) {
                $nama = $a->nama;
            }
            
            $this->session->set_userdata('nama', $nama);
            $this->session->set_userdata('username', $username);
            
            foreach ($akun->result() as $a) {
                $role = $a->role;
            }

            if ($role == 1) {
                redirect('admin/');
            } 
            else{
                $nim = $this->Model->getNim($username);
                $this->session->set_userdata('nim',$nim);
                redirect('user/');
            }
        } 
        else {
            echo '<script>alert("username atau password salah!");window.location.href="'.base_url('auth').'"</script>';
        }
    }

    public function logout(){
        redirect('auth');
    }
}