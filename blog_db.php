<?PHP
	//skapar en koppling och hanterar kommunikation med databasen.

	class DB
	{
	var $db;

				function __construct()
				{
					$this->db = new mysqli("localhost", "root", "", "blog");
					if ($this->db->connect_error)
					{
						die('Connect Error (' . $this->db.connect_errno . ') '. $this>db.connect_error);
					} else {
						
					}
				}

				function getData($SQL)
				{
					$this->db->query("SET NAMES 'utf8'") or die(mysql_error());
					$this->db->query("SET CHARACTER SET 'utf8'") or die(mysql_error());
					$result = $this->db->query($SQL);
					$retval= array();
					while($row = $result->fetch_row())
					{

						array_push($retval,$row);
					}
					return$retval;
				}

				function getOneColumn($SQL)
				{
					$this->db->query("SET NAMES 'utf8'") or die(mysql_error());
					$this->db->query("SET CHARACTER SET 'utf8'") or die(mysql_error());
					$result = $this->db->query($SQL);
					$retval= array();
					while($row = $result->fetch_row())
					{
						array_push($retval,$row[0]);
					}
					return$retval;
				}

				function execute($SQL)
				{
					$this->db->query("SET NAMES 'utf8'") or die(mysql_error());
					$this->db->query("SET CHARACTER SET 'utf8'") or die(mysql_error());
					return $this->db->query($SQL);
				}
	}
?>
