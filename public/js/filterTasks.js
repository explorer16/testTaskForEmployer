/******/ (() => { // webpackBootstrap
/*!*************************************!*\
  !*** ./resources/js/filterTasks.js ***!
  \*************************************/
// Фильтрация задач по статусу
$('#statusFilter').on('change', function () {
  var status = $(this).val();
  $('#tasksList .card').each(function () {
    var taskStatus = $(this).find('.badge').text();
    $(this).toggle(status === "" || taskStatus === status);
  });
});
/******/ })()
;