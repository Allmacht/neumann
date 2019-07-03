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
        .table-div{
            margin-top: 75px;
        }
    </style>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 px-0 float-left">
                    <h4 class="text-black-50">{{__('Neumann')}}</h4>
                    <h5><i class="fal fa-building"></i>{{__('Lista de planteles registrados')}}</h5>
                </div>
                <div class="col-6 text-muted px-0 float-right text-right">
                    {{$date}}
                </div>
                <div class="responsive-table px-0 mx-0 table-div">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CCT</th>
                                <th>Nombre</th>
                                <th>Turno</th>
                                <th class="text-truncate">Nivel Escolar</th>
                                <th>Administrador</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $campus)
                                <tr class="@if(!$campus->status) table-danger @endif">
                                    <td class="text-truncate">{{$campus->code}}</td>
                                    <td class="text-truncate">{{$campus->cct}}</td>
                                    <td class="text-truncate">{{$campus->name}}</td>
                                    <td class="text-truncate">{{$campus->shift}}</td>
                                    <td class="text-truncate">{{$campus->level}}</td>
                                    <td class="text-truncate">{{$campus->user->names." ".$campus->user->paternal_surname}}</td> 
                                    <td class="text-truncate">
                                        @if (!$campus->status)
                                            {{__('Inactivo')}}
                                        @else
                                            {{__('Activo')}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </main>
</body>
</html>