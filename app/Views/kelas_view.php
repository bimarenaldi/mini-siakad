<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kelas Lists</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h3>kelas Lists</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Nama Kelas</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($kelas as $row):?>
                <tr>
                    <td><?= $row->kelas;?></td>
                    <td><?= $row->nama_kelas;?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->pk_kelas;?>" data-name="<?= $row->nama_kelas;?>" data-price="<?= $row->kelas_price;?>" data-category_id="<?= $row->kelas_category_id;?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->pk_kelas;?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
 
    </div>
     
    <!-- Modal Add kelas-->
    <form action="/kelas/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <div class="form-group">
                    <select class="custom-select" name="kelas" required>
                    <option value="VII">VII</option>
                    <option value="VIII">VIII</option>
                    <option value="IX">IX</option>
                    </select>
                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                </div>

                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input type="text" class="form-control" name="nama_kelas" placeholder="Nama Kelas">
                </div>
                 
<!--                 <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="kelas_price" placeholder="kelas Price">
                </div> -->

             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add kelas-->
 
    <!-- Modal Edit kelas-->
    <form action="/kelas/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<label>Kelas</label>
               <div class="form-group">
               
                    <select class="custom-select" name="kelas" required>
                    <option value="VII">VII</option>
                    <option value="VIII">VIII</option>
                    <option value="IX">IX</option>
                    </select>
                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                </div>
                <div class="form-group">
                    <label>Nama Kelas</label>
                    <input type="text" class="form-control nama_kelas" name="nama_kelas" placeholder="Nama Kelas">
                </div>
                 

             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="kelas_id" class="kelas_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit kelas-->
 
    <!-- Modal Delete kelas-->
    <form action="/kelas/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Are you sure want to delete this kelas?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="kelas_id" class="kelasID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete kelas-->
 
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
 
        // get Edit kelas
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('nama_kelas');
            const kelas = $(this).data('kelas');
            // Set data to Form Edit
            $('.kelas_id').val(id);
            $('.nama_kelas').val(name);
            $('.kelas').val(kelas);    
//             $('.kelas_price').val(price);
//             $('.kelas_category').val(category).trigger('change');
            // Call Modal Edit
            $('#editModal').modal('show');
        });
 
        // get Delete kelas
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.kelasID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
         
    });
</script>
</body>
</html>