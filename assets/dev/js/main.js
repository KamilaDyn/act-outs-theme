/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _main_js_skip_link_focus_fix_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./main/js/skip-link-focus-fix.js */ "./src/js/main/js/skip-link-focus-fix.js");
/* harmony import */ var _main_js_skip_link_focus_fix_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_main_js_skip_link_focus_fix_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _main_js_require_min_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./main/js/require.min.js */ "./src/js/main/js/require.min.js");
/* harmony import */ var _main_js_require_min_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_main_js_require_min_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _main_js_navigation_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./main/js/navigation.js */ "./src/js/main/js/navigation.js");
/* harmony import */ var _main_js_navigation_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_main_js_navigation_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _main_js_custom_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./main/js/custom.js */ "./src/js/main/js/custom.js");
/* harmony import */ var _main_js_custom_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_main_js_custom_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _main_js_z_lightbox_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./main/js/z_lightbox.js */ "./src/js/main/js/z_lightbox.js");
/* harmony import */ var _main_js_z_lightbox_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_main_js_z_lightbox_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _main_modules_style_scss__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./main/modules/style.scss */ "./src/js/main/modules/style.scss");
/* harmony import */ var _images_logo_small_png__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../images/logo_small.png */ "./src/images/logo_small.png");
//js





 //images



/***/ }),

/***/ "./src/js/main/js/custom.js":
/*!**********************************!*\
  !*** ./src/js/main/js/custom.js ***!
  \**********************************/
/***/ (function() {

jQuery(document).ready(function ($) {
  /*------------------------------------------------
              MAIN NAVIGATION
  ------------------------------------------------*/
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll > 1) {
      $("#masthead").addClass("nav-shrink");
    } else {
      $("#masthead").removeClass("nav-shrink");
    }
  });
  $('.main-navigation .nav-menu .menu-item-has-children > a').after($('<button class="dropdown-toggle"><i class="fa fa-angle-down"></i></button>'));
  $('button.dropdown-toggle').click(function () {
    $(this).toggleClass('active');
    $(this).parent().find('.sub-menu').first().slideToggle();
    $(this).children('.fa-angle-down').toggleClass('rotate');
  });
  $(window).scroll(function () {
    if ($(this).scrollTop() > 1) {
      $('.menu-sticky #masthead').addClass('nav-shrink');
    } else {
      $('.menu-sticky #masthead').removeClass('nav-shrink');
    }
  });
  /*------------------------------------------------
                  END JQUERY
  ------------------------------------------------*/
});

/***/ }),

/***/ "./src/js/main/js/navigation.js":
/*!**************************************!*\
  !*** ./src/js/main/js/navigation.js ***!
  \**************************************/
/***/ (function() {

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  var container, button, menu, links, i, len, menuContainer, overflow, subMenu;
  container = document.getElementById('site-navigation');

  if (!container) {
    return;
  }

  button = container.getElementsByTagName('button')[0];

  if ('undefined' === typeof button) {
    return;
  }

  menu = container.getElementsByTagName('ul')[0];
  menuContainer = container.getElementsByClassName('menu-main-menu-container')[0];
  overflow = document.querySelector('.overflow');

  button.onclick = function () {
    if (-1 !== container.className.indexOf('toggled')) {
      container.className = container.className.replace(' toggled', '');
      menuContainer.style.transform = 'translateX(-100%)';
      overflow.style.display = 'none';
    } else {
      container.className += ' toggled';
      menuContainer.style.transform = 'translateX(0)';
      menuContainer.style.transition = "all 0.5s ease-in";
      overflow.style.display = 'block';
    }
  };

  overflow.onclick = function () {
    container.className = container.className.replace(' toggled', '');
    menuContainer.style.transform = 'translateX(-100%)';
    overflow.style.display = 'none';
  }; // Get all the link elements within the menu.


  links = menu.getElementsByTagName('a');
  subMenu = document.querySelectorAll('.sub-menu li a');

  for (var i = 0; i < subMenu.length; i++) {
    subMenu[i].addEventListener('click', function () {
      if (-1 !== container.className.indexOf('toggled')) {
        container.className = container.className.replace(' toggled', '');
        menuContainer.style.transform = 'translateX(-100%)';
        overflow.style.display = 'none';
      } else {
        menuContainer.style.transform = 'translateX(0)';
        menuContainer.style.transition = "all 0.5s ease-in";
        overflow.style.display = 'block';
      }
    });
  } // Each time a menu link is focused or blurred, toggle focus.


  for (i = 0, len = links.length; i < len; i++) {
    links[i].addEventListener('focus', toggleFocus, true);
    links[i].addEventListener('blur', toggleFocus, true);
  }
  /**
   * Sets or removes .focus class on an element.
   */


  function toggleFocus() {
    var self = this; // Move up through the ancestors of the current link until we hit .nav-menu.

    while (-1 === self.className.indexOf('nav-menu')) {
      // On li elements toggle the class .focus.
      if ('li' === self.tagName.toLowerCase()) {
        if (-1 !== self.className.indexOf('focus')) {
          self.className = self.className.replace(' focus', '');
        } else {
          self.className += ' focus';
        }
      }

      self = self.parentElement;
    }
  }
  /**
   * Toggles `focus` class to allow submenu access on tablets.
   */


  (function (container) {
    var touchStartFn,
        i,
        parentLink = container.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

    if ('ontouchstart' in window) {
      touchStartFn = function touchStartFn(e) {
        var menuItem = this.parentNode,
            i;

        if (!menuItem.classList.contains('focus')) {
          e.preventDefault();

          for (i = 0; i < menuItem.parentNode.children.length; ++i) {
            if (menuItem === menuItem.parentNode.children[i]) {
              continue;
            }

            menuItem.parentNode.children[i].classList.remove('focus');
          }

          menuItem.classList.add('focus');
        } else {
          menuItem.classList.remove('focus');
        }
      };

      for (i = 0; i < parentLink.length; ++i) {
        parentLink[i].addEventListener('touchstart', touchStartFn, false);
      }
    }
  })(container);
})();

