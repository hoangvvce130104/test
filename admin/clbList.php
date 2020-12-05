<?php include './inc/header.php';?>
<?php include './inc/leftsidemenu.php';?>
<?php include '../models/club.php';?>
<?php
	$clb = new club();
	if(isset ($_GET['delId'])){
		$id = $_GET['delId'];
		$delClb = $clb->del_club($id);
    }
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
                                <li class="breadcrumb-item active">Danh sách câu lạc bộ</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Danh sách câu lạc bộ</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                            <div class="col-sm-11">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="demo-box">
                                                <h4 class="header-title"> Danh sách </h4>
                                                <div class="table-responsive">
                                                    <table class="table table-default col-sm-12 ">
                                                        <thead>
                                                        <?php
                                                            if(isset($delClb)){
                                                                echo $delClb;
                                                            }
                                                        ?> 
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Tên câu lạc bộ</th>
                                                                <th>Ảnh</th>
                                                                <th>Số lượng</th>
                                                                <th>Ngày thành lập</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                            $show_club = $clb->show_club();
                                                            if($show_club){
                                                                $i = 0;
                                                                while($result = $show_club->fetch_assoc()){
                                                                    $i++;
                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row"><?php echo $i; ?></th>
                                                                <td><?php echo $result['clbName']?></td>
                                                                <td><?php echo $result['img']?></td>
                                                                <td><?php echo $result['quantity']?></td>
                                                                <td><?php echo $result['create_at']?></td>
                                                                <td>
                                                                <a href="clbEdit.php?clbId=<?php echo $result['clb_id'] ?>">
                                                                    <i class="fas fa-edit"></i>
                                                                </a> |
                                                                <a onclick="return confirm('Bạn có muốn xoá danh mục này không?')" href="?delId=<?php echo $result['clb_id'] ?>">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a> |
                                                                <a href="catAdd.php">
                                                                    <i class="fas fa-plus-square"></i>
                                                                </a>
                                                                </td>
                                                            </tr>
                                                            <?php
						                                        }
					                                            }
						                                    ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
            <!-- end page title -->
        </div>
    </div>
</div>
<?php include './inc/footer.php';?>