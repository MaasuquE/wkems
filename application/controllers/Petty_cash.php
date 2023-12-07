<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petty_cash extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('Petty_cash_model', 'petty_cash');
	}

	public function index()
	{
		$this->permission_check('petty_cash_view');
		$petty_cash_add_pemission = $this->has_permission('petty_cash_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('petty_cash_list');
		$data = array_merge($data, array('petty_cash_add_pemission' => $petty_cash_add_pemission));
		$this->load->view('petty_cash-view', $data);
	}
	public function add()
	{
		
		$this->permission_check('petty_cash_add');
		$petty_cash_add_pemission = $this->has_permission('petty_cash_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('petty_cash');
		$data['petty_cash_add_pemission'] = $petty_cash_add_pemission;
		$this->load->view('petty_cash', $data);
	}
	public function newpetty_cash(){
		$this->form_validation->set_rules('petty_cash_date', 'Date', 'trim|required');
		
		
		if ($this->form_validation->run() == TRUE) {
			$result=$this->petty_cash->verify_and_save();
			echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}

	public function update($id)
	{
		$this->permission_check('petty_cash_edit');
		$data = $this->data;
		$result = $this->petty_cash->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['pi'] = $this->input->get('pi');;
		$data['page_title'] = $this->lang->line('petty_cash');
		$this->load->view('petty_cash', $data);
	}

	public function transactions($id)
	{
		$this->permission_check('petty_cash_edit');
		$data = $this->data;
		$result = $this->petty_cash->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('petty_cash');
		$data['parent_epetty_cash'] = $id;
		$this->load->view('petty_cash_transactions', $data);
	}


	public function voucher($id)
	{
		$this->permission_check('petty_cash_edit');
		$data = $this->data;
		$result = $this->petty_cash->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('petty_cash_voucher');
		$this->load->view('petty_cash_voucher', $data);
	}

	public function print_voucher($id)
	{
		$this->permission_check('petty_cash_edit');
		$data = $this->data;
		$result = $this->petty_cash->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('petty_cash_voucher');
		$this->load->view('petty_cash_voucher_print', $data);
	}

	

	public function update_petty_cash()
	{
		$this->form_validation->set_rules('petty_cash_date', 'Date', 'trim|required');

		if ($this->has_permission('petty_cash_edit')) {
			if ($this->form_validation->run() == TRUE) {
				$result = $this->petty_cash->update_petty_cash();
				echo $result;
			} else {
				echo "Please Fill Compulsory(* marked) Fields.";
			}
		} else {
			$result = $this->petty_cash->update_petty_cash_not_admin();
			echo $result;
		}
	}

	
	public function transaction_ajax_list()
	{
		$id = $this->input->post('parent_petty_cash');
		$list = $this->petty_cash->get_datatablesfor_parent($id );
		$petty_cash_add_pemission = $this->has_permission('petty_cash_add');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key => $petty_cash) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]"  value=' . $petty_cash->id . ' class="checkbox column_checkbox" >';


			$row[] = show_date($petty_cash->petty_cash_date);
			$row[] = $petty_cash->petty_cash_ref_no;
			$row[] = $petty_cash->petty_cash_description;
			$row[] = $petty_cash->petty_cash_cash_in;
			$row[] = $petty_cash->petty_cash_cash_out;
			$row[] = $petty_cash->petty_cash_total;


		
			$str2 = '';

			if ($this->permissions('petty_cash_edit'))
			if($petty_cash->parent_id != 0){
				$peram = "?pi=".$petty_cash->parent_id;
			}else{
				$peram = '';
			}
			// $edit_url = base_url("/petty_cash/update/" . $petty_cash->id).$peram ;
			// 	$str2 .= '<a title="Edit Record ?" href="'. $edit_url. '">
			// 										<i class="fa fa-fw fa-edit text-blue"></i>
			// 									</a>';

		
			if( ($key+1) == count($list)){
				if ($this->permissions('petty_cash_delete'))
				$str2 .= '<a style="cursor:pointer" title="Delete Record ?" onclick="delete_petty_cash(' . $petty_cash->id . ')">
													<i class="fa fa-fw fa-trash text-red"></i>
												</a>';
			}

			
			$row[] =  $str2;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->petty_cash->count_all(),
			"recordsFiltered" => $this->petty_cash->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_list()
	{
		$list = $this->petty_cash->get_datatables();
		$petty_cash_add_pemission = $this->has_permission('petty_cash_add');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $petty_cash) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]"  value=' . $petty_cash->id . ' class="checkbox column_checkbox" >';


			$row[] = show_date($petty_cash->petty_cash_date);
			$row[] = $petty_cash->petty_cash_ref_no;
			$row[] = $petty_cash->petty_cash_description;
			$row[] = $petty_cash->petty_cash_cash_in;
			$row[] = $petty_cash->petty_cash_cash_out;
			$row[] = $petty_cash->petty_cash_total;


		
			$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

			if ($this->permissions('petty_cash_edit'))
				$str2 .= '<li>
												<a title="Edit Record ?" href="petty_cash/update/' . $petty_cash->id . '">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

			if ($this->permissions('petty_cash_edit'))
			$str2 .= '<li>
											<a title="Transaction Record" href="petty_cash/transactions/' . $petty_cash->id . '">
												<i class="fa fa-bar-chart  text-blue"></i>Transaction Record
											</a>
										</li>';

			if ($this->permissions('petty_cash_delete'))
				$str2 .= '<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_petty_cash(' . $petty_cash->id . ')">
													<i class="fa fa-fw fa-trash text-red"></i>Delete
												</a>
											</li>
											
										</ul>
									</div>';
			$row[] =  $str2;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->petty_cash->count_all(),
			"recordsFiltered" => $this->petty_cash->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function update_status()
	{
		$this->permission_check_with_msg('customers_edit');
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$result = $this->customers->update_status($id, $status);
		return $result;
	}

	public function delete_petty_cash()
	{
		$this->permission_check_with_msg('petty_cash_delete');
		$id = $this->input->post('q_id');
		return $this->petty_cash->delete_petty_cash_from_table($id);
	}

	public function multi_delete()
	{
		$this->permission_check_with_msg('petty_cash_delete');
		$ids = implode(",", $_POST['checkbox']);
		return $this->petty_cash->delete_petty_cash_from_table($ids);
	}
}
