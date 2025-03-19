const cardsDiv=document.querySelector('#lista-carrito tbody');
const agregar=document.querySelectorAll('.agregar-carrito');
const vaciar=document.querySelector('#vaciar-carrito');
let cantidad=0;
let i=0;
let bandera=0;
var idarticulo=[];
var idcantidad=[];
var precio=""
var articulo="";
var imagen="";

agregar.forEach(function(item, idx) {
  item.addEventListener('click',e=>{

      const tarjeta=e.target.parentElement.parentElement;
      precio=tarjeta.querySelector('.precio').textContent;
      articulo=tarjeta.querySelector('.titulo').textContent;
      imagen=tarjeta.querySelector('.imagen-curso').src;
      
      cantidadP(precio,articulo,imagen,cantidad);
  
  });
});
vaciar.addEventListener('click',e=>{
  const remolista=document.querySelectorAll("tbody tr")
  const listatr=document.querySelector("tbody")
    for(let c=remolista.length; c>0;c--){
      c=c-1;
      const borrar=listatr.children[c]
      c=c+1;
      listatr.removeChild(borrar);
      idarticulo.pop();
      idcantidad.pop();;
    }
    i=0;
});

 function cantidadP(precio,articulo,imagen,cantidad){
 
   if(!idarticulo.length){
    cantidad+=1;
    AgregarProducto(precio,articulo,imagen,cantidad);
    idarticulo[i]=articulo;
    idcantidad[i]=cantidad;
    i+=1;
   }else{
    for(let t=0;t<idarticulo.length;t++){ 
      if(articulo==idarticulo[t]){
        const cantidadesTotales=document.querySelectorAll('#cant');
        
        let cantidad2=Number(idcantidad[t])
        
        cantidad=cantidad2+1;
        
        cantidadesTotales[t].textContent=cantidad;
        idcantidad[t]=cantidad;
        bandera=1;
        t=idarticulo.length
        
      }else{
        bandera=0;
      }
      
      }
    if(bandera==0){
      cantidad+=1;
      AgregarProducto(precio,articulo,imagen,cantidad);
      idarticulo[i]=articulo;
      idcantidad[i]=cantidad;
      i+=1;
    }
  }
 }
 
 function AgregarProducto(precio,articulo,imagen,cantidad){
  const lista=document.createElement("tr");
  lista.innerHTML=`
    <td>
      <img src='${imagen}' width=80>
    </td>
    <td>${articulo}</td>
    <td>${precio}</td>
    <td id="cant">${cantidad}</td>
    `;
    cardsDiv.appendChild(lista);
 }

 