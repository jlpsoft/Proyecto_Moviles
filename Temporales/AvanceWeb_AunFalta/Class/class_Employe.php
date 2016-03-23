<?php
class Consultar_Producto{
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM role WHERE id='$codigo' or description='$codigo' or pay='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_brand{
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM brand WHERE id='$codigo' or name='$codigo' ");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_size{
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM size WHERE id='$codigo' or name='$codigo' ");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_color{
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM color WHERE id='$codigo' or name='$codigo' ");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_category{
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM category WHERE id='$codigo' or description='$codigo' ");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}


class Proceso_{
	var $pay;	var $description;	var $id;
	
	function __construct($nombre, $curso, $id){
		$this->nombre = $nombre; 		$this->curso = $curso;		$this->id = $id;
	}
	
	function crear(){
		$nombre=$this->nombre;	$curso=$this->curso;
		mysql_query("INSERT INTO salones (nombre, curso, estado) VALUES ('$nombre','$curso','s')");
	}
	
	function actualizar(){
		$pay=$this->pay;	$description=$this->description;	$id=$this->id;
		mysql_query("Update role Set	pay='$pay', description='$description' Where id=$id");
	}
	
	
}class Proceso_Producto{
	var $id;		var $stock;		var $idFkCategory;		
	var $name;		var $idFkBrand;		var $idFkSize;
	var $price;             var $idFkColor;
        function __construct($id, $name, $price, $stock, $idFkCategory, $idFkBrand, $idFkSize, $idFkColor){
		$this->id = $id;			$this->idFkCategory = $idFkCategory;
                                                        $this->idFkBrand= $idFkBrand;
		$this->name = $name;		        $this->idFkSize = $idFkSize;
		$this->price = $price;		       $this->idFkColor = $idFkColor;		
		$this->stock = $stock;		
							
	}
		
	function crear(){
					$idFkCategory=$this->idFkCategory;		
		$name=$this->name;		$idFkBrand=$this->idFkBrand;
		$price=$this->price;				$idFkSize=$this->idFkSize;
		$stock=$this->stock;		$idFkColor=$this->idFkColor;
			
			 
		mysql_query("INSERT INTO product ( name, price, stock, idFkCategory, idFkBrand,idFkSize,idFkColor VALUES ('$name','$price','$stock','$idFkCategory','$idFkBrand','$idFkSize','$idFkColor')");
	}
	
	function actualizar(){
		$id =$this->id ;			$idFkCategory=$this->idFkCategory;		
		$name=$this->name;		$idFkBrand=$this->idFkBrand;
		$price=$this->price;				$idFkSize=$this->idFkSize;
		$stock=$this->stock;		$idFkColor=$this->idFkColor;			
		
		mysql_query("Update producto Set	nombre='$name',
										apellido='$price',
										stock='$stock',
										idFkCategory='$idFkCategory',
										idFkBrand='$idFkBrand',
										idFkSize='$idFkSize',
										idFkColor='$idFkColor'
                                                                                     
								Where id=$id");
	}
}

class Proceso_Empleado{
	var $name;		var $dateborn;		var $address;		
	var $lastname;		var $datestart;		var $idFkLogin;
        var$email ;            var$active ;
	var $dni;			var $city;	var $idFkRole;		var $id;
		
	function __construct($name, $lastname, $email,$dni, $dateborn, $datestart, $city,$active, $address, $idFkLogin,$idFkRole, $id){
		$this->name = $name;			$this->city = $city;
                                                        $this->address= $address;
		$this->lastname = $lastname;		$this->idFkLogin = $idFkLogin;
                $this->email = $email;                  $this->active= $active;
		$this->dni = $dni;					$this->idFkRole = $idFkRole;		
		$this->dateborn = $dateborn;		$this->id = $id;
		$this->datestart = $datestart;			
							
	}
		
	function crear(){
		$name=$this->name;			$city=$this->city;		
		$lastname=$this->lastname;		$active=$this->active;
                $email=$this->email;                    $address=$this->address;
		$dni=$this->dni;		       $idFkLogin=$this->idFkLogin;
		$dateborn=$this->dateborn;		$idFkRole=$this->idFkRole;
		$datestart=$this->datestart;		
		mysql_query("INSERT INTO employee (name, lastname,email, dni, dateborn, datestart, city, active,address,idFkLogin,idFkRole) VALUES ('$name','$lastname','$email','$dni','$dateborn','$datestart','$city','$active','$address','$idFkLogin','$idFkRole')");
	}
	
	function actualizar(){
		$name=$this->name;			$city=$this->city;		
		$lastname=$this->lastname;		$active=$this->active;
                $email=$this->email;                    $address=$this->address;
		$dni=$this->dni;		       $idFkLogin=$this->idFkLogin;
		$dateborn=$this->dateborn;		$idFkRole=$this->idFkRole;
		$datestart=$this->datestart;		$id=$this->id;				
		
		mysql_query("Update employee Set	nombre='$name',
										apellido='$lastname',
										dni='$dni',
                                                                                email='$email'    ,
										dateborn='$dateborn',
										datestart='$datestart',
										city='$city',
                                                                                    active='$active' 
										address='$address'
                                                                                 idFkLogin='$idFkLogin'
                                                                                idFkRole='$idFkRole'     
								Where id=$id");
	}	
}
?>