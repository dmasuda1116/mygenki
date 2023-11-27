/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e2) { throw _e2; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e3) { didErr = true; err = _e3; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

////////////////////////////////////////////////////////////////////////////////
// 名前空間
window.StressCheck = function (window) {
  /* ... })(window); */
  ////////////////////////////////////////////////////////////////////////////////
  // 定義部
  // 指定時間(mSec)後に、指定した関数を引数付きで呼出す
  var delay = function delay(func, delayTime) {
    var args = Array.prototype.slice.call(arguments, 2);
    return setTimeout(func.bind(this, args), delayTime || 0);
  }; // タイムスタンプ


  var formatDate = function formatDate(date, format) {
    date = date || new Date();
    format = format || "YYYY/MM/DD hh:mm:ss.SSS";
    format = format.replace(/YYYY/g, date.getFullYear());
    format = format.replace(/MM/g, ("0" + (date.getMonth() + 1)).slice(-2));
    format = format.replace(/DD/g, ("0" + date.getDate()).slice(-2));
    format = format.replace(/hh/g, ("0" + date.getHours()).slice(-2));
    format = format.replace(/mm/g, ("0" + date.getMinutes()).slice(-2));
    format = format.replace(/ss/g, ("0" + date.getSeconds()).slice(-2));

    if (format.match(/S/g)) {
      var milliSeconds = ("00" + date.getMilliseconds()).slice(-3);
      var length = format.match(/S/g).length;

      for (var index = 0; index < length; index++) {
        format = format.replace(/S/, milliSeconds.substring(index, index + 1));
      }
    }

    return format;
  }; ////////////////////////////////////////////////////////////////////////////////
  // 対象の関数が実行される直前、直後のタイミングで呼ばれる関数を指定
  // var target = function(){ console.log('target'); }; var before = function(){ console.log('before'); }; var func = StressCheck.wrap(this, target, before); func();


  var wrap = function wrap(self, targetFunction, beforeFunction, afterFunction) {
    self = self || this;

    if (!targetFunction) {
      throw new Error("targetFunction is null.");
    }

    beforeFunction = beforeFunction || function () {};

    afterFunction = afterFunction || function () {};

    return function () {
      beforeFunction.apply(self, arguments);
      var result = targetFunction.apply(self, arguments);
      afterFunction.apply(self, arguments);
      return result;
    };
  }; ////////////////////////////////////////////////////////////////////////////////
  // Style一覧表示(For Debug)


  var dumpStyle = function dumpStyle(domElement) {
    var htmlStyle = domElement.computedStyleMap(); // スタイルのうちカスタムプロパティのみ表示

    var _iterator = _createForOfIteratorHelper(htmlStyle.entries()),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var _step$value = _slicedToArray(_step.value, 2),
            propertyName = _step$value[0],
            value = _step$value[1];

        if (/^--/.test(propertyName)) {
          //valueはCSSStyleValueとして得られるので文字列に変換
          console.log(propertyName, value.toString());
        }
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }
  }; ////////////////////////////////////////////////////////////////////////////////
  // 汎用ボタン作成メソッド


  var createBootstrapButton = function createBootstrapButton(domButton) {
    // Domのボタンを、BootstrapのボタンでWrap
    var bootstrapButton = new bootstrap.Button(domButton); // ボタン制御メソッドを追加
    // 押下状態判定

    bootstrapButton.isActive = function () {
      var text = this._element.getAttribute("aria-pressed") || "false";

      if (text.toLowerCase() == "true") {
        return true;
      } else {
        return false;
      }
    }; // 有効/無効


    bootstrapButton.enable = function (isEnabled) {
      if (typeof isEnabled === "undefined") {
        // 引数省略時はtrueとして扱う
        isEnabled = true;
      } else {
        isEnabled = !!isEnabled;
      }

      if (isEnabled) {
        this._element.classList.remove("disabled");
      } else {
        this._element.classList.add("disabled");
      }
    };

    bootstrapButton.disable = function () {
      this.enable(false);
    }; // 有効/無効判定


    bootstrapButton.isEnabled = function () {
      if (this._element.classList.contains("disabled")) {
        return false;
      } else {
        return true;
      }
    }; // 表示/非表示切り替え（表示時のスペースは、非表示時には確保されない。）


    bootstrapButton.show = function () {
      this._element.style = "display:inline";
    };

    bootstrapButton.hide = function () {
      this._element.style = "display:none";
    };

    return bootstrapButton;
  }; ////////////////////////////////////////////////////////////////////////////////
  // 数値変換


  var getNumber = function getNumber(value, defaultValue) {
    defaultValue = defaultValue || 0;
    var result = parseInt(value); // '10px'などの文字列から'px'を除去

    if (!isNaN(result)) {
      return result;
    } else {
      return defaultValue;
    }
  }; ////////////////////////////////////////////////////////////////////////////////
  // 指定された値のRadioを選択する


  var selectRadio = function selectRadio(fieldset, value) {
    if (fieldset) {
      var domList = fieldset.querySelectorAll("input[type=radio]");

      for (var index = 0; index < domList.length; index++) {
        var element = domList[index];

        if (element.value == value) {
          element.checked = true;
          break;
        }
      }
    }
  }; // Radioのどれかが選択されているか判定する


  var isSelected = function isSelected(fieldset) {
    var result = false;

    if (fieldset) {
      var domList = fieldset.querySelectorAll("input[type=radio]");
      domList.forEach(function (element) {
        if (element.checked) {
          result = true;
        }
      });
    }

    return result;
  }; // ul、olの子要素を全て削除する


  var clearOrderdList = function clearOrderdList(orderedList) {
    orderedList.innerHTML = "";
  }; // ul、olに子要素を追加する


  var addOrderedList = function addOrderedList(orderedList, messageList) {
    if (!Array.isArray(messageList)) {
      messageList = [messageList];
    }

    messageList.forEach(function (message) {
      var item = document.createElement("li");
      item.appendChild(document.createTextNode(message));
      orderedList.appendChild(item);
    });
  }; ////////////////////////////////////////////////////////////////////////////////


  window.addEventListener("load", function (event) {
    console.log("--- Start onLoad");

    try {
      console.log(event);
    } catch (error) {
      console.error(error);
    } finally {
      console.log("--- End onLoad");
    }
  });
  return {
    // 公開
    delay: delay,
    formatDate: formatDate,
    wrap: wrap,
    dumpStyle: dumpStyle,
    createBootstrapButton: createBootstrapButton,
    getNumber: getNumber,
    selectRadio: selectRadio,
    isSelected: isSelected,
    clearOrderdList: clearOrderdList,
    addOrderedList: addOrderedList
  }; // window.HyPAS_lib = (function(window) { ...
}(window);
/******/ })()
;