$(function(){
    url = window.location.href;
    urlpath = url.split('/');
    if(urlpath[3] != 'undefined'){
        ahref = "href=/"+urlpath[3]+"/";
        $([ahref]).addClass('nav_in');
    }
    console.log(ahref);
});