
$('#addEquipmentsFile').click(function () {
    $('#addEquipmentFile').click()
})
$('#addEquipmentFile').change(function () {
    const startUpload = () => {
        $('#addEquipmentsFile').hide()
        $('#uploadEquipmentFile').show()
        $("#addEquipmentsFileErrorFileSize").hide();
        $("#addEquipmentsFileErrorFileType").hide();
    }
    const finishUpload = () => {
        $('#addEquipmentsFile').show()
        $('#uploadEquipmentFile').hide()
        $('#addEquipmentFile').val("")
        $('#addEquipmentFileName').val("")

    }
    startUpload()
    var file_size = $(this)[0].files[0].size;
    var file_name = $(this)[0].files[0].name;
    var file_name_pieces = file_name.split(".");
    var file_type = file_name_pieces[file_name_pieces.length - 1]
    if (file_size > MAX_UPLOAD_FILE_SIZE) { // max size 20m 
        $("#addEquipmentsFileErrorFileSize").show();
        finishUpload()
        return false;
    }
    //check types
    if (!["png", "jpg", "jpeg", "pdf", "xlsx", "xls", "doc", "docs", "csv"].includes(file_type.toLowerCase())) { // max size 20m 
        $("#addEquipmentsFileErrorFileType").show();
        finishUpload()
        return false;
    }
    $('#addEquipmentFileName').val(file_name)
    // add file


    $.ajax({
        url: $("#addEquipmentFileForm").attr('action'),
        method: "POST",
        data: new FormData($("#addEquipmentFileForm")[0]),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: (data) => {
            $('#equipmentFiles').prepend(`
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="${data.deleteLink}" class="btn btn-link  btn-sm removeFile" style="color: #e3342f">
                                <i class="fa fa-times"></i>
                            </a>
                            <a href="${data.downloadLink}" target="_blank">${file_name}</a>
                        </div>
                    </div>
                    `)
            finishUpload()
        },
        error: (data) => {
            $("#addEquipmentFileErrorFileType").show();
            finishUpload()
        }
    });

})
$('#equipmentFiles').on("click", ".removeFile", function () {
    if (confirm("Are you sure ?")) {

        $.ajax({
            url: $(this).attr('href'),
            data: {
                _token: $("#addEquipmentFileForm").find("[name=_token]").val(),
            },
            method: "DELETE",
            success: () => {
                $(this).parents(".row:first").remove();
            }
        })
    }
    return false
})