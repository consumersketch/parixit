<?php
class FilterModel extends CI_Model
{	
	//Get Cleints From 'clients'
	function getClients()
	{
		$this->db->select('*');
		$this->db->from('clients');
		$query=$this->db->get();
		
		return $query->result();
	}
	
	//Get Products Using client_id From 'products'
	function getClientProducts($clientID)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('client_id',$clientID);
		$query=$this->db->get();
		
		return $query->result();	
	}
	
	//Query to get invoices
	function getInvoices($clientID,$productID,$startDate,$endDate)
	{
		$this->db->select('*');
		$this->db->from('invoices');
		$this->db->join('invoicelineitems','invoicelineitems.invoice_num=invoices.invoice_num');
		$this->db->join('products','products.product_id=invoicelineitems.product_id');
		$this->db->where('invoices.client_id',$clientID);
		$this->db->where('products.product_id',$productID);
		$this->db->where('invoices.invoice_date >=',$startDate);
		$this->db->where('invoices.invoice_date <=',$endDate);
		$query=$this->db->get();
		
		return $query->result();
	}
}
?>