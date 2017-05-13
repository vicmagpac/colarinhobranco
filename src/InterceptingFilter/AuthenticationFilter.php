<?php


namespace App\AuthenticationFilter;

class AuthenticationFilter
{
	

	public function doFilter()
	{
		return isset($_SESSION['userlogin'];
	}
}