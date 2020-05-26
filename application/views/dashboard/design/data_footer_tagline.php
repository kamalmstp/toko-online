<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Data Footer Tagline
        </h3>
        <div class="row">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Data Footer Tagline 
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="dataTables-dataTagline">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $value) { ?>
                                    <tr>
                                        <td><?php echo $value->id; ?></td>
                                        <td><?php echo $value->taglineTitle; ?></td>
                                        <td><?php echo $value->taglineDescription; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-danger" onclick="deleteTagline('<?php echo $value->id?>');"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
<script>
function deleteTagline(id) {
        swal({
            title: "Hapus Item ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo base_url('d/Design/delete_footer_tagline'); ?>",
                            method: "POST",
                            data: {"id": id},
                            success: function (data) {
                                $('#alert').html(data);
                                dataFooterTagline();
                            }
                        });
                        swal("Terhapus!", "Item Terhapus", "success");
                    } else {
                        swal("", "", "error");
                    }
                });
    }
</script>