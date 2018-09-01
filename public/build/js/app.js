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
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/js/_member-form-interaction.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/_member-form-interaction.js":
/*!***********************************************!*\
  !*** ./assets/js/_member-form-interaction.js ***!
  \***********************************************/
/*! dynamic exports provided */
/*! all exports used */
/***/ (function(module, exports) {

var fileUpload;
if (document.getElementById('team_member_profile_image')) {
    console.log("FIRST");
    fileUpload = document.getElementById('team_member_profile_image');
}
if (document.getElementById('team_hero_image')) {
    console.log("SECOND");
    fileUpload = document.getElementById('team_hero_image');
}

var output = document.getElementById('image-preview');
var button = document.getElementById('image-upload-button');
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

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgNTFiZjNjYTUyN2VmMTVlZDAwM2UiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL19tZW1iZXItZm9ybS1pbnRlcmFjdGlvbi5qcyJdLCJuYW1lcyI6WyJmaWxlVXBsb2FkIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsImNvbnNvbGUiLCJsb2ciLCJvdXRwdXQiLCJidXR0b24iLCJzdHlsZSIsImRpc3BsYXkiLCJhZGRFdmVudExpc3RlbmVyIiwib3BlbkZpbGUiLCJmaWxlIiwiaW5wdXQiLCJ0YXJnZXQiLCJyZWFkZXIiLCJGaWxlUmVhZGVyIiwib25sb2FkIiwiZGF0YVVSTCIsInJlc3VsdCIsInNyYyIsImNsYXNzTGlzdCIsImFkZCIsImlubmVySFRNTCIsInJlYWRBc0RhdGFVUkwiLCJmaWxlcyJdLCJtYXBwaW5ncyI6IjtBQUFBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOzs7QUFHQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBMkIsMEJBQTBCLEVBQUU7QUFDdkQseUNBQWlDLGVBQWU7QUFDaEQ7QUFDQTtBQUNBOztBQUVBO0FBQ0EsOERBQXNELCtEQUErRDs7QUFFckg7QUFDQTs7QUFFQTtBQUNBOzs7Ozs7Ozs7Ozs7O0FDN0RBLElBQUlBLFVBQUo7QUFDQSxJQUFJQyxTQUFTQyxjQUFULENBQXdCLDJCQUF4QixDQUFKLEVBQTBEO0FBQ3REQyxZQUFRQyxHQUFSLENBQVksT0FBWjtBQUNBSixpQkFBYUMsU0FBU0MsY0FBVCxDQUF3QiwyQkFBeEIsQ0FBYjtBQUNIO0FBQ0QsSUFBSUQsU0FBU0MsY0FBVCxDQUF3QixpQkFBeEIsQ0FBSixFQUFnRDtBQUM1Q0MsWUFBUUMsR0FBUixDQUFZLFFBQVo7QUFDQUosaUJBQWFDLFNBQVNDLGNBQVQsQ0FBd0IsaUJBQXhCLENBQWI7QUFDSDs7QUFFRCxJQUFJRyxTQUFTSixTQUFTQyxjQUFULENBQXdCLGVBQXhCLENBQWI7QUFDQSxJQUFJSSxTQUFTTCxTQUFTQyxjQUFULENBQXdCLHFCQUF4QixDQUFiO0FBQ0FHLE9BQU9FLEtBQVAsQ0FBYUMsT0FBYixHQUF1QixNQUF2QjtBQUNBUixXQUFXUyxnQkFBWCxDQUE0QixRQUE1QixFQUFzQ0MsUUFBdEM7QUFDQSxTQUFTQSxRQUFULENBQWtCQyxJQUFsQixFQUF3QjtBQUNwQixRQUFJQyxRQUFRRCxLQUFLRSxNQUFqQjtBQUNBLFFBQUlDLFNBQVMsSUFBSUMsVUFBSixFQUFiO0FBQ0FELFdBQU9FLE1BQVAsR0FBZ0IsWUFBVztBQUN2QixZQUFJQyxVQUFVSCxPQUFPSSxNQUFyQjtBQUNBYixlQUFPRSxLQUFQLENBQWFDLE9BQWIsR0FBdUIsTUFBdkI7QUFDQUgsZUFBT2MsR0FBUCxHQUFhRixPQUFiO0FBQ0FYLGVBQU9jLFNBQVAsQ0FBaUJDLEdBQWpCLENBQXFCLGlCQUFyQjtBQUNBZixlQUFPYyxTQUFQLENBQWlCQyxHQUFqQixDQUFxQixlQUFyQjtBQUNBZixlQUFPZ0IsU0FBUCxHQUFtQixnQkFBbkI7QUFDSCxLQVBEO0FBUUFSLFdBQU9TLGFBQVAsQ0FBcUJYLE1BQU1ZLEtBQU4sQ0FBWSxDQUFaLENBQXJCO0FBQ0gsRSIsImZpbGUiOiJqcy9hcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCIvYnVpbGQvXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gXCIuL2Fzc2V0cy9qcy9fbWVtYmVyLWZvcm0taW50ZXJhY3Rpb24uanNcIik7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gd2VicGFjay9ib290c3RyYXAgNTFiZjNjYTUyN2VmMTVlZDAwM2UiLCJ2YXIgZmlsZVVwbG9hZDsgXG5pZiAoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3RlYW1fbWVtYmVyX3Byb2ZpbGVfaW1hZ2UnKSkge1xuICAgIGNvbnNvbGUubG9nKFwiRklSU1RcIik7XG4gICAgZmlsZVVwbG9hZCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0ZWFtX21lbWJlcl9wcm9maWxlX2ltYWdlJyk7XG59XG5pZiAoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3RlYW1faGVyb19pbWFnZScpKSB7XG4gICAgY29uc29sZS5sb2coXCJTRUNPTkRcIik7XG4gICAgZmlsZVVwbG9hZCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0ZWFtX2hlcm9faW1hZ2UnKTtcbn1cblxudmFyIG91dHB1dCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdpbWFnZS1wcmV2aWV3Jyk7XG52YXIgYnV0dG9uID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2ltYWdlLXVwbG9hZC1idXR0b24nKTtcbm91dHB1dC5zdHlsZS5kaXNwbGF5ID0gXCJub25lXCI7XG5maWxlVXBsb2FkLmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsIG9wZW5GaWxlKTtcbmZ1bmN0aW9uIG9wZW5GaWxlKGZpbGUpIHtcbiAgICB2YXIgaW5wdXQgPSBmaWxlLnRhcmdldDtcbiAgICB2YXIgcmVhZGVyID0gbmV3IEZpbGVSZWFkZXIoKTtcbiAgICByZWFkZXIub25sb2FkID0gZnVuY3Rpb24oKSB7XG4gICAgICAgIHZhciBkYXRhVVJMID0gcmVhZGVyLnJlc3VsdDtcbiAgICAgICAgb3V0cHV0LnN0eWxlLmRpc3BsYXkgPSBcImZsZXhcIjtcbiAgICAgICAgb3V0cHV0LnNyYyA9IGRhdGFVUkw7XG4gICAgICAgIGJ1dHRvbi5jbGFzc0xpc3QuYWRkKFwiYnRuLS1ibHVlLXNvbGlkXCIpO1xuICAgICAgICBidXR0b24uY2xhc3NMaXN0LmFkZChcImJ0bi0tYXBwcm92ZWRcIik7XG4gICAgICAgIGJ1dHRvbi5pbm5lckhUTUwgPSAnSW1hZ2UgQXR0YWNoZWQnO1xuICAgIH07XG4gICAgcmVhZGVyLnJlYWRBc0RhdGFVUkwoaW5wdXQuZmlsZXNbMF0pO1xufTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9hc3NldHMvanMvX21lbWJlci1mb3JtLWludGVyYWN0aW9uLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==
