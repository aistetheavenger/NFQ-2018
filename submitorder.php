<?php
include "connect.php";


if (isset($_POST['base'])){
	$sql = 'INSERT  INTO Orders VALUES ("'.$_POST['base'].'", "'.$_POST['frost'].'", "'.$_POST['top'].'", "'.$_POST['qty'].'", "'.$_POST['price'].'")';
	connect();

	if(mysqli_query($conn, $sql)){
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		            <strong>Your order was recieved</strong>
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		        </div>';
	}else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		            <strong>Something went wrong, order was not created</strong>
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		        </div>';
	}
	$conn->close();
}

?>

