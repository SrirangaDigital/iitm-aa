<?php


class listingModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function listYears() {

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT DISTINCT year_awarded FROM ' . METADATA_TABLE_L1 . ' ORDER BY year_awarded');
		
		$sth->execute();
		$data = array();
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			array_push($data, $result);
		}
		$dbh = null;
		return $data;
	}

	public function listAwardeesInYear($year_awarded = ''){

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L1 . ' WHERE year_awarded = ? ORDER BY name');
		
		$sth->execute(array($year_awarded));
		$data = array();
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			array_push($data, $result);
		}
		$dbh = null;
		return $data;		
	}

	public function listPhotos($albumID) {

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L2 . ' WHERE albumID = :albumID ORDER BY id');
		$sth->bindParam(':albumID', $albumID);

		$sth->execute();
		$data = array();
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			array_push($data, $result);
		}

		$dbh = null;
		$data['albumDetails'] = $this->getAlbumDetails($albumID);
		return $data;
	}
}

?>