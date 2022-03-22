<html>
<body>
<?php
    foreach($data as $row)
    {
?>
<form  method="post" enctype="multipart/form-data"><br>

<center>
<h1>Please Edit The Details: </h1><br><br>

<input type="hidden" name="id" value="<?php echo $row->id ?>"><br><br>
	<label><b> Name: </b></label>
		<input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $row->name ?>"></td><br><br>

	<label><b> Email: </b></label>
		<input type="email" name="email" placeholder="Enter Your Email" value="<?php echo $row->email ?>"><br><br>

	<label><b> Mobile: </b></label>
		<input type="number" name="mobile" placeholder="Enter Your Mobile Number" value="<?php echo $row->mobile ?>"><br><br>

        <label><b> Image: </b></label>
		<img src="<?php echo base_url('asset/uploads/' . $row->image); ?>" width="100" height="100" />
            <input type="file" name="image" ><br><br>


		<input type="submit"  name="update" value="Update" onClick="return confirm('Are You Sure You Want To Update??')">

</center>
</form>
<?php
    }
?>
</body>
</html>