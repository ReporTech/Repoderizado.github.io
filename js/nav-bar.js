import { resaltaSiEstasEn } from "../lib/js/resaltaSiEstasEn.js"

export class NavBar extends HTMLElement {

 connectedCallback() {
  this.classList.add("md-navigation-bar")

  this.innerHTML = /* HTML */`
 <a ${resaltaSiEstasEn(["/index.html", "", "/"])} href="index.html">
    <span class="material-symbols-outlined">home</span>
    Inicio
   </a>

   <a ${resaltaSiEstasEn(["/cliente.html"])} href="cliente.html">
    <span class="material-symbols-outlined">user_attributes</span>
    Cliente
   </a>

   <a ${resaltaSiEstasEn(["/servidor.html"])}
     href="servidor.html">
    <span class="material-symbols-outlined">smb_share</span>
    Servidor
   </a>

   <a ${resaltaSiEstasEn(["/ayuda.html"])} href="ayuda.html">
    <span class="material-symbols-outlined">help</span>
    Ayuda
   </a>`

 }

}

customElements.define("nav-bar", NavBar)