<?php
namespace app\controllers;
  use \mako\View;   
  use \mako\Validate; 
    class Example extends \mako\Controller
    {
    public function action_index()
    {
		$db= new \app\models\mhs();
		return new View('mhs/main',array('data'=>$db->getAll()));
    }
    public function action_mhsAdd()
    {
		$db= new \app\models\mhs();
		if($this->request->method() == 'POST')
		{
			$nama=$_POST['nama'];
			$nim=$_POST['nim'];
			if($db->add($nim,$nama))$this->response->redirect('example/index');
			else {echo "error";}
		}
		else
		{
			$view=new View('mhs/add');
		}
		return $view;
    }
	public function action_mhsUpdate($oldnim)
    {
		$db= new \app\models\mhs();
		$rules=array('*' => 'required','nim' => 'min_length:8|max_length:8');
		if($this->request->method() == 'POST')
		{
			  
			$validation = new Validate($_POST, $rules);
			if($validation->successful())
			{
				$nama=$_POST['nama'];
				$nim=$_POST['nim'];
				//$oldnim=$_POST['oldnim'];
				echo $nama.":".$nim;
				if($db->update($oldnim, $nama, $nim))$this->response->redirect('example/index');
				else {echo "error";}
			}
			else echo "";
		}
		
			$view=new View('mhs/update',array('data'=>$db->getByNim($oldnim)));
		
		return $view;
    }
	public function action_mhsDelete($nim)
    {
		$db= new \app\models\mhs();
		if($db->delete($nim))$this->response->redirect('example/index');
		else {echo "error";}
    }
   public function action_nilai()
	{
		$db= new \app\models\nilai();
		return new View('nilai/main',array('data'=>$db->getAll()));
	}
	   public function action_nilaiAdd()
    {
		$db= new \app\models\nilai();
		if($this->request->method() == 'POST')
		{
			$matkul=$_POST['matkul'];
			$grade=$_POST['grade'];
			$nim=$_POST['nim'];
			if($db->add($nim, $grade,$matkul))$this->response->redirect('example/nilai');
			else {echo "error";}
		}
		else
		{
			$view=new View('nilai/add');
		}
		return $view;
    }
	public function action_nilaiUpdate($idold)
    {
		$db= new \app\models\nilai();
		if($this->request->method() == 'POST')
		{
			$matkul=$_POST['matkul'];
			$grade=$_POST['grade'];
			$id=$_POST['id'];
			$nim=$_POST['nim'];
			if($db->update($id, $grade, $matkul,$nim))$this->response->redirect('example/nilai');
			else {echo "error";}
		}
		else
		{
			$view=new View('nilai/update',array('data'=>$db->getById($idold)));
		}
		return $view;
    }
	public function action_nilaiDelete($id)
    {
		$db= new \app\models\nilai();
		if($db->delete($id))$this->response->redirect('example/nilai');
		else {echo "error";}
    }
    }