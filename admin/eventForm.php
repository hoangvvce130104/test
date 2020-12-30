<?php include './inc/header.php'; ?>
<?php include './inc/leftsidemenu.php'; ?>
<?php include '../models/EventModel.php'; ?>
<?php include '../models/category.php'; ?>
<?php
$event = new EventModel();
$event_id = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_GET['event_id'])) {
    $insertClb = $event->insert_event($_POST);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['event_id'])){
    $insertClb = $event->edit_event($_POST);
}
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    var_dump($event_id);
}
?>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-10">
                    <div class="page-title-box">
                        <h4 class="page-title">Thêm sự kiện</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card-box">
                        <?php
                        if (isset($insertClb)) {
                            echo $insertClb;
                        }
                        if ($event_id != null) {
                            $eventList = $event->show_event_byId($event_id);
                            if ($eventList != null) {
                        ?>
                                <form id="basic-form" action="eventForm.php?event_id=<?php echo $event_id?>" method="POST" enctype="multipart/form-data">
                                    <div>
                                        <h3></h3>
                                        <section>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="nameEvent">Tên sự kiện</label>
                                                <div class="col-lg-10">
                                                <input class="form-control" name="event_id" type="text" value="<?php echo $event_id?>" hidden/>
                                                    <input class="form-control" name="nameEvent" type="text" placeholder="Tên sự kiện..." required value="<?php echo $eventList[0][0]?>"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="content">Nội dung</label>
                                                <div class="col-lg-10">
                                                    <textarea class="form-control" name="content" rows="4" cols="50" placeholder="Nội dung sự kiện"><?php echo $eventList[0][1]?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="startDay">Ngày bắt đầu</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="startDay" type="datetime-local" value="<?php echo date('Y-m-d\TH:i', strtotime( $eventList[0][2]));?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="endDay">Ngày kết thúc</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="endDay" type="datetime-local" value="<?php echo date('Y-m-d\TH:i', strtotime( $eventList[0][3]))?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="place">Địa điểm</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="place" type="text" placeholder="Địa điểm" value="<?php echo $eventList[0][4]?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="request">Yêu Cầu</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="request" type="text" placeholder="Yêu Cầu" value="<?php echo $eventList[0][5]?>" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="image">Ảnh</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control required" name="image" data-height="300" type="file" src="../uploads/<?php echo $eventList[0][6]?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-8 offset-sm-9">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Thêm
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect ml-1">
                                                        <a href="event.php" style="color:white">Trở về</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                </form>
                            <?php
                            }
                        } else {
                            ?>
                            <form id="basic-form" action="eventForm.php" method="POST" enctype="multipart/form-data">
                                <div>
                                    <h3></h3>
                                    <section>
                                        <div class="form-group row">
                                            <label class="col-lg-2 control-label " for="nameEvent">Tên sự kiện</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" name="nameEvent" type="text" placeholder="Tên sự kiện..." required />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 control-label " for="content">Nội dung</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" name="content" rows="4" cols="50" placeholder="Nội dung sự kiện"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 control-label " for="startDay">Ngày bắt đầu</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" name="startDay" type="datetime-local" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 control-label " for="endDay">Ngày kết thúc</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" name="endDay" type="datetime-local" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 control-label " for="place">Địa điểm</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" name="place" type="text" placeholder="Địa điểm" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 control-label " for="request">Yêu Cầu</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" name="request" type="text" placeholder="Yêu Cầu" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 control-label " for="image">Ảnh</label>
                                            <div class="col-lg-10">
                                                <input class="form-control required" name="image" data-height="300" type="file" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-8 offset-sm-9">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Thêm
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect ml-1">
                                                    <a href="event.php" style="color:white">Trở về</a>
                                                </button>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </form>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

            <!-- End row -->
        </div>
        <!-- End start page title -->
    </div>
    <!-- End content -->
</div>
<!-- End content-page -->
<?php include './inc/footer.php'; ?>