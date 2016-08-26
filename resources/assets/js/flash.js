$('button.create-pdf').on('click', function(){
	swal({
		title: "PDF being processed...",
		text: "The PDF creation process can take a few minutes. You will be redirected shortly.",
		imageUrl: "img/gears.gif",
		showConfirmButton: false
	});
}); 
 
$('a#suc').on('click', function(){
	$('#create-pdf-form').attr('action', '/create/undergraduate');
	$('.modal-title').html("Create undergraduate catalog");
});

$('a#sgc').on('click', function(){
	$('#create-pdf-form').attr('action', '/create/graduate');
	$('.modal-title').html("Create graduate catalog");
});

