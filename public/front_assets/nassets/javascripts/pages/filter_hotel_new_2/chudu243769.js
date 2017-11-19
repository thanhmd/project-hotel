if (typeof Chudu24 == "undefined")
  var Chudu24 = {};
if (typeof Chudu24.Hotels == "undefined")
  Chudu24.Hotels = {};
if (typeof Chudu24.Hotels.SearchHotel == "undefined")
  Chudu24.Hotels.SearchHotel = {};
Chudu24.Hotels.key_reload = 'city_load';

Chudu24.Hotels.SearchHotel = {
  querystring: "&isresort=&promotion=&star=&minrate=&attraction=&facility=",
  sigtipSettings: {
    tipId: '__sigtip',
    content: function (element) {
      var title = element.attr('__sigtip_content');

      if (!title) {
        element.attr('__sigtip_content', element.attr('title'));
        element.attr('title', '');
      }

      return element.attr('__sigtip_content');
    },
    position: ['left', 'inner-top'],
    showDelay: 0,
    hideDelay: 300,
    maxWidth: 500,
    maxHeight: -1,
    offsetX: 0,
    offsetY: 0
  },
  Init: function () {
    var thisObj = Chudu24.Hotels.SearchHotel;

    thisObj.Tools.InitCriteo();
    thisObj.Events.Common();
    thisObj.Events.BookingButtons();
    if (Chudu24.Master.enable_crsf === true) {
      Chudu24.Master.renderkeysignature();
      if (Chudu24.Master.is_reload == true) {
        var key_tag = "#search-result .hotel-price-box._hotel_[hotel_id] #clickbestpricebooking";
        Chudu24.Master.reloadFormBooking(Chudu24.Hotels.key_reload, key_tag);
      }
    }

    // thisObj.Events.Paging();
    // thisObj.Events.OrderBy();
    // thisObj.Events.FilterPanel();
    thisObj.Tools.ShowFacebookBar();

    var hash = document.location.hash;
    if (hash.substring(1, hash.length) != "") {
      thisObj.Tools.SetParamFilterFromHash();
    }
    else {
      Chudu24.Master.LazyLoadingImgMaster();
      thisObj.Tools.GetMinRatesByHotelIdInt();
    }
    /** Call Reload MinRate Hotel  **/
    Chudu24.Hotels.SearchHotel.getMinRateAllCurrentHotel();
    Chudu24.Master.getCsrfToken(Chudu24.Hotels.SearchHotel.FunctionsDependOnLoadToken);
  },
  Events: {
    Common: function () {
// Tooltip
      $('div.badge-popular').tooltip();
      $('.hotel-price-box .clicklaygia').tooltip();

// smoothly scrool
      $('a[href*=#]:not([href=#])').unbind('click').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = $(this.hash);
          var targetName = target.length ? this.hash : this.hash.slice(1);
          Chudu24.Hotels.SearchHotel.Tools.ScrollingTo($('[name=' + targetName + ']'));
        }
      });

      $(document).on('click', '.page-body a.lnkMap', function () {
        var HotelName = $(this).parents('.hotel-item').attr('hotel-name');
        ga('send', 'event', 'KSTheoThanhPho', 'XemBanDo', HotelName);
        return true;
      })
      $(document).on('click', '.page-body a.lnkReview', function () {
        var HotelName = $(this).parents('.hotel-item').attr('hotel-name');
        ga('send', 'event', 'KSTheoThanhPho', 'XemDanhGia', HotelName);
        return true;
      })
    },//common


    BookingButtons: function () {
//Booking
//$(document).on('click', '#search-result .btnReser', function (e) {
//    if (!$(this).hasClass("Choupon")) {
//        e.preventDefault();
//        var CheckInDate = Chudu24.Hotels.SearchHotel.Tools.GetArrivalDate();
//        var CheckOutDate = Chudu24.Hotels.SearchHotel.Tools.GetDepartureDate();
//        var HotelIdInt = $(this).closest('.hotel-item').attr("idint");
//        var HotelName = $(this).closest('.hotel-item').attr("hotel-name");
//        ga('send', 'event', 'KSTheoThanhPho', 'DatPhong', HotelName);
//        window.location = "/V2/Hotels/Reservation.aspx?HotelIdInt=" + HotelIdInt
//        + "&ArrivalDate=" + escape(CheckInDate)
//        + "&DepartureDate=" + escape(DepartureDate)
//        ;
//    }
//});

// BGT
      $(document).on('click', '#search-result .clicklaygia', function (e) {

        if ($.GetCookie('CustomerEmailBGT') != undefined || (!$.isEmpty($.GetCookie('CustomerEmailBGT')))) {
          $('#divBGT #txtBGTEmail').val($.GetCookie('CustomerEmailBGT'));
        } else {
          $('#divBGT #txtBGTEmail').val('');
        }

        if ($.GetCookie('CustomerMobileBGT') != undefined || (!$.isEmpty($.GetCookie('CustomerMobileBGT')))) {
          $('#divBGT  #txtBGTMobile').val($.GetCookie('CustomerMobileBGT'));
        } else {
          $('#divBGT #txtBGTMobile').val('');
        }

        var _selft = $(this).closest('.hotel-item');
        var _hotelId = $(this).closest('.hotel-item').attr('idint');
        var _hotelName = $(this).closest('.hotel-item').attr('hotel-name');
        var _signature = $(this).closest('.hotel-item').attr('signature');
        var _dia = $('#divBGT').clone(true).show();
        var _title = _dia.attr('title');
        ga('send', 'event', 'Tracking-bookgiatot', 'tracking-clicklaygia', _hotelName + '-' + _hotelId + '-laygia');
        Chudu24Tracking.saveTracking(['Tracking-bookgiatot', 'tracking-clicklaygia', _hotelName, _hotelId, 'click', 'pc']);
        Chudu24.Master.verifySignature(_hotelId, _signature, Chudu24.Hotels.key_reload, _selft);
        var _dialog = _dia.dialog({
          open: function (event, ui) {
            Chudu24Tracking.saveTracking(['Tracking-bookgiatot', 'tracking-clicklaygia', _hotelName, _hotelId, 'open', 'pc']);
            ga('send', 'event', 'Tracking-bookgiatot', 'tracking-open', _hotelName + '-' + _hotelId + '-openpp');
          },
          width: 600,
          title: _title,
          modal: true,
          create: function (event, ui) {
            var _this = $(event.target);
            if ($("button", $(".ui-dialog-titlebar", _this.parent())).length > 0) {
              $("button", $(".ui-dialog-titlebar", _this.parent())).before('<a href="#" role="button">Đóng</a>');
            }
            else {
              $(".ui-dialog-titlebar", _this.parent()).append('<a href="#" role="button">Đóng</a>');
            }
            $("a[role='button']", $(".ui-dialog-titlebar", _this.parent())).click(function (e) {
              e.preventDefault();
              _this.dialog("close");
            });
          }
        });
        ga('send', 'event', 'KSTheoThanhPho', 'ClickDeLayGia', _hotelName);
        $('#btnBGTSubmit', _dialog).unbind('click').click(function (e) {
          var _crsfToken = _selft.attr('_crtoken');
          var _email = $('#txtBGTEmail', _dialog).val().trim();
          $('.help-block1', _dia).remove();
          if (_email.length <= 0 || $.IsValid_Email(_email) != true) {
            $('#txtBGTEmail', _dialog).addClass('error1');
            $('#txtBGTEmail', _dia).after('<span class="help-block1">- Vui lòng nhập email </span>');
          } else {
            $('#txtBGTEmail', _dialog).removeClass('error1');
          }
          ga('send', 'event', 'KSTheoThanhPho', 'SubmitClickDeLayGia', _hotelName);

          var _mobile = $('#txtBGTMobile', _dialog).val().trim();
          //if (_mobile.length <= 0 || $.IsValid_Phone(_mobile) != true) {
          if ($.isEmpty(_mobile) || $.IsValid_Phone(_mobile) != true) {
            $('#txtBGTMobile', _dialog).addClass('error1'); 
            $('#txtBGTMobile', _dia).after('<span class="help-block1">- Vui lòng nhập số di động </span>');
          } else {
            $('#txtBGTMobile', _dialog).removeClass('error1');
          }
          ga('send', 'event', 'Tracking-bookgiatot', 'tracking-submitBookGiaTot', _hotelName + '-' + _hotelId + '-submit');
          Chudu24Tracking.saveTracking(['Tracking-bookgiatot', 'tracking-submitBookGiaTot', _hotelName, _hotelId, 'submit', 'pc']);
          if ($('.error1', _dialog).length <= 0) {
            $(this).prop('disabled', 'disabled');
            $('i', this).addClass("fa-spinner fa-spin");

            Chudu24.MI_HAWK.saveBestPrice(_hotelId,_hotelName);
            //Chudu24.Hotels.SearchHotel.Tools.GuiEmailBaoGia(_hotelId, _hotelName, _email, _mobile, _dia);
            if (Chudu24.Master.enable_crsf === true)
              Chudu24.Master.GuiEmailBaoGiaV2_crsf(_hotelId, _hotelName, _email, _mobile, _dia, _crsfToken, _signature, Chudu24.Hotels.key_reload);
            else
              Chudu24.Master.GuiEmailBaoGiaV2(_hotelId, _hotelName, _email, _mobile, _dia);
          }
        });
      });

      /** View Price Detail V3 **/
      $(document).on('click', '#search-result .btnPriceDetail', function (e) {
        e.preventDefault();
        var _detaiDiv = $(this).closest('.hotel-item').find('.hotel-price-detail:first');
        _detaiDiv.html($('#loading').clone(true).show()).show();

        var _checkInDate = Chudu24.Hotels.SearchHotel.Tools.GetArrivalDate();
        var _checkOutDate = Chudu24.Hotels.SearchHotel.Tools.GetDepartureDate();
        var _hotelIdInt = $(this).closest('.hotel-item').attr("idint");
        var crsfToken = '';
        if (Chudu24.Master.enable_crsf == true) {
          crsfToken = $(this).closest('.hotel-item').attr("_crtoken");
        }
        var _signature = '';
        if (Chudu24.Master.enable_crsf == true) {
          _signature = $(this).closest('.hotel-item').attr("signature");
        }
        var _hotelName = $(this).closest('.hotel-item').attr('hotel-name');
        var _isShowPrice = $(this).attr('isshowprice');
        var _isShowPromotionPrice = $(this).attr('isshowpromotionprice');
        var _showPriceType = $(this).attr('showpricetype');

        ga('send', 'event', 'KSTheoThanhPho', 'XemChiTietGiaPhong', _hotelName);
        ga('send', 'event', 'Danh Sach Khach San - Xem chi tiet gia phong', $('#params').attr('textid'), _hotelName);

        // Set Cookie checkInDate, checkOutDate
        $.SetCookie('CheckInDate', _checkInDate, 1, '.chudu24.com');
        $.SetCookie('CheckOutDate', _checkOutDate, 1, '.chudu24.com');
        Chudu24.Hotels.SearchHotel.getAndAppendDetailRoomRateOneHotel($(this), _hotelIdInt, _checkInDate, _checkOutDate, _hotelName, crsfToken, _signature, function (err, result) {
          if (err) {
            var errMessage = err.stack ? err.stack : 'Có lỗi xảy ra.';
            Chudu24.Hotels.SearchHotel.Tools.ScrollingTo($('body'), 0, function () {
              Chudu24.Notification.Message("error", errMessage, "Lỗi tìm kiếm");
            });
          }
          else {
            if ($.GetCookie('CustomerEmailBGT') != undefined || (!$.isEmpty($.GetCookie('CustomerEmailBGT')))) {
              $('#divBGT #txtBGTEmail').val($.GetCookie('CustomerEmailBGT'));
            } else {
              $('#divBGT #txtBGTEmail').val('');
            }

            if ($.GetCookie('CustomerMobileBGT') != undefined || (!$.isEmpty($.GetCookie('CustomerMobileBGT')))) {
              $('#divBGT  #txtBGTMobile').val($.GetCookie('CustomerMobileBGT'));
            } else {
              $('#divBGT #txtBGTMobile').val('');
            }
            /** Láy giá thành công **/
          }
        });
      });
    },
    /**
     * getHtmlHotelPriceDetailsV3
     * @param data
     * @param hotelName
     * @returns {string}
     */
    getHtmlHotelPriceDetailsV3: function (data, hotelName) {

      var resultHtml = '', roomHtml = '';
      if (data) {
        // get html price details
        resultHtml = '<table class="search-result-roomtype" style="width: 100%">\
      <tr class="search-result-row-header-single">\
      <th class="room quiet">Phòng</th>\
      <th class="totalnight quiet">\
      Giá 1 đêm<br/><span class="small" style="font-weight:normal;color:#aaa;">(giá 1 phòng, bao gồm thuế)</span>\
      </th>\
      <th class="memberdiscount {0}">\
      {1}\
      </th>\
      <th class="bookroom">\
        <img src="/nassets/assets/images/cross.png" class="close" />\
        </th>\
      </tr>\
      <div id="divRate2" visible="false"></div>\
      [/ROOMS]\
      <tr class="search-result-row-item-single">\
        <td class="room1 green" style="font-weight: normal; font-style: italic; padding-bottom: 10px;padding-top: 10px;" colspan="4">\
            <div id="divKhongApDungVoiKhuyenMaiKhac" runat="server" style="text-align:center;margin:5px 0;background-color:#fff;color: #888888;font-size: 8pt;font-style: italic;">Khách sạn thuộc chuỗi sản phẩm siêu tiết kiệm, không áp dụng chung với các khuyến mãi hay ưu đãi giảm giá khác</div>\
            </td></tr>\
      </table>';

        // get html rooms
        if (data.arrLoaiPhong && data.arrLoaiPhong.length > 0) {
          var getHtmlRoomsV3 = function (arrRoom, hotelName) {

            var htmlResult = '', html = '', locale = 'vi-VN';

            var divKhongApDung = '<div id="divKhongApDung" class="SigTip" title="Thời gian bạn chọn không được áp dụng cho loại giá này."><span class="blue" style="font-size: 12px;text-align: right;padding-right: 20px;">Không áp dụng</span></div>';

            var divNoRate = '<div id="divNoRate" class="divNoRate SigTip" title="Chudu24 tự hào mang đến khách hàng mức giá thấp tại hàng loạt các khách sạn đối tác Vàng của Chudu24. Tuy nhiên mức giá này không áp dụng cho các đặt phòng trực tuyến. Để có được mức giá thấp, xin vui lòng đặt phòng qua tổng đài 1900 5454 40 hoặc gởi yêu cầu cho chúng tôi."></div>';

            var divPhoneRate = '<div id="divNoRate" class="divNoRate SigTip" title="Chudu24 tự hào mang đến khách hàng thành viên mức giá thấp tại hàng loạt các khách sạn đối tác Vàng của Chudu24. Tuy nhiên mức giá này không áp dụng cho các đặt phòng trực tuyến. Để có được mức giá thấp, xin vui lòng đặt phòng qua tổng đài 1900 5454 40 hoặc gởi yêu cầu cho chúng tôi."></div>';

            var divHasRateButNoShow = '<div id="divHasRateButNoShow" class="SigTip" title="Giá rất tốt tại khách sạn này không được công bố trên website, vui lòng click và điền địa chỉ email để nhận báo giá"><div style="float:left;">' +
              '<div class="divClickDeLayGiaText mihawk-view-best-price">Click Để Lấy Giá</div></div>' +
              '<div style="font-weight: normal; font-size: .7em; float: left; margin-top: 3px;" class="blue">tại sao?</div><div class="clear"></div></div>';

            if (arrRoom && arrRoom.length > 0) {

              arrRoom.forEach(function (roomObj, index, array) {
                if (roomObj.isDisplayLoaiGia) {
                  var breakfastIncluded = roomObj.IsBreakfastIncluded ? ' <span style="font-size:8pt;white-space:nowrap;color:#aaa;">(bao gồm ăn sáng)</span>' : '';
                  var hotelIdInt = roomObj.HotelIdInt ? roomObj.HotelIdInt : 0;
                  var roomTypeIdInt = roomObj.RoomTypeIdInt ? roomObj.RoomTypeIdInt : 0;
                  var roomName = '' + roomObj.RoomName + '-' + roomObj.TenLoaiGia;
                  var minrate = roomObj.averageRateDeal ? roomObj.averageRateDeal : 0;// minRateDeal
                  var normalRateExtra = roomObj.NormalRateExtra ? roomObj.NormalRateExtra : 0;

                  /** KHUYEN MAI: Orange **/
                  if (roomObj.IsHighlight) {
                    roomName = '<b style="color: orange;">' + roomName +'</b>';
                  }
                  var bookLink = roomObj.isKhongApDung ? '' : $.string.Format('<a class="lnkBookHotel mihawk-detail-hotel clearfix" href="{0}" rel="nofollow">Đặt Phòng</a>', Chudu24.Hotels.SearchHotel.Events.getLinkHotelInNodeJs(hotelIdInt, hotelName) + '#datphong');
                  if (!roomObj.isBookablePromotion)
                    bookLink = '<div id="divKhongApDung" class="SigTip" title="Giai đoạn bạn chọn không được áp dụng."><span class="blue" style="font-size: 12px;">Không áp dụng</span></div>';
                  html = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.ROOMS,
                    roomName,
                    breakfastIncluded,
                    '',
                    bookLink
                  );

                  // Check Shpw Price Room
                  if (roomObj.isKhongApDung) {
                    html = html.replace('[/SHOW_PRICE_ROOM]', divKhongApDung);
                  }
                  else {
                    if (minrate > 0) {
                      if (roomObj.isDisplayBGT) {
                        html = html.replace('[/SHOW_PRICE_ROOM]', divHasRateButNoShow);
                      } else if (roomObj.isDisplayPhone) {
                        html = html.replace('[/SHOW_PRICE_ROOM]', divPhoneRate);
                      }
                      else {
                        minrate = Math.ceil(parseFloat(minrate) / 1000);

                        var divRate = '<div id="divRate" class="top-10 bottom-5" style="text-align: right; padding-right: 20px;">' + minrate.toLocaleString(locale) +
                          '<span class="thd">.000</span>';
                        html = html.replace('[/SHOW_PRICE_ROOM]', divRate);
                      }
                    }
                    else
                      html = html.replace('[/SHOW_PRICE_ROOM]', divNoRate);
                  }

                  htmlResult += html;
                }
              });
            }

            return htmlResult;
          };
          var arrLoaiGia = [];
          data.arrLoaiPhong.forEach(function (itemRoomBase) {
            if (itemRoomBase.arrLoaiGia && itemRoomBase.arrLoaiGia.length > 0) {
              //arrLoaiGia = [...arrLoaiGia, ...itemRoomBase.arrLoaiGia];
              itemRoomBase.arrLoaiGia.forEach(function (itemLoaiGia) {
                if (itemLoaiGia.isDisplayLoaiGiaByLevel) {
                  arrLoaiGia.push(itemLoaiGia);
                }
              });
            }
          });
          //arrLoaiGia.sortBy("HighlightSort", "averageRateDealSort", "RoomName", "TenLoaiGia");
          roomHtml += getHtmlRoomsV3(arrLoaiGia, hotelName);

        }

        //replace template
        resultHtml = resultHtml.replace('[/ROOMS]', roomHtml);
      }

      return resultHtml;
    },

    /**
     * getHtmlHotelPriceDetails
     * @param data
     * @param hotelName
     * @returns {string}
     */
    getHtmlHotelPriceDetails: function (data, hotelName, isShowPrice, showPriceType, isShowPromotionPrice) {

      var resultHtml = '', chouponHtml = '', promotionHtml = '', roomHtml = '';
      if (data) {
        try {
          if (typeof isShowPrice == 'string')
            isShowPrice = JSON.parse(isShowPrice);
        } catch (ex) {
          isShowPrice = false;
        }
        try {
          if (typeof isShowPromotionPrice == 'string')
            isShowPromotionPrice = JSON.parse(isShowPromotionPrice);
        } catch (ex) {
          isShowPromotionPrice = false
        }

        // get html price details
        resultHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.PRICE_DETAILS);

        // get html choupons
        if (data.choupons && data.choupons.length > 0)
          chouponHtml = Chudu24.Hotels.SearchHotel.Events.getHtmlChoupons(data.choupons, hotelName, isShowPromotionPrice);

        // get html promotions
        if (data.promotions && data.promotions.length > 0)
          promotionHtml = Chudu24.Hotels.SearchHotel.Events.getHtmlPromotions(data.promotions, hotelName, isShowPromotionPrice);

        // get html rooms
        if (data.roomtypeInfo && data.roomtypeInfo.length > 0)
          roomHtml = Chudu24.Hotels.SearchHotel.Events.getHtmlRooms(data.roomtypeInfo, hotelName, isShowPrice, showPriceType);

        if (roomHtml != '')
          roomHtml += '<tr class="search-result-row-item-single">' +
            '<td class="room1 green" style="font-weight: normal; font-style: italic; padding-bottom: 10px;padding-top: 10px;" colspan="4">' +
            '<div id="divKhongApDungVoiKhuyenMaiKhac" runat="server" style="text-align:center;margin:5px 0;background-color:#fff;color: #888888;font-size: 8pt;font-style: italic;">Khách sạn thuộc chuỗi sản phẩm siêu tiết kiệm, không áp dụng chung với các khuyến mãi hay ưu đãi giảm giá khác</div>' +
            '</td></tr>';


        //replace template
        resultHtml = resultHtml.replace('[/CHOUPONS]', chouponHtml);
        resultHtml = resultHtml.replace('[/PROMOTIONS]', promotionHtml);
        resultHtml = resultHtml.replace('[/ROOMS]', roomHtml);

        //<%# RateNotes%>
        /*resultHtml += '<tr class="search-result-row-item-single">' +
         '<td class="room1 green" style="font-weight: normal; font-style: italic; padding-bottom: 10px;padding-top: 10px;" colspan="4">' +
         '<div id="divKhongApDungVoiKhuyenMaiKhac" runat="server" style="text-align:center;margin:5px 0;background-color:#fff;color: #888888;font-size: 8pt;font-style: italic;">Khách sạn thuộc chuỗi sản phẩm siêu tiết kiệm, không áp dụng chung với các khuyến mãi hay ưu đãi giảm giá khác</div>' +
         '</td></tr>';*/
      }

      return resultHtml;
    },
    /**
     * getHtmlChoupons
     * @param arrChoupon
     * @returns {string}
     */
    getHtmlChoupons: function (arrChoupon, hotelName, isShowPromotionPrice) {

      var htmlResult = '', html = '';
      var enabledV2 = false;
      if (!$.isEmpty(arrChoupon) && !$.isEmpty(arrChoupon[0]) && !$.isEmpty(arrChoupon[0].RoomName))
        enabledV2 = true;

      if (arrChoupon && arrChoupon.length > 0) {
        arrChoupon.forEach(function (chouponObj, index, array) {

          var isPrivacyPublic = chouponObj.IsPrivacyPublic ? chouponObj.IsPrivacyPublic : false;
          var chouponId = chouponObj.ChouponId ? chouponObj.ChouponId : 0;
          var chouponName = chouponObj.ChouponName ? chouponObj.ChouponName : 0;
          var buyPrice = chouponObj.BuyPrice ? chouponObj.BuyPrice : 0;
          buyPrice = parseFloat(buyPrice) / 1000;

          var linkChoupon = '//choupon.chudu24.com/khachsan/' + chouponId + '/' + Chudu24.Core.MakeLinkFromUnicode(chouponName) + '.html';
          var title = 'Giá rất tốt tại khách sạn này không được công bố trên website, vui lòng click và điền địa chỉ email để nhận báo giá';

          if (enabledV2) {
            var averageRateDeal = chouponObj.averageRateDeal ? chouponObj.averageRateDeal : 0;// minRateDeal
            isPrivacyPublic = isShowPromotionPrice && averageRateDeal > 0;
            if (isPrivacyPublic)
              linkChoupon = Chudu24.Hotels.SearchHotel.Events.getLinkHotelInNodeJs(chouponObj.HotelIdInt, hotelName) + '#datphong';
          }

          if (isPrivacyPublic)
            html = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.CHOUPONS_PUBLIB,
              linkChoupon,
              chouponName,
              buyPrice.toLocaleString('vi-VN'),
              linkChoupon,
              enabledV2 ? 'style="color: orange;"' : ''
            );

          else
            html = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.CHOUPONS_PRIVATE,
              chouponName,
              title,
              enabledV2 ? 'style="color: orange;"' : '',
              Chudu24.Hotels.SearchHotel.Events.getLinkHotelInNodeJs(chouponObj.HotelIdInt, hotelName) + '#datphong'
            );

          htmlResult += html;
        });
      }

      return htmlResult;
    },
    /**
     * getHtmlPromotions
     * @param arrPromotion
     * @param hotelName
     * @returns {string}
     */
    getHtmlPromotions: function (arrPromotion, hotelName, isShowPromotionPrice) {

      var htmlResult = '', html = '', locale = 'vi-VN';
      var enabledV2 = false;
      if (!$.isEmpty(arrPromotion) && !$.isEmpty(arrPromotion[0]) && !$.isEmpty(arrPromotion[0].RoomName))
        enabledV2 = true;

      var divNoRate = '<div id="divNoRate" class="divNoRate SigTip" title="Chudu24 tự hào mang đến khách hàng mức giá thấp tại hàng loạt các khách sạn đối tác Vàng của Chudu24. Tuy nhiên mức giá này không áp dụng cho các đặt phòng trực tuyến. Để có được mức giá thấp, xin vui lòng đặt phòng qua tổng đài 1900 5454 40 hoặc gởi yêu cầu cho chúng tôi."></div>';

      var divHasRateButNoShow = '<div id="divHasRateButNoShow" class="SigTip" title="Giá rất tốt tại khách sạn này không được công bố trên website, vui lòng click và điền địa chỉ email để nhận báo giá"><div style="float:left;">' +
        '<div class="divClickDeLayGiaText">Click Để Lấy Giá</div></div>' +
        '<div style="font-weight: normal; font-size: .7em; float: left; margin-top: 3px;" class="blue">tại sao?</div><div class="clear"></div></div>';

      if (arrPromotion && arrPromotion.length > 0) {
        arrPromotion.forEach(function (promotionObj, index, array) {

          var hotelIdInt = promotionObj.HotelIdInt ? promotionObj.HotelIdInt : 0;
          var hotelTextId = Chudu24.Core.MakeLinkFromUnicode(hotelName);
          var promoId = promotionObj.Id ? promotionObj.Id : '';
          var promoName = promotionObj.Name ? promotionObj.Name : '';
          var pricePerNight = promotionObj.PricePerNightVnd ? promotionObj.PricePerNightVnd : '';
          //var linkBookingUrl = '//khachsan.chudu24.com/V2/Hotels/Reservation.aspx?HotelIdInt=' + hotelIdInt + '&PromotionId=' + promoId; //
          var linkBookingUrl = Chudu24.Hotels.SearchHotel.Events.getLinkHotelInNodeJs(promotionObj.HotelIdInt, hotelName) + '#datphong';


          html = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.PROMOTIONS,
            hotelIdInt,
            hotelTextId,
            promoName,
            '',
            linkBookingUrl,
            enabledV2 ? 'style="color: orange;"' : '',
            enabledV2 ? 'color: orange;' : ''
          );

          // Check Shpw Price Room
          if (isShowPromotionPrice) {

            if (pricePerNight > 0) {

              pricePerNight = parseFloat(pricePerNight) / 1000;
              var divRate = '<div id="divRate" class="top-10 bottom-5" style="text-align: right; padding-right: 20px;">' + pricePerNight.toLocaleString(locale) +
                '<span class="thd">.000</span>';

              html = html.replace('[/SHOW_PRICE_PROMOTION]', divRate);
            }

            else
              html = html.replace('[/SHOW_PRICE_PROMOTION]', divNoRate);
          } else {

            if (pricePerNight > 0)
              html = html.replace('[/SHOW_PRICE_PROMOTION]', divHasRateButNoShow);

            else
              html = html.replace('[/SHOW_PRICE_PROMOTION]', divNoRate);
          }

          htmlResult += html;
        });
      }

      return htmlResult;
    },
    /**
     * getHtmlRooms
     * @param arrRoom
     * @param hotelName
     * @returns {string}
     */
    getHtmlRooms: function (arrRoom, hotelName, isShowPrice, showPriceType) {

      var htmlResult = '', html = '', locale = 'vi-VN';

      var divNoRate = '<div id="divNoRate" class="divNoRate SigTip" title="Chudu24 tự hào mang đến khách hàng mức giá thấp tại hàng loạt các khách sạn đối tác Vàng của Chudu24. Tuy nhiên mức giá này không áp dụng cho các đặt phòng trực tuyến. Để có được mức giá thấp, xin vui lòng đặt phòng qua tổng đài 1900 5454 40 hoặc gởi yêu cầu cho chúng tôi."></div>';

      var divHasRateButNoShow = '<div id="divHasRateButNoShow" class="SigTip" title="Giá rất tốt tại khách sạn này không được công bố trên website, vui lòng click và điền địa chỉ email để nhận báo giá"><div style="float:left;">' +
        '<div class="divClickDeLayGiaText">Click Để Lấy Giá</div></div>' +
        '<div style="font-weight: normal; font-size: .7em; float: left; margin-top: 3px;" class="blue">tại sao?</div><div class="clear"></div></div>';

      if (arrRoom && arrRoom.length > 0) {

        // sort array room
        arrRoom = arrRoom.sort(Chudu24.Hotels.SearchHotel.Events.dynamicSort('averageRateDeal'));// minRateDeal

        arrRoom.forEach(function (roomObj, index, array) {

          var breakfastIncluded = roomObj.IsBreakfastIncluded ? ' <span style="font-size:8pt;white-space:nowrap;color:#aaa;">(bao gồm ăn sáng)</span>' : '';
          var hotelIdInt = roomObj.HotelIdInt ? roomObj.HotelIdInt : 0;
          var roomTypeIdInt = roomObj.RoomTypeIdInt ? roomObj.RoomTypeIdInt : 0;
          var roomName = roomObj.RoomName ? roomObj.RoomName : '';
          var minrate = roomObj.averageRateDeal ? roomObj.averageRateDeal : 0;// minRateDeal
          var normalRateExtra = roomObj.NormalRateExtra ? roomObj.NormalRateExtra : 0;

          html = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.ROOMS,
            roomObj.RoomName ? roomObj.RoomName : '',
            breakfastIncluded,
            '',
            Chudu24.Hotels.SearchHotel.Events.getLinkHotelInNodeJs(hotelIdInt, hotelName) + '#datphong'
          );

          // Check Shpw Price Room
          if (isShowPrice) {

            if (minrate > 0) {

              minrate = parseFloat(minrate) / 1000;

              if (showPriceType && showPriceType != 'RealPrice') {
                minrate += parseFloat(normalRateExtra) / 1000
              }

              var divRate = '<div id="divRate" class="top-10 bottom-5" style="text-align: right; padding-right: 20px;">' + minrate.toLocaleString(locale) +
                '<span class="thd">.000</span>';
              html = html.replace('[/SHOW_PRICE_ROOM]', divRate);
            }

            else
              html = html.replace('[/SHOW_PRICE_ROOM]', divNoRate);

          } else {

            if (minrate > 0)
              html = html.replace('[/SHOW_PRICE_ROOM]', divHasRateButNoShow);

            else
              html = html.replace('[/SHOW_PRICE_ROOM]', divNoRate);
          }

          htmlResult += html;
        });
      }

      return htmlResult;
    },
    /**
     * dynamicSort
     * @param property
     * @returns {Function}
     */
    dynamicSort: function (property) {
      var sortOrder = 1;
      if (property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
      }
      return function (a, b) {
        var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
        return result * sortOrder;
      }
    },

    //"/ks." + HotelIdInt.ToString() + "." + HotelTextId + ".dat-phong." + Eval("RoomTypeIdInt").ToString() + "." + _UnicodeConversion.GetStringId(Eval("RoomName").ToString()) + ".html" %>
    getLinkHotel: function (hotelIdInt, hotelName, roomTypeIdInt, roomName) {

      if ((hotelIdInt && hotelIdInt > 0) && (hotelName && hotelName != '') && (roomTypeIdInt && roomTypeIdInt > 0) && (roomName && roomName != ''))
        return '/ks.' + hotelIdInt + '.' + Chudu24.Core.MakeLinkFromUnicode(hotelName) + '.dat-phong.' + roomTypeIdInt + '.' + Chudu24.Core.MakeLinkFromUnicode(roomName) + '.html';

      else
        return '#';
    },
    getLinkHotelInNodeJs: function (hotelIdInt, hotelName) {

      if (hotelIdInt && hotelIdInt > 0 && hotelName && hotelName != '')
        return '/ks.' + hotelIdInt + '.' + Chudu24.Core.MakeLinkFromUnicode(hotelName) + '.html';

      else
        return '#';
    },

    Paging: function () {
      $(document).on('click', '.pagination li a', function (e) {
        e.preventDefault();
        var root = $(this).parents('.pagination-main');
        var pageCount = $(root).data('page-count');

        var page = $(this).text();

        if ($(this).attr('aria-label') == 'Previous') {
          page = parseInt($('.active a', root).text()) - 1;
          page = page < 1 ? null : page;
        }

        if ($(this).attr('aria-label') == 'Next') {
          page = parseInt($('.active a', root).text()) + 1;
          page = page > pageCount ? null : page;
        }

        if (page != null && $.isNumeric(page)) {
          $('#params').attr('pageNum', page);
          Chudu24.Hotels.SearchHotel.Tools.DoFilter();

          ga('send', 'event', 'Danh Sach Khach San - LoadMoreHotels', $('#params').attr('textid'), page);
        }
      });
    },
    OrderBy: function () {
      $(document).on('click', '#primary .btn-ordBy', function (e) {
        e.preventDefault();

        var sortMethod = $(this).attr('orderBy');
        $('#params').attr('orderBy', sortMethod);
        $('#params').attr('pageNum', 1);

        //alert(sortMethod)

        Chudu24.Hotels.SearchHotel.Tools.DoFilter();

        ga('send', 'event', 'KSTheoThanhPho', 'SapXepTheo', $.trim($('.search-result #sort-bar .active').text()));
      });
    },//orderBy
    FilterPanel: function () {
//IsPromo
      $(document).on('click', '#chkIsPromo', function (e) {
        if ($('#filterAdvance input:checked').length > 0)
          $('#filterAdvance .btnClear').show();
        else
          $('#filterAdvance .btnClear').hide();

        $('#params').attr('isPromo', $(this).is(':checked'));
        $('#params').attr('pageNum', 1);
        if ($(this).is(':checked'))
          Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("promotion", "1", false);
        else
          Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("promotion", "1", true);


        var pathName = location.pathname;
        var textId = pathName.split('.')[1];
        window.location = '/resort.{0}.html'.format(textId);
        /*location.hash = Chudu24.Hotels.SearchHotel.querystring;
         Chudu24.Hotels.SearchHotel.Tools.DoFilter();*/
      });

//IsResort
      $(document).on('click', '#chkIsResort', function (e) {
        if ($('#filterAdvance input:checked').length > 0)
          $('#filterAdvance .btnClear').show();
        else
          $('#filterAdvance .btnClear').hide();

        $('#params').attr('isResort', $(this).is(':checked'));
        $('#params').attr('pageNum', 1);
        if ($(this).is(':checked'))
          Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("isresort", "1", false);
        else
          Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("isresort", "1", true);

        var pathName = location.pathname;
        var textId = pathName.split('.')[1];
        window.location = '/resort.{0}.html'.format(textId);

        /*location.hash = Chudu24.Hotels.SearchHotel.querystring;
         Chudu24.Hotels.SearchHotel.Tools.DoFilter();*/
      });

      $(document).on('click', '#filterAdvance .btnClear', function (e) {
        $(this).hide();
        $('#filterAdvance input:checked').removeAttr('checked');

        $('#params').attr('isPromo', false);
        $('#params').attr('isResort', false);
        $('#params').attr('pageNum', 1);
        Chudu24.Hotels.SearchHotel.Tools.RemoveParam("isresort");
        Chudu24.Hotels.SearchHotel.Tools.RemoveParam("promotion");
        /*location.hash = Chudu24.Hotels.SearchHotel.querystring;
         Chudu24.Hotels.SearchHotel.Tools.DoFilter();*/

        //var queryString = window.location.href.slice(window.location.href.indexOf('?') + 1).split('=');

        var valType = $('#params').attr('type');
        Chudu24.Hotels.SearchHotel.Tools.DoFilterByLink(valType, 'l');

      });

// StarRating
      /*$(document).on('click', '#filterStar .chkStar', function (e) {
       if ($('#filterStar .chkStar:checked').length > 0)
       $('#filterStar .btnClear').show();
       else
       $('#filterStar .btnClear').hide();

       $('#params').attr('pageNum', 1);
       if ($(this).is(':checked'))
       Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("star", $(this).val(), false);
       else
       Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("star", $(this).val(), true);

       var starRating = '';
       */
      /*$(this).each(function (i, e) {
       if ($(this).is(':checked')) {
       starRating += $(this).val() + ',';
       //starRating = $(this).val();
       }
       });*/
      /*

       var $parent = $(this).closest('ul');
       $parent.find('li').each(function (i, e) {

       if ($(this).find('input[type=checkbox]').is(':checked')) {
       //starRating += $(this).find('input[type=checkbox]').val() + ',';
       var listValue = $(this).find('input[type=checkbox]').val();

       if (starRating != '') {

       var value = listValue.split('|')[0] == "0" ? "1" : listValue.split('|')[0];
       starRating = value + ',' + starRating;
       }

       else {
       starRating = listValue.split('|')[0] == "0" ? "1" : listValue.split('|')[0];
       }
       }
       });

       if (starRating && starRating != '') {
       starRating = starRating.toString();
       }


       var textId = $('#params').attr('textid');
       //window.location = starRating == '' ? '/t.{0}.html'.format(textId) : '/t.{0}.khach-san-{1}-sao.html'.format(textId, starRating);
       */
      /*location.hash = Chudu24.Hotels.SearchHotel.querystring;
       Chudu24.Hotels.SearchHotel.Tools.DoFilter();*/
      /*
       });*/

      $(document).on('click', '#filterStar .btnClear', function (e) {
        $(this).hide();
        $('#filterStar .chkStar').removeAttr('checked');
        $('#params').attr('pageNum', 1);
        /*Chudu24.Hotels.SearchHotel.Tools.RemoveParam("star");
         location.hash = Chudu24.Hotels.SearchHotel.querystring;*/
        //Chudu24.Hotels.SearchHotel.Tools.DoFilter();

        //var queryString = window.location.href.slice(window.location.href.indexOf('?') + 1).split('=');

        var valStar = $('#params').attr('starrating');

        Chudu24.Hotels.SearchHotel.Tools.DoFilterByLink(valStar, 'sao');

      });

// Price
      $(document).on('click', '#filterPrice .chkPrice', function (e) {
        if ($('#filterPrice .chkPrice:checked').length > 0)
          $('#filterPrice .btnClear').show();
        else
          $('#filterPrice .btnClear').hide();

        $('#params').attr('pageNum', 1);
        if ($(this).is(':checked'))
          Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("minrate", $(this).val(), false);
        else
          Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("minrate", $(this).val(), true);
        location.hash = Chudu24.Hotels.SearchHotel.querystring;
        Chudu24.Hotels.SearchHotel.Tools.DoFilter();
      });

      $(document).on('click', '#filterPrice .btnClear', function (e) {
        $(this).hide();
        $('#filterPrice .chkPrice').removeAttr('checked');
        $('#params').attr('pageNum', 1);
        Chudu24.Hotels.SearchHotel.Tools.RemoveParam("minrate");
//        location.hash = Chudu24.Hotels.SearchHotel.querystring;
//        Chudu24.Hotels.SearchHotel.Tools.DoFilter();

        var valPrice = $('#params').attr('price');

        Chudu24.Hotels.SearchHotel.Tools.DoFilterByLink(valPrice, 'gia');
      });

// Facility
      $(document).on('click', '#filterFac .chkFac', function (e) {
        if ($('#filterFac .chkFac:checked').length > 0)
          $('#filterFac .btnClear').show();
        else
          $('#filterFac .btnClear').hide();

        $('#params').attr('pageNum', 1);
        if ($(this).is(':checked'))
          Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("facility", $(this).val(), false);
        else
          Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("facility", $(this).val(), true);
        location.hash = Chudu24.Hotels.SearchHotel.querystring;
        Chudu24.Hotels.SearchHotel.Tools.DoFilter();
      });

      $(document).on('click', '#filterFac .btnClear', function (e) {
        $(this).hide();
        $('#filterFac .chkFac').removeAttr('checked');
        $('#params').attr('pageNum', 1);
        Chudu24.Hotels.SearchHotel.Tools.RemoveParam("facility");
//        location.hash = Chudu24.Hotels.SearchHotel.querystring;
//        Chudu24.Hotels.SearchHotel.Tools.DoFilter();

        var valFacilities = $('#params').attr('facility');

        Chudu24.Hotels.SearchHotel.Tools.DoFilterByLink(valFacilities, 'f');
      });

// Attraction
      $(document).on('click', '#filterAttr .chkAttr', function (e) {
        if ($('#filterAttr .chkAttr:checked').length > 0)
          $('#filterAttr .btnClear').show();
        else
          $('#filterAttr .btnClear').hide();

        $('#params').attr('pageNum', 1);
        /*if ($(this).is(':checked'))
         Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("attraction", $(this).val(), false);
         else
         Chudu24.Hotels.SearchHotel.Tools.ChangeValueParam("attraction", $(this).val(), true);
         location.hash = Chudu24.Hotels.SearchHotel.querystring;*/

        var $parent = $(this).closest('div.search-filter');
        var attractionsId = '';

        $parent.find('div.checkbox').each(function (i, e) {

          if ($(this).find('input[type=checkbox]').is(':checked')) {
            //starRating += $(this).find('input[type=checkbox]').val() + ',';
            var value = $(this).find('input[type=checkbox]').val();

            if (attractionsId != '')
              attractionsId = value + ',' + attractionsId;

            else
              attractionsId = value;
          }
        });

        var textId = $('#params').attr('textid');
        window.location = attractionsId == '' ? '/t.{0}.html'.format(textId) : '/t.{0}.a.{1}.html'.format(textId, attractionsId);

        //Chudu24.Hotels.SearchHotel.Tools.DoFilter();
      });

      $(document).on('click', '#filterAttr .btnClear', function (e) {
        $(this).hide();
        $('#filterAttr .chkAttr').removeAttr('checked');
        $('#params').attr('pageNum', 1);
        Chudu24.Hotels.SearchHotel.Tools.RemoveParam("attraction");

        /*location.hash = Chudu24.Hotels.SearchHotel.querystring;
         Chudu24.Hotels.SearchHotel.Tools.DoFilter();*/

        //var queryString = window.location.href.slice(window.location.href.indexOf('?') + 1).split('=');

        var valAttraction = $('#params').attr('attraction');
        Chudu24.Hotels.SearchHotel.Tools.DoFilterByLink(valAttraction, 'a');
      });

      $(document).on('change', '#filterAdvance input[type="checkbox"],#filterStar input[type="checkbox"],#filterPrice input[type="checkbox"],#filterFac input[type="checkbox"]', function () {
        var title = $('.snippet-title', $(this).parents('.snippet')).data('title');
        var value = $(this).data('detail');

        $('#params').attr('pageNum', 1);
        ga('send', 'event', 'KSTheoThanhPho', 'TimKiemNangCao', title + ' : ' + value);
      });

      $(document).on('click', '#filterAdvance .btnClear,#filterStar .btnClear,#filterPrice .btnClear,#filterFac .btnClear', function () {
        var title = $('.snippet-title', $(this).parents('.snippet')).data('title');

        $('#params').attr('pageNum', 1);
        ga('send', 'event', 'KSTheoThanhPho', 'TimKiemNangCao', title + ' (clear all)');
      });
    }//FilterPanel
  },
  Tools: {
    InitCriteo: function () {
      var __items = new Array();
      $('#search-result .hotel-item').each(function () {
        if (__items.length < 3) {
          __items.push("H" + $(this).attr('idint'));
        }
      });
      var __checkin_date = $.GetStringCookieArrivalDateYMD();
      var __checkout_date = $.GetStringCookieDepartureDateYMD();
      window.criteo_q = window.criteo_q || [];
      window.criteo_q.push(
        {event: "setAccount", account: 15345}
        , {event: "setSiteType", type: "d"}
        , {event: "viewList", item: __items}
        , {event: "viewSearch", checkin_date: __checkin_date, checkout_date: __checkout_date}
      );
    },
    ScrollingTo: function (target, offset, callback) {
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
    DoFilter: function () {

      var url = location.href;

      //collect params
      var params = $('#params');

      var isPromo = params.attr('isPromo');
      var isResort = params.attr('isResort');
      var pageNum = params.attr('pageNum');
      var orderBy = params.attr('orderBy');
      var cityId = params.attr('cityid');
      var attrationId = params.attr('attractionid');
      var attrationTextId = params.attr('attractiontextid');
      var diaDanhId = params.attr('diadanhid');
      var facilities = params.attr('facility');
      var starRating = params.attr('starrating');
      var minRate = params.attr('price');
      var attraction = params.attr('attraction');
      var type = params.attr('type');

      /*$('#filterStar .chkStar').each(function (i, e) {
       if ($(this).is(':checked')) {
       starRating += $(this).val() + '|';
       }
       });*/
      params.attr('star', starRating);

      /*var minRate = '';
       $('#filterPrice .chkPrice').each(function (i, e) {
       if ($(this).is(':checked')) {
       minRate += $(this).val() + '|';
       }
       });*/
      params.attr('minRate', minRate);

      //var facility = '';
      /*$('#filterFac .chkFac').each(function (i, e) {
       if ($(this).is(':checked')) {
       facility += $(this).val() + '|';
       }
       });

       if (facilityId && facilityId > 0)
       facility += facilityId;*/

      params.attr('facility', facilities);

      /*var attraction = '';
       $('#filterAttr .chkAttr').each(function (i, e) {
       if ($(this).is(':checked')) {
       attraction += $(this).val() + '|';
       }
       });

       if (attrationId && attrationId > 0)
       attraction += attrationId;*/

      params.attr('attraction', attraction);

      //alert(attraction)

      var urlFilter = '/napi/ajax' + location.pathname + location.hash;

      //alert(urlFilter)
      $.ajax({
        url: urlFilter,
        type: "POST",
        //dataType: "json",
        data: {
          cityId: cityId,
          /*isPromo: isPromo,
           isResort: isResort,*/
          type: type,
          pageNum: pageNum,
          orderBy: orderBy,
          star: starRating,
          minRate: minRate,
          facilities: facilities,
          arrAttraction: attraction,
          attractionTextId: attrationTextId,
          diaDanhId: diaDanhId,
          _csrf: $.GetCsrfToken()
        },
        //contentType: "application/json",
        cache: false,
        timeout: 5000,
        complete: function () {
          //called when complete
          //console.log('process complete');
          //alert('complete')
        },

        success: function (result) {

          //alert('success');
          Chudu24.Hotels.SearchHotel.Tools.ScrollingTo($('#ResultsList'), 10, function () {

            var hotelsHtml = '';
            var groupFilterTop = $('#search-result').find('.search-result').find('.text-result .group-filter-top');

            groupFilterTop = '<div class="group-filter-top">{0}</div><div style="clear: both"></div>'.format(groupFilterTop.html());

            if (result && result.success)
              hotelsHtml = Chudu24.Hotels.SearchHotel.Tools.getHtmlHotels(result, pageNum, diaDanhId, groupFilterTop);

            $('#search-result').html($('#loading').clone(true).show());

            $('#search-result').html(hotelsHtml);

            Chudu24.Master.LazyLoadingImgMaster();
            Chudu24.Master.GenerateWrapLink();

            /** Call Reload MinRate Hotel  **/
            Chudu24.Hotels.SearchHotel.getMinRateAllCurrentHotel();

            if ($.trim(orderBy) != '') {
              $('#sort-bar .dropdown').removeClass('active');
              $('#sort-bar a[orderby="' + orderBy + '"]').parents('.dropdown').addClass('active');

              if (orderBy.indexOf('DESC') > -1) {
                $('#sort-bar .active .dropdown-toggle').html($('#sort-bar .active .dropdown-toggle').html() + ' <i class="fa fa-caret-down"></i>')
              } else {
                $('#sort-bar .active .dropdown-toggle').html($('#sort-bar .active .dropdown-toggle').html() + ' <i class="fa fa-caret-up"></i>')
              }
            }
          });
        },

        error: function () {
          //console.log('process error');
          alert('error')
        }
      });
    }, // DoFilter

    /**
     * DoFilterByLink
     * @param queryString
     * @constructor
     */
    DoFilterByLink: function (val, key) {

      var url = location.pathname;

      if (val && val != '') {

        /*val.sort(function(a, b) {
         return a - b;
         });*/

        //val = val.join(',');

        if (url.indexOf('_{0}-'.format(key)) > -1)
          url = window.location.href.replace('_{0}-{1}'.format(key, val), '');

        else if (url.indexOf('.q.{0}-{1}_'.format(key, val)) > -1)
          url = window.location.href.replace('{0}-{1}_'.format(key, val), '');

        else
          url = window.location.href.replace('.q.{0}-{1}_'.format(key, val), '');

        window.location = url;
      }
    },
    /**
     * getHtmlHotels
     * @param data
     * @param pageIndex
     * @param diaDanhId
     * @param groupFilterTop
     * @returns {string}
     */
    getHtmlHotels: function (data, pageIndex, diaDanhId, groupFilterTop) {

      var pagesNextToCurrent = 1, elementCount = 20, resultHtml = '', html = '', locale = 'vi-VN', total = 0;
      var navPagingHtml = '', pagingHtml = '', mainPagingHtml = '', hotelsHtml = '', bannerAdvertHtml = '';

      // html nav
      navPagingHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.NAV_PAGING, total);
      resultHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.MAIN);

      if (data && data.success) {

        total = data.listsHotels && data.listsHotels.total ? data.listsHotels.total : 0;
        var listHotels = data.listsHotels && data.listsHotels.data ? data.listsHotels.data : null;

        // html nav
        navPagingHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.NAV_PAGING, total);

        if (total > 0 && listHotels != null) {

          //resultHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.MAIN);

          //Get NAV Paging
          var pageCount = parseInt(total / elementCount);
          if (total % elementCount > 0)
            pageCount++;

          //alert(pageCount)
          //navPagingHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.NAV_PAGING, total);

          pagingHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.PAGING, pageCount);

          if (total > 20) {
            if (Chudu24.Core.isNumeric(pageCount))
              pageCount = parseInt(pageCount);

            if (Chudu24.Core.isNumeric(pageIndex))
              pageIndex = parseInt(pageIndex);

            if (pageIndex > 1 && pageCount > 1) {
              mainPagingHtml = '<li class="page" title="Xem trang trước đó">';
            }
            else {
              mainPagingHtml = '<li class="disabled" title="">';
            }

            mainPagingHtml += '<a href="javascript:;" aria-label="Previous">';
            mainPagingHtml += '<i class="fa fa-chevron-left"></i></a>';

            for (var p = 1; p <= pageCount; p++) {

              if ((p == 1) || (p == pageIndex) || (p == pageCount) || (p >= (pageIndex - pagesNextToCurrent) && p < pageIndex) || (p <= (pageIndex + pagesNextToCurrent) && p > pageIndex) || (p == 2 && p == (pageIndex - pagesNextToCurrent - 1)) || (p == (pageCount - 1) && p == (pageIndex + pagesNextToCurrent + 1))) {

                mainPagingHtml += p == pageIndex ? '<li class="page active"><a href="javascript:;">' + p + '</a></li>' : '<li class="page"><a href="javascript:;">' + p + '</a></li>';

              } else if (p == (pageIndex - (pagesNextToCurrent + 1)) || p == (pageIndex + (pagesNextToCurrent + 1))) {

                mainPagingHtml += '<li class="page"><a href="javascript:;">...</a></li>';
              }
            }

            if (pageIndex < pageCount && pageCount > 1) {
              mainPagingHtml += '<li class="page" title="Xem trang tiếp theo">';
            }
            else {
              mainPagingHtml += '<li class="disabled" title="">';
            }

            mainPagingHtml += '<a href="javascript:;" aria-label="Next">';
            mainPagingHtml += '<i class="fa fa-chevron-right"></i>';
          }

          pagingHtml = pagingHtml.replace('[/MAIN_PAGING]', mainPagingHtml);
          navPagingHtml = navPagingHtml.replace('[/PAGING]', pagingHtml);
          navPagingHtml = navPagingHtml.replace('[/GROUP_FILTER]', groupFilterTop);

          //Get Hotels HTML
          listHotels.forEach(function (obj, index, array) {

            var item, goodPriceHtml = '', showPriceHtml = '', distanceHtml = '', facilitiesHtml = '';
            var counter = ++index;
            if ((obj && obj != null) && (obj._source)) {

              item = obj._source;

              var hotelIdInt = item.hotelidint ? item.hotelidint : 0;
              var hotelName = item.hotelname ? item.hotelname : '';
              var thumbnail = item.thumbnail ? item.thumbnail : '';
              var isGoodPrice = item.isgoodprice ? item.isgoodprice : null; // Good Price
              var isShowPrice = item.isshowprice ? item.isshowprice : null; // Show Price
              var isShowPromotionPrice = item.isshowpromotionprice ? item.isshowpromotionprice : null;
              var minrateVnd = item.minratevnd ? item.minratevnd : 0;
              var minNormalRate = item.minnormalrate ? item.minnormalrate : 0;
              var isShowSearchBox = item.isshowsearchbox ? item.isshowsearchbox : null;

              var khoangCachDenKhachSanMeters = 0, diaDanhName = '';
              if ((diaDanhId && parseInt(diaDanhId) > 0) && (item.diadanhlist && item.diadanhlist.length > 0)) {
                var objArea = item.diadanhlist.filter(function (item) {
                  return diaDanhId == item.DiaDanhId;
                })

                if (objArea && objArea.length > 0) {

                  //objArea = objArea[0];
                  khoangCachDenKhachSanMeters = objArea[0].KhoangCachDenKhachSanMeters ? objArea[0].KhoangCachDenKhachSanMeters : 0;
                  diaDanhName = objArea[0].DiaDanhName ? objArea[0].DiaDanhName : '';
                }
              }

              var featured_IsFreeBreakfast = item.featured_isfreebreakfast ? item.featured_isfreebreakfast : null;
              var featured_HasSwimmingPool = item.featured_hasswimmingpool ? item.featured_hasswimmingpool : null;
              var featured_HasMeetingRoom = item.featured_hasmeetingroom ? item.featured_hasmeetingroom : null;
              var featured_HasPrivateBeach = item.featured_hasprivatebeach ? item.featured_hasprivatebeach : null;
              var featured_IsFreeWifi = item.featured_isfreewifi ? item.featured_isfreewifi : null;

              //var counter = index++;
              html = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.HOTELS,
                hotelIdInt,        //0
                Chudu24.Core.safeTagAttrValue(hotelName),         //1
                counter,                                          //2
                Chudu24.Core.getHotelLink(hotelIdInt, hotelName), //3
                Chudu24.Core.safeTagAttrValue(hotelName),         //4
                Chudu24.Core.translateLink(thumbnail),            //5
                Chudu24.Core.safeTagAttrValue(hotelName),         //6
                Chudu24.Core.translateLink(thumbnail),            //7
                Chudu24.Core.safeTagAttrValue(hotelName),         //8
                Chudu24.Core.safeTagAttrValue(hotelName),         //9
                Chudu24.Core.getHotelLink(hotelIdInt, hotelName), //10
                hotelName,                                        //11
                Chudu24.Core.safeTagAttrValue(hotelName),         //12
                item.starrating.toString().replace('.', '-'),     //13
                Chudu24.Core.getHotelLink(hotelIdInt, hotelName), //14
                item.reviewcount ? item.reviewcount : '',         //15
                item.address1 ? item.address1 : '',               //16
                item.cityname ? item.cityname : '',               //17
                Chudu24.Core.getHotelLink(hotelIdInt, hotelName), //18
                hotelIdInt,                                       //19
                Chudu24.Core.MakeLinkFromUnicode(hotelName),      //20
                hotelName.replace("'", ''),                       //21
                item.isshowprice,
                item.isshowpromotionprice
              );

              //GET Goog Price
              if (isGoodPrice != null && isGoodPrice) {
                var isGoodPriceNotes = item.isgoodpricenotes ? Chudu24.Core.safeTagAttrValue(item.isgoodpricenotes) : ''
                goodPriceHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.GOOD_PRICE, isGoodPriceNotes);
              }
              html = html.replace('[/GOOD_PRICE]', goodPriceHtml != '' ? goodPriceHtml : '');

              //GET Show Price
              if ((isShowPrice != null && isShowPrice) || (isShowPromotionPrice != null && isShowPromotionPrice)) {
                if (minNormalRate > 0) {
                  minNormalRate = parseFloat(minNormalRate) / 1000;

                  if (minNormalRate > 0)
                    showPriceHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.SHOW_PRICE, minNormalRate.toLocaleString(locale));

                }
              } else if ((isShowSearchBox != null && isShowSearchBox) && minrateVnd > 0) {
                showPriceHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.SHOW_SEARCH_BOX);
              }
              html = html.replace('[/PRICE]', showPriceHtml != '' ? showPriceHtml : '');

              //GET Distance
              if (khoangCachDenKhachSanMeters > 0) {
                khoangCachDenKhachSanMeters = parseFloat(khoangCachDenKhachSanMeters) / 1000;
                distanceHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.DISTANCE, diaDanhName, khoangCachDenKhachSanMeters);
              }
              html = html.replace('[/DISTANCE]', distanceHtml != '' ? distanceHtml : '');

              //GET Facilities FREE_BREAKFAST
              if (featured_IsFreeBreakfast != null && featured_IsFreeBreakfast)
                facilitiesHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.FREE_BREAKFAST);

              html = html.replace('[/FREE_BREAKFAST]', facilitiesHtml != '' ? facilitiesHtml : '');

              //GET Facilities HAS_SWIMMING_POOL
              facilitiesHtml = '';
              if (featured_HasSwimmingPool != null && featured_HasSwimmingPool)
                facilitiesHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.HAS_SWIMMING_POOL);

              html = html.replace('[/HAS_SWIMMING_POOL]', facilitiesHtml != '' ? facilitiesHtml : '');

              //GET Facilities HAS_MEETING_ROOM
              facilitiesHtml = '';
              if (featured_HasMeetingRoom != null && featured_HasMeetingRoom)
                facilitiesHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.HAS_MEETING_ROOM);

              html = html.replace('[/HAS_MEETING_ROOM]', facilitiesHtml != '' ? facilitiesHtml : '');

              //GET Facilities HAS_PRIVATE_BEACH
              facilitiesHtml = '';
              if (featured_HasPrivateBeach != null && featured_HasPrivateBeach)
                facilitiesHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.HAS_PRIVATE_BEACH);

              html = html.replace('[/HAS_PRIVATE_BEACH]', facilitiesHtml != '' ? facilitiesHtml : '');

              //GET Facilities FREE_WIFI
              facilitiesHtml = '';
              if (featured_IsFreeWifi != null && featured_IsFreeWifi)
                facilitiesHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.FREE_WIFI);

              html = html.replace('[/FREE_WIFI]', facilitiesHtml != '' ? facilitiesHtml : '');

              // GET Banner Advert In List Hotels
              if (counter == 3 && (data.adverts && data.adverts.bannerInListHotels)) {

                var advertInListHotel = data.adverts.bannerInListHotels;

                var itemLinkUrl = advertInListHotel.ItemLinkUrl ? Chudu24.Core.translateLink(advertInListHotel.ItemLinkUrl) : '';
                var itemUrl = advertInListHotel.ItemUrl ? Chudu24.Core.translateLink(advertInListHotel.ItemUrl) : '';
                var campaignName = advertInListHotel.CampaignName ? advertInListHotel.CampaignName : '';

                bannerAdvertHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.BANNER_ADVERT,
                  itemLinkUrl,
                  campaignName,
                  itemUrl,
                  campaignName
                );

                html += bannerAdvertHtml;
              }

              hotelsHtml += html;
            }
          })
        }
        else {
          navPagingHtml = navPagingHtml.replace('[/PAGING]', '');
        }
      }

      // GET Banner Advert In Bottom
      var bannerAdvertBottomHtml = '';
      if (data.adverts && data.adverts.bannerBottom) {

        var advertBottom = data.adverts.bannerBottom;

        var itemLinkUrl = advertBottom.ItemLinkUrl ? Chudu24.Core.translateLink(advertBottom.ItemLinkUrl) : '';
        var itemUrl = advertBottom.ItemUrl ? Chudu24.Core.translateLink(advertBottom.ItemUrl) : '';
        var campaignName = advertBottom.CampaignName ? advertBottom.CampaignName : '';

        bannerAdvertBottomHtml = $.string.Format(Chudu24.Hotels.SearchHotels.TEMPLATES.BANNER_ADVERT,
          itemLinkUrl,
          campaignName,
          itemUrl,
          campaignName
        );
      }

      resultHtml = resultHtml.replace('[/NAV_PAGING]', navPagingHtml);
      resultHtml = resultHtml.replace('[/HOTELS]', hotelsHtml);
      resultHtml = resultHtml.replace('[/BANNER_ADVERT]', bannerAdvertBottomHtml);
      resultHtml = resultHtml.replace('[/PAGING_BOTTOM]', pagingHtml);

      return resultHtml;
    },
    GuiEmailBaoGia: function (HotelIdInt, HotelName, Email, Phone, _dia) {
      var CheckIn = Chudu24.Hotels.SearchHotel.Tools.GetArrivalDate();
      var CheckOut = Chudu24.Hotels.SearchHotel.Tools.GetDepartureDate();

      if (Email == undefined) Email = "";
      if (Phone == undefined) Phone = "";

      var _url = "https://khachsan.chudu24.com/WebServices/WebServices.asmx/CreateReservation";
      var _data = {
        HotelIdInt: HotelIdInt,
        CheckIn: escape(CheckIn),
        CheckOut: escape(CheckOut),
        CustomerEmail: escape(Email),
        CustomerMobile: escape(Phone),
        Context: "GIATOTHIENTAIEMAIL"
      };
      var ObjectToString = function (obj) {
        for (key in obj) {
          if (typeof obj[key] === "object")
            obj[key] = '"' + JSON.stringify(obj[key]) + '"';
        }
        return JSON.stringify(obj);
      };

      $.ajax({
        type: "POST",
        url: _url,
        data: JSON.stringify({data: ObjectToString(_data)}),
        cache: false,
        contentType: "application/json; charset=utf-8",
        success: function (data) {
          Chudu24.Notification.Message("success", 'Gửi email thành công. Vui lòng kiểm tra email để nhận báo giá "' + HotelName + '" của Chudu24.', "Báo giá");
          _dia.dialog('destroy');
        },
        error: function () {
          Chudu24.Notification.Message("error", "Có lỗi xảy ra.", "Lỗi");

          $(".fa-spinner", _dia).removeClass('fa-spinner fa-spin');
          $(".fa-spin", _dia).removeClass('fa-spinner fa-spin');
          $('button', _dia).prop('disabled', false);
        }
      });
    },
    GetArrivalDate: function () {
      var _date = '';
      if ($('#txtDateCheckin').length > 0 && $('#txtDateCheckin').val().length > 0) {
        _date = $('#txtDateCheckin').val();
      } else if ($.GetCookie('CheckInDate') != undefined) {
        _date = $.GetCookie('CheckInDate');
      } else {
        _date = new Date('dd/MM/yyyy');
      }
      return _date;
    },
    GetDepartureDate: function () {
      var _date = '';
      if ($('#txtDateCheckout').length > 0 && $('#txtDateCheckout').val().length > 0) {
        _date = $('#txtDateCheckout').val();
      } else if ($.GetCookie('CheckOutDate') != undefined) {
        _date = $.GetCookie('CheckOutDate');
      } else {
        _date = new Date('dd/MM/yyyy');
      }
      return _date;
    },
    ShowFacebookBar: function () {
      var $share_popout = $('#topbar_facebook_like');
      $(window).on('scroll', function () {
        if ($(window).scrollTop() + $(window).height() == $(document).height()) {
          if (parseInt($share_popout.offset().top) != 0) {
            $.LoadAsyncFacabook();
            $share_popout.css({'top': '0px', 'transition-duration': '0.5s'});
          }
        }
        else {
          if (parseInt($share_popout.offset().top) != -150) {
            $share_popout.css({'top': '-150px', 'transition-duration': '0.5s'});
          }
        }
      });
    },
    GetMinRatesByHotelIdInt: function () {
      var cityId = $(params).attr('cityId');
      var hotelIdInts = [];
      $('.page-body .hotel-item').each(function () {
        hotelIdInts.push($(this).attr('idint'));
      });

      /*$.ajax({
       type: 'POST',
       url: '/V2/Hotels/WebServices/Hotels.asmx/GetMinRatesByFilter',
       contentType: "application/json; charset=utf-8",
       data: JSON.stringify({
       cityId: cityId,
       hotelIdInts: hotelIdInts
       }),
       success: function (data) {
       if (data != null && data.d != null && data.d.length > 0) {
       for (var idx in data.d) {
       if (data.d[idx].PriceFormat != null && parseInt(data.d[idx].PriceFormat) > 0) {
       $('.hotel-item[idint="' + data.d[idx].IdInt + '"]').find('.price-zone').html(
       '<div class="col-hotel-price-box">' +
       '<p class="hotel-price">' + data.d[idx].PriceFormat + '<small>.000</small><br /><span>VNĐ/đêm</span></p>' +
       '</div>'
       )
       } else if (data.d[idx].IsShowSearchBox) {
       $('.hotel-item[idint="' + data.d[idx].IdInt + '"]').find('.price-zone').html(
       $('.hotel-item[idint="' + data.d[idx].IdInt + '"]').find('.price-zone').html(
       '<div class="hotel-price-box col-hotel-price-box"><a class="clicklaygia" title="Giá rất tốt tại khách sạn này không được công bố trên website, vui lòng click và điền địa chỉ email để nhận báo giá"><span class="text-center">Click Để Lấy Giá</span></a></div>'
       ))
       } else {
       $('.hotel-item[idint="' + data.d[idx].IdInt + '"]').find('.price-zone').empty();
       }
       }
       }
       },
       error: function () {
       //Chudu24.Notification.Message("error", "Có lỗi xảy ra.", "Lỗi");
       }
       });*/
    },

