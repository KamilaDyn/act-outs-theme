jQuery(document).ready(function ($) {

    // display video
    $('.watch').on('click', function () {
        // $(this).siblings('.light').css('display', 'block');
        $(this).siblings('.light').attr('id', 'display');
        $(this).siblings('#display').fadeIn(500);
        $('.site-footer').append('<div id="fade"></div>');
        var idatr = $(this).siblings('.light').children('div').children('.mejs-container').children('.mejs-inner').children('div').children('mediaelementwrapper').children('video').attr('id');
        $(`#${idatr}`).trigger('play');
    });

    // display video
    $('.watch').on('click', function () {
        // $(this).siblings('.light').css('display', 'block');
        $(this).parent('.img').siblings('.light').attr('id', 'display');
        $(this).siblings('#display').fadeIn(500);
        $('.site-footer').append('<div id="fade"></div>');
        var idatr = $(this).parent('.img').siblings('.light').children('div').children('.mejs-container').children('.mejs-inner').children('div').children('mediaelementwrapper').children('video').attr('id');
        $('body').addClass('not-scroll');
        $(`#${idatr}`).trigger('play');
        $('.container-btn').css('visibility', 'hidden');

       
    });

if($('.wp-video').hover(function(){
    $(this).siblings('.container-btn').css('visibility', 'visible');
},
function(){
    $(this).siblings('.container-btn').css('visibility', 'hidden');
}))

if($('.container-btn').hover(function(){
    $(this).css('visibility', 'visible');
},
function(){
    $(this).css('visibility', 'hidden');
}))
    // don't display video

    // $(document).on('click', '#fade', function () {
    //     var idatr = $('#display').children('div').children('.mejs-container').children('.mejs-inner').children('div').children('mediaelementwrapper').children('video').attr('id');
    //     $('#fade').remove();
    //     $('body').removeClass('not-scroll');
    //     $(`#${idatr}`).trigger('pause');
    //     $('.watch').siblings('.light').removeAttr("id");


    // })


    $('.closebtn').on('click', function () {
        var idatr = $(this).parent('.container-btn').parent('#display').children('.wp-video').children('.mejs-container').children('.mejs-inner').children('.mejs-mediaelement').children('mediaelementwrapper').children('video').attr('id');
        $('.watch').siblings('.light').css('display', 'none');
        $('#fade').remove();
        $(`#${idatr}`).trigger('pause');
        // $('.watch').parent('.img').siblings('.light').removeAttr("id");
        $(this).parent('.container-btn').parent('.light').removeAttr("id");

    })

    
    /*-----------------------------------
    DISABLE RIGHT CLICK prevent downolad video
    -------------------------*/

    $('.wp-video').bind("contextmenu", function (e) {
        return false;
    });



})