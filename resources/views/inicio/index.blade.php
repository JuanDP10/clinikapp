@extends('layout')

@section('title')
<title>Clinick App | Inicio</title>
@endsection

@section('content')
    <style>
        /* Estilos para el letrero de bienvenida sin fondo */
        .welcome-banner {
            margin: 20px 0;
        }

        .welcome-text {
            font-size: 3rem;
            font-weight: 700;
            margin: 0;
            color: #17a2b8; /* Color de texto similar al del título */
        }

        /* Estilos para las tarjetas */
        .card {
            background-color: #fff;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .card-body {
            padding: 30px;
            background-color: #f7f7f7;
        }

        /* Efecto de hover */
        .card-hover:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            border-color: #e0e0e0;
        }

        /* Títulos de las tarjetas */
        .card-title {
            font-size: 20px;
            font-weight: 600;
            text-align: center;
        }

        /* Colores de los iconos y los números */
        .text-info {
            color: #17a2b8 !important;
        }
        .text-success {
            color: #28a745 !important;
        }
        .text-warning {
            color: #ffc107 !important;
        }
        .text-danger {
            color: #dc3545 !important;
        }

        /* Diseño de los iconos */
        .card-title i {
            margin-right: 10px;
            font-size: 28px;
        }

        /* Efectos visuales y sombras sutiles */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Media Queries para que las tarjetas se adapten a pantallas pequeñas */
        @media (max-width: 768px) {
            .card-body {
                padding: 20px;
            }
            .card-title {
                font-size: 18px;
            }
        }
    </style>

    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3 style="font-weight: bold"><i class="fa fa-bar-chart"></i> Dashboard</h3>
            </div>
        </div>
        <br><br><br>
        <!-- Letrero de bienvenida sin fondo, debajo del título -->
        <div class="welcome-banner text-center">
            <h1 class="welcome-text">Bienvenido a Clinick App</h1>
        </div>

        <div class="clearfix"></div><br>

        <div class="row text-info">

            <!-- Cuadro de pacientes -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="card shadow-lg rounded border-light card-hover">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-info"><i class="fa fa-users"></i> Pacientes</h2>
                        </div>
                        <div class="card-text text-center">
                            <h1>{{ $pacientesCount }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cuadro de doctores -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="card shadow-lg rounded border-light card-hover">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-success"><i class="fa fa-user-md"></i> Doctores</h2>
                        </div>
                        <div class="card-text text-center">
                            <h1 class="text-success">{{ $doctoresCount }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cuadro de citas -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="card shadow-lg rounded border-light card-hover">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-warning"><i class="fa fa-calendar"></i> Citas</h2>
                        </div>
                        <div class="card-text text-center">
                            <h1 class="text-warning">{{ $citasCount }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cuadro de consultorios -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="card shadow-lg rounded border-light card-hover">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-danger"><i class="fa fa-stethoscope"></i> Consultorios</h2>
                        </div>
                        <div class="card-text text-center">
                            <h1 class="text-danger">{{ $consultoriosCount }}</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