// Filter QueryString - start
    SetParamFilterFromHash: function () {
      var $this = Chudu24.Hotels.SearchHotel;
      var hash = document.location.hash;
      if (hash.substring(1, hash.length) != "") {
        $this.querystring = hash.substring(1, hash.length);
        if ($this.Tools.GetParam($this.querystring, 'promotion') == 1) {
          $('input[type="checkbox"]#chkIsPromo', $('div#filterAdvance')).attr('checked', true);
          $('#params').attr('isPromo', $("#chkIsPromo", $('div#filterAdvance')).is(':checked'));
          $("#chkIsPromo", $('div#filterAdvance')).trigger('change');
        }
        if ($this.Tools.GetParam($this.querystring, 'isresort') == 1) {
          $('input[type="checkbox"]#chkIsResort', $('div#filterAdvance')).attr('checked', true);
          $('#params').attr('isResort', $("#chkIsResort", $('div#filterAdvance')).is(':checked'));
          $("#chkIsResort", $('div#filterAdvance')).trigger('change');
        }

        $.each($this.querystring.split("&"), function (index, params) {
          if (params != "") {
            var name = params.split("=")[0];
            var values = params.split("=")[1];
            if (values != "") {
              if (name == "star") {
                $('input[type="checkbox"].chkStar', $('div#filterStar')).each(function () {
                  if (values.indexOf($(this).val()) != -1) {
                    $(this).attr('checked', true);
                    $(this).trigger('change');
                  }
                })
              } else if (name == "attraction") {
                $.each(values.split('|'), function (index, val) {
                  $('input[type="checkbox"].chkAttr[value="' + val + '"]', $('div#filterAttr')).attr('checked', true);
                  $(this).trigger('change');
                });
              } else if (name == "minrate") {
                $.each(values.split('|'), function (index, val) {
                  $('input[type="checkbox"].chkPrice[value="' + val + '"]', $('div#filterPrice')).attr('checked', true);
                  $(this).trigger('change');
                });
              } else if (name == "facility") {
                $.each(values.split('|'), function (index, val) {
                  $('input[type="checkbox"].chkFac[value="' + val + '"]', $('div#filterFac')).attr('checked', true);
                  $(this).trigger('change');
                });
              }
            }
          }
        });
// Show Clear filter
        Chudu24.Hotels.SearchHotel.Tools.SetShowClearFilter();
// Search filter
        Chudu24.Hotels.SearchHotel.Tools.DoFilter();
//$.GoToPage(1);
      }
    },
    SetShowClearFilter: function () {
// Resort, Promotion
      if ($('#filterAdvance input:checked').length > 0)
        $('#filterAdvance .btnClear').show();
      else
        $('#filterAdvance .btnClear').hide();
// Star
      if ($('#filterStar .chkStar:checked').length > 0)
        $('#filterStar .btnClear').show();
      else
        $('#filterStar .btnClear').hide();
// Price
      if ($('#filterPrice .chkPrice:checked').length > 0)
        $('#filterPrice .btnClear').show();
      else
        $('#filterPrice .btnClear').hide();
// Fancility
      if ($('#filterFac .chkFac:checked').length > 0)
        $('#filterFac .btnClear').show();
      else
        $('#filterFac .btnClear').hide();
// Attraction
      if ($('#filterAttr .chkAttr:checked').length > 0)
        $('#filterAttr .btnClear').show();
      else
        $('#filterAttr .btnClear').hide();
    },
    GetParam: function (url, param) {
      if (url == undefined || param == undefined) {
        return decodeURIComponent("&isresort=&promotion=&star=&minrate=&attraction=&facility=");
      }
      return decodeURIComponent((new RegExp('[?|&]' + param.toLowerCase() + '=' + '([^&;]+?)(&|#|;|$)').exec(url.toLowerCase()) || [, ""])[1].replace(/\+/g, '%20')) || null;
    },
    RemoveParam: function (param) {
      var $this = Chudu24.Hotels.SearchHotel;
      var URL = String($this.querystring);
      var regex = new RegExp("\\?" + param + "=[^&]*&?", "gi");
      URL = URL.replace(regex, '?');
      regex = new RegExp("\\&" + param + "=[^&]*&?", "gi");
      URL = URL.replace(regex, '&');
      URL = URL.replace(/(\?|&)$/, '');
      regex = null;
      $this.querystring = URL;
    },
    ChangeValueParam: function (param, value, isRemove) {
      var $this = Chudu24.Hotels.SearchHotel;
      var URL = String($this.querystring);

      var re = new RegExp("([?|&])" + param + "=.*?(&|$)", "i");
      var values = ($this.Tools.GetParam($this.querystring, param) == null ? new Array() : $this.Tools.GetParam($this.querystring, param).split('|'));
      if (value.split('|').length > 0) {
        $.each(value.split('|'), function (i, e) {
          if (isRemove) values.splice($.inArray(e, values), 1);
          if ($.inArray(e, values) == -1 && !isRemove) values.push(e);
        });
      } else {
        if (isRemove) values.splice($.inArray(value, values), 1);
        if ($.inArray(value, values) == -1 && !isRemove) values.push(value)
      }
      values.sort();
      if (URL.match(re)) {
        $this.querystring = URL.replace(re, '$1' + param + "=" + values.join('|') + '$2');
      } else {
        $this.querystring = URL + '&' + param + "=" + values.join('|');
      }
    }
