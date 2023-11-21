
let createAcc = document.querySelector('#select_create');
let loginAcc = document.querySelector('#select_login');
let inputs = document.getElementsByClassName('inputs');

let createAccountItems = {
    name: document.querySelector('#name_field'),
    password: document.querySelector('#password_create'),
    account: document.querySelector('#account_create')
}
let loginAccountItems = {
    password: document.querySelector('#password_login'),
    login: document.querySelector('#account_login')
}

for(let element of inputs){
    element.classList.add('hidden');
}

createAcc.addEventListener('click',() => {
    for(let element of inputs){
        element.classList.remove('hidden');
    }
    for(let prop in loginAccountItems){
        loginAccountItems[prop].classList.add('hidden');
    }
    for(let prop in createAccountItems){
        createAccountItems[prop].classList.remove('hidden')
    }
    loginAcc.classList.remove('active');
    createAcc.classList.add('active');
})
loginAcc.addEventListener('click',() => {
    for(let element of inputs){
        element.classList.remove('hidden');
    }
    for(let prop in loginAccountItems){
        loginAccountItems[prop].classList.remove('hidden');
    }
    for(let prop in createAccountItems){
        createAccountItems[prop].classList.add('hidden')
    }
    loginAcc.classList.add('active');
    createAcc.classList.remove('active');
})
