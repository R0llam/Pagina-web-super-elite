<?php
require("db.php");
class backupdb extends db
{
	private $ruta = "";
	function __construct()
	{
		parent::__construct();
		echo $this->config();
	}

	private function config():string
	{
		$fecha = date("h-m-s_d-m-Y");
		$this->ruta = "backup/{$fecha}_{$this->getdb()}.sql";
		if(is_writable("backup"))
		{
			if(file_exists($ruta))
			{
				unlink($ruta);
			}
			else
			{
				$comando = "mysqldump -u {$this->getUsuario()} -p'{$this->getContrasena()}' {$this->getdb()} > {$this->ruta}";
				return system($comando);
			}
		}
		else
		{
			return "El directorio no tiene permisos de escritura.";
		}
	}

	public function getRuta():string
	{
		return $this->ruta;
	}
}