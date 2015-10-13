<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evex extends CI_Controller {
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
		
		$this->session->set_userdata('userdata', $result[0]);
		
		echo count($result);
	}
	
	public function log_out() {
		$this->session->sess_destroy();
		redirect("/evex");
	}
	
	public function sign_up_view() {
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
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]|max_length[12]|matches[rpass]');
		$this->form_validation->set_rules('rpass', 'Confirm Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			echo "1";
		}
	}
	
	public function sign_up() {
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
		$this->session->set_userdata('userdata', $data);
		
		$encrypted = $this->encrypt->encode($email);

		$this->email->from('accdum71@gmail.com', 'Evex');
		$this->email->to($email);

		$this->email->subject('Confirm Email Address');
		$this->email->message('Please go to localhost/index.php/evex/validate_email/?email='.$encrypted.' to validate your email.');	

		$this->email->send();
	}
	
	public function validate_email() {
		$encryptedEmail = $this->input->get("email");
		
		$email = $this->encrypt->decode($encryptedEmail);
		
		if(isset($_SESSION['userdata']) && $_SESSION['userdata']['email'] == $email) {
			$this->db->where('email_address', $email);
			$this->db->update('organizer', array('valid_user' => True));
			redirect("/evex");
		}
	}
	
	public function event() {
		$this->db->select('*');
		$this->db->from('event');
		if(isset($_SESSION['userdata'])) {
			$this->db->where('username', $_SESSION['userdata']['username']);
		}
		$query = $this->db->get();
		
		$data['events'] = array();
		
		foreach($query->result_array() as $i=>$line) {
			$data['events'][$i] = array_values($line);
		}
	
		$this->load->view('header');
		$this->load->view('event');
		$this->load->view('event_list', $data);
		$this->load->view('footer');
	}
	
	public function create_event_view() {
		$this->load->view('header');
		$this->load->view('createEvent');
		$this->load->view('footer');
	}
	
	public function validate_create_event() {
		$this->form_validation->set_rules('event_name', 'Event Name', 'required');
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
	
	public function create_event() {
		$this->load->helper('string');
	
		$event_name = $this->input->post("event_name");
		$date = $this->input->post("date");
		$venue = $this->input->post("venue");
		$start_time = $this->input->post("start_time");
		$end_time = $this->input->post("end_time");
		$description = $this->input->post("description");
		$category = $this->input->post("category");
		
		do {
			$event_code = strtolower(random_string('alnum', 6));
			
			$this->db->select('event_code');
			$this->db->from('event');
			$this->db->where('event_code', $event_code);
			$query = $this->db->get();
			
			$result = $query->num_rows();
		} while($result > 0);
		
		$data = array(
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
	}
	
	public function search_event() {
		$event_name = $this->input->post("event_name");
		
		$this->db->select('*');
		$this->db->from('event');
		if(isset($_SESSION['userdata'])) {
			$this->db->where('username', $_SESSION['userdata']['username']);
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
	
	public function feedback_view() {
		$this->load->view('header');
		$this->load->view('feedback');
		$this->load->view('footer');
	}
	
	public function results_view() {
		$this->load->view('header');
		$this->load->view('results');
		$this->load->view('footer');
	}
	
	public function register_view() {
		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}
}
