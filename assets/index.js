let snackbar = document.getElementById('snackbar');
let connexionButton = document.getElementById('connexion');
let adminButton = document.getElementById('admin-header');

//VAR FOR TO BE USED EVERYWHERE

//FUNCTION TO COMMIT A COMMENT
function onCommentSubmit() {
    let postData = new FormData();
    postData.append('note', document.querySelector('#note-selecter').value);
    postData.append('auteur', document.querySelector('#avis-post-name').value);
    postData.append('contenu', document.querySelector('#avis-post-content').value);
    if (postData[0] == '' || postData[1] == '' || postData[2] == '') {
        snackbar.textContent = "Veuillez remplir tous les champs, merci.";
        snackbarShow();
    }
    else {
        fetch('../functions/postComment.php', {
            method: 'POST',
            body: postData
        }).then(response => {
            if (response.status == 200) {
                document.querySelector('#note-selecter').value = "";
                document.querySelector('#avis-post-name').value = "";
                document.querySelector('#avis-post-content').value = "";
                snackbar.textContent = "Votre avis a été envoyé ! merci."
                snackbarShow();
                return false;
            }
            else {
                snackbar.textContent = "L'avis ne peut être envoyé, merci de contrôler les données entrées.";
                snackbarShow();
                return false;
            }
        })
        return false;
    }
    return false;
};

//SNACKBAR SHOW FUNCTION
function snackbarShow() {
    snackbar.classList.add("show")
    setTimeout(function () { snackbar.classList.remove("show"); }, 3000);
}

//CLICK ON LEFT ARROW INDEX
//WHERE @param a is the array and @param b is the initial picture index
function switchLeft(a, b) {

    const avisContainer = document.getElementById('avis-container');
    var stars = '';
    b--;
    if (b >= 0) {
        $(avisContainer).empty();
        avisContainer.insertAdjacentHTML('beforeend', ` 
            <div class="emoji-container">${getEmojiToReturn(a[b][4])}</div>
            <div class="avis-tilte">
                    <div>${a[b][1]}</div>
                    <div>${a[b][2]}</div>
                </div>
                <div class="avis-contenu">${a[b][3]}</div>
                <div class="avis-note">${starToShow(stars, a[b][4])} </div>`)
        return b;

    } else {
        b = a.length - 1;
        $(avisContainer).empty();
        avisContainer.insertAdjacentHTML('beforeend', `  
            <div class="emoji-container">${getEmojiToReturn(a[b][4])}</div>
            <div class="avis-tilte">
                    <div>${a[b][1]}</div>
                    <div>${a[b][2]}</div>
                </div>
                <div class="avis-contenu">${a[b][3]}</div>
                <div class="avis-note">${starToShow(stars, a[b][4])} </div>`)
        return b;
    }
}

//CLICK ON RIGHT ARROW
//WHERE @param a is the array and @param b is the initial picture index
function switchRight(a, b) {

    const avisContainer = document.getElementById('avis-container');
    var stars = '';
    b++;
    if (b <= a.length - 1) {
        $(avisContainer).empty();
        avisContainer.insertAdjacentHTML('beforeend', `  
            <div class="emoji-container">${getEmojiToReturn(a[b][4])}</div>
            <div class="avis-tilte">
                    <div>${a[b][1]}</div>
                    <div>${a[b][2]}</div>
                </div>
                <div class="avis-contenu">${a[b][3]}</div>
                <div class="avis-note">${starToShow(stars, a[b][4])} </div>`)
        return b;

    } else {
        b = 0;
        $(avisContainer).empty();
        avisContainer.insertAdjacentHTML('beforeend', `  
            <div class="emoji-container">${getEmojiToReturn(a[b][4])}</div>
            <div class="avis-tilte">
                    <div>${a[b][1]}</div>
                    <div>${a[b][2]}</div>
                </div>
                <div class="avis-contenu">${a[b][3]}</div>
                <div class="avis-note">${starToShow(stars, a[b][4])} </div>`)
        return b;
    }
}

//FUNCTION TO CREAT NEEDED STARS
//WHERE @param a the string to increment and @param b is the note
function starToShow(a, b) {
    for (let s = 0; s < 5; s++) {
        if (b > s) {
            a = a + '<i class="fa-solid fa-star"></i>';
        } else {
            a = a + '<i class="fa-regular fa-star"></i>';
        }
    }
    return a;
}

