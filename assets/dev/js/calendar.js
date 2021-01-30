/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/calendar.js":
/*!****************************!*\
  !*** ./src/js/calendar.js ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _calendar_js_js_year_calendar_min__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./calendar/js/js-year-calendar.min */ "./src/js/calendar/js/js-year-calendar.min.js");
/* harmony import */ var _calendar_js_js_year_calendar_min__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_calendar_js_js_year_calendar_min__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _calendar_js_popper_min_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./calendar/js/popper.min.js */ "./src/js/calendar/js/popper.min.js");
/* harmony import */ var _calendar_js_popper_min_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_calendar_js_popper_min_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _calendar_js_z_calendar_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./calendar/js/z_calendar.js */ "./src/js/calendar/js/z_calendar.js");
/* harmony import */ var _calendar_js_z_calendar_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_calendar_js_z_calendar_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _calendar_css_modules_style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./calendar/css/modules/style.scss */ "./src/js/calendar/css/modules/style.scss");


 //styles



/***/ }),

/***/ "./src/js/calendar/js/js-year-calendar.min.js":
/*!****************************************************!*\
  !*** ./src/js/calendar/js/js-year-calendar.min.js ***!
  \****************************************************/
/***/ (function(module, exports) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (e, t) {
  if (true) !(__WEBPACK_AMD_DEFINE_ARRAY__ = [exports], __WEBPACK_AMD_DEFINE_FACTORY__ = (t),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));else { var n; }
}("undefined" != typeof globalThis ? globalThis : "undefined" != typeof self ? self : this, function (e) {
  "use strict";

  function t(e) {
    return (t = "function" == typeof Symbol && "symbol" == _typeof(Symbol.iterator) ? function (e) {
      return _typeof(e);
    } : function (e) {
      return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : _typeof(e);
    })(e);
  }

  function a(e, t) {
    for (var n = 0; n < t.length; n++) {
      var a = t[n];
      a.enumerable = a.enumerable || !1, a.configurable = !0, "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a);
    }
  }

  function i(e, t, n) {
    return t in e ? Object.defineProperty(e, t, {
      value: n,
      enumerable: !0,
      configurable: !0,
      writable: !0
    }) : e[t] = n, e;
  }

  if (Object.defineProperty(e, "__esModule", {
    value: !0
  }), e["default"] = void 0, "undefined" == typeof NodeList || NodeList.prototype.forEach || (NodeList.prototype.forEach = function (e, t) {
    t = t || window;

    for (var n = 0; n < this.length; n++) {
      e.call(t, this[n], n, this);
    }
  }), "undefined" != typeof Element && !Element.prototype.matches) {
    var n = Element.prototype;
    Element.prototype.matches = n.msMatchesSelector || n.webkitMatchesSelector;
  }

  "undefined" == typeof Element || Element.prototype.closest || (Element.prototype.closest = function (e) {
    var t = this;
    if (!document.documentElement.contains(t)) return null;

    do {
      if (t.matches(e)) return t;
      t = t.parentElement || t.parentNode;
    } while (null !== t && 1 == t.nodeType);

    return null;
  });

  var s = function () {
    function D(e) {
      var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : null;
      if (function (e, t) {
        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
      }(this, D), i(this, "element", void 0), i(this, "options", void 0), i(this, "_dataSource", void 0), i(this, "_mouseDown", void 0), i(this, "_rangeStart", void 0), i(this, "_rangeEnd", void 0), i(this, "_responsiveInterval", void 0), i(this, "_nbCols", void 0), i(this, "clickDay", void 0), i(this, "dayContextMenu", void 0), i(this, "mouseOnDay", void 0), i(this, "mouseOutDay", void 0), i(this, "renderEnd", void 0), i(this, "selectRange", void 0), i(this, "yearChanged", void 0), e instanceof HTMLElement) this.element = e;else {
        if ("string" != typeof e) throw new Error("The element parameter should be a DOM node or a selector");
        this.element = document.querySelector(e);
      }
      this.element.classList.add("calendar"), this._initializeEvents(t), this._initializeOptions(t), this.setYear(this.options.startYear);
    }

    var e, t, n;
    return e = D, (t = [{
      key: "_initializeOptions",
      value: function value(e) {
        null == e && (e = {}), this.options = {
          startYear: isNaN(parseInt(e.startYear)) ? new Date().getFullYear() : parseInt(e.startYear),
          minDate: e.minDate instanceof Date ? e.minDate : null,
          maxDate: e.maxDate instanceof Date ? e.maxDate : null,
          language: null != e.language && null != D.locales[e.language] ? e.language : "en",
          allowOverlap: null == e.allowOverlap || e.allowOverlap,
          displayWeekNumber: null != e.displayWeekNumber && e.displayWeekNumber,
          displayDisabledDataSource: null != e.displayDisabledDataSource && e.displayDisabledDataSource,
          displayHeader: null == e.displayHeader || e.displayHeader,
          alwaysHalfDay: null != e.alwaysHalfDay && e.alwaysHalfDay,
          enableRangeSelection: null != e.enableRangeSelection && e.enableRangeSelection,
          disabledDays: e.disabledDays instanceof Array ? e.disabledDays : [],
          disabledWeekDays: e.disabledWeekDays instanceof Array ? e.disabledWeekDays : [],
          hiddenWeekDays: e.hiddenWeekDays instanceof Array ? e.hiddenWeekDays : [],
          roundRangeLimits: null != e.roundRangeLimits && e.roundRangeLimits,
          dataSource: e.dataSource instanceof Array || "function" == typeof e.dataSource ? e.dataSource : [],
          style: "background" == e.style || "border" == e.style || "custom" == e.style ? e.style : "border",
          enableContextMenu: null != e.enableContextMenu && e.enableContextMenu,
          contextMenuItems: e.contextMenuItems instanceof Array ? e.contextMenuItems : [],
          customDayRenderer: "function" == typeof e.customDayRenderer ? e.customDayRenderer : null,
          customDataSourceRenderer: "function" == typeof e.customDataSourceRenderer ? e.customDataSourceRenderer : null,
          weekStart: isNaN(parseInt(e.weekStart)) ? null : parseInt(e.weekStart),
          loadingTemplate: "string" == typeof e.loadingTemplate || e.loadingTemplate instanceof HTMLElement ? e.loadingTemplate : null
        }, this.options.dataSource instanceof Array && (this._dataSource = this.options.dataSource, this._initializeDatasourceColors());
      }
    }, {
      key: "_initializeEvents",
      value: function value(e) {
        null == e && (e = []), e.yearChanged && this.element.addEventListener("yearChanged", e.yearChanged), e.renderEnd && this.element.addEventListener("renderEnd", e.renderEnd), e.clickDay && this.element.addEventListener("clickDay", e.clickDay), e.dayContextMenu && this.element.addEventListener("dayContextMenu", e.dayContextMenu), e.selectRange && this.element.addEventListener("selectRange", e.selectRange), e.mouseOnDay && this.element.addEventListener("mouseOnDay", e.mouseOnDay), e.mouseOutDay && this.element.addEventListener("mouseOutDay", e.mouseOutDay);
      }
    }, {
      key: "_fetchDataSource",
      value: function value(e) {
        if ("function" == typeof this.options.dataSource) {
          var t = this.options.dataSource;
          if (2 == t.length) t(this.options.startYear, e);else {
            var n = t(this.options.startYear);
            n instanceof Array ? e(n) : n.then(e);
          }
        } else e(this.options.dataSource);
      }
    }, {
      key: "_initializeDatasourceColors",
      value: function value() {
        for (var e = 0; e < this._dataSource.length; e++) {
          null == this._dataSource[e].color && (this._dataSource[e].color = D.colors[e % D.colors.length]);
        }
      }
    }, {
      key: "render",
      value: function value() {
        for (var e = 0 < arguments.length && void 0 !== arguments[0] && arguments[0]; this.element.firstChild;) {
          this.element.removeChild(this.element.firstChild);
        }

        if (this.options.displayHeader && this._renderHeader(), e) this._renderLoading();else {
          this._renderBody(), this._renderDataSource(), this._applyEvents();
          var t = this.element.querySelector(".months-container");
          t.style.opacity = "0", t.style.display = "block", t.style.transition = "opacity 0.5s", setTimeout(function () {
            t.style.opacity = "1", setTimeout(function () {
              return t.style.transition = "";
            }, 500);
          }, 0), this._triggerEvent("renderEnd", {
            currentYear: this.options.startYear
          });
        }
      }
    }, {
      key: "_renderHeader",
      value: function value() {
        var e = document.createElement("div");
        e.classList.add("calendar-header");
        var t = document.createElement("table"),
            n = document.createElement("th");
        n.classList.add("prev"), null != this.options.minDate && this.options.minDate > new Date(this.options.startYear - 1, 11, 31) && n.classList.add("disabled");
        var a = document.createElement("span");
        a.innerHTML = "&lsaquo;", n.appendChild(a), t.appendChild(n);
        var i = document.createElement("th");
        i.classList.add("year-title"), i.classList.add("year-neighbor2"), i.textContent = (this.options.startYear - 2).toString(), null != this.options.minDate && this.options.minDate > new Date(this.options.startYear - 2, 11, 31) && i.classList.add("disabled"), t.appendChild(i);
        var s = document.createElement("th");
        s.classList.add("year-title"), s.classList.add("year-neighbor"), s.textContent = (this.options.startYear - 1).toString(), null != this.options.minDate && this.options.minDate > new Date(this.options.startYear - 1, 11, 31) && s.classList.add("disabled"), t.appendChild(s);
        var o = document.createElement("th");
        o.classList.add("year-title"), o.textContent = this.options.startYear.toString(), t.appendChild(o);
        var r = document.createElement("th");
        r.classList.add("year-title"), r.classList.add("year-neighbor"), r.textContent = (this.options.startYear + 1).toString(), null != this.options.maxDate && this.options.maxDate < new Date(this.options.startYear + 1, 0, 1) && r.classList.add("disabled"), t.appendChild(r);
        var l = document.createElement("th");
        l.classList.add("year-title"), l.classList.add("year-neighbor2"), l.textContent = (this.options.startYear + 2).toString(), null != this.options.maxDate && this.options.maxDate < new Date(this.options.startYear + 2, 0, 1) && l.classList.add("disabled"), t.appendChild(l);
        var d = document.createElement("th");
        d.classList.add("next"), null != this.options.maxDate && this.options.maxDate < new Date(this.options.startYear + 1, 0, 1) && d.classList.add("disabled");
        var u = document.createElement("span");
        u.innerHTML = "&rsaquo;", d.appendChild(u), t.appendChild(d), e.appendChild(t), this.element.appendChild(e);
      }
    }, {
      key: "_renderBody",
      value: function value() {
        var e = document.createElement("div");
        e.classList.add("months-container");

        for (var t = 0; t < 12; t++) {
          var n = document.createElement("div");
          n.classList.add("month-container"), n.dataset.monthId = t.toString(), this._nbCols && n.classList.add("month-".concat(this._nbCols));
          var a = new Date(this.options.startYear, t, 1),
              i = document.createElement("table");
          i.classList.add("month");
          var s = document.createElement("thead"),
              o = document.createElement("tr"),
              r = document.createElement("th");
          r.classList.add("month-title"), r.setAttribute("colspan", this.options.displayWeekNumber ? "8" : "7"), r.textContent = D.locales[this.options.language].months[t], o.appendChild(r), s.appendChild(o);
          var l = document.createElement("tr");
          if (this.options.displayWeekNumber) (m = document.createElement("th")).classList.add("week-number"), m.textContent = D.locales[this.options.language].weekShort, l.appendChild(m);
          var d = this.options.weekStart ? this.options.weekStart : D.locales[this.options.language].weekStart,
              u = d;

          do {
            var c = document.createElement("th");
            c.classList.add("day-header"), c.textContent = D.locales[this.options.language].daysMin[u], this._isHidden(u) && c.classList.add("hidden"), l.appendChild(c), 7 <= ++u && (u = 0);
          } while (u != d);

          s.appendChild(l), i.appendChild(s);

          for (var h = new Date(a.getTime()), p = new Date(this.options.startYear, t + 1, 0); h.getDay() != d;) {
            h.setDate(h.getDate() - 1);
          }

          for (; h <= p;) {
            var y = document.createElement("tr");

            if (this.options.displayWeekNumber) {
              var m = document.createElement("td"),
                  f = new Date(h.getTime());
              f.setDate(f.getDate() - d + 4), m.classList.add("week-number"), m.textContent = this.getWeekNumber(f).toString(), y.appendChild(m);
            }

            do {
              var g = document.createElement("td");
              if (g.classList.add("day"), this._isHidden(h.getDay()) && g.classList.add("hidden"), h < a) g.classList.add("old");else if (p < h) g.classList.add("new");else {
                this._isDisabled(h) && g.classList.add("disabled");
                var v = document.createElement("div");
                v.classList.add("day-content"), v.textContent = h.getDate().toString(), g.appendChild(v), this.options.customDayRenderer && this.options.customDayRenderer(v, h);
              }
              y.appendChild(g), h.setDate(h.getDate() + 1);
            } while (h.getDay() != d);

            i.appendChild(y);
          }

          n.appendChild(i), e.appendChild(n);
        }

        this.element.appendChild(e);
      }
    }, {
      key: "_renderLoading",
      value: function value() {
        var e = document.createElement("div");
        e.classList.add("calendar-loading-container"), e.style.minHeight = 200 * this._nbCols + "px";
        var t = document.createElement("div");
        if (t.classList.add("calendar-loading"), this.options.loadingTemplate) "string" == typeof this.options.loadingTemplate ? t.innerHTML = this.options.loadingTemplate : this.options.loadingTemplate instanceof HTMLElement && t.appendChild(this.options.loadingTemplate);else {
          var n = document.createElement("div");
          n.classList.add("calendar-spinner");

          for (var a = 1; a <= 3; a++) {
            var i = document.createElement("div");
            i.classList.add("bounce".concat(a)), n.appendChild(i);
          }

          t.appendChild(n);
        }
        e.appendChild(t), this.element.appendChild(e);
      }
    }, {
      key: "_renderDataSource",
      value: function value() {
        var r = this;
        null != this._dataSource && 0 < this._dataSource.length && this.element.querySelectorAll(".month-container").forEach(function (e) {
          var s = parseInt(e.dataset.monthId),
              t = new Date(r.options.startYear, s, 1),
              n = new Date(r.options.startYear, s + 1, 1);

          if ((null == r.options.minDate || n > r.options.minDate) && (null == r.options.maxDate || t <= r.options.maxDate)) {
            for (var o = [], a = 0; a < r._dataSource.length; a++) {
              r._dataSource[a].startDate >= n && !(r._dataSource[a].endDate < t) || o.push(r._dataSource[a]);
            }

            0 < o.length && e.querySelectorAll(".day-content").forEach(function (e) {
              var t = new Date(r.options.startYear, s, parseInt(e.textContent)),
                  n = new Date(r.options.startYear, s, t.getDate() + 1),
                  a = [];

              if ((null == r.options.minDate || t >= r.options.minDate) && (null == r.options.maxDate || t <= r.options.maxDate)) {
                for (var i = 0; i < o.length; i++) {
                  o[i].startDate < n && o[i].endDate >= t && a.push(o[i]);
                }

                0 < a.length && (r.options.displayDisabledDataSource || !r._isDisabled(t)) && r._renderDataSourceDay(e, t, a);
              }
            });
          }
        });
      }
    }, {
      key: "_renderDataSourceDay",
      value: function value(e, t, n) {
        var a = e.parentElement;

        switch (this.options.style) {
          case "border":
            var i = 0;

            if (1 == n.length ? i = 4 : n.length <= 3 ? i = 2 : a.style.boxShadow = "inset 0 -4px 0 0 black", 0 < i) {
              for (var s = "", o = 0; o < n.length; o++) {
                "" != s && (s += ","), s += "inset 0 -".concat((o + 1) * i, "px 0 0 ").concat(n[o].color);
              }

              a.style.boxShadow = s;
            }

            break;

          case "background":
            a.style.backgroundColor = n[n.length - 1].color;
            var r = t.getTime();
            if (n[n.length - 1].startDate.getTime() == r) {
              if (a.classList.add("day-start"), n[n.length - 1].startHalfDay || this.options.alwaysHalfDay) {
                a.classList.add("day-half");
                var l = "transparent";

                for (o = n.length - 2; 0 <= o; o--) {
                  if (n[o].startDate.getTime() != r || !n[o].startHalfDay && !this.options.alwaysHalfDay) {
                    l = n[o].color;
                    break;
                  }
                }

                a.style.background = "linear-gradient(-45deg, ".concat(n[n.length - 1].color, ", ").concat(n[n.length - 1].color, " 49%, ").concat(l, " 51%, ").concat(l, ")");
              } else this.options.roundRangeLimits && a.classList.add("round-left");
            } else if (n[n.length - 1].endDate.getTime() == r) if (a.classList.add("day-end"), n[n.length - 1].endHalfDay || this.options.alwaysHalfDay) {
              a.classList.add("day-half");

              for (l = "transparent", o = n.length - 2; 0 <= o; o--) {
                if (n[o].endDate.getTime() != r || !n[o].endHalfDay && !this.options.alwaysHalfDay) {
                  l = n[o].color;
                  break;
                }
              }

              a.style.background = "linear-gradient(135deg, ".concat(n[n.length - 1].color, ", ").concat(n[n.length - 1].color, " 49%, ").concat(l, " 51%, ").concat(l, ")");
            } else this.options.roundRangeLimits && a.classList.add("round-right");
            break;

          case "custom":
            this.options.customDataSourceRenderer && this.options.customDataSourceRenderer.call(this, e, t, n);
        }
      }
    }, {
      key: "_applyEvents",
      value: function value() {
        var s = this;
        this.options.displayHeader && (this.element.querySelectorAll(".year-neighbor, .year-neighbor2").forEach(function (e) {
          e.addEventListener("click", function (e) {
            e.currentTarget.classList.contains("disabled") || s.setYear(parseInt(e.currentTarget.textContent));
          });
        }), this.element.querySelector(".calendar-header .prev").addEventListener("click", function (e) {
          if (!e.currentTarget.classList.contains("disabled")) {
            var t = s.element.querySelector(".months-container");
            t.style.transition = "margin-left 0.1s", t.style.marginLeft = "100%", setTimeout(function () {
              t.style.visibility = "hidden", t.style.transition = "", t.style.marginLeft = "0", setTimeout(function () {
                s.setYear(s.options.startYear - 1);
              }, 50);
            }, 100);
          }
        }), this.element.querySelector(".calendar-header .next").addEventListener("click", function (e) {
          if (!e.currentTarget.classList.contains("disabled")) {
            var t = s.element.querySelector(".months-container");
            t.style.transition = "margin-left 0.1s", t.style.marginLeft = "-100%", setTimeout(function () {
              t.style.visibility = "hidden", t.style.transition = "", t.style.marginLeft = "0", setTimeout(function () {
                s.setYear(s.options.startYear + 1);
              }, 50);
            }, 100);
          }
        })), this.element.querySelectorAll(".day:not(.old):not(.new):not(.disabled)").forEach(function (e) {
          e.addEventListener("click", function (e) {
            e.stopPropagation();

            var t = s._getDate(e.currentTarget);

            s._triggerEvent("clickDay", {
              element: e.currentTarget,
              date: t,
              events: s.getEvents(t)
            });
          }), e.addEventListener("contextmenu", function (e) {
            s.options.enableContextMenu && (e.preventDefault(), 0 < s.options.contextMenuItems.length && s._openContextMenu(e.currentTarget));

            var t = s._getDate(e.currentTarget);

            s._triggerEvent("dayContextMenu", {
              element: e.currentTarget,
              date: t,
              events: s.getEvents(t)
            });
          }), s.options.enableRangeSelection && (e.addEventListener("mousedown", function (e) {
            if (1 == e.which) {
              var t = s._getDate(e.currentTarget);

              (s.options.allowOverlap || s.isThereFreeSlot(t)) && (s._mouseDown = !0, s._rangeStart = s._rangeEnd = t, s._refreshRange());
            }
          }), e.addEventListener("mouseenter", function (e) {
            if (s._mouseDown) {
              var t = s._getDate(e.currentTarget);

              if (!s.options.allowOverlap) {
                var n = new Date(s._rangeStart.getTime());
                if (n < t) for (var a = new Date(n.getFullYear(), n.getMonth(), n.getDate() + 1); n < t && s.isThereFreeSlot(a, !1);) {
                  n.setDate(n.getDate() + 1), a.setDate(a.getDate() + 1);
                } else for (a = new Date(n.getFullYear(), n.getMonth(), n.getDate() - 1); t < n && s.isThereFreeSlot(a, !0);) {
                  n.setDate(n.getDate() - 1), a.setDate(a.getDate() - 1);
                }
                t = n;
              }

              var i = s._rangeEnd;
              s._rangeEnd = t, i.getTime() != s._rangeEnd.getTime() && s._refreshRange();
            }
          })), e.addEventListener("mouseenter", function (e) {
            if (!s._mouseDown) {
              var t = s._getDate(e.currentTarget);

              s._triggerEvent("mouseOnDay", {
                element: e.currentTarget,
                date: t,
                events: s.getEvents(t)
              });
            }
          }), e.addEventListener("mouseleave", function (e) {
            var t = s._getDate(e.currentTarget);

            s._triggerEvent("mouseOutDay", {
              element: e.currentTarget,
              date: t,
              events: s.getEvents(t)
            });
          });
        }), this.options.enableRangeSelection && window.addEventListener("mouseup", function (e) {
          if (s._mouseDown) {
            s._mouseDown = !1, s._refreshRange();
            var t = s._rangeStart < s._rangeEnd ? s._rangeStart : s._rangeEnd,
                n = s._rangeEnd > s._rangeStart ? s._rangeEnd : s._rangeStart;

            s._triggerEvent("selectRange", {
              startDate: t,
              endDate: n,
              events: s.getEventsOnRange(t, new Date(n.getFullYear(), n.getMonth(), n.getDate() + 1))
            });
          }
        }), this._responsiveInterval && (clearInterval(this._responsiveInterval), this._responsiveInterval = null), this._responsiveInterval = setInterval(function () {
          if (null != s.element.querySelector(".month")) {
            var e = s.element.offsetWidth,
                t = s.element.querySelector(".month").offsetWidth + 10;
            s._nbCols = null, s._nbCols = 6 * t < e ? 2 : 4 * t < e ? 3 : 3 * t < e ? 4 : 2 * t < e ? 6 : 12, s.element.querySelectorAll(".month-container").forEach(function (t) {
              t.classList.contains("month-".concat(s._nbCols)) || (["month-2", "month-3", "month-4", "month-6", "month-12"].forEach(function (e) {
                t.classList.remove(e);
              }), t.classList.add("month-".concat(s._nbCols)));
            });
          }
        }, 300);
      }
    }, {
      key: "_refreshRange",
      value: function value() {
        var n = this;

        if (this.element.querySelectorAll("td.day.range").forEach(function (e) {
          return e.classList.remove("range");
        }), this.element.querySelectorAll("td.day.range-start").forEach(function (e) {
          return e.classList.remove("range-start");
        }), this.element.querySelectorAll("td.day.range-end").forEach(function (e) {
          return e.classList.remove("range-end");
        }), this._mouseDown) {
          var a = this._rangeStart < this._rangeEnd ? this._rangeStart : this._rangeEnd,
              i = this._rangeEnd > this._rangeStart ? this._rangeEnd : this._rangeStart;
          this.element.querySelectorAll(".month-container").forEach(function (e) {
            var t = parseInt(e.dataset.monthId);
            a.getMonth() <= t && i.getMonth() >= t && e.querySelectorAll("td.day:not(.old):not(.new)").forEach(function (e) {
              var t = n._getDate(e);

              a <= t && t <= i && (e.classList.add("range"), t.getTime() == a.getTime() && e.classList.add("range-start"), t.getTime() == i.getTime() && e.classList.add("range-end"));
            });
          });
        }
      }
    }, {
      key: "_getElementPosition",
      value: function value(e) {
        for (var t = 0, n = 0; t += e.offsetTop || 0, n += e.offsetLeft || 0, e = e.offsetParent;) {
          ;
        }

        return {
          top: t,
          left: n
        };
      }
    }, {
      key: "_openContextMenu",
      value: function value(e) {
        var t = this,
            n = document.querySelector(".calendar-context-menu");
        if (null !== n) for (n.style.display = "none"; n.firstChild;) {
          n.removeChild(n.firstChild);
        } else (n = document.createElement("div")).classList.add("calendar-context-menu"), document.body.appendChild(n);

        for (var a = this._getDate(e), i = this.getEvents(a), s = 0; s < i.length; s++) {
          var o = document.createElement("div");
          o.classList.add("item"), o.style.paddingLeft = "4px", o.style.boxShadow = "inset 4px 0 0 0 ".concat(i[s].color);
          var r = document.createElement("div");
          r.classList.add("content");
          var l = document.createElement("span");
          l.classList.add("text"), l.textContent = i[s].name, r.appendChild(l);
          var d = document.createElement("span");
          d.classList.add("arrow"), d.innerHTML = "&rsaquo;", r.appendChild(d), o.appendChild(r), this._renderContextMenuItems(o, this.options.contextMenuItems, i[s]), n.appendChild(o);
        }

        if (0 < n.children.length) {
          var u = this._getElementPosition(e);

          n.style.left = u.left + 25 + "px", n.style.right = "", n.style.top = u.top + 25 + "px", n.style.display = "block", n.getBoundingClientRect().right > document.body.offsetWidth && (n.style.left = "", n.style.right = "0"), setTimeout(function () {
            return t._checkContextMenuItemsPosition();
          }, 0);

          var c = function e(t) {
            "click" === t.type && n.contains(t.target) || (n.style.display = "none", window.removeEventListener("click", e), window.removeEventListener("resize", e), window.removeEventListener("scroll", e));
          };

          window.addEventListener("click", c), window.addEventListener("resize", c), window.addEventListener("scroll", c);
        }
      }
    }, {
      key: "_renderContextMenuItems",
      value: function value(e, t, n) {
        var a = document.createElement("div");
        a.classList.add("submenu");

        for (var i = 0; i < t.length; i++) {
          if (!1 !== t[i].visible && ("function" != typeof t[i].visible || t[i].visible(n))) {
            var s = document.createElement("div");
            s.classList.add("item");
            var o = document.createElement("div");
            o.classList.add("content");
            var r = document.createElement("span");

            if (r.classList.add("text"), r.textContent = t[i].text, o.appendChild(r), t[i].click && function (e) {
              o.addEventListener("click", function () {
                document.querySelector(".calendar-context-menu").style.display = "none", t[e].click(n);
              });
            }(i), s.appendChild(o), t[i].items && 0 < t[i].items.length) {
              var l = document.createElement("span");
              l.classList.add("arrow"), l.innerHTML = "&rsaquo;", o.appendChild(l), this._renderContextMenuItems(s, t[i].items, n);
            }

            a.appendChild(s);
          }
        }

        0 < a.children.length && e.appendChild(a);
      }
    }, {
      key: "_checkContextMenuItemsPosition",
      value: function value() {
        var e = document.querySelectorAll(".calendar-context-menu .submenu");
        e.forEach(function (e) {
          var t = e;
          t.style.display = "block", t.style.visibility = "hidden";
        }), e.forEach(function (e) {
          var t = e;
          t.getBoundingClientRect().right > document.body.offsetWidth ? t.classList.add("open-left") : t.classList.remove("open-left");
        }), e.forEach(function (e) {
          var t = e;
          t.style.display = "", t.style.visibility = "";
        });
      }
    }, {
      key: "_getDate",
      value: function value(e) {
        var t = e.querySelector(".day-content").textContent,
            n = e.closest(".month-container").dataset.monthId,
            a = this.options.startYear;
        return new Date(a, n, t);
      }
    }, {
      key: "_triggerEvent",
      value: function value(e, t) {
        var n = null;

        for (var a in "function" == typeof Event ? n = new Event(e) : (n = document.createEvent("Event")).initEvent(e, !1, !1), n.calendar = this, t) {
          n[a] = t[a];
        }

        return this.element.dispatchEvent(n), n;
      }
    }, {
      key: "_isDisabled",
      value: function value(e) {
        if (null != this.options.minDate && e < this.options.minDate || null != this.options.maxDate && e > this.options.maxDate) return !0;
        if (0 < this.options.disabledWeekDays.length) for (var t = 0; t < this.options.disabledWeekDays.length; t++) {
          if (e.getDay() == this.options.disabledWeekDays[t]) return !0;
        }
        if (0 < this.options.disabledDays.length) for (t = 0; t < this.options.disabledDays.length; t++) {
          if (e.getTime() == this.options.disabledDays[t].getTime()) return !0;
        }
        return !1;
      }
    }, {
      key: "_isHidden",
      value: function value(e) {
        if (0 < this.options.hiddenWeekDays.length) for (var t = 0; t < this.options.hiddenWeekDays.length; t++) {
          if (e == this.options.hiddenWeekDays[t]) return !0;
        }
        return !1;
      }
    }, {
      key: "getWeekNumber",
      value: function value(e) {
        var t = new Date(e.getTime());
        t.setHours(0, 0, 0, 0), t.setDate(t.getDate() + 3 - (t.getDay() + 6) % 7);
        var n = new Date(t.getFullYear(), 0, 4);
        return 1 + Math.round(((t.getTime() - n.getTime()) / 864e5 - 3 + (n.getDay() + 6) % 7) / 7);
      }
    }, {
      key: "getEvents",
      value: function value(e) {
        return this.getEventsOnRange(e, new Date(e.getFullYear(), e.getMonth(), e.getDate() + 1));
      }
    }, {
      key: "getEventsOnRange",
      value: function value(e, t) {
        var n = [];
        if (this._dataSource && e && t) for (var a = 0; a < this._dataSource.length; a++) {
          this._dataSource[a].startDate < t && this._dataSource[a].endDate >= e && n.push(this._dataSource[a]);
        }
        return n;
      }
    }, {
      key: "isThereFreeSlot",
      value: function value(t) {
        var n = this,
            e = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : null,
            a = this.getEvents(t);
        return !0 === e ? !a.some(function (e) {
          return !n.options.alwaysHalfDay && !e.endHalfDay || e.endDate > t;
        }) : !1 === e ? !a.some(function (e) {
          return !n.options.alwaysHalfDay && !e.startHalfDay || e.startDate < t;
        }) : this.isThereFreeSlot(t, !1) || this.isThereFreeSlot(t, !0);
      }
    }, {
      key: "getYear",
      value: function value() {
        return this.options.startYear;
      }
    }, {
      key: "setYear",
      value: function value(e) {
        var t = this,
            n = parseInt(e);

        if (!isNaN(n)) {
          for (this.options.startYear = n; this.element.firstChild;) {
            this.element.removeChild(this.element.firstChild);
          }

          this.options.displayHeader && this._renderHeader();

          var a = this._triggerEvent("yearChanged", {
            currentYear: this.options.startYear,
            preventRendering: !1
          });

          "function" == typeof this.options.dataSource ? (this.render(!0), this._fetchDataSource(function (e) {
            t._dataSource = e, t._initializeDatasourceColors(), t.render(!1);
          })) : a.preventRendering || this.render();
        }
      }
    }, {
      key: "getMinDate",
      value: function value() {
        return this.options.minDate;
      }
    }, {
      key: "setMinDate",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        (e instanceof Date || null === e) && (this.options.minDate = e, t || this.render());
      }
    }, {
      key: "getMaxDate",
      value: function value() {
        return this.options.maxDate;
      }
    }, {
      key: "setMaxDate",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        (e instanceof Date || null === e) && (this.options.maxDate = e, t || this.render());
      }
    }, {
      key: "getStyle",
      value: function value() {
        return this.options.style;
      }
    }, {
      key: "setStyle",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.style = "background" == e || "border" == e || "custom" == e ? e : "border", t || this.render();
      }
    }, {
      key: "getAllowOverlap",
      value: function value() {
        return this.options.allowOverlap;
      }
    }, {
      key: "setAllowOverlap",
      value: function value(e) {
        this.options.allowOverlap = e;
      }
    }, {
      key: "getDisplayWeekNumber",
      value: function value() {
        return this.options.displayWeekNumber;
      }
    }, {
      key: "setDisplayWeekNumber",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.displayWeekNumber = e, t || this.render();
      }
    }, {
      key: "getDisplayHeader",
      value: function value() {
        return this.options.displayHeader;
      }
    }, {
      key: "setDisplayHeader",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.displayHeader = e, t || this.render();
      }
    }, {
      key: "getDisplayDisabledDataSource",
      value: function value() {
        return this.options.displayDisabledDataSource;
      }
    }, {
      key: "setDisplayDisabledDataSource",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.displayDisabledDataSource = e, t || this.render();
      }
    }, {
      key: "getAlwaysHalfDay",
      value: function value() {
        return this.options.alwaysHalfDay;
      }
    }, {
      key: "setAlwaysHalfDay",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.alwaysHalfDay = e, t || this.render();
      }
    }, {
      key: "getEnableRangeSelection",
      value: function value() {
        return this.options.enableRangeSelection;
      }
    }, {
      key: "setEnableRangeSelection",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.enableRangeSelection = e, t || this.render();
      }
    }, {
      key: "getDisabledDays",
      value: function value() {
        return this.options.disabledDays;
      }
    }, {
      key: "setDisabledDays",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.disabledDays = e instanceof Array ? e : [], t || this.render();
      }
    }, {
      key: "getDisabledWeekDays",
      value: function value() {
        return this.options.disabledWeekDays;
      }
    }, {
      key: "setDisabledWeekDays",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.disabledWeekDays = e instanceof Array ? e : [], t || this.render();
      }
    }, {
      key: "getHiddenWeekDays",
      value: function value() {
        return this.options.hiddenWeekDays;
      }
    }, {
      key: "setHiddenWeekDays",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.hiddenWeekDays = e instanceof Array ? e : [], t || this.render();
      }
    }, {
      key: "getRoundRangeLimits",
      value: function value() {
        return this.options.roundRangeLimits;
      }
    }, {
      key: "setRoundRangeLimits",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.roundRangeLimits = e, t || this.render();
      }
    }, {
      key: "getEnableContextMenu",
      value: function value() {
        return this.options.enableContextMenu;
      }
    }, {
      key: "setEnableContextMenu",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.enableContextMenu = e, t || this.render();
      }
    }, {
      key: "getContextMenuItems",
      value: function value() {
        return this.options.contextMenuItems;
      }
    }, {
      key: "setContextMenuItems",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.contextMenuItems = e instanceof Array ? e : [], t || this.render();
      }
    }, {
      key: "getCustomDayRenderer",
      value: function value() {
        return this.options.customDayRenderer;
      }
    }, {
      key: "setCustomDayRenderer",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.customDayRenderer = "function" == typeof e ? e : null, t || this.render();
      }
    }, {
      key: "getCustomDataSourceRenderer",
      value: function value() {
        return this.options.customDataSourceRenderer;
      }
    }, {
      key: "setCustomDataSourceRenderer",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.customDataSourceRenderer = "function" == typeof e ? e : null, t || this.render();
      }
    }, {
      key: "getLanguage",
      value: function value() {
        return this.options.language;
      }
    }, {
      key: "setLanguage",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        null != e && null != D.locales[e] && (this.options.language = e, t || this.render());
      }
    }, {
      key: "getDataSource",
      value: function value() {
        return this.options.dataSource;
      }
    }, {
      key: "setDataSource",
      value: function value(e) {
        var t = this,
            n = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.dataSource = e instanceof Array || "function" == typeof e ? e : [], "function" == typeof this.options.dataSource ? (this.render(!0), this._fetchDataSource(function (e) {
          t._dataSource = e, t._initializeDatasourceColors(), t.render(!1);
        })) : (this._dataSource = this.options.dataSource, this._initializeDatasourceColors(), n || this.render());
      }
    }, {
      key: "getWeekStart",
      value: function value() {
        return this.options.weekStart ? this.options.weekStart : D.locales[this.options.language].weekStart;
      }
    }, {
      key: "setWeekStart",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this.options.weekStart = isNaN(parseInt(e)) ? null : parseInt(e), t || this.render();
      }
    }, {
      key: "getLoadingTemplate",
      value: function value() {
        return this.options.loadingTemplate;
      }
    }, {
      key: "setLoadingTemplate",
      value: function value(e) {
        this.options.loadingTemplate = "string" == typeof e || e instanceof HTMLElement ? e : null;
      }
    }, {
      key: "addEvent",
      value: function value(e) {
        var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1];
        this._dataSource.push(e), t || this.render();
      }
    }]) && a(e.prototype, t), n && a(e, n), D;
  }();

  i(e["default"] = s, "locales", {
    en: {
      days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
      months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      weekShort: "W",
      weekStart: 0
    }
  }), i(s, "colors", ["#2C8FC9", "#9CB703", "#F5BB00", "#FF4A32", "#B56CE2", "#45A597"]), "object" === ("undefined" == typeof window ? "undefined" : t(window)) && (window.Calendar = s, document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('[data-provide="calendar"]').forEach(function (e) {
      return new s(e);
    });
  }));
});

