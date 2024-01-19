$(document).ready(function() {
    $('#addProduct').click(function() {
        $('#productModal').modal('show');
        $('#productForm')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Product");
        $('#action').val("Add");
        $('#btn_action').val("addProduct");
    });
    $(document).on('change', '#categoryid', function() {
        var categoryid = $('#categoryid').val();
        var btn_action = 'getCategoryBrand';
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { categoryid: categoryid, btn_action: btn_action },
            success: function(data) {
                $('#brandid').html(data);
            }
        });
    });
});