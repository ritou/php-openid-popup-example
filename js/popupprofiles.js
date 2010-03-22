  var profiles =
  {
    google:
    {
      height:500,
      width:500,
      toolbar:1,
      scrollbars:1,
      status:1,       
	  resizable:1,
      left:0,
      top:0,
      center:1,
      createnew:0,
      location:1,
      menubar:1,
	  onUnload:reloadwindow
    },

    myspace:
    {
      height:350,
      width:600,
      toolbar:1,
      scrollbars:1,
      status:1,       
	  resizable:1,
      left:0,
      top:0,
      center:1,
      createnew:0,
      location:1,
      menubar:1,
	  onUnload:reloadwindow
    },

    yahoo:
    {
      height:500,
      width:500,
      toolbar:1,
      scrollbars:1,
      status:1,       
	  resizable:1,
      left:0,
      top:0,
      center:1,
      createnew:0,
      location:1,
      menubar:1,
	  onUnload:reloadwindow
    },

    yahoojp:
    {
      height:560,
      width:540,
      toolbar:1,
      scrollbars:1,
      status:1,       
	  resizable:1,
      left:0,
      top:0,
      center:1,
      createnew:0,
      location:1,
      menubar:1,
	  onUnload:reloadwindow
    }

  };

  function reloadwindow(){
    document.location.reload();
  };

  $(function()
  {
    $(".popupwindow").popupwindow(profiles);
  });