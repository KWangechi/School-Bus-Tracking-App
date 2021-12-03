"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_app_auth_index_vue-resources_js_app_auth_index_vue_vue_type_template_id_8af39052-2c5b53"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/app/auth/index.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/app/auth/index.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "App",
  data: function data() {
    return {// isLoggedIn: false,
    };
  },
  created: function created() {// if (window.Laravel.isLoggedin) {
    //     this.isLoggedIn = true
    // }
  },
  methods: {
    logout: function logout(e) {
      var _this = this;

      console.log('ss');
      e.preventDefault();
      this.$axios.get('/sanctum/csrf-cookie').then(function (response) {
        _this.$axios.post('/api/logout').then(function (response) {
          if (response.data.success) {
            window.location.href = "/";
          } else {
            console.log(response);
          }
        })["catch"](function (error) {
          console.error(error);
        });
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/app/auth/index.vue":
/*!*****************************************!*\
  !*** ./resources/js/app/auth/index.vue ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _index_vue_vue_type_template_id_8af39052___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=8af39052& */ "./resources/js/app/auth/index.vue?vue&type=template&id=8af39052&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/app/auth/index.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_8af39052___WEBPACK_IMPORTED_MODULE_0__.render,
  _index_vue_vue_type_template_id_8af39052___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/app/auth/index.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/app/auth/index.vue?vue&type=script&lang=js&":
/*!******************************************************************!*\
  !*** ./resources/js/app/auth/index.vue?vue&type=script&lang=js& ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/app/auth/index.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/app/auth/index.vue?vue&type=template&id=8af39052&":
/*!************************************************************************!*\
  !*** ./resources/js/app/auth/index.vue?vue&type=template&id=8af39052& ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_8af39052___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_8af39052___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_8af39052___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./index.vue?vue&type=template&id=8af39052& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/app/auth/index.vue?vue&type=template&id=8af39052&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/app/auth/index.vue?vue&type=template&id=8af39052&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/app/auth/index.vue?vue&type=template&id=8af39052& ***!
  \***************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "container" },
    [
      _vm._m(0),
      _vm._v(" "),
      _c(
        "nav",
        { staticClass: "navbar navbar-expand-lg navbar-light bg-light" },
        [
          _c("div", { staticClass: "collapse navbar-collapse" }, [
            _c(
              "div",
              { staticClass: "navbar-nav" },
              [
                _c(
                  "router-link",
                  { staticClass: "nav-item nav-link", attrs: { to: "/home" } },
                  [_vm._v("Home")]
                ),
                _vm._v(" "),
                _c(
                  "router-link",
                  { staticClass: "nav-item nav-link", attrs: { to: "/login" } },
                  [_vm._v("Login")]
                ),
                _vm._v(" "),
                _c(
                  "router-link",
                  {
                    staticClass: "nav-item nav-link",
                    attrs: { to: "/register" },
                  },
                  [_vm._v("Register\n                ")]
                ),
                _vm._v(" "),
                _c(
                  "router-link",
                  { staticClass: "nav-item nav-link", attrs: { to: "/about" } },
                  [_vm._v("About")]
                ),
                _vm._v(" "),
                _c(
                  "a",
                  {
                    staticClass: "nav-item nav-link",
                    staticStyle: { cursor: "pointer" },
                    on: { click: _vm.logout },
                  },
                  [_vm._v("Logout")]
                ),
              ],
              1
            ),
          ]),
        ]
      ),
      _vm._v(" "),
      _c("br"),
      _vm._v(" "),
      _c("router-view"),
    ],
    1
  )
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "text-center",
        staticStyle: { margin: "20px 0px 20px 0px" },
      },
      [
        _c("a", { attrs: { href: "/home", target: "_blank" } }, [
          _c("img", { attrs: { src: __webpack_require__(/*! . */ "./resources/js/app/auth/index.vue") } }),
        ]),
        _c("br"),
        _vm._v(" "),
        _c("span", { staticClass: "text-secondary" }, [
          _vm._v("School Bus Tracking APP"),
        ]),
      ]
    )
  },
]
render._withStripped = true



/***/ })

}]);