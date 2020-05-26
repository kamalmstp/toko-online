<div class="row">
    <div class="col-lg-12">
        <h4 class="page-header">Update Gallery</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    </div>  
</div>  
<div class="row">
    <div class="panel panel-green">
        <div class="panel-heading">
            Update Data Gallery
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#kategori" data-toggle="tab">Update Data Gallery</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="kategori">
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        Update Data Gallery
                                    </h4>
                                </div>
                                <div class="panel-body"> 
                                    <form role="form" class="form-horizontal" id="formgallery">
                                        <div class="form-group">
                                            <label for="judulgallery" class="col-sm-2 control-label">Judul Gallery</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="judulgallery" id="judulgallery" type="text" required="" value="<?php echo $datagallery->title;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="link" class="col-sm-2 control-label">Link / Url Gallery</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="link" id="link" type="text" required="" value="<?php echo $datagallery->link;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsigallery" class="col-sm-2 control-label">Deskripsi Gallery</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control textarea" name="deskripsigallery" id="deskripsigallery" rows="4" cols="50" required=""><?php echo $datagallery->description;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="iconimagegallery" class="col-sm-2 control-label">Icon Image</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="currenticonimagegallery" id="currenticonimagegallery" value="<?php echo $datagallery->icon;?>">
                                                <input class="form-control" name="iconimagegallery" id="iconimagegallery" type="file" accept=".jpg, .JPG, .jpeg, .JPEG, .bitmap, .png, .PNG" onchange="preview(this);">
                                                <hr>
                                                <img  src="<?php echo base_url('/').$datagallery->icon;?>" id="iconimagepre" style="width: 50%; height: 50%;"/>
                                            </div>
                                        </div>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <input type="button" onclick="simpan_gallery('<?php echo $datagallery->idpagegallery;?>');" class="btn btn-success pull-right" value="Simpan">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function simpan_gallery(id) {
        $('html, body').animate({
            scrollTop: $("#page-wrapper").offset().top
        }, 2000);
        var file;
        var form_data;
        var valid = $("#formgallery").valid();
        if (valid == true) {
            var form = $('#formgallery').get(0);
            file = $('#iconimagegallery').prop('files')[0];
            form_data = new FormData(form);
            form_data.append('file', file);
            $('#loader').show();
            $.ajax({
                xhr: function () {
                    $('.progress').show();
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function (e) {
                        var percent = Math.round((e.loaded / e.total) * 100);
                        $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                    });
                    return xhr;
                },
                url: '<?php echo base_url('d/Pages/simpan_gallery/') ?>'+id,
                method: "POST",
                data: form_data,
                contentType: false,
                processData: false,
                dataType: "json",
                accepts: {
                    json: 'application/json'
                },
                success: function (resp) {
                    if (resp.status == 0) {
                        swal("error upload: " + resp.message);
                    } else if (resp.status == 1) {
                        swal({
                            title: "" + resp.message + "",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#008000",
                            confirmButtonText: "OK",
                            showLoaderOnConfirm: true,
                            closeOnConfirm: true,
                            closeOnCancel: false
                        },
                                function (isConfirm) {
                                    pages();
                                });
                    }
                    $('.progress').hide();
                    $('#loader').hide();
                },
                error: function (resp) {
                    swal("error upload, error_code: " + resp.status);
                }
            });
        }
    }

    function preview(oInput) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("iconimagegallery").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("iconimagepregallery").src = oFREvent.target.result;
        };
        ValidateSingleInput(oInput);
    }
    var _validFileExtensions = [".jpg", ".jpeg", ".png", ".JPG", ".JPEG"];
    function ValidateSingleInput(oInput) {
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Maaf, " + sFileName + " tidak valid, silahkan upload dengan tipe file: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
        }
        return true;
    }
</script>