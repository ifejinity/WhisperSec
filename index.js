window.addEventListener("load", function(){
    if(localStorage.form === "sigin" || localStorage.form == null){
        
    }
    else{
        
    }
});

const siginBtn = document.querySelector("#signinButton");
const sigupBtn = document.querySelector("#signupButton");
const signinForm = document.querySelector("#signinForm");
const signupForm = document.querySelector("#signupForm");

siginBtn.addEventListener("click", signinFormShow);
function signinFormShow(){
    localStorage.form = "signin";
    signupForm.style.display = "none";
    signinForm.style.display = "flex";
    siginBtn.classList = '';
    sigupBtn.classList = '';
    siginBtn.classList.add("btn-active");
    sigupBtn.classList.add("btn-inactive");
};

sigupBtn.addEventListener("click", signupFormShow)
function signupFormShow(){
    localStorage.form = "signup";
    signinForm.style.display = "none";
    signupForm.style.display = "flex";
    sigupBtn.classList = '';
    siginBtn.classList = '';
    sigupBtn.classList.add("btn-active");
    siginBtn.classList.add("btn-inactive");
};

// saving form
window.addEventListener("load", function(){
    if(localStorage.form == "signin" || localStorage.form == null){
        signinFormShow();
    }
    else{
        signupFormShow();
    }
});