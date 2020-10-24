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