if (typeof Chudu24 == "undefined")
  var Chudu24 = {};
if (typeof Chudu24.Hotels == "undefined")
  Chudu24.Hotels = {};
if (typeof Chudu24.Hotels.UserControls == "undefined")
  Chudu24.Hotels.UserControls = {};

Chudu24.Hotels.UserControls.SearchPanel = {
  Init: function () {
    moment.locale('vi');
    var thisObj = Chudu24.Hotels.UserControls.SearchPanel;

    thisObj.LoadPage();
    thisObj.Events();
  },
  Events: function () {
    var PAGE_TIM_KS = '/';

    $(document).on('click', '.search-panel .datepicker-btn', function (e) {
      $('.hasDatepicker', $(this).parent()).focus();
    });

// Autocomplete Hotelname
    var ajaxCall = null;
    $('.search-panel #hotelName').autocomplete({
      source: function (request, response) {
        ajaxCall = $.ajax({
          //url: "/WebServices/WebServices.asmx/SearchHotel_AutoComplete",
          url: "/napi/ajax/hotel-search",
          //data: "{ 'HotelName': '" + request.term + "', 'Limit': '10' }",
          data: { hotelName: request.term , limit: 10, _csrf: $.GetCsrfToken() },
          //dataType: "json",
          type: "POST",
          //contentType: "application/json; charset=utf-8",
          dataFilter: function (data) { return data; },
          success: function (data) {
            $(".search-panel .relative i.hotelloading").hide();
            response($.map(data.d, function (item) {
              return {
                value: item._source.hotelid
                , label: item._source.hotelname
                , HotelIdInt: item._source.hotelidint
                , CityName: item._source.cityname
                , HotelName: item._source.hotelname
                , HotelTextId: Chudu24.Core.MakeLinkFromUnicode(item._source.hotelname)
                , cache: false
              }
            }))
          }
        });
      },
      minLength: 2,
      search: function (event, ui) {
        $(this).parents("div.relative").find("i.hotelloading").show();
        if (ajaxCall != null) {
          ajaxCall.abort();
        }
      },
      focus: function (event, ui) {
        $("#hotelName").val(ui.item.HotelName);
        $("#hotelName").attr("HotelId", ui.item.value);
        $("#hotelName").attr("HotelIdInt", ui.item.HotelIdInt);
        $("#hotelName").attr("HotelTextId", ui.item.HotelTextId);
        return false;
      },
      select: function (event, ui) {
        $("#hotelName").val(ui.item.HotelName);
        $("#hotelName").attr("HotelId", ui.item.value);
        $("#hotelName").attr("HotelIdInt", ui.item.HotelIdInt);
        $("#hotelName").attr("HotelTextId", ui.item.HotelTextId);
        return false;
      },
      open: function () {
        $("#hotelName").attr("HotelId", "");
        $("#hotelName").attr("HotelIdInt", "");
        $("#hotelName").attr("HotelTextId", "");
      }
    }).autocomplete("instance")._renderItem = function (ul, item) {
      return $("<li>")
        .append("<i class='fa fa-hotel'></i> <a>" + item.label + " - <span>" + item.CityName + "</span></a>")
        .appendTo(ul);
    };

    $(document).on('change', '.search-panel #optAttraction', function (e) {
      $(this).removeClass('short');

      if ($.trim($('option:selected', this).attr('attraction')).length) {
        $(this).addClass('short');
      }
    });


    $(document).on('click', '.search-panel #btnSearch', function (e) {

      e.preventDefault();
      var me = $('.search-panel');
      var url = '/search';//var url = 'https://khachsan.chudu24.com/M/Reservations_v2/RedirectToSearch.aspx';
      var foundClause = false;

      var CheckInDate = $('#txtDateCheckin', me).val();
      var CheckOutDate = $('#txtDateCheckout', me).val();
      var Attraction = $('#optAttraction', me).val();
      var Hotel = $('#hotelName', me).val();

      var additionUrl = '';

//if (CheckInDate == null || !CheckInDate.length) {
      if (!/^\d{2}\/\d{2}\/\d{4}$/.test(CheckInDate)) {
        Chudu24.Notification.Message("error", "Ngày nhận phòng không hợp lệ", "Lỗi tìm kiếm");
        return;
      }

//if (CheckOutDate == null || !CheckOutDate.length) {
      if (!/^\d{2}\/\d{2}\/\d{4}$/.test(CheckOutDate)) {
        Chudu24.Notification.Message("error", "Ngày trả phòng không hợp lệ", "Lỗi tìm kiếm");
        return;
      }

      // CHECK VALID CHECK-IN, CHECK-OUT BY MOMENT
      var isCheckInValid = Chudu24.Master.isValidBookingDay(CheckInDate, false);
      if(!isCheckInValid){
        Chudu24.Notification.Message("error", "Ngày nhận phòng: '" + CheckInDate + "' không hợp lệ!", "Ngày không hợp lệ");
        return false;
      }
      var isCheckOutValid = Chudu24.Master.isValidBookingDay(CheckOutDate, true);
      if(!isCheckOutValid){
        Chudu24.Notification.Message("error", "Ngày trả phòng: '" + CheckOutDate + "' không hợp lệ!", "Ngày không hợp lệ");
        return false;
      }

      if ((Attraction == null || !Attraction.length) && (Hotel == null || !Hotel.length)) {
        Chudu24.Notification.Message("error", "Xin nhập tên thành phố hoặc khách sạn", "Lỗi tìm kiếm");
        return;
      }

      var expiresDate = new Date();
      expiresDate.setDate(expiresDate.getDate() + 1);
      if (CheckInDate.length > 0) {
        additionUrl += '&ArrivalDate=' + escape(CheckInDate);
        $.SetCookie('CheckInDate', CheckInDate, 1, '.chudu24.com');
      }
      if (CheckOutDate.length > 0) {
        additionUrl += '&DepartureDate=' + escape(CheckOutDate);
        // Set Cookie  checkOutDate
        $.SetCookie('CheckOutDate', CheckOutDate, 1, '.chudu24.com');

      }

// Prioritize to choose a Hotel
      if ($("#hotelName", me).attr("HotelIdInt")
        && $("#hotelName", me).attr("HotelIdInt").length > 0
        && $("#hotelName", me).attr("HotelTextId")
        && $("#hotelName", me).attr("HotelTextId").length > 0) {

        var HotelTextId = $("#hotelName", me).attr("HotelTextId");
        var HotelIntId = $("#hotelName", me).attr("HotelIdInt");

        url = 'https://khachsan.chudu24.com/ks.' + HotelIntId + '.' + HotelTextId + '.html';
        //url += "?HotelTextId=" + escape(HotelTextId) + "&HotelIdInt=" + escape(HotelIntId);
        foundClause = true;

      } else if (($('#optAttraction option:selected', me).length > 0) && ($('#optAttraction option:selected', me).data('id'))) {
        var cityTextId = $('#optAttraction option:selected', me).val()
        url = PAGE_TIM_KS + 't.' + cityTextId;

        if ($('#optAttraction option:selected', me).attr('attraction').length > 0) {
          var attr = $('#optAttraction option:selected', me).attr('attraction');
          url += '/q.a.' + attr;
        }

        url += '.html';
        foundClause = true;

      } else if ($("#hotelName").val().length > 0) {
        var Keyword = $("#hotelName").val()
        url += "?q=" + escape(Keyword.trim().replaceAll('  ',' ').replaceAll(' ','+').replaceAll('++','+'));
        foundClause = true;
      }

      if (foundClause) {
        Chudu24.MI_HAWK.searchPanel();
        //CODE OLD
        /*url += additionUrl;
         url += "&V=v2";*/
        window.location = url;
      }
    });

  },
  LoadPage: function () {

    var me = $('.search-panel');

    var checkIn = $.GetCookie('CheckInDate');
    var checkOut = $.GetCookie('CheckOutDate');
    var cityTextId = $.GetCookie('CityTextId');
    var $divParam = $("div#params");
    var pramCityTextId = $divParam.attr("textid");
    if (!$.isEmptyObject(pramCityTextId) && ($.isEmptyObject(cityTextId) || $.trim(pramCityTextId) != $.trim(cityTextId))) {
      $.SetCookie('CityTextId', pramCityTextId, 1, '.chudu24.com');
      cityTextId = pramCityTextId;
    }
    var attractionTextId = $.GetCookie('AttractionTextId');
    var pramAttractionTextId = $divParam.attr("attractiontextid");
    if ((!$.isEmptyObject(pramAttractionTextId) || pramAttractionTextId =="") && ($.isEmptyObject(attractionTextId) || $.trim(pramAttractionTextId) != $.trim(attractionTextId))) {
      $.SetCookie('AttractionTextId', pramAttractionTextId, 1, '.chudu24.com');
      attractionTextId = pramAttractionTextId;
    }

    if (checkIn == null) {
      checkIn = moment().add(1, 'day').format('DD/MM/YYYY');
    } else {
      checkIn = $.HtmlDecode(checkIn);
    }

    if (checkOut == null) {
      checkOut = moment().add(2, 'day').format('DD/MM/YYYY')
    } else {
      checkOut = $.HtmlDecode(checkOut);
    }

    $('.search-panel #txtDateCheckin').val(checkIn);

    $('.search-panel #txtDateCheckin').datepicker({
      numberOfMonths: 2,
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      minDate: new Date(),
      onClose: function (dateText, inst) {
        var checkIn = moment(dateText, "DD/MM/YYYY");
        var checkOut = moment($('.search-panel #txtDateCheckout').val(), "DD/MM/YYYY");
        var next = moment(dateText, "DD/MM/YYYY").add(1, 'day');

        if (checkIn.toDate() >= checkOut.toDate()) {
          $('.search-panel #txtDateCheckout').val(next.format('DD/MM/YYYY'));
        }

        $('.search-panel #txtDateCheckout').datepicker('option', 'minDate', next.toDate());
      }
    });

    $('.search-panel #txtDateCheckout').val(checkOut);
    $('.search-panel #txtDateCheckout').datepicker({
      numberOfMonths: 2,
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      minDate: moment(checkIn, 'DD/MM/YYYY').add(1, 'day').toDate()
    });

    if (cityTextId != null && cityTextId != '') {
      $('.search-panel #optAttraction').val(cityTextId);

      if (attractionTextId != null && $.trim(attractionTextId) != '') {
        $('.search-panel #optAttraction').find('[value="'+ cityTextId +'"][attraction="' + attractionTextId + '"]').attr('selected', true);
      }
    }

    getAttraction();
    getType();
    getStar();
    getPrice();
    getFacilities();

  }
};

