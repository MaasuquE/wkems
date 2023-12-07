<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rap_payment extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load_global();
		$this->load->model('Rap_payment_model', 'rap_payment');
	}

	public function index()
	{
		$this->permission_check('rap_payment_view');
		$rap_payment_add_pemission = $this->has_permission('rap_payment_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('rap_payment_list');
		$data = array_merge($data, array('rap_payment_add_pemission' => $rap_payment_add_pemission));
		$this->load->view('rap_payment-view', $data);
	}
	public function add()
	{
		
		$this->permission_check('rap_payment_add');
		$rap_payment_add_pemission = $this->has_permission('rap_payment_add');
		$data = $this->data;
		$data['page_title'] = $this->lang->line('rap_payment');
		$data['rap_payment_add_pemission'] = $rap_payment_add_pemission;
		$this->load->view('rap_payment', $data);
	}
	public function newrap_payment(){
		$this->form_validation->set_rules('rap_payment_date', 'Date', 'trim|required');
		$this->form_validation->set_rules('rap_payment_customer_name', 'Customer Name', 'trim|required');
		
		
		if ($this->form_validation->run() == TRUE) {
			$result=$this->rap_payment->verify_and_save();
			echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}

	public function update($id)
	{
		$this->permission_check('rap_payment_edit');
		$data = $this->data;
		$result = $this->rap_payment->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('rap_payment');
		$this->load->view('rap_payment', $data);
	}

	public function voucher($id)
	{
		$this->permission_check('rap_payment_edit');
		$data = $this->data;
		$result = $this->rap_payment->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('rap_payment_voucher');
		$this->load->view('rap_payment_voucher', $data);
	}

	public function print_voucher($id)
	{
		$this->permission_check('rap_payment_edit');
		$data = $this->data;
		$result = $this->rap_payment->get_details($id, $data);
		$data = array_merge($data, $result);
		$data['page_title'] = $this->lang->line('rap_payment_voucher');
		$this->load->view('rap_payment_voucher_print', $data);
	}

	

	public function update_rap_payment()
	{
		$this->form_validation->set_rules('rap_payment_date', 'Date', 'trim|required');
		$this->form_validation->set_rules('rap_payment_customer_name', 'Customer Name', 'trim|required');

		if ($this->has_permission('rap_payment_edit')) {
			if ($this->form_validation->run() == TRUE) {
				$result = $this->rap_payment->update_rap_payment();
				echo $result;
			} else {
				echo "Please Fill Compulsory(* marked) Fields.";
			}
		} else {
			$result = $this->rap_payment->update_rap_payment_not_admin();
			echo $result;
		}
	}


	public function ajax_list()
	{
		$list = $this->rap_payment->get_datatables();
		$rap_payment_add_pemission = $this->has_permission('rap_payment_add');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rap_payment) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]"  value=' . $rap_payment->id . ' class="checkbox column_checkbox" >';


			$row[] = show_date($rap_payment->rap_payment_date);
			$row[] = $rap_payment->rap_payment_no;
			$row[] = $rap_payment->customer_name;
			$row[] = $rap_payment->rap_payment_sum_of;
			$row[] = $rap_payment->rap_payment_on_bank;
			$row[] = $rap_payment->rap_payment_cash_or_check_no;


		
			$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';
			if ($this->permissions('rap_payment_view'))
			$str2 .= '<li>
											<a title="View payment" href="rap_payment/voucher/' . $rap_payment->id . '">
												<i class="fa fa-fw fa-edit text-blue"></i>View payment
											</a>
										</li>';

			if ($this->permissions('rap_payment_edit'))
				$str2 .= '<li>
												<a title="Edit Record ?" href="rap_payment/update/' . $rap_payment->id . '">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';

			if ($this->permissions('rap_payment_delete'))
				$str2 .= '<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_rap_payment(' . $rap_payment->id . ')">
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
			"recordsTotal" => $this->rap_payment->count_all(),
			"recordsFiltered" => $this->rap_payment->count_filtered(),
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

	public function delete_rap_payment()
	{
		$this->permission_check_with_msg('rap_payment_delete');
		$id = $this->input->post('q_id');
		return $this->rap_payment->delete_rap_payment_from_table($id);
	}

	public function multi_delete()
	{
		$this->permission_check_with_msg('rap_payment_delete');
		$ids = implode(",", $_POST['checkbox']);
		return $this->rap_payment->delete_rap_payment_from_table($ids);
	}
}
