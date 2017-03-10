$(document).ready(function(){
    $('.datepicker').datepicker({
        "setDate": new Date(),
        "autoclose": true
    });
    $('.multiselect').chosen();
    $('.chosen').chosen();
    $('.htmleditor').each(function(){
        var id = $(this).attr('id');
        var config = {};
        if ($(this).hasClass('allowedContent')) {
            config = {
                allowedContent: true,
                extraAllowedContent: 'p(*)[*]{*};div(*)[*]{*};li(*)[*]{*};ul(*)[*]{*}',    
            };
            CKEDITOR.dtd.$removeEmpty.i = 0;
        }
        CKEDITOR.replace(id, config);
    });
    $('.admin-section #flashMessage').removeClass('alert');
//    $('#flashMessage').removeClass('alert-success');

    $(".form-group").each(function(){
        if ($(this).attr('data-showif')) {
            var showifs = $(this).attr('data-showif').split('&');
            for (var index in showifs) {
                var element = showifs[index].split('=');
                $('#'+element[0]).on('change', {value:element[1], target:$(this)}, function(e) {
                    var selectedValue = $(this).val();
                    if (e.data.value.split('|').indexOf(selectedValue) !== -1) {
                        e.data.target.slideDown().show();
                    }
                    else {
                        e.data.target.slideUp("slow");
                    }                    
                });
                if ($(this).attr('data-runOnInit') === 'true') {
                    $('#'+element[0]).trigger('change');
                }
            }
        }
    });

    $(".prasang-modal").on('click', function(e) {
        e.preventDefault();
        $('#prasangView').modal().load($(this).attr('href'), function (e) {
            $('.datepicker').datepicker();
            $('.datepicker').on('changeDate', function(ev){
                $(this).datepicker('hide');
            });
        }); 
    });
    
//    $('.datepicker').on('changeDate', function(ev){
//        $(this).datepicker('hide');
//    });
    
//    $('body').on('submit', '.ajaxForm', function(e){
//        e.preventDefault();
//        var data = $(this).serialize(),
//            url = $(this).attr('action');
//        
//        $.ajax({
//            type: "POST",
//            url: url,
//            data: data,
//            cache: true,
//            dataType: "json",
//            success: function(result){
//                location.reload();
//            }
//        });
//    });
    // Tooltip only Text
    $('input, select, textarea').on('focus', function() {
        var title = $(this).attr('title');
        if (title) {
            $(this).data('tipText', title).removeAttr('title');
            var parentEle = $(this).parent('div');
            $('<p class="tooltip"></p>').text(title).appendTo(parentEle).fadeIn('slow');
            parentEle.css({ position: 'relative'});
            $('.tooltip').css({ top: -50, right: 0});
        }
    });
    $('input, select, textarea').on('blur', function() {
        $(this).attr('title', $(this).data('tipText'));
        $('.tooltip').remove();
    });
    $('input, select, textarea').on('change blur', function() {
        $(this).removeClass('form-error');
        $(this).next('.error-message').remove();
    });
    
    $('.alert-success').addClass('animated fadeInDown');
    $( ".close" ).click(function() {
        jQuery('.alert-success').removeClass('fadeInDown');
        jQuery('.alert-success').addClass('fadeOutUp');
    });
    
    // add multiple select / deselect functionality
    $(".listingtable #selectall").click(function () {
        $('.listingtable .singlecheck').prop('checked', $(this).prop('checked'));
    });
 
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".listingtable .singlecheck").click(function(){ 
        if($(".listingtable .singlecheck").length == $(".listingtable .singlecheck:checked").length) {
            $(".listingtable #selectall").prop("checked", true);
        } else {
            $(".listingtable #selectall").prop("checked", false);
        }
    });
    $('.listingtable tr').click(function(event) {
        if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
    
    $('.btn-action').on('click', function(){
        var form = $(this).parent('form');
        form.attr('action', $(this).attr('link'));
        form.attr('target', $(this).attr('target'));
        form.submit();
    });
    
    $(".copy-link").on('click', function(e){
        e.preventDefault();
        // var content = $(this).data('url');
        copyToClipboard($(this), $(this).data('url'));
        
        return false;
    });
});
function copyToClipboard(elem, content) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
               
        if (!content) {
            content = target.textContent;
        }
        target.textContent = content;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}

/*
 * File contains custom implementation which require to run on various pages of template
 * 
 * Created By: Chirag Kalani
 * Author: Chirag Kalani
 */

var tpj = jQuery;
var revapi429;
tpj(document).ready(function () {
    if (tpj("#rev_slider_429_1").revolution == undefined) {
        //revslider_showDoubleJqueryError("#rev_slider_429_1");
    } else {
        revapi429 = tpj("#rev_slider_429_1").show().revolution({
            sliderType: "standard",
            jsFileLocation: "/template/assets/revolution/js/",
            sliderLayout: "fullwidth",
            dottedOverlay: "none",
            delay: 9000,
            navigation: {
                keyboardNavigation: "off",
                keyboard_direction: "vertical",
                mouseScrollNavigation: "off",
                mouseScrollReverse: "default",
                onHoverStop: "on",
                touch: {
                    touchenabled: "on",
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: "horizontal",
                    drag_block_vertical: false
                }
                ,
                arrows: {
                    style: "metis",
                    enable: true,
                    hide_onmobile: false,
                    hide_onleave: true,
                    tmp: '',
                    left: {
                        h_align: "left",
                        v_align: "center",
                        h_offset: 10,
                        v_offset: 0
                    },
                    right: {
                        h_align: "right",
                        v_align: "center",
                        h_offset: 10,
                        v_offset: 0
                    }
                },
                bullets: {
                    enable: false,
                }
            },
            responsiveLevels: [1240, 1024, 778, 480],
            visibilityLevels: [1240, 1024, 778, 480],
            gridwidth: [1200, 1024, 768, 480],
            gridheight: [650, 650, 650, 650],
            lazyType: "smart",
            shadow: 0,
            spinner: "spinner2",
            autoHeight: "off",
            disableProgressBar: "on",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: "on",
                disableFocusListener: false,
            }
        });
    }
});
window.goBack = function (e){
    var defaultLocation = "/";
    var oldHash = window.location.hash;

    history.back(); // Try to go back

    var newHash = window.location.hash;

    /* If the previous page hasn't been loaded in a given time (in this case
    * 1000ms) the user is redirected to the default location given above.
    * This enables you to redirect the user to another page.
    *
    * However, you should check whether there was a referrer to the current
    * site. This is a good indicator for a previous entry in the history
    * session.
    *
    * Also you should check whether the old location differs only in the hash,
    * e.g. /index.html#top --> /index.html# shouldn't redirect to the default
    * location.
    */

    if(
        newHash === oldHash &&
        (typeof(document.referrer) !== "string" || document.referrer  === "")
    ){
        window.setTimeout(function(){
            // redirect to default location
            window.location.href = defaultLocation;
        },1000); // set timeout in ms
    }
    if(e){
        if(e.preventDefault)
            e.preventDefault();
        if(e.preventPropagation)
            e.preventPropagation();
    }
    return false; // stop event propagation and browser default event
}