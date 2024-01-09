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

    public function register()
    {
        if (empty($this->session->userdata['email'])) {
            $data = $this->session->userdata;
            $this->load->model('user_model');

            $this->form_validation->set_rules('firstname', 'Firstname Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

            $data['title'] = "Add User";
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('auth/register', $data);
            } else {
                if ($this->user_model->isDuplicate($this->input->post('email'))) {
                    $this->session->set_flashdata('flash_message', 'User email already exists');
                    redirect(site_url() . 'auth/register');
                } else {
                    $this->load->library('password');
                    $post = $this->input->post(NULL, TRUE);
                    $cleanPost = $this->security->xss_clean($post);
                    $hashed = $this->password->create_hash($cleanPost['password']);

                    $cleanPost['email'] = $this->input->post('email');
                    $cleanPost['role'] = '4';
                    $cleanPost['status'] = '1';
                    $cleanPost['firstname'] = $this->input->post('firstname');
                    $cleanPost['lastname'] = $this->input->post('lastname');
                    $cleanPost['banned_users'] = 'unban';
                    $cleanPost['password'] = $hashed;
                    unset($cleanPost['passconf']);

                    //insert to database
                    if (!$this->user_model->addUser($cleanPost)) {
                        $this->session->set_flashdata('flash_message', 'There was a problem add new user');
                    } else {
                        $this->session->set_flashdata('success_message', 'New user has been added.');
                    }
                    $this->session->sess_destroy();
                    redirect(site_url() . 'auth/completed');
                };
            }
        } else {
            redirect(site_url() . 'auth/login');
        }
    }

    public function completed()
    {
        $this->load->view('auth/register_completed');
    }
}
