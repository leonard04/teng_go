<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            Product Category List
        </div>
        <div class="card-toolbar">
            <div class="btn-group" role="group" aria-label="Basic example">
               
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addEmployee"><i class="fa fa-plus"></i>Add Category</button>
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
                        <th nowrap="nowrap" style="width: 75%">Category Name</th>
                        <th nowrap="nowrap" data-priority=1></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $nomor =1;
                foreach($categories as $value) :
                ?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $value->category_name ?></td>
                    <td width="5%">
                        <button type="button" class="btn btn-light-success btn-xs btn-icon" data-toggle="modal" data-target="#editEmployee<?= $value->category_id ?>"><i class="fa fa-edit"></i></button>
                        &nbsp;&nbsp;
                        <a href="<?= base_url('category/delete/'.$value->category_id); ?>" onclick="return confirm('Delete this item?');" class="btn btn-light-danger btn-xs btn-icon" title="Delete">
                            <i class="fa fa-trash"></i> &nbsp;
                        </a>
                        <div class="modal fade" id="editEmployee<?= $value->category_id ?>" tabindex="-1" role="dialog" aria-labelledby="editEmployee<?= $value->category_id ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <form method="post" action="<?= base_url('category/update'); ?>" >
                                        <input type="hidden" name="id" value="<?= $value->category_id ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form col-md-12">
                                        

                                                    <div class="form-group">
                                                        <label>Category Name</label>
                                                        <input type="text" class="form-control" name="category_name" placeholder="Category Name" value="<?= $value->category_name ?>" required />
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form method="post" action="<?= base_url('category/store'); ?>" >
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="form col-md-12">
                                
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Product Category" required />
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