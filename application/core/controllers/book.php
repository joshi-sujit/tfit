<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Book extends CI_Controller {
	
	   
	public function index()
	{
		
		
	    $room=strip_tags($this->input->post('roomname'));
		$child=strip_tags($this->input->post('child'));
		$adults=strip_tags($this->input->post('adult'));
		$check_in=strip_tags($this->input->post('date_in'));
		$check_out=strip_tags($this->input->post('date_out'));
		$plan = strip_tags($this->input->post('plan'));
		$name= strip_tags($this->input->post('f_name'));
		$add= strip_tags($this->input->post('address'));
		$phone= strip_tags($this->input->post('phonenumber'));
		$email= strip_tags($this->input->post('email'));
        $today = date("F j, Y, g:i a");
		
		
		if($room == '')
		{
		 $this->session->set_flashdata('null_er', 'Please select the room name.');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location'); 
		 
		}
		
		elseif($child == '')
		{
			$this->session->set_flashdata('null_er', 'Please select atleast 0 child');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location'); 
			
		}
		elseif($adults== '')
		{
			$this->session->set_flashdata('null_er', 'Please select atleast 0 adults');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location'); 
		}
		
		elseif($check_in == '')
		{
			$this->session->set_flashdata('null_er', 'Please select check in date');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location'); 
		}
		elseif($check_out == '')
		{
			$this->session->set_flashdata('null_er', 'Please select check out date');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location'); 
		}
		elseif($plan  == '')
		{
			$this->session->set_flashdata('null_er', 'Please select room plan');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location'); 
			
		}
		
		elseif($name == '')
		{
			$this->session->set_flashdata('null_er', 'Please enter your name.');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location'); 
		}
		
		elseif($add =='')
		{
			$this->session->set_flashdata('null_er', 'Please enter your address.');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location'); 
		}
		elseif($phone == '')
		{
			$this->session->set_flashdata('null_er', 'Please enter your phone number.');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location');
			
		}
		elseif($email  ==  '')
		{
			$this->session->set_flashdata('null_er', 'Please enter your email.');
		 $ref = $this->input->server('HTTP_REFERER', TRUE);
		 redirect($ref, 'location');
		}
		else
		{
		$data = array(
		             'Id' => NULL,
					 'roomname'  =>$room,
					 'child' => $child,
					 'adults' => $adults,
					 'check_in'  => $check_in,
					 'check_out' => $check_out,
					 'name'      =>  $name,
					 'address'  => $add,
					 'plan'   =>   $plan,
					 'email'  =>  $email,
					 'phone'  => $phone
					 );
					 $result=$this->db->insert('book', $data); 
					 if($result)
					  {
						  
						require_once ("phpmailer/class.phpmailer.php");
			require_once ("phpmailer/class.smtp.php");
            $mail             = new PHPMailer(); // defaults to using php "mail()"
            $mail->IsSendmail(); // telling the class to use SendMail transport
            $mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true;  // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465; 
			$mail->Username = 'getwayofmail@gmail.com';  
			$mail->Password = 'mailcenter123!@#';
			$mail->SetFrom("$email","$name");
			$mail->AddReplyTo("$email","$name");
			$mail->AddAddress("info@godavariresort.com.np","GVR");
			//resume@dianaoverseas.com
			$mail->Subject = "Booking";
	 $msg="<div style='width:600px;height:auto;padding:20px 0px;'>
		          
					Full Name =	 ".$name.". <br/>
					Address =	 ".$add.". <br/>
					Email = ".$email."<br/>
					Contact No. = ".$phone."<br/>
					Room Name. = ".$room."<br/>
					Plan  = ".$plan."<br />
					Adults. = ".$adults."<br/>
					Child = ".$child."<br/>
					Check In Date. = ".$check_in."<br/>
					Ceck Out Date. = ".$check_out."<br/>
					Post Date =  ".$today."<br>
					
					
				</div>" ;
    $body = $msg;
	$mail->MsgHTML($body);
   	
	if(!$mail->Send()) {
	echo   $data['msg_snd']="Mailer Error: " . $mail->ErrorInfo;
	} else {
	        
			require_once ("phpmailer/class.phpmailer.php");
			require_once ("phpmailer/class.smtp.php");
            $mail             = new PHPMailer(); // defaults to using php "mail()"
            $mail->IsSendmail(); // telling the class to use SendMail transport
            $mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true;  // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465; 
			$mail->Username = 'getwayofmail@gmail.com';  
			$mail->Password = 'mailcenter123!@#';
			$mail->SetFrom("info@godavariresort.com.np","GVR");
			$mail->AddAddress("$email","$name");
			//resume@dianaoverseas.com
			$mail->Subject = "Thank you";
	$msg="<div style='width:600px;height:auto;padding:20px 0px;'>
		          
				Dear ".$name." your Booking request has been submitted sucesssully.
			  your  submission details are :-
				</div>
			
			<div style='width:600px;height:auto;padding:20px 0px;'>
		          
					Full Name =	 ".$name.". <br/>
					Address =	 ".$add.". <br/>
					Email = ".$email."<br/>
					Contact No. = ".$phone."<br/>
					Room Name. = ".$room."<br/>
					Plan  = ".$plan."<br />
					Adults. = ".$adults."<br/>
					Child = ".$child."<br/>
					Check In Date. = ".$check_in."<br/>
					Ceck Out Date. = ".$check_out."<br/>
					Post Date =  ".$today."<br>
					
					
				</div>" ;
    $body = $msg;
    $mail->MsgHTML($body);
	if(!$mail->Send()) {
	echo   $data['msg_snd']="Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	
 	$this->session->set_userdata('sucess',"Thank you $name. Your message is sent.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location'); 
    exit;
	}
   }

	
	  
						  
						  
					  }
	}
	}
}
?>