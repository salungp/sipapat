<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		define('USER', $this->db->get_where('users', array('token_id' => $this->session->userdata('token')))->row_array());
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('admin/templates/header', array('title' => 'Admin Sipapat | List Acara'));
		$this->load->view('admin/acara/index', array('acara' => $this->db->get('acara')->result_array()));
		$this->load->view('admin/templates/footer');
	}

	public function halaman_tambah()
	{
		$this->load->view('admin/templates/header', array('title' => 'Admin Sipapat | Sisipkan Acara'));
		$this->load->view('admin/acara/halaman_tambah', array('error' => ''));
		$this->load->view('admin/templates/footer');
	}

	public function tambah()
	{
		$title = $this->input->post('title');
		$slug = explode(' ', $title);
		$slug = strtolower(implode('-', $slug));
		$deskripsi = $this->input->post('deskripsi');
		$kategori = htmlspecialchars($this->input->post('kategori'));
		$author = USER['name'];
		$start_at = $this->input->post('start_at');
		$end_at = $this->input->post('end_at');

		$this->form_validation->set_rules('title', 'Judul', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('start_at', 'Waktu', 'required|trim');
		$this->form_validation->set_rules('end_at', 'Berkahir', 'required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/templates/header', array('title' => 'Admin Sipapat | Sisipkan Acara'));
			$this->load->view('admin/acara/halaman_tambah', array('error' => ''));
			$this->load->view('admin/templates/footer');
		} else {
			$config['upload_path'] = './assets/images/acara/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 5024;
			$config['max_width'] = 1324;
			$config['max_height'] = 1324;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto'))
			{
				$this->load->view('admin/templates/header', array('Admin Sipapat | Sisipakan Acara'));
				$this->load->view('admin/acara/halaman_tambah', array('error' => $this->upload->display_errors()));
				$this->load->view('admin/templates/footer');
			} else {
				$foto = $this->upload->data('file_name');

				$data = array(
					'title'     => $title,
					'slug'      => $slug,
					'deskripsi' => $deskripsi,
					'start_at'  => $start_at,
					'end_at'    => $end_at,
					'updated_at'=> date('Y-m-d H:i:s'),
					'gambar'    => $foto,
					'author'    => $author,
					'status'    => 1,
					'kategori'  => $kategori
				);

				if ($this->db->insert('acara', $data))
				{
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Acara berhasil ditambahkan!</div>');
            		redirect('acara/halaman_tambah');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Acara gagal ditambahkan!</div>');
            		redirect('acara/halaman_tambah');
				}
			}
		}
	}

	public function search()
	{
		$key = htmlspecialchars($this->input->get('key'));
		$this->db->like('title', $key);
		$acara = $this->db->get('acara')->result_array();
		$this->load->view('admin/templates/header', array('title' => 'Admin Sipapat | Cari '.$key));
		$this->load->view('admin/acara/index', array('acara' => $acara, 'error' => ''));
		$this->load->view('admin/templates/footer');
	}

	public function delete($id = null)
	{
		$this->db->select('id, gambar');
		$acara = $this->db->get_where('acara', array('id', $id))->row_array();
		if ( ! is_null($id))
		{
			if ($acara['id'] == $id)
			{
				if ($this->db->delete('acara', array('id' => $id)) && unlink('./assets/images/acara/'.$acara['gambar']))
				{
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data berhasil!</div>');
            		redirect('acara/index');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
            		redirect('acara/index');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf data dengan id '.$id.' tidak ditemukan!</div>');
            	redirect('acara/index');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf data tidak boleh kosong!</div>');
            redirect('acara/index');
		}
	}
}