/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./javascript/first.js":
/*!*****************************!*\
  !*** ./javascript/first.js ***!
  \*****************************/
/***/ (() => {

eval("document.querySelector(\"#h1\").onclick = function()\r\n{\r\n    document.body.style.backgroundImage = 'url(f1.jpg)'\r\n    let audio = new Audio();\r\n    audio.preload = 'auto';\r\n    audio.src = 'gachi1.wav';\r\n    audio.play();\r\n}\n\n//# sourceURL=webpack://webpack/./javascript/first.js?");

/***/ }),

/***/ "./javascript/second.js":
/*!******************************!*\
  !*** ./javascript/second.js ***!
  \******************************/
/***/ (() => {

eval("document.querySelector(\"#h2\").onclick = function()\r\n{\r\n    document.body.style.backgroundImage = 'url(f2.jpg)'\r\n    let audio = new Audio();\r\n    audio.preload = 'auto';\r\n    audio.src = 'gachi2.wav';\r\n    audio.play();\r\n}\n\n//# sourceURL=webpack://webpack/./javascript/second.js?");

/***/ }),

/***/ "./javascript/third.js":
/*!*****************************!*\
  !*** ./javascript/third.js ***!
  \*****************************/
/***/ (() => {

eval("document.querySelector(\"#h3\").onclick = function()\r\n{\r\n    document.body.style.backgroundImage = 'url(f3.jpg)'\r\n    let audio = new Audio();\r\n    audio.preload = 'auto';\r\n    audio.src = 'gachi3.wav';\r\n    audio.play();\r\n}\n\n//# sourceURL=webpack://webpack/./javascript/third.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	__webpack_modules__["./javascript/first.js"]();
/******/ 	__webpack_modules__["./javascript/second.js"]();
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./javascript/third.js"]();
/******/ 	
/******/ })()
;