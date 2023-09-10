var yearlevelData = '', courseData = '', searchData = '';
const yearlevel = document.getElementById('selectbyYL');
const course = document.getElementById('selectbyCOURSE');
const search = document.getElementById('searchStudentId');
const tbodytb = document.getElementById('studentlisttbl');

yearlevel.addEventListener('change', ()=>{
    yearlevelData = yearlevel.value;
    getStudentList();
})
course.addEventListener('change', ()=>{
    courseData = course.value;
    getStudentList();
})
search.addEventListener('keyup', ()=>{
    searchData = search.value;
    getStudentList();
})


function getStudentList(){
   if(yearlevelData != '' && courseData == '' && searchData == ''){
    $.ajax({
        url: "student-process.php",
        method: "POST",
        dataType: 'html',
        data:{
            searchYear: yearlevelData
        },
        success: function(studentResult){
            tbodytb.innerHTML = studentResult;
        }
    })
   }
   else if(yearlevelData != '' && courseData != '' && searchData == ''){
    $.ajax({
        url: "student-process.php",
        method: "POST",
        dataType: 'html',
        data:{
            year: yearlevelData,
            course: courseData,
            searchYearCourse: 1
        },
        success: function(studentResult){
            tbodytb.innerHTML = studentResult;
        }
    })
   }
   else if(yearlevelData == '' && courseData != '' && searchData == ''){
    $.ajax({
        url: "student-process.php",
        method: "POST",
        dataType: 'html',
        data:{
            searchCourse: courseData
        },
        success: function(studentResult){
            tbodytb.innerHTML = studentResult;
        }
    })
   }
   else if(yearlevelData == '' && courseData == '' && searchData != ''){
    $.ajax({
        url: "student-process.php",
        method: "POST",
        dataType: 'html',
        data:{
            search: searchData
        },
        success: function(studentResult){
            tbodytb.innerHTML = studentResult;
        }
    })
   }
   else if(yearlevelData != '' && courseData == '' && searchData != ''){
    $.ajax({
        url: "student-process.php",
        method: "POST",
        dataType: 'html',
        data:{
            yearlevel: yearlevelData,
            studentID: searchData,
            searchYearSearch: 1
        },
        success: function(studentResult){
            tbodytb.innerHTML = studentResult;
        }
    })
   }
   else if(yearlevelData == '' && courseData != '' && searchData != ''){
    $.ajax({
        url: "student-process.php",
        method: "POST",
        dataType: 'html',
        data:{
            course: courseData,
            studentID: searchData,
            searchCourseSearch: 1
        },
        success: function(studentResult){
            tbodytb.innerHTML = studentResult;
        }
    })
   }
   else if(yearlevelData != '' && courseData != '' && searchData != ''){
    $.ajax({
        url: "student-process.php",
        method: "POST",
        dataType: 'html',
        data:{
            yearlevel: yearlevelData,
            course: courseData,
            studentID: searchData,
            searchYearCourseSearch: 1
        },
        success: function(studentResult){
            tbodytb.innerHTML = studentResult;
        }
    })
   }
   else{
    $.ajax({
        url: "student-process.php",
        method: "POST",
        dataType: 'html',
        data:{
            getAllStudent: 1
        },
        success: function(studentResult){
            tbodytb.innerHTML = studentResult;
        }
    })
   }
}
getStudentList();

function checkuser(){
    $.ajax({
        url:"student-process.php?checkuser='1'",
        method: "GET",
        dataType: 'json',
        success: function(response){
            if(response.status){
                yearlevel.disabled = false;
            }
            else{
                yearlevel.disabled = true;
            }
        }
    })
}

checkuser();

function delete_student(id){
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            url: "student-process.php?deleteStudent="+id,
            method: "GET",
            success: function(response){
                console.log(response)
                getStudentList();
            }
        })
    }
}


// MODAL functions
    // const openstudentmodalBtn = document.getElementById('studentmodalBtn');
    const closemodalBtn = document.getElementById('close-modalbtn');
    const updatestudentmodal = document.getElementById('update-student-modal');
    const update_studentForm = document.getElementById('update-studentForm');
;
    // openstudentmodalBtn.addEventListener('click', ()=>{
    //     updatestudentmodal.style.display = "flex";

    // })
    closemodalBtn.addEventListener('click', ()=>{
        updatestudentmodal.style.display = "none";
        update_studentForm.reset();
    })

    function openmodalbtn (id){
        updatestudentmodal.style.display = "flex";
        console.log(id);
        $.ajax({
            url: "student-process.php",
            method: "POST",
            dataType: 'json',
            data:{
                update_student_id : id
            },
            success: function(response){
                if(response.status){
                    console.log(response)
                    $('#updatestudentid').val(response.data.studentno);
                    $('#studentid').val(response.data.studentno);
                    $('#fullname').val(response.data.fullname);
                    $('#yearlevel').val(response.data.yearlevel);
                    $('#course').val(response.data.course);
                    $('#contactno').val(response.data.contactno);
                    document.getElementById('studentid').disabled = true;
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    // UPDATE STUDENT INFORMATION
        update_studentForm.addEventListener('submit', (e)=>{
            e.preventDefault();
            console.log($('#update-studentForm').serialize())
            $.ajax({
                url: "student-process.php",
                method: "POST",
                dataType: 'json',
                data: $('#update-studentForm').serialize(),
                success: function(response){
                    console.log(response);
                    if(response.status){
                        getStudentList();
                        updatestudentmodal.style.display = "none";
                        opensmsbubble(response.sms);
                        setTimeout(closesmsbubble, 1800);
                    }
                    else{

                    }
                },
                error: function(error){
                    console.log(error);
                }
            })
        });

// SMS BUBBLE
const sms_bubble = document.getElementById('sms-bubble');
const smsresponse = document.getElementById('sms');

function opensmsbubble(sms){
    sms_bubble.style.opacity = "1";
    smsresponse.innerHTML = sms;
}
function closesmsbubble(){
    sms_bubble.style.opacity = "0";
}