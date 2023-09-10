var eventname = '', eventdate = '', studentID = '', yearlevel= '', course = '';

const Attendancetbl = document.getElementById('studentAttendanceList');
const getEventName = document.getElementById('selectEvent');
const getEventDate = document.getElementById('eventDate');
const getYearLevel = document.getElementById('yearlevel');
const getCourse = document.getElementById('course');
const getStudentID = document.getElementById('searchStudentID')

getEventName.addEventListener("change", ()=>{
    eventname = getEventName.value;
    getAttendanceList();
    exporttoExcel();
    console.log(eventname);
})
getEventDate.addEventListener("change", ()=>{
    eventdate = getEventDate.value;
    getAttendanceList();
    console.log(eventdate);
})
getYearLevel.addEventListener("change", ()=>{
    yearlevel = getYearLevel.value;
    getAttendanceList();
    console.log(yearlevel);
})
getCourse.addEventListener("change", ()=>{
    course = getCourse.value;
    getAttendanceList();
    console.log(course);
})
getStudentID.addEventListener("keyup", ()=>{
    studentID = getStudentID.value;
    getAttendanceList();
    console.log(studentID);
})

function getAttendanceList(){
    if(yearlevel != '' && course == '' && studentID == '' && eventname == '' && eventdate == ''){
        console.log("here")
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                getAttendanceYearLevel: yearlevel
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course != '' && studentID == '' && eventname == '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                getAttendanceCourse: course
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course == '' && studentID == '' && eventname != '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                getAttendanceEventName: eventname
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course == '' && studentID == '' && eventname == '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                getAttendanceEventDate: eventdate
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course == '' && studentID != '' && eventname == '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                getAttendanceStudentID: studentID
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course != '' && studentID == '' && eventname == '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                yearlevel: yearlevel,
                getAttendanceYearLevelCourse: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course != '' && studentID != '' && eventname == '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                yearlevel: yearlevel,
                studentID: studentID,
                getAttendanceYearLevelCourseStudentID: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course != '' && studentID != '' && eventname != '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                yearlevel: yearlevel,
                studentID: studentID,
                eventname: eventname,
                getAttendanceYearLevelCourseStudentIDEventName: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course != '' && studentID != '' && eventname != '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                yearlevel: yearlevel,
                studentID: studentID,
                eventname: eventname,
                eventdate: eventdate,
                getAttendanceYearLevelCourseStudentIDEventNameEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course != '' && studentID == '' && eventname != '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                yearlevel: yearlevel,
                eventname: eventname,
                getAttendanceYearLevelCourseEventName: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course != '' && studentID == '' && eventname != '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                yearlevel: yearlevel,
                eventname: eventname,
                eventdate: eventdate,
                getAttendanceYearLevelCourseEventNameEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course == '' && studentID == '' && eventname != '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                yearlevel: yearlevel,
                eventname: eventname,
                getAttendanceYearLevelEventName: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course == '' && studentID == '' && eventname == '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                yearlevel: yearlevel,
                eventdate: eventdate,
                getAttendanceYearLevelEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course == '' && studentID == '' && eventname != '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                yearlevel: yearlevel,
                eventname: eventname,
                eventdate: eventdate,
                getAttendanceYearLevelEventNameEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course != '' && studentID == '' && eventname != '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                eventname: eventname,
                getAttendanceCourseEventName: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course != '' && studentID == '' && eventname == '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                eventdate: eventdate,
                getAttendanceCourseEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course != '' && studentID == '' && eventname != '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                eventname: eventname,
                eventdate: eventdate,
                getAttendanceCourseEventNameEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course != '' && studentID != '' && eventname == '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                studentID: studentID,
                getAttendanceCourseStudentID: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course == '' && studentID != '' && eventname != '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                eventname: eventname,
                studentID: studentID,
                getAttendanceEventNameStudentID: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course == '' && studentID != '' && eventname == '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                eventdate: eventdate,
                studentID: studentID,
                getAttendanceEventDateStudentID: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course == '' && studentID != '' && eventname == '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                yearlevel: yearlevel,
                studentID: studentID,
                getAttendanceYearLevelStudentID: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course == '' && studentID != '' && eventname != '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                yearlevel: yearlevel,
                studentID: studentID,
                eventname: eventname,
                getAttendanceYearLevelStudentIDEventName: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course == '' && studentID != '' && eventname != '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                yearlevel: yearlevel,
                studentID: studentID,
                eventname: eventname,
                eventdate: eventdate,
                getAttendanceYearLevelStudentIDEventNameEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel != '' && course == '' && studentID != '' && eventname == '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                yearlevel: yearlevel,
                studentID: studentID,
                eventdate: eventdate,
                getAttendanceYearLevelStudentIDEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course != '' && studentID != '' && eventname == '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                studentID: studentID,
                eventdate: eventdate,
                getAttendanceCourseStudentIDEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course != '' && studentID != '' && eventname != '' && eventdate == ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                studentID: studentID,
                eventname: eventname,
                getAttendanceCourseStudentIDEventName: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course != '' && studentID != '' && eventname != '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                course: course,
                studentID: studentID,
                eventname: eventname,
                eventdate: eventdate,
                getAttendanceCourseStudentIDEventNameEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else if(yearlevel == '' && course == '' && studentID == '' && eventname != '' && eventdate != ''){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                eventname: eventname,
                eventdate: eventdate,
                getAttendanceEventNameEventDate: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
            }
        });
    }
    else{
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                getAttendanceList: 1
            },
            success: function(AttendanceListResult){
                Attendancetbl.innerHTML = AttendanceListResult;
                printpdf();
            }
        })
    }
}
getAttendanceList();


