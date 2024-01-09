<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = $this->session->userdata;

        //เช็คว่าใน data มีข้อมูลหรือไม่ ถ้าไม่มีให้ไปยังหน้า login
        if (empty($data)) {
            redirect(site_url() . 'auth/login');
        }

        //เช็คว่า user อยู่ในระดับไหน

        if (empty($this->session->userdata['email'])) {
            redirect(site_url() . 'auth/login');
        }
        //ถ้ามีข้อมูลแล้วให้ไปยังหน้าหลัก
        else {
            $this->load->view('navbar');
            $this->load->view('homepage');
        }
    }

    public function edit_profile()
    {
        if (empty($this->session->userdata['email'])) {
            redirect(site_url() . 'auth/login');
        } else {

            $data = $this->session->userdata;
            $dataInfo = array(
                'id' => $data['id']
            );

            $data['news_item'] = $this->user_model->get_news_by_id($dataInfo['id']);

            $this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[2]');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[2]');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('navbar');
                $this->load->view('auth/edit_profile', $data);
            } else {

                $post = $this->input->post(NULL, TRUE);
                $cleanPost = $this->security->xss_clean($post);

                $cleanPost['user_id'] = $dataInfo['id'];
                $cleanPost['firstname'] = $this->input->post('firstname');
                $cleanPost['lastname'] = $this->input->post('lastname');

                $this->user_model->updateprofile($cleanPost);
                redirect('auth/edit_profilesucceee');
            }
        }
    }

    public function edit_profilesuccess()
    {
        $this->load->view('auth/edit_profilesuccess');
    }
}