/***/ }),

/***/ "./src/js/calendar/js/popper.min.js":
/*!******************************************!*\
  !*** ./src/js/calendar/js/popper.min.js ***!
  \******************************************/
/***/ (function(module, exports) {

"use strict";
var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/**
 * @popperjs/core v2.6.0 - MIT License
 */


function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (e, t) {
  "object" == ( false ? 0 : _typeof(exports)) && "undefined" != "object" ? t(exports) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [exports], __WEBPACK_AMD_DEFINE_FACTORY__ = (t),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : 0;
}(this, function (e) {
  function t(e) {
    return {
      width: (e = e.getBoundingClientRect()).width,
      height: e.height,
      top: e.top,
      right: e.right,
      bottom: e.bottom,
      left: e.left,
      x: e.left,
      y: e.top
    };
  }

  function n(e) {
    return "[object Window]" !== e.toString() ? (e = e.ownerDocument) && e.defaultView || window : e;
  }

  function r(e) {
    return {
      scrollLeft: (e = n(e)).pageXOffset,
      scrollTop: e.pageYOffset
    };
  }

  function o(e) {
    return e instanceof n(e).Element || e instanceof Element;
  }

  function i(e) {
    return e instanceof n(e).HTMLElement || e instanceof HTMLElement;
  }

  function a(e) {
    return e ? (e.nodeName || "").toLowerCase() : null;
  }

  function s(e) {
    return ((o(e) ? e.ownerDocument : e.document) || window.document).documentElement;
  }

  function f(e) {
    return t(s(e)).left + r(e).scrollLeft;
  }

  function c(e) {
    return n(e).getComputedStyle(e);
  }

  function p(e) {
    return e = c(e), /auto|scroll|overlay|hidden/.test(e.overflow + e.overflowY + e.overflowX);
  }

  function l(e, o, c) {
    void 0 === c && (c = !1);
    var l = s(o);
    e = t(e);
    var u = i(o),
        d = {
      scrollLeft: 0,
      scrollTop: 0
    },
        m = {
      x: 0,
      y: 0
    };
    return (u || !u && !c) && (("body" !== a(o) || p(l)) && (d = o !== n(o) && i(o) ? {
      scrollLeft: o.scrollLeft,
      scrollTop: o.scrollTop
    } : r(o)), i(o) ? ((m = t(o)).x += o.clientLeft, m.y += o.clientTop) : l && (m.x = f(l))), {
      x: e.left + d.scrollLeft - m.x,
      y: e.top + d.scrollTop - m.y,
      width: e.width,
      height: e.height
    };
  }

  function u(e) {
    return {
      x: e.offsetLeft,
      y: e.offsetTop,
      width: e.offsetWidth,
      height: e.offsetHeight
    };
  }

  function d(e) {
    return "html" === a(e) ? e : e.assignedSlot || e.parentNode || e.host || s(e);
  }

  function m(e, t) {
    void 0 === t && (t = []);

    var r = function e(t) {
      return 0 <= ["html", "body", "#document"].indexOf(a(t)) ? t.ownerDocument.body : i(t) && p(t) ? t : e(d(t));
    }(e);

    e = "body" === a(r);
    var o = n(r);
    return r = e ? [o].concat(o.visualViewport || [], p(r) ? r : []) : r, t = t.concat(r), e ? t : t.concat(m(d(r)));
  }

  function h(e) {
    if (!i(e) || "fixed" === c(e).position) return null;

    if (e = e.offsetParent) {
      var t = s(e);
      if ("body" === a(e) && "static" === c(e).position && "static" !== c(t).position) return t;
    }

    return e;
  }

  function g(e) {
    for (var t = n(e), r = h(e); r && 0 <= ["table", "td", "th"].indexOf(a(r)) && "static" === c(r).position;) {
      r = h(r);
    }

    if (r && "body" === a(r) && "static" === c(r).position) return t;
    if (!r) e: {
      for (e = d(e); i(e) && 0 > ["html", "body"].indexOf(a(e));) {
        if ("none" !== (r = c(e)).transform || "none" !== r.perspective || r.willChange && "auto" !== r.willChange) {
          r = e;
          break e;
        }

        e = e.parentNode;
      }

      r = null;
    }
    return r || t;
  }

  function v(e) {
    var t = new Map(),
        n = new Set(),
        r = [];
    return e.forEach(function (e) {
      t.set(e.name, e);
    }), e.forEach(function (e) {
      n.has(e.name) || function e(o) {
        n.add(o.name), [].concat(o.requires || [], o.requiresIfExists || []).forEach(function (r) {
          n.has(r) || (r = t.get(r)) && e(r);
        }), r.push(o);
      }(e);
    }), r;
  }

  function b(e) {
    var t;
    return function () {
      return t || (t = new Promise(function (n) {
        Promise.resolve().then(function () {
          t = void 0, n(e());
        });
      })), t;
    };
  }

  function y(e) {
    return e.split("-")[0];
  }

  function O(e, t) {
    var r,
        o = t.getRootNode && t.getRootNode();
    if (e.contains(t)) return !0;
    if ((r = o) && (r = o instanceof (r = n(o).ShadowRoot) || o instanceof ShadowRoot), r) do {
      if (t && e.isSameNode(t)) return !0;
      t = t.parentNode || t.host;
    } while (t);
    return !1;
  }

  function w(e) {
    return Object.assign(Object.assign({}, e), {}, {
      left: e.x,
      top: e.y,
      right: e.x + e.width,
      bottom: e.y + e.height
    });
  }

  function x(e, o) {
    if ("viewport" === o) {
      o = n(e);
      var a = s(e);
      o = o.visualViewport;
      var p = a.clientWidth;
      a = a.clientHeight;
      var l = 0,
          u = 0;
      o && (p = o.width, a = o.height, /^((?!chrome|android).)*safari/i.test(navigator.userAgent) || (l = o.offsetLeft, u = o.offsetTop)), e = w(e = {
        width: p,
        height: a,
        x: l + f(e),
        y: u
      });
    } else i(o) ? ((e = t(o)).top += o.clientTop, e.left += o.clientLeft, e.bottom = e.top + o.clientHeight, e.right = e.left + o.clientWidth, e.width = o.clientWidth, e.height = o.clientHeight, e.x = e.left, e.y = e.top) : (u = s(e), e = s(u), l = r(u), o = u.ownerDocument.body, p = Math.max(e.scrollWidth, e.clientWidth, o ? o.scrollWidth : 0, o ? o.clientWidth : 0), a = Math.max(e.scrollHeight, e.clientHeight, o ? o.scrollHeight : 0, o ? o.clientHeight : 0), u = -l.scrollLeft + f(u), l = -l.scrollTop, "rtl" === c(o || e).direction && (u += Math.max(e.clientWidth, o ? o.clientWidth : 0) - p), e = w({
      width: p,
      height: a,
      x: u,
      y: l
    }));

    return e;
  }

  function j(e, t, n) {
    return t = "clippingParents" === t ? function (e) {
      var t = m(d(e)),
          n = 0 <= ["absolute", "fixed"].indexOf(c(e).position) && i(e) ? g(e) : e;
      return o(n) ? t.filter(function (e) {
        return o(e) && O(e, n) && "body" !== a(e);
      }) : [];
    }(e) : [].concat(t), (n = (n = [].concat(t, [n])).reduce(function (t, n) {
      return n = x(e, n), t.top = Math.max(n.top, t.top), t.right = Math.min(n.right, t.right), t.bottom = Math.min(n.bottom, t.bottom), t.left = Math.max(n.left, t.left), t;
    }, x(e, n[0]))).width = n.right - n.left, n.height = n.bottom - n.top, n.x = n.left, n.y = n.top, n;
  }

  function M(e) {
    return 0 <= ["top", "bottom"].indexOf(e) ? "x" : "y";
  }

  function E(e) {
    var t = e.reference,
        n = e.element,
        r = (e = e.placement) ? y(e) : null;
    e = e ? e.split("-")[1] : null;
    var o = t.x + t.width / 2 - n.width / 2,
        i = t.y + t.height / 2 - n.height / 2;

    switch (r) {
      case "top":
        o = {
          x: o,
          y: t.y - n.height
        };
        break;

      case "bottom":
        o = {
          x: o,
          y: t.y + t.height
        };
        break;

      case "right":
        o = {
          x: t.x + t.width,
          y: i
        };
        break;

      case "left":
        o = {
          x: t.x - n.width,
          y: i
        };
        break;

      default:
        o = {
          x: t.x,
          y: t.y
        };
    }

    if (null != (r = r ? M(r) : null)) switch (i = "y" === r ? "height" : "width", e) {
      case "start":
        o[r] -= t[i] / 2 - n[i] / 2;
        break;

      case "end":
        o[r] += t[i] / 2 - n[i] / 2;
    }
    return o;
  }

  function D(e) {
    return Object.assign(Object.assign({}, {
      top: 0,
      right: 0,
      bottom: 0,
      left: 0
    }), e);
  }

  function P(e, t) {
    return t.reduce(function (t, n) {
      return t[n] = e, t;
    }, {});
  }

  function L(e, n) {
    void 0 === n && (n = {});
    var r = n;
    n = void 0 === (n = r.placement) ? e.placement : n;
    var i = r.boundary,
        a = void 0 === i ? "clippingParents" : i,
        f = void 0 === (i = r.rootBoundary) ? "viewport" : i;
    i = void 0 === (i = r.elementContext) ? "popper" : i;
    var c = r.altBoundary,
        p = void 0 !== c && c;
    r = D("number" != typeof (r = void 0 === (r = r.padding) ? 0 : r) ? r : P(r, T));
    var l = e.elements.reference;
    c = e.rects.popper, a = j(o(p = e.elements[p ? "popper" === i ? "reference" : "popper" : i]) ? p : p.contextElement || s(e.elements.popper), a, f), p = E({
      reference: f = t(l),
      element: c,
      strategy: "absolute",
      placement: n
    }), c = w(Object.assign(Object.assign({}, c), p)), f = "popper" === i ? c : f;
    var u = {
      top: a.top - f.top + r.top,
      bottom: f.bottom - a.bottom + r.bottom,
      left: a.left - f.left + r.left,
      right: f.right - a.right + r.right
    };

    if (e = e.modifiersData.offset, "popper" === i && e) {
      var d = e[n];
      Object.keys(u).forEach(function (e) {
        var t = 0 <= ["right", "bottom"].indexOf(e) ? 1 : -1,
            n = 0 <= ["top", "bottom"].indexOf(e) ? "y" : "x";
        u[e] += d[n] * t;
      });
    }

    return u;
  }

  function k() {
    for (var e = arguments.length, t = Array(e), n = 0; n < e; n++) {
      t[n] = arguments[n];
    }

    return !t.some(function (e) {
      return !(e && "function" == typeof e.getBoundingClientRect);
    });
  }

  function B(e) {
    void 0 === e && (e = {});
    var t = e.defaultModifiers,
        n = void 0 === t ? [] : t,
        r = void 0 === (e = e.defaultOptions) ? V : e;
    return function (e, t, i) {
      function a() {
        f.forEach(function (e) {
          return e();
        }), f = [];
      }

      void 0 === i && (i = r);
      var s = {
        placement: "bottom",
        orderedModifiers: [],
        options: Object.assign(Object.assign({}, V), r),
        modifiersData: {},
        elements: {
          reference: e,
          popper: t
        },
        attributes: {},
        styles: {}
      },
          f = [],
          c = !1,
          p = {
        state: s,
        setOptions: function setOptions(i) {
          return a(), s.options = Object.assign(Object.assign(Object.assign({}, r), s.options), i), s.scrollParents = {
            reference: o(e) ? m(e) : e.contextElement ? m(e.contextElement) : [],
            popper: m(t)
          }, i = function (e) {
            var t = v(e);
            return N.reduce(function (e, n) {
              return e.concat(t.filter(function (e) {
                return e.phase === n;
              }));
            }, []);
          }(function (e) {
            var t = e.reduce(function (e, t) {
              var n = e[t.name];
              return e[t.name] = n ? Object.assign(Object.assign(Object.assign({}, n), t), {}, {
                options: Object.assign(Object.assign({}, n.options), t.options),
                data: Object.assign(Object.assign({}, n.data), t.data)
              }) : t, e;
            }, {});
            return Object.keys(t).map(function (e) {
              return t[e];
            });
          }([].concat(n, s.options.modifiers))), s.orderedModifiers = i.filter(function (e) {
            return e.enabled;
          }), s.orderedModifiers.forEach(function (e) {
            var t = e.name,
                n = e.options;
            n = void 0 === n ? {} : n, "function" == typeof (e = e.effect) && (t = e({
              state: s,
              name: t,
              instance: p,
              options: n
            }), f.push(t || function () {}));
          }), p.update();
        },
        forceUpdate: function forceUpdate() {
          if (!c) {
            var e = s.elements,
                t = e.reference;
            if (k(t, e = e.popper)) for (s.rects = {
              reference: l(t, g(e), "fixed" === s.options.strategy),
              popper: u(e)
            }, s.reset = !1, s.placement = s.options.placement, s.orderedModifiers.forEach(function (e) {
              return s.modifiersData[e.name] = Object.assign({}, e.data);
            }), t = 0; t < s.orderedModifiers.length; t++) {
              if (!0 === s.reset) s.reset = !1, t = -1;else {
                var n = s.orderedModifiers[t];
                e = n.fn;
                var r = n.options;
                r = void 0 === r ? {} : r, n = n.name, "function" == typeof e && (s = e({
                  state: s,
                  options: r,
                  name: n,
                  instance: p
                }) || s);
              }
            }
          }
        },
        update: b(function () {
          return new Promise(function (e) {
            p.forceUpdate(), e(s);
          });
        }),
        destroy: function destroy() {
          a(), c = !0;
        }
      };
      return k(e, t) ? (p.setOptions(i).then(function (e) {
        !c && i.onFirstUpdate && i.onFirstUpdate(e);
      }), p) : p;
    };
  }

  function W(e) {
    var t,
        r = e.popper,
        o = e.popperRect,
        i = e.placement,
        a = e.offsets,
        f = e.position,
        c = e.gpuAcceleration,
        p = e.adaptive;
    e.roundOffsets ? (e = window.devicePixelRatio || 1, e = {
      x: Math.round(a.x * e) / e || 0,
      y: Math.round(a.y * e) / e || 0
    }) : e = a;
    var l = e;
    e = void 0 === (e = l.x) ? 0 : e, l = void 0 === (l = l.y) ? 0 : l;
    var u = a.hasOwnProperty("x");
    a = a.hasOwnProperty("y");
    var d,
        m = "left",
        h = "top",
        v = window;

    if (p) {
      var b = g(r);
      b === n(r) && (b = s(r)), "top" === i && (h = "bottom", l -= b.clientHeight - o.height, l *= c ? 1 : -1), "left" === i && (m = "right", e -= b.clientWidth - o.width, e *= c ? 1 : -1);
    }

    return r = Object.assign({
      position: f
    }, p && z), c ? Object.assign(Object.assign({}, r), {}, ((d = {})[h] = a ? "0" : "", d[m] = u ? "0" : "", d.transform = 2 > (v.devicePixelRatio || 1) ? "translate(" + e + "px, " + l + "px)" : "translate3d(" + e + "px, " + l + "px, 0)", d)) : Object.assign(Object.assign({}, r), {}, ((t = {})[h] = a ? l + "px" : "", t[m] = u ? e + "px" : "", t.transform = "", t));
  }

  function A(e) {
    return e.replace(/left|right|bottom|top/g, function (e) {
      return G[e];
    });
  }

  function H(e) {
    return e.replace(/start|end/g, function (e) {
      return J[e];
    });
  }

  function R(e, t, n) {
    return void 0 === n && (n = {
      x: 0,
      y: 0
    }), {
      top: e.top - t.height - n.y,
      right: e.right - t.width + n.x,
      bottom: e.bottom - t.height + n.y,
      left: e.left - t.width - n.x
    };
  }

  function S(e) {
    return ["top", "right", "bottom", "left"].some(function (t) {
      return 0 <= e[t];
    });
  }

  var T = ["top", "bottom", "right", "left"],
      q = T.reduce(function (e, t) {
    return e.concat([t + "-start", t + "-end"]);
  }, []),
      C = [].concat(T, ["auto"]).reduce(function (e, t) {
    return e.concat([t, t + "-start", t + "-end"]);
  }, []),
      N = "beforeRead read afterRead beforeMain main afterMain beforeWrite write afterWrite".split(" "),
      V = {
    placement: "bottom",
    modifiers: [],
    strategy: "absolute"
  },
      I = {
    passive: !0
  },
      _ = {
    name: "eventListeners",
    enabled: !0,
    phase: "write",
    fn: function fn() {},
    effect: function effect(e) {
      var t = e.state,
          r = e.instance,
          o = (e = e.options).scroll,
          i = void 0 === o || o,
          a = void 0 === (e = e.resize) || e,
          s = n(t.elements.popper),
          f = [].concat(t.scrollParents.reference, t.scrollParents.popper);
      return i && f.forEach(function (e) {
        e.addEventListener("scroll", r.update, I);
      }), a && s.addEventListener("resize", r.update, I), function () {
        i && f.forEach(function (e) {
          e.removeEventListener("scroll", r.update, I);
        }), a && s.removeEventListener("resize", r.update, I);
      };
    },
    data: {}
  },
      U = {
    name: "popperOffsets",
    enabled: !0,
    phase: "read",
    fn: function fn(e) {
      var t = e.state;
      t.modifiersData[e.name] = E({
        reference: t.rects.reference,
        element: t.rects.popper,
        strategy: "absolute",
        placement: t.placement
      });
    },
    data: {}
  },
      z = {
    top: "auto",
    right: "auto",
    bottom: "auto",
    left: "auto"
  },
      F = {
    name: "computeStyles",
    enabled: !0,
    phase: "beforeWrite",
    fn: function fn(e) {
      var t = e.state,
          n = e.options;
      e = void 0 === (e = n.gpuAcceleration) || e;
      var r = n.adaptive;
      r = void 0 === r || r, n = void 0 === (n = n.roundOffsets) || n, e = {
        placement: y(t.placement),
        popper: t.elements.popper,
        popperRect: t.rects.popper,
        gpuAcceleration: e
      }, null != t.modifiersData.popperOffsets && (t.styles.popper = Object.assign(Object.assign({}, t.styles.popper), W(Object.assign(Object.assign({}, e), {}, {
        offsets: t.modifiersData.popperOffsets,
        position: t.options.strategy,
        adaptive: r,
        roundOffsets: n
      })))), null != t.modifiersData.arrow && (t.styles.arrow = Object.assign(Object.assign({}, t.styles.arrow), W(Object.assign(Object.assign({}, e), {}, {
        offsets: t.modifiersData.arrow,
        position: "absolute",
        adaptive: !1,
        roundOffsets: n
      })))), t.attributes.popper = Object.assign(Object.assign({}, t.attributes.popper), {}, {
        "data-popper-placement": t.placement
      });
    },
    data: {}
  },
      X = {
    name: "applyStyles",
    enabled: !0,
    phase: "write",
    fn: function fn(e) {
      var t = e.state;
      Object.keys(t.elements).forEach(function (e) {
        var n = t.styles[e] || {},
            r = t.attributes[e] || {},
            o = t.elements[e];
        i(o) && a(o) && (Object.assign(o.style, n), Object.keys(r).forEach(function (e) {
          var t = r[e];
          !1 === t ? o.removeAttribute(e) : o.setAttribute(e, !0 === t ? "" : t);
        }));
      });
    },
    effect: function effect(e) {
      var t = e.state,
          n = {
        popper: {
          position: t.options.strategy,
          left: "0",
          top: "0",
          margin: "0"
        },
        arrow: {
          position: "absolute"
        },
        reference: {}
      };
      return Object.assign(t.elements.popper.style, n.popper), t.elements.arrow && Object.assign(t.elements.arrow.style, n.arrow), function () {
        Object.keys(t.elements).forEach(function (e) {
          var r = t.elements[e],
              o = t.attributes[e] || {};
          e = Object.keys(t.styles.hasOwnProperty(e) ? t.styles[e] : n[e]).reduce(function (e, t) {
            return e[t] = "", e;
          }, {}), i(r) && a(r) && (Object.assign(r.style, e), Object.keys(o).forEach(function (e) {
            r.removeAttribute(e);
          }));
        });
      };
    },
    requires: ["computeStyles"]
  },
      Y = {
    name: "offset",
    enabled: !0,
    phase: "main",
    requires: ["popperOffsets"],
    fn: function fn(e) {
      var t = e.state,
          n = e.name,
          r = void 0 === (e = e.options.offset) ? [0, 0] : e,
          o = (e = C.reduce(function (e, n) {
        var o = t.rects,
            i = y(n),
            a = 0 <= ["left", "top"].indexOf(i) ? -1 : 1,
            s = "function" == typeof r ? r(Object.assign(Object.assign({}, o), {}, {
          placement: n
        })) : r;
        return o = (o = s[0]) || 0, s = ((s = s[1]) || 0) * a, i = 0 <= ["left", "right"].indexOf(i) ? {
          x: s,
          y: o
        } : {
          x: o,
          y: s
        }, e[n] = i, e;
      }, {}))[t.placement],
          i = o.x;
      o = o.y, null != t.modifiersData.popperOffsets && (t.modifiersData.popperOffsets.x += i, t.modifiersData.popperOffsets.y += o), t.modifiersData[n] = e;
    }
  },
      G = {
    left: "right",
    right: "left",
    bottom: "top",
    top: "bottom"
  },
      J = {
    start: "end",
    end: "start"
  },
      K = {
    name: "flip",
    enabled: !0,
    phase: "main",
    fn: function fn(e) {
      var t = e.state,
          n = e.options;

      if (e = e.name, !t.modifiersData[e]._skip) {
        var r = n.mainAxis;
        r = void 0 === r || r;
        var o = n.altAxis;
        o = void 0 === o || o;
        var i = n.fallbackPlacements,
            a = n.padding,
            s = n.boundary,
            f = n.rootBoundary,
            c = n.altBoundary,
            p = n.flipVariations,
            l = void 0 === p || p,
            u = n.allowedAutoPlacements;
        p = y(n = t.options.placement), i = i || (p !== n && l ? function (e) {
          if ("auto" === y(e)) return [];
          var t = A(e);
          return [H(e), t, H(t)];
        }(n) : [A(n)]);
        var d = [n].concat(i).reduce(function (e, n) {
          return e.concat("auto" === y(n) ? function (e, t) {
            void 0 === t && (t = {});
            var n = t.boundary,
                r = t.rootBoundary,
                o = t.padding,
                i = t.flipVariations,
                a = t.allowedAutoPlacements,
                s = void 0 === a ? C : a,
                f = t.placement.split("-")[1];
            0 === (i = (t = f ? i ? q : q.filter(function (e) {
              return e.split("-")[1] === f;
            }) : T).filter(function (e) {
              return 0 <= s.indexOf(e);
            })).length && (i = t);
            var c = i.reduce(function (t, i) {
              return t[i] = L(e, {
                placement: i,
                boundary: n,
                rootBoundary: r,
                padding: o
              })[y(i)], t;
            }, {});
            return Object.keys(c).sort(function (e, t) {
              return c[e] - c[t];
            });
          }(t, {
            placement: n,
            boundary: s,
            rootBoundary: f,
            padding: a,
            flipVariations: l,
            allowedAutoPlacements: u
          }) : n);
        }, []);
        n = t.rects.reference, i = t.rects.popper;
        var m = new Map();
        p = !0;

        for (var h = d[0], g = 0; g < d.length; g++) {
          var v = d[g],
              b = y(v),
              O = "start" === v.split("-")[1],
              w = 0 <= ["top", "bottom"].indexOf(b),
              x = w ? "width" : "height",
              j = L(t, {
            placement: v,
            boundary: s,
            rootBoundary: f,
            altBoundary: c,
            padding: a
          });

          if (O = w ? O ? "right" : "left" : O ? "bottom" : "top", n[x] > i[x] && (O = A(O)), x = A(O), w = [], r && w.push(0 >= j[b]), o && w.push(0 >= j[O], 0 >= j[x]), w.every(function (e) {
            return e;
          })) {
            h = v, p = !1;
            break;
          }

          m.set(v, w);
        }

        if (p) for (r = function r(e) {
          var t = d.find(function (t) {
            if (t = m.get(t)) return t.slice(0, e).every(function (e) {
              return e;
            });
          });
          if (t) return h = t, "break";
        }, o = l ? 3 : 1; 0 < o && "break" !== r(o); o--) {
          ;
        }
        t.placement !== h && (t.modifiersData[e]._skip = !0, t.placement = h, t.reset = !0);
      }
    },
    requiresIfExists: ["offset"],
    data: {
      _skip: !1
    }
  },
      Q = {
    name: "preventOverflow",
    enabled: !0,
    phase: "main",
    fn: function fn(e) {
      var t = e.state,
          n = e.options;
      e = e.name;
      var r = n.mainAxis,
          o = void 0 === r || r;
      r = void 0 !== (r = n.altAxis) && r;
      var i = n.tether;
      i = void 0 === i || i;
      var a = n.tetherOffset,
          s = void 0 === a ? 0 : a;
      n = L(t, {
        boundary: n.boundary,
        rootBoundary: n.rootBoundary,
        padding: n.padding,
        altBoundary: n.altBoundary
      }), a = y(t.placement);
      var f = t.placement.split("-")[1],
          c = !f,
          p = M(a);
      a = "x" === p ? "y" : "x";
      var l = t.modifiersData.popperOffsets,
          d = t.rects.reference,
          m = t.rects.popper,
          h = "function" == typeof s ? s(Object.assign(Object.assign({}, t.rects), {}, {
        placement: t.placement
      })) : s;

      if (s = {
        x: 0,
        y: 0
      }, l) {
        if (o) {
          var v = "y" === p ? "top" : "left",
              b = "y" === p ? "bottom" : "right",
              O = "y" === p ? "height" : "width";
          o = l[p];
          var w = l[p] + n[v],
              x = l[p] - n[b],
              j = i ? -m[O] / 2 : 0,
              E = "start" === f ? d[O] : m[O];
          f = "start" === f ? -m[O] : -d[O], m = t.elements.arrow, m = i && m ? u(m) : {
            width: 0,
            height: 0
          };
          var D = t.modifiersData["arrow#persistent"] ? t.modifiersData["arrow#persistent"].padding : {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          };
          v = D[v], b = D[b], m = Math.max(0, Math.min(d[O], m[O])), E = c ? d[O] / 2 - j - m - v - h : E - m - v - h, c = c ? -d[O] / 2 + j + m + b + h : f + m + b + h, h = t.elements.arrow && g(t.elements.arrow), d = t.modifiersData.offset ? t.modifiersData.offset[t.placement][p] : 0, h = l[p] + E - d - (h ? "y" === p ? h.clientTop || 0 : h.clientLeft || 0 : 0), c = l[p] + c - d, i = Math.max(i ? Math.min(w, h) : w, Math.min(o, i ? Math.max(x, c) : x)), l[p] = i, s[p] = i - o;
        }

        r && (r = l[a], i = Math.max(r + n["x" === p ? "top" : "left"], Math.min(r, r - n["x" === p ? "bottom" : "right"])), l[a] = i, s[a] = i - r), t.modifiersData[e] = s;
      }
    },
    requiresIfExists: ["offset"]
  },
      Z = {
    name: "arrow",
    enabled: !0,
    phase: "main",
    fn: function fn(e) {
      var t,
          n = e.state;
      e = e.name;
      var r = n.elements.arrow,
          o = n.modifiersData.popperOffsets,
          i = y(n.placement),
          a = M(i);

      if (i = 0 <= ["left", "right"].indexOf(i) ? "height" : "width", r && o) {
        var s = n.modifiersData[e + "#persistent"].padding,
            f = u(r),
            c = "y" === a ? "top" : "left",
            p = "y" === a ? "bottom" : "right",
            l = n.rects.reference[i] + n.rects.reference[a] - o[a] - n.rects.popper[i];
        o = o[a] - n.rects.reference[a], l = (r = (r = g(r)) ? "y" === a ? r.clientHeight || 0 : r.clientWidth || 0 : 0) / 2 - f[i] / 2 + (l / 2 - o / 2), i = Math.max(s[c], Math.min(l, r - f[i] - s[p])), n.modifiersData[e] = ((t = {})[a] = i, t.centerOffset = i - l, t);
      }
    },
    effect: function effect(e) {
      var t = e.state,
          n = e.options;
      e = e.name;
      var r = n.element;

      if (r = void 0 === r ? "[data-popper-arrow]" : r, n = void 0 === (n = n.padding) ? 0 : n, null != r) {
        if ("string" == typeof r && !(r = t.elements.popper.querySelector(r))) return;
        O(t.elements.popper, r) && (t.elements.arrow = r, t.modifiersData[e + "#persistent"] = {
          padding: D("number" != typeof n ? n : P(n, T))
        });
      }
    },
    requires: ["popperOffsets"],
    requiresIfExists: ["preventOverflow"]
  },
      $ = {
    name: "hide",
    enabled: !0,
    phase: "main",
    requiresIfExists: ["preventOverflow"],
    fn: function fn(e) {
      var t = e.state;
      e = e.name;
      var n = t.rects.reference,
          r = t.rects.popper,
          o = t.modifiersData.preventOverflow,
          i = L(t, {
        elementContext: "reference"
      }),
          a = L(t, {
        altBoundary: !0
      });
      n = R(i, n), r = R(a, r, o), o = S(n), a = S(r), t.modifiersData[e] = {
        referenceClippingOffsets: n,
        popperEscapeOffsets: r,
        isReferenceHidden: o,
        hasPopperEscaped: a
      }, t.attributes.popper = Object.assign(Object.assign({}, t.attributes.popper), {}, {
        "data-popper-reference-hidden": o,
        "data-popper-escaped": a
      });
    }
  },
      ee = B({
    defaultModifiers: [_, U, F, X]
  }),
      te = [_, U, F, X, Y, K, Q, Z, $],
      ne = B({
    defaultModifiers: te
  });
  e.applyStyles = X, e.arrow = Z, e.computeStyles = F, e.createPopper = ne, e.createPopperLite = ee, e.defaultModifiers = te, e.detectOverflow = L, e.eventListeners = _, e.flip = K, e.hide = $, e.offset = Y, e.popperGenerator = B, e.popperOffsets = U, e.preventOverflow = Q, Object.defineProperty(e, "__esModule", {
    value: !0
  });
});

/***/ }),

