<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->library("pagination");
		
		
		$config = array();  
        $config["base_url"] = base_url().'/blogs';
        $config["total_rows"] = count($this->crud->get_data('blogs'));
		$config["per_page"] = 3; // per page how many data you want to show
        $config["uri_segment"] = 2; // your url segment
		 
		$this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		
        $data["links"] = $this->pagination->create_links();  // this code create links of pagination like 1 2 3 ... last etc.
		
		$data['LISTDATA']= $this->crud->selectdatainlimit($config["per_page"], $page,'blogs'); // this code fetch data in limit like in first time 3 data second time 4 to 6 data 
		
		$this->load->view('listing',$data);
	}
	
	
}
