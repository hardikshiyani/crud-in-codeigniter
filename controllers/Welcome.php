<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('insertmodel');
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
	}
	public function index()
	{
		//$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		


		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[demo.email]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[10]|max_length[13]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', "<div style='color:red;'>" . validation_errors());
			//$this->load->model('insertmodel'); 
			$this->load->view('create');
		} else {

			$this->load->view('create');
			//$this->load->view('display');
			if ($this->input->post('submit')) {
				$config = array(
					'file_name' => $_FILES['image']['name'],
					'upload_path' => './asset/uploads',
					'allowed_types' => 'gif|jpg|png',
				);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image')) {
					$imagedata = $this->upload->data();
					//    echo "<pre>";
					//    print_r($imagedata);
					//    exit;
					$filename = $imagedata['file_name'];
				} else {
					// echo $this->upload->display_error();
					echo "<pre>";
					print_r($this->upload->display_error());
					exit;
					echo "error";
					exit;
				}

				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$number = $this->input->post('mobile');
				$image = $filename;
				$this->insertmodel->insert($name, $email, $number, $image);

				//echo "Success";
			}
		}
		$result['data'] = $this->insertmodel->fetch();
		$this->load->view('display', $result);
	}
	function display()
	{

		$result['data'] = $this->insertmodel->fetch();
		$this->load->view('display', $result);
	}

	public function delete($id)
	{
		//$id=$this->input->get('id');
		$this->insertmodel->deleterecord($id);

		//print_r($id);exit;
		redirect('Welcome');
	}


	public function Edit($id)
	{
		$e['data'] = $this->insertmodel->edit($id);
		$this->load->view('edit', $e);
		// print_r($e);
		// exit;

		if ($this->input->post('update')) {

			$config = array(
				'file_name' => $_FILES['image']['name'],
				'upload_path' => './asset/uploads',
				'allowed_types' => 'gif|jpg|png',
			);
			$this->load->library('upload');
			$this->upload->initialize($config);
			
			
			$this->upload->do_upload('image'); 
				$imagedata = $this->upload->data();
				//    echo "<pre>";
				//    print_r($imagedata);
				//    exit;
				$filename = $imagedata['file_name'];
				
			
			//$id = $this->input->post('id');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$number = $this->input->post('mobile');
			$image = $filename;

			

 			
			$this->insertmodel->update($name, $email, $number,  $id,$image);
			redirect('Welcome');
		}
	}
}
