const navSlide=()=> {
    
    const burger=document.querySelector('.burger');
    const nav=document.querySelector('.nav-items');
    
    burger.addEventListener('click',()=>{
        
        nav.classList.toggle('burger-active');
        
    });
    
}
const app=()=>{
    
    navSlide();
    
}
app();
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}