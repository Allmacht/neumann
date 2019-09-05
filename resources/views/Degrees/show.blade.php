@extends('layouts.app')
@section('degrees','active-nav')

@section('content')
    <div class="container-fluid px-5 mb-5">
        <div class="row">
            <div class="col-12 alert alert-primary mt-4 shadow rounded-lg">
                <h5 class="text-center"><strong>ID : </strong>{{$degree->code}}</h5>
                <h5 class="text-center"><strong>RVOE : </strong>{{$degree->rvoe}}</h5>
                <hr>
                <h4 class="alert-heading text-center">{{$degree->name}}</h4>
            </div>
            <div class="col-12 px-0">
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 float-left shadow table-responsive bg-white">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-truncate">{{__('Clave')}}</th>
                                <th class="text-truncate">{{__('Valor')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-truncate align-middle">{{__('Código único')}}</td>
                                <td class="text-truncate align-middle">{{$degree->code}}</td>
                            </tr>
                            <tr>
                                <td class="text-truncate align-middle">{{__('RVOE')}}</td>
                                <td class="text-truncate align-middle">{{$degree->rvoe}}</td>
                            </tr>
                            <tr>
                                <td class="text-truncate align-middle">{{__('Nombre')}}</td>
                                <td class="text-truncate align-middle">{{$degree->name}}</td>
                            </tr>
                            <tr>
                                <td class="text-truncate align-middle">{{__('Semestres')}}</td>
                                <td class="text-truncate align-middle">{{$degree->semesters}}</td>
                            </tr>
                            <tr>
                                <td class="text-truncate align-middle">{{__('Diciplina')}}</td>
                                <td class="text-truncate align-middle">{{$degree->dicipline}}</td>
                            </tr>
                            <tr>
                                <td class="text-center alert alert-warning" colspan="2">
                                    <strong>{{__('Descripción')}}</strong><br>
                                    {{$degree->description}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 float-right shadow bg-white">
                    <h5 class="text-muted text-center py-3">{{__('Alumnos inscritos por año')}}</h5>
                    <canvas id="degreeChart"></canvas>
                </div>
            </div>

            <div class="col-12 px-0">
                <div class="col-12 form-row alert alert-info mt-5 shadow mb-0 mx-0">
                    <div class="col-6"><h4 class="alert-heading">{{__('Información')}}</h4></div>
                    <div class="col-6 text-right">
                        <button class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#information">
                            <i class="fas fa-edit"></i>
                            {{__('Editar')}}
                        </button>
                    </div>
                </div>
                <div class="bg-white shadow">
                    @if ($degree->information != null)
                        <textarea class="form-control-plaintext py-4 px-3" name="information" cols="30" rows="10" readonly>{{$degree->information}}</textarea>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('Degrees.modalInformation')
@endsection
@section('scripts')
    <script src="{{asset('js/charts.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('text-information');
        var ctx = document.getElementById('degreeChart').getContext('2d');
        var chart = new Chart(ctx,{
            type:'line',
            data: {
                labels: ['2009','2010','2011','2012','2013'],
                datasets:[{
                    label: 'Alumnos inscritos',
                    backgroundColor: '#CAE0FF',
                    data: [10,5,3,7,9],
                }],
                
            },
            options:{
                responsive: true,
                tooltips: {
                    mode: 'index'
                }
            }
        })
    </script>
@endsection