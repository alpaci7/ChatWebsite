var menu = document.querySelector(".menu");
var onlineFriend = document.querySelector(".online-friend");
var darkButton = document.getElementById("dark-button");
var message = document.querySelector(".messages-field");
var notification = document.querySelector(".notifications-field");
function menuToggle(){
    menu.classList.toggle("menu-show");
    onlineFriend.classList.toggle("online-friend-zindex");
}

darkButton.onclick = function(){
    darkButton.classList.toggle("dark-button-on");
    document.body.classList.toggle("dark-theme");
    if(localStorage.getItem("theme") == "light"){
        localStorage.setItem("theme","dark");
    }
    else{
        localStorage.setItem("theme","light");
    }
}

if(localStorage.getItem("theme") == "light"){
    darkButton.classList.remove("dark-button-on");
    document.body.classList.remove("dark-theme");
}
else if(localStorage.getItem("theme") == "dark"){
    darkButton.classList.add("dark-button-on");
    document.body.classList.add("dark-theme");
}
else{
    localStorage.setItem("theme" , "light") ;
}

function messageToggle(){
    message.classList.toggle("messages-field-show");
}

function notificationToggle(){
    notification.classList.toggle("notifications-field-show");
}