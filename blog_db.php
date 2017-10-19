<?PHP
	//skapar en koppling och hanterar kommunikation med databasen.

	class DB {
	var $db;

				function __construct() {
					$this->db = new mysqli("localhost", "root", "", "blog");
					
					if ($this->db->connect_error) {
						die('Connect Error (' . $this->db.connect_errno . ') '. $this>db.connect_error);
					} else {
						$this->db->query("SET NAMES 'utf8'") or die(mysql_error());
						$this->db->query("SET CHARACTER SET 'utf8'") or die(mysql_error());
						
					}
				}

				function getData($SQL) {
					$result = $this->db->query($SQL);
					$retval= array();

					while($row = $result->fetch_row()) {

						array_push($retval,$row);
					}
					return$retval;
				}

				function getOneColumn($SQL) {
					$result = $this->db->query($SQL);
					$retval= array();
					
					while($row = $result->fetch_row()) {
						array_push($retval,$row[0]);
					}

					return$retval;
				}

				function execute($SQL) {

					return $this->db->query($SQL);
				}

				function getCon() {

					return ($this->db);
				}
	}
?>
