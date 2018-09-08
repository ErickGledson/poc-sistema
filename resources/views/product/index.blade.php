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
            <div class="col-lg-10" style="margin: 30px">
                <h1>Produtos</h1>
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td style="width: 50px">ID</td>
                            <td>Nome</td>
                            <td>Descrição</td>
                            <td style="width: 80px">Preço</td>
                            <td style="width: 80px">Qtd. Estoque</td>
                            <td>Categoria</td>
                            <td>Fornecedor</td>
                            <td>ID Fornecedor</td>
                            <td style="width: 200px">Opções</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->description }}</td>
                                <td>{{ $value->price }}</td>
                                <td>{{ $value->stock }}</td>
                                <td>{{ $value->category }}</td>
                                <td>{{ $value->provider }}</td>
                                <td>{{ $value->provider_product_id }}</td>
                                <td>
                                    {{ Form::open(array('url' => 'products/' . $value->id, 'class' => 'pull-right')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Apagar', array('class' => 'btn btn-warning')) }}
                                    {{ Form::close() }}
                                    <a class="btn btn-small btn-info" href="{{ URL::to('products/' . $value->id . '/edit') }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>






</div>
</body>
</html>