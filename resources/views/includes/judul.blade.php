<!-- page title area start -->
<div class="page-title-area">
   <div class="row align-items-center">
       <div class="col-sm-6">
           <div class="breadcrumbs-area clearfix">
               <h4 class="page-title pull-left">{{$judul}}</h4>
               <ul class="breadcrumbs pull-left">
                   <li><a href="{{redirect('/')}}">Home</a></li>
                   <li><a>{{$judul}}</a></li>
                   @if ($subjudul)
                        <li><a>{{$subjudul}}</a></li>   
                   @endif
               </ul>
           </div>
       </div>
       <div class="col-sm-6 clearfix">
           <div class="user-profile pull-right">
               <img class="avatar user-thumb" src="{{asset('assets/images/author/avatar.png')}}" alt="avatar">
               <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Riway Restu Islami Yudha</h4>
           </div>
       </div>
   </div>
</div>
<!-- page title area end -->