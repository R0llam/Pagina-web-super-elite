<?php 
function conexion(){
	$conex = mysqli_connect("localhost","root","","bd");
	return $conex;
}
function eliminar($conexion,$id){
	$sql="DELETE from empleo Where IDE=$id";
	$query = mysqli_query($conexion, $sql);
	return $query;

}
function datos($conexion, $id){
	$sql= "SELECT * FROM empleo Where IDE=$id";
	$query = mysqli_query($conexion, $sql);
	$datos= mysqli_fetch_assoc($query);
	return $datos;
}
function eliminar_C($conexion,$id){
	$sql="DELETE from contactanos Where IDC=$id";
	$query = mysqli_query($conexion, $sql);
	return $query;

}
function insertar_P($conexion,$ID,$Nombre,$Categoria_P,$Precio,$ArchivoBLOB,$Cantidad,$marca,$Descripcion){
	$Cantidad_R= 0;
	$sql="INSERT INTO productos (ID_P,NombreP,Categoria_P_ID,Precio,archivoBLOB,Cantidad_R,Cantidad,ID_Marca ,Descripcion_P) Values ('$ID', '$Nombre', '$Categoria_P', '$Precio','$ArchivoBLOB','$Cantidad_R','$Cantidad','$marca','$Descripcion')";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function insertar_P2($conexion,$ID,$Nombre,$Categoria_P,$Precio,$ArchivoBLOB,$Cantidad,$fecha_de_vencimiento,$marca,$Descripcion){
	$Cantidad_R= 0;
	$sql="INSERT INTO productos (ID_P,NombreP,Categoria_P_ID,Precio,archivoBLOB,Cantidad_R,Cantidad,Fecha_de_vencimiento_P,ID_Marca ,Descripcion_P) Values ('$ID', '$Nombre', '$Categoria_P', '$Precio','$ArchivoBLOB','$Cantidad_R','$Cantidad','$fecha_de_vencimiento','$marca','$Descripcion')";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function listar_productos2($conexion,$id){
	$sql="SELECT * FROM productos Where ID_P='$id'";
	$query=mysqli_query($conexion,$sql);
	return $query;
}
function eliminar2($conexion,$id){
	$sql="DELETE from productos Where ID_P='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;

}
function editar_producto1($conexion, $id, $Nombre, $Categoria_P,$Cantidad,$Precio,$marca,$Descripcion){
	$sql="UPDATE productos SET NombreP='$Nombre', Categoria_P_ID='$Categoria_P',Cantidad='$Cantidad' ,Precio='$Precio',ID_Marca='$marca' ,Descripcion_P='$Descripcion' WHERE ID_P='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function editar_producto2($conexion, $id, $Nombre,$Categoria_P,$Precio,$Cantidad,$ArchivoBLOB,$marca,$Descripcion){
	$sql="UPDATE productos SET NombreP='$Nombre', Categoria_P_ID='$Categoria_P',Cantidad='$Cantidad',Precio='$Precio', archivoBLOB='$ArchivoBLOB',ID_Marca='$marca' ,Descripcion_P='$Descripcion' WHERE ID_P='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function editar_producto3($conexion, $id, $Nombre,$Categoria_P,$Precio,$Cantidad,$ArchivoBLOB,$fecha_de_vencimiento,$marca,$Descripcion){
	$sql="UPDATE productos SET NombreP='$Nombre', Categoria_P_ID='$Categoria_P',Cantidad='$Cantidad',Precio='$Precio', archivoBLOB='$ArchivoBLOB', Fecha_de_vencimiento_P='$fecha_de_vencimiento',ID_Marca='$marca' ,Descripcion_P='$Descripcion' WHERE ID_P='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function editar_producto4($conexion, $id, $Nombre, $Categoria_P,$Cantidad,$Precio,$fecha_de_vencimiento,$marca,$Descripcion){
	$sql="UPDATE productos SET NombreP='$Nombre', Categoria_P_ID='$Categoria_P',Cantidad='$Cantidad' ,Precio='$Precio', Fecha_de_vencimiento_P='$fecha_de_vencimiento',ID_Marca='$marca' ,Descripcion_P='$Descripcion' WHERE ID_P='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function listar_precio($conexion){
	$sql="SELECT * FROM precio_b ORDER BY ID_PB DESC LIMIT 1";
	$query=mysqli_query($conexion,$sql);
	return $query;
}
function editar_precio($conexion,$Precio,$fecha){
	$id=1;
	$sql="INSERT INTO precio_b (Precio_B,Fecha_de_modificacion,ID) Values ('$Precio','$fecha','$id')";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function listar_precio_B($conexion,$Precio){
	$sql="SELECT * FROM precio_b ORDER BY ID_PB DESC LIMIT 1";
	$query=mysqli_query($conexion,$sql);
	$row = mysqli_fetch_assoc($query);
	$Precio_B= $row ['Precio_B'];
	$resultado=$Precio_B*$Precio;
	return $resultado;
}
function listar_U($conexion,$id){
	$sql="SELECT * FROM users Where ID='$id'";
	$query=mysqli_query($conexion,$sql);
	return $query;
}
function editar_U($conexion, $id, $Nombre, $Apellido, $Correo_Electronico, $usuario, $contrasena){
	$sql="UPDATE users SET Nombre='$Nombre', Apellido='$Apellido',Correo_Electronico='$Correo_Electronico', usuario='$usuario', contrasena='$contrasena' WHERE ID='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function listar_Precio_Dolar($conexion){
	$sql="SELECT * FROM precio_b";
	$query=mysqli_query($conexion,$sql);
	return $query;
}
function insertar_O($conexion,$ID,$Nombre,$Precio,$fecha,$fecha2,$ArchivoBLOB,$cantidad,$Descripcion){
	$CantidadO_R= 0;
	$sql="INSERT INTO oferta(ID_Oferta,Nombre_Oferta,Precio_Oferta,Fecha_Inicio_O,Fecha_Fin_O,Imagen_de_Oferta,CantidadO_R,Cantidad_O,Descripcion_O) Values ('$ID', '$Nombre', '$Precio','$fecha','$fecha2' , '$ArchivoBLOB','$CantidadO_R','$cantidad','$Descripcion')";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarO($conexion,$id){
	$sql="DELETE from oferta Where ID_Oferta='$id'";
	$query = mysqli_query($conexion, $sql);
	if ($query){
	$sql1="DELETE from oferta_producto Where ID_Oferta='$id'";
	$query1 = mysqli_query($conexion, $sql1);
	return $query1;
	}
	else{
		return $query;
	}

}
function listar_Ofertas2($conexion,$id){
	$sql="SELECT * FROM oferta Where ID_Oferta='$id'";
	$query=mysqli_query($conexion,$sql);
	return $query;
}
function editar_o1($conexion, $id, $Nombre, $Precio,$Cantidad,$fecha2,$Descripcion){
	$sql="UPDATE oferta SET Nombre_Oferta='$Nombre', Precio_Oferta='$Precio' , Cantidad_O='$Cantidad',Descripcion_O='$Descripcion',Fecha_Fin_O='$fecha2' WHERE ID_Oferta='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function editar_o2($conexion, $id, $Nombre,$Precio,$ArchivoBLOB,$Cantidad,$fecha2,$Descripcion){
	$sql="UPDATE oferta SET Nombre_Oferta='$Nombre',Precio_Oferta='$Precio', Imagen_de_Oferta='$ArchivoBLOB', Cantidad_O='$Cantidad',Descripcion_O='$Descripcion',Fecha_Fin_O='$fecha2' WHERE ID_Oferta='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarU($conexion,$id){
	$sql="DELETE from users Where ID='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;

}
function editar_Carrusel($conexion, $id, $Categoria, $Imagen){
	if ($Categoria=='Ofertas.php'){
		$Categoria2=0;
	}
	else{
		$Categoria2=$Categoria;
	}
	$sql1="SELECT * FROM carrusel WHERE ID_Carrusel='$id'";
	$query1=mysqli_query($conexion,$sql1);
	if($query1 -> num_rows >0){
	$sql="UPDATE carrusel SET Categoria_P_ID='$Categoria2',Imagen_Carrusel='$Imagen' WHERE ID_Carrusel='$id'";
	$query = mysqli_query($conexion, $sql);
	}
	else{
		$sql="INSERT INTO carrusel(ID_Carrusel,Categoria_P_ID,Imagen_Carrusel) Values ('$id', '$Categoria2', '$Imagen')";
		$query = mysqli_query($conexion, $sql);
	}
	return $query;
}
function eliminarR($conexion,$id){
	$sql="DELETE from pedido_cp Where Referencia='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarR2($conexion,$referencia){
	$sql2="SELECT * FROM producto_cp  WHERE Referencia='$referencia'";
	$query2 = mysqli_query($conexion, $sql2);
		while ($row = mysqli_fetch_assoc($query2)) {
			$ID= $row ['ID_P'];
			$Cantidad= $row ['Cantidad_Pedido'];
			$sql4="SELECT * FROM productos Where ID_P='$ID'";
            $query4= mysqli_query($conexion,$sql4);
            $row= mysqli_fetch_assoc($query4);
			$Cantidad2= $row['Cantidad'] + $Cantidad;
			$sql3="UPDATE productos SET Cantidad='$Cantidad2' WHERE ID_P='$ID'";
            $query3= mysqli_query($conexion, $sql3);
		}
	$sql="DELETE from producto_cp Where Referencia='$referencia'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarR3($conexion,$referencia){
	$sql2="SELECT * FROM oferta_cp  WHERE Referencia='$referencia'";
	$query2 = mysqli_query($conexion, $sql2);
		while ($row = mysqli_fetch_assoc($query2)) {
			$ID= $row ['ID_Oferta'];
			$Cantidad= $row ['Cantidad_Pedido_O'];
			$sql4="SELECT * FROM oferta Where ID_Oferta='$ID'";
            $query4= mysqli_query($conexion,$sql4);
            $row= mysqli_fetch_assoc($query4);
			$Cantidad2= $row['Cantidad_O'] + $Cantidad;
			$sql3="UPDATE oferta SET Cantidad_O='$Cantidad2' WHERE ID_Oferta='$ID'";
            $query3= mysqli_query($conexion, $sql3);
			$sql6="SELECT * FROM oferta_producto Where ID_Oferta='$ID'";
			$query6= mysqli_query($conexion, $sql6);
			while ($row6= mysqli_fetch_assoc($query6)) {
				$id6=$row6['ID_P'];
				$Cantidad6=$row6['Cantidad_PO'] * $Cantidad;
				$sql7="SELECT * FROM productos Where ID_P='$id6'";
				$query7= mysqli_query($conexion,$sql7);
				$row7= mysqli_fetch_assoc($query7);
				$Cantidad_R4=$row7['Cantidad'] + $Cantidad6;
				$sql8="UPDATE productos SET Cantidad='$Cantidad_R4' WHERE ID_P='$id6'";
				$query8= mysqli_query($conexion, $sql8);
			}
		}
	$sql="DELETE from oferta_cp Where Referencia='$referencia'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function EditarR($conexion, $id){
	$i='Completada';
	$fecha=date('Y-m-d');
	$fecha3='2000-1-1';
	$sql="UPDATE pedido_cp SET estado='$i',Fecha_R='$fecha',Fecha_RL='$fecha3' WHERE Referencia='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function listar_reservas2($conexion,$id){
	$sql="SELECT * FROM pedido_cp WHERE Referencia='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function listar_pedido($conexion,$referencia){
	$sql="SELECT * FROM producto_cp Where Referencia='$referencia'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function listar_pedido2($conexion,$referencia){
	$sql="SELECT * FROM oferta_cp Where Referencia='$referencia'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function insertar_Categoria($conexion,$Nombre,$ArchivoBLOB){
	$sql="INSERT INTO categoria_p(Categoria,Imagen_P) Values ('$Nombre','$ArchivoBLOB')";
	$query = mysqli_query($conexion,$sql);
	return $query;
}
function insertar_CuentaB($conexion,$Nombre,$archivo,$Descripcion){
	$sql="INSERT INTO cuenta_bancaria(Nombre_CB,Descripcion_CB,Imagen_CB) Values ('$Nombre','$Descripcion','$archivo')";
	$query = mysqli_query($conexion,$sql);
	return $query;
}
function listar_Categorias($conexion){
	$sql="SELECT * FROM categoria_p ";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function listar_Marcas($conexion){
	$sql="SELECT * FROM marca ";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarC($conexion,$id){
	$sql="DELETE from categoria_p Where Categoria_P_ID ='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarC2($conexion,$id){
	$sql="DELETE from productos Where Categoria_P_ID ='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarM($conexion,$id){
	$sql="DELETE from marca Where ID_Marca='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarSucursal($conexion,$id){
	$sql="DELETE from sucursal Where ID_sucursal='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarM2($conexion,$id){
	$sql="DELETE from productos Where ID_Marca='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function eliminarCuentaB($conexion,$id){
	$sql="DELETE from cuenta_bancaria Where ID_Cuenta_Bancaria='$id'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function insertar_Marca($conexion,$Nombre){
	$sql="INSERT INTO marca(Nombre_M) Values ('$Nombre')";
	$query = mysqli_query($conexion,$sql);
	return $query;
}
function insertar_Sucursal($conexion,$Nombre){
	$sql="INSERT INTO sucursal(Nombre_sucursal) Values ('$Nombre')";
	$query = mysqli_query($conexion,$sql);
	return $query;
}
function listar_Categorias2($conexion,$id){
	$sql="SELECT * FROM categoria_p Where Categoria_P_ID ='$id' ";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function Borrar($conexion,$fecha){
	$sql="DELETE from oferta Where 	Fecha_Fin_O='$fecha'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
function Borrar2($conexion,$fecha2){
	$sql="SELECT * FROM pedido_cp Where Fecha_RL='$fecha2'";
	$query = mysqli_query($conexion, $sql);
	return $query;
}
 ?>