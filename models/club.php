<?php
    include '../lib/database.php';
    include '../helper/format.php';

    class club
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_club($clbName, $img, $quantity)
        {
            $clbName   = $this->fm->validation($clbName);
            $img       = $this->fm->validation($img);
            $quantity  = $this->fm->validation($quantity);

            $clbName   = mysqli_real_escape_string($this->db->link, $clbName);
            $img       = mysqli_real_escape_string($this->db->link, $img);
            $quantity  = mysqli_real_escape_string($this->db->link, $quantity);
    
            if(empty($clbName)) {
                $alert = '<div class="alert alert-warning">
                <span><b> Danh mục không được trống </b></span></div>';
                return $alert;
            }else{
                $query = "INSERT INTO tbl_caulacbo(clbName, img, quantity) VALUES('$clbName', '$img', '$quantity')";
                $result = $this->db->insertdata($query);
                if($result){
                    $alert = '<div class="alert alert-success">
                    <span><b> Thêm thành công </b></span></div>';
                    return $alert;
                }else{
                    $alert = '<div class="alert alert-danger">
                    <span><b> Thêm thất bại </b></span></div>';
                    return $alert;
                }
            }
        }

        public function show_club(){
            $query  = "SELECT * FROM tbl_caulacbo ORDER BY clb_id DESC";
            $result = $this->db->selectdata($query);
            return $result;
        }

        public function getCLBById($id){
            $query  = "SELECT * FROM tbl_caulacbo WHERE clb_id = '$id'";
            $result = $this->db->selectdata($query);
            return $result;
        }
        
        public function update_club($clbName, $id, $img, $quantity){
            $clbName  = $this->fm->validation($clbName);
            $quantity = $this->fm->validation($quantity);
            $img      = $this->fm->validation($img);

            $clbName  = mysqli_real_escape_string($this->db->link, $clbName);
            $img      = mysqli_real_escape_string($this->db->link, $img);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id       = mysqli_real_escape_string($this->db->link, $id);

            if(empty($clbName)){
                $alert = '<div class="alert alert-warning">
                <span><b> Danh mục không được trống </b></span></div>';
                return $alert;
            }else{
                $query = "UPDATE tbl_caulacbo SET clbName = '$clbName', img = '$img', quantity = '$quantity' WHERE clb_id = '$id' ";
                $result = $this->db->update($query);
                if($result){
                    $alert = '<div class="alert alert-success">
                    <span><b> Cập nhật thành công </b></span></div>';
                    return $alert;
                }else{
                    $alert = '<div class="alert alert-danger">
                    <span><b> Cập nhật thất bại </b></span></div>';
                    return $alert;
                }
            }
        }

        public function del_club($id){
            $query = "DELETE FROM tbl_caulacbo WHERE clb_id = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = '<div class="alert alert-success">
                <span><b> Xoá thành công </b></span></div>';
                return $alert;
            }else{
                $alert = '<div class="alert alert-danger">
                <span><b> Xoá thất bại </b></span></div>';
                return $alert;
            }
        }
    }
?>
