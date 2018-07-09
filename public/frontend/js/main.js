jQuery( document ).ready(function( $ ) {
"use strict"
/*-----------------------------------------------------------------------------------*/
/*  LOADER
/*-----------------------------------------------------------------------------------*/
$("#loader").delay(1000).fadeOut("slow");
/*-----------------------------------------------------------------------------------*/
/*      STICKY NAVIGATION
/*-----------------------------------------------------------------------------------*/
$(".sticky").sticky({topSpacing:0});
/*-----------------------------------------------------------------------------------*/
/*  FULL SCREEN
/*-----------------------------------------------------------------------------------*/
$('.full-screen').superslides({});
/*-----------------------------------------------------------------------------------
    Animated progress bars
/*-----------------------------------------------------------------------------------*/
$('.progress-bars').waypoint(function() {
  $('.progress').each(function(){
    $(this).find('.progress-bar').animate({
      width:$(this).attr('data-percent')
     },200);
});},
    { 
    offset: '100%',
    triggerOnce: true 
});
/* ==========================================================================
    countdown timer
========================================================================== */
$('.countdown').downCount({
     date: '12/12/2018 12:00:00' // M/D/Y
});
/*-----------------------------------------------------------------------------------*/
/*  ISOTOPE PORTFOLIO
/*-----------------------------------------------------------------------------------*/
var $container = $('.port-wrap .items');
    $container.imagesLoaded(function () {
    $container.isotope({
    itemSelector: '.portfolio-item',
    layoutMode: 'masonry'
}); 
});
$('.portfolio-filter li a').on('click', function () {
    $('.portfolio-filter li a').removeClass('active');
    $(this).addClass('active');
    var selector = $(this).attr('data-filter');
    $container.isotope({
      filter: selector
    });
return false;
});
//Togle Menu on click in Header
$(".menu-shows").on('click', function(){
    $(".menu-shows, .menu-shows-inner, .menu").toggleClass("active");
});
/*-----------------------------------------------------------------------------------*/
/*  ISOTOPE PORTFOLIO
/*-----------------------------------------------------------------------------------*/
var $container = $('.port-wrap .items');
    $container.imagesLoaded(function () {
    $container.isotope({
    itemSelector: '.portfolio-item',
    layoutMode: 'masonry'
}); 
});
$('.portfolio-filter li a').on('click', function () {
    $('.portfolio-filter li a').removeClass('active');
    $(this).addClass('active');
    var selector = $(this).attr('data-filter');
    $container.isotope({
      filter: selector
    });
return false;
});
/*-----------------------------------------------------------------------------------*/
/*    PIE CHART
/*-----------------------------------------------------------------------------------*/
$('#pie-1').pieChart({
    barColor: '#8c5f0b',
    trackColor: '#fff',
    lineCap: 'round',
    lineWidth: 4,
        onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
        }
});
$('#pie-2').pieChart({
    barColor: '#8c5f0b',
    trackColor: '#fff',
    lineCap: 'round',
    lineWidth: 4,
        onStep: function (from, to, percent) {
        $(this.element).find('.pie-value').text(Math.round(percent) + '%');
    }
});
$('#pie-3').pieChart({
    barColor: '#8c5f0b',
    trackColor: '#fff',
    lineCap: 'round',
    lineWidth: 4,
        onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
        }
});
$('#pie-4').pieChart({
    barColor: '#8c5f0b',
    trackColor: '#fff',
    lineCap: 'round',
    lineWidth: 4,
        onStep: function (from, to, percent) {
            $(this.element).find('.pie-value').text(Math.round(percent) + '%');
        }
});


