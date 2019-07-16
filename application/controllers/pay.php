<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pay extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->library('session');
		$this->load->library('email');
	}
	
	public function index(){
		$plan_id = $this->input->post('plan_id');
		$query = $this->db->get_where('tbl_pricing_plan',array('plan_id' => $plan_id));
		$record = $query->row();
		$data['price'] = $record->price;
		$this->load->view('client/payment_form',$data);
	}
	
	public function addData(){
	 $purchase_type = $this->input->post('type');
	 $plan_id = $this->input->post('plan_id');
	 $activation_date = $this->input->post('activation_date');

		$newdata = array(
                   'purchase_type'  => $purchase_type,
                   'plan_id' => $plan_id,
                   'activation_date' => $activation_date
               );
		$this->session->set_userdata($newdata);
		echo "success";
	}

	public function getStatus(){

		@$user_id = $this->session->userdata('user_id');

		if(@$user_id == ""){
			$user_id = "N/A";
		}

		$invoice_id = $_GET['INVOICE_ID'];
		$payment_account = $_GET['PAYMENT_ACCOUNT'];
		$auth_code = $_GET['AUTH_CODE'];
		$card_type = $_GET['CARD_TYPE'];
		$amount = $_GET['AMOUNT'];
		$result = $_GET['Result'];
		
		if($result == "APPROVED"){
			$this->load->model('Idgenerator');
			$type = $this->session->userdata('purchase_type');

			$this->email->from('users');
			$this->email->to('tomas@tfit360.com');

			$this->email->subject('Bluepay Payment Confirmation');
			$message = "Bluepay payment APPROVED	
						Inovice_id = ". $invoice_id. "
						payment_account = ". $payment_account. "
						Amount = ".$amount. "
						card type = ".$card_type. 
						"Thank You.
						Please keep this email for future reference";
			$this->email->message($message);

			$this->email->send();
			$data = array(
				'bill_no' => $invoice_id,
				'payment_account' => $payment_account,
				'auth_code' => $auth_code,
				'card_type' => $card_type,
				'amount' => $amount,
				'status' => $result,
				'user_id' => $user_id
				);

			if($type == "plan"){
				$data['type'] = "subscription";
				$subscription_id = $this->Idgenerator->genId('tbl_bill_subscription','subscription_id');
				
				$plan_id = $this->session->userdata('plan_id');
				$activation_date = $this->session->userdata('activation_date');

				$plan_query = $this->db->get_where('tbl_pricing_plan', array('plan_id' => $plan_id));
				$record = $plan_query->row();

				$duration = " +".$record->duration. " months";

				$expiration_date = date('Y-m-d', strtotime($duration, strtotime($activation_date)));

				if($this->db->insert('tbl_bill',$data)){
					$data = array(
						'subscription_id' => $subscription_id,
						'bill_no' => $invoice_id,
						'user_id' => $user_id,
						'plan_id' => $plan_id,
						'subscription_start_date' => $activation_date,
						'expiration_date' => $expiration_date	
						);
					if($this->db->insert('tbl_bill_subscription',$data)){
						$array_items = array('purchase_type' => '', 'plan_id' => '', 'activation_date' => '');
						$this->session->unset_userdata($array_items);
						$product_query = $this->db->get('tbl_product');
						$data['product_result'] = $product_query->result();
						$data['notification'] = "success";

						$this->load->view('client/store',$data);
					}else{
						echo "error";
					}
				}
			}
			elseif($type == "bootcamp"){
				$data['type'] = "bootcamp";
				$order_id = $this->Idgenerator->genId('tbl_bootcamp_bill','order_id');
				$camp_id = $this->session->userdata('bootcamp_id');
				$title = $this->session->userdata('title');
				$price = $this->session->userdata('price');

				if($this->db->insert('tbl_bill',$data)){
					$data = array(
						'order_id' => $order_id,
						'camp_id' => $camp_id,
						'name' => $title,
						'price' => $price,
						'bill_no' => $invoice_id	
						);
					$this->db->insert('tbl_bootcamp_bill',$data);
					$array_items = array('bootcamp_id' => '', 'title' => '', 'purchase_type' => '', 'price' => '');
					$this->session->unset_userdata($array_items);
					$product_query = $this->db->get('tbl_product');
					$data['product_result'] = $product_query->result();
					$data['notification'] = "success";
					$this->load->view('client/store',$data);
				}
			}
			else{
				$data['type'] = "product";
				if($this->db->insert('tbl_bill',$data)){
					foreach($this->cart->contents() as $item){
						$order_id = $this->Idgenerator->genId('tbl_order_item_bill','order_id');
						$data = array(
							'order_id' => $order_id,
							'bill_no' => $invoice_id,
							'product_id' => $item['id'],
							'rate' => $item['price'],
							'quantity' => $item['qty']
							);
						if($this->db->insert('tbl_order_item_bill',$data)){
							$notification_flag = 1;
						}
					}
				}

				if($notification_flag == 1){
					$this->cart->destroy();
					$data['notification'] = "success";

				}else{
					$this->cart->destroy();					
					$data['notification'] = "payment_declined";
					
				}
				$product_query = $this->db->get('tbl_product');
				$data['product_result'] = $product_query->result();
				$this->load->view('client/store',$data);

			}
		}elseif($result == "DECLINED"){
			$this->cart->destroy();
			$product_query = $this->db->get('tbl_product');
			$data['product_result'] = $product_query->result();
			$data['notification'] = "payment_declined";
			$this->load->view('client/store',$data);
		}
	}

	public function addBootcampData(){
		$bootcamp_id = $this->input->post('bootcamp_id');
		$title = $this->input->post('name');
		$price = $this->input->post('price');

		$newdata = array(
			'bootcamp_id'  => $bootcamp_id,
			'title' => $title,
			'price' => $price,
			'purchase_type' => 'bootcamp'
			);
		$this->session->set_userdata($newdata);
		echo "success";

	}


	/** Clear the old cache (usage optional) **/ 
	protected function no_cache(){
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
	}
}