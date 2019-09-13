<?php
class Design extends CI_controller {

   public function __construct()
   {
      parent :: __construct();
   }
   
   public function get_costomised_products()
   {
       $new_array = array();
       //$id = $this->db->where("user_id",$this->session->userdata['userdata']['user_id'])->get("users")->row_array()['product'];
       $products = $this->db->where(array("status"=>1))->get("customised_products")->result_array();
       foreach($products as $key=>$value)
       {
           $producut["id"]   = $value['product_id'];
           $producut["name"] = $value['product_name_en'];
           $producut["category"] = "Product Name";
           $producut["currency"] = "USD";
           $producut["image"] = base_url().$value['image'];
           $producut["sub_images"] = array(base_url().$value['image'],base_url().$value['image']);
           $producut["description"] = "Dummy Description";
           $new_array[] = $producut;
       }
       $array = array("status"=>true,"products"=>$new_array);
       echo json_encode($array);
   }
   
   public function get_canvas_image()
   {
       $data['data'] = $this->input->post("data");
       if($data['data'])
       {
         $this->session->set_userdata("image_design",$data['data']);
       }
       $this->db->insert("dummy",$data);
   }
  
}
