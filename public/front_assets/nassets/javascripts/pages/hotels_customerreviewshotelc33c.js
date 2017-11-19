if (typeof Chudu24 == "undefined")
  var Chudu24 = {};
if (typeof Chudu24.Hotels == "undefined")
  Chudu24.Hotels = {};
if (typeof Chudu24.Hotels.UserControls == "undefined")
  Chudu24.Hotels.UserControls = {};
var URL_ROOT ="https://khachsan.chudu24.com";
Chudu24.Hotels.UserControls.CustomerReviewsHotel = {
  Init: function () {
    var thisObj = Chudu24.Hotels.UserControls.CustomerReviewsHotel;
    thisObj.LoadReviewPaging();
    thisObj.facebook_googleplus();
    thisObj.Events();
  },
  LoadReviewPaging: function(){
    if($("#isHotelReview").val() == "true")
      $(".paging-bottom-center").html(Chudu24.Hotels.UserControls.CustomerReviewsHotel.renderPaging($("#totalPage").val(), 1, true));

  },

  Events: function () {
    $(document).on('click', '#secondary .readmore', function (e) {
      e.preventDefault();
      if( $(this).text() == "Thu gọn"){
        $(".snippet-content .text-justify").css("height","136px");
        //$(this).css("position","absolute");
        //$(this).css("top","124px");
        $(this).text("Xem thêm");
        $(".snippet-content .purdah").show();
      }else
      {
        $(".snippet-content .text-justify").css("height","auto");
        $(this).text("Thu gọn");
        //$(this).css("position","inherit");
        //$(this).css("top","0");
        $(".snippet-content .purdah").hide();
      }

    });
    $(document).on('click', '#primary .lnkMoreReview', function (e) {
      e.preventDefault();
      var _this = $(this);
      var _HotelIdInt = _this.attr("HotelIdInt");
      var _HotelTextId = _this.attr("HotelTextId");
      var _ReviewIdIntFilter = _this.attr("ReviewContentIdInt");
      Chudu24.Hotels.UserControls.CustomerReviewsHotel.PageMoreReview(_HotelIdInt, _ReviewIdIntFilter, _this, _HotelTextId);
    });
    $(document).on("click", "#primary .reviewUcConTrol .pagination li.page a", function (e) {
      e.preventDefault();
      var _parent = $(this).parent();
      if (!_parent.hasClass("active")) {
        var pageNum = $(this).text();
        if ($.trim(pageNum).length == 0) {
          var goto = (_parent.next().length) ? "prev" : ((_parent.prev().length) ? "next" : "");
          pageNum = parseInt($("a", $(".pagination li.active:first")).text());
          if (goto == "next") {
            pageNum += 1;
          }
          else if (goto == "prev") {
            pageNum -= 1;
          }
        };
        var url = location.href;
        var HotelIdInt = $(".txtHotelIdInt").val();
        var ShortGuidQString = $(".shortguidqstring").val();
        Chudu24.Hotels.UserControls.CustomerReviewsHotel.PagingReview_v2(pageNum,HotelIdInt, ShortGuidQString);
      }
    });

    $('div.review-photos').each(function () {
      if ($('a.photo', $(this)) != null && $('a.photo', $(this)).length > 0) {
        var ReviewContentId = $(this).attr('rel')
        $('div.review-photos a[reviewcontentid="' + ReviewContentId + '"]').colorbox({
          rel: ReviewContentId,
          onOpen: function () {
            $('div.divVideo').hide();
          },
          onClosed: function () {
            $('div.divVideo').show();
          }
        });
      }
    });

    // Review
    $(document).on('blur', "input, textarea", function (e) {
      if ($(this).hasClass("txtFullNameReply")) {
        if ($.trim($(this).val()).length > 0) {
          $(this).removeClass("input-error");
          $("li.spnErrFullName").hide();
        };
      }
      else if ($(this).hasClass("txtEmailReply")) {
        if ($.IsValid_Email($(this).val())) {
          $(this).removeClass("input-error");
          $("li.spnErrEmail").hide();
        }
      }
      else if ($(this).hasClass("txtContentReply")) {
        if ($.trim($(this).val()).length > 0) {
          $(this).removeClass("input-error");
          $("li.spnErrContentReply").hide();
        }
      }
    });


    $(document).on("click", ".huu-ich-button", function (e) {
      e.preventDefault();
      var _url ='/datphong/increaseusefulcount';
      var review_id = $(this).attr('data-id');
      var _data = {
        'ReviewId':review_id
      };
      if ($(this).attr('data-used') == "false") {
        $("#txtHuuIch_" + review_id).text(parseInt($("#txtHuuIch_" + review_id).text()) + 1);
        $(this).attr('disabled', true);
        $.ajax({
          type: "POST",
          url: _url,
          data: JSON.stringify(_data),
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          cache: false,
          success: function (html) {
            return true;
          },
          error: function (err) {
            return true;
          }
        });
      }
      $(this).attr('data-used', "true");
    });


    $(document).on('click', '.lnkReplyReviews', function (e) {
      e.preventDefault();

      var review_id = $(this).data("id");

      if ($(this).attr('show') == 'true') {

        $('div.divReplyControl').remove();

        if (review_id != null)
          var pDiv = $("#tool_review_" + review_id);
        else
          var pDiv = $(this).closest('div');

        var DivReply = $('div.divReplyControlTemp').clone();

        DivReply.removeClass('divReplyControlTemp').addClass('divReplyControl');

        if (review_id != null)
          DivReply.attr("ReviewContentIdInt", review_id);

        $('input.txtParentId', DivReply).val($(this).attr('parentid'));
        if (!$.isEmptyObject($(this).attr("hotelidint")))
          $('input.txtHotelIdInt', DivReply).val($(this).attr("hotelidint"));
        if (!$.isEmptyObject($(this).attr("hotelname")))
          $('input.txtHotelName', DivReply).val($(this).attr("hotelname"));
        if (!$.isEmptyObject($(this).attr("cityname")))
          $('input.txtCityName', DivReply).val($(this).attr("cityname"));
        if (!$.isEmptyObject($(this).attr("citytextid")))
          $('input.txtCityTextId', DivReply).val($(this).attr("citytextid"));
        $("input.button", DivReply).bind('click', function (e) { $.AddReview(DivReply); });

        if (review_id != null)
          pDiv.after(DivReply);
        else
          pDiv.next('div.afterReply').after(DivReply);

        var listratehomereply = $(DivReply).closest('div.listratehomereply');
        if (listratehomereply.length > 0) {
          listratehomereply.show();
        }
        DivReply.slideDown();
        $(".lnkReplyReviews").attr('show', true);
        $(".lnkReplyReviews_subs").attr('show', true);
        $(this).attr('show', false);
      }
      else {
        //var div = $('div.divReplyControl', $(this).closest('div.ri'));
        if (review_id != null) {
          var div = $('div[ReviewContentIdInt="' + review_id + '"].divReplyControl');
          var listratehomereply = $(div).closest('div.listratehomereply');
          if (listratehomereply.length > 0) {
            if (div.is(":visible")) {
              div.slideToggle('fast', function () {
                if ($.trim((".divReplyReviews", listratehomereply).html()).length == 0) {
                  listratehomereply.hide();
                };
              });
            }
            else {
              listratehomereply.show();
              div.slideToggle();
            }
          }
          else {
            div.slideToggle();
          }
        }
        else {
          var div = $('div.divReplyControl', $(this).closest('div.divReplyReviews'));
          div.slideToggle();
        }

      }
    })


    $.AddReview = function (DivReply) {
      var HotelIdInt = $.trim($('input.txtHotelIdInt', DivReply).val());
      var HotelName = $.trim($('input.txtHotelName', DivReply).val());
      var FullName = $.trim($('input.txtFullNameReply', DivReply).val());
      var Email = $.trim($('input.txtEmailReply', DivReply).val());
      var StayDate = $.trim($('input.txtStayDate', DivReply).val());
      var ReviewRating = $.trim($('input.txtReviewRating', DivReply).val());
      var Subject = $.trim($('input.txtSubject', DivReply).val());
      var Body = $.trim($('textarea.txtContentReply', DivReply).val());
      var ReservationNumber = $.trim($('input.txtReservationNumber', DivReply).val());
      var ReservationItemId = $.trim($('input.txtReservationItemId', DivReply).val());
      var CityName = $.trim($('input.txtCityName', DivReply).val());
      var CityTextId = $.trim($('input.txtCityTextId', DivReply).val());
      var ParentId = $.trim($('input.txtParentId', DivReply).val());
      var FileNames = '';
      var bValid = true;
      if (FullName.length == 0) {
        $("input.txtFullNameReply", DivReply).addClass("input-error");
        $("li.spnErrFullName", DivReply).show();
        bValid = false;
      }

      if (!$.IsValid_Email(Email)) {
        $("input.txtEmailReply", DivReply).addClass("input-error");
        $("li.spnErrEmail", DivReply).show();
        bValid = false;
      }

      if (Body.length == 0) {
        $("textarea.txtContentReply", DivReply).addClass("input-error");
        $("li.spnErrContentReply", DivReply).show();
        bValid = false;
      }

      if (bValid) {

        $("input.button", DivReply).hide();
        $("#btn-loading", DivReply).show();

        var _url = "/datphong/savereviewReply";
        //URL_ROOT+/V2/Hotels/WebServices/Hotels.asmx/AddReviews
        var _data ={
          HotelIdInt:$.SafeData(HotelIdInt),
          HotelName: $.SafeData(HotelName) ,
          FullName: $.SafeData(FullName),
          Email: $.SafeData(Email) ,
          StayDate:$.SafeData(StayDate),
          CMNDNumber: '',
          IssueDate:'',
          IssueBy:'',
          ReviewRating: $.SafeData(ReviewRating),
          Subject: $.SafeData(Subject) ,
          Body: $.SafeData(Body),
          ReservationNumber:$.SafeData(ReservationNumber),
          ReservationItemId: $.SafeData(ReservationItemId),
          CityName:  $.SafeData(CityName) ,
          CityTextId: $.SafeData(CityTextId),
          ParentId:$.SafeData(ParentId),
          FileNames: $.SafeData(FileNames),
          ChuduRating: 0,
          Facility: {}
        };
        /** Begin tracking user */
        var MiHawk = Chudu24.MI_HAWK
          , dataTracking = {}
          , accountId = MiHawk.getUid();

        if (accountId && accountId != '') {
          var  url = window.location.href
            , contentId =  $.SafeData(ReservationItemId)
            , typeId = 6
            , content = 'Submit reply đánh giá khách sạn : {0}'.format( $.SafeData(HotelName));

          dataTracking.accountId = accountId;
          dataTracking.typeId = typeId;
          dataTracking.contentId = contentId || '';
          dataTracking.url = url || '';
          dataTracking.content = content;

          MiHawk.InsertTracking(dataTracking);
        }
        /** End tracking user */

        $.ajax({
          type: "POST",
          url: _url,
          data: JSON.stringify(_data),
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function (html) {
            if (html.code ==50000) {

              Chudu24.Notification.Message("success", "Cảm ơn quý khách đã trả lời đánh giá khách sạn.", "Gửi đánh giá");
              $('.lnkReplyReviews', $('div.ri')).attr('show', 'true');
            } else {
              Chudu24.Notification.Message("error", "Xảy ra lỗi trong quá trình gửi đánh giá.", "Lỗi gửi đánh giá");
            }
            DivReply.slideUp('slow');
            DivReply.remove();
          },
          error: function (err) {

            Chudu24.Notification.Message("error", "Xảy ra lỗi trong quá trình gửi đánh giá.", "Lỗi gửi đánh giá");
          }
        });
      }
    };


// Review - end
  },

  hbsHelper: function(){
    Handlebars.registerHelper("subNum", function (a, b) {
      return parseInt(a) - parseInt(b);
    });
    Handlebars.registerHelper("replyReviewLevel", function (threadSortOrder) {
      var nTab = (threadSortOrder.split('-').length - 2);
      return ("style=margin-left:" + (nTab * 30) + "px;");
    });
    Handlebars.registerHelper("getDateTimeNow", function (strFormatDate) {
      return  moment().format(strFormatDate);
    });
    Handlebars.registerHelper("reviewStarByRating", function (strRating, nStar) {
      var strValue = "";
      var nStarRating = 0;
      nStarRating = parseInt(strRating)
      if (nStarRating < nStar)
        strValue = " disable";
      return strValue;
    });
    Handlebars.registerHelper("formatDate", function (dateTime, format, fromFormat) {
      /** replace datetime in Zulu timeZone */
      if (dateTime) {
        dateTime = dateTime.toString().toUpperCase();
        var regT = /\d{2}T\d{2}\:\d{2}\:\d{2}\.\d{3}/g;
        if (regT.test(dateTime))
          dateTime = dateTime.replace(/\T/g, ' ');
        var regZ = /\d{2}\:\d{2}\:\d{2}\.\d{3}Z/g;
        if (regZ.test(dateTime))
          dateTime = dateTime.replace(/\Z/g, '');
      }
      var mDateTime = null;
      if (!dateTime)
        mDateTime = moment();
      if (!fromFormat)
        mDateTime = moment(dateTime);
      else
        mDateTime = moment(dateTime, fromFormat);
      var value = mDateTime.format(format);
      return value;
    });
    Handlebars.registerHelper('translateListLinkReviewHotel', function (arrUrl) {
      if (arrUrl) {
        return  arrUrl.replace(/href="http:/g, 'href="').replace(/href="https:/g, 'href="').replace(/href='http:/g, "href='").replace(/href='https:/g, "href='");
      }
      else
        return "";
    });
    Handlebars.registerHelper('compare', function (lvalue, operator, rvalue, options) {
      var result = compare(lvalue, operator, rvalue);
      if (result) {
        return options.fn(this);
      } else {
        return options.inverse(this);
      }

    });
    Handlebars.registerHelper("decodeHtml", function (strHtmlEncode) {
      return unescape(strHtmlEncode);
    });
    Handlebars.registerHelper("stripALink", function (strHtmlContent) {
      strHtmlContent = strHtmlContent.replace(/(<[^>]*)href\s*=\s*('|")(?!(https?\:\/\/)?(www|dulich|du\-lich|choupon|m|en|hotels)\.chudu24\.com(\/)?)[^\\2]*?\2([^>]*>)/ig, "");
      return  strHtmlContent.replace(/<\/?(a|A).*?>/g, "");
    });
    Handlebars.registerHelper('translateLink', function (url) {
      if(url){
        url = url.toString().trim();
        if (url.indexOf("http://") == 0) {
          url = url.replace("http://", "//");
        }
        else if (url.indexOf("//") == -1 && url.indexOf("/") == -1) {
          url = '//' + url;
        }
      }
      return url;
    });
    function isEmpty(obj) {
      return typeof obj == 'string' && !obj.trim() || typeof obj == 'undefined' || obj === null || (typeof obj == 'object' && obj.length == 0);
    }
    function compare(lvalue, operator, rvalue) {
      var operators = {
        '==': function (l, r) {
          return l == r;
        },
        '===': function (l, r) {
          return l === r;
        },
        '!=': function (l, r) {
          return l != r;
        },
        '<': function (l, r) {
          return l < r;
        },
        '>': function (l, r) {
          return l > r;
        },
        '<=': function (l, r) {
          return l <= r;
        },
        '>=': function (l, r) {
          return l >= r;
        },
        'typeof': function (l, r) {
          return typeof l == r;
        },

        'CONTAIN': function (l, r) {
          if (l == null || r == null)
            return false;
          return l.indexOf(r) != -1;
        },
        'IsNullOrEmpty': function (l) {
          return isEmpty(l);
        }
      }
      if (!operators[operator])
        throw new Error("Handlerbars Helper 'compare' doesn't know the operator " + operator);
      var result = operators[operator](lvalue, rvalue);
      return result;
    }
  },

  PagingReview_v2: function (PageNumber, HotelIdInt, ShortGuidQString) {
    Chudu24.Hotels.UserControls.CustomerReviewsHotel.scrollingTo_v2($("div.CustomerReviews"), 10, function () {
      $('div.CustomerReviews div.reviewUcConTrol').html($('#loading').clone(true).show());
      // var url = location.href;
      $.ajax("/napi/ajax/hotel-review-detail", {
        method: 'post',
        data: {
          hotelIdInt: HotelIdInt,
          pageNum: PageNumber,
          shortGuidQString: ShortGuidQString,
          _csrf: $.GetCsrfToken()
        },
        error:function(err){
          // alert(err);
        }
        ,
        success: function (resp) {
          //$('div.CustomerReviews div.reviewUcConTrol').html(resp);
          var source = '<div class="divCreateNewReview"> <div class="left" style="margin-top: 5px;"><h2>{{currentHotel.reviewcount}} khách hàng đã đánh giá khách sạn này</h2></div> <div> {{#if currentHotel.isCanReply}} <a href="//khachsan.chudu24.com/V2/Hotels/WriteReviews.aspx?IntId={{currentHotel.hotelidint}}" class="buttonb hoverButton" style="float: right;">Viết đánh giá</a> {{/if}} </div> </div> <br/> ';
          //source +=  '<input type="hidden" id="hidappId" class="hidappId" value="{{appId}}"/> <div class="listrate" id="listrate"> {{#each reviewlist}} <div class="listrote ri" rcid="{{ReviewContentIdInt}}" style="padding: 30px 10px 20px 10px;"> <div class="customer" style="width: 15%"> <span class="nameauthor" style="text-align: left; overflow: hidden; max-height: 33px; max-width: 90px; line-height: 16px; margin: 5px 0; display: block">{{ReviewedBy}}</span> <span class="date"><em>{{formatDate ReviewedDate "DD/MM/YYYY" null }}</em></span> </div> <div class="customercm" style="width: 70%"> <a href="{{linkReviewHotel}}"> <span class="green">{{decodeHtml TitleVN}}</span></a><br/> <span class="italic">"{{{stripALink ContentVN }}}"</span> {{# compare TagLinkHtml "IsNullOrEmpty" null}} {{else}} <div class="top-10 bottom-5 gray small"> Từ khóa: {{{translateListLinkReviewHotel TagLinkHtml}}} </div> {{/compare}} <div style="margin-bottom: 10px;" > {{# if IsChiTietVisible}} <table class="mot-chi-tiet top-10"> {{#each ReviewDetailRateList}} <tr> <td> {{FacilityName}}</td> <td> <div class="thanh-chi-tiet"></div> <div style="width: {{Rating}}px;" class="thanh-muc-do"></div> </td> <td>{{FacilityName2}}</td> <td><div class="thanh-chi-tiet"></div> <div style="width: {{Rating2}}px;" class="thanh-muc-do"></div></td> </tr> {{/each}} </table> {{/if}} </div> <div class="review-photos afterReply" rel="{{Id}}" style="margin-bottom: 10px;"> {{#each Photos}} {{# compare Enabled "==" "1"}} <a reviewcontentid="{{../../Id}}" href="{{translateLink FileName}}?w=800&c=1"title="{{../../../currentHotel.hotelname}}" class="photo"> <img src="{{translateLink FileName}}?w=60" alt="{{../../../currentHotel.hotelname}}"></a> {{/compare}} {{/each}} </div> {{#if ../isCanReply}} <div class="tool-box" style="position: relative; margin-bottom: 20px; min-width: 515px;"><div> <div class="thanh-cong-cu"> <span class="huu-ich-text">Đánh giá này có hữu ích cho bạn? </span> <div class="huu-ich-layout"> <button id="btnHuuIch" class="huu-ich-button btn-success" data-used="false" data-id="{{ReviewContentIdInt}}">hữu ích</button> <div class="huu-ich-box"> <div class="huu-ich-arrow"> <div><s></s><i></i></div> <div id="txtHuuIch_{{ReviewContentIdInt}}" class="huu-ich-count-box">{{UsefulCount}}</div> </div> </div> </div> </div> </div> <br/> </div> {{/if}} </div> <div class="customerrate" style="width: 15%; white-space: nowrap"> {{Rating}}<span class="spPer5">/5</span><br/> <span class="star"> <i class="fa fa-star {{reviewStarByRating Rating 1}}"></i> <i class="fa fa-star {{reviewStarByRating Rating 2}}"></i> <i class="fa fa-star {{reviewStarByRating Rating 3}}"></i> <i class="fa fa-star {{reviewStarByRating Rating 4}}"></i> <i class="fa fa-star {{reviewStarByRating Rating 5}}"></i> </span> <br/> {{#if ../isCanReply}} <span title="Trả lời đánh giá" class="lnkReplyReviews" parentid="{{Id}}" data-id="{{ReviewContentIdInt}}" show="true"><i class="fa fa-reply"></i>&nbsp;&nbsp;<span>Trả lời</span></span> {{/if}} </div> </div> {{#if ../isCanReply}} <div class="fb-google-api"> <div style="width: 75px; float: left; padding-top: 5px; position: relative" id="g_section_{{ReviewContentIdInt}}"> <div class="g-plusone" data-href="{{linkReviewHotel}}" data-size="medium"></div> </div> <div style="float: right; width: 120px; padding-top: 3px; margin-right: 5px; position: relative; z-index: {{subNum 10  @index}}"> <div class="fb-like" id="fb_btn_{{ReviewContentIdInt}}" data-href="{{linkReviewHotel}}&g={{../currentHotel.shortguidqstring}}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" data-width="70"></div> </div> </div> {{/if}} <div class="clear"></div> <div id="tool_review_{{ReviewContentIdInt}}" style="display: none;"></div> {{#each ReplyList}} <div class="divReplyReviews" style="width: 67%;"> <div id="ReplyReviewItem" class="ReplyReviewItem ri top-10" {{replyReviewLevel ThreadSortOrder}}> <div class="bottom-5 gray"> <b>{{ReviewedBy}}</b>- {{formatDate ReviewedDate "DD/MM/YYYY" null}} </div> <div style="color: #363535;" class="bottom-5 divReviewContent-{{ReviewContentIdInt}}"> {{{ContentVN}}} </div> <div class="bottom-5" style="height: 16px; float: right; margin-right: 10px;"> {{#if ../../isCanReply}} <span title="Trả lời đánh giá" class="lnkReplyReviews replyReviews" parentid="{{Id}}" show="true"> <i class="fa fa-reply"></i>&nbsp;&nbsp;<span>Trả lời</span> </span> {{/if}} <div class="clear"></div> </div> <div class="afterReply"></div> </div> </div> {{/each}}   <div class="listrote" style="border: none; height: 1px; padding: 0px 0px; margin: 0px 0px"></div> {{/each}} </div> <div class="divReplyControlTemp" style="display: none;"> <div class="row"> <div class="col-lg-6 col-lg-offset-0 text-center boxReplyControl"> <div class="panel ui-widget-content ui-corner-all ui-state-focus"> <div class="panel-body"> <input type="hidden" class="shortguidqstring" value="{{currentHotel.shortguidqstring}}"/> <input type="hidden" class="txtParentId" value=""/> <input type="hidden" class="txtHotelIdInt" value="{{currentHotel.hotelidint}}"/> <input type="hidden" class="txtHotelName" value="{{currentHotel.hotelname}}"/> <input type="hidden" class="txtStayDate" value="{{getDateTimeNow "DD/MM/YYYY" }}"/> <input type="hidden" class="txtReviewRating" value="3"/> <input type="hidden" class="txtSubject" value="Đánh giá khách sạn"/> <input type="hidden" class="txtReservationNumber" value=""/> <input type="hidden" class="txtReservationItemId" value=""/> <input type="hidden" class="txtCityName" value="{{currentHotel.cityname}}"/> <input type="hidden" class="txtCityTextId" value="{{currentHotel.citytextid}}"/> <div style="float: left; margin-right: 10px; text-align: left;" class="bottom-5"> <div> Họ tên </div> <div class="top-5"> <input id="txtFullNameReply" type="text" style="width: 150px; padding: 2px 4px;"class="txtFullNameReply ui-corner-all"/> <ul class="ulEror"> <li class="spnErrorFullName" style="display: none;">Vui lòng kiểm tra lại họ tên</li> </ul> </div> </div> <div style="float: left; text-align: left;" class="bottom-5"> <div> Email </div> <div class="top-5"> <input id="txtEmailReply" type="text" style="width: 260px; padding: 2px 4px;"class="txtEmailReply ui-corner-all"/> <ul class="ulEror"> <li class="spnErrorEmail" style="display: none;">Vui lòng kiểm tra lại email</li> </ul> </div> </div> <div class="clear"></div> <div style="text-align: left;" class="top-10"> Nội dung trả lời </div> <div class="top-5 ReplyContent"> <textarea id="txtContentReply" class="txtContentReply ui-corner-all"style="width: 422px; height: 150px; padding: 4px 4px;"></textarea> <ul class="ulEror"> <li class="spnErrorContentReply" style="display: none;">Vui lòng kiểm tra lại nội dung đánh giá </li> </ul> </div> <div style="text-align: right; width: 100%;" class="top-5"> <input type="button" class="btnAddReview button btn btn-info btn-lg" value="Gửi"/> <i id="btn-loading" class="fa fa-spinner fa-pulse fa-2x fa-fw margin-bottom"style="display: none"></i> </div> </div> </div> </div> </div> </div>';
          source +=  '<input type="hidden" id="hidappId" class="hidappId" value="{{appId}}"/> <div class="listrate" id="listrate"> {{#each reviewlist}} <div class="listrote ri" rcid="{{ReviewContentIdInt}}" style="padding: 30px 10px 20px 10px;"> <div class="customer" style="width: 15%"> <span class="nameauthor" style="text-align: left; overflow: hidden; max-height: 33px; max-width: 90px; line-height: 16px; margin: 5px 0; display: block">{{ReviewedBy}}</span> <span class="date"><em>{{formatDate ReviewedDate "DD/MM/YYYY" null }}</em></span> </div> <div class="customercm" style="width: 70%"> <a href="{{linkReviewHotel}}"> <span class="green">{{decodeHtml TitleVN}}</span></a><br/> <span class="italic">"{{{stripALink ContentVN }}}"</span> {{# compare TagLinkHtml "IsNullOrEmpty" null}} {{else}} <div class="top-10 bottom-5 gray small"> Từ khóa: {{{translateListLinkReviewHotel TagLinkHtml}}} </div> {{/compare}} <div style="margin-bottom: 10px;" > {{# if IsChiTietVisible}} <table class="mot-chi-tiet top-10"> {{#each ReviewDetailRateList}} <tr> <td> {{FacilityName}}</td> <td> <div class="thanh-chi-tiet"></div> <div style="width: {{Rating}}px;" class="thanh-muc-do"></div> </td> <td>{{FacilityName2}}</td> <td><div class="thanh-chi-tiet"></div> <div style="width: {{Rating2}}px;" class="thanh-muc-do"></div></td> </tr> {{/each}} </table> {{/if}} </div> <div class="review-photos afterReply" rel="{{Id}}" style="margin-bottom: 10px;"> {{#each Photos}} {{# compare Enabled "==" "1"}} <a reviewcontentid="{{../../Id}}" href="{{translateLink FileName}}?w=800&c=1"title="{{../../../currentHotel.hotelname}}" class="photo"> <img src="{{translateLink FileName}}?w=60" alt="{{../../../currentHotel.hotelname}}"></a> {{/compare}} {{/each}} </div> {{#if ../isCanReply}} <div class="tool-box" style="position: relative; margin-bottom: 20px; min-width: 515px;"><div> <div class="thanh-cong-cu"> <span class="huu-ich-text">Đánh giá này có hữu ích cho bạn? </span> <div class="huu-ich-layout"> <button id="btnHuuIch" class="huu-ich-button btn-success" data-used="false" data-id="{{ReviewContentIdInt}}">hữu ích</button> <div class="huu-ich-box"> <div class="huu-ich-arrow"> <div><s></s><i></i></div> <div id="txtHuuIch_{{ReviewContentIdInt}}" class="huu-ich-count-box">{{UsefulCount}}</div> </div> </div> </div> </div> </div> <br/> </div> {{/if}} </div> <div class="customerrate" style="width: 15%; white-space: nowrap"> {{Rating}}<span class="spPer5">/5</span><br/> <span class="star"> <i class="fa fa-star {{reviewStarByRating Rating 1}}"></i> <i class="fa fa-star {{reviewStarByRating Rating 2}}"></i> <i class="fa fa-star {{reviewStarByRating Rating 3}}"></i> <i class="fa fa-star {{reviewStarByRating Rating 4}}"></i> <i class="fa fa-star {{reviewStarByRating Rating 5}}"></i> </span> <br/> <span title="Trả lời đánh giá" class="lnkReplyReviews" parentid="{{Id}}" data-id="{{ReviewContentIdInt}}" show="true"><i class="fa fa-reply"></i>&nbsp;&nbsp;<span>Trả lời</span></span> </div> </div> {{#if ../isCanReply}} <div class="fb-google-api"> <div style="width: 75px; float: left; padding-top: 5px; position: relative" id="g_section_{{ReviewContentIdInt}}"> <div class="g-plusone" data-href="{{linkReviewHotel}}" data-size="medium"></div> </div> <div style="float: right; width: 120px; padding-top: 3px; margin-right: 5px; position: relative; z-index: {{subNum 10  @index}}"> <div class="fb-like" id="fb_btn_{{ReviewContentIdInt}}" data-href="{{linkReviewHotel}}&g={{../currentHotel.shortguidqstring}}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" data-width="70"></div> </div> </div> {{/if}} <div class="clear"></div> <div id="tool_review_{{ReviewContentIdInt}}" style="display: none;"></div> {{#each ReplyList}} <div class="divReplyReviews" style="width: 67%;"> <div id="ReplyReviewItem" class="ReplyReviewItem ri top-10" {{replyReviewLevel ThreadSortOrder}}> <div class="bottom-5 gray"> <b>{{ReviewedBy}}</b>- {{formatDate ReviewedDate "DD/MM/YYYY" null}} </div> <div style="color: #363535;" class="bottom-5 divReviewContent-{{ReviewContentIdInt}}"> {{{ContentVN}}} </div> <div class="bottom-5" style="height: 16px; float: right; margin-right: 10px;"> {{#if ../../isCanReply}} <span title="Trả lời đánh giá" class="lnkReplyReviews replyReviews" parentid="{{Id}}" show="true"> <i class="fa fa-reply"></i>&nbsp;&nbsp;<span>Trả lời</span> </span> {{/if}} <div class="clear"></div> </div> <div class="afterReply"></div> </div> </div> {{/each}}   <div class="listrote" style="border: none; height: 1px; padding: 0px 0px; margin: 0px 0px"></div> {{/each}} </div> <div class="divReplyControlTemp" style="display: none;"> <div class="row"> <div class="col-lg-6 col-lg-offset-0 text-center boxReplyControl"> <div class="panel ui-widget-content ui-corner-all ui-state-focus"> <div class="panel-body"> <input type="hidden" class="shortguidqstring" value="{{currentHotel.shortguidqstring}}"/> <input type="hidden" class="txtParentId" value=""/> <input type="hidden" class="txtHotelIdInt" value="{{currentHotel.hotelidint}}"/> <input type="hidden" class="txtHotelName" value="{{currentHotel.hotelname}}"/> <input type="hidden" class="txtStayDate" value="{{getDateTimeNow "DD/MM/YYYY" }}"/> <input type="hidden" class="txtReviewRating" value="3"/> <input type="hidden" class="txtSubject" value="Đánh giá khách sạn"/> <input type="hidden" class="txtReservationNumber" value=""/> <input type="hidden" class="txtReservationItemId" value=""/> <input type="hidden" class="txtCityName" value="{{currentHotel.cityname}}"/> <input type="hidden" class="txtCityTextId" value="{{currentHotel.citytextid}}"/> <div style="float: left; margin-right: 10px; text-align: left;" class="bottom-5"> <div> Họ tên </div> <div class="top-5"> <input id="txtFullNameReply" type="text" style="width: 150px; padding: 2px 4px;"class="txtFullNameReply ui-corner-all"/> <ul class="ulEror"> <li class="spnErrFullName" style="display: none;">Vui lòng kiểm tra lại họ tên</li> </ul> </div> </div> <div style="float: left; text-align: left;" class="bottom-5"> <div> Email </div> <div class="top-5"> <input id="txtEmailReply" type="text" style="width: 260px; padding: 2px 4px;"class="txtEmailReply ui-corner-all"/> <ul class="ulEror"> <li class="spnErrEmail" style="display: none;">Vui lòng kiểm tra lại email</li> </ul> </div> </div> <div class="clear"></div> <div style="text-align: left;" class="top-10"> Nội dung trả lời </div> <div class="top-5 ReplyContent"> <textarea id="txtContentReply" class="txtContentReply ui-corner-all"style="width: 422px; height: 150px; padding: 4px 4px;"></textarea> <ul class="ulEror"> <li class="spnErrContentReply" style="display: none;">Vui lòng kiểm tra lại nội dung đánh giá </li> </ul> </div> <div style="text-align: right; width: 100%;" class="top-5"> <input type="button" class="btnAddReview button btn btn-info btn-lg" value="Gửi"/> <i id="btn-loading" class="fa fa-spinner fa-pulse fa-2x fa-fw margin-bottom"style="display: none"></i> </div> </div> </div> </div> </div> </div>';
          var template = Handlebars.compile(source);
          var data = resp;
          Chudu24.Hotels.UserControls.CustomerReviewsHotel.hbsHelper();
          var strHTML = template(data);
          strHTML+= Chudu24.Hotels.UserControls.CustomerReviewsHotel.renderPaging(data.totalPage, PageNumber, false);
          $('div.CustomerReviews div.reviewUcConTrol').html(strHTML);
          //Chudu24.Hotels.UserControls.CustomerReviewsHotel.Events();
          $('div.review-photos').each(function () {
            if ($('a.photo', $(this)) != null && $('a.photo', $(this)).length > 0) {
              var ReviewContentId = $(this).attr('rel')
              $('div.review-photos a[reviewcontentid="' + ReviewContentId + '"]').colorbox({
                rel: ReviewContentId,
                onOpen: function () {
                  $('div.divVideo').hide();
                },
                onClosed: function () {
                  $('div.divVideo').show();
                }
              });
            }
          });
          Chudu24.Master.GenerateWrapLink();
          // Loading Facebook & g+
          gapi.plusone.go();
          // Catch exception để khi facebook bị cấm không gửi email
          try {
            // Khi thêm vào loading lại section facebook plugin
            FB.XFBML.parse($("div.CustomerReviews div.reviewUcConTrol").get(0));
          } catch (error) {
            //throw new Error("facebook error");
          }
        }
      });
    });
  },
  renderPaging: function (nTotalPage, nPageNum, isInit) {
    if(nTotalPage <= 10)
      return "";
    var _PageNum = (nPageNum == "..." ? 1 : parseInt(nPageNum));
    var _PageSize = 10;
    var _Pages = 0;
    var _Totals = nTotalPage;
    var Pages = 0;
    var PagesNextToCurrent = 1;
    var strPaging = '<br style="clear:both"/>';
    if (_Pages == 0) {
      try {
        _Pages = parseInt(_Totals / _PageSize);
        if ((_Totals % _PageSize) > 0)
          _Pages++;
      }
      catch (e) {
        Pages = 0;
      }
    }
    Pages = _Pages;//Pages =4.5;
    if (isInit == false) {
      strPaging += '<div class="paging-bottom-center" style="margin-top: 10px;"> ';
    }
    strPaging += '  <div id="afterReply"><div id="divPages">' +
      '<nav class="pagination-main" data-page-count="' + Pages + '">' +
      '<ul class="pagination">';
    strPaging += '<li class="' + ((_PageNum > 1 && Pages > 1) ? "page" : "disabled") + '" title="' + ((_PageNum > 1 && Pages > 1) ? "Xem trang trước đó" : "") + '">' +
      '<a href="javascript:;" aria-label="Previous">' +
      '<i class="fa fa-chevron-left"></i>' +
      '</a>' +
      '</li>';
    for (var p = 1; p <= Pages; ++p) {
      if (p == 1 || p == _PageNum || p == Pages || (p >= (_PageNum - PagesNextToCurrent) && p < _PageNum) || (p <= (_PageNum + PagesNextToCurrent) && p > _PageNum) || (p == 2 && p == (_PageNum - PagesNextToCurrent - 1)) || (p == (Pages - 1) && p == (_PageNum + PagesNextToCurrent + 1))) {
        strPaging += '<li class="page ' + (p == _PageNum ? "active" : "" ) + '"><a href="javascript:;">' + p + '</a></li>';
      }
      else if (p == (_PageNum - (PagesNextToCurrent + 1)) || p == (_PageNum + (PagesNextToCurrent + 1))) {
        strPaging += '<li class="page"><a href="javascript:;">...</a></li>';
      }
    }
    strPaging += '<li class="' + ((_PageNum < Pages && Pages > 1) ? "page" : "disabled") + '" title="' + ((_PageNum < Pages && Pages > 1) ? "Xem trang tiếp theo" : "") + '">' +
      '<a href="javascript:;" aria-label="Next">' +
      '<i class="fa fa-chevron-right"></i>' +
      '</a>' +
      '</li>' +
      '</ul>' +
      '</nav>' +
      '</div></div>';
    if (isInit == false) {
      strPaging += "</div>";
    }
    return strPaging;
  },
  PageMoreReview: function (_HotelIdInt, _ReviewIdIntFilter, _this, _HotelTextId) {
    Chudu24.Hotels.UserControls.CustomerReviewsHotel.scrollingTo_v2($(_this.parent()), 10, function () {
      $(_this).html($('#loading').clone(true).show());
      var url = "/v2/Hotels/ReviewDetails.aspx";
      $.ajax(url, {
        method: 'post',
        data: {
          ajax: "moreview",
          HotelIdInt: _HotelIdInt,
          HotelTextId: _HotelTextId,
          ReviewIdIntFilter: _ReviewIdIntFilter
        },
        success: function (resp) {
          // set attr show of lnkReplyReviews in this scop to true
          $('span.lnkReplyReviews', _this.closest('div.ri')).attr('show', true);
          // Nhan data
          var more = $('<div></div>').html(resp).children();
          var _html_fb_google = $("div.fb-google-api", more).html();
          var divReplyReviews = $("div.divReplyReviews", more).html();
          var index = (100 - $("div.ri").index(_this.closest('div.ri')));
          // Cap nhat facebook va google+
          if ($(".fb-google-api", _this.closest('div.ri')).length > 0) {
            // facebook va google+ trang chu chudu.vn
            $(".fb-google-api", _this.closest('div.ri')).html(_html_fb_google);
            $(".fb-google-api", _this.closest('div.ri')).css({ 'z-index': index });
            // Cap nhat Tra loi danh gia trang chu chudu.vn
            if ($.trim(divReplyReviews).length > 0) {
              var listratehomereply = _this.closest('div.ri').nextAll('.listratehomereply:first');
              //console.log("listratehomereply", listratehomereply.length);
              if (listratehomereply.length > 0) {
                //console.log("divReplyReviews", $(".divReplyReviews", listratehomereply).length);
                $(".divReplyReviews", listratehomereply).html(divReplyReviews).show();
                listratehomereply.slideDown();
              }
            }
            ;
          }
          else {
            // facebook va google+ trang chu chudu.vn
            _this.closest('div.ri').after('<div class="fb-google-api" style="display: none; z-index:' + index + '">' + _html_fb_google + '</div>');
            // Cap nhat tra loi danh gia
            if ($.trim(divReplyReviews).length > 0) {
              _this.closest('div.ri').nextAll('.divReplyReviews:first').html(divReplyReviews).slideDown();
            }
            ;
          }
          var fb_google = ($(".fb-google-api", _this.closest('div.ri')).length > 0) ? $(".fb-google-api", _this.closest('div.ri')) : _this.closest('div.ri').nextAll('.fb-google-api:first');
          // Cap nhat lai thanh huu ich
          var _html = $("div.customercm", more).html();
          $(_this).parent().hide();
          $(_this).parent().html(_html).slideDown();
          if (fb_google.length > 0) {
            // Loading Facebook & g+
            gapi.plusone.go();
            // Catch exception để khi facebook bị cấm không gửi email
            try {
              // Khi thêm vào loading lại section facebook plugin
              FB.XFBML.parse($("div.CustomerReviews div.reviewUcConTrol").get(0));
            } catch (error) {
              //throw new Error("facebook error");
            }
            fb_google.fadeIn(1000);
          }
        }
      });
    });
  },
  scrollingTo_v2: function (target, offset, callback) {
    if (target) {
      var calledBack = false;
      $('html, body').animate({
          scrollTop: (target.offset().top - offset)
        },
        {
          complete: function () {
            if (calledBack != true && callback) {
              callback();
              calledBack = true;
            }
          }
        }
      );
      return false;
    }
  },//srollingTo
  facebook_googleplus: function () {
    if (document.getElementById("hidappId") != null) {
      //facebook & Google+ must be out of function load.
      try {
      //facebook SDK
        var hidappId = document.getElementById("hidappId").value;
        (function (d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=" + hidappId + "&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      } catch (error) {
      }
      try {
        //google plus
        window.___gcfg = { lang: 'vi' };
        (function () {
          var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
          po.src = 'https://apis.google.com/js/platform.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
      } catch (error) {
      }
    }
  }
};
$(function () {
  var thisObj = Chudu24.Hotels.UserControls.CustomerReviewsHotel;
  thisObj.Init();
});