// Filter QueryString -end
  },
  FunctionsDependOnLoadToken: function (err, tokenResult) {
    // TODO: Call Functions execute on page load need csrf HERE
  },

  /** Function Ajax show MinRate All Hotel Has Show Rate **/
  getMinRateAllCurrentHotel: function () {
    //alert('CALL getMinRateAllCurrentHotel');
    $('#search-result article.hotel-item a.btnPriceDetail').each(function (index, item) {
      var $objLinkDetailRate = $(item);
      var _checkInDate = Chudu24.Hotels.SearchHotel.Tools.GetArrivalDate();
      var _checkOutDate = Chudu24.Hotels.SearchHotel.Tools.GetDepartureDate();
      var _hotelIdInt = $objLinkDetailRate.closest('.hotel-item').attr("idint");
      var _hotelName = $objLinkDetailRate.closest('.hotel-item').attr('hotel-name');

      var crsfToken = $objLinkDetailRate.closest('.hotel-item').attr('_crtoken');
      ;
      var _signature = $objLinkDetailRate.closest('.hotel-item').attr('signature');


      var _isShowPrice = $objLinkDetailRate.attr('isshowprice');
      var _isShowPromotionPrice = $objLinkDetailRate.attr('isshowpromotionprice');

      try {
        if (typeof _isShowPrice == 'string')
          _isShowPrice = JSON.parse(_isShowPrice);
      } catch (ex) {
        _isShowPrice = false;
      }
      try {
        if (typeof _isShowPromotionPrice == 'string')
          _isShowPromotionPrice = JSON.parse(_isShowPromotionPrice);
      } catch (ex) {
        _isShowPromotionPrice = false
      }

      /** Get And Append Rooms Rate this Hotel **/
      Chudu24.Hotels.SearchHotel.getAndAppendDetailRoomRateOneHotel($(this), _hotelIdInt, _checkInDate, _checkOutDate, _hotelName, crsfToken, _signature, function (err, result) {
        if (err) {
          var errMessage = err.stack ? err.stack : 'Có lỗi xảy ra.';
          console.log(_hotelIdInt, errMessage);
        }
        else {
          if (result && result.arrLoaiPhong) {
            var priceHtml = '';
            if(result.isHotelRateLevelWeb){
              var minRateHotel = Math.ceil(parseFloat(result.minRateHotel) / 1000);
              priceHtml = '<p class="hotel-price">\
                    '+ minRateHotel.toLocaleString('vi-VN') +'<small>.000</small><br>\
                    <span>VNĐ/đêm</span>\
                    </p>';
            } else if(result.isHotelRateLevelBGT){
              priceHtml = '<a class="clicklaygia mihawk-view-best-price" id="clickbestpricebooking" title="Giá rất tốt tại khách sạn này không được công bố trên website, vui lòng click và điền địa chỉ email để nhận báo giá">\
                  <span>Click Để Lấy Giá</span></a>';
            } else if(result.isHotelRateLevelPhone){
              priceHtml = '';
            }
            $objLinkDetailRate.parents('article').find('div.col-hotel-price-box').html(priceHtml);

          }
        }
      });
    });
  },
  /** Function get Detail Room Rate One Hotel **/
  getAndAppendDetailRoomRateOneHotel: function ($obj, hotelIdInt, checkInDate, checkOutDate, hotelName, _crsfToken, _signature, callback) {
    var _detaiDiv = $obj.closest('.hotel-item').find('.hotel-price-detail:first');
    var _url = "/napi/ajax/hotel-search-room-price.njsx?_="+ $.getTimeStampValue();
    $.ajax({
      type: "POST",
      url: _url,
      data: {
        hotelIdInt: hotelIdInt,
        checkIn: checkInDate,
        checkOut: checkOutDate,
        _csrf: $.GetCsrfToken()
      },
      success: function (results) {

        var htmlHotelPrice = Chudu24.Hotels.SearchHotel.Events.getHtmlHotelPriceDetailsV3(results.data, hotelName);

        _detaiDiv.html(htmlHotelPrice);
        $('a', _detaiDiv).each(function () {
          var href = $(this).attr('href');
          if (href != null && href.indexOf('khuyen-mai') > -1) {
            $(this).attr('href', '/' + href.substring(1).replace('/khuyen-mai', '').replace(/\//g, '.') + '#RoomTypes');
          }
        });
        $('.memberdiscount', $(_detaiDiv)).empty();
        _detaiDiv.find('.close').click(function () {
          _detaiDiv.html('').hide();
        });
        _detaiDiv.find('td.bookroom a').addClass('btn btn-sm btn-primary');
        _detaiDiv.find('div.SigTip').sigtip(Chudu24.Hotels.SearchHotel.sigtipSettings);

        _detaiDiv.find('div.divClickDeLayGiaText').unbind('click').click(function () {
          ga('send', 'event', 'Tracking-bookgiatot', 'tracking-clicklaygia', hotelName + '-' + hotelIdInt + '-laygia');
          Chudu24Tracking.saveTracking(['Tracking-bookgiatot', 'tracking-clicklaygia', hotelName, hotelIdInt, 'click', 'pc']);
          var _dia = $('#divBGT').clone(true).show();
          var _title = _dia.attr('title');
          var _dialog = _dia.dialog({
            open: function (event, ui) {
              Chudu24Tracking.saveTracking(['Tracking-bookgiatot', 'tracking-clicklaygia', hotelName, hotelIdInt, 'open', 'pc']);
              ga('send', 'event', 'Tracking-bookgiatot', 'tracking-open', hotelName + '-' + hotelIdInt + '-openpp');
            },
            width: 600,
            title: _title,
            modal: true,
            create: function (event, ui) {
              var _this = $(event.target);
              if ($("button", $(".ui-dialog-titlebar", _this.parent())).length > 0) {
                $("button", $(".ui-dialog-titlebar", _this.parent())).before('<a href="#" role="button">Đóng</a>');
              }
              else {
                $(".ui-dialog-titlebar", _this.parent()).append('<a href="#" role="button">Đóng</a>');
              }
              $("a[role='button']", $(".ui-dialog-titlebar", _this.parent())).click(function (e) {
                e.preventDefault();
                _this.dialog("close");
              });
              _dia.find('#btnBGTSubmit').attr('hotelname', hotelName);
            }
          });

          Chudu24.Master.verifySignature(hotelIdInt, _signature, Chudu24.Hotels.key_reload, $obj.closest('.hotel-item'));

          _dia.find('#btnBGTSubmit').unbind('click').click(function (e) {
            var _hotelName = $(this).attr('hotelname');
            var _email = _dia.find('#txtBGTEmail').val().trim();
            $('.help-block1', _dia).remove();
            if (_email.length <= 0 || $.IsValid_Email(_email) != true) {
              _dia.find('#txtBGTEmail').addClass('error1');
              $('#txtBGTEmail', _dia).after('<span class="help-block1">- Vui lòng nhập email </span>');
            } else {
              _dia.find('#txtBGTEmail').removeClass('error1');
            }

            var _mobile = _dia.find('#txtBGTMobile').val().trim();
            //if (_mobile.length <= 0 || $.IsValid_Phone(_mobile) != true) {
            if ($.isEmpty(_mobile) || $.IsValid_Phone(_mobile) != true) {
              _dia.find('#txtBGTMobile').addClass('error1');
              $('#txtBGTMobile', _dia).after('<span class="help-block1">- Vui lòng nhập số di động </span>');
            } else {
              _dia.find('#txtBGTMobile').removeClass('error1');
            }

            if (_dia.find('.error1').length <= 0) {
              $(this).prop('disabled', 'disabled');
              $('i', this).addClass("fa-spinner fa-spin");
              Chudu24.MI_HAWK.saveBestPrice(hotelIdInt,hotelName);
              //Chudu24.Hotels.SearchHotel.Tools.GuiEmailBaoGia(HotelIdInt, _hotelName, _email, _mobile, _dia);
              if (Chudu24.Master.enable_crsf === true)
                Chudu24.Master.GuiEmailBaoGiaV2_crsf(hotelIdInt, _hotelName, _email, _mobile, _dia, _crsfToken, _signature, Chudu24.Hotels.key_reload);
              else
                Chudu24.Master.GuiEmailBaoGia(hotelIdInt, hotelName, _email, _mobile, _dia);
            }
            ga('send', 'event', 'Tracking-bookgiatot', 'tracking-submitBookGiaTot', hotelName + '-' + hotelIdInt + '-submit');

            Chudu24Tracking.saveTracking(['Tracking-bookgiatot', 'tracking-submitBookGiaTot', hotelName, hotelIdInt, 'submit', 'pc']);
          });
        });
        if (typeof callback == 'function') {
          return callback(null, results.data);
        }
      },
      error: function (xhr, status, error) {
        _detaiDiv.html('');
        if (typeof callback == 'function') {
          var newError = new Error(error ? error : 'Không lấy được chi tiết giá khách sạn!');
          return callback(newError);
        }
      }
    });
  },

};

$(function () {
  Chudu24.Hotels.SearchHotel.Init();
});
