function showHome() {
    document.getElementById('carouselExampleDark').style.display = 'block';
    document.getElementById('aboutsection').style.display = 'none';
    document.getElementById('menu').style.display = 'none';
    document.getElementById('reviews').style.display = 'none';
    document.getElementById('Contact').style.display = 'none';
    document.getElementById('gallery').style.display = 'none';
    
}

function showAbout() {
    document.getElementById('carouselExampleDark').style.display = 'none';
    document.getElementById('aboutsection').style.display = 'block';
    document.getElementById('menu').style.display = 'none';
    document.getElementById('reviews').style.display = 'none';
    document.getElementById('Contact').style.display = 'none';
    document.getElementById('gallery').style.display = 'none';
}

function showMenu() {
    document.getElementById('carouselExampleDark').style.display = 'none';
    document.getElementById('aboutsection').style.display = 'none';
    document.getElementById('menu').style.display = 'block';
    document.getElementById('reviews').style.display = 'none';
    document.getElementById('Contact').style.display = 'none';
    document.getElementById('gallery').style.display = 'none';
}
function showReviews(){
    document.getElementById('carouselExampleDark').style.display = 'none';
    document.getElementById('aboutsection').style.display = 'none';
    document.getElementById('menu').style.display = 'none';
    document.getElementById('reviews').style.display = 'block';
    document.getElementById('Contact').style.display = 'none';
    document.getElementById('gallery').style.display = 'none';
   
}
function showContact(){
    document.getElementById('carouselExampleDark').style.display = 'none';
    document.getElementById('aboutsection').style.display = 'none';
    document.getElementById('menu').style.display = 'none';
    document.getElementById('reviews').style.display = 'none';
    document.getElementById('Contact').style.display = 'block';
    document.getElementById('gallery').style.display = 'none';
  
}

function showBlogs(){
    document.getElementById('carouselExampleDark').style.display = 'none';
    document.getElementById('aboutsection').style.display = 'none';
    document.getElementById('menu').style.display = 'none';
    document.getElementById('reviews').style.display = 'none';
    document.getElementById('Contact').style.display = 'none';
    document.getElementById('gallery').style.display = 'block';
  
}





















const menuBtns = document.querySelectorAll('.menu-btn');
const foodItems = document.querySelectorAll('.food-item');

let activeBtn = "featured";

showFoodMenu(activeBtn);

menuBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        resetActiveBtn();
        showFoodMenu(btn.id);
        btn.classList.add('active-btn');
    });
});

function resetActiveBtn(){
    menuBtns.forEach((btn) => {
        btn.classList.remove('active-btn');
    });
}

function showFoodMenu(newMenuBtn){
    activeBtn = newMenuBtn;
    foodItems.forEach((item) => {
        if(item.classList.contains(activeBtn)){
            item.style.display = "grid";
        } else {
            item.style.display = "none";
        }
    });
}




// This adds some nice ellipsis to the description:
