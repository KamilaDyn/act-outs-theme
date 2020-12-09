
 /*------------------------------------------------
                EVO CALENDAR
    ------------------------------------------------*/

jQuery(document).ready(function ($) {


    var calendar = $("#calendar");
    var url_json = `${actoutsData.root_url}/wp-json/actouts/v1/event`;
    
    $.ajax({
        url: url_json,
        dataType: "json",
        method: 'get',
        success: function (data) {
            calendar.evoCalendar({
                    'todayHighlight': true,
                calendarEvents: data.events
            })
        },
        error: function () {
            console.log("I'm in Error");
        }
    });



})