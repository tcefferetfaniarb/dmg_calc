const selectioneurd = document.getElementById('selectioneurd');
const selectioneurg = document.getElementById('selectioneurg');
const stuffer       = document.getElementById('stuffer');
const primarme      = document.getElementById('caseprimarme');
const armor         = document.getElementById('casearmor');
const helmet        = document.getElementById('casehelmet');
const sndarme       = document.getElementById('casesndarme');
const boot          = document.getElementById('caseboot');
const fleches       = document.getElementById('casearrow');
const corps         = document.getElementById('corps');
const selectiong    = document.getElementById('selectioneurg');
const selectiond    = document.getElementById('selectioneurd');
const dmgdp         = document.getElementById('msg');
const casebackpack  = document.getElementById('casebackpack');
const extend        = document.getElementById('extend');
const ennemy        = document.getElementById('currentennemy');
const displayennemy = document.getElementById('displayennemy')
const opt           = document.getElementById('currentennemy');
const selel         = document.getElementById('selennemy');
const stat          = document.getElementById('real-stat');
const selfor        = document.getElementById('selfor');
const selprima      = document.getElementById('selprima');
const primasel      = document.getElementById('selweapon');
const selsecond     = document.getElementById('selfsecond');
const secondsel     = document.getElementById('selsecond');
const selhelmet     = document.getElementById('selfhelmet');
const helmetsel     = document.getElementById('selhelmet');
const selarrow      = document.getElementById('selfarrow');
const arrowsel      = document.getElementById('selarrow');
const selbody       = document.getElementById('selfbody');
const bodysel       = document.getElementById('selbody');
const selbackpack   = document.getElementById('selfbackpack');
const backpacksel   = document.getElementById('selbackpack');
const selboot       = document.getElementById('selfboot');
const bootsel       = document.getElementById('selboot');


$(document).ready(function() {
    $('selweapon').select2();
});


//Ennemy
selel.addEventListener('input', dispennemy);
selel.addEventListener('input', transfer);

//Main Weapon
primasel.addEventListener('input', transfer);
primasel.addEventListener('input', disprima);

//Left-Hand Weapon
secondsel.addEventListener('input', transfer);
secondsel.addEventListener('input', dispsecond);

//helmet
helmetsel.addEventListener('input', transfer);
helmetsel.addEventListener('input', disphelmet);

//arrow
arrowsel.addEventListener('input', transfer);
arrowsel.addEventListener('input', disparrow);

//body
bodysel.addEventListener('input', transfer);
bodysel.addEventListener('input', dispbody);

//boot
bootsel.addEventListener('input', transfer);
bootsel.addEventListener('input', dispboot);

//backpack
backpacksel.addEventListener('input', transfer);
backpacksel.addEventListener('input', dispbackpack);



/*display their selector*/
primarme.addEventListener('click', selprimadisplay);
sndarme.addEventListener('click', selseconddisplay);
fleches.addEventListener('click', selarrowdisplay);
helmet.addEventListener('click', selhelmetdisplay);
armor.addEventListener('click', selbodydisplay);
casebackpack.addEventListener('click', selbackpackdisplay);
boot.addEventListener('click', selbootdisplay);
/*                \ /               */
/*                 V                */

//------
function selprimadisplay(e){
    if(e.target !== e.currentTarget){
        console.log('clicking on the child');
    }else{
        console.log('primapris');
        if (selprima.style.display==='block'){
            console.log('block');
        }
        if(selprima.style.display==='none' || selprima.style.display===''){
            console.log('pas-block');
            selprima.style.display='block';
        }
    }
}

//------
function selseconddisplay(e){
    if(e.target !== e.currentTarget){
        console.log('clicking on the child');
    }else{
        console.log('secondpris');
        secondsel.style.display='block';
    }
}

//------
function selhelmetdisplay(e){
    if(e.target !== e.currentTarget){
        console.log('clicking on the child');
    }else{
        console.log('helmetpris');
        helmetsel.style.display='block';
    }
}

//------
function selbodydisplay(e){
    if(e.target !== e.currentTarget){
        console.log('clicking on the child');
    }else{
        console.log('bodypris');
        bodysel.style.display='block';
    }
}

//------
function selarrowdisplay(e){
    if(e.target !== e.currentTarget){
        console.log('clicking on the child');
    }else{
        console.log('arrowpris');
        arrowsel.style.display='block';
    }
}

