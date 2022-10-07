<?php
/*
Readme msg
------------------------------------
Harus menggunakan bootstrao 5 & animated.css

*/

class msg
{
	public static $msg, $time_out = 5000, $auto_close = true;
	public static function error()
	{
		$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2 text-red-100" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    				<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  				</svg>';
		echo "<div class=\"msg-notify position-relative animated bounceInLeft\" height=\"0px\" style=\"z-index : 200\" width=\"100%\">
				<div class=\"alert bg-red position-absolute text-white alert-dismissible animated bounceInLeft mt-3\" role=\"alert\" style=\"left:0; right:0\">
					{$icon}
					<strong> Maaf !! </strong>".self::$msg."
					<button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
				</div>
			</div>";
		self::setTimeOut();
	}	
	public static function success()
	{
		$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2 text-purple-100" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    				<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  				</svg>';
		echo "<div class=\"msg-notify position-relative animated bounceInLeft\" height=\"0px\" style=\"z-index : 200\" width=\"100%\">
				<div class=\"alert bg-purple position-absolute text-white  alert-dismissible mt-3\" role=\"alert\" style=\"left:0; right:0\">
					{$icon}
					<strong> Sukses </strong>".self::$msg."
					<button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
				</div>
			</div>";
		self::setTimeOut();
	}	
	public static function warning()
	{
		$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="flex-shrink-0 me-2 text-yellow-100" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    				<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  				</svg>';
		echo "<div class=\"msg-notify position-relative animated bounceInLeft\" height=\"0px\" style=\"z-index : 200\" width=\"100%\">
				<div class=\"alert bg-yellow position-absolute text-dark alert-dismissible animated bounceInLeft mt-3\" role=\"alert\" style=\"left:0; right:0\">
					{$icon}
					<strong> Peringatan !! </strong>".self::$msg."
					<button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
				</div>
			</div>";

		self::setTimeOut();
			
	}
	public static function setTimeOut()
	{
		if(self::$auto_close):
			echo "<script>
				setTimeout(
					    () => {
					var alert = document.querySelector('.msg-notify');

					alert.classList.replace('bounceInLeft','bounceOutLeft');

					setTimeout(()=>{alert.remove()}, 1000);
					    }
					  , ". self::$time_out .");
				</script>";
		endif;
	}
}