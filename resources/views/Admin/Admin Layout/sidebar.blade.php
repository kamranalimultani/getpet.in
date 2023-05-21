<aside class="main-sidebar sidebar-dark-primary elevation-4">
   {{-- <a href="index3.html" class="brand-link">
   <img src="{{asset('/images/Logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  
   </a> --}}
   <div class="sidebar">
      
      <a href="https://www.getpet.in" class="brand-link">
         {{-- <img src="http://15.206.87.117/suvarnakar-new/public/Theme2/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
         <span class="brand-text font-weight-light">GetPet.in</span>
         </a>
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item  ">
               <a href="{{url('admin/dashboard')}}" class="nav-link {{Request::is('admin/dashboard') ? 'active':''}}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                     </p>
               </a>
            </li>
            {{-- <li class="nav-item ">
               <a href="#" class="nav-link   ">
                  <i class="fa fa-cog
                  "></i>
                  <p>
                     Manage UI
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/ui/slider/list')}}" class="nav-link {{Request::is('admin/ui/slider/list') ? 'active':''}}">
                        <i class="fa fa-pen"></i>
                        <p class="ml-2">Slider</p>
                     </a>
                  </li>
                  
               </ul>
            </li> --}}
            <li class="nav-item">
               <a href="{{url('admin/category/list')}}" class="nav-link {{Request::is('admin/category/list') ? 'active':''}}">
                  <i class="fa fa-th-list
                  "></i>
                  <p>
                     Manage Category
                     </p>
               </a>
            </li>
            {{-- <li class="nav-item">
               <a href="{{url('admin/posts/tags')}}" class="nav-link {{Request::is('admin/posts/tags') ? 'active':''}}">
                  <i class=" fa fa-tags"
                  ></i>
                  <p>
                     Manage Posts Tags
                     </p>
               </a>
            </li> --}}
            
            {{-- <li class="nav-item">
               <a href="{{url('admin/posts')}}" class="nav-link {{Request::is('admin/posts') ? 'active':''}}">
                  <i class="fa fa-th-list
                  "></i>
                  <p>
                     Manage Blog Posts 
                     </p>
               </a>
            </li> --}}
            
            <li class="nav-item {{Request::is('admin/products/list')  ||Request::is('admin/products/add') ? ' menu-is-opening menu-open':''}} ">
               <a href="#" class="nav-link   ">
                  <i class="fa fa-paw"></i>
                  <p>
                     Manage Products
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/products/list')}}" class="nav-link {{Request::is('admin/products/list') ? 'active':''}}">
                        <i class="far fa-map nav-icon"></i>
                        <p>All Products</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('admin/products/add')}}" class="nav-link {{Request::is('admin/products/add') ? 'active':''}}">
                        <i class="fa fa-plus"></i>
                        <p>Add Products</p>
                     </a>
                  </li>
                  
               </ul>
            </li>
            {{-- reqeust --}}
            
            <li class="nav-item {{Request::is('admin/requests')  ||Request::is('admin/requests') ? ' menu-is-opening menu-open':''}} ">
               <a href="{{url('admin/requests')}}" class="nav-link   ">
                  <i class="fa fa-paw"></i>
                  <p>
                     Manage Requests
                  </p>
               </a>
               
            </li>
               
           
         </ul>
           
          
            
           
               
            
               
      </nav>
   </div>
</aside>