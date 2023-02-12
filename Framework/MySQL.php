<?php

/**
 *
 * MySQL.php
 * (c) Feb 26, 2023 lastprophet
 * @author Anibal Gomez (lastprophet)
 * Balero CMS Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 * PHP P.O.O. (M.V.C.)
 * Contacto: anibalgomez@icloud.com
 *
**/



class MySQL {
	
	/**
	 * Nueva conexión
	 */
	
	private $conn;
	
	/**
	 * Ejecutar query
	 */
	
	private $result;

	/**
	 * 
	 * Almacenamos los resultados en un array llamado rows[]. 
	 */
	
	private $rows;
	
	/**
	 * 
	 * Connection status
	 */
	
	private $status = FALSE;

    private $totalRows;

	public function __construct($host = "", $user = "", $pass = "", $db = "") {
			try {
				$this->conn = new mysqli($host, $user, $pass, $db);
				$this->status = TRUE;
				if(mysqli_connect_errno()) {
					$this->status = FALSE;
					throw new ErrorConnectionException(get_class($this) + ": MySQL Connection Error " + mysqli_connect_error());
				}
			} catch (ErrorConnectionException $e) {
				//$e->getMessage();
				throw new ErrorConnectionException($e->getMessage());
			}
	}
		

	/**
	 * 
	 * @param $query Sentencia SQL. Ejemplo: "SELECT id,user,name FROM users"
	 */
	
	public function query($query) {
		try {
		$this->result = $this->conn->query($query);
			if(!$this->result) {
				throw new DatabaseException("MYSQL: SYNTAX QUERY ERROR: " . $query);
			}
		} catch(DatabaseException $e) {
			throw new DatabaseException($e->getMessage());
		}
	}	
	
	
	/**
	 * Ciclamos al asignar un valor al array.
     * @get() Almacena los resultados de la query en un array
     * en este caso $this->rows[]
	 */
	public function get() {
		try {
			if (!$this->result) {
				throw new DatabaseError("MySQL Query Error");
			}
			while($row = $this->result->fetch_array()) {
				$this->rows[] = $row;
			}
		} catch (DatabaseError $e) {
            throw new DatabaseError($e->getMessage());
		}
	}


	/** Regresa el numero total de registros de una $query **/
	public function getTotalRows() {
		return $this->result->num_rows;

	}
	
	
	/**
	 * Crear tablas en la base de datos.
	 * @param string $name Nombre de la tabla.
	 */
	public function create($query) {
		try {
			$table = mysqli_multi_query($this->conn, $query);
				if(!$table) {
					throw new DatabaseException("Database error when executing create() query " + $query);
				}
		} catch (DatabaseException $e) {
            throw new DatabaseException($e->getMessage());
		}
	}
		
	
	public function getRows() {
		return $this->rows;
	}

	/**
	 * Cerrar conexión.
	 */
	
	public function __destruct() {
		$this->conn->close();
	}

}
