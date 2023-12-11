<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_employees" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people-fill"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_employees" class="nav-content collapse " data-bs-parent="#sidebar-nav_employees">
                <li>
                    <a href="{{route('employee_details_create')}}">
                        <i class="bi bi-circle"></i><span>Add Employee</span>
                    </a>
                    <a href="{{route('employee_details_index')}}">
                        <i class="bi bi-circle"></i><span>All Employee</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_skills" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people-fill"></i><span>Skills</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_skills" class="nav-content collapse " data-bs-parent="#sidebar-nav_skills">
                <li>
                    <a href="{{route('skill_details_create')}}">
                        <i class="bi bi-circle"></i><span>Add Skill</span>
                    </a>
                    <a href="{{route('skill_details_index')}}">
                        <i class="bi bi-circle"></i><span>All Skill</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->


    </ul>

</aside>
