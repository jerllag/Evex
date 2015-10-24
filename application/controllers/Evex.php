<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evex extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if($this->uri->segment(1) == 'evex' && ($this->uri->segment(2) == false || $this->uri->segment(2) == 'change_password' || $this->uri->segment(2) == 'sign_up' || $this->uri->segment(2) == 'profile' || $this->uri->segment(2) == 'organized_events' || $this->uri->segment(2) == 'all_events' || $this->uri->segment(2) == 'log_out' || $this->uri->segment(2) == 'validate_change_password'  || $this->uri->segment(2) == 'change_password_f' || $this->uri->segment(2) == 'check_email' || $this->uri->segment(2) == 'check_password' || $this->uri->segment(2) == 'validate_sign_up' || $this->uri->segment(2) == 'sign_up_f' || $this->uri->segment(2) == 'send_encrypted_email' || $this->uri->segment(2) == 'validate_email' || $this->uri->segment(2) == 'validate_event_code' || $this->uri->segment(2) == 'check_event_code' || $this->uri->segment(2) == 'check_given_feedback' || $this->uri->segment(2) == 'create_event' || $this->uri->segment(2) == 'default_criterias' || $this->uri->segment(2) == 'remove_criteria' || $this->uri->segment(2) == 'event_criteria' || $this->uri->segment(2) == 'validate_create_event' || $this->uri->segment(2) == 'check_name_event' || $this->uri->segment(2) == 'check_event_details' || $this->uri->segment(2) == 'create_event_f' || $this->uri->segment(2) == 'search_event_f' || $this->uri->segment(2) == 'sort_event_f' || $this->uri->segment(2) == 'feedback' || $this->uri->segment(2) == 'user_feedback' || $this->uri->segment(2) == 'results' || $this->uri->segment(2) == 'event_details' || $this->uri->segment(2) == 'get_details_f' || $this->uri->segment(2) == 'add_event_code' || $this->uri->segment(2) == 'add_register_num' || $this->uri->segment(2) == 'register' || $this->uri->segment(2) == 'validate_register' || $this->uri->segment(2) == 'register_check' || $this->uri->segment(2) == 'log_in' || $this->uri->segment(2) == 'get_date_details_f' || $this->uri->segment(2) == 'upload_photo'));
		else {
			redirect('evex');
		}
	}

	public function index() {
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
	
	public function log_in() {
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		$this->db->select('username, fname, lname, birthday, contact_num, email_address, org_name, org_address');
		$this->db->from('organizer');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('valid_user', 1);
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		//$this->session->sess_destroy();
		$this->session->set_userdata('userdata', $result[0]);
		
		echo count($result);
	}
	
	public function change_password() {
		$this->load->view('header');
		$this->load->view('changepassword');
		$this->load->view('footer');
	}
	
	public function validate_change_password() {
		if (!isset($_SESSION['userdata'])) {
			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|callback_check_email');
		} else {
			if(!isset($_SESSION['forgotPasswordEmail'])) {
				$this->form_validation->set_rules('curpass', 'Current Password', 'required|callback_check_password['.$_SESSION['userdata']['email_address'].']');
			}
			$this->form_validation->set_rules('npass', 'New Password', 'required|min_length[6]|max_length[20]|matches[rpass]');
			$this->form_validation->set_rules('rpass', 'Confirm Password', 'required');
		}
		
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			echo "1";
		}
	}
	
	public function change_password_f() {
		if (!isset($_SESSION['userdata'])) {
			$email = $this->input->post('email');
			
			$this->session->set_userdata('forgotPasswordEmail', $email);
			
			$this->send_encrypted_email($email, "forgot_password", "");
		} else {
			$npass = $this->input->post('npass');
			
			$this->db->where('email_address', $_SESSION['userdata']['email_address']);
			$this->db->update('organizer', array('password' => $npass));
			
			if(isset($_SESSION['forgotPasswordEmail'])) {
				$this->session->sess_destroy();
			}
		}
	}
	
	public function check_email($email) {
		$this->db->select('email_address');
		$this->db->from('organizer');
		$this->db->where('email_address', $email);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return TRUE;
		} else {
			$this->form_validation->set_message('check_email', 'Email Address not found');
			return FALSE;
		}
	}
	
	public function check_password($pass, $email) {
		$this->db->select('password');
		$this->db->from('organizer');
		$this->db->where('email_address', $email);
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		if ($result[0]['password'] == $pass) {
			return TRUE;
		} else {
			$this->form_validation->set_message('check_password', 'Current Password not correct');
			return FALSE;
		}
	}
	
	public function log_out() {
		$this->session->sess_destroy();
		redirect("/evex");
	}
	
	public function sign_up() {
		$this->load->view('header');
		$this->load->view('signup');
		$this->load->view('footer');
	}
	
	public function validate_sign_up() {
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[organizer.username]');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('birthday', 'Birthday', 'required');
		$this->form_validation->set_rules('contact_no', 'Contact Number', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[organizer.email_address]');
		$this->form_validation->set_rules('org_name', 'Organization Name', 'required');
		$this->form_validation->set_rules('org_address', 'Organization Address', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]|max_length[20]|matches[rpass]');
		$this->form_validation->set_rules('rpass', 'Confirm Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			echo "1";
		}
	}
	
	public function sign_up_f() {
		$username = $this->input->post("username");
		$fname = $this->input->post("fname");
		$lname = $this->input->post("lname");
		$birthday = $this->input->post("birthday");
		$contactNo = $this->input->post("contact_no");
		$email = $this->input->post("email");
		$org_name = $this->input->post("org_name");
		$org_address = $this->input->post("org_address");
		$pass = $this->input->post("pass");
		//$rpass = $this->input->post("rpass");
		
		$data = array(
			'username' => $username, 
			'fname' => $fname, 
			'lname' => $lname, 
			'birthday' => $birthday, 
			'contact_num' => $contactNo, 
			'email_address' => $email, 
			'org_name' => $org_name, 
			'org_address' => $org_address, 
			'password' => $pass
			);
		
		$query = $this->db->insert('organizer', $data);
		
		array_pop($data);
		
		$this->session->set_userdata('userdata', $data);
		
		$this->send_encrypted_email($email, "sign_up", "");
	}
	
	public function send_encrypted_email($email, $method, $event_num) {
		$encryptedEmail = $this->encrypt->encode($email);
		$encryptedMethod = $this->encrypt->encode($method);
		$encryptedEventNum = "";
		if ($event_num != "") {
			$encryptedEventNum = "&event_code=".urlencode($this->encrypt->encode($event_num));
		}

		$this->email->from('accdum71@gmail.com', 'Evex');
		$this->email->to($email);

		$this->email->subject('Confirm Email Address');
		$this->email->message('Please go to localhost/index.php/evex/validate_email/?email='.urlencode($encryptedEmail).'&method='.urlencode($encryptedMethod).$encryptedEventNum.' to validate your email.');	

		$this->email->send();
	}
	
	public function validate_email() {
		$encryptedEmail = $this->input->get("email");
		$encryptedMethod = $this->input->get("method");
		$encryptedEventNum = $this->input->get("event_code");
		
		$email = $this->encrypt->decode($encryptedEmail);
		$method = $this->encrypt->decode($encryptedMethod);
		$event_code = $this->encrypt->decode($encryptedEventNum);
		
		echo $method;
		
		if($method == "sign_up") {
			if(isset($_SESSION['userdata']) && $_SESSION['userdata']['email_address'] == $email) {
				$this->db->where('email_address', $email);
				$this->db->update('organizer', array('valid_user' => True));
				redirect("/evex");
			}
		} else if ($method == "forgot_password") {
			if(isset($_SESSION['forgotPasswordEmail']) && $_SESSION['forgotPasswordEmail'] == $email) {
				$data = array('email_address' => $_SESSION['forgotPasswordEmail']);
				$this->session->set_userdata('userdata', $data);
				redirect("/evex/change_password");
			}
		} else if ($method == "register") {
			if(isset($_SESSION['register_email']) && $_SESSION['register_email'] == $email) {
				$this->db->where('email_address', $email);
				$this->db->where('event_code', $event_code);
				$this->db->update('event_attendee', array('valid_user' => True));
				
				$this->db->select('username, event_name');
				$this->db->from('event');
				$this->db->where('event_code', $event_code);
				$query = $this->db->get();
				
				$result = $query->result_array();
				
				$this->session->unset_userdata('register_email');
				$this->session->set_userdata('register_success', 1);
				
				redirect("/evex/event_details/".$result[0]['username'].'/'.$result[0]['event_name']);
				
				$this->session->unset_userdata('register_success');
			}
		} else {}
	}
	
	public function organized_events() {
		if(isset($_SESSION['userdata'])) {
			$this->event('organized');
		} else {
			show_404('my404');
		}
	}
	
	public function all_events() {
		$this->event('all');
	}
	
	public function event($type) {
		$this->db->select('event_num, event_name, description, a.username, fname, lname, org_name, (SELECT count(event_code) from event_attendee WHERE event_code = a.event_code)');
		$this->db->from('event as a, organizer as b');
		if(isset($type) && $type == 'organized') {
			$this->db->where('a.username', $_SESSION['userdata']['username']);
		}
		$this->db->where('a.username=b.username');
		$this->db->group_by(array("event_name", "description")); 
		$query = $this->db->get();
		
		$data['events'] = array();
		
		foreach($query->result_array() as $i=>$line) {
			$data['events'][$i] = array_values($line);
		}
	
		//print json_encode($data);
	
		$this->load->view('header');
		$this->load->view('event');
		$this->load->view('event_list', $data);
		$this->load->view('footer');
	}
	
	public function validate_event_code() {		
		$this->form_validation->set_rules('event_code', 'Event Code', 'required|callback_check_event_code['.$this->input->post('email').']');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|callback_check_given_feedback['.$this->input->post('event_code').']');
		
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$this->session->set_userdata('event_code', $this->input->post('event_code'));
			$this->session->set_userdata('email', $this->input->post('email'));
			echo "1";
		}
	}
	
	public function check_event_code($event_code, $email) {
		$this->db->select('event_code');
		$this->db->from('event_attendee');
		$this->db->where('event_code', $event_code);
		$this->db->where('email_address', $email);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return TRUE;
		} else {
			$this->form_validation->set_message('check_event_code', 'Invalid email or event code.');
			return FALSE;
		}
	}
	
	public function check_given_feedback($email, $event_code) {
		$this->db->select('given_feedback');
		$this->db->from('event_attendee');
		$this->db->where('event_code', $event_code);
		$this->db->where('email_address', $email);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			if ($query->result_array()[0]['given_feedback'] == 1) {
				$this->form_validation->set_message('check_given_feedback', 'You have already given your feedback for this event');
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}
	
	public function create_event() {	
		$this->session->set_userdata('criterias', array("Relevance to the Theme", "Organization", "Utilization of Devices or Visual Aids", "Reasonable Time Allotment", "Interaction or Audience Rapport", "Venue"));
	
		$this->load->view('header');
		$this->load->view('createEvent');
		$this->load->view('footer');
	}
	
	public function default_criterias() {
		$data['criterias'] = $_SESSION['criterias'];
		
		$this->load->view('default_criterias', $data);
	}
	
	public function remove_criteria() {
		$key = $this->input->post('key');
		echo $key;
		$data = $_SESSION['criterias'];
		unset($data[$key]);
		$this->session->set_userdata('criterias', array_values($data));
	}
	
	public function event_criteria() {
		$criterias = json_decode($this->input->post('criterias'), true);
		$event_name = $this->input->post('event_name');
		
		$this->db->select('event_num');
		$this->db->from('event');
		$this->db->where('username', $_SESSION['userdata']['username']);
		$this->db->where('event_name', $event_name);
		$query = $this->db->get();
		
		$event_num = $query->result_array()[0]['event_num'];
		
		foreach($_SESSION['criterias'] as $criteria) {
			$this->db->select('event_num');
			$this->db->from('event_criteria');
			$this->db->where('event_num', $event_num);
			$this->db->where('criteria', $criteria);
			$query = $this->db->get();
			$has_event_num = $query->num_rows();
			
			if(!$has_event_num) {
				$query = $this->db->insert('event_criteria', array('event_num' => $event_num, 'criteria' => $criteria));
			}
		}
		
		foreach($criterias as $criteria) {
			$this->db->select('event_num');
			$this->db->from('event_criteria');
			$this->db->where('event_num', $event_num);
			$this->db->where('criteria', $criteria['value']);
			$query = $this->db->get();
			$has_event_num = $query->num_rows();
			
			if(!$has_event_num) {
				$query = $this->db->insert('event_criteria', array('event_num' => $event_num, 'criteria' => $criteria['value']));
			}
		}
	}
	
	public function validate_create_event() {	
		$this->form_validation->set_rules('event_name', 'Event Name', 'required|callback_check_event_name|callback_check_event_details');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('venue', 'Venue', 'required');
		$this->form_validation->set_rules('start_time', 'Start Time', 'required');
		$this->form_validation->set_rules('end_time', 'End Time', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			echo "1";
		}
	}
	
	public function check_event_name($event_name) {
		$this->db->select('event_name');
		$this->db->from('event');
		$this->db->where('event_name', $event_name);
		$this->db->where('username !=', $_SESSION['userdata']['username']);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('check_event_name', 'Event Name already taken');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function check_event_details($event_name) {
		$date = $this->input->post('date');
		$venue = $this->input->post('venue');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
	
		$this->db->select('*');
		$this->db->from('event');
		$this->db->where('event_name', $event_name);
		$this->db->where('date', $date);
		$this->db->where('venue', $venue);
		$this->db->where('start_time', $start_time);
		$this->db->where('end_time', $end_time);
		$this->db->where('username', $_SESSION['userdata']['username']);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('check_event_details', 'Event already created');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function create_event_f() {
		$this->load->helper('string');
	
		$event_name = $this->input->post("event_name");
		$date = $this->input->post("date");
		$venue = $this->input->post("venue");
		$start_time = $this->input->post("start_time");
		$end_time = $this->input->post("end_time");
		$description = $this->input->post("description");
		$category = $this->input->post("category");
		
		$this->db->distinct();
		$this->db->select('event_num');
		$this->db->from('event');
		$this->db->where('event_name', $event_name);
		$this->db->where('username', $_SESSION['userdata']['username']);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			$event_num = $query->result_array()[0]['event_num'];
		} else {
			$this->db->select_max('event_num');
			$this->db->from('event');
			$query = $this->db->get();
			$event_num = $query->result_array()[0]['event_num'] + 1;
		}
		
		do {
			$event_code = strtolower(random_string('alnum', 6));
			
			$this->db->select('event_code');
			$this->db->from('event');
			$this->db->where('event_code', $event_code);
			$query = $this->db->get();
			
			$result = $query->num_rows();
		} while($result > 0);
		
		$data = array(
			'event_num' => $event_num,
			'username' => $_SESSION['userdata']["username"],
			'event_code' => $event_code,
			'event_name' => $event_name,
			'date' => $date, 
			'venue' => $venue, 
			'start_time' => $start_time, 
			'end_time' => $end_time, 
			'description' => $description,
			'category' => $category
			);
		
		$query = $this->db->insert('event', $data);
		
		$config['upload_path'] = './event_pics/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			//return $picture;
			echo $this->upload->display_errors();
		}
		else
		{
			echo "1";
		}
	}
	
	public function upload_photo() {
	
		$config['upload_path'] = './event_pics/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('pota'))
		{
			//return $picture;
			echo $this->upload->display_errors();
		}
		else
		{
			echo $this->input->post('userfile');
			echo "1";
		}
	}
	
	public function search_event_f() {
		$event_name = $this->input->post("event_name");
		
		$this->db->select('*');
		$this->db->from('event');
		if(isset($_SESSION['my_events'])) {
			$this->db->where('a.username', $_SESSION['userdata']['username']);
		}
		if($event_name != "") {
			$this->db->like('event_name', $event_name); 
		}
		$query = $this->db->get();
		
		$data['events'] = array();
		
		foreach($query->result_array() as $i=>$line) {
			$data['events'][$i] = array_values($line);
		}
		
		$this->load->view('event_list', $data);
	}
	
	public function sort_event_f() {
		$sort_by = $this->input->post("sortBy");
		$ctr = $this->input->post("ctr");
		$order = 'asc';
		if ($ctr%2 == 1) {
			$order = 'asc';
		} else {
			$order = 'desc';
		}
		
		$this->db->select('event_num, event_name, description, a.username, fname, lname, org_name, (SELECT count(event_code) from event_attendee WHERE event_code = a.event_code)');
		$this->db->from('event as a, organizer as b');
		$this->db->where('a.username=b.username');
		if(isset($_SESSION['my_events'])) {
			$this->db->where('a.username', $_SESSION['userdata']['username']);
		}
		$this->db->group_by(array("event_name", "description")); 
		if($sort_by != "") {
			$this->db->order_by($sort_by, $order); 
		}
		$query = $this->db->get();
		
		$data['events'] = array();
		
		foreach($query->result_array() as $i=>$line) {
			$data['events'][$i] = array_values($line);
		}
		
		$this->load->view('event_list', $data);
	}
	
	public function profile() {
		$this->db->select('event_name');
		$this->db->from('event');
		$this->db->where('username', $_SESSION['userdata']['username']);
		$this->db->group_by('username, event_name');
		$query = $this->db->get();
	
		$data['events'] = $query->result_array();
	
		$this->load->view('header');
		$this->load->view('profile', $data);
		$this->load->view('footer');
	}
	
	public function feedback() {
		$this->db->select('criteria');
		$this->db->from('event_criteria');
		$this->db->where('event_num', $_SESSION['event_num']);
		$query = $this->db->get();
	
		$data['criterias'] = $query->result_array();
		$data['color'] = array("-success", "-info", "-warning", "-danger", "-primary");
	
		$this->load->view('header');
		$this->load->view('feedback', $data);
		$this->load->view('footer');
	}
	
	public function user_feedback() {
		$data = json_decode($this->input->post('data'), true);
		$criteria = $this->input->post('criteria');
		$event_num = $_SESSION['event_num'];
		$event_code = $_SESSION['event_code'];
		$email = $_SESSION['email'];
		
		$this->session->unset_userdata('event_num');
		$this->session->unset_userdata('event_code');
		$this->session->unset_userdata('email');
		
		foreach($data as $i=>$score) {
			if ($i < count($data)-1) {
				$this->db->select('score');
				$this->db->from('event_criteria');
				$this->db->where('event_num', $event_num);
				$this->db->where('criteria', $criteria[$i]['criteria']);
				$query = $this->db->get();
				
				$result = $query->result_array()[0]['score'];
				$average = 0;
				
				if ($result > 0) {
					$average = ($result+($score['value']/10))/2;
				} else {
					$average = ($result+($score['value']/10));
				}
				
				$this->db->where('event_num', $event_num);
				$this->db->where('criteria', $criteria[$i]['criteria']);
				$this->db->update('event_criteria', array('score' => $average));
			}
		}
		
		$this->db->where('event_code', $event_code);
		$this->db->where('email_address', $email);
		$this->db->update('event_attendee', array('given_feedback' => 1));
		
		$this->session->set_userdata('feedback_success', 1);
		echo "1";
		$this->session->unset_userdata('feedback_success');
	}
	
	public function results($username, $event_name) {
		$this->db->distinct();
		$this->db->select('criteria, score');
		$this->db->from('event a, event_criteria b');
		$this->db->where('a.event_num = b.event_num');
		$this->db->where('a.username',  urldecode($username));
		$this->db->where('a.event_name', urldecode($event_name));
		$query = $this->db->get();
	
		$data['criterias'] = $query->result_array();
	
		$this->load->view('header');
		$this->load->view('results', $data);
		$this->load->view('footer');
	}
	
	public function event_details($username, $event_name) {
		$this->db->distinct();
		$this->db->select('date');
		$this->db->from('event');
		$this->db->where('username', $username);
		$this->db->where('event_name', urldecode($event_name));
		$query = $this->db->get();
		
		$data['details'] = $query->result_array();
		$data['event_name'] = urldecode($event_name);
		$data['username'] = $username;
		
		$this->db->distinct();
		$this->db->select('description');
		$this->db->from('event');
		$this->db->where('username', $username);
		$this->db->where('event_name', urldecode($event_name));
		$query = $this->db->get();
		
		$data['description'] = $query->result_array();
	
		$this->load->view('header');
		$this->load->view('event_details', $data);
		$this->load->view('footer');
	}
	
	public function get_date_details_f() {
		$username = $this->input->post('username');
		$event_name = $this->input->post('event_name');
		$date = $this->input->post('date');
		
		$this->db->select('*');
		$this->db->from('event');
		$this->db->where('username', $username);
		$this->db->where('event_name', $event_name);
		$this->db->where('date', $date);
		$query = $this->db->get();
		
		$data['details'] = $query->result_array();
		$data['username'] = $username;
		
		$this->load->view('date_details', $data);
	}
	
	public function add_event_code() {
		$event_code = $this->input->post('event_code');
		$this->session->set_userdata('event_code', $event_code);
	}
	
	public function add_event_num() {
		$event_num = $this->input->post('event_num');
		$this->session->set_userdata('event_num', $event_num);
	}
	
	public function register() {
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$birthday = $this->input->post('birthday');
		$contactno = $this->input->post('contactNo');
		$email = $this->input->post('email');
		
		$data = array(
			'event_code' => $_SESSION['event_code'],
			'fname' => $fname,
			'lname' => $lname,
			'birthday' => $birthday,
			'contact_num' => $contactno, 
			'email_address' => $email
			);
		
		$query = $this->db->insert('event_attendee', $data);
		$this->session->set_userdata('register_email', $email);
		
		$this->send_encrypted_email($email, "register", $_SESSION['event_code']);
		
	}
	
	public function validate_register() {
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('birthday', 'Birthday', 'required');
		$this->form_validation->set_rules('contactNo', 'Contact Number', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|callback_register_check['.$_SESSION['event_code'].']');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			echo "1";
		}
	}
	
	public function register_check($email, $event_code) {
		$this->db->select('email_address');
		$this->db->from('event_attendee');
		$this->db->where('email_address', $email);
		$this->db->where('event_code', $event_code);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			$this->form_validation->set_message('register_check', 'Email Address already registered');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
