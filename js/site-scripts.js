$("document").ready(function(){
    // nav activa state
    var href = document.location.href;
    var lastPathSegment = href.substr(href.lastIndexOf('/') + 1).split(".")[0];

    $(".navbar-nav a[data-link="+lastPathSegment+"]").addClass("active");

    // Adding active state to side bar item select
    function getQueryVariable(variable)
    {
           var query = window.location.search.substring(1);
           var vars = query.split("&");
           for (var i=0;i<vars.length;i++) {
                   var pair = vars[i].split("=");
                   if(pair[0] == variable){return pair[1];}
           }
           return(false);
    }

    //user-block
    var blockID = window.location.search.substring(1).split("=")[1];
    $(".sidebar-holder #block"+blockID).addClass("active");

    //MObile functions
    var wWidth = $(window).width();

    if (wWidth < 768) {
        var sideBlock = $("#side-block").hide();

        $(".mobile-dropdown .show-less").hide();

        $(".mobile-dropdown .show-more").click(function(){
            $(this).hide();
            $(".mobile-dropdown .show-less").show();
            $(sideBlock).slideDown('slow');
        });

        $(".mobile-dropdown .show-less").click(function(){
            $(this).hide();
            $(".mobile-dropdown .show-more").show();
            $(sideBlock).slideUp('slow');
        });

    }

    //Add/Update form toggle
    var articleHolder = $("#article-holder");
    var articleUpload = $("#article-upload");

    var uploadedBtn = $("#uploaded");
    var uploadBtn = $("#upload");

    $("#article-upload").hide();

    $("#uploaded").click(function(){
        $("#upload").removeClass("active");
        $(this).addClass("active");
        articleUpload.hide();
        articleHolder.fadeIn();
    });

    $("#upload").click(function(){
        $("#uploaded").removeClass("active");
        $(this).addClass("active");
        articleHolder.hide();
        articleUpload.fadeIn();
    });

    //selected option
    $("select").each(function(){
        var optValue = $(this).attr("value");
        $(this).find("option[value='"+optValue+"']").attr('selected', 'selected');
    });
    //Multi select
    function selectMulti(){
        $("select[multiple='multiple']").each(function(){
            var optValue = $(this).attr("value").split(",");
            var _this = $(this);

            for(var i=0; i < optValue.length; i++){
                _this.find("option[value='"+optValue[i]+"']").attr('selected', 'selected');
            }
        });
    };

    selectMulti();

    //User form course drop down function
    var defVal = $(".user-list-form .user-roles select").val();
    userRole(defVal);

    $(".user-list-form .user-roles select").change(function(){
        var optVal = $(this).val();
        userRole(optVal);
    });

    function userRole(roleID){
        if (roleID == 4 || roleID == 5) {
            $(".user-list-form .course-wrapper").show();
            if (roleID == 5) {
                $(".user-list-form .course-wrapper #course").removeAttr("multiple");
            }else{
                $(".user-list-form .course-wrapper #course").attr("multiple", true);
                selectMulti();
            }
        }else{
            $(".user-list-form .course-wrapper").hide();
        }
    }

    
});
