<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		is_logged_in();
		define('USER', $this->db->get_where('users', array('token_id' => $this->session->userdata('token')))->row_array());
	}

	public function index()
	{
		$data['title'] = 'Admin Sipapat | Dashboard';
		$data['users'] = $this->db->get('users')->result_array();
		$data['log'] = $this->db->get('log_login')->result_array();
		$data['berita'] = $this->db->get('berita')->result_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pages/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function calendar()
	{
		$data['title'] = 'Admin Sipapat | Calendar';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pages/calendar');
		$this->load->view('admin/templates/footer');
	}

	public function table()
	{
		$data['title'] = 'Admin Sipapat | Table';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pages/table');
		$this->load->view('admin/templates/footer');
	}

	public function content()
	{
		$data['title'] = 'Admin Sipapat | Content Management';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pages/content');
		$this->load->view('admin/templates/footer');
	}

	public function page_index()
	{
		$data['title'] = 'Admin Sipapat | Halaman Index';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/content/index');
		$this->load->view('admin/templates/footer');
	}

	public function add_user()
	{
		if ($this->session->userdata('role_id') == 1)
		{
			$data['title'] = 'Admin Sipapat | Tambah User';
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/pages/add_user', array('error' => ''));
			$this->load->view('admin/templates/footer');
		} else {
			$data['title'] = 'Admin Sipapat | 404 not Found!';
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/pages/404');
			$this->load->view('admin/templates/footer');
		}
	}

	public function tambah_user()
	{
		$name = $this->input->post('nama');
		$slug = explode(' ', $name);
		$slug = strtolower(implode('-', $slug));
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$token_id = hash('ripemd160', $username);
		switch ($this->input->post('role_id')) {
			case 'admin':
				$role_id = 1;
				break;
			case 'editor':
				$role_id = 2;
				break;
			case 'visitor':
				$role_id = 3;
				break;
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		$config['upload_path'] = './assets/images/users/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 1024;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;
		$this->load->library('upload', $config);

		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Admin Sipapat | Add User';
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/pages/add_user');
			$this->load->view('admin/templates/footer');
		} else
		{
			if ( ! $this->upload->do_upload('foto'))
			{
				$error = ['error' => $this->upload->display_errors()];
				$data['title'] = 'Admin Sipapat | Add User';
				$this->load->view('admin/templates/header', $data);
				$this->load->view('admin/pages/add_user', $error);
				$this->load->view('admin/templates/footer');
			} else {
				if ($this->db->get_where('users', array('email' => $email))->row_array())
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is already used!</div>');
	            	redirect('admin/add_user');
				} else {
					$foto = $this->upload->data('file_name');
					$data = array(
						'name' => $name,
						'slug' => $slug,
						'email' => $email,
						'username' => $username,
						'password' => $password,
						'role_id' => $role_id,
						'gambar' => $foto,
						'token_id' => $token_id
					);
					$this->db->insert('users', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Insert data successfully!</div>');
	            	redirect('admin/add_user');
				}
			}
		}
	}

	public function delete($id = null)
	{
		$user = $this->db->get_where('users', array('id' => $id))->row_array();
		if ( ! is_null($id))
		{
			if (file_exists('./assets/images/users/'.$user['gambar']))
			{
				if ($this->db->delete('users', array('id' => $id)) && unlink('./assets/images/users/'.$user['gambar']))
				{
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete data successfully!</div>');
            		redirect('menu/tbl_users');
				} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete data failed!</div>');
            	redirect('menu/tbl_users');
				}
			} else {
				$this->db->delete('users', array('id' => $id));
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete data successfully!</div>');
            	redirect('menu/tbl_users');
			}
		}
	}

	public function update($id = null)
	{
		$user = $this->db->get_where('users', array('id' => $id))->row_array();
		if ($user['id'] !== $id)
		{
			show_404();
		} else if ($id == null) {
			show_404();
		}
		$this->load->view('admin/templates/header', array('title' => 'Admin Sipapat | update user'));
		$this->load->view('admin/pages/update_user', array('error' => '', 'user' => $user));
		$this->load->view('admin/templates/footer');
	}

	public function ubah_user()
	{
		$id = $this->input->post('id');
		$user = $this->db->get_where('users', array('id' => $id))->row_array();
		$name = htmlspecialchars($this->input->post('name'));
		$email = htmlspecialchars($this->input->post('email'));
		$username = htmlspecialchars($this->input->post('username'));
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		switch ($this->input->post('role_id')) {
			case 'admin' :
				$role_id = 1;
			break;
			case 'editor' :
				$role_id = 2;
			break;
			case 'visitor' :
				$role_id = 3;
			break;
			default :
				$role_id = 3;
			break;
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		$config['upload_path'] = './assets/images/users/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 1024;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;

		$this->load->library('upload', $config);

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/templates/header', array('title' => 'Admin Sipapat | edit user'));
			$this->load->view('admin/pages/update_user', array('error' => '', 'user' => $user));
			$this->load->view('admin/templates/footer');
		} else {
			if ( ! $this->upload->do_upload('foto'))
			{
				$this->load->view('admin/templates/header', array('title' => 'Admin Sipapat | edit user'));
				$this->load->view('admin/pages/update_user', array('error' => $this->upload->display_errors(), 'user' => $user));
				$this->load->view('admin/templates/footer');
			} else {
				$foto = $this->upload->data('file_name');
				$data = array(
					'name' => $name,
					'email' => $email,
					'username' => $username,
					'password' => $password,
					'role_id' => $role_id,
					'gambar' => $foto
				);
				$this->db->where('id', $id);
				$this->db->update('users', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update data successfully!</div>');
            	redirect('menu/tbl_users');
			}
		}
	}
}