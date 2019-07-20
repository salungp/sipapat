<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Admin Sipapat | Log in';
        $this->load->view('admin/pages/login', $data);
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() === FALSE)
        {
            $data['title'] = 'Admin Sipapat | Log in';
            $this->load->view('admin/pages/login', $data);
        } else {
            $this->_login();   
        }
    }

    public function _login()
    {
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['email' => $username])->row_array();
        if ($user)
        {
            if (password_verify($password, $user['password']))
            {
                $data = array(
                    'logged_in' => TRUE,
                    'token' => $user['token_id']
                );
                $this->db->insert('log_login', array('username' => $username, 'password' => $password, 'type' => 'success'));
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->db->insert('log_login', array('username' => $username, 'password' => $password, 'type' => 'wrong password'));
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
            }
        } else {
            $this->db->insert('log_login', array('username' => $username, 'password' => $password, 'type' => 'failed email'));
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        if ($this->session->userdata('logged_in'))
        {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('role_id');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
            redirect('auth');
        }
    }
}