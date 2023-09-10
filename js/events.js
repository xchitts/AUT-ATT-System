const eventForm = document.getElementById('eventForm');
const eventName = document.getElementById('eventName');
const eventDate = document.getElementById('eventDate');
const eventResponse = document.getElementById('event-response');
const eventResponseSMS = document.getElementById('event-response-message');

const eventtable = document.getElementById('eventtable');

eventForm.addEventListener('submit', (e)=>{
    e.preventDefault();

    $.ajax({
        url: "events-process.php",
        method: "POST",
        dataType: 'json',
        data: {
            eventname : eventName.value,
            eventdate : eventDate.value
        },
        success: function(eventResponseResult){
            if(eventResponseResult.status){
                eventResponse.style.display = "flex";
                eventResponse.style.border = "1px solid green";
                eventResponseSMS.style.color = "green";
                eventResponseSMS.innerHTML = eventResponseResult.message;
                setTimeout(closeResponse, 3000);
                eventForm.reset();
                getEvents();
            }
            else{
                eventResponse.style.display = "flex";
                eventResponse.style.border = "1px solid red";
                eventResponseSMS.style.color = "red";
                eventResponseSMS.innerHTML = eventResponseResult.message;
                setTimeout(closeResponse, 3000);
            }
        },
    })
})

function closeResponse(){
    eventResponse.style.display = "none";
}

function getEvents(){
    $.ajax({
        url: "events-process.php",
        method: "POST",
        dataType: 'html',
        data: {
            getallevents: 1
        },
        success: function(eventslist){
            console.log(eventslist)
            eventtable.innerHTML = eventslist;
        }
    })
}

getEvents();

function changeStatus(id){
    $.ajax({
        url: "events-process.php?changestatus="+id,
        method: "GET",
        success: function(reponse){
            console.log(reponse)
            getEvents();
        }
    })
}

function delete_event(id){
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            url: "events-process.php",
            method: "POST",
            data:{
                eventid: id
            },
            success: function(deleteeventResponse){
                console.log(deleteeventResponse);
                getEvents();
            }
        })
    }
}
