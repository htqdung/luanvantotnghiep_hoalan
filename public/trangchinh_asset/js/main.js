$(document).ready(function () {

    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true,   // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        activate: function(event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });
    $('#verticalTab').easyResponsiveTabs({
        type: 'vertical',
        width: 'auto',
        fit: true
    });
});

jQuery(document).ready(function($) {
    $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
});
$(window).load(function(){
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 9000,
        values: [ 1000, 7000 ],
        slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
});
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
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
                        $(".district").append($html);
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
                        $(".wards").append($html);
                    }else {
                        alert(data.messages);
                    }
                }
            })
        }
    })
})

var path = "{{ route('searchTypehead') }}";

$('input.typeahead').typeahead({
    source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
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

