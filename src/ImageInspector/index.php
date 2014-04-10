<!DOCTYPE html>
<html>
<head>
	<title>Image Inspector</title>

	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.min.css">
	<style>
		.check-image {
			max-width: 100%;
		}
        .image-detail > tbody > tr > th,
        .image-detail > tbody > tr > td {
            border-top: none;
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
			<td class="well"><img class="check-image" src="./images/<?php echo $image_info['filename']; ?>"></td>
			<td>
                <table class="table image-detail">
                    <tbody>
                    <tr>
                        <th>name</th>
                        <td><?php echo $image_info['filename']; ?></td>
                    </tr>
                    <tr>
                        <th>size</th>
                        <td><?php echo $image_info['size']; ?></td>
                    </tr>
                    <tr>
                        <th>pixel</th>
                        <td><?php echo $image_info['width']; ?>x<?php echo $image_info['height']; ?></td>
                    </tr>
                    <tr>
                        <th>format</th>
                        <td><?php echo $image_info['format']; ?></td>
                    </tr>
                    <tr>
                        <th>colorspace</th>
                        <td><?php echo $image_info['colorspace']; ?></td>
                    </tr>
                    <?php if ($image_info['frame'] > 1) { ?>
                        <tr>
                            <th>frame</th>
                            <td><?php echo $image_info['frame']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                
			</td>
		</tr>
        <?php } ?>
		</tbody>
	</table>
</div>

</body>
</html>
