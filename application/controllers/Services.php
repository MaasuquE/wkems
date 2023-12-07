<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load_global();
		$this->load->model('Services_model','services');
	}

	public function index()
	{
		$this->permission_check('services_view');
		$services_add_pemission = $this->has_permission('services_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('services_list');
		$data=array_merge($data,array('services_add_pemission'=> $services_add_pemission));
		$this->load->view('services-view',$data);
	}
	public function add()
	{
		$this->permission_check('services_add');
		$services_add_pemission = $this->has_permission('services_add');
		$data=$this->data;
		$data['page_title']=$this->lang->line('services');
		$data['services_add_pemission']=$services_add_pemission;
		$this->load->view('services',$data);
	}

	public function newservices(){
		$this->form_validation->set_rules('services_customer_name', 'Customer Name', 'trim|required');
		
		
		if ($this->form_validation->run() == TRUE) {
			$result=$this->services->verify_and_save();
			echo $result;
		} else {
			echo "Please Fill Compulsory(* marked) Fields.";
		}
	}
	public function update($id){
		$this->permission_check('services_edit');
		$services_add_pemission = $this->has_permission('services_add');
		$data=$this->data;
		$result=$this->services->get_details($id,$data);
		$data=array_merge($data,$result);
		$data=array_merge($data,array('sales_id'=>$result['services_invoice_id'],'services_add_pemission'=> $services_add_pemission));
		$data['page_title']=$this->lang->line('services');
		$this->load->view('services', $data);
	}
	public function update_services(){
		$this->form_validation->set_rules('services_customer_name', 'Customer Name', 'trim|required');
		
		if( $this->has_permission('services_add') ){
			if ($this->form_validation->run() == TRUE) {
				$result=$this->services->update_services();
				echo $result;
			} else {
				echo "Please Fill Compulsory(* marked) Fields.";
			}
		}else{
			$result=$this->services->update_services_not_admin();
			echo $result;
		}
	}

	public function show_total_customer_paid_amount($customer_id){
		return $this->db->select("coalesce(sum(paid_amount),0) as tot")->where("customer_id",$customer_id)->get("db_sales")->row()->tot;
	}
	public function ajax_list()
	{
		$list = $this->services->get_datatables();
		$services_add_pemission = $this->has_permission('services_add');
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $services) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" name="checkbox[]"  value='.$services->id.' class="checkbox column_checkbox" >';
			
			
			$row[] = show_date($services->services_date);
			$row[] = $services->services_no;
			$row[] = $services->customer_name;
			$row[] = $services->username;
			$row[] = app_number_format($services->services_stock_used);
			$row[] = $services->services_invoice_no;

			if($services_add_pemission){
				$row[] = app_number_format($services->services_expences);
			}
			
			 		if($services->services_status== 'Processing'){ 
			 			$str= "<span  id='span_".$services->id."'  class='label label-warning' style='cursor:pointer'>Processing </span>";
					}else if($services->services_status== 'Hold'){ 
						$str= "<span  id='span_".$services->id."'  class='label label-danger' style='cursor:pointer'>Hold </span>";
					}else{ 
						$str = "<span  id='span_".$services->id."'  class='label label-success' style='cursor:pointer'> Completed </span>";
					}
			$row[] = $str;			
					$str2 = '<div class="btn-group" title="View Account">
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">';

											if($this->permissions('services_edit'))
											$str2.='<li>
												<a title="Edit Record ?" href="services/update/'.$services->id.'">
													<i class="fa fa-fw fa-edit text-blue"></i>Edit
												</a>
											</li>';
										
											
											if($this->permissions('services_delete'))
											$str2.='<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_services('.$services->id.')">
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
						"recordsTotal" => $this->services->count_all(),
						"recordsFiltered" => $this->services->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function update_status(){
		$this->permission_check_with_msg('customers_edit');
		$id=$this->input->post('id');
		$status=$this->input->post('status');

		$result=$this->customers->update_status($id,$status);
		return $result;
	}
	
	public function delete_services(){
		$this->permission_check_with_msg('services_delete');
		$id=$this->input->post('q_id');
		return $this->services->delete_services_from_table($id);
	}
	public function multi_delete(){
		$this->permission_check_with_msg('services_delete');
		$ids=implode (",",$_POST['checkbox']);
		return $this->services->delete_services_from_table($ids);
	}
	public function show_pay_now_modal(){
		$this->permission_check_with_msg('sales_payment_add');
		$customer_id=$this->input->post('customer_id');
		echo $this->customers->show_pay_now_modal($customer_id);
	}
	public function save_payment(){
		$this->permission_check_with_msg('sales_payment_add');
		echo $this->customers->save_payment();
	}
	public function show_pay_return_due_modal(){
		$this->permission_check_with_msg('sales_return_payment_add');
		$customer_id=$this->input->post('customer_id');
		echo $this->customers->show_pay_return_due_modal($customer_id);
	}
	public function save_return_due_payment(){
		$this->permission_check_with_msg('sales_payment_add');
		echo $this->customers->save_return_due_payment();
	}
	public function delete_opening_balance_entry(){
		$this->permission_check_with_msg('sales_payment_delete');
		$entry_id = $this->input->post('entry_id');
		echo $this->customers->delete_opening_balance_entry($entry_id);
	}

}
