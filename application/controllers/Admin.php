<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['nama'] = $this->session->nama;
        $data['title'] = 'Sistem Translasi Ijazah';
        $data['mahasiswa'] = $this->Model->getRequest();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }

    public function setRequest($nim){
        $this->Model->confirmRequest($nim);
        redirect('admin/');
    }
}