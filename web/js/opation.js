
$(document).ready(function(){
    var url = window.location.pathname;

    $(".view").click(function(){
        id = $(this).data("id");
        urlary =url.split("/");
        domain = window.location.host;
        if(urlary[2]!="undefinded"){
            window.open(location.protocol+"//"+domain+"/"+urlary[2]+"/node/"+id);
            console.log(location.protocol+"//"+domain+"/"+urlary[2]+"/node/"+id);
        }

    });

    $(".edit").click(function () {
            id = $(this).data("id");
            window.location = url+"/edit/"+id;
        }
    );
    $(".del").click(function () {
        if(window.confirm("你确定要删除吗？\n删除的文章将无法恢复！")){
            id = $(this).data("id");
            window.location = url+"/del/"+id;
        }
        }
    );
});
