$(document).ready(function()
{
    $("#edit_btn").click(function()
	{
        $(".form-control").each(function()
		{
           if ($(this).attr('disabled')) 
			{
                $(this).removeAttr('disabled');
            }
            else 
			{
                $(this).attr
				({
                    'disabled': 'disabled'
                });
            }
        });
    });    
});