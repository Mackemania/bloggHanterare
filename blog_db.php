<?PHP
class DB
{
var $db;

			function __construct($host,$user,$password,$database)
			{
				$this->db = new mysqli($host,$user,$password,$database);
				if ($this->db->connect_error) 
				{
				die('Connect Error (' . $this->db.connect_errno . ') '. $this>db.connect_error);
				}
			}
			
			function getData($SQL)
			{
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
				return $this->db->query($SQL);
			}
}
?>