//------
function selbackpackdisplay(e){
    if(e.target !== e.currentTarget){
        console.log('clicking on the child');
    }else{
        console.log('backpackpris');
        backpacksel.style.display='block';
    }
}

//------
function selbootdisplay(e){
    if(e.target !== e.currentTarget){
        console.log('clicking on the child');
    }else{
        console.log('bootpris');
        bootsel.style.display='block';
    }
}

//--//--//--//
function backsel(evt){
    opt.style.backgroundColor = "#9a69be"
    opt.style.color = "black"
}

//++//++//++//
//the other side
extend.addEventListener("click", side2)
function side2(){
    if (stuffer.style.display==='block'){
        stuffer.style.display="none";
    }else{
        stuffer.style.display="block";
    }
}

/*DATA TRANSFER*/

function transfer(){
    const param = new FormData(selfor);
    param.append('id_weapon', selprima.id_weapon.value);
    param.append('id_second', selsecond.id_second.value);
    param.append('id_helmet', selhelmet.id_helmet.value);
    param.append('id_arrow', selarrow.id_arrow.value);
    param.append('id_body', selbody.id_body.value);
    param.append('id_backpack', selbackpack.id_backpack.value);
    param.append('id_boot', selboot.id_boot.value);

    /* On prépare la requête AJAX : URL, méthode et paramètres */
    const requete = fetch('action.php', {
        method: 'POST',
        body: param
    });
    selprima.style.display   ='none';
    secondsel.style.display  ='none';
    helmetsel.style.display  ='none';
    arrowsel.style.display   ='none';
    bodysel.style.display    ='none';
    backpacksel.style.display='none';
    bootsel.style.display    ='none';


    /* On lance la requête AJAX grâce à fetch */
    requete.then(traiterReponse).then(traiterstat).catch(traiterErreur);
    /* On lance la requête AJAX grâce à fetch */
}

//Display their pic
//       V

//Ennemy
function dispennemy(evt) {
    evt.preventDefault();
    var imgopt=selel.value;
    displayennemy.innerHTML='<img class="imgennemy" src="./ressource/ennemy/'+imgopt+'.webp" alt="">';
}

//Main Weapon
function disprima(evt) {
    evt.preventDefault();
    var weapimg=primasel.value;
    primarme.style.backgroundImage='url(./ressource/casestuff/primary_weapon/'+weapimg+'.png)';
}

//Left-Hand Weapon
function dispsecond(evt) {
    evt.preventDefault();
    var weap2img=secondsel.value;
    sndarme.style.backgroundImage='url(./ressource/casestuff/secondary_weapon/'+weap2img+'.png)';
}

//Arrow Weapon
function disparrow(evt) {
    evt.preventDefault();
    var arrowimg=arrowsel.value;
    fleches.style.backgroundImage='url(./ressource/casestuff/ammo/'+arrowimg+'.png)';
}

//helmet
function disphelmet(evt) {
    evt.preventDefault();
    var helmetimg=helmetsel.value;
    helmet.style.backgroundImage='url(./ressource/casestuff/helmet/'+helmetimg+'.png)';
}

//Body armor
function dispbody(evt) {
    evt.preventDefault();
    var bodyimg=bodysel.value;
    armor.style.backgroundImage='url(./ressource/casestuff/body/'+bodyimg+'.png)';
}

//Back pack
function dispbackpack(evt) {
    evt.preventDefault();
    var backpackimg=backpacksel.value;
    casebackpack.style.backgroundImage='url(./ressource/casestuff/backpack/'+backpackimg+'.png)';
}

//boot
function dispboot(evt) {
    evt.preventDefault();
    var bootimg=bootsel.value;
    boot.style.backgroundImage='url(./ressource/casestuff/boot/'+bootimg+'.png)';
}

//++++++++++++++++++++


/* Cette fonction traite la réponse du serveur */
function traiterReponse(reponse) {
    return reponse.json();
    //return reponse.text();
}

/* Cette fonction traite le texte reçu dans la réponse du serveur */
function traiterstat(ret) {
    //alert(ret);
    stat.innerHTML=ret["stat"];
    dmgdp.textContent = ret["resultat"];
}
function traiterprimarme(ret) {
    console.log(ret);
}

/* Cette fonction traite les cas d'erreur */
function traiterErreur(texte) {
    dmgdp.textContent = texte;
}


/*-----------------------*/

/*----------------------*/