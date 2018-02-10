<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}

	public function admin_register()
	{
		$data['title'] = 'Register';
		$this->form_validation->set_rules('first_name', 'First name', 'required');
		$this->form_validation->set_rules('last_name', 'Last name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
            //form empty or validation failed
			$this->load->view('template/header', $data);
			$this->load->view('admin/register');
			$this->load->view('template/footer');
        } else {
			$this->load->model('users_model');
			$user_id = $this->users_model->create();
			//log them in
			$this->session->user_id = $user_id;
			redirect('/admin/dashboard');
		}
	}

	public function admin_login()
	{
		$data['title'] = 'Login';
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
            //form empty or validation failed
			$this->load->view('template/header', $data);
			$this->load->view('admin/login');
			$this->load->view('template/footer');
        } else {
			$this->load->model('users_model');
			$user_id = $this->users_model->check();
			if ($user_id) {
				//log them in
				$this->session->user_id = $user_id;
				redirect('/admin/dashboard');
			} else {
				$this->session->set_flashdata('warning', 'Email or password are incorrect!');
	            redirect('/admin/login');
			}
		}
	}

	public function admin_logout()
	{
		unset($_SESSION['user_id']);
		$this->session->set_flashdata('warning', 'You have been logged out');
		redirect('/');
	}
}
