$(document).ready(function(){
	$('#myDiv').hide();
  	$("#myInput").on("keyup", function() {
    	var value = $(this).val().toLowerCase();
    	$("#myList li").filter(function() {
      	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    	});
  	});

  	$('#pwd').hide();
            
    $('#editProfile').on('click','#ch_pwd',function () {
        // alert('Xiao Zhan');
        var chkbox = $("input[type='checkbox']");
        if (chkbox.is(':checked')) {
            $('#pwd').show(500);
        }
        else {
            $('#pwd').hide(500);
        }
    })
});