<html>
<body>
<form>
    <p><label for="item">Select an item: </label><input type="text" name="item" id="item"/></p>
    <p id="selected" hidden></p>
	<p><select id="multiple" style="display: none;" size="10"/></p>
</form>
</body>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script>
    $( "#item" ).on( 'input', function() {
            $('#multiple').hide();
            $.ajax(
                {
                    url: 'get_matches.php?term=' + $(this).val(),
                    success: function( data ) {
                        if ( data.length == 1 ) {
                            $('#item').val( data[0] );
                        } else {
                            if ( data.length > 1 ) {
                                $("#multiple").find('option').remove();
                                data.forEach( function(e) {
                                    $("#multiple").append("<option>" + e + "</option>");
                                });
                                $("#multiple").prop( 'size', data.length );
                                $("#multiple").show();
                            }
                        } 
                    },
                    dataType: 'json',
                }
            );
        }
    );
    
    $( "#multiple" ).click( function() {
        $('#item').val( $(this).val() );
        $('#multiple').hide();
		$.ajax(
			{
				url: 'get_item.php?name=' + $('#item').val(),
				success: function( data ) {
					$('#selected').html(data);
					$('#selected').show();
				},
				dataType: 'json',
			});
    }
    );
  </script>
</html>