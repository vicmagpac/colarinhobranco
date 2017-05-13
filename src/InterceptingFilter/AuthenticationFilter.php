<?php


namespace App\InterceptingFilter;

class AuthenticationFilter
{
	
	public function doFilter()
	{
		return isset($_SESSION['email']);
	}
}