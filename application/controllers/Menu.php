<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Admin Sipapat | Tambah Konten';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/pages/add-content');
        $this->load->view('admin/templates/footer');
    }

    public function tbl_users()
    {
    	$data['title'] = 'Admin Sipapat | Tabel Users';
    	$data['users'] = $this->db->get('users')->result_array();
    	$this->db->select('id, role_id');
    	$data['role_id'] = $this->db->get('users')->row_array();
    	$this->load->view('admin/templates/header', $data);
    	$this->load->view('admin/pages/tbl_users', $data);
    	$this->load->view('admin/templates/footer');
    }

    public function tbl_log_login()
    {
    	$data['title'] = 'Admin Sipapat | Tabel Users';
    	$data['log_login'] = $this->db->get('log_login')->result_array();
    	$this->db->select('id, role_id');
    	$data['role_id'] = $this->db->get('users')->row_array();
    	$this->load->view('admin/templates/header', $data);
    	$this->load->view('admin/pages/tbl_log_login', $data);
    	$this->load->view('admin/templates/footer');
    }

    public function log_delete($id = null)
    {
        $log = $this->db->get_where('log_login', array('id' => $id))->row_array();
        if ( ! is_null($id))
        {
            if ($log['id'] == $id)
            {
                if ($this->db->delete('log_login', array('id' => $id)))
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete data successfully!</div>');
                    redirect('menu/tbl_log_login');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete data failed!</div>');
                    redirect('menu/tbl_log_login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$id.' not found!</div>');
                redirect('menu/tbl_log_login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Id empty!</div>');
                redirect('menu/tbl_log_login');
        }
    }

    public function tbl_kontak()
    {
        $this->load->view('admin/templates/header', array('title' => 'Admin Sipapat | Tabel Kontak'));
        $this->load->view('admin/pages/tbl_kontak', array('kontak' => $this->db->get('kontak')->result_array()));
        $this->load->view('admin/templates/footer');
    }

    public function kontak_delete($id = null)
    {
        $kontak = $this->db->get_where('kontak', array('id' => $id))->row_array();
        if ( ! is_null($id))
        {
            if ($kontak['id'] == $id)
            {
                if ($this->db->delete('kontak', array('id' => $id)))
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete data successfully!</div>');
                    redirect('menu/tbl_kontak');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete data failed!</div>');
                    redirect('menu/tbl_kontak');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$id.' not found!</div>');
                redirect('menu/tbl_kontak');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Id empty!</div>');
            redirect('menu/tbl_kontak');
        }
    }

    public function search($table = null)
    {
    	$key = $this->input->get('key');
    	$field = $this->input->get('field');

    	$this->db->like($field, $key);
    	$data[$table] = $this->db->get($table)->result_array();

    	$this->db->select('id, role_id');
    	$data['role_id'] = $this->db->get('users')->row_array();

    	$data['title'] = 'Admin Sipapat | Tabel '.$table;
    	$this->load->view('admin/templates/header', $data);
    	$this->load->view('admin/pages/tbl_'.$table, $data);
    	$this->load->view('admin/templates/footer');
    }
}