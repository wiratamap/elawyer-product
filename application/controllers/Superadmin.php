<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if(empty($this->session->userdata('ISLOGGEDIN')) && $this->session->userdata('ROLESVALUE') != super_administrator) {
			$this->session->set_flashdata('msg','<div class="alert bg-red text-center">You dont have an access to view this page!</div>');
			redirect('');
		} else {
			$this->load->view('layout-templates/superadmin/header');
			$this->load->view('layout-templates/superadmin/navbar');
			$this->load->view('layout-templates/superadmin/footer');
		}
	}

	public function index() {

	}

	public function home() {
		$this->load->view('superadmin/home');
	}

	public function list_user() {
		$data['user'] = $this->user_model->get_all_user();

		$this->load->view('superadmin/list_user', array('data_user' => $data['user']));
	}
  //
	// public function add_user() {
	// 	$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');
	// 	$this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[5]|max_length[30]');
  //   $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
  //   $this->form_validation->set_rules('password', 'Password', 'min_length[5]|max_length[15]|required');
  //   $this->form_validation->set_rules('passconf', 'Retype password', 'required|matches[password]');
  //
	// 	if ($this->form_validation->run() == FALSE) {
	// 		 $this->load->view('admin/add_user');
	// 	} else {
	// 		$data = array(
	//       'full_name' => $this->input->post('full_name'),
	//       'username' => $this->input->post('username'),
	//       'email' => $this->input->post('email'),
	//       'password' => md5($this->input->post('password')),
	// 	  );
  //
	// 		$username_check = $this->user_model->is_exist('username', 'ms_user', $data['username']);
	// 		$email_check = $this->user_model->is_exist('email', 'ms_user', $data['email']);
  //
	// 		if( $username_check == NULL && $email_check == NULL) {
	// 			if ($this->user_model->insert_expert($data)) {
	// 				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Expert successfully registered!</div>');
	//         redirect('admin/add-user');
	// 			} else {
	// 				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! There is something wrong</div>');
	//         redirect('admin/add-user');
	// 			}
	// 		} else {
	// 			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">username or email already used! please use another username or email!</div>');
	// 			redirect('admin/add-user');
	// 		}
	// 	}
	// }

	public function delete_user($UUIDMSUSER) {
		$user_info['UPDATEDBY'] = $this->session->userdata('USERNAME');
		$this->user_model->delete($UUIDMSUSER, $user_info);
		$this->session->set_flashdata('msg','<div class="alert bg-green text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>User successfully suspended!</div>');

		redirect('superadmin/list-user');
	}

	public function edit_user($UUIDMSUSER) {
		$data['user'] = $this->user_model->get_one('*', 'ms_user', $UUIDMSUSER);
		$userroles['data'] = $this->userroles_model->get_all_user_roles();
		$this->load->view('superadmin/edit_user', array('user' => $data['user'],
																										'userroles' => $userroles['data']));
	}

	public function update_user($UUIDMSUSER) {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[5]|max_length[25]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('isdeleted', 'Active Status', 'less_than_equal_to[1]');

		if ($this->form_validation->run() == FALSE) {
			 $this->load->view('superadmin/edit-user', $UUIDMSUSER);
		} else {
			$data = array(
	      'FULLNAME' => $this->input->post('username'),
	      'USERNAME' => $this->input->post('fullname'),
	      'EMAIL' => $this->input->post('email'),
				'ISDELETED' => $this->input->post('isdeleted'),
				'UPDATEDBY' => $this->session->userdata('USERNAME')
		  );
			if ($this->user_model->update($data, $UUIDMSUSER)) {
				$this->session->set_flashdata('msg','<div class="alert bg-green text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>User successfully updated!</div>');
        redirect('superadmin/edit-user/'.$UUIDMSUSER);
			} else {
				$this->session->set_flashdata('msg','<div class="alert bg-red text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! There is something wrong</div>');
        redirect('superadmin/edit-user/'.$UUIDMSUSER);
			}
		}
	}

	// public function list_inbox() {
	// 	$data['inbox'] = $this->mail_model->get_all_inbox($this->session->userdata('uuid_ms_user'));
  //
	// 	$this->load->view('admin/list_inbox', array('inbox' => $data['inbox']));
	// }
  //
	// public function list_trash() {
	// 	$data['list_trash'] = $this->mail_model->get_all_trash($this->session->userdata('uuid_ms_user'));
  //
	// 	$this->load->view('admin/list_trash', array('list_trash' => $data['list_trash']));
	// }
  //
	// public function list_sent_mail() {
	// 	$data['sent_mail'] = $this->mail_model->get_all_sent_mail($this->session->userdata('uuid_ms_user'));
  //
	// 	$this->load->view('admin/list_sent_mail', array('sent_mail' => $data['sent_mail']));
	// }

	// public function compose_mail() {
	// 	$this->form_validation->set_rules('subject', 'Subject', 'required|max_length[50]');
  //
	// 	if ($this->form_validation->run() == FALSE) {
	// 		$data['all_user'] = $this->user_model->get_all_user();
	// 		$this->load->view('admin/compose_mail', array('all_user' => $data['all_user']));
	// 	} else {
	// 		$data = array(
	//       'uuid_ms_user_sender' => $this->session->userdata('uuid_ms_user'),
	// 			'uuid_ms_user_receiver' => $this->input->post('receiver'),
	//       'subject' => $this->input->post('subject'),
	//       'body' => $this->input->post('body'),
	// 	  );
  //
	// 		if ($this->mail_model->send_mail($data)) {
	// 			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent! Please check your sentbox</div>');
	// 			redirect('admin/compose-mail');
	// 		} else {
	// 			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! There is something wrong</div>');
	// 			redirect('admin/compose-mail');
	// 		}
	// 	}
	// }
  //
	// public function send_to_trash($uuid_ms_mail) {
	// 	$this->mail_model->send_to_trash($uuid_ms_mail);
	// 	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Mail has been sent to trash!</div>');
	// 	redirect('admin/list-inbox');
	// }
  //
	// public function remove_mail($uuid_ms_mail) {
	// 	$this->mail_model->remove_mail($uuid_ms_mail);
	// 	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Mail has been permanently deleted!</div>');
	// 	redirect('admin/list-trash');
	// }
  //
	// public function read_mail($uuid_ms_mail) {
	// 	$data = $this->mail_model->get_one_mail($uuid_ms_mail);
	// 	$this->load->view('admin/read_mail', $data);
	// }

	// public function send_to_draft() {
	//
	// }

	//buggy feature. still on development
	// public function list_draft() {
	//
	// }


}
