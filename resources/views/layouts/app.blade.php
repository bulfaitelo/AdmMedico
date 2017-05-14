<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	{{Html::style('css/bootstrap.min.css')}}
	{{Html::style('css/bootstrap-theme.min.css')}}
  @yield('header')
</head>
<body style="padding-top: 70px;">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Adm Medico</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Listar Pacientes</a></li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active "><a href="#"> <b class="glyphicon glyphicon-plus-sign" ></b> Cadastrar Paciente<span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="container">
		@yield('content')
	</div>
	{{Html::script('js/jquery-3.2.1.min.js')}}
	{{Html::script('js/bootstrap.min.js')}}
</body>
</html>