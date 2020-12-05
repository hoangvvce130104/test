<?php
include 'inc/header.php';
include 'inc/leftsidemenu.php';
include '../lib/database.php';
include '../helper/format.php';
?>

<?php
  $db = new Database;
  $array = $db->select("SELECT * FROM `student` WHERE `status` = 0");
  $db->changeStatusStudent(8,1);
?>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Zircos</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Danh sách sinh viên</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Danh sách sinh viên</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="demo-box">
                                <div class="table-responsive">
                                    <table class="table table-success col-sm-12 col-md-12">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Mã SV</th>
                                        <th scope="col">SDT</th>
                                        <th scope="col">Gmail</th>
                                        <th scope="col">Tuổi</th>
                                        <th scope="col">CLB</th>
                                        <th scope="col">Lý do</th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    for ($i=0; $i < sizeof($array); $i++) { 
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $i?></th>
                                        <td><?php echo $array[$i][1]?></td>
                                        <th><?php echo $array[$i][3]?></th>
                                        <td><?php echo $array[$i][2]?></td>
                                        <td><?php echo $array[$i][4]?></td>
                                        <td><?php echo $array[$i][5]?></td>
                                        <td><?php echo $array[$i][6]?></td>
                                        <td><?php echo $array[$i][7]?></td>
                                    <?php
                                        $name = $db->getNameCLB($array[$i][6]);
                                    ?>
                                    <td><?php echo $name[0]?></td>
                                    <td><?php echo $array[$i][9]?></td>
                                    <td>
                                        <a id="accept" href="changeStatusStudent.php?id=<?php echo $array[$i][0] ?>&status=1" style="color:green">
                                            <i class="fas fa-check-square"></i>
                                        </a> | 
                                        <a href="changeStatusStudent.php?id=<?php echo $array[$i][0] ?>&status=-1" style="color:red">
                                            <i class="far fa-thumbs-down"></i>
                                        </a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>