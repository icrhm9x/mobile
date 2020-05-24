<?php
	/**
	 * Mở composer.json
	 * Thêm vào trong "autoload" chuỗi sau
	 * "files" : [
	 *  	"app/Helper/function.php"
	 *	]
	 * Chạy cmd composer dumpautoload
	 */

	if (!function_exists('notifyError')) {
		function notifyError($errors, $name)
		{
			if ($errors->has($name)) {
				echo '<p class="text-danger font-italic">';
				echo $errors->first($name);
				echo '</p>';
			}
		}
	}

	if(!function_exists('get_data_user')) {
		function get_data_user($type, $fiel = 'id') {
			return Auth::guard($type)->user() ? Auth::guard($type)->user()->$fiel : '';
		}
	}
?>
