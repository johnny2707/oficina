"use strict"

$(document).ready(function(){
    
    $("#page-loader").hide();

    $(document).on("click", ".createEvent", function(e){

        let type = $('select[name="eventType"]').val();
        let description = $('input[name="eventDescription"]').val();
        let date = $('input[name="eventDate"]').val();
        let start = $('input[name="eventStart"]').val();
        let finish = $('input[name="eventFinish"]').val();
        let mechanicId = $('select[name="eventMechanic"]').val();

        $.ajax({
            type: "POST",
            url:   `${baseURL}events/createEvent`,
            dataType: "json",
            data: {
                'type': type,
                'description': description,
                'date': date,
                'start': start,
                'finish': finish,
                'mechanicId': mechanicId
            },
            success: function (response) {
                notyf.success("Evento adicionado com sucesso!");
            },
            error: function(xhr, status, error){
                console.log(xhr);
                console.log(status);
                console.log(error);

                notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
            }
        });
    });    

    let calendarEl = document.getElementById('schedule');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            start: 'today prev,next',
            center: 'title',
            end: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        businessHours: {
            daysOfWeek: [ 1, 2, 3, 4, 5 ],
            startTime: '09:00',
            endTime: '18:30',
        },
        contentHeight: 'auto',
        allDaySlot: true,
        slotMinTime: '07:00:00',
        themeSystem: 'bootstrap5',
        locale: 'pt',
        initialView: 'timeGridWeek',
        eventDidMount: function (info) {
            $(info.el).tooltip({
                title: info.event.extendedProps.description,
                html: true,
                container: 'body'
            });
        },
        datesSet: function (info) {
            let currentYear = info.view.currentStart.getFullYear();
            
            calendar.getEventSources().forEach(function(eventSource) {
                eventSource.remove();
            });

            calendar.addEventSource({
                url: `${baseURL}events/listOfEvents`,
                method: 'POST',
                extraParams: {
                    currentYear
                },
                failure: function(data) {
                    notyf.error("Ocorreu um erro a carregar os eventos no calendário");
                }
            });
        }
    });
    calendar.render();

});