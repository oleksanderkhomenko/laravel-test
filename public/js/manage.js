function addAdditionalFields() {
    var additional = '<div class="form-group additional-properties"><label for="additional" class="col-md-4 control-label">Additional Properties <span style="cursor:pointer;" onclick="removeAdditionalField(this);">X</span></label><div class="col-md-3">name<input type="text" class="form-control" name="additional_name[]" value=""></div><div class="col-md-3">description<input type="text" class="form-control" name="additional_description[]" value=""></div></div>';
	$(additional).insertAfter('.image-url');
}

function removeAdditionalField(el) {
	$(el).parent().parent().remove();
}

$(function() {
    $('.button-delete-product').on( "click", function() {
  		token = $(this).closest('form').find('input[name="_token"]').val();
  		id = $(this).closest('form').find('input[name="id"]').val();
  		tr = $(this).closest('tr');

		$.ajax({
			type:"POST",
		  	url:'/product/delete/'+id,
		  	data:{"_token": token }
		}).then(function(data) {
			if (data.status == 'success') {
				tr.remove();
			} else {
				console.log('error');
			}
		});
	});

	$('.button-delete-category').on( "click", function() {
  		token = $(this).closest('form').find('input[name="_token"]').val();
  		id = $(this).closest('form').find('input[name="id"]').val();
  		tr = $(this).closest('tr');

		$.ajax({
			type:"POST",
		  	url:'/category/delete/'+id,
		  	data:{"_token": token }
		}).then(function(data) {
			if (data.status == 'success') {
				tr.remove();
			} else {
				console.log('error');
			}
		});
	});
});
