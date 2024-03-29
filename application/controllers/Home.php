<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->db->order_by('id', 'DESC');
		$data['berita'] = $this->db->get('berita')->result_array();
		$this->load->view('public/templates/header', array('title' => 'Sipapat | Beranda'));
		$this->load->view('public/pages/index', $data);
		$this->load->view('public/templates/footer');
	}

	public function blank()
	{
		$this->load->view('public/pages/blank');
	}

	public function artikel($slug = null)
	{
		$data['artikel'] = $this->db->get_where('berita', array('slug' => $slug))->row_array();
		// $this->db->where('slug', $slug);
		// $this->db->update('berita', array('jumlah_pembaca' => $data['artikel']['jumlah_pembaca']+1));
		if (is_null($data['artikel']))
		{
			show_404();
		}
		$this->load->view('public/templates/header', array('title' => $data['artikel']['title']));
		$this->load->view('public/pages/artikel', $data);
		$this->load->view('public/templates/footer');
	}

	public function acara()
	{
		$this->load->view('public/templates/header', array('title' => 'Sipapat | acara'));
		$this->db->order_by('id', 'DESC');
		$this->load->view('public/pages/acara', array('acara' => $this->db->get('acara')->result_array()));
		$this->load->view('public/templates/footer');
	}

	public function tentang()
	{
		$this->load->view('public/templates/header', array('title' => 'Sipapat | tentang kami'));
		$this->load->view('public/pages/tentang');
		$this->load->view('public/templates/footer');
	}

	public function kategori($kategori = null)
	{
		if ( ! is_null($kategori))
		{
			$this->db->order_by('id', 'DESC');
			$data['berita'] = $this->db->get_where('berita', array('kategori' => ucfirst($kategori)))->result_array();
			$this->load->view('public/templates/header', array('title' => 'Kategori - '.$kategori));
			$this->load->view('public/pages/index', $data);
			$this->load->view('public/templates/footer');
		}
	}

	public function kontak()
	{
		$this->load->view('public/templates/header', array('title' => 'Sipapat | Kontak'));
		$this->load->view('public/pages/kontak');
		$this->load->view('public/templates/footer');
	}

	public function cari()
	{
		$key = $this->input->get('key');
		$this->db->order_by('id', 'DESC');
		$this->db->like('title', $key);
		$data['berita'] = $this->db->get('berita')->result_array();
		$this->load->view('public/templates/header', array('title' => 'Sipapat | cari artikel'));
		$this->load->view('public/pages/index', $data);
		$this->load->view('public/templates/footer');
	}

	public function kirim_kontak()
	{
		$nama = htmlspecialchars($this->input->post('nama'));
		$email = htmlspecialchars($this->input->post('email'));
		$pesan = htmlspecialchars($this->input->post('pesan'));

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('public/templates/header', array('title' => 'Sipapat | Kontak'));
			$this->load->view('public/pages/kontak');
			$this->load->view('public/templates/footer');
		} else {
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'pesan' => $pesan
			);

			if ($this->db->insert('kontak', $data))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kontak berhasil dikirim!</div>');
            	redirect('kontak');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kontak gagal dikirim!</div>');
            	redirect('kontak');
			}
		}
	}

	public function subscribe()
	{
		$email = htmlspecialchars($this->input->post('email'));
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('public/templates/header', array('title' => 'Sipapat | Beranda'));
			$this->load->view('public/pages/index');
			$this->load->view('public/templates/footer');
		} else {
			if ( ! $this->db->get_where('subscriber', array('email' => $email))->row_array()) {
				if ($this->db->insert('subscriber', array('email' => $email)))
				{
					redirect();
				} else {
					redirect();
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf email sudah ada!</div>');
            	redirect('');
			}
		}
	}
}