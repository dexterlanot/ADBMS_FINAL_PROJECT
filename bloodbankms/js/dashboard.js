//hamburger toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');
let home = document.querySelector('.home');

toggle.onclick = function(){
    navigation.classList.toggle('active')
    main.classList.toggle('active')
    home.classList.toggle('active')
}
//nav hover
let list = document.querySelectorAll('.navigation li');
function activeLink(){
    list.forEach((item) =>
    item.classList.remove('hovered'))
    this.classList.add('hovered')
}
list.forEach((item) =>
item.addEventListener('mouseover', activeLink))
