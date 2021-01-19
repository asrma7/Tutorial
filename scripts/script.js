function loginSubmit() {
    event.preventDefault();
    user = document.getElementById('user').value;
    pass = document.getElementById('password').value;
    msg = document.getElementById('msg');
    data = new FormData();
    data.append('user', user);
    data.append('pass', pass);
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200) {
            status = JSON.parse(this.responseText)['status'];
            message = JSON.parse(this.responseText)['message'];
            msg.innerText = message;
            if(status == 200) {
                msg.style.color = '#0f0';
                setTimeout(function() {
                    window.location.replace("index.php");
                }, 2500);
            }
            else {
                msg.style.color = '#f00';
            }
        }
    };
    xhttp.open("POST", "login.php", true);
    xhttp.send(data);
}

function registerSubmit() {
    event.preventDefault();
    fullname = document.getElementById('fullname').value;
    username = document.getElementById('username').value;
    email = document.getElementById('email').value;
    pass = document.getElementById('pass').value;
    confirmpass = document.getElementById('confirm').value;
    msg = document.getElementById('msg');
    data = new FormData();
    data.append('fullname', fullname);
    data.append('username', username);
    data.append('email', email);
    data.append('pass', pass);
    data.append('confirm', confirmpass);
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200) {
            status = JSON.parse(this.responseText)['status'];
            message = JSON.parse(this.responseText)['message'];
            msg.innerText = message;
            if(status == 200) {
                msg.style.color = '#0f0';
                setTimeout(function() {
                    window.location.replace("index.php");
                }, 2500);
            }
            else {
                msg.style.color = '#f00';
            }
        }
    };
    xhttp.open("POST", "register.php", true);
    xhttp.send(data);
}