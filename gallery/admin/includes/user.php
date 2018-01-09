<?php 



class User extends Db_object {

	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
	public $id                       ; 
	public $username                 ;
	public $first_name               ;
	public $last_name                ;
	public $password                 ;
	public $user_image               ;
	public $upload_directory = 'img' ;
	public $image_placeholder = 'http://placehold.it/400x400&text=image'  ;


	public static function verify_user($username, $password) {
		global $database;
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);

		$sql = "SELECT * FROM " . self::$db_table . " WHERE ";
		$sql .= "username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";

		$the_result_array = self::find_by_query($sql);
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	}

	public function image_path_and_placeholder(){
		if (empty($this->user_image)) {
			return $this->image_placeholder;
		} else {
			return $this->upload_directory.DS.$this->user_image;
		}
	}



	public function save_user_in_image(){
	
			if (!empty($this->errors)) { return false;}
			if (empty($this->user_image) || empty($this->tmp_path)){$this->errors[]="File not available"; return false;}
			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
			if(file_exists($target_path)){$this->errors[] = "File {$this->user_image} already exists"; return false;}
			if (move_uploaded_file($this->tmp_path, $target_path)) {
					unset($this->tmp_path);
					return true;
			} else {
				$this->errors[] = "Folder file directory probably does not have permission";
				return false;
			}
		}	
	

	public function delete_photo(){
		if ($this->delete()){
			$target_path = SITE_ROOT.DS. 'admin' .DS. $this->picture_path();
		} else {
			return false;
		
	}




}

}

?>

