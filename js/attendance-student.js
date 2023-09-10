var studentIDData = '',timeData = '',eventnameData = '';

const timeinAMcheck = document.querySelector('#timeinAM');
const timeoutAMcheck = document.querySelector('#timeoutAM');
const timeinPMcheck = document.querySelector('#timeinPM');
const timeoutPMcheck = document.querySelector('#timeoutPM');

const timeinAM = document.getElementById('timeinAM');
const timeoutAM = document.getElementById('timeoutAM');
const timeinPM = document.getElementById('timeinPM');
const timeoutPM = document.getElementById('timeoutPM');

const attendance_card = document.getElementById('attendance_card');

const studentID = document.getElementById('studentID');
const studentAttendanceForm = document.getElementById('studentAttendance');

const displayEventSelector = document.getElementById('eventselector');

// RESPONSE STATUS OF STUDENT ATTENMDANCE
const attendancecard = document.getElementById('attendancecard');
const attendanceResponse = document.getElementById('attendanceResponse');

// logo element
const hiddentricks = document.getElementById('hiddentricks');
const time_group = document.getElementById('time-group');

hiddentricks.addEventListener('click', ()=>{
    time_group.classList.toggle('active');
})

function geteventlist(){
    console.log('count')
    $.ajax({
        url: "attendance-process.php?getEvent='1'",
        method: "GET",
        dataType: 'html',
        success: function(eventlistResult){
            displayEventSelector.innerHTML = eventlistResult;
        }
    })
}
geteventlist();
// setInterval(geteventlist, 1000);

displayEventSelector.addEventListener('change', ()=>{
    if(displayEventSelector.value == ""){
        console.log(eventnameData)
        eventnameData = '';
        timeinAM.disabled = true;
        timeoutAM.disabled = true;
        timeinPM.disabled = true;
        timeoutPM.disabled = true;

        timeinAM.checked = false;
        timeoutAM.checked = false;
        timeinPM.checked = false;
        timeoutPM.checked = false;
        timeData = '';

    }else{
        eventnameData = displayEventSelector.value;
        timeinAM.disabled = false;
        timeoutAM.disabled = false;
        timeinPM.disabled = false;
        timeoutPM.disabled = false;

    }
    console.log(eventnameData)
})
        timeinAM.disabled = true;
        timeoutAM.disabled = true;
        timeinPM.disabled = true;
        timeoutPM.disabled = true;



timeinAM.addEventListener('click', ()=>{
    timeChecker();
})
timeoutAM.addEventListener('change', ()=>{
    timeChecker();
})
timeinPM.addEventListener('change', ()=>{
    timeChecker();
})
timeoutPM.addEventListener('change', ()=>{
    timeChecker();
})


function timeChecker(){
    console.log('here')
    if(timeinAMcheck.checked == true){
        timeData = timeinAMcheck.value;
        console.log(timeData);
        timeoutAM.disabled = true;
        timeinPM.disabled = true;
        timeoutPM.disabled = true;
        attendance_card.style.opacity = "1";
        displayEventSelector.style.pointerEvents = "none";
    }
    else if(timeoutAMcheck.checked == true){
        timeData = timeoutAMcheck.value;
        timeinAM.disabled = true;
        timeinPM.disabled = true;
        timeoutPM.disabled = true;
        attendance_card.style.opacity = "1";
        displayEventSelector.style.pointerEvents = "none";
    }
    else if(timeinPMcheck.checked == true){
        timeData = timeinPMcheck.value;
        timeinAM.disabled = true;
        timeoutAM.disabled = true;
        timeoutPM.disabled = true;
        attendance_card.style.opacity = "1";
        displayEventSelector.style.pointerEvents = "none";
    }
    else if(timeoutPMcheck.checked == true){
        timeData = timeoutPM.value;
        timeinAM.disabled = true;
        timeoutAM.disabled = true;
        timeinPM.disabled = true;
        attendance_card.style.opacity = "1";
        displayEventSelector.style.pointerEvents = "none";
    }
    else{
        timeData = '';
        timeinAM.disabled = false;
        timeoutAM.disabled = false;
        timeinPM.disabled = false;
        timeoutPM.disabled = false;
        attendance_card.style.opacity = "0";
        studentID.value = '';
        displayEventSelector.style.pointerEvents = "auto";
        
    }
}


// SET ATTENDANCE OF STUDENT
function studentAttendance(){
    studentAttendanceForm., (e)=>{
        e.preventDefault();
        studentIDData = studentID.value;
        console.log(studentIDData, timeData, eventnameData);
        $.ajax({
            url: "attendance-process.php",
            method: "POST",
            dataType: 'json',
            data:{
                studentID: studentIDData,
                time: timeData,
                eventname: eventnameData,
                attendancestudent: 1
            },
            success: function(attendanceResult){
                console.log(attendanceResult)
                if(attendanceResult.status){
                    attendancecard.style.opacity="1";
                    attendancecard.style.border="1px solid #088000";
                    attendancecard.style.color="#088000";
                    attendanceResponse.innerHTML = attendanceResult.message;

                    studentID.value='';

            
                    setTimeout(closeAttendanceResponse, 1500);
                }
                else{
                    attendancecard.style.opacity="1";
                    attendancecard.style.border="1px solid red";
                    attendancecard.style.color="red";
                    attendanceResponse.innerHTML = attendanceResult.message;

                    setTimeout(closeAttendanceResponse, 1500);
                }
            },
            error: function (error){
                attendancecard.style.opacity="1";
                attendancecard.style.border="1px solid red";
                attendancecard.style.color="red";
                attendanceResponse.innerHTML = "Invalid Input!";

                setTimeout(closeAttendanceResponse, 1500);
                console.log(error);
            }
        })
    })
    
}
studentAttendance();

function closeAttendanceResponse(){
    attendancecard.style.opacity="0";
}

