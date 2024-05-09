function getScrollBarWidth() {
    var $outer = $('<div>').css({visibility: 'hidden', width: 100, overflow: 'scroll'}).appendTo('body'),
        widthWithScroll = $('<div>').css({width: '100%'}).appendTo($outer).outerWidth();
    $outer.remove();
    return widthWithScroll - 100;
}
function bg_draw() {
    var pattern = Trianglify({
        height: window.innerHeight,
        width: window.innerWidth,
        cell_size: 100,
        x_colors: 'Spectral'
    });
    $(".background-image").first().css("backgroundImage","url(" + pattern.png() + ")");
}
function hideScrollBar() {
    $('.noscrollbar').css("marginBottom",  getScrollBarWidth()).parent().css("overflow", "hidden");
}
function ajax_get(obj, oth_data = {}) {
    var g_url = '', g_data = null;
    var aim = $('#wrapper');
    console.log(obj);
    switch(obj.page){
        case 'request_list':
            g_url = obj.page + '/' + ((obj.list_page == null) ? '1' : obj.list_page);
            g_data = {pagetype : obj.list_type, vendor : (oth_data != null) ? oth_data.vendor : null};
            break;
        case 'request_detail':
            g_url = obj.page + '/' + obj.detail_id;
            break;
        default :
            g_url = obj.page;
            break;
    }
    $.ajax({
        url: "/dormfix/index.php/amain/" + g_url,
        method: "GET",
        data: g_data,
        beforeSend: function(){
            aim.stop().empty()
                .append(
                    $('<div>').addClass("row col-md-8 col-md-offset-2 text-center bkg-dark-gray")
                    .append(
                        $('<div>').addClass('loader')
                    )
                );
        },
        success: function(response){
            aim.fadeOut(200,function(){
                aim.empty().append(response).fadeIn(200, function(){
                    $('html, body').animate({scrollTop: obj.scrollHeight}, 300, 'swing');
                })
            })
        }
    })
    return "/dormfix/index.php/" + g_url;
}
window.addEventListener("popstate", function(e) {ajax_get(e.state)});
$(document).ready(function() {
    //history init
    if (history.state == null) {
        var state = {
            page : 'request_list',
            list_type : 'latest',
            list_page : '1',
            detail_id : null,
            scrollHeight : 0
        }
        history.replaceState(state, null, null);
    }
    hideScrollBar();
	$.ajaxSetup({ cache: false });
    bg_draw();
})