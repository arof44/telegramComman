 <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link active"
                               href="{{url('dashboard')}}" aria-expanded="false">
                            <i class="fa fa-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                       @if(Auth::check())
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('pengguna')}}" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('pemasok')}}" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">Pemasok</span>
                            </a>
                        </li>
                        @endif
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('kategori')}}" aria-expanded="false">
                                <i class="fa fa-list"></i>
                                <span class="hide-menu">Kategori Barang</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('barang')}}" aria-expanded="false">
                               <i class="fa fa-book"></i>
                                <span class="hide-menu">Data Barang</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('transaksi')}}" aria-expanded="false">
                                <i class="fa fa-exchange"></i>
                                <span class="hide-menu">Transaksi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('laporan')}}" aria-expanded="false">
                                <i class="fa fa-file"></i>
                                <span class="hide-menu">Laporan Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>