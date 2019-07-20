<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller
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
		$data['title'] = 'Admin Sipapat | Tabel Berita';
		$data['berita'] = $this->db->get('berita')->result_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/berita/tabel', $data);
		$this->load->view('admin/templates/footer');
	}

	public function search()
	{
		$data['title'] = 'Admin Sipapat | Tabel Berita';
		$key = $this->input->get('key');
		$this->db->like('title', $key);
		$data['berita'] = $this->db->get('berita')->result_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/berita/tabel', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Admin Sipapat | Tambah Berita';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/berita/tambah', array('error' => ''));
		$this->load->view('admin/templates/footer');
	}

	public function insert()
	{
		$title = $this->input->post('title');
		$slug = explode(' ', $title);
		$slug = strtolower(implode('-', $slug));
		$deskripsi = $this->input->post('deskripsi');
		$author = $this->session->userdata('nama');
		$kategori = $this->input->post('kategori');
		$this->db->select('id, role_id');
		$author_id = $this->db->get_where('users', array('name' => $author))->row_array();

		$this->form_validation->set_rules('title', 'Judul', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Admin Sipapat | Tambah Berita';
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/berita/tambah', array('error' => ''));
			$this->load->view('admin/templates/footer');
		} else {
			$config['upload_path'] = './assets/images/berita/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 5024;
			$config['max_width'] = 1324;
			$config['max_height'] = 1324;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
				$data['title'] = 'Admin Sipapat | Tambah Berita';
				$this->load->view('admin/templates/header', $data);
				$this->load->view('admin/berita/tambah', $error);
				$this->load->view('admin/templates/footer');
			} else {
				$foto = $this->upload->data('file_name');
				$data = array(
					'title' => $title,
					'slug' => $slug,
					'deskripsi' => $deskripsi,
					'author' => $author,
					'gambar' => $foto,
					'author_id' => $author_id['id'],
					'kategori' => $kategori
				);
				if ($this->db->insert('berita', $data))
				{
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Insert data successfully!</div>');
            		redirect('berita/tambah');
				}
			}
		}
	}

	public function delete($id = null)
	{
		if ( ! is_null($id))
		{
			if ($this->db->delete('berita', array('id' => $id)))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete data successfully!</div>');
	            redirect('berita/index');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Id not matched!</div>');
	        redirect('berita/index');
		}
	}
}