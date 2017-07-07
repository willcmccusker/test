
$(document).ready(function () {
  if (typeof(startFrontMap) !== 'undefined') {
    startFrontMap()
  }
  setTeam()
  setData()
  
  var heady = document.querySelector("header");
  var headroom  = new Headroom(heady)
  headroom.init() 

})

function setData () {
  var dataList = new List('data-table',
    {valueNames: ['country', 'name' ],
    page: 10,
    plugins: [
      ListPagination({})
    ]
   });

   $(".per-page select").on("change", function(){
    dataList.page = $(this).val();
    dataList.update();

   });


  $(".show-methodology").click(function(){
    if($(this).html() == "Show Methodology"){
      $(this).html("Hide Methodology");
    }else{
      $(this).html("Show Methodology");
    }
    $(".methodology").slideToggle();
  });
  $(".show-links").click(function(){
    $(this).toggleClass("showing-link");
    var next = $(this).next(".expansion-links");
    $(next).css("z-index", 2);
    $(".hide-on-desktop .expansion-links").not(next).prev().removeClass("showing-link").next().css("z-index", 1).slideUp();
    $(next).slideToggle();
  });
}

function setTeam () {
  $('.popit').click(function () {
    $(this).find('.popup').addClass('popped')
  })
  $('.popdown').click(function (e) {
    e.preventDefault()
    e.stopPropagation()
    popdown()
  })
}

function popdown () {
  $('.popped').removeClass('popped')
}