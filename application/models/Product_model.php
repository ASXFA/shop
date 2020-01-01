<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
	public function get_all(){
		return $this->db->get('product')->result();
	}

	public function get_all_image(){
		return $this->db->get('product_image')->result();
	}

	public function buat_kode(){
		  $this->db->select('RIGHT(product.product_id,4) as kode', FALSE);
		  $this->db->order_by('product_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('product');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "CLT".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function insert_product($data)
	{
		$this->db->insert('product',$data);
	}

	public function edit_product($where, $product)
	{
		$this->db->where($where);
		$this->db->update('product',$product);
	}

	public function delete_product($where)
	{
		$this->db->where($where);
		$this->db->delete('product');
	}

	public function get_by_category($where)
	{
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from('product');
		$this->db->join('product_image','product_image.product_image_id_product=product.product_id AND product_image_status ="primary"');
		$query = $this->db->get();
		return $query->result();
	}

}