$(function () {
  var thisObj = Chudu24.Hotels.UserControls.SearchPanel;

  thisObj.Init();
});


/**
 * PRIVATE FUNCTION
 */
/**
 *
 */
function getAttraction() {
  var dvParams = $('#params');

  var $this = $('#filterAttr .liAttraction');
  var attractions = dvParams.attr('attraction');

  if (attractions && attractions != '') {

    var arr = attractions.split(',').removeDuplicate(true).map(Number);

    if (arr && arr.length > 0) {
      for (var i = 0; i < arr.length; i++) {

        $this.each(function(e) {

          if (arr[i] == $(this).attr('value')) {
            $(this).find('*').addClass('active');
          }
        })
      }

      /*$('#filterAttr .btnClear').show();*/
    }
  }
}
/**
 * getType
 */
function getType() {

  var dvParams = $('#params');
  var $this = $('#filterAdvance .liType');
  var type = dvParams.attr('type');

  var arrType = [];
  arrType.push({ Id: 'resort', Name: 'Resort' });
  arrType.push({ Id: 'villa', Name: 'Villa' });
  arrType.push({ Id: 'khachsan', Name: 'Khách sạn' });
  arrType.push({ Id: 'canho', Name: 'Căn hộ' });


  if (type && type != '') {

    var arrParamType = type.split(',').removeDuplicate(false);

    if (arrParamType && arrParamType.length > 0) {

      for (var t = 0; t < arrType.length; t++) {

        if (arrParamType.indexOf(arrType[t].Id) > -1) {

          $($this[t]).find('*').addClass('active');
        }
      }

      /*$('#filterAdvance .btnClear').show();*/
    }
  }
}
/**
 * getPrice checked page load
 */
