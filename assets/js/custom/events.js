"use strict"

$(document).ready(function(){
    
    $("#page-loader").hide();

    $(document).on("click", ".createEvent", function(e){
        console.log("clicado");


        let type = $('select[name="eventType"]').val();
        let description = $('select[name="eventDescription"]').val();
        let date = $('select[name="eventDate"]').val();
        let start = $('select[name="eventStart"]').val();
        let finish = $('select[name="eventFinish"]').val();
        let mechanic = $('select[name="eventMechanic"]').val();

        let eventInfo = {
            'type': type,
            'description': description,
            'date': date,
            'start': start,
            'finish': finish,
            'mechanic': mechanic
        };

        $.ajax({
            type: "POST",
            url:   `${baseURL}events/createEvent`,
            data: eventInfo,
            dataType: "dataType",
            success: function (response) {
                notyf.success("Evento adicionado com sucesso!");
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