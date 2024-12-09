<html>


    <head>
        <title>@yield('title', 'Application')</title>

        <link rel="stylesheet" href="{{ asset('CSS/homepage.css') }}">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />
    </head>

    <body>
        <header>
            <div class="top-nav">
              <!-- <div class="top-nav-list"> -->
              <div class="top-nav-wrap">
                <nav class="nav-container">
                  <ul class="nav-list">
                    <?php if(!session('firstName')){
                        ?>
                        <li><a href="/register">Register</a></li>
                    <?php
                    }
                    ?>
                    
                  </ul>
                </nav>
                <nav class="main-login">
                  <div class="login-menu">
                    <div class="menu">
                      <div class="menu-toggle">
                        <div class='login_button'>
                            <?php if(session('firstName')){
                            ?>
                            <a href='/logout'>
                                <button type="button">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <span>LOG OUT</span>
                            </div>
                                </button>
                            </a>                            
                            <?php
                            }
                            else{
                                ?>
                            <a href='/login'>
                                <button type="button">
                                    <i class="bi bi-person-lines-fill"></i>
                                    <span>LOG IN</span>
                            </div>
                                </button>
                            </a>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                  </div>
                </nav>
              </div>
              <!-- </div> -->
            </div>
            <div class="main-nav">
              <div class="top-nav-list">
                <div class="top-nav-wrap">
                  <!-- <span class="img-class">Entropy Gardens</span> -->
                  {{-- <img class="img-class" src="/images/goat.jpg" alt="Logo" /> --}}
                  <nav class="nav-container">
                    <ul class="nav-list-two">

                        <?php if(session('accesslevel') == 1 || session('accesslevel') == 2){ ?> 
                            <li><a href="/">Home</a></li>
                        <?php } ?>
                        <?php if(session('accesslevel') == 3){ ?> 
                            <li><a href="/doctorH">Home</a></li>
                        <?php } ?>
                        <?php if(session('accesslevel') == 4){ ?> 
                            <li><a href="/caregiverH">Home</a></li>
                        <?php } ?>
                        <?php if(session('accesslevel') == 5){ ?> 
                            <li><a href="/patient">Patient Home</a></li>
                        <?php } ?>
                        <?php if(session('accesslevel') == 6){ ?> 
                            <li><a href="/family">Home</a></li>
                        <?php } ?>

                        <?php if(session('accesslevel') == 1){ ?> 
                            <li><a href="/roles">Roles</a></li>
                            <li><a href="/payment">Payments</a></li>
                        <?php } ?>

                        <?php if(session('accesslevel') == 1 || session('accesslevel') == 2){ ?> 
                            <li><a href="/additional">Information</a></li>
                            <li><a href="/appointments">Appointments</a></li>
                            <li><a href="/employees">Employees</a></li>
                            <li><a href="/approval">Approval</a></li>
                            <li><a href="/newRoster">New Roster</a></li>
                            <li><a href="/report">Reports</a></li>
                        <?php } ?>

                        <?php if(session('accesslevel') == 1 || session('accesslevel') == 2 || session('accesslevel') == 3 || session('accesslevel') == 4){ ?> 
                            <li><a href="/PatientsList">Patients</a></li>
                        <?php } ?>

                        <?php if(session('accesslevel')){ ?> 
                            <li><a href="/roster">Rosters</a></li>
                        <?php } ?>

                        <?php if(session('accesslevel' == 3)){ ?> 
                            <li><a href="/doctor_patients">Your Patients</a></li>
                        <?php } ?>


                        
                        {{-- <li><a href="">Patients & Visitors</a></li>
                        <li><a href="">Service & Treatments</a></li>
                        <li><a id="get-care-now" href="">Get Care Now</a></li>
                        <li>
                            <a href=""><i class="bi bi-search"></i></a>
                        </li> --}}
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </header>
        <main class='main'>
            <div class=container-header>
                @yield('content')
            </div>
        </main>
    </body>
</html>