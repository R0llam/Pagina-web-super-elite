<?php 
session_start();
if(isset($_SESSION['OfertaP']) || isset($_POST['id'])){
    if(isset($_SESSION['OfertaP'])){
        $Oferta_P=$_SESSION['OfertaP'];
        if(isset($_POST['id'])){
            $id=$_POST['id'];
            $Cantidad_OP=$_POST['Cantidad_OP'];
            $donde= -1;
            for($i=0;$i<=count($Oferta_P)-1;$i ++){
                if($id==$Oferta_P[$i]['ID']){
                    $donde= $i;
                }
             }
            if($donde != -1){
                $cuanto=$Oferta_P[$donde]['Cantidad_OP'] + $Cantidad_OP;
                $Oferta_P[$donde]=array("ID"=>$id,"Cantidad_OP"=>$cuanto);
            }
            else{
                $Oferta_P[]=array("ID"=>$id,"Cantidad_OP"=>$Cantidad_OP);
            }
        }
    }
    else{
        $id=$_POST['id'];
        $Cantidad_OP=$_POST['Cantidad_OP'];
        $Oferta_P[]=array("ID"=>$id,"Cantidad_OP"=>$Cantidad_OP);
    }
    if(isset($_GET['Cantidad'])){
		$id2=$_GET['id2'];
		$cuantos=$_GET['Cantidad'];
		if($cuantos<1){
			$Oferta_P[$id2]=NULL;
		}
        else{
			$Oferta_P[$id2]['Cantidad_OP']=$cuantos;


		}
	}
	if(isset($_POST['id3'])){
		$id3=$_POST['id3'];
		$Oferta_P[$id3]=NULL;
	}
    $_SESSION['OfertaP']=$Oferta_P;
}
header("location: ".$_SERVER['HTTP_REFERER']."")
?>