const navSlide = () => {
    const burger = document.querySelector('.hamburger'),
        navList = document.querySelector('.nav-links'),
        line1 = document.querySelector('.line1'),
        line2 = document.querySelector('.line2'),
        line3 = document.querySelector('.line3');
    burger.addEventListener('click', () => {
        navList.classList.toggle('nav-active');
        burger.classList.toggle('center')
        line1.classList.toggle('rotate-left');
        line3.classList.toggle('rotate-right');
        line2.classList.toggle('hidden');
    })
}

navSlide();