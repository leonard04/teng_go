<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            Product List
        </div>
        <div class="card-toolbar">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="<?= base_url('productPrint'); ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i>&nbsp;Print Basic</a>
                &nbsp;&nbsp;&nbsp;
                <a href="<?= base_url('/stimulsoft/viewer.php'); ?>" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i>&nbsp;Print Stimulsoft</a>
                &nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addEmployee"><i class="fa fa-plus"></i>Add Product</button>
            </div>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <table class="table table-bordered table-hover display font-size-sm" style="margin-top: 13px !important; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th nowrap="nowrap" style="width: 50%">Product Name</th>
                        <th nowrap="nowrap" class="text-right">Product Price</th>
                        <th nowrap="nowrap" class="text-center">Category</th>
                        <th nowrap="nowrap" data-priority=1></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $nomor =1;
                foreach($products as $value) :
                ?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $value->product_name ?></td>
                    <td class="text-right">IDR <?= number_format($value->product_price,2)  ?></td>
                    <td class="text-center"><?= $value->category_name ?></td>
                    <td width="5%">
                        <button type="button" class="btn btn-light-success btn-xs btn-icon" data-toggle="modal" data-target="#editEmployee<?= $value->product_id ?>"><i class="fa fa-edit"></i></button>
                        &nbsp;&nbsp;
                        <a href="<?= base_url('product/delete/'.$value->product_id); ?>" onclick="return confirm('Delete this item?');" class="btn btn-light-danger btn-xs btn-icon" title="Delete">
                            <i class="fa fa-trash"></i> &nbsp;
                        </a>
                        <div class="modal fade" id="editEmployee<?= $value->product_id ?>" tabindex="-1" role="dialog" aria-labelledby="editEmployee<?= $value->product_id ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <form method="post" action="<?= base_url('product/update'); ?>" >
                                        <input type="hidden" name="id" value="<?= $value->product_id ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form col-md-12">
                                                    <div class="form-group">
                                                        <label>Choose Product Category</label>
                                                        <select class="form-control" id="category" name="category" required>
                                                        <?php 
                                                        foreach($categories as $val) :
                                                        ?>
                                                            <option value="<?= $val->category_id ?>" <?php if($value->product_category_id == $val->category_id){?> SELECTED<?php } ?>><?= $val->category_name ?></option>
                                                        <?php

                                                        endforeach; 
                                                        ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Product Name</label>
                                                        <input type="text" class="form-control" name="product_name" placeholder="Product Name" value="<?= $value->product_name ?>" required />
                                                    </div>
                                            
                                                    <div class="form-group">
                                                        <label>Product Price</label>
                                                        <input type="number" class="form-control" name="price" value="<?= $value->product_price ?>" required/>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary font-weight-bold">
                                                <i class="fa fa-check"></i>
                                                Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php 
                endforeach; 
                ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>
<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="addEmployee" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form method="post" action="<?= base_url('product/store'); ?>" >
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="form col-md-12">
                                <div class="form-group">
                                    <label>Choose Product Category</label>
                                    <select class="form-control" id="category" name="category" required>
                                    <?php 
                                    foreach($categories as $val) :
                                    ?>
                                        <option value="<?= $val->category_id ?>"><?= $val->category_name ?></option>
                                    <?php 
                                    endforeach; 
                                    ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Product Name" required />
                                </div>
                        
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" class="form-control" name="price" required/>
                                </div>
                            </div>
                            
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary font-weight-bold">
                            <i class="fa fa-check"></i>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('custom_script') ?>
    <script>
        $(document).ready(function () {
            $('.display').DataTable({
                responsive: true,
                fixedHeader: true,
                fixedHeader: {
                    headerOffset: 90
                }
            });
        });
    </script>
<?= $this->endSection() ?>