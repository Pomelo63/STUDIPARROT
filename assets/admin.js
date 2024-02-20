
const adminMember = document.getElementById('admin-member');
const adminCalendar = document.getElementById('admin-calendar');
const adminCar = document.getElementById('admin-car');
const adminComment = document.getElementById('admin-comment');
const adminServices = document.getElementById('admin-services');
//FUNCTIONS THAT ADD THE TOOLTIP FOR ADMIN PANEL HELP
if (adminMember) {
    adminMember.addEventListener("mouseover", function () {
        let tooltip = document.createElement('div');
        tooltip.id = "tooltip";
        tooltip.textContent = "Gérer les comptes des membres";
        tooltip.style.left = adminMember.getBoundingClientRect().left - (50 / 2) + 'px';
        tooltip.style.top = adminMember.getBoundingClientRect().bottom + 15 + 'px';
        document.body.append(tooltip);
    });
    adminMember.addEventListener("mouseout", function () {
        let tooltip = document.getElementById('tooltip');
        tooltip.remove()
    });
}

if (adminCalendar) {
    adminCalendar.addEventListener("mouseover", function () {
        let tooltip = document.createElement('div');
        tooltip.id = "tooltip";
        tooltip.textContent = "Gérer les informations du garage";
        tooltip.style.left = adminCalendar.getBoundingClientRect().left - (50 / 2) + 'px';
        tooltip.style.top = adminCalendar.getBoundingClientRect().bottom + 15 + 'px';
        document.body.append(tooltip);
    });
    adminCalendar.addEventListener("mouseout", function () {
        let tooltip = document.getElementById('tooltip');
        tooltip.remove()
    });
}

adminCar.addEventListener("mouseover", function () {
    let tooltip = document.createElement('div');
    tooltip.id = "tooltip";
    tooltip.textContent = "Gérer les véhicules en occasion";
    tooltip.style.left = adminCar.getBoundingClientRect().left - (50 / 2) + 'px';
    tooltip.style.top = adminCar.getBoundingClientRect().bottom + 15 + 'px';
    document.body.append(tooltip);
});
adminCar.addEventListener("mouseout", function () {
    let tooltip = document.getElementById('tooltip');
    tooltip.remove()
});

adminComment.addEventListener("mouseover", function () {
    let tooltip = document.createElement('div');
    tooltip.id = "tooltip";
    tooltip.textContent = "Gérer les commentaires client";
    tooltip.style.left = adminComment.getBoundingClientRect().left - (50 / 2) + 'px';
    tooltip.style.top = adminComment.getBoundingClientRect().bottom + 15 + 'px';
    document.body.append(tooltip);
});
adminComment.addEventListener("mouseout", function () {
    let tooltip = document.getElementById('tooltip');
    tooltip.remove()
});

if (adminServices) {
    adminServices.addEventListener("mouseover", function () {
        let tooltip = document.createElement('div');
        tooltip.id = "tooltip";
        tooltip.textContent = "Gérer les prestations proposées par le garage";
        tooltip.style.left = adminServices.getBoundingClientRect().left - (50 / 2) + 'px';
        tooltip.style.top = adminServices.getBoundingClientRect().bottom + 15 + 'px';
        document.body.append(tooltip);
    });
    adminServices.addEventListener("mouseout", function () {
        let tooltip = document.getElementById('tooltip');
        tooltip.remove()
    });
}
//FUNCTION TO LOAD USER VIEW
function userView() {
    try {

        $(function () {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminMember.php");
        });

    } catch { return false; }

}

//FUNCTION TO LOAD INFORMATIONS VIEW
function informationView() {
    try {

        $(function () {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminInfo.php");
        });

    } catch { return false; }

}