/*-----------------------------------------------------------------------------------*/
/*    Parallax
/*-----------------------------------------------------------------------------------*/
jQuery.stellar({
   horizontalScrolling: false,
   scrollProperty: 'scroll',
   positionProperty: 'position',
});
/*-----------------------------------------------------------------------------------*/
/*  SLIDER REVOLUTION
/*-----------------------------------------------------------------------------------*/
jQuery(".tp-banner").revolution({
    sliderType:"standard",
    sliderLayout:"auto",
    delay:9000,
    minHeight:500,
    gridwidth:0,
    navigationType:"bullet",
    navigationArrows:"solo",
    navigationStyle:"preview4",
    gridheight:500      
});     
/*-----------------------------------------------------------------------------------*/
/*  SLIDER REVOLUTION
/*-----------------------------------------------------------------------------------*/
jQuery('.tp-banner-full').show().revolution({
    dottedOverlay:"none",
    delay:7000,
    startwidth:1200,
    startheight:500,
    navigationType:"bullet",
    navigationArrows:"solo",
    navigationStyle:"preview4",
    parallax:"mouse",
    parallaxBgFreeze:"on",
    parallaxLevels:[7,4,3,2,5,4,3,2,1,0],                                               
    keyboardNavigation:"on",                        
    shadow:0,
    fullWidth:"on",
    fullScreen:"off",
    shuffle:"off",                      
    autoHeight:"off",                       
    forceFullWidth:"on",    
    fullScreenOffsetContainer:""    
});
/*-----------------------------------------------------------------------------------*/
/*  TESTIMONIAL SLIDER
/*-----------------------------------------------------------------------------------*/
$("#testi-slide").owlCarousel({ 
    items : 1,
    autoplay:true,
    loop:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navigation : true,
    nav: true,
    navText: ["<i class='lnr lnr-arrow-left'></i>","<i class='lnr lnr-arrow-right'></i>"],
    pagination : true,
    singleItem  : true
});
/*-----------------------------------------------------------------------------------*/
/*  Single SLIDER
/*-----------------------------------------------------------------------------------*/
$(".singl-slide").owlCarousel({ 
    items : 1,
    autoplay:true,
    loop:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navigation : true,
    nav: true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    pagination : true,
    singleItem  : true
});
/*-----------------------------------------------------------------------------------*/
/*  TESTIMONIAL SLIDER
/*-----------------------------------------------------------------------------------*/
$(".deal-slide").owlCarousel({ 
    items : 1,
    autoplay:true,
    loop:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navigation : true,
    nav: true,
    navText: ["<span>Previous Deal</span>","<span>Next Deal</span>"],
    pagination : true,
    lazyLoad:true,
    nav: true,
    singleItem  : true
});
/*-----------------------------------------------------------------------------------*/
/*  TESTIMONIAL SLIDER
/*-----------------------------------------------------------------------------------*/
$(".item-slide-5").owlCarousel({ 
    items : 5,
    autoplay:true,
    loop:true,
    margin: 30,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    lazyLoad:true,
    nav: true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:4,
        },
        1200:{
            items:5,
        }
    },
    animateOut: 'fadeOut'       
});
/*-----------------------------------------------------------------------------------*/
/*  TESTIMONIAL SLIDER
/*-----------------------------------------------------------------------------------*/
$(".item-slide-4").owlCarousel({ 
    items : 4,
    autoplay:true,
    loop:false,
    margin: 30,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    lazyLoad:true,
    nav: true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:4,
        }
    },
    animateOut: 'fadeOut'       
});
/*-----------------------------------------------------------------------------------*/
/*  CASE SLIDER
/*-----------------------------------------------------------------------------------*/
$(".item-slide-3").owlCarousel({ 
    items : 3,
    autoplay:true,
    loop:false,
    margin: 30,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    lazyLoad:true,
    nav: true,
    responsive:{
        0:{
            items:1,
        },
        800:{
            items:2,
        },
        1000:{
            items:3,
        },
    },
    animateOut: 'fadeOut'       
});
/*-----------------------------------------------------------------------------------*/
/*  CASE SLIDER
/*-----------------------------------------------------------------------------------*/
$(".item-slide-2").owlCarousel({ 
    items : 2,
    autoplay:true,
    loop:false,
    margin: 30,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    lazyLoad:true,
    nav: true,
    responsive:{
        0:{
            items:1,
        },
        800:{
            items:2,
        },
        1000:{
            items:2,
        },
    },
    animateOut: 'fadeOut'
        
});
/*-----------------------------------------------------------------------------------*/
/*  CASE SLIDER
/*-----------------------------------------------------------------------------------*/
$("#blog-slide").owlCarousel({ 
    items : 3,
    autoplay:true,
    loop:false,
    margin: 30,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    lazyLoad:true,
    nav: true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:3,
        },
    },
    animateOut: 'fadeOut'       
});
/*-----------------------------------------------------------------------------------*/
/*  CASE SLIDER
/*-----------------------------------------------------------------------------------*/
$("#blog-slide-2").owlCarousel({ 
    items : 2,
    autoplay:true,
    loop:false,
    margin: 30,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    lazyLoad:true,
    nav: true,
    responsive:{
        0:{
            items:1,
        },
        800:{
            items:2,
        },
        1000:{
            items:2,
        },
    },
    animateOut: 'fadeOut'
        
});
/*-----------------------------------------------------------------------------------*/
/*  CASE SLIDER
/*-----------------------------------------------------------------------------------*/
$("#client-slide-1").owlCarousel({ 
    items : 4,
    autoplay:true,
    loop:true,
    margin: 30,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    navText: ["<i class='lnr lnr-arrow-left'></i>","<i class='lnr lnr-arrow-right'></i>"],
    lazyLoad:true,
    nav: true,
    responsive:{
        0:{
            items:1,
        },
        800:{
            items:2,
        },
        1000:{
            items:4,
        },
    },
    animateOut: 'fadeOut'
        
});
/*-----------------------------------------------------------------------------------*/
/*  COUNTER
/*-----------------------------------------------------------------------------------*/
$('.counter').counterUp({
    delay: 10,
    time: 300
});
/*-----------------------------------------------------------------------------------
    TESTNMONIALS STYLE 1
/*-----------------------------------------------------------------------------------*/
$('.free-slide').flexslider({
    mode: 'fade',
    animation: "fade",
    auto: true
});
/*-----------------------------------------------------------------------------------*/
/*  Thumb Slider
/*-----------------------------------------------------------------------------------*/
$('.thumb-slider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
});
/*-----------------------------------------------------------------------------------*/
/*  ANIMATION
/*-----------------------------------------------------------------------------------*/
var wow = new WOW({
    boxClass:     'animate',      // animated element css class (default is wow)
    animateClass: 'animated',   // animation css class (default is animated)
    offset:       100,          // distance to the element when triggering the animation (default is 0)
    mobile:       false        // trigger animations on mobile devices (true is default)
});
wow.init();

});

