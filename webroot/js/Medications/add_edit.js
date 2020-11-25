$(document).ready(function () {
	
	$('#category-id').on('change', function () {
		var categoryID = $(this).val();
		if (categoryID) {
			$.ajax({
				url: urlToLinkedListFilter,
				data: 'category_id=' + categoryID,
				success: function (medications) {
					$select = $('#medication-id');
					$select.find('option').remove();
					$.each(medications, function (key, value) {
						$.each(value, function (childKey, childValue) {
							$select.append('<option value=' + childValue.id + '>' + childValue.medication + '</option>');
						});
					});
				}
			});
		} else {
			$('#category-id').html('<option value="">Choisir une category</option>');
		}
	});
});