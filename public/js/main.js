var BtnCreate = $('#CreateNew');
var formInput = $('#formInput');
var tableData = $('#tableData');
var TEXT_BTN_CREATE_BEFORE = "Create New";
var TEXT_BTN_CREATE_AFTER = "Back";
var ID_BTN_CREATE_BEFORE = "CreateNew";
var ID_BTN_CREATE_AFTER = "BtnBack";
$("p[name='kategori']").hide();

$(document).ready(function(){

	formInput.hide();
    BtnCreate.click(function(){
        tableData.hide(function(){
        	formInput.trigger('reset');
        	formInput.show('300');
        	BtnCreate.attr("id",ID_BTN_CREATE_AFTER);
        	BtnCreate.text(TEXT_BTN_CREATE_AFTER);
        });

    });
	$(document).on("click","#BtnBack",function(){
		
		
		formInput.hide(function(){
			formInput.trigger('reset');
			tableData.show('300');
			BtnCreate.text(TEXT_BTN_CREATE_BEFORE);
			BtnCreate.attr("id",ID_BTN_CREATE_BEFORE);

		});
	});

	$('#add').click(function(e){
		e.preventDefault();
		var form_action = $('form[id="formInput"]').attr("action");
		var katName 	= $('#nama_kategori').val();
		var katGambar 	= $('#images').val();

		$.ajax({

			dataType: 'json',
			type: 'POST',
			url: form_action,
			data: new FormData($('#formInput')[0]),
			headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			cache: false,
    		processData: false,
		}).done(function(response){
	       console.log(response);
	    });
	});
    
});

