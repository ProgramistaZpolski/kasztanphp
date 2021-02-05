<?php

class Kasztan
{
	public static function err($th)
	{
		echo "<h1 style='font-weight: 400; 
		font-family: \"Ubuntu\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, 
		\"Helvetica Neue\", \"Helvetica\", Cantarell, Oxygen, Arial, \"Noto Sans\", sans-serif;'>
		KasztanPHP Error: " . $th . "</h1>";
		throw $th;
	}

	public static function view(String $filename)
	{
		include_once "./views/" . $filename . ".php";
		try {
			$tempView = new $filename;
			$tempView->render();
			return $tempView;
		} catch (\Throwable $th) {
			Kasztan::err($th);
		}
	}

	public static function htmlview(String $filename)
	{
		echo file_get_contents("./views/" . $filename . ".html");
	}

	public static function component(String $filename, array $params = [])
	{
		include_once "./components/" . $filename . ".php";
		try {
			$tempComp = new $filename;
			$tempComp->render($params);
			return $tempComp;
		} catch (\Throwable $th) {
			Kasztan::err($th);
		}
	}

	public static function asset(String $filename, String $version = "no")
	{	
		echo "./assets/serve.php?file=" . $filename . "&v=" . $version;
	}
}
