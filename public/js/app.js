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

function hiddeSidebar() {
    let sidebar = document.querySelector('.sidebar');
    let header = document.querySelector('.header');
    let application = document.querySelector('.application');
    let footer = document.querySelector('.footer');
    let sidebarMenus = document.querySelector('#sidebar_menus');

    sidebar.style.transition = '1s';
    header.style.transition = '1s';
    application.style.transition = '1s';
    footer.style.transition = '1s';
    sidebarMenus.style.transition = '1s';


    if (sidebar.classList[1] == 'sidebar-hidden') {

        sidebar.classList.remove('sidebar-hidden');
        header.style.width = "80vw";
        application.style.width = "80vw";
        footer.style.width = "80vw";
        sessionStorage.setItem('sidebar', 'show');
    } else {

        sidebar.classList.add('sidebar-hidden');
        header.style.width = "97vw";
        application.style.width = "97vw";
        footer.style.width = "97vw";
        sessionStorage.setItem('sidebar', 'hidden');
    }
}
