@include('layouts.head.head')

<body class="bg-light dk">
  <section id="content">
    <div class="row m-n">
      <div class="col-sm-4 col-sm-offset-4">
        <div class="text-center m-b-lg">
          <h1 class="h text-white animated fadeInDownBig">404</h1>
        </div>
        <div class="list-group auto m-b-sm m-b-lg">
          <a href="/" class="list-group-item">
            <i class="fa fa-chevron-right icon-muted"></i>
            <i class="fa fa-fw fa-home icon-muted"></i> Ir a inicio
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-chevron-right icon-muted"></i>
            <span class="badge bg-info lt">021-215-584</span>
            <i class="fa fa-fw fa-phone icon-muted"></i> Llámanos
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>Lesly&copy; 2020</small>
      </p>
    </div>
    @include('layouts.scripts.scripts');
</body>

</html>