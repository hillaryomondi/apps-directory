(window.webpackJsonp=window.webpackJsonp||[]).push([[14],{A2ti:function(t,n,e){"use strict";e.r(n);var r=e("o0o1"),a=e.n(r),o=e("pXKy");function i(t,n,e,r,a,o,i){try{var s=t[o](i),u=s.value}catch(t){return void e(t)}s.done?n(u):Promise.resolve(u).then(r,a)}function s(t){return function(){var n=this,e=arguments;return new Promise((function(r,a){var o=t.apply(n,e);function s(t){i(o,r,a,s,u,"next",t)}function u(t){i(o,r,a,s,u,"throw",t)}s(void 0)}))}}n.default={mixins:[o.a],props:[],data:function(){return{form:{name:"",description:"",enabled:!1,department:[],tags:[],url:"",private:!0,roles:[]},tagOptions:[],roles:[],departments:[]}},mounted:function(){this.fetchRoles(),this.fetchDepartments()},methods:{addTag:function(t){this.tagOptions.push(t),this.form.tags.push(t)},fetchRoles:function(){var t=this;return s(a.a.mark((function n(){var e;return a.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return e=t,n.abrupt("return",new Promise((function(t,n){axios.get("/api/roles").then((function(n){e.roles=n.data.payload,t(n)})).catch((function(t){e.roles=[],n(t)}))})));case 2:case"end":return n.stop()}}),n)})))()},fetchDepartments:function(){var t=this;return s(a.a.mark((function n(){var e;return a.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return e=t,n.abrupt("return",new Promise((function(t,n){axios.get("/api/departments").then((function(n){e.departments=n.data.payload,t(n)})).catch((function(t){e.departments=[],n(t)}))})));case 2:case"end":return n.stop()}}),n)})))()}}}}}]);