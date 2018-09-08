<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Administrador - POC</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('products') }}">Lojinha</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/') }}">Site</a></li>
                <li><a href="{{ URL::to('products') }}">Listar Produtos</a></li>
                <li><a href="{{ URL::to('products/create') }}">Cadastrar Produtos</a>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" style="margin: 30px">
                <h1>Cadastrar Produtos</h1>

                {{ Html::ul($errors->all()) }}

                {{ Form::open(array('url' => 'products', 'method' => 'post', 'files' => true)) }}

                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="form-group">
                        {{ Form::label('name', 'Nome') }}
                        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            {{ Form::label('description', 'Descrição') }}
                            {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-3">
                        {{ Form::label('stock', 'Quantidade em Estoque') }}
                        {{ Form::text('stock', Input::old('stock'), array('class' => 'form-control', 'maxlength' => 9)) }}
                    </div>
                    <div class="col-lg-3">
                        {{ Form::label('price', 'Valor') }}
                        {{ Form::text('price', Input::old('price'), array('class' => 'form-control', 'maxlength' => 9)) }}
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            {{ Form::label('category_id', 'Categoria') }}
                            {{ Form::select('category_id', array('0' => 'Selecione...', '1' => 'Games', '2' => 'TV', '3' => 'Som'), Input::old('category_id'), array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            {{ Form::label('image', 'Imagem') }}
                            {{ Form::file('image', array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {{ Form::label('provider_id', 'Fornecedor') }}
                            {{ Form::select('provider_id', array('0' => 'Selecione...', '1' => 'Microsoft', '2' => 'Samsung', '3' => 'Phillips'), Input::old('category_id'), array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            {{ Form::label('provider_product_id', 'ID Produto Fornecedor') }}
                            {{ Form::text('provider_product_id', Input::old('provider_product_id'), array('class' => 'form-control', 'maxlength' => 9)) }}
                        </div>
                    </div>
                </div>

                {{ Form::submit('Cadastrar', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>
        $('input[name="price"]').mask('###0.00', { reverse: true });
        $('input[name="stock"]').mask('######', { reverse: true });
    </script>
</body>
</html>
