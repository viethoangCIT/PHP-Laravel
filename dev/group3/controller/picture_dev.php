<?php 

class picture extends Main
{

	function index($id = "")
	{
		//khoi tao doi tuong Model Picture lien ket toi bang pictures
		$this->loadModel("Picture","pictures");

		if(isset($_POST["data"])==true)
		{
			$data = $_POST["data"];
			$this->Picture->save($data);
		}
		// //truy van du lieu tu bang pictures
		$array_picture = $this->Picture->find("all");

		//dung ham render de lay du lieu tu trang...
		$html = $this->View->render("index_picture.php",array("array_picture"=>$array_picture,"id"=>$id));
		echo $html;
	}
	function del($id = "")
	{
		if($id != "")
		{
			$this->loadModel("Picture","pictures");
			$this->Picture->delete($id);
			$this->redirect("/picture/index");
		}
	}

	function video($id = "")
	{
		$this->loadModel("Video","videos");

		if(isset($_POST["data"])==true)
		{
			$data = $_POST["data"];
			$this->Video->save($data);
		}

		$array_video = $this->Video->find("all");

		$html = $this->View->render("video_picture.php",array("array_video"=>$array_video,"id"=>$id));
		echo $html;
	}
	function del_video($id = "")
	{
		if($id != "")
		{
			$this->loadModel("Video","videos");
			$this->Video->delete($id);
			$this->redirect("/picture/video");
		}
	}
}

?>