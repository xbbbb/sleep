// JavaScript Document

$(document).ready(function(){
    if($(window).width()>800)
    {
        $(".nav ul li").hover(function(){
            $(this).find(".showbox").stop(true,true).slideDown();
            $(this).find("> a").addClass("on");
        },function(){
            $(this).find(".showbox").stop(true,true).slideUp();
            $(this).find("> a").removeClass("on");
        });
    }
    else
    {

        $(".nav ul li .arrow").click(function(){

            $(this).parent().siblings().find("a").removeClass("on")
            $(this).find("a").toggleClass("on");
            $(this).parent().siblings().find(".showbox").slideUp();
            $(this).parent().find(".showbox").slideToggle("fast");
        });

        if($(".menubox").length>0)
        {
            var mySwiper = new Swiper('.menubox', {
                slidesPerView: 5,
                spaceBetween: 0,
                loop: false,
                autoplayDisableOnInteraction:false,
                autoplay:false,
            });
        }
    }

    $(".getAppNav").click(function(){
        if(!$(this).hasClass("menuActive"))
        {
            $(this).addClass("menuActive");
            $(".head01_c .nav").slideDown();
        }
        else
        {
            $(this).removeClass("menuActive");
            $(".head01_c .nav").slideUp()
        }
    });

    //搜素
    $(".lang .a_search").click(function(){
        $(".seabox").fadeToggle();
    });
    $(".head01").mouseleave(function(){
        $(".seabox").hide();
    });

    if($(".banner").length>0)
    {
        var mySwiper = new Swiper('.banner', {
            slidesPerView: 1,
            spaceBetween: 1,
            loop: true,
            autoplay: {
                delay: 5000,//5秒切换一次
            },
            navigation: {
                nextEl: '.banner_next',
                prevEl: '.banner_prev',
            },
            pagination: {
                el: '.more_page',
                clickable: true,
            }
        });
    }


    if($(".fastmenu").length>0)
    {

        var h2=225;
        var h3=325;
        var h4=350;
        var h5=650;
        var h6=400;
        var h7=375;

        $(".fastmenu a").each(function(index){

            $(this).click(function(){
                mindex=index+1;
                var txtH=0;
                if($(window).width()<=800)
                {
                    for(var i=2;i<mindex;i++)
                    {
                        if(i==2){txtH+=h2;}
                        if(i==3){txtH+=h3;}
                        if(i==4){txtH+=h4;}
                        if(i==5){txtH+=h5;}
                        if(i==6){txtH+=h6;}
                        if(i==7){txtH+=h7;}
                    }
                }
                $("html,body").animate({scrollTop: $("#ww"+mindex).offset().top+txtH-60}, 500);
            });
        });
    }

    if($(".menubox").length>0)
    {
        $(".menubox a").each(function(index) {
            $(this).click(function(){
                mindex=index+1;
                $("html,body").animate({scrollTop: $(".box"+mindex).offset().top}, 500);
            });
        });
    }

});


$(window).scroll(function(){
	
	var scrollTop=$(window).scrollTop();
	$("#fixinfobox").html(scrollTop);
	//关于我们
	if($(".profwbox").length>0 && $(window).width()>800)
	{
		if(scrollTop>=200)
		{
			$(".profwbox > div:eq(1) .txt .t").show();
			$(".profwbox > div:eq(1) .txt .c").show();
		}
		if(scrollTop>=600)
		{
			$(".profwbox > div:eq(2) .txt .t").show();
			$(".profwbox > div:eq(2) .txt .c").show();
		}
		if(scrollTop>=1000)
		{
			$(".profwbox > div:eq(3) .txt .t").show();
			$(".profwbox > div:eq(3) .txt .c").show();
		}
		if(scrollTop>=1400)
		{
			$(".profwbox > div:eq(4) .txt .t").show();
			$(".profwbox > div:eq(4) .txt .c").show();
		}
		if(scrollTop>=1800)
		{
			$(".profwbox > div:eq(5) .txt .t").show();
			$(".profwbox > div:eq(5) .txt .c").show();
		}
		if(scrollTop>=2200)
		{
			$(".profwbox > div:eq(6) .txt .t").show();
			$(".profwbox > div:eq(6) .txt .c").show();
		}
		if(scrollTop<200)
		{
			$(".profwbox > div:eq(0)").siblings().find(".txt .t").hide();
			$(".profwbox > div:eq(0)").siblings().find(".txt .c").hide();
		}
	}
	if($(".profwbox").length>0 && $(window).width()<=800)
	{
		if(scrollTop>=200)
		{
			$(".profwbox > div:eq(1) .txt .t").show();
			$(".profwbox > div:eq(1) .txt .c").show();
		}
		if(scrollTop>=760)
		{
			$(".profwbox > div:eq(2) .txt .t").show();
			$(".profwbox > div:eq(2) .txt .c").show();
		}
		if(scrollTop>=1250)
		{
			$(".profwbox > div:eq(3) .txt .t").show();
			$(".profwbox > div:eq(3) .txt .c").show();
		}
		if(scrollTop>=1800)
		{
			$(".profwbox > div:eq(4) .txt .t").show();
			$(".profwbox > div:eq(4) .txt .c").show();
		}
		if(scrollTop>=2330)
		{
			$(".profwbox > div:eq(5) .txt .t").show();
			$(".profwbox > div:eq(5) .txt .c").show();
		}
		if(scrollTop>=2330)
		{
			$(".profwbox > div:eq(5) .txt .t").show();
			$(".profwbox > div:eq(5) .txt .c").show();
		}
		if(scrollTop>=2860)
		{
			$(".profwbox > div:eq(6) .txt .t").show();
			$(".profwbox > div:eq(6) .txt .c").show();
		}
		if(scrollTop<200)
		{
			$(".profwbox > div:eq(0)").siblings().find(".txt .t").hide();
			$(".profwbox > div:eq(0)").siblings().find(".txt .c").hide();
		}
	}
});























