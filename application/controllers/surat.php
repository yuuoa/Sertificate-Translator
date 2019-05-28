<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat extends CI_Controller
{
    public function index()
    {
        $username = $this->session->username;
        $data['nama'] = $this->session->nama;
        $data['title'] = 'Sistem Translasi Ijazah';
        $data['nim'] = $this->session->nim;
        $data['mahasiswa'] = $this->Model->getProfile($username);

        $this->load->view('user/sertificate', $data);
    }

    public function cetak()
    {
        $this->load->view('user/sertificate');
    }
}