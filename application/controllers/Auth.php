<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// echo '<pre>' . var_export($this->general_settings, true) . '</pre>';

		$this->load->view('layout-templates/login/header');
		$this->load->view('login');
		$this->load->view('layout-templates/login/footer');
	}

	public function authentication() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'USERNAME' => $username,
			'PASSWORD' => md5($password)
		);

		$result = $this->auth_model->login_validate('ms_user', $where)->num_rows();

		if($result>0) {
			if($this->auth_model->get_is_deleted('ISDELETED', 'ms_user', $username) == "0") {
				if($this->auth_model->get_is_logged_in('ISLOGGEDIN', 'ms_user', $username) == "0") {
					$this->auth_model->is_logged_in_update($username, "1");
					$data_session = array(
						'USERNAME' => $username,
						'FULLNAME' => $this->auth_model->get_one('FULLNAME', 'ms_user', $username),
						'ROLESVALUE' => $this->auth_model->get_one('ROLESVALUE', 'ms_user', $username),
						'UUIDMSUSER' => $this->auth_model->get_one('UUIDMSUSER', 'ms_user', $username),
						'CREATEDDATE' => $this->auth_model->get_one('CREATEDDATE', 'ms_user', $username),
						'ISLOGGEDIN' => $this->auth_model->get_one('ISLOGGEDIN', 'ms_user', $username)
					);

					$this->session->set_userdata($data_session);

					if ($this->session->userdata('ROLESVALUE') == super_administrator) {
						redirect('superadmin/home');
					} elseif ($this->session->userdata('ROLESVALUE') == elawyer_administrator) {
						redirect('');
					} elseif ($this->session->userdata('ROLESVALUE') == consultant) {
						redirect('');
					} elseif ($this->session->userdata('ROLESVALUE') == lawyer) {
						redirect('');
					} elseif ($this->session->userdata('ROLESVALUE') == client) {
						redirect('');
					} elseif ($this->session->userdata('ROLESVALUE') == finance) {
						redirect('');
					} else {
						$this->session->set_flashdata('msg','<div class="alert bg-red text-center">Invalid Subsystem, Please contact your Administrator or Web Master!</div>');
		        redirect('');
						// var_dump($this->session->userdata('full_name'));
					}
				} else {
					$this->session->set_flashdata('msg','<div class="alert bg-red text-center">Your account has been logged in on another device, please log out first</div>');
					redirect('');
				}
			} else {
				$this->session->set_flashdata('msg','<div class="alert bg-red text-center">Your account is expired, please contact your Administrator or Web Master!</div>');
				redirect('');
			}
		 } else {
			 $this->session->set_flashdata('msg','<div class="alert bg-red text-center">Wrong username or password!</div>');
			 redirect('');
		 }
	}

	public function registration() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[5]|max_length[25]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'min_length[6]|max_length[15]|required');
    $this->form_validation->set_rules('passconf', 'Retype password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout-templates/registration/header');
			$this->load->view('registration');
			$this->load->view('layout-templates/registration/footer');
		} else {
			$data = array(
	      'FULLNAME' => $this->input->post('full_name'),
	      'USERNAME' => $this->input->post('username'),
	      'EMAIL' => $this->input->post('email'),
	      'PASSWORD' => md5($this->input->post('password')),
		  );

			$username_check = $this->user_model->is_exist('USERNAME', 'ms_user', $data['USERNAME']);
			$email_check = $this->user_model->is_exist('EMAIL', 'ms_user', $data['EMAIL']);

			if( $username_check == NULL && $email_check == NULL) {
				if ($this->user_model->insert_user($data)) {
					$this->session->set_flashdata('msg','<div class="alert bg-green text-center">You are Successfully Registered! Please contact your Administrator to verify your account</div>');
	        redirect('auth/registration');
				} else {
					$this->session->set_flashdata('msg','<div class="alert bg-red text-center">Oops! There is something wrong</div>');
	        redirect('auth/registration');
				}
			} else {
				$this->session->set_flashdata('msg','<div class="alert bg-red text-center">username or email already used! please use another username or email!</div>');
				redirect('auth/registration');
			}
		}
	}
	//
	public function logout() {
		$username = $this->session->userdata('USERNAME');
		$this->auth_model->is_logged_in_update($username, "0");

		$this->session->sess_destroy();
		// session_destroy();
		redirect('auth');
	}
}
