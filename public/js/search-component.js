(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["search-component"],{

/***/ "./resources/js/frontend-components/SearchComponent.js":
/*!*************************************************************!*\
  !*** ./resources/js/frontend-components/SearchComponent.js ***!
  \*************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);



vue__WEBPACK_IMPORTED_MODULE_0___default.a.component('search-component', {
  data: function data() {
    return {
      search_query: null,
      searchResultsObject: {
        data: []
      },
      searched: false //initially false before we search.

    };
  },
  mounted: function mounted() {
    console.log("The search component is working.");
    console.log("We will call the api for testing when this component is mounted and monitor the console to see the response.");
    this.testApi();
  },
  methods: {
    debounceInput: lodash__WEBPACK_IMPORTED_MODULE_1___default.a.debounce(function (e) {
      this.fetchAppResults(this.search_query);
    }, 300),
    testApi: function testApi() {
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get("/user").then(function (res) {
        console.log(res.data);
      })["catch"](function (err) {
        var _err$response, _err$response$data;

        console.error((err === null || err === void 0 ? void 0 : (_err$response = err.response) === null || _err$response === void 0 ? void 0 : (_err$response$data = _err$response.data) === null || _err$response$data === void 0 ? void 0 : _err$response$data.message) || err.message || err);
      });
    },
    fetchAppResults: function fetchAppResults(query) {
      var vm = this;
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get("/api/search", {
        params: {
          search: query
        }
      }).then(function (res) {
        //When we hit results, we set searched = true
        vm.searchResultsObject = res.data.payload;
        vm.searched = true;
      })["catch"](function (err) {
        console.log(err); //If an error occured we set searched = false;

        vm.searched = false;
      });
    }
  }
});

/***/ })

}]);