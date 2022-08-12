<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Booking - Pole Dancing</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="landing_view/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="landing_view/css/styles.css" rel="stylesheet" />


    <!-- for Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- calendar -->
    <link href='fullcalendar/lib/main.css' rel='stylesheet' />
    <script src='fullcalendar/lib/main.js'></script>
    <script src='fullcalendar/lib/theme-chooser.js'></script>

    <!-- style calendar -->
    <style>
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

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <!-- <a class="navbar-brand" href="#page-top"><img src="landing_view/assets/img/navbar-logo.svg" alt="..." /></a> -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">

                <?php if (isset($info_user_email)) { ?>

                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link text-info"> <?php echo $info_user_nicename ?> </a> </li>
                        <li class="nav-item"><a class="nav-link" href="https://booking.meisewcial.vn/dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://booking.meisewcial.vn/logout">Log Out</a></li>
                    </ul>

                <?php } else { ?>

                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="https://booking.meisewcial.vn/login">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://booking.meisewcial.vn/register">Register</a></li>
                    </ul>

                <?php } ?>

            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading"> Pole dancing !</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <!-- <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a> -->
        </div>
    </header>


    <!-- Calendar full -->

    <div id='top' style="display: none;">

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

    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">

            <div class="text-center">
                <h2 class="section-heading text-uppercase">Booking - Pole dancing</h2>
                <h3 class="section-subheading text-muted">ann.interior@gmail.com</h3>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <!-- <img class="mx-auto rounded-circle" src="landing_view/assets/img/team/1.jpg" alt="..." />
                        <h4>Parveen Anand</h4>
                        <p class="text-muted">Lead Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="landing_view/assets/img/logo.png" alt="..." />
                        <h4>Mai Ann ( 梅 瓊 瑛 ) </h4>
                        <p class="text-muted">Lead </p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <!-- <img class="mx-auto rounded-circle" src="landing_view/assets/img/team/3.jpg" alt="..." />
                        <h4>Larry Parker</h4>
                        <p class="text-muted">Lead Developer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Pole Dancing (múa cột) khi lột bỏ hoàn toàn lớp mặt nạ “vịt con xấu xí” của mình sẽ để lộ ra trái tim thuần khiết, đẹp đẽ và đầy nghệ thuật của một con thiên nga đích thực.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->

    <!-- Portfolio Modals-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="landing_view/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


    <!-- script full calendar -->
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
</body>

</html>