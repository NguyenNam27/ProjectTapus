$(document).ready(function () {

    var cur = 0;
    var count = $('.slide').length;

    $('.slide').hide();
    $('.slide').eq(0).show(0);

    const category = ['Kết nối cả thế giới chỉ qua một cú chạm!', 'Gắn kết xã hội qua TAPUS', 'Chia sẻ thông tin tiện lợi'];

    var changeSlideLabel = () => {
        let i = $('.active[class*="slide"]').index();
        $('.slide-title').text(category[i]);
    }
    
    changeSlideLabel();

    setInterval(function () {
        $('.slide').eq(cur).fadeOut(function () {
            $(this).removeClass('active');
            cur = (cur + 1) % count;
            $('.slide').eq(cur).addClass('active').fadeIn(0);
            changeSlideLabel();
        });
    }, 3000);
});