//FUNCTION TO LOAD COMMENT VIEW
function commentView(){
    try {

        $(function () {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminComment.php");
        });

    } catch { return false; }
}
//FUNCTION TO LOAD SERVICE VIEW
function prestaView() {
    try {

        $(function () {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminService.php");
        });

    } catch { return false; }

}
//FUNCTION TO LOAD CAR VIEW
function carView() {
    try {

        $(function () {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminCar.php");
        });

    } catch { return false; }

}
//FUNCTION TO OPEN NEW USER MODAL
function newUserModal() {
    try {

        $(function () {
            $("#modal-admin").load("../view/viewNewUserModal.php");
            disableScroll();
        });

    } catch { return false; }

}
//FUNCTION TO OPEN COMMENT MODAL
function openNewCommentModal() {
    try {

        $(function () {
            $("#modal-admin").load("../view/viewNewCommentModal.php");
            disableScroll();
        });

    } catch { return false; }

}
//FUNCTION TO DELETE AN USER
function deleteUser(event) {
    id = event.id;
    const postData = new FormData();
    postData.append('id', id);
    fetch('../functions/deleteUser.php', {
        method: 'POST',
        body: postData
    }).then(response => {
        if (response.status === 200) {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminMember.php");
            snackbar.textContent = "Utilisateur supprimé";
            snackbarShow();
            return false;
        }
        else {
            snackbar.textContent = "L'utilisateur n'a pu être supprimé";
            snackbarShow();
            return false;
        }
    })
    return false;
}



//FUNCTION TO CLOSE THE MODAL
function closeAddUserModal() {
    const parent = document.getElementById('modal-admin')
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
    enableScroll()
}
//FUNCTION TO ADD A NEW USER PROFIL
function addUser() {
    userName = document.getElementById('user-name').value;
    userSurame = document.getElementById('user-surname').value;
    userEmail = document.getElementById('user-email').value;
    userPassword = document.getElementById('user-password').value;
    userFunction = document.getElementById('user-function').value;
    userRight = document.getElementById('user-right').value;
    if (userName == '' || userSurame == '' || userEmail == '' || userPassword == '' || userFunction == '' || userRight == '' || !verifyEmail(userEmail)) {
        snackbar.textContent = "Donnée non valide";
        snackbarShow();
        return false;
    } else {
        const postData = new FormData();
        postData.append('userName', userName);
        postData.append('userSurame', userSurame);
        postData.append('userEmail', userEmail);
        postData.append('userPassword', userPassword);
        postData.append('userFunction', userFunction);
        postData.append('userRight', userRight);
        fetch('../functions/addUser.php', {
            method: 'POST',
            body: postData
        }).then(response => {
            if (response.status === 200) {
                enableScroll()
                $("#modal-admin").empty()
                $("#admin-window-content").empty();
                $("#admin-window-content").load("../view/viewAdminMember.php");
                snackbar.textContent = "Utilisateur correctement ajouté";
                snackbarShow();
                return false;
            }
            else {
                snackbar.textContent = "Utilisateur n'a pas pu être ajouté";
                snackbarShow();
                return false;
            }
        }
        )
            .catch(error => {
                snackbar.textContent = "Utilisateur n'a pas pu être ajouté";
                snackbarShow();
                return false;
            })
        return false;

    }
}
//FUNCTION TO MODIFY GARAGE INFORMATIONS
function modifyInformation() {
    horaire = document.getElementById('garage-h').value;
    rue = document.getElementById('garage-r').value;
    cp = document.getElementById('garage-cp').value;
    ville = document.getElementById('garage-v').value;
    tel = document.getElementById('garage-ph').value;
    mail = document.getElementById('garage-e').value;
    if (horaire == '' || rue == '' || cp == '' || ville == '' || tel == '' || mail == '') {
        snackbar.textContent = "Veuillez remplir tous les champs";
        snackbarShow();
        return false;
    } else {
        const postData = new FormData();
        postData.append('horaire', horaire);
        postData.append('rue', rue);
        postData.append('cp', cp);
        postData.append('ville', ville);
        postData.append('tel', tel);
        postData.append('mail', mail);
        fetch('../functions/modifyInfo.php', {
            method: 'POST',
            body: postData
        }).then(response => {
            if (response.status === 200) {
                snackbar.textContent = "Informations modifées";
                snackbarShow();
                setTimeout(function () {window.location = window.location.pathname+'?action=Admin'}, 800);
                return false;
            }
            else {
                snackbar.textContent = "Les informations n'ont pas pu être modifées";
                snackbarShow();
                return false;
            }
        }
        )
            .catch(error => {
                snackbar.textContent = "Les informations n'ont pas pu être modifées";
                snackbarShow();
                return false;
            })
        return false;

    }
}

