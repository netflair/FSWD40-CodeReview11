$(function()
{
	$('#filter').change(function(event){
        var selected = $(this).val();
        
        $.ajax({
            url: "./inc/scripts/filter.php",
            method: "post",
            data: {selected:selected},
            success: function(response){
                $("#cars").html(response);
            }
        });

	});
});