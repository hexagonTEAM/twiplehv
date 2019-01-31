(function($){
  $(function(){

      if ($('#color-set').is(":checked")) {
          document.body.style.backgroundColor = "black";
          $(".themed-t").toggleClass("white-text")
      }

      Setup()

  }); // end of document ready
})(jQuery); // end of jQuery name space

$('#color-set').change(function () {
    if ($(this).is(":checked")) {
        document.body.style.backgroundColor = "black";
        $(".themed-t").toggleClass("white-text");
        SetConfig("theme", "black")
    }
    else {
        document.body.style.backgroundColor = "white";
        $(".themed-t").toggleClass("white-text");
        SetConfig("theme", "white")
    }
});

  function SetConfig(cname, cvalue) {
    localStorage.setItem(cname, cvalue);
};

function Setup() {
    var user = localStorage.getItem("theme");
    if (user == "black") {
        document.body.style.backgroundColor = "black";
        $(".themed-t").toggleClass("white-text");
        $('#color-set').attr('checked', true);
    }
    }
