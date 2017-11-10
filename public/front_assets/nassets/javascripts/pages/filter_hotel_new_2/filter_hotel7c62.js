if (typeof Chudu24 == 'undefined') {
  var Chudu24 = {};
}
if (typeof Chudu24.Hotels == 'undefined') {
  Chudu24.Hotels = {};
}
if (typeof Chudu24.Hotels.FilterHotelNew == 'undefined') {
  Chudu24.Hotels.FilterHotelNew = {};
}
(function (ft) {
  var SELECTOR_RIGHT_FILTER = '.main #secondary';
  var ELEMENT_RENDER = {
    primary: {
      selector:'.main #primary',
      isReplace: false
    },
    breadcrumbs: {
      selector:'#content .breadcrumbs',
      isReplace: true
    }
  };

  var FILTER_PARAM = {
    city: {
      paramName: 'city',
      putParamTo: 'path'
    },
    place: {
      isSingle: true,
      putParamTo: 'query',
      'enable': true
    },
    attraction: {
      paramName: 'attraction',
      classActive: 'active',
      attrContentValue: 'value',
      putParamTo: 'path',
      includeToolbar: true,
      isApplyNow: true,
      isSingle: true,
      level: 2,
      selector: {
        parent: SELECTOR_RIGHT_FILTER+' #filterAttr',
        value: ' li',
        active: '>'
      }
    },
    types: {
      paramName: 'types',
      classActive: 'active',
      attrContentValue: 'value',
      putParamTo: 'query',
      includeToolbar: true,
      isApplyNow: true,
      isSingle: true,
      level: 2,
      selector: {
        parent: SELECTOR_RIGHT_FILTER+' #filterAdvance',
        value: ' li',
        active: '>'
      }
    },
    stars: {
      paramName: 'stars',
      classActive: 'active',
      attrContentValue: 'value',
      putParamTo: 'query',
      includeToolbar: true,
      isApplyNow: true,
      level: 2,
      selector: {
        parent: SELECTOR_RIGHT_FILTER+' #filterStar',
        value: ' li',
        active: '>'
      }
    },
    prices: {
      paramName: 'prices',
      classActive: 'active',
      attrContentValue: 'value',
      putParamTo: 'query',
      includeToolbar: true,
      isApplyNow: true,
      level: 2,
      selector: {
        parent: SELECTOR_RIGHT_FILTER+' #filterPrice',
        value: ' li',
        active: '>'
      }
    },
    facilities: {
      paramName: 'facilities',
      classActive: 'active',
      attrContentValue: 'value',
      putParamTo: 'query',
      includeToolbar: true,
      isApplyNow: true,
      level: 2,
      selector: {
        parent: SELECTOR_RIGHT_FILTER+' #filterFac',
        value: ' li',
        active: '>'
      }
    },
    order: {
      paramName: 'order',
      classActive: 'active',
      attrContentValue: 'value',
      putParamTo: 'query',
      isSingle: true,
      isApplyNow: true,
      isDynamic: true,
      noUnselect: true,
      level: 3,
      defaultValue: '',
      selector: {
        parent: '#search-result #sort-bar',
        value: ' li',
        active: ''
      },
      effectChange: function() {
        $("#search-result #sort-bar li:not(.active)").removeClass('active');
        $("#search-result #sort-bar li:has(.active)").addClass('active');
      }
    },
    page: {
      paramName: 'page',
      classActive: 'active',
      attrContentValue: 'value',
      putParamTo: 'query',
      isSingle: true,
      isApplyNow: true,
      isDynamic: true,
      noUnselect: true,
      level: 4,
      defaultValue: 1,
      selector: {
        parent: '.main .content-body #divPages .pagination',
        value: ' li:not(.disabled)'
      }
    }
  };
  var FILTER_URL = {
    API_TIM_KS: '/napi/ajax/',
    PAGE_TIM_KS: '/'
  };

  var BUTTON_APPLY = {
    SORT_APPLY: {
      selector: '#popup-filters .btn-filter-apply',
      isReset: false
    },
    FILTER_RESET: {
      selector: '.group-filter-top .clear-all',
      isDynamic: true,
      isReset: true
    }
  };

  var _city, _paramsCr = {}, _paramsNew = {}, _hasInit = false, _levelSelect = 100, _paramsLevel = {};


  ft.init = _init;
  function _init(paramInit) {
    if(_hasInit) return;
    _hasInit = true;
    if(ft.initToolbar) ft.initToolbar(FILTER_PARAM);

    _paramsLevel = _classifyLevel();
    _paramsCr = _getParams();

    _city = paramInit.city;
    if(paramInit.attraction) {
      _paramsCr.attraction = paramInit.attraction;
    }

    Object.assign(_paramsNew, _paramsCr);
    _reActiveFilter();
    _listenBackUrl();
    _listenParamChange();
    _listenButtonApply();
  }

  function _ajaxFilter(isSilent, cb) {
    var _params = {};
    Object.assign(_params, _paramsCr);
    _params.city = _city;
    var urlPath =  _buildUrl(_params);
    $.ajax(FILTER_URL.API_TIM_KS+ urlPath, {cache: true}).done(function(result){
      if(result.error) {
        _logFilterError("Search hotel error:", result);
        if(result.data && result.data.urlRedirect) {
          window.location.replace(result.data.urlRedirect);
        }
        if(typeof cb == 'function') {
          cb(true);
        }
        return;
      }

      _renderData(result.data);
      var tmpData = {data: result.data, params: _params};
      if(!isSilent) {
        _changeUrl(FILTER_URL.PAGE_TIM_KS + urlPath, tmpData);
      }

      if(typeof cb == 'function') {
        cb(null, tmpData);
        Chudu24.MI_HAWK.filterAndSort(_params);
      }

      /** Call Reload MinRate Hotel  **/
      Chudu24.Hotels.SearchHotel.getMinRateAllCurrentHotel();

    }).fail(function(err){
      _logFilterError("Ajax send to search hotel error:", err);
      if(typeof cb == 'function') {
        cb(true);
      }
    });
  }

  function _renderData(data) {
    for(var i in ELEMENT_RENDER) {
      if(data[i]) {
        var tmpEl = ELEMENT_RENDER[i];
        if(tmpEl.isReplace) {
          $(tmpEl.selector).replaceWith(data[i]);
        } else {
          $(tmpEl.selector).html(data[i]);
        }

      }
    }
  }

  ft.buildUrl = _buildUrl;
  function _buildUrl(params) {
    var paramsGroup = {};
    for(var p in params) {
      if (params.hasOwnProperty(p)) {
        var tmpPWhere = FILTER_PARAM[p].putParamTo || 'query';
        if(!paramsGroup[tmpPWhere]) {
          paramsGroup[tmpPWhere] = {};
        }

        paramsGroup[tmpPWhere][p] = params[p];
      }
    }

    var tmpResult = '';
    if(paramsGroup['path'].city) {
      tmpResult += 't.' + paramsGroup['path'].city;
      if(paramsGroup['path'].attraction) {
        tmpResult += '/q.a.' + paramsGroup['path'].attraction;
      }
    }
    tmpResult += '.html';

    var qs = _buildQueryString(paramsGroup.query || {});
    if(qs.length > 0) {
      tmpResult += '?' + qs;
    }
    return tmpResult;
  }


  function _pathParams(pathDef, fields, queryParams) {
    var path = "";

    fields = fields || {};
    var regExp = /(:[\w\(\)\\\+\*\.\?]+)+/g;
    path += pathDef.replace(regExp, function(key) {
      var firstRegexpChar = key.indexOf("(");
      // get the content behind : and (\\d+/)
      key = key.substring(1, (firstRegexpChar > 0)? firstRegexpChar: undefined);
      // remove +?*
      key = key.replace(/[\+\*\?]+/g, "");

      // this is to allow page js to keep the custom characters as it is
      // we need to encode 2 times otherwise "/" char does not work properly
      // So, in that case, when I includes "/" it will think it's a part of the
      // route. encoding 2times fixes it
      return encodeURIComponent(encodeURIComponent(fields[key] || ""));
    });

    // Replace multiple slashes with single slash
    path = path.replace(/\/\/+/g, "/");

    // remove trailing slash
    // but keep the root slash if it's the only one
    path = path.match(/^\/{1}$/) ? path: path.replace(/\/$/, "");

    var strQueryParams = _buildQueryString(queryParams || {});
    if(strQueryParams) {
      path += "?" + strQueryParams;
    }

    return path;
  }


  function _buildQueryString(obj) {
    var str = [];
    for(var p in obj) {
      if (obj.hasOwnProperty(p)) {
        var k = p, v = obj[p], tmpV = '';
        if(v == undefined) {
          continue;
        }

        if(v == null) {
          tmpV = '';
        } else if(Array.isArray(v)) {
          tmpV = v.map(function(tmv){ return encodeURIComponent(tmv); }).join(',');
        } else {
          tmpV = encodeURIComponent(v);
        }

        str.push(
          encodeURIComponent(k) + "=" + tmpV
        );
      }
    }
    return str.join("&");
  }

  function _logFilterError() {
    var ref = document.referrer;
    console.error(arguments, document.referrer);
    var tmpStr = JSON.stringify(arguments);
    // ga('send', 'event', 'Error', tmpStr, ref);
  }


  function _classifyLevel() {
    var result = [];
    for(var i in FILTER_PARAM) {
      var parConfig = FILTER_PARAM[i];

      if(!result[parConfig.level]) {
        result[parConfig.level] = [];
      }
      result[parConfig.level].push(i);
    }
    return result;
  }

  ft.getParams = _getParams;
  function _getParams() {
    var params = {};
    var result = {};
    var urlVars = _getUrlVars();
    Object.assign(params, urlVars);

    for (var i in FILTER_PARAM) {
      var parConfig = FILTER_PARAM[i];
      var tOP = typeof params[i];
      if (tOP == "undefined"
        || tOP == "null"
        || (tOP == 'string' && params[i].length < 1)
      ) {

        if (typeof parConfig.defaultValue != 'undefined'
          && typeof parConfig.defaultValue != 'null'
        ) {
          result[i] = parConfig.defaultValue;
        }
      } else {

        if (parConfig.isSingle) {
          result[i] = params[i];
        } else {
          result[i] = _convertStrToArr(params[i]);
        }
      }
    }
    return result;
  }

  function _getUrlVars() {
    var qs = {}, hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
      if(hashes[i]) {

        hash = hashes[i].split('=');
        if(hash && hash.length > 1) {
          qs[hash[0]] = decodeURIComponent(hash[1].replace("#", ""));
        }

      }
    }
    return qs;
  }


  function _convertStrToArr(rawParam) {
    if (!rawParam || rawParam.length < 1) {
      return [];
    }

    if (Array.isArray(rawParam)) {
      return rawParam;
    }

    if (typeof rawParam == 'string') {
      return rawParam.split(',');
    }

    return [];
  }

  ft.reActiveFilter = _reActiveFilter;
  function _reActiveFilter() {
    for(var i in FILTER_PARAM) {
      var parConfig = FILTER_PARAM[i];
      var parSelector = parConfig.selector;
      if(!parSelector) {
        continue;
      }
      var sel = (parSelector.parent || '') + (parSelector.value || '');
      $(sel + parSelector.active).removeClass(parConfig.classActive);

      var tmpValPar = _paramsCr[i];
      if(tmpValPar == undefined || tmpValPar == null) {
        if(parConfig.defaultValue == undefined || parConfig.defaultValue == null) {
          continue;
        }
        tmpValPar = parConfig.defaultValue;
      }

      if(parConfig.isSingle) {
        tmpValPar = [tmpValPar];
      }

      for(var j = 0, lenj = tmpValPar.length; j< lenj; j++) {
        var tmpSel = sel + '['+ parConfig.attrContentValue + '='+ (tmpValPar[j] || '""') +']' + (parSelector.active || "");
        $(tmpSel).addClass(parConfig.classActive);
      }

      if(typeof parConfig.effectChange == 'function') {
        parConfig.effectChange();
      }
    }

    ft.renderToolbar(_paramsCr);
  }

  function _listenButtonApply() {

    for(var i in BUTTON_APPLY) {
      (function(){
        var tmpBtn = BUTTON_APPLY[i];

        function tmpF(){
          ga('send', 'event', 'FilterHotel', 'ButtonApplyFilter', tmpBtn.selector);
          if(tmpBtn.isReset) {
            _paramsCr = {}; _paramsNew = {};
            _reActiveFilter();
          }

          if(_applyParamsChange()) {
            _ajaxFilter(false, function(err) {
              if(!err) {
                ft.renderToolbar(_paramsCr);
              }
            });
          }
          return false;
        }

        if(tmpBtn.isDynamic) {
          $(document).on('click', tmpBtn.selector, tmpF);
        } else {
          $(tmpBtn.selector).click(tmpF);
        }
      })();
    }
  }


  function _applyParamsChange() {
    var result = false;
    if(_paramsCr != _paramsNew) {
      result = true;
      Object.assign(_paramsCr, _paramsNew);
      for (var i in _paramsLevel) {
        if (Number(i) > _levelSelect) {
          for (var j in _paramsLevel[i]) {
            delete _paramsCr[_paramsLevel[i][j]];
          }
        }
      }
      _reSyncParamNew();
    }

    return result;
  }

  function _reSyncParamNew() {
    _paramsNew = Object.assign({}, _paramsCr);
  }


  function _listenParamChange() {
    for(var fName in FILTER_PARAM) {
      (function(){

        var parConfig = FILTER_PARAM[fName];
        if(!parConfig.selector) {
          return;
        }

        var fSelect;
        if(parConfig.isSingle) {
          fSelect = _selectSingle;

        } else {
          fSelect = _selectMultiple;
        }

        var sel = (parConfig.selector.parent || '') + (parConfig.selector.value || '');
        var tmpF = function(){
          ga('send', 'event', 'FilterHotel', 'SelectFilterBy', parConfig.paramName);
          _levelSelect = parConfig.level;
          fSelect(this, parConfig);

          if(parConfig.isApplyNow) {
            if(_applyParamsChange()) {
              _ajaxFilter(false, function (err) {
                if(!err) {
                  _reActiveFilter();
                }
              });
            }
          }
          return false;
        };

        if(parConfig.isDynamic) {
          $(document).on('click', sel, tmpF);
        } else {
          $(sel).click(tmpF);
        }

      })();
    }
  }

  function _listenBackUrl() {
    window.onpopstate = function(event) {
      if(event && event.state && event.state.data && event.state.params) {
        _paramsCr = event.state.params;
        _renderData(event.state.data);
        _reActiveFilter();

      } else {
        _paramsCr = _getParams();
        _ajaxFilter(true, function(err) {

          if(err) return;
          _reActiveFilter();
        });
      }
      _reSyncParamNew();
    }
  }

  function _changeUrl(url, state, title) {
    window.history.pushState(state||null, title||null, url);
    return false;
  }

  function _selectSingle(elEffect, paramConfig) {
    var selParConf = paramConfig.selector;
    var obSel = $((selParConf.parent || '') + (selParConf.value || ''));
    var tmpVal = $(elEffect).attr(paramConfig.attrContentValue);

    if (_paramsNew[paramConfig.paramName] == tmpVal) {
      if(paramConfig.noUnselect) {
        obSel = obSel.not(elEffect);
      } else {
        _paramsNew[paramConfig.paramName] = undefined;
      }

      if (selParConf.active) {
        obSel = obSel.find(selParConf.active);
      }

    } else {
      _paramsNew[paramConfig.paramName] = tmpVal;
      var obSelHas = $(elEffect);
      var obSelNot = obSel.not(elEffect);
      if (selParConf.active) {
        obSelHas = obSelHas.find(selParConf.active);
        obSelNot = obSelNot.find(selParConf.active);
      }
      obSelHas.addClass(paramConfig.classActive);
      obSel = obSelNot;
    }

    obSel.removeClass(paramConfig.classActive);
    if(typeof paramConfig.effectChange == 'function') {
      paramConfig.effectChange();
    }
  }


  function _selectMultiple(elEffect, paramConfig) {
    var tmpVal = $(elEffect).attr(paramConfig.attrContentValue);
    var tmpIndexVal;
    if(_paramsNew[paramConfig.paramName]) {
      tmpIndexVal = _paramsNew[paramConfig.paramName].indexOf(tmpVal);
    } else {
      tmpIndexVal = -2;
    }

    var obSel = $(elEffect);
    if (paramConfig.selector.active) {
      obSel = obSel.find(paramConfig.selector.active)
    }

    if (tmpIndexVal < 0) {
      if (tmpIndexVal < -1) {
        _paramsNew[paramConfig.paramName] = [];
      }

      _paramsNew[paramConfig.paramName].push(tmpVal);
      obSel.addClass(paramConfig.classActive);

    } else {
      _paramsNew[paramConfig.paramName].splice(tmpIndexVal, 1);
      obSel.removeClass(paramConfig.classActive);
      if(_paramsNew[paramConfig.paramName].length < 1) {
        _paramsNew[paramConfig.paramName] = undefined;
      }
    }

    if(typeof paramConfig.effectChange == 'function') {
      paramConfig.effectChange();
    }
  }

})(Chudu24.Hotels.FilterHotelNew);