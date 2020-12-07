<?php
    include_once '../lib/database.php';
    include_once '../helper/format.php';

    class club
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_club($data, $files)
        {
            $clbName   = mysqli_real_escape_string($this->db->link, $data['clbName']);
            $quantity  = mysqli_real_escape_string($this->db->link, $data['quantity']);
            $content  = mysqli_real_escape_string($this->db->link, $data['content']);
            $category  = mysqli_real_escape_string($this->db->link, $data['category']);
            //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited = array('jpg', 'jpeg', 'png' , 'gif');
            $file_name = $_FILES['image'] ['name'];
            $file_size = $_FILES['image'] ['size'];
            $file_temp = $_FILES['image'] ['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($clbName == "" || $quantity == "" || $content == "" || $file_name == "" || $category == "") {
                $alert = '<div class="alert alert-warning">
                <span><b> Các trường không được trống </b></span></div>';
                return $alert;
            }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_caulacbo(clbName, quantity, content, img, catId) VALUES('$clbName', '$quantity', '$content', '$unique_image', '$category')";
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
            $query  = "SELECT tbl_caulacbo.*, tbl_category.catName 
                       FROM tbl_caulacbo
                       INNER JOIN tbl_category ON tbl_caulacbo.catId = tbl_category.catId";
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
