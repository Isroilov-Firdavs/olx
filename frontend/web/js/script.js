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


	var d = $("#search");
	if ( !d.val() )
	{
		$("#search").addClass('search_error');
	}
	else
	{
		window.location.href = "http://olx.prog.uz/site/search?ser="+d.val();
	}
	

	
}) 

$("#search_page").on('click', function(event){
	event.preventDefault()
	var category = $("#category").val();
	var amount_from = $("#amount_from").val();
	var amount_to = $("#amount_to").val();
	var region = $("#region").val();
	console.log(search, category, amount_from, amount_to, region)
	window.location.href = "http://olx.prog.uz/site/search-filter?category="+category+"&country="+region+"&amount_from="+amount_from+"&amount_to="+amount_to;
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
