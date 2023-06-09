<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>POS</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/plugins/jqvmap/jqvmap.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css?v=3.2.0">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/summernote/summernote-bs4.min.css">
    @yield('css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> --}}
            </ul>

            <ul class="navbar-nav ml-auto">



                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="{{ route('logout') }}"
                        onclick="return logout(event);">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>




            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">POS</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <div class="form-inline">

                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @role('admin')
                            <li class="nav-item">
                                <a href="{{ url('home') }}"
                                    class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        @endrole

                        @role('kasir')
                            <li class="nav-item">
                                <a href="{{ url('kasir') }}"
                                    class="nav-link {{ request()->is('kasir') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                        @endrole

                        @role('admin')
                            <li class="nav-item">
                                <a href="{{ url('kategori') }}"
                                    class="nav-link {{ request()->is('kategori') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-cube"></i>
                                    <p>
                                        Kategori
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('produk') }}"
                                    class="nav-link {{ request()->is('produk') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-cubes"></i>
                                    <p>
                                        Produk
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('member') }}"
                                    class="nav-link {{ request()->is('member') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-id-card"></i>
                                    <p>
                                        Member
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('supplier') }}"
                                    class="nav-link {{ request()->is('supplier') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-truck"></i>
                                    <p>
                                        Supplier
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('pembelian') }}"
                                    class="nav-link {{ request()->is('pembelian') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Pembelian
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('penjualan') }}"
                                    class="nav-link {{ request()->is('penjualan') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-handshake"></i>
                                    <p>
                                        Penjualan
                                    </p>
                                </a>
                            </li>
                        @endrole


                        <li class="nav-item">
                            <a href="{{ route('transaksi.baru') }}" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    Transaksi Baru
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    Transaksi Aktif
                                </p>
                            </a>
                        </li>


                        @role('admin')
                            <li class="nav-item">
                                <a href="{{ url('pengeluaran') }}"
                                    class="nav-link {{ request()->is('pengeluaran') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Pengeluaran
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('laporan') }}"
                                    class="nav-link {{ request()->is('laporan') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-file-pdf"></i>
                                    <p>
                                        Laporan
                                    </p>
                                </a>
                            </li>
                        @endrole
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('header')</h1>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                @yield('content')
            </section>

        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>

    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>

    <script src="{{ asset('assets') }}/plugins/jquery-ui/jquery-ui.min.js"></script>

    {{-- <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script> --}}

    <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets') }}/plugins/chart.js/Chart.min.js"></script>

    <script src="{{ asset('assets') }}/plugins/sparklines/sparkline.js"></script>

    {{-- <script src="{{ asset('assets') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}

    <script src="{{ asset('assets') }}/plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="{{ asset('assets') }}/plugins/summernote/summernote-bs4.min.js"></script>

    <script src="{{ asset('assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="{{ asset('assets') }}/dist/js/adminlte.js?v=3.2.0"></script>

    <script src="{{ asset('assets') }}/dist/js/demo.js"></script>

    {{-- <script src="{{ asset('assets') }}/dist/js/pages/dashboard.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    {{-- <script nonce="a82d5eee-81e4-4aa0-9886-a9c1e0161301">
        (function(w, d) {
            ! function(a, b, c, d) {
                a[c] = a[c] || {};
                a[c].executed = [];
                a.zaraz = {
                    deferred: [],
                    listeners: []
                };
                a.zaraz.q = [];
                a.zaraz._f = function(e) {
                    return function() {
                        var f = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: f
                        })
                    }
                };
                for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
                a.zaraz.init = () => {
                    var h = b.getElementsByTagName(d)[0],
                        i = b.createElement(d),
                        j = b.getElementsByTagName("title")[0];
                    j && (a[c].t = b.getElementsByTagName("title")[0].text);
                    a[c].x = Math.random();
                    a[c].w = a.screen.width;
                    a[c].h = a.screen.height;
                    a[c].j = a.innerHeight;
                    a[c].e = a.innerWidth;
                    a[c].l = a.location.href;
                    a[c].r = b.referrer;
                    a[c].k = a.screen.colorDepth;
                    a[c].n = b.characterSet;
                    a[c].o = (new Date).getTimezoneOffset();
                    if (a.dataLayer)
                        for (const n of Object.entries(Object.entries(dataLayer).reduce(((o, p) => ({
                                ...o[1],
                                ...p[1]
                            })), {}))) zaraz.set(n[0], n[1], {
                            scope: "page"
                        });
                    a[c].q = [];
                    for (; a.zaraz.q.length;) {
                        const q = a.zaraz.q.shift();
                        a[c].q.push(q)
                    }
                    i.defer = !0;
                    for (const r of [localStorage, sessionStorage]) Object.keys(r || {}).filter((t => t.startsWith(
                        "_zaraz_"))).forEach((s => {
                        try {
                            a[c]["z_" + s.slice(7)] = JSON.parse(r.getItem(s))
                        } catch {
                            a[c]["z_" + s.slice(7)] = r.getItem(s)
                        }
                    }));
                    i.referrerPolicy = "origin";
                    i.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
                    h.parentNode.insertBefore(i, h)
                };
                ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script> --}}

    <script type="text/javascript">
        function logout(event) {
            event.preventDefault();
            var check = confirm("Do you really want to logout?");
            if (check) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
    @yield('js')
</body>

</html>
