if (typeof Chudu24Tracking  == "undefined")
  var Chudu24Tracking = {};
if (typeof Chudu24Tracking.data == "undefined")
  Chudu24Tracking  = {};
Chudu24Tracking={
  Init: function () {
    Chudu24Tracking.trackingAdwords();
  },
  saveTracking: function (data) {
    var _data ={
      name_tracking:data[0] +'-'+ data[1],
      type_action: data[4],
      chanel: data[5],
      hotelidint: data[3],
      hotelname: data[2]
    }
    $.ajax({
      url: "/datphong/booking-tracking.html",
      data: JSON.stringify(_data),
      type: "POST",
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      beforeSend: function () {
      },
      success: function (data) {

      },
      error: function ()
      {

      }
    });

  },
  trackingAdwords: function(){
    var ptSource = $.GetURL('pt_source');
    var arrTags = [];
    if(!$.isEmpty(ptSource)){
      arrTags.push(ptSource.toLowerCase());
    }
    /*if(!$.isEmpty($.GetURL('pt_adgroupid'))){
      arrTags.push(('adwords:adgroupid-'+$.GetURL('pt_adgroupid').toLowerCase()));
    }*/
    if(!$.isEmpty($.GetURL('utm_source')) && $.GetURL('utm_source').toLowerCase() == 'criteo'){
      arrTags.push($.GetURL('utm_source').toLowerCase());
    }
    if(arrTags.length > 0){
      $.SetCookie('pt_source', arrTags.join(','), 30, '.chudu24.com');
    }
  }
};


$(function () {
  Chudu24Tracking.trackingAdwords();
  Chudu24Tracking.Init();
});
