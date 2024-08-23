<?php 
/**
* clase que genera la insercion y edicion  de reorganizacion en la base de datos
*/
class Administracion_Model_DbTable_Reorganizacion extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'reorganizacion';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'reor_id';

	/**
	 * insert recibe la informacion de un reorganizacion y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$estado = $data['estado'];
		$reor_titulo = $data['reor_titulo'];
		$reor_imagen = $data['reor_imagen'];
		$reor_enlace = $data['reor_enlace'];
		$reor_color_fondo = $data['reor_color_fondo'];
		$reor_vermas = $data['reor_vermas'];
		$fecha = $data['fecha'];
		$reor_arch = $data['reor_arch'];
		$reor_arch_nom = $data['reor_arch_nom'];
		$reor_desc = $data['reor_desc'];
		$query = "INSERT INTO reorganizacion( estado, reor_titulo, reor_imagen, reor_enlace, reor_color_fondo, reor_vermas, fecha, reor_arch, reor_arch_nom, reor_desc) VALUES ( '$estado', '$reor_titulo', '$reor_imagen', '$reor_enlace', '$reor_color_fondo', '$reor_vermas', '$fecha', '$reor_arch', '$reor_arch_nom', '$reor_desc')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un reorganizacion  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$estado = $data['estado'];
		$reor_titulo = $data['reor_titulo'];
		$reor_imagen = $data['reor_imagen'];
		$reor_enlace = $data['reor_enlace'];
		$reor_color_fondo = $data['reor_color_fondo'];
		$reor_vermas = $data['reor_vermas'];
		$fecha = $data['fecha'];
		$reor_arch = $data['reor_arch'];
		$reor_arch_nom = $data['reor_arch_nom'];
		$reor_desc = $data['reor_desc'];
		$query = "UPDATE reorganizacion SET  estado = '$estado', reor_titulo = '$reor_titulo', reor_imagen = '$reor_imagen', reor_enlace = '$reor_enlace', reor_color_fondo = '$reor_color_fondo', reor_vermas = '$reor_vermas', fecha = '$fecha', reor_arch = '$reor_arch', reor_arch_nom = '$reor_arch_nom', reor_desc = '$reor_desc' WHERE reor_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}