/***/ "./src/js/calendar/js/z_calendar.js":
/*!******************************************!*\
  !*** ./src/js/calendar/js/z_calendar.js ***!
  \******************************************/
/***/ (function() {

/*------------------------------------------------
            Full Year Calendar
   ------------------------------------------------*/
var currentYear = new Date().getFullYear();
var popperInstance = null;
var tooltip = document.querySelectorAll('#tooltip');
var calendar = document.querySelector('#calendar');
var url_json = "http://localhost:10034/wp-json/actouts/v1/event";
fetch(url_json, {
  method: "GET",
  headers: {
    "Content-type": "application/json;charset=UTF-8"
  }
}).then(function (response) {
  return response.json();
}).then(function (response) {
  var dataResponse = response.dataSource;
  var dataEvents = dataResponse.map(function (item, index) {
    var startDay = eval(item['startDate']).getDate(),
        startMonth = eval(item['startDate']).getMonth() - 1,
        startYear = eval(item['startDate']).getFullYear(),
        endDay = eval(item['endDate']).getDate(),
        endMonth = eval(item['endDate']).getMonth() - 1,
        endYear = eval(item['endDate']).getFullYear();
    return object = {
      name: item['name'],
      color: item['color'],
      startDate: new Date(startYear, startMonth, startDay),
      endDate: new Date(endYear, endMonth, endDay),
      permalink: item['permalink']
    };
  });
  new Calendar(calendar, {
    style: 'background',
    mouseOnDay: function mouseOnDay(e) {
      if (e.events.length > 0) {
        var create = function create() {
          popperInstance = Popper.createPopper(e.element, content, {
            modifiers: [{
              name: 'offset',
              options: {
                offset: [100, 50]
              }
            }]
          });
        };

        var show = function show() {
          document.querySelector('#tooltip').setAttribute('data-show', '');
          create();
        };

        var content = '';

        for (var i in e.events) {
          content += "<div id=\"tooltip\" class=\"event-tooltip-content\" style=\"display: block\" role=\"tooltip\">\n               <div class=\"event-name\" style=\"color: ".concat(e.events[i].color, "\">\n         ").concat(e.events[i].name, "</div>\n         <div><a href=\"").concat(e.events[i].permalink, "\">Read more</a></div>\n         <div id=\"arrow\" data-popper-arrow></div>\n         </div>");
        }

        e.element.innerHTMl = content;
        e.element.setAttribute('id', 'day-display');
        var idDay = document.querySelector('#day-display');
        var eventContainer = document.createElement('div');
        idDay.insertBefore(eventContainer, idDay.childNodes[0]);
        idDay.querySelector('div').innerHTML = content;
        var showEvents = ['mouseenter', 'focus'];
        showEvents.forEach(function (event) {
          e.element.addEventListener(event, show);
        });
      }
    },
    mouseOutDay: function mouseOutDay(e) {
      if (e.events.length > 0) {
        var destroy = function destroy() {
          if (popperInstance) {
            popperInstance.destroy();
            popperInstance = null;
          }
        };

        var hide = function hide() {
          destroy();
        };

        var hideEvents = ['mouseleave', 'blur'];
        hideEvents.forEach(function (event) {
          e.element.addEventListener(event, hide);
        });
        var idDay = document.querySelector('#day-display');

        var _tooltip = idDay.querySelector('div');

        _tooltip.remove();

        idDay.removeAttribute('id');
      }
    },
    dayContextMenu: function dayContextMenu(e) {
      function destroy() {
        if (popperInstance) {
          popperInstance.destroy();
          popperInstance = null;
        }
      }

      function hide() {
        document.querySelector('#tooltip').removeAttribute('data-show');
        destroy();
      }

      var hideEvents = ['mouseleave', 'blur'];
      hideEvents.forEach(function (event) {
        e.element.addEventListener(event, hide);
      });
    },
    dataSource: dataEvents
  });
})["catch"](function (err) {
  new Calendar(calendar, {});
  var content = '';
  content += "<p class=\"err-info\">Sorry, there is problem with connection. Events cannot be displayed.  Please try it later.</p>";
  var newDiv = document.createElement('div');
  var pageId = document.querySelector('#post-53');
  pageId.insertBefore(newDiv, pageId.childNodes[0]);
  pageId.querySelector('div').innerHTML = content;
});

/***/ }),

/***/ "./src/js/calendar/css/modules/style.scss":
/*!************************************************!*\
  !*** ./src/js/calendar/css/modules/style.scss ***!
  \************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	// startup
/******/ 	// Load entry module
/******/ 	__webpack_require__("./src/js/calendar.js");
/******/ 	// This entry module used 'exports' so it can't be inlined
/******/ })()
;
//# sourceMappingURL=calendar.js.map