  <li class="header{{ Request::is('agamas*') ? 'active' : '' }}">
  <a href="{!! route('agamas.index') !!}"><i class="fa fa-home"></i><span>HOME</span></a>
  </li>

@if(Auth::user()->level >= 1)
  <li class="{{ Request::is('kategoris*') ? 'active' : '' }}">
  <a href="{!! route('kategoris.index') !!}"><i class="fa fa-list"></i><span>Data Kategori</span></a>
  </li>

  <li class="{{ Request::is('barangs*') ? 'active' : '' }}">
  <a href="{!! route('barangs.index') !!}"><i class="fa fa-list"></i><span>Data Barang</span></a>
  </li>

  <li class="{{ Request::is('pembelian*') ? 'active' : '' }}">
      <a href="{!! route('pembelians.create') !!}"><i class="fa fa-shopping-cart"></i><span>Transaksi Pembelian</span></a>
  </li>
@endif

  <li class="{{ Request::is('penjualans*') ? 'active' : '' }}">
     <a href="{!! route('penjualans.create') !!}"><i class="fa fa-shopping-cart"></i><span>Transaksi Penjualan</span></a>
  </li>


@if(Auth::user()->level>=1)
  <li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
      <a href="{!! route('suppliers.index') !!}"><i class="fa fa-user"></i><span>Data Supplier</span></a>
  </li>
@endif
  @if(Auth::user()->level==2)
  <li class="{{ Request::is('pegawais*') ? 'active' : '' }}">
      <a href="{!! route('pegawais.index') !!}"><i class="fa fa-address-card"></i><span>Data Pegawai</span></a>
  </li>
  @endif

{{-- <ul class="sidebar-menu">
      <li class="header" style="color: white">DATA MASTER </li>
      
      <li class="treeview menu-open">
        <a href="#"><i class="fa fa-link"></i> <span>Barang</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">                  
          </li>
        </ul>
      </li>
    </ul> --}}
<li class="{{ Request::is('peanggans*') ? 'active' : '' }}">
    <a href="{!! route('pelanggans.index') !!}"><i class="fa fa-user-circle"></i><span>Data Pelanggan</span></a>
</li>
@if(Auth::user()->level == 2)
{{-- <ul class="sidebar-menu">
  <li class="header" style="color: white">DATA LAPORAN</li>      
  <li class="treeview menu-open">
  <a href="#"><i class="fa fa-link"></i> <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
<ul class="treeview-menu">
 --}}
   
   

{{--     </ul>
  </li>
</ul> --}}


<li class="header" style="color: white">Data Transaksi</li>
  <li class="{{ Request::is('pembelians*') ? 'active' : '' }}">
     <a href="{!! route('pembelians.index') !!}"><i class="fa fa-list"></i><span>Data Pembelian</span></a>
  </li>

  <li class="{{ Request::is('penjualans*') ? 'active' : '' }}">
     <a href="{!! route('penjualans.index') !!}"><i class="fa fa-list"></i><span>Data Penjualan</span></a>
  </li>

  <li class="">
     <a href="{!! url('/detail_penjualans') !!}"><i class="fa fa-list"></i><span>Data Detail Penjualan</span></a>
  </li>

  <li class="header" style="color: white">Laba Rugi</li>
    <li class="{{ Request::is('laporans*') ? 'active' : '' }}">
      <a href="{!! route('laporans.index') !!}"><i class="fa fa-list"></i><span>Laba rugi</span></a>
    </li>
    
  <li class="{{ Request::is('users*') ? 'active' : '' }}">
      <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Manage User</span></a>
  </li>
@endif
{{-- <li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
    <a href="{!! route('suppliers.index') !!}"><i class="fa fa-edit"></i><span>Supplier</span></a>
</li> --}}
   {{--  <ul class="sidebar-menu">
      <li class="header" style="color: white">Pembelian</li>
      <li class="treeview menu-open">
        <a href="#"><i class="fa fa-link"></i> <span>Pembelian</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>  
        </ul>
      </li>
    </ul>
    <br>
     --}}