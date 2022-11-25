<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog Listing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Blogs List</h2> 

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Date</th>
        <th>Title</th>
		 <th>Description</th>
		  
      </tr>
    </thead>
    <tbody>
	
	<?php
foreach($LISTDATA as $data)
	{?>
      <tr>
        <td><?php echo $data->addeddate;?></td>
        <td><?php echo $data->title;?></td>
        <td><?php echo $data->description;?></td>

      </tr>
	<?php  } ?>
	
    </tbody>
  </table>
  
  	       <p><?php echo $links; ?></p>
  
</div>

</body>
</html>
