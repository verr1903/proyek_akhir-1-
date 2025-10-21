 @php
 $pesananOnlineActive = request()->routeIs('pesananOnlineAdmin');
 $pesananOfflineActive = request()->routeIs('pesananOfflineAdmin');
 $pesananActive = $pesananOnlineActive || $pesananOfflineActive;
 @endphp

 <aside id="leftsidebar" class="sidebar">

     <!-- Menu -->
     <div class="menu">
         <ul class="list mt-4">
             <li class="{{ Route::is('dashboardAdmin') ? 'active' : '' }}">
                 <a class="py-4 px-4 d-flex align-items-center" href="{{ route('dashboardAdmin') }}">
                     <i class="zmdi zmdi-view-dashboard me-2"></i>
                     <span>Dashboard</span>
                 </a>
             </li>

             <li class="{{ Route::is('produkAdmin') ? 'active' : '' }}">
                 <a class="py-4 px-4 d-flex align-items-center" href="{{ route('produkAdmin') }}">
                     <i class="zmdi zmdi-shopping-basket me-2"></i>
                     <span>Produk</span>
                 </a>
             </li>
             <li class="{{ $pesananActive ? 'active open' : '' }}">
                 <a href="javascript:void(0);"
                     class="menu-toggle py-4 px-4 d-flex align-items-center {{ $pesananActive ? 'toggled' : '' }}">
                     <i class="zmdi zmdi-receipt me-2"></i><span>Pesanan</span>
                 </a>

                 <ul class="ml-menu">
                     <li>
                         <a href="{{ route('pesananOnlineAdmin') }}"
                             class="py-4 px-4 d-flex align-items-center {{ $pesananOnlineActive ? 'active-menu' : '' }}">
                             <span>Pesanan Online</span>
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('pesananOfflineAdmin') }}"
                             class="py-4 px-4 d-flex align-items-center {{ $pesananOfflineActive ? 'active-menu' : '' }}">
                             <span>Pesanan Offline</span>
                         </a>
                     </li>
                 </ul>
             </li>


             <li class="{{ Route::is('iklanAdmin') ? 'active' : '' }}">
                 <a class="py-4 px-4 d-flex align-items-center" href="{{ route('iklanAdmin') }}">
                     <i class="zmdi zmdi-notifications-active"></i>
                     <span>Iklan</span>
                 </a>
             </li>


             <li class="{{ Route::is('diskonAdmin') ? 'active' : '' }}">
                 <a class="py-4 px-4 d-flex align-items-center" href="{{ route('diskonAdmin') }}">
                     <i class="zmdi zmdi-label"></i>
                     <span>Diskon</span>
                 </a>
             </li>

             <li class="{{ Route::is('karyawanAdmin') ? 'active' : '' }}">
                 <a class="py-4 px-4 d-flex align-items-center" href="{{ route('karyawanAdmin') }}">
                     <i class="zmdi zmdi-accounts"></i>
                     <span>Karyawan</span>
                 </a>
             </li>

             <li>
                 <a class="py-4 px-4" href=>
                     <i class="zmdi zmdi-chart"></i>
                     <span>Laporan</span>
                 </a>
             </li>

         </ul>
     </div>
     <!-- #Menu -->
 </aside>