<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />

    <!-- for Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- for Bootstrap 4 -->
    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>

    <link href='fullcalendar/lib/main.css' rel='stylesheet' />
    <script src='fullcalendar/lib/main.js'></script>
    <script src='fullcalendar/lib/theme-chooser.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar;

            initThemeChooser({

                init: function(themeSystem) {
                    calendar = new FullCalendar.Calendar(calendarEl, {
                        themeSystem: themeSystem,
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                        },
                        initialDate: '2020-09-12',
                        weekNumbers: true,
                        navLinks: true, // can click day/week names to navigate views
                        editable: true,
                        selectable: true,
                        nowIndicator: true,
                        dayMaxEvents: true, // allow "more" link when too many events
                        // showNonCurrentDates: false,
                        events: [{
                                title: 'All Day Event',
                                start: '2020-09-01'
                            },
                            {
                                title: 'Long Event',
                                start: '2020-09-07',
                                end: '2020-09-10'
                            },
                            {
                                groupId: 999,
                                title: 'Repeating Event',
                                start: '2020-09-09T16:00:00'
                            },
                            {
                                groupId: 999,
                                title: 'Repeating Event',
                                start: '2020-09-16T16:00:00'
                            },
                            {
                                title: 'Conference',
                                start: '2020-09-11',
                                end: '2020-09-13'
                            },
                            {
                                title: 'Meeting',
                                start: '2020-09-12T10:30:00',
                                end: '2020-09-12T12:30:00'
                            },
                            {
                                title: 'Lunch',
                                start: '2020-09-12T12:00:00'
                            },
                            {
                                title: 'Meeting',
                                start: '2020-09-12T14:30:00'
                            },
                            {
                                title: 'Happy Hour',
                                start: '2020-09-12T17:30:00'
                            },
                            {
                                title: 'Dinner',
                                start: '2020-09-12T20:00:00'
                            },
                            {
                                title: 'Birthday Party',
                                start: '2020-09-13T07:00:00'
                            },
                            {
                                title: 'Click for Google',
                                url: 'http://google.com/',
                                start: '2020-09-28'
                            }
                        ]
                    });
                    calendar.render();
                },

                change: function(themeSystem) {
                    calendar.setOption('themeSystem', themeSystem);
                }

            });

        });
    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        #top,
        #calendar.fc-theme-standard {
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        }

        #calendar.fc-theme-bootstrap {
            font-size: 14px;
        }

        #top {
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            font-size: 12px;
            color: #000;
        }

        #top .selector {
            display: inline-block;
            margin-right: 10px;
        }

        #top select {
            font: inherit;
            /* mock what Boostrap does, don't compete  */
        }

        .left {
            float: left
        }

        .right {
            float: right
        }

        .clear {
            clear: both
        }

        #calendar {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 10px;
        }
    </style>
</head>

<body>

    <div id='top'>

        <div class='left'>

            <div id='theme-system-selector' class='selector'>
                Theme System:
                <select>
                    <option value='bootstrap5' selected>Bootstrap 5</option>
                    <option value='bootstrap'>Bootstrap 4</option>
                    <option value='standard'>unthemed</option>
                </select>
            </div>

            <div data-theme-system="bootstrap,bootstrap5" class='selector' style='display:none'>
                Theme Name:
                <select>
                    <option value='' selected>Default</option>
                    <option value='cerulean'>Cerulean</option>
                    <option value='cosmo'>Cosmo</option>
                    <option value='cyborg'>Cyborg</option>
                    <option value='darkly'>Darkly</option>
                    <option value='flatly'>Flatly</option>
                    <option value='journal'>Journal</option>
                    <option value='litera'>Litera</option>
                    <option value='lumen'>Lumen</option>
                    <option value='lux'>Lux</option>
                    <option value='materia'>Materia</option>
                    <option value='minty'>Minty</option>
                    <option value='pulse'>Pulse</option>
                    <option value='sandstone'>Sandstone</option>
                    <option value='simplex'>Simplex</option>
                    <option value='sketchy'>Sketchy</option>
                    <option value='slate'>Slate</option>
                    <option value='solar'>Solar</option>
                    <option value='spacelab'>Spacelab</option>
                    <option value='superhero'>Superhero</option>
                    <option value='united'>United</option>
                    <option value='yeti'>Yeti</option>
                </select>
            </div>

            <span id='loading' style='display:none'>loading theme...</span>

        </div>

        <div class='right'>
            <span class='credits' data-credit-id='bootstrap-standard' style='display:none'>
                <a href='https://getbootstrap.com/docs/3.3/' target='_blank'>Theme by Bootstrap</a>
            </span>
            <span class='credits' data-credit-id='bootstrap-custom' style='display:none'>
                <a href='https://bootswatch.com/' target='_blank'>Theme by Bootswatch</a>
            </span>
        </div>

        <div class='clear'></div>
    </div>

    <div id='calendar'></div>

</body>

</html>