<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">الرئيسية</a>
        </li>


    </ul>
    <form id="form" role="search">
        <input type="search" id="query" name="q"
         placeholder="Search..."
         aria-label="Search through site content">
        <button>Search</button>
      </form>
      <style>
        form {
  background-color: #4654e1;
  width: 300px;
  height: 44px;
  border-radius: 5px;
  display: flex;
  flex-direction: row;
  align-items: center;
}
input {
  all: unset;
  font: 16px system-ui;
  color: #fff;
  height: 100%;
  width: 100%;
  padding: 6px 10px;
}
::placeholder {
  color: #fff;
  opacity: 0.7;
}
      </style>
    <script>
        const f = document.getElementById('form');
const q = document.getElementById('query');
const google = 'https://www.google.com/search?q=site%3A+';
const site = 'pagedart.com';

function submitted(event) {
  event.preventDefault();
  const url = google + site + '+' + q.value;
  const win = window.open(url, '_blank');
  win.focus();
}

f.addEventListener('submit', submitted);
const f = document.getElementById('example1');
const q = document.getElementById('query');
const google = 'https://www.google.com/search?q=site%3A+';
const site = 'pagedart.com';
function submitted(event) {
  event.preventDefault();
  const url = google + site + '+' + q.value;
  const win = window.open(url, '_blank');
  win.focus();
}
f.addEventListener('submit', submitted);

    </script>
 @if (auth()->user()->is_admin == 1)
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->



<div class="container"  style="display:flex; margin: 2px" >

        <li class="nav-item" >

            <li class="nav-item">
                <a href="{{ route('admin.transaction.create') }}" >
                    <button type="button" class="btn btn-info">اضافة دفعات مالية
                    </button>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.finance.create') }}" >
                    <button type="button" class="btn btn-info">اضافة معلومات مالية
                    </button>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('admin.ptest.create') }}" >
                    <button type="button" class="btn btn-info"> اضافة فحص مريض
                    </button>
                </a>
            </li>
  <li class="nav-item">
            <a href="{{ route('admin.test.create') }}" >
                <button type="button" class="btn btn-info"> اضافة فحص اساسي
                </button>
            </a>
 </li>
  <li class="nav-item">
            <a href="{{ route('admin.appointment.create') }}">
                <button type="button" class="btn btn-info"> اضافة موعد
                </button>
            </a>
        </li>
            <a href="{{ route('admin.customer.create') }}">
                <button type="button" class="btn btn-info"> اضافة مريض
                    </button>
            </a>
        </li>



        <!-- Messages Dropdown Menu -->

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>
</div>
@else


<li class="nav-item">
    <a href="{{ route('admin.ptest.create') }}" >
        <button type="button" class="btn btn-info"> اضافة فحص مريض
        </button>
    </a>
</li>
<li class="nav-item">
<a href="{{ route('admin.test.create') }}" >
    <button type="button" class="btn btn-info"> اضافة فحص اساسي
    </button>
</a>
</li>
<li class="nav-item">
<a href="{{ route('admin.appointment.create') }}">
    <button type="button" class="btn btn-info"> اضافة موعد
    </button>
</a>
</li>
<a href="{{ route('admin.customer.create') }}">
    <button type="button" class="btn btn-info"> اضافة مريض
        </button>
</a>
</li>
<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
            aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>

@endif
