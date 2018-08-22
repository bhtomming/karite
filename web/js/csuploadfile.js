var uploadfile = $('#fileInput').fileinput({
    language: 'zh',
    uploadUrl: '/uploads',
    allowedFileExtensions : ['jpg', 'png','gif','jpeg'],
    dropZoneEnabled:false
});

uploadfile.on('fileerror', function(event, data, msg) {
    alert(data,msg);
});
uploadfile.on("fileuploaded", function (event, data, previewId, index) {
    var path ="/upload/images/"+data.filenames;
    $("#imgpath").attr("value",path);
    $("#preview").attr("src",path);
});