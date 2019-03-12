<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		class datauser
		{
			private $username; private $namadepan;
			private $namabelakang; private $jeniskelamin;
			function __construct($username,$namadepan,$namabelakang,$jeniskelamin)
			{
				$this->username = $username;
				$this->namadepan = $namadepan;
				$this->namabelakang = $namabelakang;
				$this->jeniskelamin = $jeniskelamin;
			}
			public function getnamadepan()
			{
				return $this->namadepan;
			}
			public function getnamabelakang()
			{
				return $this->namabelakang;
			}
			public function getusername()
			{
				return $this->username;
			}
			public function getjeniskelamin()
			{	
				return $this->jeniskelamin;
			}
		}

		class datalanjutan
		{
			private $username; private $profile_pic;
			private $alamat; private $motto;
			private $tempat_lahir; private $tanggal_lahir;
			private $bio;

			function __construct ($username, $profile_pic, $alamat, $motto, $tempat_lahir, $tanggal_lahir, $bio)
			{
				$this->username = $username;
				$this->profile_pic = $profile_pic;
				$this->alamat = $alamat;
				$this->motto = $motto;
				$this->tempat_lahir = $tempat_lahir;
				$this->tanggal_lahir = $tanggal_lahir;
				$this->bio = $bio;
			}
			public function getusername()
			{
				return $this->username;
			}
			public function getprofile_pic()
			{
				return $this->profile_pic;
			}
			public function getalamat()
			{
				return $this->alamat;
			}
			public function getmotto()
			{	
				return $this->motto;
			}
			public function gettempat_lahir()
			{
				return 	$this->tempat_lahir;
			}

			public function gettanggal_lahir()
			{
				return $this->tanggal_lahir;
			}
			public function getbio()
			{
				return $this->bio;
			}
		}

		include 'DBconnect.php';
		$data = array();
		$datalanjutan = array();
		$query = "SELECT * FROM data_user";
		$query2 = "SELECT * FROM data_user_lanjutan";
		$result = $db->query($query);
		foreach($result as $row)
		{
			array_push($data,
						new datauser($row['username'],$row['nama_depan'],$row['nama_belakang'],
						$row['jenis_kelamin']));
		}
		$result2 = $db->query($query2);
		foreach ($result2 as $row) 
		{
			array_push($datalanjutan,
						new datalanjutan($row['username'],$row['profile_pic'],$row['alamat'],
						$row['motto'],$row['tempat_lahir'],$row['tanggal_lahir'],$row['bio']));
		}
?>
</body>
</html>