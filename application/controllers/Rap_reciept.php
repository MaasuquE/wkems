<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rap_reciept extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('Rap_reciept_model', 'rap_reciept');
	}

	public function index()
	{
		$this->permission_check('rap_reciept_view');
		$rap_reciept_add_pemission = $this->has_permission('rap_reciept_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('rap_reciept_list');
		$data = array_merge($data, array('rap_reciept_add_pemission' => $rap_reciept_add_pemission));
		$this->load->view('rap_reciept-view', $data);
	}
	public function add()
	{
		
		$this->permission_check('rap_reciept_add');
		$rap_reciept_add_pemission = $this->has_permission('rap_reciept_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('rap_reciept');
		$data['rap_reciept_add_pemission'] = $rap_reciept_add_pemission;
		$this->load->view('rap_reciept', $data);
	}
	public function newrap_reciept(){
		$this->form_validation->set_rules('rap_reciept_date', 'Date', 'trim|required');
		$this->form_validation->set_rules('rap_reciept_customer_name', 'Customer Name', 'trim|required');
		
		
		if ($this->form_validation->run() == TRUE) {
			$result=$this->rap_reciept->verify_and_save();
			echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}

	public function update($id)
	{
		$this->permission_check('rap_reciept_edit');
		$data = $this->data;
		$result = $this->rap_reciept->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('rap_reciept');
		$this->load->view('rap_reciept', $data);
	}

	public function voucher($id)
	{
		$this->permission_check('rap_reciept_edit');
		$data = $this->data;
		$result = $this->rap_reciept->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('rap_reciept_voucher');
		$this->load->view('rap_reciept_voucher', $data);
	}

	public function print_voucher($id)
	{
		$this->permission_check('rap_reciept_edit');
		$data = $this->data;
		$result = $this->rap_reciept->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('rap_reciept_voucher');
		$this->load->view('rap_reciept_voucher_print', $data);
	}

	

	public function update_rap_reciept()
	{
		$this->form_validation->set_rules('rap_reciept_date', 'Date', 'trim|required');
		$this->form_validation->set_rules('rap_reciept_customer_name', 'Customer Name', 'trim|required');

		if ($this->has_permission('rap_reciept_edit')) {
			if ($this->form_validation->run() == TRUE) {
				$result = $this->rap_reciept->update_rap_reciept();
				echo $result;
			} else {
				echo "Please Fill Compulsory(* marked) Fields.";
			}
		} else {
			$result = $this->rap_reciept->update_rap_reciept_not_admin();
			echo $result;
		}
	}


	public function ajax_list()
	{
		$list = $this->rap_reciept->get_datatables();
		$rap_reciept_add_pemission = $this->has_permission('rap_reciept_add');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rap_reciept) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]"  value=' . $rap_reciept->id . ' class="checkbox column_checkbox" >';


			$row[] = show_date($rap_reciept->rap_reciept_date);
			$row[] = $rap_reciept->rap_reciept_no;
			$row[] = $rap_reciept->customer_name;
			$row[] = $rap_reciept->rap_reciept_sum_of;
			$row[] = $rap_reciept->rap_reciept_on_bank;
			$row[] = $rap_reciept->rap_reciept_cash_or_check_no;


		
			$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';
			if ($this->permissions('rap_reciept_view'))
			$str2 .= '<li>
											<a title="View reciept" href="rap_reciept/voucher/' . $rap_reciept->id . '">
												<i class="fa fa-fw fa-edit text-blue"></i>View reciept
											</a>
										</li>';

			if ($this->permissions('rap_reciept_edit'))
				$str2 .= '<li>
												<a title="Edit Record ?" href="rap_reciept/update/' . $rap_reciept->id . '">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

			if ($this->permissions('rap_reciept_delete'))
				$str2 .= '<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_rap_reciept(' . $rap_reciept->id . ')">
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
			"recordsTotal" => $this->rap_reciept->count_all(),
			"recordsFiltered" => $this->rap_reciept->count_filtered(),
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

	public function delete_rap_reciept()
	{
		$this->permission_check_with_msg('rap_reciept_delete');
		$id = $this->input->post('q_id');
		return $this->rap_reciept->delete_rap_reciept_from_table($id);
	}

	public function multi_delete()
	{
		$this->permission_check_with_msg('rap_reciept_delete');
		$ids = implode(",", $_POST['checkbox']);
		return $this->rap_reciept->delete_rap_reciept_from_table($ids);
	}
}
