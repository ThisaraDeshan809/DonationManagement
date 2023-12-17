<div class="page-sidebar">
    <div class="logo-box">
        <a href="#"  id="sidebar-close">
            <i class="material-icons">close</i>
        </a>
    </div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="active-page">
                <a href="index.html" class="active"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="material-icons">apps</i>Donators<i class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('Donator.index')}}">Manage Donators</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons">apps</i>Donations<i class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('Donation.New')}}">Create New</a>
                    </li>
                    <li>
                        <a href="{{route('Donation.Index')}}">Manage Donations</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons">input</i>Issuers<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="">Manage Issuers</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons">bookmark_border</i>Issues<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('Issue.New')}}">Create New</a>
                    </li>
                    <li>
                        <a href="{{route('Issue.Index')}}">Manage Issues</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons">access_time</i>Products<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="">Create New</a>
                    </li>
                    <li>
                        <a href="">Manage Products</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons">map</i>Inventory<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="">Manage Inventory</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
