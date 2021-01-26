<!-- sidebar menu area start -->
<div class="sidebar-menu">
   <div class="sidebar-header">
       <div class="logo">
           <h2 style="color: white; font-weight: bold;">Futsal App</h2>
           {{-- <a href="#"><img src="{{asset('assets/images/icon/logo.png')}}" alt="logo"></a> --}}
       </div>
   </div>
   <div class="main-menu">
       <div class="menu-inner">
           <nav>
               <ul class="metismenu" id="menu">
                   {{-- <li class="active">
                       <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                       <ul class="collapse">
                           <li class="active"><a href="#">Active Menu Item</a></li>
                           <li><a href="#">Menuitem 2</a></li>
                           <li><a href="#">Menuitem 3</a></li>
                       </ul>
                   </li> --}}
                   <li><a href="{{route('promo.index')}}"><i class="ti-map-alt"></i><span>Promo</span></a></li>
                   <li><a href="{{route('food.index')}}"><i class="ti-map-alt"></i><span>Food & Beverages</span></a></li>
                   <li><a href="{{route('hour.index')}}"><i class="ti-map-alt"></i><span>Hour Booking</span></a></li>
                   {{-- <li>
                       <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i>
                           <span>Multi
                               level menu</span></a>
                       <ul class="collapse">
                           <li><a href="#">Item level (1)</a></li>
                           <li><a href="#">Item level (1)</a></li>
                           <li><a href="#" aria-expanded="true">Item level (1)</a>
                               <ul class="collapse">
                                   <li><a href="#">Item level (2)</a></li>
                                   <li><a href="#">Item level (2)</a></li>
                                   <li><a href="#">Item level (2)</a></li>
                               </ul>
                           </li>
                           <li><a href="#">Item level (1)</a></li>
                       </ul>
                   </li> --}}
               </ul>
           </nav>
       </div>
   </div>
</div>
<!-- sidebar menu area end -->