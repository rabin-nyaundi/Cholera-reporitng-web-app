const showMenu = (toggleBtn, navBar) => {
    
    const toggle = document.getElementById(toggleBtn),
        nav = document.getElementById(navBar)
    
    console.log('am here', nav, toggle);

    if(toggle && nav){
        toggle.addEventListener('click', () => {
            console.log('I am clicked');
            nav.classList.toggle('show-nav')
        })
    }
}
showMenu('tog-div','nav-collapse');

const showModalAlert = (modal, btn, createBtn, span, cancel) => {
    const mymodal = document.getElementById(modal),
        btnShowAlert = document.getElementById(btn),
        btnCreateAlert = document.getElementById(createBtn),
        closeBtn = document.getElementById(span);
        // cancelbtn = document.getElementById(cancel);

        console.log("Am at the show modal", closeBtn);

    if (mymodal && btnShowAlert && closeBtn && btnCreateAlert) {
        btnShowAlert.addEventListener('click', () => {
            console.log('Yessssssssssss', closeBtn);
            mymodal.style.display = "block";
        });

        closeBtn.addEventListener('click', () => {
            console.log('Close btn');
            mymodal.style.display = "none";
        });

        btnCreateAlert.addEventListener('click', () => {
            mymodal.style.display = "block";
        });
    }
}

showModalAlert('rep_modal', 'btnCreate','btn_Create', 'exit-modal', 'cancel');


// const showEditModal = (modal, btnShow, span) => {
//     const mymodal = document.getElementById(modal),
//         btnShowEdit = document.getElementById(btnShow),
//         closeBtn = document.getElementById(span);

//     console.log(mymodal, "Heeey edit modal");
    
//     if (mymodal && btnShowEdit && closeBtn) {
//         btnShowEdit.addEventListener('click', () => {
//             console.log("SYES");
//             mymodal.style.display = "block";
//         });

//         closeBtn.addEventListener('click', () => {
//             console.log("close this modal");
//             mymodal.style.display = "none";
//         })
//     }
// }

// showEditModal('alert_modal', 'btnEdit', 'exit-modal');