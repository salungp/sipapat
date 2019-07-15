<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
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
		$this->load->view('public/pages/acara');
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
}