<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap-wysihtml5.css')}}" />
<link rel="stylesheet" href="{{asset('public/backend/css/colorpicker.css')}}" />
<link rel="stylesheet" href="{{asset('public/backend/css/datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('public/backend/css/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('public/backend/css/select2.css')}}" />
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/backend/css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('public/backend/css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('public/backend/css/matrix-media.css')}}" />
<link href="{{asset('public/backend/font/css/font-awesome.css')}}" rel="stylesheet" />
<link href="{{asset('public/backend/font/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('public/backend/css/jquery.gritter.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php
        $name = Session::get('admin_name');
        if ($name) {
          echo $name;
        }

    ?>
      
    </span><b class="caret"></b></a>
      <ul class="dropdown-menu">
       {{--  <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li> --}}
        <li><a href="{{URL::to('/logout')}}"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
   {{--  <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li> --}}
    <li class=""><a title="" href="{{URL::to('/logout')}}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard2</a>
  <ul>
    <li ><a href="{{URL::to('/dashboard')}}"><i class="icon icon-home"></i> <span>Tổng Quan</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Danh Mục Sản Phẩm</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{URl::to('/add-category-product')}}">Thêm Danh Mục Sản Phẩm</a></li>
        <li><a href="{{URL::to('/all-category-product')}}">Liệt Kê Danh Mục Sản Phẩm</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon-bookmark"></i> <span>Thương Hiệu Sản Phẩm</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{URl::to('/add-brand-product')}}">Thêm Thương Hiệu Sản Phẩm</a></li>
        <li><a href="{{URL::to('/all-brand-product')}}">Liệt Kê Thương Hiệu Sản Phẩm</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon-truck"></i> <span>Sản Phẩm</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{URl::to('/add-product')}}">Thêm Sản Phẩm</a></li>
        <li><a href="{{URL::to('/all-product')}}">Liệt Kê Sản Phẩm</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon-truck"></i> <span>Đơn Hàng</span> <span class="label label-important">1</span></a>
      <ul>
        <li><a href="{{URl::to('/manage-order')}}">Quản Lý Đơn Hàng</a></li>
      </ul>
    </li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="{{URl::to('/all-category-product')}}"> <i class="icon icon-th"></i> Danh Mục Sản Phẩm </a> </li>
      <li class="bg_lg"> <a href="{{URl::to('/all-brand-product')}}"> <i class="icon icon-inbox"></i> Thương Hiệu Sản Phẩm</a> </li>
      <li class="bg_ly"> <a href="{{URl::to('/all-product')}}"> <i class="icon-shopping-cart"></i> Sản Phẩm </a> </li>
      <li class="bg_lo"> <a href="{{URl::to('/manage-order')}}"> <i class="icon icon-signal"></i> Đơn Hàng </a> </li>
    </ul>
  </div>
 @yield('admin_content')
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2020 &copy; Quang Admin. </div>
</div>
{{-- Link Validation JS --}}
<script src="http://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/formValidation.min.js"></script>
<script type="text/javascript">
  $.validate({

  });
</script>
{{-- CKEditor 4 --}}
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script> 
<script>
        CKEDITOR.replace('ckeditor1');
</script>
{{-- end CKEditor --}}
<!--end-Footer-part-->
<script src="{{asset('public/backend/js/bootstrap-colorpicker.js')}}"></script> 
<script src="{{asset('public/backend/js/bootstrap-datepicker.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.toggle.buttons.js')}}"></script> 
<script src="{{asset('public/backend/js/masked.js')}}"></script> 
<script src="{{asset('public/backend/js/matrix.form_common.js')}}"></script> 
<script src="{{asset('public/backend/js/bootstrap-wysihtml5.js')}}"></script> 
<script src="{{asset('public/backend/js/wysihtml5-0.3.0.js')}}"></script> 
<script src="{{asset('public/backend/js/excanvas.min.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.flot.min.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.flot.resize.min.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.peity.min.js')}}"></script> 
<script src="{{asset('public/backend/js/fullcalendar.min.js')}}"></script> 
<script src="{{asset('public/backend/js/matrix.js')}}"></script> 
<script src="{{asset('public/backend/js/matrix.dashboard.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.gritter.min.js')}}"></script> 
<script src="{{asset('public/backend/js/matrix.interface.js')}}"></script> 
<script src="{{asset('public/backend/js/matrix.chat.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.validate.js')}}"></script> 
<script src="{{asset('public/backend/js/matrix.form_validation.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.wizard.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.uniform.js')}}"></script> 
<script src="{{asset('public/backend/js/select2.min.js')}}"></script> 
<script src="{{asset('public/backend/js/matrix.popover.js')}}"></script> 
<script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('public/backend/js/matrix.tables.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap-wysihtml5.js')}}"></script>
<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
<script>
  $('.textarea_editor').wysihtml5();
</script>
</body>
</html>
