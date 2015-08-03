var toasterVisible = false;

jQuery(document).ready(function () {

    jQuery(".toaster-title").click(function () {
        if (!toasterVisible) {
            openToaster();
        } else {
            closeToaster();
        }
    });

//    if (shouldToasterStayClosed()) {
//        jQuery(document).mouseleave(function (e) {
//            if (!shouldToasterStayClosed() && e.clientY < 20) {
//                openToaster();
//            }
//        });
//    }

    function openToaster() {
        jQuery(".toaster-container").animate({height: toasterHeightOpened}, 300);
        toasterVisible = true;
        var arrow = jQuery(".toaster-arrow-up");
        arrow.addClass('toaster-arrow-down');
        arrow.removeClass('toaster-arrow-up');

    }

    function closeToaster() {
        jQuery(".toaster-container").animate({height: toasterHeightClosed}, 300);
        toasterVisible = false;
        document.cookie = "toaster-closed";
        var arrow = jQuery(".toaster-arrow-down");
        arrow.addClass('toaster-arrow-up');
        arrow.removeClass('toaster-arrow-down');
    }

    function shouldToasterStayClosed() {
        return document.cookie.indexOf("toaster-closed") < 0;
    }

});