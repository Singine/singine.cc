$(document).ready(function () {
    var time = $("#time").html();
    function count(){
        if( +time > 0 ){
            time = time - 1;
            $("#time").html(time);
        }else{
            location.href = "index.html";
        }
    }
    setInterval(count , 1000);
});