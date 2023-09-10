const activebtn = document.getElementById('user-option-active-btn');
const optionActive = document.getElementById('option');
const logoutbtn = document.getElementById('logout');
const headerReturnIndex = document.getElementById('header-return-index');
const logoReturnIndex = document.getElementById('logo-return-index');

activebtn.addEventListener('click', ()=>{
    optionActive.classList.toggle("active");
})
headerReturnIndex.addEventListener('click', ()=>{
    window.location.href = 'index.php';
})
logoReturnIndex.addEventListener('click', ()=>{
    window.location.href = 'index.php';
})

logoutbtn.addEventListener('click', ()=>{
    $.ajax({
        url: "logout-process.php?logout='1'",
        method: "GET",
        success: function(logoutResult){
            console.log(logoutResult)
            window.location.href = 'login.php';
            if(logoutResult.status){
                console.log(logoutResult)
                location.href = 'login.php';
            }else{

            }
        }
    })
})

function checkuser(){
    $.ajax({
        url: "checkuser.php?checkuser='1'",
        method: "GET",
        dataType: 'json',
        success: function(response){
            console.log(response)
           if(response.status){
            
           }
           else{
            console.log(response)
            document.getElementById('eventforadminonly').style.display = "none";
           }
        }
    })
}

checkuser();

// FOOTER-BUBBLE FUNCTION
const bubblebtn = document.getElementById('footer-bubble');
bubblebtn.addEventListener('click', function(){
    bubblebtn.classList.toggle('active');
})

// UPDATE USER OPTION MODAL
const open_userprofile_modalbtn = document.getElementById('user-profile-modalbtn');
const update_user_information_modal = document.getElementById('update-user-information-modal');
const close_userprofile_modalBtn = document.getElementById('close-userprofile-modalBtn');
const userprofile_modalForm = document.getElementById('userprofile_modalForm');

    open_userprofile_modalbtn.addEventListener('click', ()=>{
        update_user_information_modal.style.display = "flex";
        update_user_information();
    })
    close_userprofile_modalBtn.addEventListener('click', ()=>{
        update_user_information_modal.style.display = "none";
        console.log("dasdassa")
    })

    // function updateuser_profile_modal_btn(username){
    //     console.log(username)
    //     update_user_information_modal.style.display = "flex";
    // }

    function update_user_information(){
        $.ajax({
            url: "user-information-process.php",
            method: "POST",
            dataType: 'json',
            data: {
                user_information: 1
            },
            success: function(response){
                if(response.status){
                    console.log(response)
                    $('#user_id').val(response.data.id);
                    $('#user_username').val(response.data.user);
                    $('#user_email').val(response.data.email);
                    $('#user_password').val(response.data.password)
                }
                else{

                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    // UPDATE THE USER INFORMATION
    userprofile_modalForm.addEventListener('submit', (e)=>{
        e.preventDefault();
        console.log($('#userprofile_modalForm').serialize());
        $.ajax({
            url: "user-information-process.php",
            method: "POST",
            dataType: 'json',
            data: $('#userprofile_modalForm').serialize(),
            success: function(response){

            },
            error: function(error){
                console.log(error);
            }
        })
    })
