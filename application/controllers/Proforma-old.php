<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profroma extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('profroma_model', 'profroma');
	}

	public function index()
	{
		$this->permission_check('profroma_view');
		$profroma_add_pemission = $this->has_permission('profroma_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('profroma_list');
		$data = array_merge($data, array('profroma_add_pemission' => $profroma_add_pemission));
		$this->load->view('profroma-view', $data);
	}

	public function add()
	{

		echo "sdfds";
		$this->permission_check('profroma_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('profroma');
		$this->load->view('profroma', $data);
	}
}
