/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/build/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/js/main.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/_member-form-interaction.js":
/*!***********************************************!*\
  !*** ./assets/js/_member-form-interaction.js ***!
  \***********************************************/
/*! dynamic exports provided */
/***/ (function(module, exports) {

var fileUpload;
if (document.getElementById('team_member_profile_image')) {
    fileUpload = document.getElementById('team_member_profile_image');
}
if (document.getElementById('team_hero_image')) {
    fileUpload = document.getElementById('team_hero_image');
}

//var output = document.getElementById('image-preview');
var button = document.getElementById('upload-button');
output.style.display = "none";
fileUpload.addEventListener('change', openFile);
function openFile(file) {
    var input = file.target;
    var reader = new FileReader();
    reader.onload = function () {
        var dataURL = reader.result;
        output.style.display = "flex";
        output.src = dataURL;
        button.classList.add("btn--blue-solid");
        button.classList.add("btn--approved");
        button.innerHTML = 'Image Attached';
    };
    reader.readAsDataURL(input.files[0]);
};

/***/ }),

/***/ "./assets/js/main.js":
/*!***************************!*\
  !*** ./assets/js/main.js ***!
  \***************************/
/*! no exports provided */
/*! all exports used */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__member_form_interaction__ = __webpack_require__(/*! ./_member-form-interaction */ "./assets/js/_member-form-interaction.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__member_form_interaction___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__member_form_interaction__);


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgMWM2NDdlMzNjMjgxZWMzZWNiOTMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL19tZW1iZXItZm9ybS1pbnRlcmFjdGlvbi5qcyJdLCJuYW1lcyI6WyJmaWxlVXBsb2FkIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsImJ1dHRvbiIsIm91dHB1dCIsInN0eWxlIiwiZGlzcGxheSIsImFkZEV2ZW50TGlzdGVuZXIiLCJvcGVuRmlsZSIsImZpbGUiLCJpbnB1dCIsInRhcmdldCIsInJlYWRlciIsIkZpbGVSZWFkZXIiLCJvbmxvYWQiLCJkYXRhVVJMIiwicmVzdWx0Iiwic3JjIiwiY2xhc3NMaXN0IiwiYWRkIiwiaW5uZXJIVE1MIiwicmVhZEFzRGF0YVVSTCIsImZpbGVzIl0sIm1hcHBpbmdzIjoiO0FBQUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLG1DQUEyQiwwQkFBMEIsRUFBRTtBQUN2RCx5Q0FBaUMsZUFBZTtBQUNoRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQSw4REFBc0QsK0RBQStEOztBQUVySDtBQUNBOztBQUVBO0FBQ0E7Ozs7Ozs7Ozs7OztBQzdEQSxJQUFJQSxVQUFKO0FBQ0EsSUFBSUMsU0FBU0MsY0FBVCxDQUF3QiwyQkFBeEIsQ0FBSixFQUEwRDtBQUN0REYsaUJBQWFDLFNBQVNDLGNBQVQsQ0FBd0IsMkJBQXhCLENBQWI7QUFDSDtBQUNELElBQUlELFNBQVNDLGNBQVQsQ0FBd0IsaUJBQXhCLENBQUosRUFBZ0Q7QUFDNUNGLGlCQUFhQyxTQUFTQyxjQUFULENBQXdCLGlCQUF4QixDQUFiO0FBQ0g7O0FBRUQ7QUFDQSxJQUFJQyxTQUFTRixTQUFTQyxjQUFULENBQXdCLGVBQXhCLENBQWI7QUFDQUUsT0FBT0MsS0FBUCxDQUFhQyxPQUFiLEdBQXVCLE1BQXZCO0FBQ0FOLFdBQVdPLGdCQUFYLENBQTRCLFFBQTVCLEVBQXNDQyxRQUF0QztBQUNBLFNBQVNBLFFBQVQsQ0FBa0JDLElBQWxCLEVBQXdCO0FBQ3BCLFFBQUlDLFFBQVFELEtBQUtFLE1BQWpCO0FBQ0EsUUFBSUMsU0FBUyxJQUFJQyxVQUFKLEVBQWI7QUFDQUQsV0FBT0UsTUFBUCxHQUFnQixZQUFXO0FBQ3ZCLFlBQUlDLFVBQVVILE9BQU9JLE1BQXJCO0FBQ0FaLGVBQU9DLEtBQVAsQ0FBYUMsT0FBYixHQUF1QixNQUF2QjtBQUNBRixlQUFPYSxHQUFQLEdBQWFGLE9BQWI7QUFDQVosZUFBT2UsU0FBUCxDQUFpQkMsR0FBakIsQ0FBcUIsaUJBQXJCO0FBQ0FoQixlQUFPZSxTQUFQLENBQWlCQyxHQUFqQixDQUFxQixlQUFyQjtBQUNBaEIsZUFBT2lCLFNBQVAsR0FBbUIsZ0JBQW5CO0FBQ0gsS0FQRDtBQVFBUixXQUFPUyxhQUFQLENBQXFCWCxNQUFNWSxLQUFOLENBQVksQ0FBWixDQUFyQjtBQUNILEUiLCJmaWxlIjoianMvYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiIFx0Ly8gVGhlIG1vZHVsZSBjYWNoZVxuIFx0dmFyIGluc3RhbGxlZE1vZHVsZXMgPSB7fTtcblxuIFx0Ly8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbiBcdGZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblxuIFx0XHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcbiBcdFx0aWYoaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0pIHtcbiBcdFx0XHRyZXR1cm4gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0uZXhwb3J0cztcbiBcdFx0fVxuIFx0XHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuIFx0XHR2YXIgbW9kdWxlID0gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0gPSB7XG4gXHRcdFx0aTogbW9kdWxlSWQsXG4gXHRcdFx0bDogZmFsc2UsXG4gXHRcdFx0ZXhwb3J0czoge31cbiBcdFx0fTtcblxuIFx0XHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cbiBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cbiBcdFx0Ly8gRmxhZyB0aGUgbW9kdWxlIGFzIGxvYWRlZFxuIFx0XHRtb2R1bGUubCA9IHRydWU7XG5cbiBcdFx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcbiBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuIFx0fVxuXG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlcyBvYmplY3QgKF9fd2VicGFja19tb2R1bGVzX18pXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm0gPSBtb2R1bGVzO1xuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZSBjYWNoZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5jID0gaW5zdGFsbGVkTW9kdWxlcztcblxuIFx0Ly8gZGVmaW5lIGdldHRlciBmdW5jdGlvbiBmb3IgaGFybW9ueSBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSBmdW5jdGlvbihleHBvcnRzLCBuYW1lLCBnZXR0ZXIpIHtcbiBcdFx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBuYW1lKSkge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBuYW1lLCB7XG4gXHRcdFx0XHRjb25maWd1cmFibGU6IGZhbHNlLFxuIFx0XHRcdFx0ZW51bWVyYWJsZTogdHJ1ZSxcbiBcdFx0XHRcdGdldDogZ2V0dGVyXG4gXHRcdFx0fSk7XG4gXHRcdH1cbiBcdH07XG5cbiBcdC8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSBmdW5jdGlvbihtb2R1bGUpIHtcbiBcdFx0dmFyIGdldHRlciA9IG1vZHVsZSAmJiBtb2R1bGUuX19lc01vZHVsZSA/XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0RGVmYXVsdCgpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcbiBcdFx0XHRmdW5jdGlvbiBnZXRNb2R1bGVFeHBvcnRzKCkgeyByZXR1cm4gbW9kdWxlOyB9O1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCAnYScsIGdldHRlcik7XG4gXHRcdHJldHVybiBnZXR0ZXI7XG4gXHR9O1xuXG4gXHQvLyBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGxcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubyA9IGZ1bmN0aW9uKG9iamVjdCwgcHJvcGVydHkpIHsgcmV0dXJuIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmplY3QsIHByb3BlcnR5KTsgfTtcblxuIFx0Ly8gX193ZWJwYWNrX3B1YmxpY19wYXRoX19cbiBcdF9fd2VicGFja19yZXF1aXJlX18ucCA9IFwiL2J1aWxkL1wiO1xuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IFwiLi9hc3NldHMvanMvbWFpbi5qc1wiKTtcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyB3ZWJwYWNrL2Jvb3RzdHJhcCAxYzY0N2UzM2MyODFlYzNlY2I5MyIsInZhciBmaWxlVXBsb2FkOyBcbmlmIChkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndGVhbV9tZW1iZXJfcHJvZmlsZV9pbWFnZScpKSB7XG4gICAgZmlsZVVwbG9hZCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0ZWFtX21lbWJlcl9wcm9maWxlX2ltYWdlJyk7XG59XG5pZiAoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3RlYW1faGVyb19pbWFnZScpKSB7XG4gICAgZmlsZVVwbG9hZCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0ZWFtX2hlcm9faW1hZ2UnKTtcbn1cblxuLy92YXIgb3V0cHV0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2ltYWdlLXByZXZpZXcnKTtcbnZhciBidXR0b24gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndXBsb2FkLWJ1dHRvbicpO1xub3V0cHV0LnN0eWxlLmRpc3BsYXkgPSBcIm5vbmVcIjtcbmZpbGVVcGxvYWQuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgb3BlbkZpbGUpO1xuZnVuY3Rpb24gb3BlbkZpbGUoZmlsZSkge1xuICAgIHZhciBpbnB1dCA9IGZpbGUudGFyZ2V0O1xuICAgIHZhciByZWFkZXIgPSBuZXcgRmlsZVJlYWRlcigpO1xuICAgIHJlYWRlci5vbmxvYWQgPSBmdW5jdGlvbigpIHtcbiAgICAgICAgdmFyIGRhdGFVUkwgPSByZWFkZXIucmVzdWx0O1xuICAgICAgICBvdXRwdXQuc3R5bGUuZGlzcGxheSA9IFwiZmxleFwiO1xuICAgICAgICBvdXRwdXQuc3JjID0gZGF0YVVSTDtcbiAgICAgICAgYnV0dG9uLmNsYXNzTGlzdC5hZGQoXCJidG4tLWJsdWUtc29saWRcIik7XG4gICAgICAgIGJ1dHRvbi5jbGFzc0xpc3QuYWRkKFwiYnRuLS1hcHByb3ZlZFwiKTtcbiAgICAgICAgYnV0dG9uLmlubmVySFRNTCA9ICdJbWFnZSBBdHRhY2hlZCc7XG4gICAgfTtcbiAgICByZWFkZXIucmVhZEFzRGF0YVVSTChpbnB1dC5maWxlc1swXSk7XG59O1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL2Fzc2V0cy9qcy9fbWVtYmVyLWZvcm0taW50ZXJhY3Rpb24uanMiXSwic291cmNlUm9vdCI6IiJ9