//FUNCTION TO ADD A SERVICE
function addService() {
    var category = document.getElementById('category').value;
    var sname = document.getElementById('service-name').value;
    if (category == '' || sname == '') {
        snackbar.textContent = "Veuillez remplir tous les champs";
        snackbarShow();
        return false;
    } else {
        const postData = new FormData();
        postData.append('category', category);
        postData.append('name', sname);
        fetch('../functions/addNewService.php', {
            method: 'POST',
            body: postData
        }).then(response => {
            if (response.status === 200) {
                $("#admin-window-content").empty();
                $("#admin-window-content").load("../view/viewAdminService.php");
                snackbar.textContent = "Le service est correctement ajouté";
                snackbarShow();
                return false;
            }
            else {
                snackbar.textContent = "Le service n'a pas pu être créé.";
                snackbarShow();
                return false;
            }
        }
        )
            .catch(error => {
                snackbar.textContent = "Le service n'a pas pu être créé.";
                snackbarShow();
                return false;
            })
        return false;
    }
}

//FUNCTION TO DELETE A SERVICE
function deleteService(event) {
    id = event.id;
    const postData = new FormData();
    postData.append('id', id);
    fetch('../functions/deleteService.php', {
        method: 'POST',
        body: postData
    }).then(response => {
        if (response.status === 200) {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminService.php");
            snackbar.textContent = "Service supprimé";
            snackbarShow();
            return false
        }
        else {
            snackbar.innerHTML = "Le service n'a pas pu être supprimé.";
            snackbarShow();
            return false
        }
    }
    )
        .catch(error => {
            snackbar.innerHTML = "Le service n'a pas pu être supprimé.";
            snackbarShow();
            return false
        })
    return false;
}
//FUNCTION TO DELETE A CAR
function deleteCar(event) {
    id = event.id;
    const postData = new FormData();
    postData.append('id', id);
    fetch('../functions/deleteCar.php', {
        method: 'POST',
        body: postData
    }).then(response => {
        if (response.status === 200) {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminCar.php");
            snackbar.textContent = "Véhicule supprimé de la base de donnée";
            snackbarShow();
            return false
        } else {
            snackbar.innerHTML = "Le véhicule n'a pas pu être supprimé.";
            snackbarShow();
            return false
        }
    }
    )
        .catch(error => {
            snackbar.innerHTML = "Le véhicule n'a pas pu être supprimé.";
            snackbarShow();
            return false
        })
    return false;
}

//SHOW ADD CAR MODAL
function newCarModal() {

    try {

        $(function () {
            $("#modal-admin").load("../view/viewNewCarModal.php");

        });

    } catch { return false; }

}

