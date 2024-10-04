function Enter (field, event, blanco, tipo) 
{
var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
tecla = (document.all) ? event.keyCode : event.which;
if (blanco=="SI") 
{
if(tecla==32) return false;
}

if (tipo=="LET") 
{
if (tecla==8) return true; 
patron =/[A-Za-zñÑáÁéÉíÍóÓúÚ\s]/; 
te = String.fromCharCode(tecla); 
return patron.test(te); 

}
if (tipo=="LET-NUM") 
    {
    if (tecla==8) return true; 
    patron =/[A-Za-zñÑáÁéÉíÍóÓúÚ 0-9 () . \s]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
    
    }

if (tipo=="NUM") 
{
if (tecla==8) return true; 
patron =/[0-9 \s]/; 
te = String.fromCharCode(tecla); 
return patron.test(te); 

}   
if (tipo=="NUM2") 
    {
    if (tecla==8) return true; 
    patron =/[0-9 . \s]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
    
}
if (tipo=="NUM3") 
    {
    if (tecla==8) return true; 
    patron =/[0-9 -. \s]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
    
}

if (keyCode == 13) 
{
var i;
  
for (i = 0; i < field.form.elements.length; i++)
  
if (field == field.form.elements[i])
break;
i = (i + 1) % field.form.elements.length;
field.form.elements[i].focus();
return false;
} 

}

function ventana(){
    window.open("Reporte_Inventario2.php","v","location=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,status=yes");

}
function ventana2(){
    window.open("Reporte_Inventario3.php","v","location=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,status=yes");

}
function ventana3(){
    window.open("Reporte_Inventario4.php","v","location=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,status=yes");

}
function ventana4(){
    window.open("Reporte_Inventario5.php","v","location=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,status=yes");

}
function ventana5(){
    window.open("Reporte_Inventario6.php","v","location=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,status=yes");

}