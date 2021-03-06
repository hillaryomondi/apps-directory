(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["su-application-form"],{

/***/ "./resources/js/web/su-application/Form.js":
/*!*************************************************!*\
  !*** ./resources/js/web/su-application/Form.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../app-components/Form/AppForm */ "./resources/js/web/app-components/Form/AppForm.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }


/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_1__["default"]],
  props: [],
  data: function data() {
    return {
      form: {
        name: '',
        description: '',
        enabled: false,
        department: [],
        tags: [],
        url: '',
        "private": true,
        roles: []
      },
      tagOptions: [],
      roles: [],
      departments: []
    };
  },
  mounted: function mounted() {
    this.fetchRoles();
    this.fetchDepartments();
  },
  methods: {
    addTag: function addTag(tag) {
      this.tagOptions.push(tag);
      this.form.tags.push(tag);
    },
    fetchRoles: function fetchRoles() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                vm = _this;
                return _context.abrupt("return", new Promise(function (resolve, reject) {
                  axios.get("/api/roles").then(function (res) {
                    vm.roles = res.data.payload;
                    resolve(res);
                  })["catch"](function (err) {
                    vm.roles = [];
                    reject(err);
                  });
                }));

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    fetchDepartments: function fetchDepartments() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var vm;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                vm = _this2;
                return _context2.abrupt("return", new Promise(function (resolve, reject) {
                  axios.get("/api/departments").then(function (res) {
                    vm.departments = res.data.payload;
                    resolve(res);
                  })["catch"](function (err) {
                    vm.departments = [];
                    reject(err);
                  });
                }));

              case 2:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    }
  }
});

/***/ })

}]);