//FUNCTION TO CHARGE FILE VIEWER ON MODAL
function changeFile(event) {
    const inputFile = event

    if (validFileType(inputFile.files[0] === '')) {
    }
    else {
        if (inputFile.files[0].type === 'image/png' || inputFile.files[0].type === 'image/jpeg') {
            if (inputFile.files[0].size > 4000000) { alert('Photo trop volumineuse') }
            else {

                for (let i = 0; i < inputFile.files.length; i++) {
                    const imgUploaded = document.createElement('img');
                    imgUploaded.src = URL.createObjectURL(inputFile.files[i]);
                    imgUploaded.className = 'little-picture';
                    document.querySelector('.add-picture-box').appendChild(imgUploaded);
                    if (document.getElementById('pictureliste').value == "") {
                        document.getElementById('pictureliste').value = inputFile.files[i].name;
                    }
                    else {
                        document.getElementById('pictureliste').value += `;${inputFile.files[i].name}`;
                    }
                }
            }
        } else { alert('Format non accepté') }
    }
}
//FUNCTION TO CHECK IS FILE ARE VALID
function validFileType(file) {
    const fileTypes = [
        "image/jpeg",
        "image/png"
    ];
    return fileTypes.includes(file.type);
}
//FUNCTION TO ADD A NEW CAR
function addNewCar(event) {
    const form = event
    const formData = new FormData(form);
    const input = document.getElementById('carpicture');
    for (let i = 0; i < input.files.length; i++) {
        formData.append(`file${i}`, input.files[i])
    }
    console.log(formData);
    if (formData != "") {
        fetch('../functions/addNewCar.php', {
            method: 'POST',
            body: formData
        }).then((response) => response.json()).then((data) => {
            console.log(data);
            if (data == 'ok') {
                $("#modal-admin").empty()
                $("#admin-window-content").empty();
                $("#admin-window-content").load("../view/viewAdminCar.php");
                snackbar.textContent = "Véhicule à bien était ajouté";
                snackbarShow();
                enableScroll()
                return false
            }
            else if (data[0] == 'error_file_name'){
                snackbar.innerHTML = `le fichier ${data[1]} existe déja`;
                input.value = null;
                document.querySelector('.add-picture-box').innerHTML = "";
                snackbarShow();
                return false;
            }
            else if (data == 'sql_impossible'){
                snackbar.innerHTML = "Ajout impossible, veuillez réessayer plus tard.";
                snackbarShow();
                return false;
            }
            else if (data == 'input_error'){
                snackbar.innerHTML = "un des champs est mal remplit";
                snackbarShow();
                return false;
            }
            else {
                snackbar.innerHTML = "Le véhicule n'a pas pu être ajouté";
                snackbarShow();
                return false;
            }
        })
            .catch(error => {
                console.log(error);
                snackbar.innerHTML = "Le véhicule n'a pas pu être ajouté";
                snackbarShow();
            })
    } else {
        return false;
    }
    return false;
}
//FUNCTION TO DELETE COMMENT
function deleteComment(event) {
    id = event.parentNode.parentNode.id;
    const postData = new FormData();
    postData.append('id', id);
    fetch('../functions/deleteComment.php', {
        method: 'POST',
        body: postData
    }).then(response => {
        if (response.status === 200) {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminComment.php");
            snackbar.textContent = "Commentaire supprimé";
            snackbarShow();
            return false;
        }
        else {
            snackbar.textContent = "Impossible de supprimer ce commentaire";
            snackbarShow();
            return false;
        }
    })
    return false;
}
//FUNCTION TO PUT COMMENT TO ACTIF
function valideComment(event) {
    id = event.parentNode.parentNode.id;
    const postData = new FormData();
    postData.append('id', id);
    fetch('../functions/valideComment.php', {
        method: 'POST',
        body: postData
    }).then(response => {
        if (response.status === 200) {
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminComment.php");
            snackbar.textContent = "Commentaire accepté";
            snackbarShow();
            return false;
        }
        else {
            snackbar.textContent = "Impossible d'accepter ce commentaire";
            snackbarShow();
            return false;
        }
    })
    return false;
}

//FUNCTION TO ADD A COMMENT VIA ADMIN PANEL
function addNewCommentAdmin(event){
    const postData = new FormData();
    postData.append('auteur', document.getElementById('admin-comment_name').value)
    postData.append('contenu', document.getElementById('admin-comment_content').value)
    postData.append('note', document.getElementById('admin-comment-note').value)
    fetch('../functions/postComment.php', {
        method: 'POST',
        body: postData
    }).then(response => {
        if (response.status === 200) {
            enableScroll()
            $("#modal-admin").empty()
            $("#admin-window-content").empty();
            $("#admin-window-content").load("../view/viewAdminComment.php");
            snackbar.textContent = "Commentaire ajouté";
            snackbarShow();
            return false;
        }
        else {
            snackbar.textContent = "Impossible d'ajouter ce commentaire";
            snackbarShow();
            return false;
        }
    })
    return false;
}
