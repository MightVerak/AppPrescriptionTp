function getCategories() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var categoryTable = $('#categoryData');
                    categoryTable.empty();
                    $.each(data.categories, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="edit" data-toggle="modal" data-target="#modalCategoryAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'categoryAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                        categoryTable.append('<tr><td>' + value.id + '</td><td>' + value.category + '</td>' + editDeleteButtons);
 
                    });

                }

    });
}

 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function categoryAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var categoryData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalCategoryAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        categoryData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
		ajaxUrl = ajaxUrl + "/" + id;
        categoryData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(categoryData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">Category data has been ' + statusArr[type] + ' successfully.</p>');
                getCategories();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

function editCategory(id) {
    $.ajax({
        type: 'GET',
        url: urlToRestApi + "/" + id,
        dataType: 'JSON',
        //data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.id);
            $('#category').val(data.category);
        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalCategoryAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var categoryFunc = "categoryAction('add');";
        $('.modal-title').html('Add category');
        if (type == 'edit') {
			var rowId = $(e.relatedTarget).attr('rowID');
            categoryFunc = "categoryAction('edit'," + rowId + ");";
            $('.modal-title').html('Edit category');
            editCategory(rowId);
        }
        $('#categorySubmit').attr("onclick", categoryFunc);
    });

    $('#modalCategoryAddEdit').on('hidden.bs.modal', function () {
        $('#categorySubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});