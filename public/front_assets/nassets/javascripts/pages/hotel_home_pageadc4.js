if (typeof Chudu24 == "undefined")
  var Chudu24 = {};
if (typeof Chudu24.Home == "undefined")
  Chudu24.Home = {};

Chudu24.Home = {
  Init: function () {
    var thisObj = Chudu24.Home;
    thisObj.Events();
    Chudu24.Master.getCsrfToken();
//thisObj.ShowFacebookBar();
//thisObj.FillMinRate();
  },
  Events: function () {

// menu Feature Campaigns
    $(document).on({
      mouseenter: function (e) {
//stuff to do on mouse enter
        e.preventDefault();
        var _this = $(this).find("a");
        var newcontent = _this.data('href');
        if (!_this.hasClass('active')) {
          $('.featuredCampaigns ul.nav-featured li').removeClass('active');
          $('.featuredCampaigns ul.nav-featured li a.active').removeClass('active');
          $(".featuredCampaigns .nav-featured li a").css({ 'border-bottom-color': '#777' });
          _this.addClass('active');
          _this.css({ 'border-bottom-color': '#86b817' });
          if ($(this).prev()) {
            $("a", $(this).prev()).css({ 'border-bottom-color': '#fff' });
          };
          $(this).addClass('active');
        }
        if (!$(newcontent).hasClass('displayed')) {
          $('.sub-featured.displayed').removeClass('displayed');
          $(newcontent).addClass('displayed');
        }
      },
      mouseleave: function (e) {
//stuff to do on mouse leave
        e.preventDefault();
//$('.featuredCampaigns ul.nav-featured li a').removeClass('active');
      }
    }, ".featuredCampaigns ul.nav-featured li"); //pass the element as an argument to .on

    if ($("#header .bottom-header ul.nav-pills li.active").length == 0) {
      $("#header .bottom-header ul.nav-pills li:first").addClass("active");
    };

// menu #header .bottom-header
    $(document).on({
      mouseenter: function (e) {
//stuff to do on mouse enter
        e.preventDefault();
        $("#header .bottom-header ul.nav-pills li.active").removeClass("active").addClass("hover");
      },
      mouseleave: function (e) {
//stuff to do on mouse leave
        e.preventDefault();
      }
    }, "#header .bottom-header ul.nav-pills li"); //pass the element as an argument to .on

// menu #header .bottom-header
    $(document).on({
      mouseenter: function (e) {
//stuff to do on mouse enter
        e.preventDefault();
      },
      mouseleave: function (e) {
//stuff to do on mouse leave
        e.preventDefault();
        $("#header .bottom-header ul.nav-pills li.hover").removeClass("hover").addClass("active");
      }
    }, "#header .bottom-header ul.nav-pills"); //pass the element as an argument to .on

    function fulltext_search(search_field, search_input) {
      var non_unicode = remove_unicode(search_field); // search không dấu
      return (non_unicode.indexOf(search_input) != -1 || search_field.indexOf(search_input) != -1);
    }

    function remove_unicode(str) {
      str = str.toLowerCase();
      str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
      str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
      str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
      str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
      str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
      str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
      str = str.replace(/đ/g, "d");
      return str;
    }
  }
};

$(function () {
  var thisObj = Chudu24.Home;
  thisObj.Init();
});