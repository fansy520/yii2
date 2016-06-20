$(function(){
    $('.deleteBtn').click(function(){
        var _href = $(this).attr('data-href');
        $('.submitDeleteBtn').attr('href', _href);
    });
});