function getPrice() {
  var dvParams = $('#params');

  var $this = $('#filterPrice .liPrice');
  var price = dvParams.attr('price');
  var arrPrice = ['khuyenmai', '500', '500-1000', '1000-2000', '2000-5000', '5000'];

  if (price && price != '') {

    var arrParamPrice = price.split(',').removeDuplicate(false);

    if (arrParamPrice && arrParamPrice.length > 0) {

      for (var p = 0; p < arrPrice.length; p++) {

        if (arrParamPrice.indexOf(arrPrice[p]) > -1) {

          $($this[p]).find('*').addClass('active');
        }
      }

      /*$('#filterPrice .btnClear').show();*/
    }
  }
}
/**
 * getStar checked page load
 */
function getStar() {
  var dvParams = $('#params');

  var $this = $('#filterStar .liStar');
  var starRating = dvParams.attr('starrating');

  if (starRating && starRating != '') {

    var arr = starRating.split(',').removeDuplicate(true).map(Number);
    var index;

    if (arr && arr.length > 0) {
      for (var i = 0; i < arr.length; i++) {
        switch (arr[i]) {

          case 5:
            index = 0;
            break;

          case 4:
            index = 1;
            break;

          case 3:
            index = 2;
            break;

          case 2:
            index = 3;
            break;

          case 1:
            index = 4;
            break;
        }

        $($this[index]).find('*').addClass('active');
      }

      /*if (index != undefined && index >= 0) {
        $('#filterStar .btnClear').show();
      }*/
    }
  }
}

