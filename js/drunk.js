;
var data;
(function ($) {
    $(document).ready(function () {
        new WOW().init();

        h = $(window).height();
        $("#mainbanner").css({height:(h)});
        if(h>800) $("h1.site-title").css({marginTop:(h-500)});

        $("html").niceScroll();
        $("#sidenav").show();

        $("#sidenav").niceScroll();
        $("#sidenav").height(h);
        $(".sidenav-content").height(h-80);


        //$("#mainbanner.bannervideo").vide({
        //    webm:"http://mazwai.com/system/posts/videos/000/000/138/webm/matt_devir--one_minute_drive.webm",
        //    mp4:"http://mazwai.com/system/posts/videos/000/000/138/original/matt_devir--one_minute_drive.mp4"
        //});

        $('#drunkmain').smoothState({
            anchors:"h1.entry-title a, .nav-previous a, .nav-next a, .site-title a, li a, .cat-links a, .tag-links a",
            onStart: {
                duration: 550,
                render: function (url, $container) {
                    $("#drunkmain").addClass("animated fadeOut");
                    console.log("fadeout");
                }
            },
            onEnd:{
                duration:550,
                render:function(url, $container, $content){
                    $("#drunkmain").html($content);
                    $("#drunkmain").removeClass("fadeOut");
                    $("#drunkmain").addClass("fadeIn");
                    $("#drunkmain").css({cursor:"default"});
                    h = $(window).height();
                    $("#mainbanner").height(h-50);
                    $("body").trigger("post-load");
                    if(url != data.url){
                        //only if it's not homepage, then scroll
                        $("body").scrollTop(h);
                    }else{
                        $("body").scrollTop(0);
                    }
                    CrayonSyntax.process();

                }
            }
        });

        $('#sidemenu').on("click",function(){
            if($(this).data("open")!=1) {
                $("body").css({overflowY:"hidden"});
                $("#drunkmain").css({transform: "translateX(340px)"});
                $("#sidenav").css({transform: "translateX(340px)"});
                $(this).data("open",1);

            }else{
                $("body").css({overflowY:"auto"});

                $("#drunkmain").css({transform: "translateX(0px)"});
                $("#sidenav").css({transform: "translateX(0px)"});
                $(this).data("open",0);
            }
            return false;
        });


    });
})(jQuery);