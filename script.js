let urlcourante = document.location.href;
urlcourante = urlcourante.replace(/\/$/,"");
getURL = urlcourante.substring(urlcourante.lastIndexOf('/')+1);
getURL= getURL.replace(/\?.*$/,"");
console.log(getURL);

if (getURL === 'loginStore.php'){
    let log = document.querySelector('.log-pdv');
    let form = document.querySelector('.form-log-pdv');

    log.addEventListener('click',()=>{
        form.classList.toggle('active')
    })
};

if (getURL === 'store.php'){
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
};
if (getURL === 'fournisseur.php'){
    let btnFacture = document.querySelector('#voirFacture');
    let facture = document.querySelector('.img-fact');

    btnFacture.addEventListener('click', ()=>{
        facture.classList.toggle('active');
    });
}


