/**
 * Created by chudu24 on 14/09/2016.
 */
if (typeof Chudu24 == 'undefined') {
  var Chudu24 = {};
}
if (typeof Chudu24.Hotels == 'undefined') {
  Chudu24.Hotels = {};
}
if (typeof Chudu24.Hotels.FilterHotelNew == 'undefined') {
  Chudu24.Hotels.FilterHotelNew = {};
}

(function(ft){

  var SELECTOR_TOOLBAR = '#search-result .group-filter-top';
  var FILTER_TOOLBAR = {
    CONTENT: {
      selector: SELECTOR_TOOLBAR + ' .filter-publish'
    },
    BUTTON_FILTER: {
      selector: SELECTOR_TOOLBAR + ' .btn-xs.link-element'
    }
  };

  var FILTER_PARAM, _hasInit = false;

  ft.initToolbar = _init;
  function _init(FP) {
    if(_hasInit) return;
    _hasInit = true;
    FILTER_PARAM = FP;
  }


  ft.renderToolbar = _renderToolbar;
  function _renderToolbar(paramCr) {
    var htmlResult = '';
    for(var p in paramCr) {

      var tmpPConf = FILTER_PARAM[p];
      var tmpPV = paramCr[p];
      if(!Array.isArray(tmpPV)) {
        tmpPV = [tmpPV];
      }

      for(var i = 0, leni = tmpPV.length; i < leni; i++) {

        if(tmpPConf.includeToolbar) {
          var tmpSel = tmpPConf.selector.parent + (tmpPConf.selector.value || "");
          tmpSel += "[value='" + tmpPV[i] + "']" + ' a';
          var tmpText = $(tmpSel).text();
          if(tmpText.length > 0) {
            htmlResult += '<a data-name="' + p + '" data-value="' + tmpPV[i] + '" class="btn btn-success btn-xs link-element" title="Xóa mục này">';
            htmlResult += tmpText;
            htmlResult += '<span class="glyphicon glyphicon-remove icon-remove"></span>';
            htmlResult += '</a> ';
          }
        }

      }

    }
    $(FILTER_TOOLBAR.CONTENT.selector).html(htmlResult);
    if(_checkDisplay()) {
      _listenRemoveFilter();
    }
  }

  function _checkDisplay() {
    var selectorToolbar = '.group-filter-top';
    if($(selectorToolbar + " .btn-xs").length > 0) {
      $(selectorToolbar).removeClass('hidden');
      return true;
    } else {
      $(selectorToolbar).addClass('hidden');
      return false;
    }
  }

  function _listenRemoveFilter() {
    $(FILTER_TOOLBAR.BUTTON_FILTER.selector).click(function () {
      var self = $(this);
      var paramName = self.data('name'), paramValue = self.data('value');
      var tmpPConf = FILTER_PARAM[paramName];
      if(tmpPConf) {
        var tmpSel = FILTER_PARAM[paramName].selector;
        if(tmpSel) {
          $(tmpSel.parent + tmpSel.value + "[value='" + paramValue +"']").trigger('click');
        }
      }
      self.remove();
      return false;
    })
  }




})(Chudu24.Hotels.FilterHotelNew);