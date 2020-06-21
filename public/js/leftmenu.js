$(function(){
    var duration = 300;

    var $aside = $('.page-main > aside');
    var $asidButton = $aside.find('.qq')
        .on('click', function(){
            $aside.toggleClass('open');
            if($aside.hasClass('open')){
                $aside.stop(true).animate({left: "-70px"});
                $asidButton.find('img').attr('src', 'https://c2.staticflickr.com/6/5635/31065147822_9b6e31ab5f_o.png');
            }else{
                $aside.stop(true).animate({left: '-350px'});
                $asidButton.find('img').attr('src', 'https://c2.staticflickr.com/6/5555/31208490685_5c55f2f28f_o.png');
            };
        });
});

$(function(){
    $("ul.subs").hide();
    $("li").click(
        function() {
            $(this).find("ul").toggle();
        }
    );
});
