const title = document.querySelector('h1')

title.onclick = function () {
    window.location.replace("https://h3llvy.000webhostapp.com/");

}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


function validatePass(pass) {
    if ((pass.length >= 8) && (pass.length <= 40))
        return true;
    return false;
}

// let http = new XMLHttpRequest();
// http.open("GET", "./php_actions/activeEmail.php");
// http.onload = function () {
//     if (http.readyState == 4 && http.status == 200) {
//         alert(1232332323232);
//     }
// };
// http.send();


function activeEmail() {
    //отправвляет код и проверяет его, меняет статус если верен
    let http = new XMLHttpRequest();
    http.open("GET", "./php_actions/send.php");
    http.onload = function () {
        if (http.readyState == 4 && http.status == 200) {
        }
    };
    http.send();

    document.querySelector('#labels').style.display = 'none';
    document.querySelector('article').insertAdjacentHTML('beforeend',
        `<label>Код из сообщения</label><input id="code" type="text">
    <div class="g-recaptcha" data-sitekey="6LcXdm8bAAAAAIfagC-DXbNuWUiEstmlfG04eskc"></div>   
    <button id="activate">Активировать</button>
    `);
    document.querySelector('#active_email').onclick = null;
    document.querySelector("#activate").onclick = function () {
        let code = document.querySelector('#code').value
        let formData = new FormData();
        formData.append("code", parseInt(code));
        formData.append("captcha", grecaptcha.getResponse());
        let http = new XMLHttpRequest();
        http.open("POST", "./php_actions/activeEmail.php");
        var data = new FormData();
        http.onload = function () {
            if (http.readyState == 4 && http.status == 200) {
                alert(http.responseText);
            }
        };
        http.send(formData);
        grecaptcha.reset();
    }

}

// var onloadCallback = function () {
//     alert("grecaptcha is ready!");
// };

function signOut() {
    let http = new XMLHttpRequest();
    http.open("GET", "./php_actions/out.php");
    http.onload = function () {
        if (http.readyState == 4 && http.status == 200) {
            location.reload();
        }
    };
    http.send();
}

function settings() {
    let name = document.querySelector('#name').value
    let img = document.querySelector('#img').value
    let oldPassword = document.querySelector('#oldPassword').value
    let curPassword = document.querySelector('#curPassword').value
    let verification = document.querySelector('#verification').value
    if ((oldPassword.length + curPassword.length + verification.length)!=0) {
        if (!validatePass(curPassword)) {
            alert("Пароль мб (8-40 символовв)")
            return;
        }
        if (curPassword != verification) {
            alert("Пароли не сходятся!");
            return;
        }
    }
    let formData = new FormData();
    formData.append("name", name);
    formData.append("img", img);
    formData.append("captcha", grecaptcha.getResponse());
    formData.append("oldPassword", oldPassword);
    formData.append("curPassword", curPassword);
    let http = new XMLHttpRequest();
    http.open("POST", "./php_actions/save_settings.php");
    http.onload = function () {
        if (http.readyState == 4 && http.status == 200) {
            alert(http.responseText);
        }
    };
    http.send(formData);
    grecaptcha.reset();
}

function viewUsers(get = '') {
    if (get.length == 0) {
        changeMain('src/users.php');
    } else {
        let http = new XMLHttpRequest();
        http.open("GET", "./src/users.php?sort=" + get);
        http.onload = function () {
            if (http.readyState == 4 && http.status == 200) {
                document.querySelector('main').innerHTML = http.responseText;
            }
        };
        http.send();
    }
    document.addEventListener("DOMContentLoaded", function (event) {

    });

}

function sendmail(url) {

    changeMain(url);
}

function changeMain(url) {
    ($.get(url, function (my_var) {
        document.querySelector('main').innerHTML = my_var
    }, 'html'))
}

function in_post() {
    let login = document.querySelector('#login').value.toLowerCase()
    let password = document.querySelector('#password').value
    let formData = new FormData();
    formData.append("email", login);
    formData.append("captcha", grecaptcha.getResponse());
    formData.append("pass", password);
    let http = new XMLHttpRequest();
    http.open("POST", "./php_actions/in.php");
    var data = new FormData();
    http.onload = function () {
        if (http.readyState == 4 && http.status == 200) {
            if (http.responseText === '1') {

                window.location.href = 'https://h3llvy.000webhostapp.com/';
                // ($.get("src/account.php", function (my_var) {
                //     document.querySelector('main').innerHTML = my_var
                // }, 'html'))
            } else {
                alert(http.responseText)
            }
        }
    };
    http.send(formData);
    grecaptcha.reset();
}

function up_post() {
    let login = document.querySelector('#login').value.toLowerCase()
    if (!validateEmail(login)) {
        alert("Неверный форматт почты")
        return;
    }
    let password = document.querySelector('#password').value
    let password_ver = document.querySelector('#password_ver').value
    if (!validatePass(password)) {
        alert("Пароль мб (8-40 символовв)")
        return;

    }
    if (password_ver!==password){
        alert("Не сходятся пароли!")
        return;
    }
    let formData = new FormData();
    formData.append("email", login);
    formData.append("pass", password);
    formData.append("captcha", grecaptcha.getResponse());
    let http = new XMLHttpRequest();
    http.open("POST", "php_actions/up.php");
    var data = new FormData();
    http.onload = function () {
        if (http.readyState == 4 && http.status == 200) {
            if (http.responseText === '1') {
                window.location.href = 'https://h3llvy.000webhostapp.com/';
                // ($.get("src/account.php", function (my_var) {
                //     document.querySelector('main').innerHTML = my_var
                // }, 'html'))
            } else {
                alert(http.responseText)
            }
        }
    };
    http.send(formData);
    grecaptcha.reset();
}


// document.querySelector('.g-recaptcha').style.display = 'none';
// const str = document.querySelector('.g-recaptcha').outerHTML;
