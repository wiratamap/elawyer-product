<?php
class User_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  public function insert_user($data) {
    $this->db->set('UUIDMSUSER', 'UUID()', FALSE);
    $this->db->set('ROLESVALUE', client);
    return $this->db->insert('ms_user', $data);
  }

  // public function insert_expert($data) {
  //   $this->db->set('uuid_ms_user', 'UUID()', FALSE);
  //   $this->db->set('dtm_crt', 'CURRENT_TIME()', FALSE);
  //   $this->db->set('is_active', '1', FALSE);
  //   $this->db->set('uuid_ms_subsystem', GLOBAL_PARAM_UUID_SUBSYSTEM_EXPERT);
  //   return $this->db->insert('ms_user', $data);
  // }
  //
  public function is_exist($select, $table, $where) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where($select, $where);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_all_user() {
    $this->db->select("*");
    $this->db->from("vw_list_users");
    $query = $this->db->get();
    return $query->result();
  }

  public function delete($UUIDMSUSER, $user_info) {
      $this->db->set('UPDATEDDATE', 'CURRENT_TIME()', FALSE);
      $this->db->set('ISDELETED', '1', FALSE);
      $this->db->where('UUIDMSUSER', $UUIDMSUSER);
      $this->db->update('ms_user', $user_info);
      return true;
  }

  public function get_one($select, $table, $param) {
    $this->db->select($select);
    $this->db->from($table);
    $this->db->where('UUIDMSUSER', $param);
    $query = $this->db->get();
    $result = $query->row();
    return $result;
  }

  public function update($data, $UUIDMSUSER) {
    $this->db->set('UPDATEDDATE', 'CURRENT_TIME()', FALSE);
    $this->db->where('UUIDMSUSER', $UUIDMSUSER);
    $this->db->update('ms_user', $data);
    return true;
  }
}
?>
