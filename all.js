// function exitthis(ev) {
//   ev.teturnValue = 'true';
//   $.post({
//     async: false,
//     url: "Main.php?call=1",
//     success: function (e) {
//       alert(e);
//     },
//   });
// }
// $(window).bind("beforeunload", function () {
//   return "efgsrg";
// });
// window.onbeforeunload = function () {
//   myFunction();
// };
window.onbeforeunload = myFunction;
function myFunction(){
  // alert(1);
  // var Data = $.ajax({
  //   type: "POST",
  //   url: "Main.php?call=1",  //loading a simple text file for sample.
  //   cache: false,
  //   global: false,
  //   async: false,
  //   success: function (data) {
  //     return data;
  //   }

  // }).responseText;
  $.post({
    // async: false,
    url: "Main.php?call=1",
    success: function (e) {
      // console.log(e);
      // return "1";
      // alert(e);
    },
  });
  // console.log('test');
  // return "1";
}
// $(window).on('beforeunload', function () {
  
// });