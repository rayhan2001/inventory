@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{asset($user->image)}}" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{$user->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('user.show',$user->id)}}"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li>
                            <a href="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"><i class="md md-settings-power"></i> Logout</a>
                            <form action="{{'logout'}}" method="post" id="logoutForm">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

                <p class="text-muted m-0">
                    <span>{{$user->subtitle}}</span>
                </p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md-account-circle"></i><span> Users </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('user.index')}}">All Users</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md-account-child"></i><span> Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('employee.create')}}">Add Employee</a></li>
                        <li><a href="{{route('employee.index')}}">All Employee</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md-perm-identity"></i><span> Customer </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('customer.create')}}">Add Customer</a></li>
                        <li><a href="{{route('customer.index')}}">All Customer</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md-shopping-basket"></i><span> Supplier </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('supplier.create')}}">Add Supplier</a></li>
                        <li><a href="{{route('supplier.index')}}">All Supplier</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md-payment"></i><span>Advance Salary </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('salary.create')}}">Add Salary</a></li>
                        <li><a href="{{route('salary.index')}}">All Salary</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md-color-lens"></i><span>Category </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('category.create')}}">Add Category</a></li>
                        <li><a href="{{route('category.index')}}">All Category</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md-store"></i><span>Products </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('product.create')}}">Add Product</a></li>
                        <li><a href="{{route('product.index')}}">All Product</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
