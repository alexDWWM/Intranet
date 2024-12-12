//display or not form addStaff
let btnAddStaff = document.querySelector('#addStaff');
let addStaff = document.querySelector('.addStaff');

btnAddStaff.addEventListener('click', ()=>{
    addStaff.classList.toggle('active');
});

//display or not form deleteStaff
let btnDeleteStaff = document.querySelector('#deleteStaff');
let deleteStaff = document.querySelector('.deleteStaff');

btnDeleteStaff.addEventListener('click', ()=>{
    deleteStaff.classList.toggle('active');
});

