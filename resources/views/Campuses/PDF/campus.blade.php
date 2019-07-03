<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <link rel="stylesheet" href="{{ public_path().'/css/bootstrap.css' }}">
</head>
<body>
    <style>
        .table-design{
            margin-top: 90px;
        }
    </style>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 form-row">
                    <div class="col-6 float-left">
                        <h6 class="text-muted">{{__('Neumann')}}</h6>
                        <h4 class="mt-3">{{$data->name}}</h4>
                    </div>
                    <div class="col-6 float-right text-right">
                        <p class="py-0">{{__('Código único : '.$data->code)}}</p>
                        <p class="py-0">{{__('CCT : '.$data->cct)}}</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-design">
                        <thead>
                            <tr>
                                <th>{{__('Clave')}}</th>
                                <th>{{__('Valor')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td>{{__('Código único')}}</td>
                                <td>{{$data->code}}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('CCT')}}</td>
                                <td>{{$data->cct}}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('Nombre')}}</td>
                                <td>{{$data->name}}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('Estado')}}</td>
                                <td>{{$data->state}}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('Municipio')}}</td>
                                <td>{{$data->municipality}}</td>
                            </tr>
                            @if ($data->colony != null)    
                                <tr class="align-middle">
                                    <td>{{__('Colonia/Fracc')}}</td>
                                    <td>{{$data->colony}}</td>
                                </tr>
                            @endif
                            <tr class="align-middle">
                                <td>{{__('Calle')}}</td>
                                <td>{{$data->street}}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('Código postal')}}</td>
                                <td>{{$data->zipcode}}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('Número exterior')}}</td>
                                <td>{{$data->external_number}}</td>
                            </tr>
                            @if ($data->internal_number != null)
                                <tr class="align-middle">
                                    <td>{{__('Número interior')}}</td>
                                    <td>{{$data->internal_number}}</td>
                                </tr>
                            @endif
                            <tr class="align-middle">
                                <td>{{__('Administrador')}}</td>
                                <td>{{$data->user->names." ".$data->user->paternal_surname." ".$data->user->maternal_surname}}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('Turno')}}</td>
                                <td>{{$data->shift}}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('Nivel escolar')}}</td>
                                <td>{{$data->level}}</td>
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('Estatus')}}</td>
                                @if ($data->status)
                                    <td>{{__('Activo')}}</td>    
                                @else
                                    <td>{{__('Inactivo')}}</td>
                                @endif
                            </tr>
                            <tr class="align-middle">
                                <td>{{__('Fecha de registro')}}</td>
                                <td>{{$data->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>