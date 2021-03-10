<!DOCTYPE html>
<html>
<head>
	<title>File Listing</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>

<?php	$dir = "images";
echo "<h4><center>Files in ".$dir." folder</center>";
echo "<br>";
$b = scandir($dir,1);
$files = array_diff($b, array('.', '..'));

  echo "<table id='myTable' class='table table-striped'>
    <thead>
      <tr>
        
        <th>Filename</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>";
    foreach ($files as $k) {
    echo "<tr>
          <td>".$k."</td>
          <td ><a class='delete_file' href='#' data-idd='$k'>Delete</a></td>
          </tr>";
    }
  echo " </tbody>
  </table>";

?>



<div class="container" style="border:1px solid; margin: 10%;">
  <h2>Upload Files</h2>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Please select an Image</label>
      <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
    </div>
    <input type="submit" value="Upload Image" name="submit">
  </form>
</div>

<script type="text/javascript">
	$('#myTable').DataTable();
	$("#myTable .delete_file").click(function(){
		var filename = $(this).attr("data-id");
  		alert(filename);
  		$.ajax({
            url:"delete.php",    //the page containing php script
            type: "post",    //request type,
            dataType: 'json',
            data: {file: filename},
            success:function(result){
                alert("success");
            }
        });
	});

</script>

</body>
</html>