//FUNCTION TO GET EMOJI TYPE AND COLOR
//WHERE @param a is the note
function getEmojiToReturn(a) {
    if (a < 3) {
        b = '<i class="fa-solid fa-face-sad-tear red-emoji avis-emoji"></i>';
        return b;
    } else if (a === 3) {
        b = '<i class="fa-solid fa-face-meh orange-emoji avis-emoji"></i>';
        return b;
    } else if (a > 3) {
        b = '<i class="fa-solid fa-face-smile-wink green-emoji avis-emoji"></i>';
        return b;
    }

}

//FUNCTION TO SHOW LOGIN MODAL OR GO TO ADMIN PANEL IF TOKEN OK
var loginModalOpen = false;
function showLoginModal() {
    fetch('../functions/checkJWT.php', {
        method: 'POST'
    }).then((response) => response.json()).then((data) => {
        if (data == 1) {
            snackbar.textContent = "Déconnexion";
            snackbarShow();
            setTimeout(function () { eraseCookie() }, 600);

        }
        else {
            if (loginModalOpen === false) {
                $(function () {
                    $("#modal").load("../view/viewLoginModal.php");
                    disableScroll()
                    loginModalOpen = true;
                });
            }
            else {
                closeModal()
            }
        }
    }).catch((error) => { });
}


//FUNCTION TO CLOSE MODAL
function closeModal() {
    $("#modal").empty();
    loginModalOpen = false;
    enableScroll()
}


//FUNCTION TO DISABLE OR ENABLE BODY SCROLL
function disableScroll() {
    document.body.classList.
        add("stop-scrolling");
}
function enableScroll() {
    document.body.classList
        .remove("stop-scrolling");
}

//FUNCTION TO LOG PEOPLE
function onLoginSubmit() {
    let email = document.querySelector('#umail').value;
    let password = document.querySelector('#upassword').value;
    let postData = new FormData();
    postData.append('email', email);
    postData.append('password', password);
    if (email == '' || password === '') {
        snackbar.textContent = "Veuillez remplir tous les champs, merci.";
        snackbarShow();
    } else {
        fetch('../functions/postLogin.php', {
            method: 'POST',
            body: postData
        }).then(response => {
            if (response.status == 200) {
                snackbar.textContent = "Connecté!";
                snackbarShow();
                closeModal();
                setTimeout(function () { window.location = window.location.pathname + '?action=Accueil' }, 800);
            }
            else {
                snackbar.textContent = "Impossible de se connecter.";
                snackbarShow();
                return false;
            }
        })
        return false;
    }
}



//FUNCTION TO SEE IF INPUT CONTAINS ONLY NUMBER
function containsOnlyNumbers(str) {
    var valide = /^0[1-6]\d{8}$/;
    if (valide.test(str)) {
        return /^\d+$/.test(str)
    }
}

//FUNCTION TO VERIFY EMAIL VALUE FROM FRONTEND
function verifyEmail(str) {
    return str.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}

function postMail() {
    var contactName = document.querySelector('#cname').value;
    var contactSurname = document.querySelector('#csurname').value;
    var contactEmail = document.querySelector('#cmail').value;
    var contactPhone = document.querySelector('#cphone').value;
    var contactSubject = document.querySelector('#csujet').value;
    var contactMessage = document.querySelector('#cmsg').value;
    if (contactName == '' || contactSurname == '' || contactEmail == '' || contactPhone == '' || contactSubject == '' || contactMessage == '' || !containsOnlyNumbers(contactPhone) || !verifyEmail(contactEmail)) {
        snackbar.textContent = "Champs incomplés ou incompatible, merci.";
        snackbarShow();
        return false;
    }
    else {
        try {
            $.ajax({
                type: 'POST',
                url: '../functions/postEmail.php',
                data: {
                    name: contactName,
                    surname: contactSurname,
                    email: contactEmail,
                    phone: contactPhone,
                    subject: contactSubject,
                    message: contactMessage
                },
                success: function (response) {
                    snackbar.textContent = "Votre mail a été envoyé, merci.";
                    snackbarShow();
                    document.querySelector('#cname').value = '';
                    document.querySelector('#csurname').value = '';
                    document.querySelector('#cmail').value = '';
                    document.querySelector('#cphone').value = '';
                    document.querySelector('#csujet').value = '';
                    document.querySelector('#cmsg').value = '';

                }

            })
            return false;
        } catch (e) { return false }
    }
}

