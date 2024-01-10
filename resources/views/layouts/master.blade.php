<html lang="{{ app()->getLocale() }}">
<head>
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PROJECTFLOW') }}</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90680653-2');


        .circle-initials {
        position: absolute;
        top: 50%;
        left: -50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        border-radius: 50%;
        background-color: #f2f2f2;
        color: #333;
        }


    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <!-- <meta name="twitter:site" content="@bootstrapdash">
    <meta name="twitter:creator" content="@bootstrapdash">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png"> -->

    <!-- Facebook -->
    <!-- <meta property="og:url" content="https://www.bootstrapdash.com/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600"> -->

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Dashboard</title>

    <!-- vendor css -->
    <link href=" {{ asset( "web/lib/fontawesome-free/css/all.min.css")}} " rel="stylesheet">
    <link href=" {{ asset( "web/lib/ionicons/css/ionicons.min.css" )}} " rel="stylesheet">
    <link href=" {{ asset( "web/lib/typicons.font/typicons.css" )}}" rel="stylesheet">
    <link href=" {{ asset( "web/lib/flag-icon-css/css/flag-icon.min.css" )}} " rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href=" {{ asset("web/css/azia.css")}} ">





  </head>

<body>


    <div class="az-header">
        <div class="container">
          <div class="az-header-left">
            <a href="index.blade.php" class="az-logo"> </span> PROJECTFLOW </a>
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
          </div><!-- az-header-left -->
          <div class="az-header-menu">
            <div class="az-header-menu-header">
              <a href="index.blade.php" class="az-logo"><span></span> PROJECTFLOW </a>
              <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
          </div><!-- az-header-menu -->
          <div class="az-header-right">
            <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
            <div class="az-header-message">
              <a href="#"><i class="typcn typcn-messages"></i></a>
            </div><!-- az-header-message -->
            <div class="dropdown az-header-notification">
              <a href="" class="new"><i class="typcn typcn-bell"></i></a>
              <div class="dropdown-menu">
                <div class="az-dropdown-header mg-b-20 d-sm-none">
                  <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                </div>
                <h6 class="az-notification-title">Notifications</h6>
                <p class="az-notification-text">You have 2 unread notification</p>
                <div class="az-notification-list">
                  <div class="media new">
                    <div class="az-img-user"><img src=" {{ asset ("web/img/faces/face2.jpg")}} " alt=""></div>
                    <div class="media-body">
                      <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                      <span>Mar 15 12:32pm</span>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media new">
                    <div class="az-img-user online"><img src=" {{ asset ("web/img/faces/face2.jpg")}} " alt=""></div>
                    <div class="media-body">
                      <p><strong>Joyce Chua</strong> just created a new blog post</p>
                      <span>Mar 13 04:16am</span>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media">

                    <div class="az-img-user"><img src=" {{asset ("web/img/faces/face4.jpg")}} " alt=""></div>
                    <div class="media-body">
                      <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                      <span>Mar 13 02:56am</span>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media">
                    <div class="az-img-user"><img src=" {{asset ("web/img/faces/face5.jpg")}} " alt=""></div>
                    <div class="media-body">
                      <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                      <span>Mar 12 10:40pm</span>
                    </div><!-- media-body -->
                  </div><!-- media -->
                </div><!-- az-notification-list -->
                <div class="dropdown-footer"><a href="">View All Notifications</a></div>
              </div><!-- dropdown-menu -->
            </div><!-- az-header-notification -->
            <div class="dropdown az-profile-menu">
              <a href="" class="az-img-user"><img src=" {{ asset("web/img/faces/face1.jpg")}} " alt=""></a>
              <div class="dropdown-menu">
                <div class="az-dropdown-header d-sm-none">
                  <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                </div>
                <div class="az-header-profile">
                  <div class="az-img-user">
                    <img src=" {{ asset("web/img/faces/face1.jpg")}}" alt="">
                  </div><!-- az-img-user -->
                  <h6>Aziana Pechon</h6>
                  <span>Premium Member</span>
                </div><!-- az-header-profile -->

                <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
                <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">




                    <i class="typcn typcn-power-outline"></i> Sign Out</a>
              </div><!-- dropdown-menu -->
            </div>
          </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->







    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a></li>
                            <li><a class="nav-link" href="{{ route('type_projets.index') }}">Manage Type de projet</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" >
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>






        </nav>


        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>









    <div class="az-footer ht-40">
        <div class="container ht-100p pd-t-0-f">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
            Copyright © germetech.com</span>

        </div><!-- container -->
      </div><!-- az-footer -->


      <script src="{{ asset("web/lib/jquery/jquery.min.js") }}"></script>
      <script src="{{ asset("web/lib/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
      <script src="{{ asset("web/lib/ionicons/ionicons.js") }}"></script>
      <script src="{{ asset("web/lib/jquery.flot/jquery.flot.js") }}"></script>
      <script src="{{ asset("web/lib/jquery.flot/jquery.flot.resize.js") }}."></script>
      <script src="{{ asset("web/lib/chart.js/Chart.bundle.min.js") }}"></script>
      <script src="{{ asset("web/lib/peity/jquery.peity.min.js") }}"></script>

      <script src="{{ asset("web/js/azia.js") }}"></script>
      <script src="{{ asset("web/js/chart.flot.sampledata.js") }}"></script>
      <script src="{{ asset("web/js/dashboard.sampledata.js") }}"></script>
      <script src="{{ asset("web/js/jquery.cookie.js") }}" type="text/javascript" ></script>
      <script>
        $(function(){
          'use strict'

              var plot = $.plot('#flotChart', [{
            data: flotSampleData3,
            color: '#007bff',
            lines: {
              fillColor: { colors: [{ opacity: 0 }, { opacity: 0.2 }]}
            }
          },{
            data: flotSampleData4,
            color: '#560bd0',
            lines: {
              fillColor: { colors: [{ opacity: 0 }, { opacity: 0.2 }]}
            }
          }], {
                  series: {
                      shadowSize: 0,
              lines: {
                show: true,
                lineWidth: 2,
                fill: true
              }
                  },
            grid: {
              borderWidth: 0,
              labelMargin: 8
            },
                  yaxis: {
              show: true,
                      min: 0,
                      max: 100,
              ticks: [[0,''],[20,'20K'],[40,'40K'],[60,'60K'],[80,'80K']],
              tickColor: '#eee'
                  },
                  xaxis: {
              show: true,
              color: '#fff',
              ticks: [[25,'OCT 21'],[75,'OCT 22'],[100,'OCT 23'],[125,'OCT 24']],
            }
          });

          $.plot('#flotChart1', [{
            data: dashData2,
            color: '#00cccc'
          }], {
                  series: {
                      shadowSize: 0,
              lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.2 } ] }
              }
                  },
            grid: {
              borderWidth: 0,
              labelMargin: 0
            },
                  yaxis: {
              show: false,
              min: 0,
              max: 35
            },
                  xaxis: {
              show: false,
              max: 50
            }
              });

          $.plot('#flotChart2', [{
            data: dashData2,
            color: '#007bff'
          }], {
                  series: {
                      shadowSize: 0,
              bars: {
                show: true,
                lineWidth: 0,
                fill: 1,
                barWidth: .5
              }
                  },
            grid: {
              borderWidth: 0,
              labelMargin: 0
            },
                  yaxis: {
              show: false,
              min: 0,
              max: 35
            },
                  xaxis: {
              show: false,
              max: 20
            }
              });


          //-------------------------------------------------------------//


          // Line chart
          $('.peity-line').peity('line');

          // Bar charts
          $('.peity-bar').peity('bar');

          // Bar charts
          $('.peity-donut').peity('donut');

          var ctx5 = document.getElementById('chartBar5').getContext('2d');
          new Chart(ctx5, {
            type: 'bar',
            data: {
              labels: [0,1,2,3,4,5,6,7],
              datasets: [{
                data: [2, 4, 10, 20, 45, 40, 35, 18],
                backgroundColor: '#560bd0'
              }, {
                data: [3, 6, 15, 35, 50, 45, 35, 25],
                backgroundColor: '#cad0e8'
              }]
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                enabled: false
              },
              legend: {
                display: false,
                  labels: {
                    display: false
                  }
              },
              scales: {
                yAxes: [{
                  display: false,
                  ticks: {
                    beginAtZero:true,
                    fontSize: 11,
                    max: 80
                  }
                }],
                xAxes: [{
                  barPercentage: 0.6,
                  gridLines: {
                    color: 'rgba(0,0,0,0.08)'
                  },
                  ticks: {
                    beginAtZero:true,
                    fontSize: 11,
                    display: false
                  }
                }]
              }
            }
          });

          // Donut Chart
          var datapie = {
            labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
            datasets: [{
              data: [25,20,30,15,10],
              backgroundColor: ['#6f42c1', '#007bff','#17a2b8','#00cccc','#adb2bd']
            }]
          };

          var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
              display: false,
            },
            animation: {
              animateScale: true,
              animateRotate: true
            }
          };

          // For a doughnut chart
          var ctxpie= document.getElementById('chartDonut');
          var myPieChart6 = new Chart(ctxpie, {
            type: 'doughnut',
            data: datapie,
            options: optionpie
          });

        });
      </script>


</body>
</html>
