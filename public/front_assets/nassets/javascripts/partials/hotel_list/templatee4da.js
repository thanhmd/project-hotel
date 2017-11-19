if (typeof Chudu24 == "undefined")
  var Chudu24 = {};
if (typeof Chudu24.Hotels == "undefined")
  Chudu24.Hotels = {};
if (typeof Chudu24.Hotels.SearchHotels == "undefined")
  Chudu24.Hotels.SearchHotels = {};

Chudu24.Hotels.SearchHotels.TEMPLATES = {
  Init: function () {

  },

  MAIN: '\
      [/NAV_PAGING]\
      <div class="page-body">\
      [/HOTELS]\
      </div>\
      [/BANNER_ADVERT]\
      <div class="paging-bottom-center">[/PAGING_BOTTOM]</div>',

  //<span class="hotel-result-count">{0} khách sạn</span>\
  NAV_PAGING: '\
      <div class="page-top search-result">\
        <div class="text-result">\
          <div class="col-md-12 divhotel-result-count">\
            <div class="paging">\
              [/PAGING]\
            </div>\
          </div>\
          <div style="clear: both"></div>\
          [/GROUP_FILTER]\
        </div>\
        <nav class="navbar navbar-default">\
          <div class="container-fluid">\
            <div class="navbar-header">\
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">\
                <span class="sr-only">Toggle navigation</span>\
                <span class="icon-bar"></span>\
                <span class="icon-bar"></span>\
                <span class="icon-bar"></span>\
              </button>\
              <a class="navbar-brand">Sắp xếp:</a>\
            </div>\
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">\
              <ul class="nav navbar-nav" id="sort-bar">\
                <li class="dropdown active">\
                  <a href="#" class="dropdown-toggle btn-ordBy" orderby="" role="button" aria-haspopup="true" aria-expanded="false">Phổ biến</a>\
                </li>\
                <li class="dropdown">\
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiêu chuẩn</a>\
                  <ul class="dropdown-menu">\
                    <li><a class="btn-ordBy" href="#" orderby="StarDESC">Tiêu chuẩn 5-1</a></li>\
                    <li><a class="btn-ordBy" href="#" orderby="Star">Tiêu chuẩn 1-5</a></li>\
                  </ul>\
                </li>\
                <li class="dropdown">\
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Giá </a>\
                  <ul class="dropdown-menu">\
                    <li><a class="btn-ordBy" href="#" orderby="LowRateDESC">Giá từ cao-thấp</a></li>\
                    <li><a class="btn-ordBy" href="#" orderby="LowRate">Giá từ thấp-cao</a></li>\
                  </ul>\
                </li>\
                <li class="dropdown">\
                  <a href="#" class="dropdown-toggle btn-ordBy" orderby="Promotion" role="button" aria-haspopup="true" aria-expanded="false">Khuyến mãi</a>\
                </li>\
                <li class="dropdown">\
                  <a href="#" class="dropdown-toggle btn-ordBy" orderby="Review" role="button" aria-haspopup="true" aria-expanded="false">Đánh giá</a>\
                </li>\
              </ul>\
            </div>\
          </div>\
        </nav>\
      </div>',

  /**
   *
   */
  PAGING: '\
      <div id="divPages" visible="false">\
        <nav class="pagination-main" data-page-count="{0}">\
          <ul class="pagination">\
            [/MAIN_PAGING]\
          </ul>\
        </nav>\
      </div>',

  /**
   */
  PAGING_ACTIVE: '\
      <li class="page <%= p == _PageNum ? "active" : "" %>"><a href="javascript:;"><%= p %></a></li>\
      ',

  /**
   *
   */
  HOTELS: '\
      <article class="post-hotel-list-item hotel-item" idint="{0}" hotel-name="{1}" ItemCounter="{2}">\
        <div class="row-height">\
          <div class="post-thumbnail">\
            <a href="{3}" title="{4}">\
              <img class="lazy" src="/nassets/assets/images/spacer.gif" data-original="{5}?w=250&h=200" alt="{6}" />\
              <noscript>\
                <img src="{7}?w=250" alt="{8}" />\
              </noscript>\
            </a>\
            [/GOOD_PRICE]\
          </div>\
          <div class="post-features">\
            <h2><a title="{9}" href="{10}">{11}</a></h2>\
            <div class="post-rating">\
              <ul class="list-inline">\
                <li><img border="0" alt="{12}" src="/nassets/img/rating/star-yellow-{13}.gif" /></li>\
              </ul>\
              <div class="post-rating-reviews">\
                <span>\
                  <i class="fa fa-thumbs-up">&nbsp;</i>\
                  <span class="generateWrapLink lnkReview" other="" title="Đánh Giá" wraplink="{14}#CustomerReviews">{15} đánh giá</span>\
                </span>\
              </div>\
            </div>\
            <div class="post-location">\
            <span>{16}, {17}&nbsp;&nbsp;&nbsp;&nbsp;<span class="generateWrapLink" wraplink="{18}#maplocation" other="class="lnkMap""><i class="fa fa-map-marker">&nbsp;</i>Bản đồ</span></span>\
              [/DISTANCE]\
            </div>\
            <hr />\
            <div class="post-features-list">\
              <ul class="list-unstyled list-icon">\
                [/FREE_BREAKFAST]\
                [/FREE_WIFI]\
                [/HAS_SWIMMING_POOL]\
                [/HAS_PRIVATE_BEACH]\
                [/HAS_MEETING_ROOM]\
              </ul>\
            </div>\
            <a class="view-imgs-link btnPriceDetail" isshowprice="{22}" isshowpromotionprice="{23}" href="#">Xem chi tiết giá phòng <i class="fa fa-angle-double-right"></i></a>\
          </div>\
          <div class="post-desc">\
            <div class="price-zone">\
              [/PRICE]\
            </div>\
            <div class="col-hotel-price-assistance">\
              <p class="hotel-price-assistance">Giá thành viên, gọi<br>\
              <a href="tel:1900 5454 40">1900 5454 40</a></p>\
            </div>\
            <div class="col-hotel-post-link">\
              <p class="hotel-post-link">\
                <a href="/ks.{19}.{20}.html#datphong" title="Đặt phòng {21}" class="btn btn-primary btnReser">Đặt phòng</a>\
              </p>\
            </div>\
          </div>\
        </div>\
        <div class="hotel-price-detail">\
        </div>\
      </article>',

  /**
   * <%= MP.Tools.WebUtility.SafeTagAttrValue(hotel.IsGoodPriceNotes) %>
   */
  GOOD_PRICE: '\
      <div class="post-badge badge-popular" title="{0}">Yêu thích</div>\
      ',

  /**
   *
   */
  DISTANCE: '\
      <span>cách {0} <b>{1} km</b></span>\
      ',

  /**
   *
   */
  FREE_BREAKFAST:'\
      <li><i class=\"fa fa-check-square-o\"></i> Ăn sáng miễn phí</li>\
      ',

  FREE_WIFI:'\
      <li><i class=\"fa fa-check-square-o\"></i> Wifi miễn phí</li>\
      ',

  HAS_SWIMMING_POOL:'\
      <li><i class=\"fa fa-check-square-o\"></i> Hồ bơi</li>\
      ',

  HAS_PRIVATE_BEACH:'\
      <li><i class=\"fa fa-check-square-o\"></i> Bãi biển riêng</li>\
      ',

  HAS_MEETING_ROOM:'\
      <li><i class=\"fa fa-check-square-o\"></i> Dịch vụ hội họp</li>\
      ',

  /**
   *
   */
  SHOW_PRICE:'\
      <div class="col-hotel-price-box">\
        <p class="hotel-price">\
        {0}<small>.000</small><br />\
        <span>VNĐ/đêm</span>\
        </p>\
      </div>\
      ',

  /**
   * <%= ((MemberLevel == 3 ? hotel.MinrateVnd : hotel.MinNormalRate) / 1000).ToString(DecimalEN) %>
   */
  GET_PRICE:'\
      ',

  /**
   * if (hotel.IsShowSearchBox && hotel.MinrateVnd > 0)
   */
  SHOW_SEARCH_BOX: '\
      <div class="hotel-price-box col-hotel-price-box"><a class="clicklaygia" title="Giá rất tốt tại khách sạn này không được công bố trên website, vui lòng click và điền địa chỉ email để nhận báo giá"><span>Click Để Lấy Giá</span></a></div>\
      ',

  /**
   * 0/ <%= (DiscountPercentageForMemberExisted) ? string.Empty : "hide" %>
   * 1/ <%=MemberLevel!=3 ? "Giảm cho<br />thành viên" : string.Empty%>
   */
  PRICE_DETAILS:'\
      <table class="search-result-roomtype" style="width: 100%">\
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
      [/CHOUPONS]\
      [/PROMOTIONS]\
      [/ROOMS]\
      </table>',

  /**
   *  0/ <%# Eval("ChouponId")%>/<%# _UnicodeConversion.GetStringId(Eval("ChouponName").ToString())%>
   *  1/ <%#Eval("ChouponName")%>
   *  2/ <%# MP.Tools.WebUtility.DisplayPrice(Convert.ToDecimal(Eval("BuyPrice")), Currency)%>
   *  3/ <%= (DiscountPercentageForMemberExisted) ? string.Empty : "hide" %>
   *  4/ <%# Eval("ChouponId")%>/<%# _UnicodeConversion.GetStringId(Eval("ChouponName").ToString())%>
   *  5/ <%#Eval("ChouponName")%>
   *  6/ <%# GetLocalResourceObject("divClickDeLayGia.Title") %>
   *  7/ <%# GetLocalResourceObject("divClickDeLayGia.Text") %>
   *  8/ <a class="lnkBookHotel clearfix Choupon" href="//choupon.chudu24.com/khachsan/{4}.html">Đặt Phòng</a>\
   */
  CHOUPONS_PUBLIB:'\
      <tr class="search-result-row-item-single">\
        <td class="room1 orange">\
          <a href="{0}" class="orange">Choupon <b {4}>{1}</b></a></td>\
           <td class="totalprice">\
           <div style="text-align:right;padding-right:20px;">\
            {2}<span class="thd">.000</span>\
           </div>\
           </td>\
           <td class="memberdiscount {3}">&nbsp;</td>\
              <td class="bookroom quiet">\
              </td>\
      </tr>\
      ',

  /**
   * 0/ <%#Eval("ChouponName")%>
   * 1/ <%# GetLocalResourceObject("divClickDeLayGia.Title") %>
   * 2/ <%# GetLocalResourceObject("divClickDeLayGia.Text") %>
   */
  CHOUPONS_PRIVATE: '\
    <tr class="search-result-row-item-single">\
      <td class="room1 orange"> <a href="{3}"><b {2}>{0}</b></a>\
        <div style="font-size: .8em; font-weight: normal; font-style: italic; padding-top: 2px; color: #666;">chỉ dành riêng cho khách hàng thành viên nhận thư khuyến mãi</div>\
      </td>\
      <td colspan="3" style="">\
        <div id="divNoRate" class="divNoRate SigTip" title="Chudu24 tự hào mang đến khách hàng mức giá thấp tại hàng loạt các khách sạn đối tác Vàng của Chudu24. Tuy nhiên mức giá này không áp dụng cho các đặt phòng trực tuyến. Để có được mức giá thấp, xin vui lòng đặt phòng qua tổng đài 1900 5454 40 hoặc gởi yêu cầu cho chúng tôi."></div>\
        <div class="SigTip hide" title="{1}">\
          <div style="float:left;">\
            <div class="divClickDeLayGiaText">Click Để Lấy Giá</div>\
          </div>\
          <div style="font-weight:normal;font-size:.7em;float:left;margin-top:3px;" class="blue">tại sao?</div>\
          <div class="clear"></div>\
        </div>\
      </td>\
    </tr>\
  ',

  /**
   * 0/ <%#HotelIdInt%>
   * 1/ <%#HotelTextId%>
   * 2/ <%#Eval("Name")%>
   * 3/ <%= (DiscountPercentageForMemberExisted) ? string.Empty : "hide" %>
   * 4/ <%# MP.Tools.KhachSan.BookingUrl + "?HotelIdInt=" + HotelIdInt.ToString() + "&PromotionId=" + Eval("Id").ToString() %>
   */
  PROMOTIONS:'\
      <tr class="search-result-row-item-single">\
        <td class="room1 orange">\
          <a href="/ks.{0}.{1}.html#RoomTypes" class="orange"><b {5}>{2}</b></a>\
          <span style="font-size: 8pt; font-weight: normal; {6}">&nbsp;&nbsp;(Khuyến mãi)</span>\
        </td>\
        <td class="totalprice">\
          [/SHOW_PRICE_PROMOTION]\
        </td>\
        <td class="memberdiscount {3}">\
          <div id="divDiscountPercentageForMember" visible="false" class="divDiscountPercentageForMember divDangKyThanhVien SigTip" title="Giá thành viên chỉ dành cho thành viên Chudu24. <br>Click để đăng nhập hoặc đăng ký thành viên ngay!"></div>\
          <div id="divNormalRateExtra" visible="false" class="divDiscountPercentageForMember SigTip" title="Giảm thêm trên giá thường chỉ cho thành viên Chudu24!"></div>\
        </td>\
        <td class="bookroom quiet">\
          <a class="lnkBookHotel clearfix" href="{4}" rel="nofollow">Đặt Phòng</a>\
        </td>\
      </tr>\
      ',

  /**
   * 0/ <%#Eval("RoomName")%>
   * 1/ <%#(Convert.ToBoolean(Eval("IsBreakfastIncluded"))) ? " <span style=""font-size:8pt;white-space:nowrap;color:#aaa;"">(bao gồm ăn sáng)</span>" : "">
   * 2/ <%= (DiscountPercentageForMemberExisted) ? string.Empty : "hide" %>
   * 3/ <%# "/ks." + HotelIdInt.ToString() + "." + HotelTextId + ".dat-phong." + Eval("RoomTypeIdInt").ToString() + "." + _UnicodeConversion.GetStringId(Eval("RoomName").ToString()) + ".html" %>
   */
  ROOMS:'\
      <tr class="search-result-row-item-single">\
        <td class="room1 quiet">\
          {0}{1}\
        </td>\
        <td class="totalprice">\
          [/SHOW_PRICE_ROOM]\
        </td>\
        <td class="memberdiscount {2}">\
          <div id="divDiscountPercentageForMember" visible="false" class="divDiscountPercentageForMember divDangKyThanhVien SigTip" title="Giá thành viên chỉ dành cho thành viên Chudu24. <br>Click để đăng nhập hoặc đăng ký thành viên ngay!"></div>\
          <div id="divNormalRateExtra" runat="server" visible="false" class="divDiscountPercentageForMember SigTip" title="Giảm thêm trên giá thường chỉ cho thành viên Chudu24!"></div>\
        </td>\
        <td class="bookroom quiet">\
          {3}\
        </td>\
      </tr>',

  /**
   * 0/ <%#Eval("RoomName")%>
   * 1/ <%#(Convert.ToBoolean(Eval("IsBreakfastIncluded"))) ? " <span style=""font-size:8pt;white-space:nowrap;color:#aaa;"">(bao gồm ăn sáng)</span>" : "">
   * 2/ <%= (DiscountPercentageForMemberExisted) ? string.Empty : "hide" %>
   * 3/ <%# "/ks." + HotelIdInt.ToString() + "." + HotelTextId + ".dat-phong." + Eval("RoomTypeIdInt").ToString() + "." + _UnicodeConversion.GetStringId(Eval("RoomName").ToString()) + ".html" %>
   * 4/ Roomtype class
   */
  ROOMS_V2:'\
      <tr class="search-result-row-item-single">\
        <td class="room1 quiet {4}">\
          {0}{1}\
        </td>\
        <td class="totalprice">\
          [/SHOW_PRICE_ROOM]\
        </td>\
        <td class="memberdiscount {2}">\
          <div id="divDiscountPercentageForMember" visible="false" class="divDiscountPercentageForMember divDangKyThanhVien SigTip" title="Giá thành viên chỉ dành cho thành viên Chudu24. <br>Click để đăng nhập hoặc đăng ký thành viên ngay!"></div>\
          <div id="divNormalRateExtra" runat="server" visible="false" class="divDiscountPercentageForMember SigTip" title="Giảm thêm trên giá thường chỉ cho thành viên Chudu24!"></div>\
        </td>\
        <td class="bookroom quiet">\
          <a class="lnkBookHotel clearfix" href="{3}" rel="nofollow">Đặt Phòng</a>\
        </td>\
      </tr>',
  /**
   * BANNER_ADVERT
   */
  BANNER_ADVERT: '\
      <div style="margin-bottom:20px;">\
        <a href="{0}" title="{1}">\
          <img src="{2}" alt="{3}" style="width:100%; height:auto;" />\
        </a>\
      </div>'

};

$(function () {
  Chudu24.Hotels.SearchHotels.TEMPLATES.Init();
});