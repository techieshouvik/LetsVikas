const navSlide=()=> { //Mobile View Navigation Code
    
    const burger=document.querySelector('.burger');
    const nav=document.querySelector('.nav-items');
    
    burger.addEventListener('click',()=>{
        
        nav.classList.toggle('burger-active');
        
    });
    
}

const faq=()=>{  //FAQ code
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
}

const app=()=>{ //Main function
    
    navSlide();
    faq();
    
}
app();