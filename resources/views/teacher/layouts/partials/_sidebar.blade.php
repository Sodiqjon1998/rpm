<div class="vertical-menu" style="background: url({{asset('images/staticImages/backend/bg2.png')}});">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{asset('images/staticImages/teacherImgStatic/teacherGl.png')}}" style="width: 85px !important;" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{Auth::user()->name}}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('teacher')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('teacher.groups.index')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Sinflar</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('teacher.quiz.index')}}" class=" waves-effect">
                        <i class=" fas fa-question"></i>
                        <span>Quiz</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('teacher.questionItems.index')}}" class=" waves-effect">
                        <i class="mdi-text-subject"></i>
                        <span>Imtixon savollari</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('teacher.groups.index')}}" class=" waves-effect">
                        <i class="ri-group-fill"></i>
                        <span>Guruhlar</span>
                    </a>
                </li>

                {{-- <li class="menu-title">Components</li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pencil-ruler-2-line"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">Alerts</a></li>
                    </ul>
                </li> --}}


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
