////////////////////////////////////////////////////////////////////////////////
// 名前空間
window.StressCheck = (function (window) {
    /* ... })(window); */
    ////////////////////////////////////////////////////////////////////////////////
    // 定義部
    // 指定時間(mSec)後に、指定した関数を引数付きで呼出す
    var delay = function (func, delayTime) {
        var args = Array.prototype.slice.call(arguments, 2);
        return setTimeout(func.bind(this, args), delayTime || 0);
    };

    // タイムスタンプ
    var formatDate = function (date, format) {
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
                format = format.replace(
                    /S/,
                    milliSeconds.substring(index, index + 1)
                );
            }
        }
        return format;
    };

    ////////////////////////////////////////////////////////////////////////////////
    // 対象の関数が実行される直前、直後のタイミングで呼ばれる関数を指定
    // var target = function(){ console.log('target'); }; var before = function(){ console.log('before'); }; var func = StressCheck.wrap(this, target, before); func();
    var wrap = function (self, targetFunction, beforeFunction, afterFunction) {
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
    };

    ////////////////////////////////////////////////////////////////////////////////
    // Style一覧表示(For Debug)
    var dumpStyle = function (domElement) {
        var htmlStyle = domElement.computedStyleMap();
        // スタイルのうちカスタムプロパティのみ表示
        for (const [propertyName, value] of htmlStyle.entries()) {
            if (/^--/.test(propertyName)) {
                //valueはCSSStyleValueとして得られるので文字列に変換
                console.log(propertyName, value.toString());
            }
        }
    };

    ////////////////////////////////////////////////////////////////////////////////
    // 汎用ボタン作成メソッド
    var createBootstrapButton = function (domButton) {
        // Domのボタンを、BootstrapのボタンでWrap
        var bootstrapButton = new bootstrap.Button(domButton);

        // ボタン制御メソッドを追加
        // 押下状態判定
        bootstrapButton.isActive = function () {
            var text = this._element.getAttribute("aria-pressed") || "false";
            if (text.toLowerCase() == "true") {
                return true;
            } else {
                return false;
            }
        };
        // 有効/無効
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
        };
        // 有効/無効判定
        bootstrapButton.isEnabled = function () {
            if (this._element.classList.contains("disabled")) {
                return false;
            } else {
                return true;
            }
        };

        // 表示/非表示切り替え（表示時のスペースは、非表示時には確保されない。）
        bootstrapButton.show = function () {
            this._element.style = "display:inline";
        };
        bootstrapButton.hide = function () {
            this._element.style = "display:none";
        };

        return bootstrapButton;
    };

    ////////////////////////////////////////////////////////////////////////////////
    // 数値変換
    var getNumber = function (value, defaultValue) {
        defaultValue = defaultValue || 0;
        var result = parseInt(value); // '10px'などの文字列から'px'を除去
        if (!isNaN(result)) {
            return result;
        } else {
            return defaultValue;
        }
    };

    ////////////////////////////////////////////////////////////////////////////////
    // 指定された値のRadioを選択する
    var selectRadio = function (fieldset, value) {
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
    };
    // Radioのどれかが選択されているか判定する
    var isSelected = function (fieldset) {
        var result = false;
        if (fieldset) {
            var domList = fieldset.querySelectorAll("input[type=radio]");
            domList.forEach((element) => {
                if (element.checked) {
                    result = true;
                }
            });
        }
        return result;
    };
    // ul、olの子要素を全て削除する
    var clearOrderdList = function (orderedList) {
        orderedList.innerHTML = "";
    };
    // ul、olに子要素を追加する
    var addOrderedList = function (orderedList, messageList) {
        if (!Array.isArray(messageList)) {
            messageList = [messageList];
        }

        messageList.forEach((message) => {
            var item = document.createElement("li");
            item.appendChild(document.createTextNode(message));
            orderedList.appendChild(item);
        });
    };

    ////////////////////////////////////////////////////////////////////////////////
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
        addOrderedList: addOrderedList,
    };

    // window.HyPAS_lib = (function(window) { ...
})(window);
