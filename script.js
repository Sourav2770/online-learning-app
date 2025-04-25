let body = document.body;

let profile = document.querySelector('.header .flex .profile');
let search1 = document.querySelector('.header .flex .search-form');
let sidebar = document.querySelector('.side-bar');



// Ensure the sidebar is closed when the page is refreshed



document.querySelector('#user-btn').onclick = () => {
    profile.classList.toggle('active');
    search1.classList.remove('active');
};

document.querySelector('#search-btn').onclick = () => {
    search1.classList.toggle('active');
    profile.classList.remove('active');
};

document.querySelector('#menu-btn').onclick = () => {
    sidebar.classList.toggle('active');
    body.classList.toggle('active');
};

document.querySelector('#close').onclick = () => {
    sidebar.classList.remove('active');
    body.classList.remove('active');
};

// to remove side bar when opening the webpage 
//but now its better



window.onscroll = () => {
    profile.classList.remove('active');
    search1.classList.remove('active');

    // Only remove 'active' class from sidebar and body if the window width is less than 1200px
    if (window.innerWidth >= 2000) {
        sidebar.classList.remove('active');
        body.classList.remove('active');
    }
    
    if (window.innerWidth <= 1200) {
        sidebar.classList.remove('active');
        body.classList.remove('active');
    }

   

};



function darkmodeon(){
    var element = document.body;
    element.classList.toggle("dark-mode");

    const button= document.querySelector('#toggle-btn');

}




