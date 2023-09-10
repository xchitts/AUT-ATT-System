var checkerStatus; 

const email = document.getElementById('email');
const password = document.getElementById('password');
const loginBtn = document.getElementById('loginForm');
const statusSuccess = document.getElementById('statusSuccess');
const statusFailed= document.getElementById('statusFailed');
const rememberChecker = document.querySelector('#rememberChecker');

// rememberChecker.addEventListener('change', ()=>{
    
// })

    loginBtn.addEventListener("submit", (e)=>{
        e.preventDefault();
        e.stopPropagation();

        checkerStatus = rememberChecker.checked;
        if(checkerStatus == true){
            checkerStatus = "1";
        }else{
            checkerStatus = "0";
        }
        console.log(checkerStatus)
        let emailData = email.value;
        let passwordData = password.value;
        console.log("click")
        $.ajax({
            url: "login-process.php",
            method: "POST",
            dataType: 'json',
            data:{
                email: emailData,
                password: passwordData,
                checker: checkerStatus
            },
            success : function(loginResult){
                console.log(checkerStatus)
                if(loginResult.status){
                    console.log(loginResult)
                    statusSuccess.style.display = "none";
                    statusSuccess.style.display = "flex";
                    statusFailed.style.display = "none";

                    // change the border bottom of the input!
                    email.style.borderBottom = "1px solid #17C63D";
                    password.style.borderBottom = "1px solid #17C63D";

                    window.location.replace("index.php");
                }
                else{
                    console.log("here")
                    statusFailed.style.display = "none";
                    statusFailed.style.display = "flex";
                    statusSuccess.style.display = "none";

                    // change the border bottom of the input!
                    email.style.borderBottom = "1px solid #ff3300";
                    password.style.borderBottom = "1px solid #ff3300";
                }
            }
        })
    })
