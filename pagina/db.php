<?php

class db
{
	private $servidor = "localhost";
	private $db = "bd";
	private $charset = "utf8";
	private $usuario = "root";
	private $contrasena = "";
	private $unix_socket = "/var/run/mysql/mysql.sock";
	public $pdo = null;
	private $opciones = [PDO::ATTR_CASE => PDO::CASE_LOWER, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
	function __construct()
	{
		$this->pdo = new PDO("mysql:unix_socket={$this->unix_socket};dbname={$this->db};host={$this->servidor};charset={$this->charset}", $this->usuario, $this->contrasena, $this->opciones);
	}

	public function getServidor():string
	{
		return $this->servidor;
	}

		public function getdb():string
	{
		return $this->db;
	}

		public function getCharset():string
	{
		return $this->charset;
	}

		public function getUsuario():string
	{
		return $this->usuario;
	}

		public function getContrasena():string
	{
		return $this->contrasena;
	}

	public function getUnixSocket()
	{
		return $this->unix_socket;
	}

} 


