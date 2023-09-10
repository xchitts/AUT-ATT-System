var yearlevelData = '', courseData = '', searchData = '';
const yearlevel = document.getElementById('selectbyYL');
const course = document.getElementById('selectbyCOURSE');
const search = document.getElementById('searchStudentId');
const tbodyrequesttbl = document.getElementById('studentreqisterlisttbl');

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
         url: "student-register-process.php",
         method: "POST",
         dataType: 'html',
         data:{
             searchYear: yearlevelData
         },
         success: function(studentResult){
             studentreqisterlisttbl.innerHTML = studentResult;
         }
     })
    }
    else if(yearlevelData != '' && courseData != '' && searchData == ''){
     $.ajax({
         url: "student-register-process.php",
         method: "POST",
         dataType: 'html',
         data:{
             year: yearlevelData,
             course: courseData,
             searchYearCourse: 1
         },
         success: function(studentResult){
             studentreqisterlisttbl.innerHTML = studentResult;
         }
     })
    }
    else if(yearlevelData == '' && courseData != '' && searchData == ''){
     $.ajax({
         url: "student-register-process.php",
         method: "POST",
         dataType: 'html',
         data:{
             searchCourse: courseData
         },
         success: function(studentResult){
             studentreqisterlisttbl.innerHTML = studentResult;
         }
     })
    }
    else if(yearlevelData == '' && courseData == '' && searchData != ''){
     $.ajax({
         url: "student-register-process.php",
         method: "POST",
         dataType: 'html',
         data:{
             search: searchData
         },
         success: function(studentResult){
             studentreqisterlisttbl.innerHTML = studentResult;
         }
     })
    }
    else if(yearlevelData != '' && courseData == '' && searchData != ''){
     $.ajax({
         url: "student-register-process.php",
         method: "POST",
         dataType: 'html',
         data:{
             yearlevel: yearlevelData,
             studentID: searchData,
             searchYearSearch: 1
         },
         success: function(studentResult){
             studentreqisterlisttbl.innerHTML = studentResult;
         }
     })
    }
    else if(yearlevelData == '' && courseData != '' && searchData != ''){
     $.ajax({
         url: "student-register-process.php",
         method: "POST",
         dataType: 'html',
         data:{
             course: courseData,
             studentID: searchData,
             searchCourseSearch: 1
         },
         success: function(studentResult){
             studentreqisterlisttbl.innerHTML = studentResult;
         }
     })
    }
    else if(yearlevelData != '' && courseData != '' && searchData != ''){
     $.ajax({
         url: "student-register-process.php",
         method: "POST",
         dataType: 'html',
         data:{
             yearlevel: yearlevelData,
             course: courseData,
             studentID: searchData,
             searchYearCourseSearch: 1
         },
         success: function(studentResult){
             studentreqisterlisttbl.innerHTML = studentResult;
         }
     })
    }
    else{
     $.ajax({
         url: "student-register-process.php",
         method: "POST",
         dataType: 'html',
         data:{
             getAllStudent: 1
         },
         success: function(studentResult){
             studentreqisterlisttbl.innerHTML = studentResult;
         }
     })
    }
 }
getStudentList();
setInterval(getStudentList, 5000);

function add_student_register(id){
    $.ajax({
        url: "student-register-process.php?addStudent="+id,
        method: "GET",
        success: function(result){
            getStudentList();
        }
    });
}
function delete_student_register(id){
    
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            url: "student-register-process.php?deleteStudent="+id,
            method: "GET",
            success: function(result){
                getStudentList();
            }
        });
    }
}