$(function(){
    $(".city").change(function(){
        $city = $(this).val();

        if( $city)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                dataType : 'json',
                url:  '/get_city/'+$city,
                data: {id_city: $city },
                success : function (data) {

                    if (data && data.messages == 'success')
                    {
                        console.log(data.district);
                        $html = '<option>-- Mời bạn chọn Quận huyện --</option>';
                        $.each(data.district , function(index,value){
                            $html += '<option value='+value.id+'>'+value.ten_quan_huyen+'</option>';
                        });
                        $(".district").html('').append($html);
                    }else {
                        alert(data.messages);
                    }
                }
            })
        }
    })

    $(".district").change(function () {
        $district = $(this).val();

        if( $district)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                dataType : 'json',
                url:  '/get_district/'+$district,
                data: {id_district: $district },
                success : function (data) {

                    if (data && data.messages == 'success')
                    {
                        console.log(data.wards);
                        $html = '<option>-- Mời bạn chọn Phường Xã  --</option>';
                        $.each(data.wards , function(index,value){
                            $html += '<option value='+value.id+'>'+value.ten_phuong_xa+'</option>';
                        });
                        $(".wards").html('').append($html);
                    }else {
                        alert(data.messages);
                    }
                }
            })
        }
    })

    $(".wards").change(function () {
        $wards = $(this).val();

        if( $wards)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                dataType : 'json',
                url:  '/get_wards/'+$wards,
                success : function (data) {

                    if (data && data.messages == 'success')
                    {
                        console.log(data.px);
                        $html = '<option>-- Mời bạn chọn địa chỉ --</option>';
                        $.each(data.px , function(index,value){
                            $html += '<option value='+value.id+'>'+value.so_nha+' - '+value.ten_duong + '</option>';
                        });
                        $(".px").html('').append($html);
                    }else {
                        alert(data.messages);
                    }
                }
            })
        }
    })
})

// var path = "{{ route('searchTypehead') }}";

$('input.typeahead').typeahead({
    source:  function (query, process) {
        return $.get('/tim-kiem', { query: query }, function (data) {
            $("#result").show();
            $html  = '';
            if(data && data.length > 0)
            {
                $.each(data , function(index, value){
                    $html += "<li><a href='/chi-tiet/"+(value.slug)+"-"+value.id+".html'>"+value.ten_san_pham+"</a></li>"
                });
            }else {
                $("#result").html('').append('<li><a href="#"> Không có dữ liệu </a></li>');
            }
            $("#result").html('').append($html);
        });
    }
});

function ChangeToSlug(title)
{
    var slug;
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    slug = slug.replace(' ', '');
    //In slug ra textbox có id “slug”

    return slug;
}

var ShoppingCart = {
    configSelect : {
        'classItemAddCart'    : '.add-to-car' , // class  them san pham vao gio hang
        'classItemDeleteCart' : '.item-product-remove' , // class xoa chi tiet tung san pham trong  gio hang
        'classChangeQtyCart'  : '.change-qty-cart' , // thay doi so luong trong gio hang
        'idTotalCart'         : '#total-cart' , // id chua noi dung tong tien ,
        'classTotalItem'      : '.total-item' , // tong tien cua tung sp
    },

    init : function()
    {
        let _this = this;

        _this.clickItemDeleteCart();//
        _this.clickItemChangeQty();
    },

    clickItemDeleteCart : function()
    {
        let _this = this ;
        $(_this.configSelect.classItemDeleteCart).click(function(){
            let id = $(this).attr('data-id-product');
            let $this = $(this);

            if (id)
            {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "get",
                    dataType : 'json',
                    url:  '/gio-hang/delete_ajax/'+id,

                    success : function (data) {
                        $(_this.configSelect.idTotalCart).text(data.total);
                        $this.parents('tr').remove();
                    }
                })
            }else
            {
                alert(' Không tồn tại mã sản phẩm này');
            }
        });
    },

    clickItemChangeQty : function()
    {
        let _this = this ;

        $(_this.configSelect.classChangeQtyCart).click(function(){
            let $this = $(this);
            let qty = $this.val();
            let id  = $this.attr('data-id-product');
            $.ajax({
                type: "get",
                dataType : 'json',
                url:  '/gio-hang/update_ajax/'+id+'/'+qty,
                success: function( data ) {

                    console.log(data.item);
                    $this.parents('tr').find('.total_item').html('').html(data.item);
                    $(_this.configSelect.idTotalCart).text(data.total);
                },
                error : function () {
                    alert("Lỗi: Vui lòng thử lại");
                }
            });
        });
    }
}

$(function(){
    ShoppingCart.init();
})
