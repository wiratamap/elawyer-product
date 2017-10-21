<?php
class Userroles_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  public function get_all_user_roles() {
    $this->db->select("*");
    $this->db->from("ms_user_roles");
    $this->db->order_by("VALUE", "ASC");
    $query = $this->db->get();
    return $query->result();
  }
}
?>
