// $('#btn').on('click', function(e) {
// 	$.ajax({
// 		url: 'http://olx.prog.uz/api/posters',
// 		type: 'get',
// 		dataType: 'json',
// 		success: function(data){
// 			console.log(data);
// 		}
// 	})
// })

$("#search_index").on('click', function(event){
	event.preventDefault();


	var d = $("#search").val();
	console.log(d)

	// $.get("http://olx.prog.uz/site/search", {id:d},
	// 	function(data){
	// 	})
	window.location.href = "http://olx.prog.uz/site/search?ser="+d;
	

	
})

$("#search_page").on('click', function(event){
	event.preventDefault()
	var search = $("#search").val();
	window.location.href = "http://olx.prog.uz/site/search?ser="+search;
})

var title = $("#title");
var posters_price_disp = $("#posters-price-disp");
var select2_posters_category = $("#select2-posters-category-container");
var posters_image = $("#posters-image");
var select2_posters_address = $("#select2-posters-address-container");
var posters_description = $("#posters-description-container");

$("#add_btn").on('click', function(event){
	// event.preventDefault()
// console.log(posters_price_disp.val())
	// if ( !title.val() && !posters_price_disp.val() && !select2_posters_category.val() && !posters_image.val() && !select2_posters_address.val() )
	// {
	// 	$("#loader").html("<div class='alert alert-danger'>Ma'lumot kiritilmadi</div>");
	// }
})
