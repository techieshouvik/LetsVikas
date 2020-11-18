stats = document.querySelector('.stats');
post = document.querySelector('.post');
upost = document.querySelector('.upost');
browse = document.querySelector('.browse');
set = document.querySelector('.set');
don = document.querySelector('.don');

stats.addEventListener('mouseover',function(){
    stats.classList.add('btn1-active');
});
stats.addEventListener('mouseout',function(){
    stats.classList.remove('btn1-active');
});


post.addEventListener('mouseover',function(){
    post.classList.add('btn1-active');
});
post.addEventListener('mouseout',function(){
    post.classList.remove('btn1-active');
});


upost.addEventListener('mouseover',function(){
    upost.classList.add('btn1-active');
});
upost.addEventListener('mouseout',function(){
    upost.classList.remove('btn1-active');
});


browse.addEventListener('mouseover',function(){
    browse.classList.add('btn1-active');
});
browse.addEventListener('mouseout',function(){
    browse.classList.remove('btn1-active');
});


set.addEventListener('mouseover',function(){
    set.classList.add('btn1-active');
});
set.addEventListener('mouseout',function(){
    set.classList.remove('btn1-active');
});


don.addEventListener('mouseover',function(){
    don.classList.add('btn1-active');
});
don.addEventListener('mouseout',function(){
    don.classList.remove('btn1-active');
});