// GET EVENT LIST FUNCTION
function getEventList(){
    $.ajax({
        url: "records-process.php?getEventList='1'",
        method: "GET",
        dataType: 'html',
        success: function(eventResult){
            console.log(eventResult)
            getEventName.innerHTML = eventResult;
        }
    })
}
getEventList();


// DELETE STUDENT ATTENDANCE
function delete_student_attendance(id){
    let studentIDtoDelete = id;
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'json',
            data: {
                studentID_delete: studentIDtoDelete,
                deleteStudentAttendance: 1
            },
            success: function(deleteStudentAttendanceResponse){
                // if mag true ang delete, mag gana ni nga function
                if(deleteStudentAttendanceResponse.status){
                    getAttendanceList();
                }else{
                    console.log(deleteStudentAttendanceResponse)
                }
                
            },
            error: function(error){
                console.log(error)
            }
        })
    }
}

// check who is the user 
function checkuser(){
    $.ajax({
        url: "attendance-process.php?checkuser='1'",
        method: "GET",
        dataType: 'json',
        success: function(userResult){
            if(userResult.status){

            }
            else{
                getYearLevel.disabled = true;
            }
        }
    })
}
checkuser();

// export excel
const excelbtn = document.getElementById('exportexcel');
const pdfbtn = document.getElementById('prindpdf');
// function exportdatatoExcel(){
//     if(eventname != ''){
//         // console.log("here")
//         excelbtn.addEventListener('click', ()=>{
//             console.log("click")
//             $.ajax({
//                 url: "records-process.php?exportdata="+eventname,
//                 method: "GET",
//                 success: function(response){
//                     console.log(response)
//                 },
//                 error: function(error){
//                     console.log(error)
//                 }
//             })
//         })
//     }
// };

const printTBL = document.getElementById('printpdf');
const tabletoprint = document.getElementById("recordsData");
const tools = document.getElementById('tools');

function exporttoExcel(){
    excelbtn.addEventListener('click', ()=>{
        TableToExcel.convert(document.getElementById("recordsData"),{
            name: "EventName.xlsx",
            sheet: {
                name: eventname
            }
        });
    
    })
}
exporttoExcel();

function printpdf(){
    // print table data
    function printtable(){
        // tabletoprint.border = 1;
        tabletoprint.cellPadding = 1;
        tools.style.display = "none";
        tabletoprint.style.width = "100%";
        newWin = window.open("");
        newWin.document.write(tabletoprint.outerHTML);
        console.log(tabletoprint.outerHTML);
        newWin.print();
        closePrint();
    };
    printTBL.addEventListener('click', ()=>{
        printtable();
    });

    function closePrint(){
        // tabletoprint.border = 0;
        tabletoprint.cellPadding = 0;
        tools.style.display = "block";
        newWin.close();
    }
};

const toprint = document.getElementById('termsandpolicy');




