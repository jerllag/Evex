<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evex extends CI_Controller {
	public function index() {
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
	
	public function sign_up_view() {
		$this->load->view('header');
		$this->load->view('signup');
		$this->load->view('footer');
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
		$this->load->view('event', $data);
		$this->load->view('footer');
	}
	
	public function log_in() {
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		$this->db->select('username, fname, lname, birthday, contact_num, email_address, org_name, org_address');
		$this->db->from('organizer');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		$this->session->set_userdata('userdata', $result[0]);
		
		echo count($_SESSON['userdata']);
	}
	
	public function sign_up() {
		$username = $this->input->post("username");
		$fname = $this->input->post("fname");
		$lname = $this->input->post("lname");
		$birthday = $this->input->post("birthday");
		$contactNo = $this->input->post("contactNo");
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
	
	public function create_event_view() {
		$this->load->view('header');
		$this->load->view('createEvent');
		$this->load->view('footer');
	}
	
	public function create_event() {
		$date = $this->input->post("date");
		$venue = $this->input->post("venue");
		$start_time = $this->input->post("start_time");
		$end_time = $this->input->post("end_time");
		$description = $this->input->post("description");
		
		$data = array(
			'username' => $_SESSION['userdata'][0],
			'date' => $date, 
			'venue' => $venue, 
			'start_time' => $start_time, 
			'end_time' => $end_time, 
			'description' => $description
			);
		
		$query = $this->db->insert('event', $data);
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
	
	public function log_out() {
		$this->session->sess_destroy();
		redirect("/evex");
	}
}
