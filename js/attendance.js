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


function geteventlist(){
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
        AttendanceViewer();
    }else{
        eventnameData = displayEventSelector.value;
        timeinAM.disabled = false;
        timeoutAM.disabled = false;
        timeinPM.disabled = false;
        timeoutPM.disabled = false;
        AttendanceViewer();
    }
    console.log(eventnameData)
})
        timeinAM.disabled = true;
        timeoutAM.disabled = true;
        timeinPM.disabled = true;
        timeoutPM.disabled = true;



timeinAM.addEventListener('click', ()=>{
    timeChecker();
    AttendanceViewer();
})
timeoutAM.addEventListener('change', ()=>{
    timeChecker();
    AttendanceViewer();
})
timeinPM.addEventListener('change', ()=>{
    timeChecker();
    AttendanceViewer();
})
timeoutPM.addEventListener('change', ()=>{
    timeChecker();
    AttendanceViewer();
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
    studentAttendanceForm.addEventListener('submit', (e)=>{
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

                    AttendanceViewer();
                    setTimeout(closeAttendanceResponse, 2000);
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

                setTimeout(closeAttendanceResponse, 2000);
                console.log(error);
            }
        })
    })
    
}
studentAttendance();

function closeAttendanceResponse(){
    attendancecard.style.opacity="0";
}

function AttendanceViewer(){
    console.log("HEREHERE")
    const studentAttendanceCard = document.getElementById('student-attendance-card');
    $.ajax({
        url: "attendance-process.php",
        method: "POST",
        dataType: 'html',
        data: {
            time: timeData,
            event: eventnameData,
            getstudentattendance: 1
        },
        success: function(attendanceViewerResult){
            studentAttendanceCard.innerHTML = attendanceViewerResult;
            console.log(attendanceViewerResult)
            console.log(timeData);
        }
    })
}

setInterval(AttendanceViewer, 1000);


// function checkuser(){
//     $.ajax({
//         url: "attendance-process.php?checkuser='1'",
//         method: "GET",
//         dataType: 'json',
//         success: function(checkuserResult){
//             if(checkuserResult.status){
//                 console.log("here")
//             }
//             else{
//                 console.log(checkuserResult);
//                 addEventActive.style.display = "none";
//                 displayEventSelector.style.width = "100%";
//             }
//         }
//     })
// }
// checkuser();