/***/ }),

/***/ "./src/js/main/js/require.min.js":
/*!***************************************!*\
  !*** ./src/js/main/js/require.min.js ***!
  \***************************************/
/***/ (function() {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var requirejs, require, define;

!function (global, setTimeout) {
  var req,
      s,
      head,
      baseElement,
      dataMain,
      src,
      interactiveScript,
      currentlyAddingScript,
      mainScript,
      subPath,
      version = "2.3.6",
      commentRegExp = /\/\*[\s\S]*?\*\/|([^:"'=]|^)\/\/.*$/gm,
      cjsRequireRegExp = /[^.]\s*require\s*\(\s*["']([^'"\s]+)["']\s*\)/g,
      jsSuffixRegExp = /\.js$/,
      currDirRegExp = /^\.\//,
      op = Object.prototype,
      ostring = op.toString,
      hasOwn = op.hasOwnProperty,
      isBrowser = !("undefined" == typeof window || "undefined" == typeof navigator || !window.document),
      isWebWorker = !isBrowser && "undefined" != typeof importScripts,
      readyRegExp = isBrowser && "PLAYSTATION 3" === navigator.platform ? /^complete$/ : /^(complete|loaded)$/,
      defContextName = "_",
      isOpera = "undefined" != typeof opera && "[object Opera]" === opera.toString(),
      contexts = {},
      cfg = {},
      globalDefQueue = [],
      useInteractive = !1;

  function commentReplace(e, t) {
    return t || "";
  }

  function isFunction(e) {
    return "[object Function]" === ostring.call(e);
  }

  function isArray(e) {
    return "[object Array]" === ostring.call(e);
  }

  function each(e, t) {
    var i;
    if (e) for (i = 0; i < e.length && (!e[i] || !t(e[i], i, e)); i += 1) {
      ;
    }
  }

  function eachReverse(e, t) {
    var i;
    if (e) for (i = e.length - 1; -1 < i && (!e[i] || !t(e[i], i, e)); i -= 1) {
      ;
    }
  }

  function hasProp(e, t) {
    return hasOwn.call(e, t);
  }

  function getOwn(e, t) {
    return hasProp(e, t) && e[t];
  }

  function eachProp(e, t) {
    var i;

    for (i in e) {
      if (hasProp(e, i) && t(e[i], i)) break;
    }
  }

  function mixin(i, e, r, n) {
    return e && eachProp(e, function (e, t) {
      !r && hasProp(i, t) || (!n || "object" != _typeof(e) || !e || isArray(e) || isFunction(e) || e instanceof RegExp ? i[t] = e : (i[t] || (i[t] = {}), mixin(i[t], e, r, n)));
    }), i;
  }

  function bind(e, t) {
    return function () {
      return t.apply(e, arguments);
    };
  }

  function scripts() {
    return document.getElementsByTagName("script");
  }

  function defaultOnError(e) {
    throw e;
  }

  function getGlobal(e) {
    if (!e) return e;
    var t = global;
    return each(e.split("."), function (e) {
      t = t[e];
    }), t;
  }

  function makeError(e, t, i, r) {
    var n = new Error(t + "\nhttps://requirejs.org/docs/errors.html#" + e);
    return n.requireType = e, n.requireModules = r, i && (n.originalError = i), n;
  }

  if (void 0 === define) {
    if (void 0 !== requirejs) {
      if (isFunction(requirejs)) return;
      cfg = requirejs, requirejs = void 0;
    }

    void 0 === require || isFunction(require) || (cfg = require, require = void 0), req = requirejs = function requirejs(e, t, i, r) {
      var n,
          o,
          a = defContextName;
      return isArray(e) || "string" == typeof e || (o = e, isArray(t) ? (e = t, t = i, i = r) : e = []), o && o.context && (a = o.context), (n = getOwn(contexts, a)) || (n = contexts[a] = req.s.newContext(a)), o && n.configure(o), n.require(e, t, i);
    }, req.config = function (e) {
      return req(e);
    }, req.nextTick = void 0 !== setTimeout ? function (e) {
      setTimeout(e, 4);
    } : function (e) {
      e();
    }, require || (require = req), req.version = version, req.jsExtRegExp = /^\/|:|\?|\.js$/, req.isBrowser = isBrowser, s = req.s = {
      contexts: contexts,
      newContext: newContext
    }, req({}), each(["toUrl", "undef", "defined", "specified"], function (t) {
      req[t] = function () {
        var e = contexts[defContextName];
        return e.require[t].apply(e, arguments);
      };
    }), isBrowser && (head = s.head = document.getElementsByTagName("head")[0], baseElement = document.getElementsByTagName("base")[0], baseElement && (head = s.head = baseElement.parentNode)), req.onError = defaultOnError, req.createNode = function (e, t, i) {
      var r = e.xhtml ? document.createElementNS("http://www.w3.org/1999/xhtml", "html:script") : document.createElement("script");
      return r.type = e.scriptType || "text/javascript", r.charset = "utf-8", r.async = !0, r;
    }, req.load = function (t, i, r) {
      var e,
          n = t && t.config || {};
      if (isBrowser) return (e = req.createNode(n, i, r)).setAttribute("data-requirecontext", t.contextName), e.setAttribute("data-requiremodule", i), !e.attachEvent || e.attachEvent.toString && e.attachEvent.toString().indexOf("[native code") < 0 || isOpera ? (e.addEventListener("load", t.onScriptLoad, !1), e.addEventListener("error", t.onScriptError, !1)) : (useInteractive = !0, e.attachEvent("onreadystatechange", t.onScriptLoad)), e.src = r, n.onNodeCreated && n.onNodeCreated(e, n, i, r), currentlyAddingScript = e, baseElement ? head.insertBefore(e, baseElement) : head.appendChild(e), currentlyAddingScript = null, e;
      if (isWebWorker) try {
        setTimeout(function () {}, 0), importScripts(r), t.completeLoad(i);
      } catch (e) {
        t.onError(makeError("importscripts", "importScripts failed for " + i + " at " + r, e, [i]));
      }
    }, isBrowser && !cfg.skipDataMain && eachReverse(scripts(), function (e) {
      if (head || (head = e.parentNode), dataMain = e.getAttribute("data-main")) return mainScript = dataMain, cfg.baseUrl || -1 !== mainScript.indexOf("!") || (mainScript = (src = mainScript.split("/")).pop(), subPath = src.length ? src.join("/") + "/" : "./", cfg.baseUrl = subPath), mainScript = mainScript.replace(jsSuffixRegExp, ""), req.jsExtRegExp.test(mainScript) && (mainScript = dataMain), cfg.deps = cfg.deps ? cfg.deps.concat(mainScript) : [mainScript], !0;
    }), define = function define(e, i, t) {
      var r, n;
      "string" != typeof e && (t = i, i = e, e = null), isArray(i) || (t = i, i = null), !i && isFunction(t) && (i = [], t.length && (t.toString().replace(commentRegExp, commentReplace).replace(cjsRequireRegExp, function (e, t) {
        i.push(t);
      }), i = (1 === t.length ? ["require"] : ["require", "exports", "module"]).concat(i))), useInteractive && (r = currentlyAddingScript || getInteractiveScript()) && (e || (e = r.getAttribute("data-requiremodule")), n = contexts[r.getAttribute("data-requirecontext")]), n ? (n.defQueue.push([e, i, t]), n.defQueueMap[e] = !0) : globalDefQueue.push([e, i, t]);
    }, define.amd = {
      jQuery: !0
    }, req.exec = function (text) {
      return eval(text);
    }, req(cfg);
  }

  function newContext(u) {
    var i,
        e,
        l,
        c,
        d,
        g = {
      waitSeconds: 7,
      baseUrl: "./",
      paths: {},
      bundles: {},
      pkgs: {},
      shim: {},
      config: {}
    },
        p = {},
        f = {},
        r = {},
        h = [],
        m = {},
        n = {},
        v = {},
        x = 1,
        b = 1;

    function q(e, t, i) {
      var r,
          n,
          o,
          a,
          s,
          u,
          c,
          d,
          p,
          f,
          l = t && t.split("/"),
          h = g.map,
          m = h && h["*"];

      if (e && (u = (e = e.split("/")).length - 1, g.nodeIdCompat && jsSuffixRegExp.test(e[u]) && (e[u] = e[u].replace(jsSuffixRegExp, "")), "." === e[0].charAt(0) && l && (e = l.slice(0, l.length - 1).concat(e)), function (e) {
        var t, i;

        for (t = 0; t < e.length; t++) {
          if ("." === (i = e[t])) e.splice(t, 1), t -= 1;else if (".." === i) {
            if (0 === t || 1 === t && ".." === e[2] || ".." === e[t - 1]) continue;
            0 < t && (e.splice(t - 1, 2), t -= 2);
          }
        }
      }(e), e = e.join("/")), i && h && (l || m)) {
        e: for (o = (n = e.split("/")).length; 0 < o; o -= 1) {
          if (s = n.slice(0, o).join("/"), l) for (a = l.length; 0 < a; a -= 1) {
            if ((r = getOwn(h, l.slice(0, a).join("/"))) && (r = getOwn(r, s))) {
              c = r, d = o;
              break e;
            }
          }
          !p && m && getOwn(m, s) && (p = getOwn(m, s), f = o);
        }

        !c && p && (c = p, d = f), c && (n.splice(0, d, c), e = n.join("/"));
      }

      return getOwn(g.pkgs, e) || e;
    }

    function E(t) {
      isBrowser && each(scripts(), function (e) {
        if (e.getAttribute("data-requiremodule") === t && e.getAttribute("data-requirecontext") === l.contextName) return e.parentNode.removeChild(e), !0;
      });
    }

    function w(e) {
      var t = getOwn(g.paths, e);
      if (t && isArray(t) && 1 < t.length) return t.shift(), l.require.undef(e), l.makeRequire(null, {
        skipMap: !0
      })([e]), !0;
    }

    function y(e) {
      var t,
          i = e ? e.indexOf("!") : -1;
      return -1 < i && (t = e.substring(0, i), e = e.substring(i + 1, e.length)), [t, e];
    }

    function S(e, t, i, r) {
      var n,
          o,
          a,
          s,
          u = null,
          c = t ? t.name : null,
          d = e,
          p = !0,
          f = "";
      return e || (p = !1, e = "_@r" + (x += 1)), u = (s = y(e))[0], e = s[1], u && (u = q(u, c, r), o = getOwn(m, u)), e && (u ? f = i ? e : o && o.normalize ? o.normalize(e, function (e) {
        return q(e, c, r);
      }) : -1 === e.indexOf("!") ? q(e, c, r) : e : (u = (s = y(f = q(e, c, r)))[0], f = s[1], i = !0, n = l.nameToUrl(f))), {
        prefix: u,
        name: f,
        parentMap: t,
        unnormalized: !!(a = !u || o || i ? "" : "_unnormalized" + (b += 1)),
        url: n,
        originalName: d,
        isDefine: p,
        id: (u ? u + "!" + f : f) + a
      };
    }

    function k(e) {
      var t = e.id,
          i = getOwn(p, t);
      return i || (i = p[t] = new l.Module(e)), i;
    }

    function M(e, t, i) {
      var r = e.id,
          n = getOwn(p, r);
      !hasProp(m, r) || n && !n.defineEmitComplete ? (n = k(e)).error && "error" === t ? i(n.error) : n.on(t, i) : "defined" === t && i(m[r]);
    }

    function O(i, e) {
      var t = i.requireModules,
          r = !1;
      e ? e(i) : (each(t, function (e) {
        var t = getOwn(p, e);
        t && (t.error = i, t.events.error && (r = !0, t.emit("error", i)));
      }), r || req.onError(i));
    }

    function j() {
      globalDefQueue.length && (each(globalDefQueue, function (e) {
        var t = e[0];
        "string" == typeof t && (l.defQueueMap[t] = !0), h.push(e);
      }), globalDefQueue = []);
    }

    function P(e) {
      delete p[e], delete f[e];
    }

    function R() {
      var e,
          r,
          t = 1e3 * g.waitSeconds,
          n = t && l.startTime + t < new Date().getTime(),
          o = [],
          a = [],
          s = !1,
          u = !0;

      if (!i) {
        if (i = !0, eachProp(f, function (e) {
          var t = e.map,
              i = t.id;
          if (e.enabled && (t.isDefine || a.push(e), !e.error)) if (!e.inited && n) w(i) ? s = r = !0 : (o.push(i), E(i));else if (!e.inited && e.fetched && t.isDefine && (s = !0, !t.prefix)) return u = !1;
        }), n && o.length) return (e = makeError("timeout", "Load timeout for modules: " + o, null, o)).contextName = l.contextName, O(e);
        u && each(a, function (e) {
          !function n(o, a, s) {
            var e = o.map.id;
            o.error ? o.emit("error", o.error) : (a[e] = !0, each(o.depMaps, function (e, t) {
              var i = e.id,
                  r = getOwn(p, i);
              !r || o.depMatched[t] || s[i] || (getOwn(a, i) ? (o.defineDep(t, m[i]), o.check()) : n(r, a, s));
            }), s[e] = !0);
          }(e, {}, {});
        }), n && !r || !s || !isBrowser && !isWebWorker || d || (d = setTimeout(function () {
          d = 0, R();
        }, 50)), i = !1;
      }
    }

    function a(e) {
      hasProp(m, e[0]) || k(S(e[0], null, !0)).init(e[1], e[2]);
    }

    function o(e, t, i, r) {
      e.detachEvent && !isOpera ? r && e.detachEvent(r, t) : e.removeEventListener(i, t, !1);
    }

    function s(e) {
      var t = e.currentTarget || e.srcElement;
      return o(t, l.onScriptLoad, "load", "onreadystatechange"), o(t, l.onScriptError, "error"), {
        node: t,
        id: t && t.getAttribute("data-requiremodule")
      };
    }

    function T() {
      var e;

      for (j(); h.length;) {
        if (null === (e = h.shift())[0]) return O(makeError("mismatch", "Mismatched anonymous define() module: " + e[e.length - 1]));
        a(e);
      }

      l.defQueueMap = {};
    }

    return c = {
      require: function require(e) {
        return e.require ? e.require : e.require = l.makeRequire(e.map);
      },
      exports: function exports(e) {
        if (e.usingExports = !0, e.map.isDefine) return e.exports ? m[e.map.id] = e.exports : e.exports = m[e.map.id] = {};
      },
      module: function module(e) {
        return e.module ? e.module : e.module = {
          id: e.map.id,
          uri: e.map.url,
          config: function config() {
            return getOwn(g.config, e.map.id) || {};
          },
          exports: e.exports || (e.exports = {})
        };
      }
    }, (e = function e(_e) {
      this.events = getOwn(r, _e.id) || {}, this.map = _e, this.shim = getOwn(g.shim, _e.id), this.depExports = [], this.depMaps = [], this.depMatched = [], this.pluginMaps = {}, this.depCount = 0;
    }).prototype = {
      init: function init(e, t, i, r) {
        r = r || {}, this.inited || (this.factory = t, i ? this.on("error", i) : this.events.error && (i = bind(this, function (e) {
          this.emit("error", e);
        })), this.depMaps = e && e.slice(0), this.errback = i, this.inited = !0, this.ignore = r.ignore, r.enabled || this.enabled ? this.enable() : this.check());
      },
      defineDep: function defineDep(e, t) {
        this.depMatched[e] || (this.depMatched[e] = !0, this.depCount -= 1, this.depExports[e] = t);
      },
      fetch: function fetch() {
        if (!this.fetched) {
          this.fetched = !0, l.startTime = new Date().getTime();
          var e = this.map;
          if (!this.shim) return e.prefix ? this.callPlugin() : this.load();
          l.makeRequire(this.map, {
            enableBuildCallback: !0
          })(this.shim.deps || [], bind(this, function () {
            return e.prefix ? this.callPlugin() : this.load();
          }));
        }
      },
      load: function load() {
        var e = this.map.url;
        n[e] || (n[e] = !0, l.load(this.map.id, e));
      },
      check: function check() {
        if (this.enabled && !this.enabling) {
          var t,
              e,
              i = this.map.id,
              r = this.depExports,
              n = this.exports,
              o = this.factory;

          if (this.inited) {
            if (this.error) this.emit("error", this.error);else if (!this.defining) {
              if (this.defining = !0, this.depCount < 1 && !this.defined) {
                if (isFunction(o)) {
                  if (this.events.error && this.map.isDefine || req.onError !== defaultOnError) try {
                    n = l.execCb(i, o, r, n);
                  } catch (e) {
                    t = e;
                  } else n = l.execCb(i, o, r, n);
                  if (this.map.isDefine && void 0 === n && ((e = this.module) ? n = e.exports : this.usingExports && (n = this.exports)), t) return t.requireMap = this.map, t.requireModules = this.map.isDefine ? [this.map.id] : null, t.requireType = this.map.isDefine ? "define" : "require", O(this.error = t);
                } else n = o;

                if (this.exports = n, this.map.isDefine && !this.ignore && (m[i] = n, req.onResourceLoad)) {
                  var a = [];
                  each(this.depMaps, function (e) {
                    a.push(e.normalizedMap || e);
                  }), req.onResourceLoad(l, this.map, a);
                }

                P(i), this.defined = !0;
              }

              this.defining = !1, this.defined && !this.defineEmitted && (this.defineEmitted = !0, this.emit("defined", this.exports), this.defineEmitComplete = !0);
            }
          } else hasProp(l.defQueueMap, i) || this.fetch();
        }
      },
      callPlugin: function callPlugin() {
        var u = this.map,
            c = u.id,
            e = S(u.prefix);
        this.depMaps.push(e), M(e, "defined", bind(this, function (e) {
          var o,
              t,
              i,
              r = getOwn(v, this.map.id),
              n = this.map.name,
              a = this.map.parentMap ? this.map.parentMap.name : null,
              s = l.makeRequire(u.parentMap, {
            enableBuildCallback: !0
          });
          return this.map.unnormalized ? (e.normalize && (n = e.normalize(n, function (e) {
            return q(e, a, !0);
          }) || ""), M(t = S(u.prefix + "!" + n, this.map.parentMap, !0), "defined", bind(this, function (e) {
            this.map.normalizedMap = t, this.init([], function () {
              return e;
            }, null, {
              enabled: !0,
              ignore: !0
            });
          })), void ((i = getOwn(p, t.id)) && (this.depMaps.push(t), this.events.error && i.on("error", bind(this, function (e) {
            this.emit("error", e);
          })), i.enable()))) : r ? (this.map.url = l.nameToUrl(r), void this.load()) : ((o = bind(this, function (e) {
            this.init([], function () {
              return e;
            }, null, {
              enabled: !0
            });
          })).error = bind(this, function (e) {
            this.inited = !0, (this.error = e).requireModules = [c], eachProp(p, function (e) {
              0 === e.map.id.indexOf(c + "_unnormalized") && P(e.map.id);
            }), O(e);
          }), o.fromText = bind(this, function (e, t) {
            var i = u.name,
                r = S(i),
                n = useInteractive;
            t && (e = t), n && (useInteractive = !1), k(r), hasProp(g.config, c) && (g.config[i] = g.config[c]);

            try {
              req.exec(e);
            } catch (e) {
              return O(makeError("fromtexteval", "fromText eval for " + c + " failed: " + e, e, [c]));
            }

            n && (useInteractive = !0), this.depMaps.push(r), l.completeLoad(i), s([i], o);
          }), void e.load(u.name, s, o, g));
        })), l.enable(e, this), this.pluginMaps[e.id] = e;
      },
      enable: function enable() {
        (f[this.map.id] = this).enabled = !0, this.enabling = !0, each(this.depMaps, bind(this, function (e, t) {
          var i, r, n;

          if ("string" == typeof e) {
            if (e = S(e, this.map.isDefine ? this.map : this.map.parentMap, !1, !this.skipMap), this.depMaps[t] = e, n = getOwn(c, e.id)) return void (this.depExports[t] = n(this));
            this.depCount += 1, M(e, "defined", bind(this, function (e) {
              this.undefed || (this.defineDep(t, e), this.check());
            })), this.errback ? M(e, "error", bind(this, this.errback)) : this.events.error && M(e, "error", bind(this, function (e) {
              this.emit("error", e);
            }));
          }

          i = e.id, r = p[i], hasProp(c, i) || !r || r.enabled || l.enable(e, this);
        })), eachProp(this.pluginMaps, bind(this, function (e) {
          var t = getOwn(p, e.id);
          t && !t.enabled && l.enable(e, this);
        })), this.enabling = !1, this.check();
      },
      on: function on(e, t) {
        var i = this.events[e];
        i || (i = this.events[e] = []), i.push(t);
      },
      emit: function emit(e, t) {
        each(this.events[e], function (e) {
          e(t);
        }), "error" === e && delete this.events[e];
      }
    }, (l = {
      config: g,
      contextName: u,
      registry: p,
      defined: m,
      urlFetched: n,
      defQueue: h,
      defQueueMap: {},
      Module: e,
      makeModuleMap: S,
      nextTick: req.nextTick,
      onError: O,
      configure: function configure(e) {
        if (e.baseUrl && "/" !== e.baseUrl.charAt(e.baseUrl.length - 1) && (e.baseUrl += "/"), "string" == typeof e.urlArgs) {
          var i = e.urlArgs;

          e.urlArgs = function (e, t) {
            return (-1 === t.indexOf("?") ? "?" : "&") + i;
          };
        }

        var r = g.shim,
            n = {
          paths: !0,
          bundles: !0,
          config: !0,
          map: !0
        };
        eachProp(e, function (e, t) {
          n[t] ? (g[t] || (g[t] = {}), mixin(g[t], e, !0, !0)) : g[t] = e;
        }), e.bundles && eachProp(e.bundles, function (e, t) {
          each(e, function (e) {
            e !== t && (v[e] = t);
          });
        }), e.shim && (eachProp(e.shim, function (e, t) {
          isArray(e) && (e = {
            deps: e
          }), !e.exports && !e.init || e.exportsFn || (e.exportsFn = l.makeShimExports(e)), r[t] = e;
        }), g.shim = r), e.packages && each(e.packages, function (e) {
          var t;
          t = (e = "string" == typeof e ? {
            name: e
          } : e).name, e.location && (g.paths[t] = e.location), g.pkgs[t] = e.name + "/" + (e.main || "main").replace(currDirRegExp, "").replace(jsSuffixRegExp, "");
        }), eachProp(p, function (e, t) {
          e.inited || e.map.unnormalized || (e.map = S(t, null, !0));
        }), (e.deps || e.callback) && l.require(e.deps || [], e.callback);
      },
      makeShimExports: function makeShimExports(t) {
        return function () {
          var e;
          return t.init && (e = t.init.apply(global, arguments)), e || t.exports && getGlobal(t.exports);
        };
      },
      makeRequire: function makeRequire(o, a) {
        function s(e, t, i) {
          var r, n;
          return a.enableBuildCallback && t && isFunction(t) && (t.__requireJsBuild = !0), "string" == typeof e ? isFunction(t) ? O(makeError("requireargs", "Invalid require call"), i) : o && hasProp(c, e) ? c[e](p[o.id]) : req.get ? req.get(l, e, o, s) : (r = S(e, o, !1, !0).id, hasProp(m, r) ? m[r] : O(makeError("notloaded", 'Module name "' + r + '" has not been loaded yet for context: ' + u + (o ? "" : ". Use require([])")))) : (T(), l.nextTick(function () {
            T(), (n = k(S(null, o))).skipMap = a.skipMap, n.init(e, t, i, {
              enabled: !0
            }), R();
          }), s);
        }

        return a = a || {}, mixin(s, {
          isBrowser: isBrowser,
          toUrl: function toUrl(e) {
            var t,
                i = e.lastIndexOf("."),
                r = e.split("/")[0];
            return -1 !== i && (!("." === r || ".." === r) || 1 < i) && (t = e.substring(i, e.length), e = e.substring(0, i)), l.nameToUrl(q(e, o && o.id, !0), t, !0);
          },
          defined: function defined(e) {
            return hasProp(m, S(e, o, !1, !0).id);
          },
          specified: function specified(e) {
            return e = S(e, o, !1, !0).id, hasProp(m, e) || hasProp(p, e);
          }
        }), o || (s.undef = function (i) {
          j();
          var e = S(i, o, !0),
              t = getOwn(p, i);
          t.undefed = !0, E(i), delete m[i], delete n[e.url], delete r[i], eachReverse(h, function (e, t) {
            e[0] === i && h.splice(t, 1);
          }), delete l.defQueueMap[i], t && (t.events.defined && (r[i] = t.events), P(i));
        }), s;
      },
      enable: function enable(e) {
        getOwn(p, e.id) && k(e).enable();
      },
      completeLoad: function completeLoad(e) {
        var t,
            i,
            r,
            n = getOwn(g.shim, e) || {},
            o = n.exports;

        for (j(); h.length;) {
          if (null === (i = h.shift())[0]) {
            if (i[0] = e, t) break;
            t = !0;
          } else i[0] === e && (t = !0);

          a(i);
        }

        if (l.defQueueMap = {}, r = getOwn(p, e), !t && !hasProp(m, e) && r && !r.inited) {
          if (!(!g.enforceDefine || o && getGlobal(o))) return w(e) ? void 0 : O(makeError("nodefine", "No define call for " + e, null, [e]));
          a([e, n.deps || [], n.exportsFn]);
        }

        R();
      },
      nameToUrl: function nameToUrl(e, t, i) {
        var r,
            n,
            o,
            a,
            s,
            u,
            c = getOwn(g.pkgs, e);
        if (c && (e = c), u = getOwn(v, e)) return l.nameToUrl(u, t, i);
        if (req.jsExtRegExp.test(e)) a = e + (t || "");else {
          for (r = g.paths, o = (n = e.split("/")).length; 0 < o; o -= 1) {
            if (s = getOwn(r, n.slice(0, o).join("/"))) {
              isArray(s) && (s = s[0]), n.splice(0, o, s);
              break;
            }
          }

          a = n.join("/"), a = ("/" === (a += t || (/^data\:|^blob\:|\?/.test(a) || i ? "" : ".js")).charAt(0) || a.match(/^[\w\+\.\-]+:/) ? "" : g.baseUrl) + a;
        }
        return g.urlArgs && !/^blob\:/.test(a) ? a + g.urlArgs(e, a) : a;
      },
      load: function load(e, t) {
        req.load(l, e, t);
      },
      execCb: function execCb(e, t, i, r) {
        return t.apply(r, i);
      },
      onScriptLoad: function onScriptLoad(e) {
        if ("load" === e.type || readyRegExp.test((e.currentTarget || e.srcElement).readyState)) {
          interactiveScript = null;
          var t = s(e);
          l.completeLoad(t.id);
        }
      },
      onScriptError: function onScriptError(e) {
        var i = s(e);

        if (!w(i.id)) {
          var r = [];
          return eachProp(p, function (e, t) {
            0 !== t.indexOf("_@r") && each(e.depMaps, function (e) {
              if (e.id === i.id) return r.push(t), !0;
            });
          }), O(makeError("scripterror", 'Script error for "' + i.id + (r.length ? '", needed by: ' + r.join(", ") : '"'), e, [i.id]));
        }
      }
    }).require = l.makeRequire(), l;
  }

  function getInteractiveScript() {
    return interactiveScript && "interactive" === interactiveScript.readyState || eachReverse(scripts(), function (e) {
      if ("interactive" === e.readyState) return interactiveScript = e;
    }), interactiveScript;
  }
}(this, "undefined" == typeof setTimeout ? void 0 : setTimeout);

/***/ }),

/***/ "./src/js/main/js/skip-link-focus-fix.js":
/*!***********************************************!*\
  !*** ./src/js/main/js/skip-link-focus-fix.js ***!
  \***********************************************/
/***/ (function() {

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
  var isIe = /(trident|msie)/i.test(navigator.userAgent);

  if (isIe && document.getElementById && window.addEventListener) {
    window.addEventListener('hashchange', function () {
      var id = location.hash.substring(1),
          element;

      if (!/^[A-z0-9_-]+$/.test(id)) {
        return;
      }

      element = document.getElementById(id);

      if (element) {
        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false);
  }
})();

/***/ }),

/***/ "./src/js/main/js/z_lightbox.js":
/*!**************************************!*\
  !*** ./src/js/main/js/z_lightbox.js ***!
  \**************************************/
/***/ (function() {

var button = document.querySelectorAll('.watch');
var lightDiv = document.querySelectorAll('.display');
var closebtn = document.querySelectorAll('.closebtn');
button.forEach(function (i) {
  return i.addEventListener("click", function (e) {
    var currentDiv = e.currentTarget.closest('.img-preloader').querySelector('.light');
    var currentIframe = currentDiv.querySelector('.wp-video iframe');
    var srcFrame = currentIframe.src;
    var allLight = document.querySelectorAll('.wp-video #video-1dis');
    var image = e.currentTarget.closest('.img-preloader').querySelector('img');
    image.classList.add('img-none');
    currentDiv.setAttribute('id', 'display');
    currentIframe.setAttribute('id', 'video-1dis');
    var playVimeo = new Vimeo.Player(currentIframe);
    playVimeo.play();

    for (var _i = 0; _i < allLight.length; _i++) {
      if (allLight[_i].getAttribute('id') != null) {
        var curentIDframe = allLight[_i];

        var _playVimeo = new Vimeo.Player(curentIDframe);

        _playVimeo.pause();

        currentDiv.removeAttribute('id');
        image.classList.remove('img-none');
      }
    }

    if (!currentDiv.hasAttribute('id') && currentIframe.getAttribute('src') == srcFrame) {
      var _allLight = document.querySelectorAll('.light');

      var images = document.querySelectorAll('.img-none');

      for (var _i2 = 0; _i2 < images.length; _i2++) {
        images[_i2].classList.remove('img-none');
      }

      for (var _i3 = 0; _i3 < _allLight.length; _i3++) {
        _allLight[_i3].removeAttribute('id');
      }

      currentIframe.setAttribute('id', 'video-1dis');
      currentDiv.setAttribute('id', 'display');
      image.classList.add('img-none');
      var vid1 = new Vimeo.Player(currentIframe);
      vid1.play();
    }

    var containerBtn = currentDiv.querySelector('.container-btn');
    containerBtn.style.visibility = "hidden";
    var wpVideoDiv = currentDiv.querySelector('.wp-video');

    wpVideoDiv.onmouseover = function () {
      containerBtn.style.visibility = "visible";
    };

    containerBtn.onmouseover = function () {
      containerBtn.style.visibility = "visible";
    };

    wpVideoDiv.onmouseout = function () {
      containerBtn.style.visibility = "hidden";
    };

    containerBtn.onmouseout = function () {
      containerBtn.style.visibility = "hidden";
    };
  });
});
closebtn.forEach(function (i) {
  return i.addEventListener("click", function (e) {
    var currentDiv = e.currentTarget.closest('.img-preloader').querySelector('.light');
    var currentIframe = currentDiv.querySelector('.wp-video iframe');
    var allLight = document.querySelectorAll('.light');
    var image = e.currentTarget.closest('.img-preloader').querySelector('img');
    image.classList.remove('img-none');

    for (var _i4 = 0; _i4 < allLight.length; _i4++) {
      allLight[_i4].removeAttribute('id');
    }

    var vid1 = new Vimeo.Player(currentIframe);
    vid1.pause();
    currentIframe.removeAttribute('id');
  });
});

/***/ }),

/***/ "./src/images/logo_small.png":
/*!***********************************!*\
  !*** ./src/images/logo_small.png ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (".././images/logo_small.png");

/***/ }),

/***/ "./src/js/main/modules/style.scss":
/*!****************************************!*\
  !*** ./src/js/main/modules/style.scss ***!
  \****************************************/
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
/******/ 	__webpack_require__("./src/js/main.js");
/******/ 	// This entry module used 'exports' so it can't be inlined
/******/ })()
;
//# sourceMappingURL=main.js.map