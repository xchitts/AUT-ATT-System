const studentRegForm = document.getElementById('studentRegForm');
const statusSucess = document.getElementById('statusSuccess');
const statusFailed = document.getElementById('statusFailed');


studentRegForm.addEventListener("submit", (e)=>{
    e.preventDefault();
    e.stopPropagation();
    console.log($('#studentRegForm').serialize());

    $.ajax({
        url: "studentRegistration-process.php",
        method: "post",
        dataType: 'json',
        data: $('#studentRegForm').serialize(),
        success: function(registerResult){
            if(registerResult.status){
                console.log(registerResult)
                statusSuccess.style.display = "flex";
                statusFailed.style.display = "none";
                studentRegForm.reset();
                setTimeout(closeStatusSucessF, 3000);
            }
            else{
                statusFailed.style.display = "flex";
                statusSuccess.style.display = "none";
                setTimeout(closeStatusFailedF, 3000);
            }
        }
    })
})

function closeStatusSucessF(){
    statusSuccess.style.display = "none";
}
function closeStatusFailedF(){
    statusFailed.style.display = "none";
}