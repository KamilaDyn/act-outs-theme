/*------------------------------------------------
            Full Year Calendar
   ------------------------------------------------*/

const currentYear = new Date().getFullYear();
let popperInstance = null;
let tooltip = document.querySelectorAll('#tooltip');

const calendar = document.querySelector('#calendar')
const url_json = `${actoutsData.root_url}/wp-json/actouts/v1/event`;


fetch(url_json, {
    method: "GET",
    headers: {
      "Content-type": "application/json;charset=UTF-8",
    },
  })
  .then(response => response.json())
  .then(response => {
    let dataResponse = response.dataSource;
    const dataEvents = dataResponse.map((item, index) => {
      const startDay = eval((item['startDate'])).getDate(),
        startMonth = eval((item['startDate'])).getMonth() - 1,
        startYear = eval((item['startDate'])).getFullYear(),
        endDay = eval((item['endDate'])).getDate(),
        endMonth = eval((item['endDate'])).getMonth() - 1,
        endYear = eval((item['endDate'])).getFullYear();


      return object = {
        name: item['name'],
        color: item['color'],
        startDate: new Date(startYear, startMonth, startDay),
        endDate: new Date(endYear, endMonth, endDay),
        description: item['description'],
        priority: item['priority'],
        display: item['display'],
      }



    })

    new Calendar(calendar, {
      style: 'background',
      mouseOnDay: (e) => {
        if (e.events.length > 0) {
          let content = '';
          for (let i in e.events) {
            if (e.events[i].display === true) {
              content += `<div id="tooltip" class="event-tooltip-content" style="display: block" role="tooltip">
               <div class="event-name">
         ${e.events[i].name}</div>
         <div class="event-description">${e.events[i].description}</div>
         <div id="arrow" data-popper-arrow></div>
         </div>`
            }
            e.element.innerHTMl = content;
            e.element.setAttribute('id', 'day-display')
          }
          let idDay = document.querySelector('#day-display');
          let eventContainer = document.createElement('div');
          idDay.insertBefore(eventContainer, idDay.childNodes[0]);

          idDay.querySelector('div').innerHTML = content;


          function create() {
            popperInstance = Popper.createPopper(e.element, content, {

              modifiers: [{
                name: 'offset',
                options: {
                  offset: [100, 50]
                },
              }, ],

            });
          }

          function show() {
            if (calendar.hasAttribute('#tooltip')) {
              document.querySelector('#tooltip').setAttribute('data-show', '');
              create();
            }
          }
          const showEvents = ['mouseenter', 'focus'];
          showEvents.forEach(event => {
            e.element.addEventListener(event, show);
          });

        }
      },
      mouseOutDay: function (e) {
        if (e.events.length > 0) {
          function destroy() {
            if (popperInstance) {
              popperInstance.destroy();
              popperInstance = null;
            }
          }

          function hide() {

            destroy();
          }
          const hideEvents = ['mouseleave', 'blur'];
          hideEvents.forEach(event => {
            e.element.addEventListener(event, hide);
          });

          let idDay = document.querySelector('#day-display');
          let tooltip = idDay.querySelector('div');
          tooltip.remove();
          idDay.removeAttribute('id');
        }
      },
      dayContextMenu: function (e) {


        function destroy() {
          if (popperInstance) {
            popperInstance.destroy();
            popperInstance = null;
          }
        }

        function hide() {
          document.querySelector('#tooltip').removeAttribute('data-show');
          destroy();
        }
        const hideEvents = ['mouseleave', 'blur'];
        hideEvents.forEach(event => {
          e.element.addEventListener(event, hide);
        });
      },

      dataSource: dataEvents,
    });


    // function to get dataes
    function dispayElWithCommonDate() {
      let newArray = [];
      dataEvents.map((item, index) => {
        newArray.push(`${item.startDate}-${item.endDate}`);

        var getDates = function (newDateS, endDateE) {
          let dates = [];
          currentDate = newDateS;
          addDays = function (days) {
            var date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
          };

          while (currentDate <= endDateE) {
            dates.push(currentDate);
            currentDate = addDays.call(currentDate, 1);
          }
          return dates;
        }


        let dates = getDates(item.startDate, item.endDate);


        newArray.push(dates);

        newArray = [].concat(...newArray)


        /// function check Duplicate dates
        function checkDuplicate(arra1) {
          let object = {};
          let result = [];
          arra1.forEach(item => {
            if (!object[item])
              object[item] = 0;
            object[item] += 1;
          })

          for (var prop in object) {
            if (object[prop] >= 2) {
              result.push(prop);
            }
          }

          return result;
        }

        let duplicateDate = checkDuplicate(newArray);

        duplicateDate.map((item, index) => {
          return object = {
            item: item,
          }
        })

        if (item.priority > 0) {
          let month = item.startDate.getMonth();
          let getMonths = document.querySelector('.months-container');
          let monthEl = getMonths.getElementsByClassName('month-container')[month]

          let findDay = monthEl.querySelectorAll(".day-content");
          let allDatesBetween = []
          datesBetween = getDates(item.startDate, item.endDate);

          allDatesBetween.push(datesBetween)
          allDatesBetween = [].concat(...allDatesBetween);
          let single = []

          for (let k = 0; k < allDatesBetween.length; k++) {

            single = allDatesBetween[k].getDate();

            for (let f = 0; f < findDay.length; f++) {

              if (findDay[f].innerHTML == single) {
                findDay[f].style.backgroundColor = `${item.color}`;
              }
            }

          }
        }

      })
    }

    dispayElWithCommonDate();
  })
  .catch(err => {
    new Calendar(calendar, {})
    let content = '';

    content += `<p class="err-info">Sorry, there is problem with connection. Events cannot be displayed.  Please try it later.</p>`;
    let newDiv = document.createElement('div');
    let pageId = document.querySelector('#post-53')
    pageId.insertBefore(newDiv, pageId.childNodes[0]);

    pageId.querySelector('div').innerHTML = content;


  });