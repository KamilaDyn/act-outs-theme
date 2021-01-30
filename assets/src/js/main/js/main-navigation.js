/*------------------------------------------------
               MAIN NAVIGATION
    ------------------------------------------------*/
(function () {

    const subMenu = document.querySelectorAll('.main-navigation .nav-menu .menu-item-has-children');
    const button = document.createElement('button')
    button.classList.add('dropdown-toggle')
    const icon = document.createElement('i');
    icon.classList.add('fa');
    icon.classList.add('fa-angle-down')
    button.appendChild(icon);

    for (let i = 0; i < subMenu.length; i++) {
        subMenu[i].appendChild(button.cloneNode(true))
    }
    const dropButton = document.querySelectorAll('button.dropdown-toggle');


    dropButton.forEach(i => i.addEventListener(
        "click",
        e => {
            e.currentTarget.classList.toggle('active');
          const fadein=  e.currentTarget.closest('.menu-item').querySelector('ul').classList.toggle('fadein')
          document.querySelectorAll('.fadein li')
        const liEl=    e.currentTarget.closest('.menu-item').querySelector('ul').querySelectorAll('li')

        setTimeout((e)=>{

 
                for(let i=0; i<liEl.length; i++){
        
                    liEl[i].classList.toggle('fadeoutli');
                 }
               
        }, 10)
            e.currentTarget.querySelector('.fa-angle-down').classList.toggle('rotate')

            let height = e.target.offsetHeight;


        }))

}())