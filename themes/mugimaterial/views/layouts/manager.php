<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/manager/css/jquery-ui.css">
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/manager/js/jquery.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/manager/js/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/manager/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/manager/css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/manager/js/elfinder.min.js"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/manager/js/i18n/elfinder.ru.js"></script>

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			$(document).ready(function() {
				$('#elfinder').elfinder({
					url : 'php/connector.minimal.php'  // connector URL (REQUIRED)
					// , lang: 'ru'                    // language (OPTIONAL)
				});
			});
		</script>


	</head>
	<body>

		<?php echo $content; ?>

	</body>
</html>