function getFacilities() {

  var arrFacilities = [];

  arrFacilities.push({ Id: 5, Name: 'Hội họp' });
  arrFacilities.push({ Id: 36, Name: 'Bãi biển riêng' });
  arrFacilities.push({ Id: 43, Name: 'Bãi đậu xe ôtô tại khách sạn' });
  arrFacilities.push({ Id: 65, Name: 'Điều hòa nhiệt độ' });
  arrFacilities.push({ Id: 56, Name: 'Đưa đón sân bay' });
  arrFacilities.push({ Id: 58, Name: 'Giặt ủi' });
  arrFacilities.push({ Id: 59, Name: 'Hồ bơi' });
  arrFacilities.push({ Id: 15, Name: 'Karaoke' });
  arrFacilities.push({ Id: 30, Name: 'Két an toàn' });
  arrFacilities.push({ Id: 19, Name: 'Massage' });
  arrFacilities.push({ Id: 20, Name: 'Nhà hàng khu ăn uống' });
  arrFacilities.push({ Id: 12, Name: 'Phòng tập thể dục' });
  arrFacilities.push({ Id: 44, Name: 'Phòng tiện nghi cho người khuyết tật' });
  arrFacilities.push({ Id: 55, Name: 'Thang máy' });
  arrFacilities.push({ Id: 7, Name: 'Trông giữ trẻ' });
  arrFacilities.push({ Id: 8, Name: 'Trung tâm thương vụ' });
  arrFacilities.push({ Id: 10, Name: 'Wifi / Internet có tính phí' });
  arrFacilities.push({ Id: 32, Name: 'Wifi / Internet miễn phí tại sảnh' });
  arrFacilities.push({ Id: 26, Name: 'Wifi / Internet miễn phí trong phòng' });
  arrFacilities.push({ Id: 11, Name: 'Xe bus ra trung tâm' });

  var dvParams = $('#params');

  var $this = $('#filterFac .liFac');
  var faciltities = dvParams.attr('facility');


  if (faciltities && faciltities != '') {

    var arr = faciltities.split(',').removeDuplicate(true).map(Number);

    if (arr && arr.length > 0) {
      for (var i = 0; i < arrFacilities.length; i++) {

        if (arr.indexOf(arrFacilities[i].Id) > -1) {

          $($this[i]).find('*').addClass('active');
        }
      }

      /*$('#filterFac .btnClear').show();*/
    }
  }
}