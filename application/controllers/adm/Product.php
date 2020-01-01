<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
        $this->load->model('product_model');
        $this->load->model('category_model');
    }

	public function clothing()
	{
		$data['product'] = $this->product_model->get_all();
		$data['code'] = $this->product_model->buat_kode();
		$data['category'] = $this->category_model->get_all();
		$data['product_image'] = $this->product_model->get_all_image();
		$this->load->view('admin/clothing',$data);
	}

	public function add_product()
	{
		$config['upload_path'] = './assets/img/cloth';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite'] = true;
        $config['max_size'] = 10240;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;        
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('product_image_1')) {
        	$data = array('upload_data' => $this->upload->data());
            $img = $data['upload_data']['file_name'];
            $product = array(
				'product_id' =>$this->input->post('product_id') ,
				'product_name'=>$this->input->post('product_name'),
				'product_category'=>$this->input->post('product_category'),
				'product_price'=>$this->input->post('product_price')
			);
			$image = array('product_image_id_product' => $this->input->post('product_id') , 'product_image_name' => $img, 'product_image_status' => 'primary' );
			$this->product_model->insert_product($product,$image);
            if ($this->upload->do_upload('product_image_2')) {
            	$data2 = array('upload_data' => $this->upload->data());
            	$img2 = $data2['upload_data']['file_name'];
				$image = array('product_image_id_product' => $this->input->post('product_id') , 'product_image_name' => $img2, 'product_image_status' => 'secondary' );
				$this->product_model->insert_product_image($image);
            	if ($this->upload->do_upload('product_image_3')) {
            		$data3 = array('upload_data' => $this->upload->data());
            		$img3 = $data3['upload_data']['file_name'];
            		$image = array('product_image_id_product' => $this->input->post('product_id') , 'product_image_name' => $img3, 'product_image_status' => 'secondary' );
					$this->product_model->insert_product_image($image);
            		if ($this->upload->do_upload('product_image_4')) {
            			$data3 = array('upload_data' => $this->upload->data());
            			$img4 = $data4['upload_data']['file_name'];
            			$image = array('product_image_id_product' => $this->input->post('product_id') , 'product_image_name' => $img4, 'product_image_status' => 'secondary' );
						$this->product_model->insert_product_image($image);
            			if ($this->upload->do_upload('product_image_5')) {
            				$data5 = array('upload_data' => $this->upload->data());
            				$img5 = $data5['upload_data']['file_name'];
            				$image = array('product_image_id_product' => $this->input->post('product_id') , 'product_image_name' => $img5, 'product_image_status' => 'secondary' );
							$this->product_model->insert_product_image($image);
            			}
            		}
            	}
            }
			$this->session->set_flashdata("info_upload","berhasil");
			redirect('adm/product/clothing');
        }else{
        	$this->session->set_flashdata("info_upload","gagal");
        	redirect('adm/product/clothing');
        }
	}

	public function edit_product()
	{
		$config['upload_path'] = './assets/img/cloth';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite'] = true;
        $config['max_size'] = 5120;
        $config['max_width'] = 1920;
        $config['max_height'] = 1080;        
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('product_image_new')) {
        	$product = array(
				'product_name'=>$this->input->post('product_name'),
				'product_category'=>$this->input->post('product_category'),
				'product_price'=>$this->input->post('product_price'),
				'product_image'=>$this->input->post('product_image')
			);
			$where = array('product_id' =>$this->input->post('product_id'));
			$this->product_model->edit_product($where,$product);
        	$this->session->set_flashdata("info_edit","gagal");
        	redirect('adm/product/clothing');
        }else{
        	$data = array('upload_data' => $this->upload->data());
            $img = $data['upload_data']['file_name'];
            $product = array(
				'product_name'=>$this->input->post('product_name'),
				'product_category'=>$this->input->post('product_category'),
				'product_price'=>$this->input->post('product_price'),
				'product_image'=>$img
			);
			$where = array('product_id' =>$this->input->post('product_id'));
			$this->product_model->edit_product($where,$product);
			$this->session->set_flashdata("info_edit","berhasil");
			redirect('adm/product/clothing');
        }
	}

	public function delete_product($id)
	{
	   $where = array('product_id' =>$id);
	   $this->product_model->delete_product($where);
       redirect('adm/product/clothing');
	}

}
