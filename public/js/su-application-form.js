(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["su-application-form"],{

/***/ "./resources/js/web/su-application/Form.js":
/*!*************************************************!*\
  !*** ./resources/js/web/su-application/Form.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../app-components/Form/AppForm */ "./resources/js/web/app-components/Form/AppForm.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_app_components_Form_AppForm__WEBPACK_IMPORTED_MODULE_0__["default"]],
  props: [],
  data: function data() {
    return {
      form: {
        name: '',
        description: '',
        enabled: false,
        department_id: '',
        tags: [],
        url: ''
      },
      tagOptions: []
    };
  },
  mounted: function mounted() {},
  methods: {
    addTag: function addTag(tag) {
      this.tagOptions.push(tag);
      this.form.tags.push(tag);
    }
  }
});

/***/ })

}]);