<?php session_start();
if(isset($_SESSION['carrito']) || isset($_POST['id'])){
    if(isset($_SESSION['carrito'])){
        $carrito_m=$_SESSION['carrito'];
        if(isset($_POST['id'])){
            $id=$_POST['id'];
            $Nombre=$_POST['Nombre'];
            $Precio=$_POST['Precio'];
            $Precio_B=$_POST['Precio_B'];
            $Cantidad=$_POST['Cantidad'];
            $Imagen=$_POST['Imagen'];
            $Tipo=$_POST['tipo'];
            $donde= -1;
            for($i=0;$i<=count($carrito_m)-1;$i ++){
                if($id==$carrito_m[$i]['ID']){
                    $donde= $i;
                }
             }
            if($donde != -1){
                $cuanto=$carrito_m[$donde]['Cantidad'] + $Cantidad;
                $carrito_m[$donde]=array("ID"=>$id,"Nombre"=>$Nombre,"Precio"=>$Precio,"Precio_B"=>$Precio_B,"Cantidad"=>$cuanto,"Imagen"=>$Imagen,"Tipo"=>$Tipo);
            }
            else{
                $carrito_m[]=array("ID"=>$id,"Nombre"=>$Nombre,"Precio"=>$Precio,"Precio_B"=>$Precio_B,"Cantidad"=>$Cantidad,"Imagen"=>$Imagen,"Tipo"=>$Tipo);
            }
        }
    }
    else{
        $id=$_POST['id'];
        $Nombre=$_POST['Nombre'];
        $Precio=$_POST['Precio'];
        $Precio_B=$_POST['Precio_B'];
        $Cantidad=$_POST['Cantidad'];
        $Imagen=$_POST['Imagen'];
        $Tipo=$_POST['tipo'];
        $carrito_m[]=array("ID"=>$id,"Nombre"=>$Nombre,"Precio"=>$Precio,"Precio_B"=>$Precio_B,"Cantidad"=>$Cantidad,"Imagen"=>$Imagen,"Tipo"=>$Tipo);
    }
    if($id === '' || $Nombre === '' || $Precio === '' || $Precio_B === '' || $Cantidad === '' || $Imagen === '' || $Tipo === ''){
        echo json_encode('mal');
    }else{
        echo json_encode('bien');
    }
    if(isset($_GET['Cantidad'])){
		$id2=$_GET['id2'];
		$cuantos=$_GET['Cantidad'];
		if($cuantos<1){
			$carrito_m[$id2]=NULL;
            header("location: ".$_SERVER['HTTP_REFERER']."");
		}
        else{
			$carrito_m[$id2]['Cantidad']=$cuantos;
            header("location: ".$_SERVER['HTTP_REFERER']."");
		}
	}
	if(isset($_GET['id3'])){
		$id3=$_GET['id3'];
		$carrito_m[$id3]=NULL;
        header("location: ".$_SERVER['HTTP_REFERER']."");
	}
    $_SESSION['carrito']=$carrito_m;
}
?>