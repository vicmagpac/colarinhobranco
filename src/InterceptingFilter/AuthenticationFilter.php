<?php


namespace App\InterceptingFilter;

class AuthenticationFilter
{
	
	public function doFilter()
	{
		session_start();
		return isset($_SESSION['email']);
	}
}