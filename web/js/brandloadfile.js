var uploadfile = $('#fileInput').fileinput({
    language: 'zh',
    uploadUrl: '/uploads',
    allowedFileExtensions : ['jpg', 'png','gif','jpeg'],
    dropZoneEnabled:true,
    maxFileCount: 6
});

uploadfile.on('fileerror', function(event, data, msg) {
    alert(data,msg);
});

uploadfile.on("fileuploaded", function (event, data, previewId, index) {
    var paths=$('#imgpath').attr('value');
    if(data.filenames.length != 0){
        $.each(data.filenames,function(index,name){
            if(data.filenames[index] != undefined){
                var path ="/upload/images/"+name;
                if(paths.indexOf(path)<0){
                    paths = paths+path+",";
                }
            }
        });
    }
    $("#imgpath").attr("value",paths);

});

function delImg(){
    $('.kv-file-remove').click(function(){
        thisImg = $('.img-thumbnail').eq($(this).index('.kv-file-remove'));
        delPath =thisImg.attr('src');
        imgValue = $('#imgpath').attr('value');
        imgValue=imgValue.replace(delPath+",","");
        $('#imgpath').attr('value',imgValue);

        $('.previewImg').eq($(this).index('.kv-file-remove')).remove();
    });
}
delImg();