<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->model('categories_model');
		$this->load->model('posts_model');
		$this->load->helper('text');
		$data['title'] = 'My Blog';
		$data['categories'] = $this->categories_model->getAll();
		$data['posts'] = $this->posts_model->getAll();
		$this->load->view('template/header', $data);
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}

	public function details($slug)
	{
		$this->load->model('posts_model');
		$this->load->model('categories_model');
		$data['post'] = $this->posts_model->getBySlug($slug);
		//print_r($data['post']);
		$data['title'] = $data['post']->title;
		$data['categories'] = $this->categories_model->getByPost($data['post']->id);
		$this->load->view('template/header', $data);
		$this->load->view('post', $data);
		$this->load->view('template/footer');
	}

	public function category($id)
	{
		$this->load->model('posts_model');
		$this->load->model('categories_model');
		$this->load->helper('text');
		$data['posts'] = $this->posts_model->getByCategoryId($id);
		$data['category'] = $this->categories_model->getById($id);
		$data['title'] = 'Category: ' . $data['category']->name;
		$this->load->view('template/header', $data);
		$this->load->view('posts_by_category', $data);
		$this->load->view('template/footer');
	}

	public function admin_dashboard()
	{
		$this->check_session();
		$this->load->model('categories_model');
		$this->load->model('posts_model');
		$data['title'] = 'dashboard';

		$data['categories'] = $this->categories_model->getAll();
		$data['posts'] = $this->posts_model->getAll();

		$this->load->view('template/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer');
	}

	public function admin_add_category()
	{
		$this->check_session();
		$data['title'] = 'Add Category';

		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/add_category');
			$this->load->view('template/footer');
        } else {
			$this->load->model('categories_model');
			$category_id = $this->categories_model->create();
			redirect('/admin/dashboard');
		}

	}

	public function admin_add_post()
	{
		$this->check_session();
		$data['title'] = 'Add Post';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[posts.slug]');
		$this->form_validation->set_rules('content', 'Content', 'required');
		$this->form_validation->set_rules('category[]', 'Category', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->model('categories_model');
			$data['categories'] = $this->categories_model->getAll();
			$this->load->view('template/header', $data);
			$this->load->view('admin/add_post', $data);
			$this->load->view('template/footer');
        } else {
			$this->load->model('posts_model');
			$post_id = $this->posts_model->create();
			redirect('/admin/dashboard');
		}

	}

	public function admin_edit_post($id)
	{
		$this->check_session();
		$data['title'] = 'Edit Post';

		$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[posts.slug]');
		$this->form_validation->set_rules('content', 'Content', 'required');
		$this->form_validation->set_rules('category[]', 'Category', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->model('categories_model');
			$this->load->model('posts_model');
			$data['post'] = $this->posts_model->getById($id);
			$data['categories'] = $this->categories_model->getCategoriesByPostId($id);
			//$data['categories'] = $this->categories_model->getAll();
			$this->load->view('template/header', $data);
			$this->load->view('admin/edit_post', $data);
			$this->load->view('template/footer');
        } else {
			$this->load->model('posts_model');
			$post_id = $this->posts_model->edit($id);
			redirect('/admin/dashboard');
		}

	}

	protected function check_session()
	{
		if (!$this->session->user_id) {
			$this->session->set_flashdata('warning', 'You must be logged in to access an admin page!');
            redirect('/');
		}
	}
}
