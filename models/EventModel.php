<?php
include_once '../lib/database.php';
include_once '../helper/format.php';

class EventModel
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    /**
     * show all event
     */
    public function show_event()
    {
        $query = "SELECT `event_id`, `nameEvent`, `content`, `startDay`, `endDay`, `place`, `request`,`img` FROM `tbl_event`";
        $result = $this->db->select($query);
        return $result;
    }
    /**
     * show all event
     */
    public function show_event_byId($id)
    {
        $query = "SELECT `nameEvent`, `content`, `startDay`, `endDay`, `place`, `request`,`img` FROM `tbl_event` WHERE event_id = $id";
        $result = $this->db->select($query);
        return $result;
    }
    /**
     *  event insert
     */
    public function insert_event($array)
    {
        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../uploads/" . $unique_image;
        $conn = $this->db->connectionDB();
        $query = "INSERT INTO `tbl_event`( `nameEvent`, `content`, `startDay`, `endDay`, `place`, `request`,`img`)
    VALUES (:nameEvent,:content,:startDay,:endDay,:place,:request,:img)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nameEvent', $array["nameEvent"]);
        $stmt->bindParam(':content', $array["content"]);
        $stmt->bindParam(':startDay', $array["startDay"]);
        $stmt->bindParam(':endDay', $array["endDay"]);
        $stmt->bindParam(':place', $array["place"]);
        $stmt->bindParam(':request', $array["request"]);
        $stmt->bindParam(':img', $unique_image);
        $stmt->execute();
        if ($stmt) {
            move_uploaded_file($file_temp, $uploaded_image);
            $alert = '<div class="alert alert-success">
            <span><b> Thêm thành công </b></span></div>';
            return $alert;
        } else {
            $alert = '<div class="alert alert-danger">
            <span><b> Thêm thất bại </b></span></div>';
            return $alert;
        }
    }
    /**
     *  event insert
     */
    public function edit_event($array)
    {
        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../uploads/" . $unique_image;

        $conn = $this->db->connectionDB();
        $query = "UPDATE `tbl_event` SET `nameEvent`= :nameEvent,`content`=:content,`startDay`=:startDay,`endDay`=:endDay,`place`=:place,
        `request`=:request, `img`=:img WHERE `event_id`= :event_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nameEvent', $array["nameEvent"]);
        $stmt->bindParam(':content', $array["content"]);
        $stmt->bindParam(':startDay', $array["startDay"]);
        $stmt->bindParam(':endDay', $array["endDay"]);
        $stmt->bindParam(':place', $array["place"]);
        $stmt->bindParam(':request', $array["request"]);
        $stmt->bindParam(':event_id', $array["event_id"]);
        $stmt->bindParam(':img', $unique_image);
        $stmt->execute();
        
        if ($stmt) {
            move_uploaded_file($file_temp, $uploaded_image);
            $alert = '<div class="alert alert-success">
            <span><b> Chỉnh sửa thành công </b></span></div>';
            return $alert;
        } else {
            $alert = '<div class="alert alert-danger">
            <span><b> Chỉnh sửa thất bại </b></span></div>';
            return $alert;
        }
    }
    /**
     * delete event
     */
    public function del_event($id)
    {
        $query = "DELETE FROM `tbl_event` WHERE `event_id` = '$id'";
        $result = $this->db->delete($query);

        if ($result) {
            $alert = '<div class="alert alert-success">
            <span><b> Xoá thành công </b></span></div>';
            return $alert;
        } else {
            $alert = '<div class="alert alert-danger">
            <span><b> Xoá thất bại </b></span></div>';
            return $alert;
        }
    }

}
