<script>$(document).ready(function() {
	$('#example').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "../examples_support/server_processing.php"
	} );
} );
</script>