/******/ (() => { // webpackBootstrap
/*!*************************************!*\
  !*** ./resources/js/searchTasks.js ***!
  \*************************************/
// Фильтрация задач по заголовку
$('#search').on('input', function () {
  var query = $(this).val().toLowerCase();
  $('#tasksList .card').each(function () {
    var title = $(this).find('.card-title').text().toLowerCase();
    $(this).toggle(title.includes(query));
  });
});
/******/ })()
;