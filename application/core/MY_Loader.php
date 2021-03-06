<?php
/**
 * /application/core/MY_Loader.php
 *
 */
class MY_Loader extends CI_Loader
{
	public function template($header_data = array(),$templates = array(), $return = FALSE)
	{
		// templates is an array, whereas,
		// keys  = name of view
		// value = data passed to view
		$content = $this->view('templates/header_view', $header_data, $return);
		foreach($templates as $name => $data)
		{
			$content.= $this->view($name,$data,$return);
		}
		$content.= $this->view('templates/footer_view',NULL, $return);

		if($return)
		{
			return $content;
		}
	}
}
?>