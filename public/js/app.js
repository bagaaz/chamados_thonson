function togglePasswordView() {
    let buttonShowPassword = document.querySelector('#show-password');
    let inputPassword = document.querySelector('#senha');

    if(inputPassword.type == 'password') {
        inputPassword.type = 'text';
        buttonShowPassword.classList.remove('fa-eye');
        buttonShowPassword.classList.add('fa-eye-slash');
    } else {
        inputPassword.type = 'password';
        buttonShowPassword.classList.remove('fa-eye-slash');
        buttonShowPassword.classList.add('fa-eye');
    }

    inputPassword.addEventListener('mouseout', () => {
        inputPassword.type = 'password';
        buttonShowPassword.classList.remove('fa-eye-slash');
        buttonShowPassword.classList.add('fa-eye');
    })
}

let buttonHiddenSubmenu = document.querySelectorAll('[data-submenu-drop]');
const listatMenu = document.querySelectorAll('.sidebar_submenu__lista');

buttonHiddenSubmenu.forEach((element, index) => {
    element.addEventListener('click', () => {
        if(element.classList[1] === 'fa-caret-down' && element.style.display == "") {
            element.style.display = "none";
            buttonHiddenSubmenu[index + 1].style.display = "";

            switch(index) {
                case 0:
                case 1:
                    listatMenu[0].style.display = "none";
                    break;

                case 2:
                case 3:
                    listatMenu[1].style.display = "none";
                    break;

                case 4:
                case 5:
                    listatMenu[2].style.display = "none";
                    break;

                case 6:
                case 7:
                    listatMenu[3].style.display = "none";
                    break;

                default:
                    break;
            }
        } else {
            element.style.display = "none";
            buttonHiddenSubmenu[index - 1].style.display = "";

            switch(index) {
                case 0:
                case 1:
                    listatMenu[0].style.display = "";
                    break;

                case 2:
                case 3:
                    listatMenu[1].style.display = "";
                    break;

                case 4:
                case 5:
                    listatMenu[2].style.display = "";
                    break;

                case 6:
                case 7:
                    listatMenu[3].style.display = "";
                    break;

                default:
                    break;
            }
        }
    })
});
