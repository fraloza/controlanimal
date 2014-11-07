<!doctype html>
<html lang="en">
    <head>
	<meta charset="UTF-8">
	<title>CONTROL ANIMAL</title>

	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- basic styles -->
	
	{{ HTML::style('assets/css/bootstrap.min.css'); }}
	{{ HTML::style('assets/css/font-awesome.min.css'); }}

	{{ HTML::style('assets/css/sb-admin.css'); }}


    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Por Favor Ingrese sus Datos</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Usuario" name="username" required  autofocus />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Clave" name="password" required />
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
