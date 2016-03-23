<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('FilterModel');
	}
	
	/**
     * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://localhost:8080/mvcTest
	 *	- or -
	 * 		http://localhost:8080/index.php/mvcTest
	*/
	public function index()
	{	
		//Get Clients From 'clients' table	
		$clients=$this->FilterModel->getClients();
		$data['clients']=$clients;
		
		$data['js']=array('js/filterInvoice.js');
			
		$data['page_title']="Filter | mvcTest";
		$this->load->view('header',$data);
		$this->load->view('invoice/filterInvoice');
		$this->load->view('footer');
	}
	
	//Function to get products from client	
	/**
	* Execute when clients dropdown change 
	* Get Products From Client ID
	*/
	function clientProducts()
	{
		$clientID=$this->input->post('clientID');
		//Get Client Products From 'products' table
		$clientProducts=$this->FilterModel->getClientProducts($clientID);		
		echo json_encode($clientProducts);
	}
	
	//Function to filter invoices	
	/**
	* Execute when formFilterInvoice submitted
	* Post submitted data and pass it to filterModel
	*/
	function filterInvoice()
	{
		$relativeDate=$this->input->post('relativeDate');
		$clientID=$this->input->post('client');	
		$productID=$this->input->post('product');
		
		switch($relativeDate)
		{
			case 'lastMonthToDate':
				$startDate = date('Y-m-d',strtotime('first day of last month'));
 				$endDate   = date('Y-m-d',strtotime("now"));
				break;
			case 'thisMonth':
				$startDate = date('Y-m-d',strtotime('first day of this month'));
 				$endDate   = date('Y-m-d',strtotime("now"));
				break;
			case 'thisYear':
			    $startDate = date('Y-m-d',strtotime('first day of January '.date('Y') ));
 				$endDate   = date('Y-m-d',strtotime("now"));
				break;
			case 'lastYear':
				$startDate = date('Y-m-d',strtotime('first day of January '.date('Y',strtotime("-1 year")) ));
 				$endDate   = date('Y-m-d',strtotime('last day of December '.date('Y',strtotime("-1 year")) ));
				break;	
			default:
				$startDate='';
				$endDate='';			
		}
		
		//Get Filtered Invoices & pass it to '_filteredRows' View
		$invoices=$this->FilterModel->getInvoices($clientID,$productID,$startDate,$endDate);
		$data['invoices']=$invoices;
		$this->load->view('invoice/_filteredRows',$data);
	}
}
