$(function (params) {
    $("#searchicon").on('click', function (params) {
        $(".searchbox").addClass("searchboxtoggle");
    })
    $(".closebox").on('click',function (params) {
        $(".searchbox").hide();
    })
})