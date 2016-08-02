$(document).ready(function () {
    var winHeight;
    winHeight =$(window).height();
 
    $(".loading-box").css("height",winHeight);
    $(".notFound-box").css("height",winHeight);
    $(".matrix").css("height",winHeight);
    $(".matrix-cover").css("height",winHeight);
    $(".topBlock").css("height",winHeight);
    function resizescreen() {
        var winHeight;
        winHeight =$(window).height();
       
        $(".loading-box").css("height",winHeight);
        $(".notFound-box").css("height",winHeight);
        $(".matrix").css("height",winHeight);
        $(".matrix-cover").css("height",winHeight);
        $(".topBlock").css("height",winHeight);
    }
    $(window).bind("resize", resizescreen);
    
});