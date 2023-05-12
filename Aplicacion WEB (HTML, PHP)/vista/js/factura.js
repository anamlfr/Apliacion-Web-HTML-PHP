//*******CAJAS DE TEXTO */
var cliente  = document.getElementById("txCliente");
var articulo = document.getElementById("txArticulo");
var precio   = document.getElementById("txPrecio");
var cantidad = document.getElementById("txCantidad");

/**BOTONES */
var btA = document.getElementById("btA");
var btE = document.getElementById("btE");
/**COLUMNAS DE LA TABLA */
var nombre = document.getElementById("cCliente");
var cSubT  = document.getElementById("cSubT");
var cIVA   = document.getElementById("cIVA");
var cTotal = document.getElementById("cTotal");

/**variables numericas */
const IVA    = 0.15;
var subTotal = 0;
var iva      = 0;
var total    = 0;
var sTotal   = document.getElementById("sTotal");

btE.addEventListener("click",()=>{
   var Tbl     = document.getElementById("tFactura");
   var tblBody = Tbl.getElementsByTagName("tbody")[0];
   tblBody.innerHTML="";
   nombre.innerHTML="";
   cIVA.innerHTML="";
   cSubT.innerHTML="";
   cTotal.innerHTML="";
   cliente.value="";
   articulo.value="";
   precio.value="";
   cantidad.value="";
   sTotal.value="";
   subTotal=0;
   iva=0;
   total=0;
   cliente.focus();

});

btA.addEventListener("click",()=>{
   if(vacio(cliente)){
       alert("el nombre del cliente no debe estar vacio".toUpperCase());
       cliente.focus();
   }else if(vacio(articulo)){
    alert("el nombre del articulo no debe estar vacio".toUpperCase());
    articulo.focus();
   }else if(vacio(precio)){
    alert("el nombre del precio no debe estar vacio".toUpperCase());
    precio.focus();
   }else if(vacio(cantidad)){
    alert("el nombre del cantidad no debe estar vacio".toUpperCase());
    cantidad.focus();
   }else{
       nombre.innerHTML= "<b>" + cliente.value.toUpperCase() + "</b>";
       var Tbl     = document.getElementById("tFactura");
       var tblBody = Tbl.getElementsByTagName("tbody")[0];
       var hilera  = document.createElement("tr"); 
       
       var datos = [articulo.value,cantidad.value,
         parseFloat(precio.value).toFixed(2),
         parseFloat(cantidad.value*precio.value).toFixed(2)];
       
      for(i=0;i<datos.length;i++){ 
       var c1 = document.createElement("td");
       if(i>0)
         c1.setAttribute("style","text-align:center");
      
       c1.innerHTML=datos[i];
       hilera.appendChild(c1);
      }//for i
       tblBody.appendChild(hilera);
       Tbl.appendChild(tblBody);
       subTotal += (parseFloat(precio.value) * 
                    parseFloat(cantidad.value));
       subTotal = subTotal.toFixed(2);
       sTotal.value = subTotal; 
       cSubT.innerHTML="<b>" + sTotal.value + "</b>";
       iva = subTotal * IVA;
       iva = iva.toFixed(2);
       total = parseFloat(subTotal) + parseFloat(iva);
       total = total.toFixed(2);
       cIVA.innerHTML="<b>"+iva+"</b>";
       cTotal.innerHTML="<b>"+total+"</b>";
       articulo.value="";
       precio.value="";
       cantidad.value="";
       articulo.focus();
   }//ELSE

});//btA




function vacio(caja){
    if(caja.value=='' || caja.length==0)
      return true;
    else
       return false;
}



function soloLetras(e){
    var codigo = (e.which) ? e.which : e.keyCode;
    console.log(codigo);
    if((codigo==32) ||(codigo==241)|| (codigo==209) ||(codigo >= 97 && codigo <=122) || (codigo>=65 && codigo<=90))
       return true;
    else
      return false;
}//soloLetras

function soloNumero(e){
    var codigo = (e.which) ? e.which : e.keyCode;
    console.log(codigo);
    if(codigo==8 || codigo==46)
       return true;
    else if(codigo >= 48 && codigo <= 57)
            return true;
         else
            return false;
}//soloNumero
window.addEventListener("load",()=>{

      document.cookie.split(";").forEach(function(c) {
        document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
      });
    
})