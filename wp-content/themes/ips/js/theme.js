var gallerySlick = null;
jQuery(function($) {
    var $ = jQuery;
    var $container = $(".gallery");
    $container.imagesLoaded(function() {
        $container.masonry({
            itemSelector: '.gallery-item'
        });
    });
    gallerySlick = $(".modal-thumbnail-wrapper").slick({
        dots:false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true
    });
    var slideIndex = 1;
    showSlides(slideIndex);
    $('.top').click(function(event){
        $('html, body').animate({
            scrollTop: $('[name="top"]').offset().top -50
        }, 500);
        event.preventDefault();
    });
    if($('.staff-inner-wrapper').length) {
        $('.staff-inner-wrapper').click(function() {
            $(".loader",this).show();
            $('.staff-inner-wrapper').removeClass('showMe');
            showStaffBio($(this).data('id'), $(this).data('colid'));
            $(this).addClass('showMe');
        });
    }
});
function openModal() {
    var $ = jQuery;
    $("#galleryModal").addClass('fadeIn');
}
function closeModal() {
    var $ = jQuery;
    $("#galleryModal").removeClass('fadeIn');
}
function currentSlide(n) {
    var $ = jQuery;
    $(".viewed").val(n);
    showSlides(n);
}
function plusSlides(n) {
    var $ = jQuery;
    var slideIndex = $(".viewed").val();
    if(n == -1) {
        n = (slideIndex - 1);
    } else {
        var a = parseInt(slideIndex);
        var b = parseInt(n);
        n = (a + b);
    }
    showSlides(n);
}

function showSlides(n) {
    var $ = jQuery;
    var slides = $(".slides").length;
    var slideIndex = n;
    if (n > slides) {
        //go back to first slide
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides;
    }
    for (i = 1; i <= slides; i++) {
        $(".slide"+i).hide();
        $(".preview"+i).removeClass('active-preview');
    }
    $(".slide"+slideIndex).show();
    $(".preview"+slideIndex).addClass('active-preview');
    $(".viewed").val(n);
}

var curStaffId = 0;
var curDisplayRow = 0;
function showStaffBio(id, colid) {
    var $ = jQuery;
    var staffid = id;
    var row = 1;
    var curRowTop = 0;
    var staffRow = 0;
    var lastRowStaff = null;
    // If current staff profile then reset everything.
    if (id == curStaffId) {
        closeStaffBio();
        return;
    }
    // Find out position of staff within the site responsively
    $(".staff").each(function () {
        var top = $(this).offset().top;
        if (!curRowTop) curRowTop = top;
        // If greater than we just started a new row
        if (top > curRowTop) {
            row++;
            curRowTop = top;
        }
        // Check to see if this is the staff profile we're looking for
        if ($(this).attr("id") == "staff-" + id) {
            staffRow = row;
        }
        // Record the last profile in the row so we know where to insert the section containing the content
        if (row == staffRow) {
            lastRowStaff = $(this);

        }
    });
    // Load bio from database
    $.ajax({
        url: "?ajax=show_staff_bio&staffid=" + staffid + "&colid=" + colid,
        success: function (response) {
            $(".loader").hide();
            // Check if the section row needs to appear.
            if (staffRow != curDisplayRow) {
                // Slide out the current row if still there
                if (curDisplayRow) {
                    $(".staff-bio-wrapper").css('height','0px').addClass("remove");
                    //setTimeout(function() {
                        $(".remove.staff-bio-wrapper").remove();
                   // }, 1000);
                }
                // Add the new bio and slide it in
                var html = '<article class="staff-bio-wrapper" style="width: 100%;clear:both;"><div class="staff-bio-inner-wrapper">' + response + '</div></article>';

                $(lastRowStaff).after(html);
                //var newheight = $('.strategy-content.col2').height();
                var newheight = '100%';
                $(".staff-bio-wrapper").not(".remove").css('height',newheight);
            } else {
                // Fade out existing bio and fade in the new one
                $(".staff-bio-wrapper .bio-content").css('opacity','0');
                $(".staff-bio-wrapper .bio-content").attr('id','');
                $(".staff-bio-wrapper").html('<div class="bio-content" style="opacity:0">' + response + '</div>');
                $(".staff-bio-wrapper .bio-content").css('opacity','1');

                var newheight = '100%';
                $(".staff-bio-wrapper").css('height',newheight);
            }
            //var minus = parseInt($('.fixed').height());
            setTimeout(function() {
                $("html, body").animate({scrollTop: (0, $('.staff-bio-wrapper').offset().top)}, 1000);
            },100);
            // Set currentStrategy to this id
            curDisplayRow = staffRow;
            curStaffId = staffid;
        }
    });
}

function closeStaffBio() {
    var $ = jQuery;
    $(".staff-bio-wrapper").css('height','0px').addClass("remove");
    //setTimeout(function() {
        $(".remove.staff-bio-wrapper").remove();
    //}, 1000);
    curStaffId = 0;
    curDisplayRow  = 0;
}
