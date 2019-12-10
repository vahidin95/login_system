$(document).ready(function(){ 
  $(".no-active").hover(function (e) {
   $(this).addClass("active").siblings().removeClass("no-active");
 });
  console.log('something');

})

//to add class active on list.php in navbar manu