//FUNCTION TO ERASE THE COOKIE
function eraseCookie() {

    fetch('../functions/eraseToken.php', {
        method: 'GET'
    }).then((response) => {
        window.location = window.location.pathname + '?action=Accueil'
    })
}


//FONCTION TO CHANGE SLIDE
function onChangeSlider(fromslider, toslider, fromnumber, tonumber) {
    var fSlider = parseInt(document.getElementById(fromslider).value, 10);
    var tSlider = parseInt(document.getElementById(toslider).value, 10);
    if (fSlider > tSlider) {
        document.getElementById(toslider).value = fSlider + 1;
    }
    if (tSlider < fSlider) {
        document.getElementById(fromslider).value = tSlider - 1;
    }
    document.getElementById(fromnumber).textContent = fSlider + "";
    document.getElementById(tonumber).textContent = tSlider + "";
    filterCards()
}

//FUNCTION TO FILTER CARDS CARS
function filterCards() {
    var minprice = parseFloat(document.getElementById('frompriceslider').value);
    var maxprice = parseFloat(document.getElementById('topriceslider').value);
    var minkm = parseFloat(document.getElementById('fromkmslider').value);
    var maxkm = parseFloat(document.getElementById('tokmslider').value);
    var minyear = parseFloat(document.getElementById('fromyearslider').value);
    var maxyear = parseFloat(document.getElementById('toyearslider').value);
    let postData = new FormData();
    postData.append('miprice', minprice);
    postData.append('maprice', maxprice);
    postData.append('mikm', minkm);
    postData.append('makm', maxkm);
    postData.append('miyear', minyear);
    postData.append('mayear', maxyear);

    fetch('../controllers/controllerFilter.php', {
        method: 'POST',
        body: postData
    }).then((response) => response.json()).then((responseData) =>{
        listCardDom = '';
        let u = responseData
        if (responseData) {
            for (let key in u) {
                listCardDom += `  
        <div class="occasion-card">
        <div class="carbon-color header-occasion-card"></div>
        <div class="occasion-card-img-container">
            <img src="../assets/uploadedfile/${u[key]['CARSFORSALE_MAINIMAGE']}" alt="${u[key]['CARSFORSALE_TITLE']}" class="occasion-card-img">
            <div class="occasion-card-img-price">${u[key]['CARSFORSALE_PRICE']}€</div>
        </div>
        <div class="occasion-card-txt-container">
            <div class="occasion-card-title">${u[key]['CARSFORSALE_TITLE']}</div>
            <div class="occasion-card-desc">Année :${u[key]['CARSFORSALE_YEAR']}</div>
            <div class="occasion-card-desc">Moteur: ${u[key]['CARSFORSALE_ENERGY']}</div>
            <div class="occasion-card-desc">km : ${u[key]['CARSFORSALE_KILOMETER']}</div>
            <div class="occasion-card-desc">Prix : ${u[key]['CARSFORSALE_PRICE']}</div>
        </div>
        <div class="carbon-color header-occasion-card-bottom"></div>
        <a href="index.php?action=Vehicle&id=${u[key]['CARSFORSALE_ID']}" class="occasion-card-click" target="_blank"></a>
    </div>`}
            $(carsForSales).empty();
            carsForSales.insertAdjacentHTML('beforeend', listCardDom)
        } else { return false; }
    }
    )
}


//CLICK ON LEFT ARROW INDEX
function changePictureLeft(a, b) {
    const pictureContainer = document.getElementById('vehicle-image');

    b--;
    if (b >= 0) {

        pictureContainer.src = `../assets/uploadedfile/${a[b]}`;

        return b;

    } else {
        b = a.length - 1;
        pictureContainer.src = `../assets/uploadedfile/${a[b]}`;

        return b;
    }
}

//CLICK ON RIGHT ARROW
function changePictureRight(a, b) {
    const pictureContainer = document.getElementById('vehicle-image');
    b++;
    if (b <= a.length - 1) {
        pictureContainer.src = `../assets/uploadedfile/${a[b]}`;
        return b;

    } else {
        b = 0;
        pictureContainer.src = `../assets/uploadedfile/${a[b]}`;

        return b;
    }
}


