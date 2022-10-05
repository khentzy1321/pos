<aside class="main-sidebar sidebar-dark-secondary bg-primary elevation-4">

    <a href="../../index3.html" class="brand-link">
    <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Mdc Canteen Pos</span>
    </a>

    <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          <img src="/" class="img-circle elevation-2" alt="User Image">
          </div>
    <div class="info">
    <a href="#" class="d-block">My Name</a>
    </div>
    </div>

    <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
    <button class="btn btn-sidebar">
    <i class="fas fa-search fa-fw"></i>
    </button>
    </div>
    </div>
    </div>

    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
    <a href="{{ route('dashboards.index') }}" class="nav-link {{ activeSegment('dashboards') }}">
         <i class="nav-icon fas fa-tachometer-alt"></i>
           <p>
                  Dashboard
                <i class="right fas fa-angle-left"></i>
           </p>
       </a>
</li>
            <li class="nav-item has-treeview">
    <a href="{{ route('products.index' )}}" class="nav-link {{ activeSegment('products') }}">
         <i class="nav-icon fas fa-th-large"></i>
           <p>
                  Product
                <i class="right fas fa-angle-left"></i>
           </p>
       </a>
</li>
            <li class="nav-item has-treeview">
    <a href="{{ route('invoices.index' )}}" class="nav-link {{ activeSegment('invoices') }}">
         <i class="nav-icon fas fa-file-invoice"></i>
           <p>
                  Invoice
                <i class="right fas fa-angle-left"></i>
           </p>
       </a>
</li>
            <li class="nav-item has-treeview">
    <a href="{{ route('customers.index' )}}" class="nav-link {{ activeSegment('customers') }}">
         <i class="nav-icon fas fa-users"></i>
           <p>
                  Costumers
                <i class="right fas fa-angle-left"></i>
           </p>
       </a>
</li>
 <li class="nav-item">
    <a href="#" class="nav-link " onclick="document.getElementById('logout-form').submit()">
    <i class="nav-icon fas fa-sign-out-alt"></i>
   Logout
   </p>
   <form action="{{ route('logout') }}" method="POST" id="logout-form">
    @csrf
</form>
</a>
</li>
 </ul>
</nav>
</div>
</aside>
