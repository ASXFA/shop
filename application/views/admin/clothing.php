<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <?php include 'layout/header.php'?>
</head>
<body>
    <?php include 'layout/aside.php'?>
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <?php include 'layout/header2.php'?>
        <?php
            if($this->session->flashdata('info_upload')){
                if($this->session->flashdata('info_upload')=="berhasil") {
                    echo "<div class='alert alert-success'>Your image has been uploaded<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }else if($this->session->flashdata('info_upload')=="gagal"){
                    echo "<div class='alert alert-danger'>Failed to upload, Please Make sure the extension file is PNG, JPG OR JPEG and Your image size not more than 5 Mb <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }
            }else if($this->session->flashdata('info_upload')){
                if($this->session->flashdata('info_edit')=="berhasil") {
                    echo "<div class='alert alert-success'>Your data has been updated with new images<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }else if($this->session->flashdata('info_edit')=="gagal"){
                    echo "<div class='alert alert-success'>Your data has been updated without new images<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }
            }
        ?>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Product Data</strong><span style="float: right;"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modaladd"><i class="fa fa-plus"></i>&nbsp; Add</button></span>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($product as $p) { ?>
                                        <tr>
                                            <td><?php echo $p->product_id; ?></td>
                                            <td><?php echo $p->product_name; ?></td>
                                            <?php if ($p->product_category==1) {
                                                echo "<td> Men </td>";    
                                            }else{
                                                echo "<td> Women </td>";
                                            } ?>
                                            <td><?php echo "$ " . number_format($p->product_price,2,',','.'); ?></td>
                                            <td style="text-align: center;"><button type="button" data-toggle="modal" data-target="#modalsee<?php echo $p->product_id ?>" class="btn btn-info"><i class="fa fa-eye" ></i></button><span style="padding-left: 5px" ><button type="button" data-toggle="modal" data-target="#modaledit<?php echo $p->product_id ?>" class="btn btn-warning"><i class="fa fa-pencil" ></i></button></span><span style="padding-left: 5px" ><button type="button" data-toggle="modal" data-target="#modaldelete<?php echo $p->product_id ?>" class="btn btn-danger"><i class="fa fa-trash" ></i></button></span></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
            
        <div id="modaladd" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Product</h4>
                    </div>
                    <form action="<?php echo base_url();?>adm/product/add_product" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <table cellpadding="20">
                            <tr>
                                <td>ID Product</td>
                                <td> : </td>
                                <td><input type="text" name="product_id" class="form-control" value="<?php echo $code ?>" required="" readonly></td>
                            </tr>
                            <tr>
                                <td>Name Product</td>
                                <td> : </td>
                                <td><input type="text" name="product_name" class="form-control" required=""></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td> : </td>
                                <td><select name="product_category" class="form-control" required="">
                                    <option hidden="">- Select Option -</option>
                                    <option value="1">Men</option>
                                    <option value="2">Women</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td>Product Material</td>
                                <td> : </td>
                                <td><input type="text" name="product_material" class="form-control" required=""></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td> : </td>
                                <td><textarea class="form-control" name="product_desc" style="width: 450px" required=""></textarea></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td> : </td>
                                <td><div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-dollar"></i>
                                    </span>
                                    <input type="text" name="product_price" class="form-control">
                                </div></td>
                            </tr>
                            <tr>
                                <td>Image 1</td>
                                <td> : </td>
                                <td><input type="file" name="product_image_1" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Image 2</td>
                                <td> : </td>
                                <td><input type="file" name="product_image_2" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Image 3</td>
                                <td> : </td>
                                <td><input type="file" name="product_image_3" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Image 4</td>
                                <td> : </td>
                                <td><input type="file" name="product_image_4" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Image 5</td>
                                <td> : </td>
                                <td><input type="file" name="product_image_5" class="form-control"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal See -->
        <?php foreach ($product as $p) { ?>
        <div id="modalsee<?php echo $p->product_id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="dialog">
                <div class="modal-content">
                    <div class="modal-header blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Detail Product</h4>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <td><h6><b><?= $p->product_name ?></b></h6> </td>
                                <td>(<?= "$ " . number_format($p->product_price,2,',','.'); ?>)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><h6><?= $p->product_id ?></h6> </td>
                            </tr>
                            <tr>
                                <td><?= $p->product_material ?></td>
                                <td style="text-align: justify;"><?= $p->product_desc ?></td>
                                <?php foreach ($product_image as $pi) {
                                    if ($pi->product_image_id_product==$p->product_id) {
                                        echo "<td><img class='thumbnail' src='".base_url()."assets/img/cloth/".$pi->product_image_name."'></td>";
                                    }
                                } ?>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer" >
                        <button type="button" class="btn btn-primary" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- Modal Edit -->
        <?php foreach ($product as $p) { ?>
        <div id="modaledit<?php echo $p->product_id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Product</h4>
                    </div>
                    <form action="<?php echo base_url();?>adm/product/edit_product" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <table cellpadding="20">
                            <tr>
                                <td>ID Product</td>
                                <td> : </td>
                                <td><input type="text" name="product_id" class="form-control" value="<?php echo $p->product_id ?>" required="" readonly></td>
                            </tr>
                            <tr>
                                <td>Name Product</td>
                                <td> : </td>
                                <td><input type="text" name="product_name" class="form-control" value="<?= $p->product_name ?>" required=""></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td> : </td>
                                <?php if ($p->product_category=="1") {
                                    echo "<td><select name='product_category' class='form-control' required=''>
                                    <option hidden=''>- Select Option -</option>
                                    <option value='1' selected =''>Men</option>
                                    <option value='2'>Women</option>
                                </select></td>";
                                }else{
                                    echo "<td><select name='product_category' class='form-control' required=''>
                                    <option hidden=''>- Select Option -</option>
                                    <option value='1' >Men</option>
                                    <option value='2' selected =''>Women</option>
                                </select></td>";
                                } ?>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td> : </td>
                                <td><div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-dollar"></i>
                                    </span>
                                    <input type="text" name="product_price" class="form-control" value="<?= $p->product_price ?>" >
                                </div></td>
                            </tr>
                            <tr>
                                <td>Current Image</td>
                                <td> : </td>
                                <td><input type="text" name="product_image" value="<?= $p->product_image_name ?>" class="form-control" hidden ><img src="<?php echo base_url();?>assets/img/cloth/<?= $p->product_image_name ?>" style="width: 30%" ><input type="file" name="product_image_new" class="form-control"></td></td>
                            </tr>
                            <tr>
                                <td>New Image</td>
                                <td> : </td>
                                <td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- Modal Delete -->
        <?php foreach ($product as $p) { ?>
        <div id="modaldelete<?php echo $p->product_id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Do you realy want to Delete this Data ?</h4>
                    </div>
                    <form action="<?php echo base_url();?>adm/product/delete_product/<?= $p->product_id; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" name="product_id" class="form-control" value="<?php echo $p->product_id ?>" hidden>
                    </div>
                    <div class="modal-footer" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="clearfix"></div>
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 
                    </div>
                    <div class="col-sm-6 text-right">
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/main.js"></script>


    <script src="<?php echo base_url();?>assets/admin/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/lib/data-table/buttons.print.min.js"></script>
    <script src="a<?php echo base_url();?>assets/admin/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/init/datatables-init.js"></script>

    
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>



</body>
</html>
