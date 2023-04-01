/* -------------- NAV BAR -------------*/
hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function(){
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }

/*--------------ACORDEON-------------*/
const $acordeon = document.querySelectorAll('.carta')
for (let i=0; i<$acordeon.length; i++){
    $acordeon[i].addEventListener('click',function(){
        this.classList.toggle('active');
    })
}

/*---------SCROLL DE SECCION DE MENU ACTIVE LINK-------------*/
let section = document.querySelectorAll('section');
let navlinks = document.querySelectorAll('header nav ul li a');

window.onscroll = () =>{
    section.forEach(sec =>{
        let top =window.scrollY;
        let offset= sec.offsetTop -150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');
        if (top >= offset && top < offset + height){
            navlinks.forEach(links =>{
                links.classList.remove('active');
                document.querySelector('header nav ul li a[href*='+id+']').classList.add('active');
            })
        }
    })
}