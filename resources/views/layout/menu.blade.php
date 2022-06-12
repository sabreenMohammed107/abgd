 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="background: #fff">
          <img src="{{ asset('webassets/imgs/logo.webp') }}" style="width:80%" alt="User Image" />

      </div>

      <ul class="sidebar-menu">
        {{-- <li class="header">MAIN NAVIGATION</li> --}}

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>الرئيسية</span> <i class="fa fa-angle-left pull-right"></i>
          </a>

        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span> إعدادات الموقع</span>
            <i class="fa fa-angle-left pull-right"></i>
            {{-- <span class="label label-primary pull-right">4</span> --}}
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('home-slider.index') }}"><i class="fa fa-circle-o"></i> السلايدر الرئيسي </a></li>
            <li><a href="{{ route('admin-company-contact.index') }}" ><i class="fa fa-circle-o"></i> بيانات التواصل</a></li>
            <li><a href="{{ route('admin-partners.index') }}"><i class="fa fa-circle-o"></i> شركاء النجاح</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>الشركة</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

              <li><a href="{{ route('whyus.index') }}"><i class="fa fa-circle-o"></i>  لماذا نحن</a></li>
              <li><a href="{{ route('how-register.index') }}"><i class="fa fa-circle-o"></i> كيفية التسجيل</a></li>


          </ul>
          </li>
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>المقالات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
             <li><a href="#"><i class="fa fa-circle-o"></i> عرض المقالات </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> انشاء مقالة </a></li>


          </ul>
        </li> --}}
        {{-- <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>الخدمات</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
               <li><a href="#"><i class="fa fa-circle-o"></i> خدمات الشركة </a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> نصائح عامة </a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> نصائح زراعية </a></li>


            </ul>
          </li> --}}

        <li class="treeview">
            <a href="">
              <i class="fa fa-edit"></i>
              <span> تسجيلات القروض</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{route('client.index')}}"><i class="fa fa-circle-o text-red"></i> <span>   العملاء</span></a>

            </ul>
          </li>
          <li class="treeview">
            <a href="">
              <i class="fa fa-edit"></i>
              <span>الاسئلة الشائعة</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{route('faq.index')}}"><i class="fa fa-circle-o text-red"></i> <span>الاسئلة الشائعة</span></a>
                </li>

              </ul>
          </li>

          <li class="treeview">
            <a href="">
              <i class="fa fa-edit"></i>
              <span> الرسائل</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{route('message.index')}}"><i class="fa fa-circle-o text-red"></i> <span>رسائل التواصل</span></a>
                </li>

              </ul>
          </li>

          <li class="treeview">
            <a href="">
              <i class="fa fa-edit"></i>
              <span>المستخدمين</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{route('users.index')}}"><i class="fa fa-circle-o text-red"></i> <span>قائمه المستخدمين</span></a>
                </li>
                 {{-- <li>
                    <a href="{{route('roles.index')}}"><i class="fa fa-circle-o text-red"></i> <span>  قائمه الصلاحيات</span></a>
                </li> --}}
              </ul>
          </li>


     </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
