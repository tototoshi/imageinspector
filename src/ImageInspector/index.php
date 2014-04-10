<!DOCTYPE html>
<html>
<head>
	<title>Image Inspector</title>

	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.min.css">
	<style>
		.check-image {
			max-width: 100%;
		}
	</style>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Image Inspector</a>
        </div>
	</div>
</div>

<div class="container">
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>Image</th>
			<th>Detail</th>
		</tr>
		</thead>
		<tbody>
        <?php foreach($images_info as $image_info) {?>
		<tr>
			<td><img class="check-image" src="./images/<?php echo $image_info['filename']; ?>"></td>
			<td>
                <dl>
                    <dt>name</dt>
                    <dd><?php echo $image_info['filename']; ?></dd>
                </dl>
                <dl>
                    <dt>size</dt>
                    <dd><?php echo $image_info['size']; ?></dd>
                </dl>
                <dl>
                    <dt>pixel</dt>
                    <dd><?php echo $image_info['width']; ?>x<?php echo $image_info['height']; ?></dd>
                </dl>
                <dl>
                    <dt>format</dt>
                    <dd><?php echo $image_info['format']; ?></dd>
                </dl>
                <dl>
                    <dt>colorspace</dt>
                    <dd><?php echo $image_info['colorspace']; ?></dd>
                </dl>
                <?php if ($image_info['frame'] > 1) { ?>
                <dl>
                    <dt>frame</dt>
                    <dd><?php echo $image_info['frame']; ?></dd>
                </dl>
                <?php } ?>
			</td>
		</tr>
        <?php } ?>
		</tbody>
	</table>
</div>

</body>
</html>
