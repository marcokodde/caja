document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {

    initialView: 'dayGridMonth',
    
    locale:"es",
    
    headerToolbar: {
        left:'prev,next today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,listWeek'
    },
 
    dateClick: function(info) {
        alert('Date: ' + info.dateStr);
        info.dayEl.style.backgroundColor = 'red';
        bgChange()
    }

  });

  calendar.render();

});
document.getElementById("moda").onclick = function() {
    bgChange()
};

function bgChange() {
    document.getElementById("modal").classList.toggle("hidden");
}