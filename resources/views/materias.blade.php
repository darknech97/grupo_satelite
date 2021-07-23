<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Grupo Satelite</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Icons -->
        
        <script src="https://kit.fontawesome.com/4230b6f89e.js" crossorigin="anonymous"></script>

        <style>
            .abrir_perfil_alumno{
                transition: transform .2s; /* Animation */
            }


            .abrir_perfil_alumno:hover{
                cursor: pointer;
                transform: scale(1.25);
            }

            .borrar_perfil_alumno{
                transition: transform .2s; /* Animation */
            }

            .borrar_perfil_alumno:hover{
                cursor: pointer;
                transform: scale(1.25);
            }

            #destroy_button{
                border: none;
                background-color: none;
            }
        </style>


    </head>
    <body>
    
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand " href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('alumnos.index') }}">Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('grados.index') }}">Grados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('materias.index') }}">Materias</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        
        <div class="container-fluid mt-3">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-book"></i> &nbsp; Materias
                </div>
                <div class="card-body">
                    <form action="{{ route('materias.store') }}" method="POST" onsubmit="return validarFormMateria()">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-10">
                                <input type="text" class="form-control form-control-sm w-100" placeholder="Ingresar materia..." id="mat_nombre" name="mat_nombre">
                                <div class="invalid-feedback">
                                    Por favor ingresar un nombre de materia.
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-sm btn-success w-100" ><i class="fas fa-plus text-white"></i> Agregar Materia</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col" class="text-right"></th>
                                <td scope="col" class="text-right"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materias as $materia)
                                <tr>
                                    <td>
                                    <form method="post" action="{{ route('materias.update',$materia->mat_id) }}" onsubmit="return validarFrmMateriaEditar()">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control form-control-sm " id="mat_nombre_editar" name="mat_nombre" value="{{ $materia->mat_nombre }}">
                                            <div class="invalid-feedback">
                                                Por favor ingresar un nombre de grado.
                                            </div>
                                        </td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-primary w-100"> <i class="fas fa-save text-white"></i> Guardar</button>
                                        </form>
                                    </td>
                                    <td>
                                    <form method="post" action="{{ route('materias.destroy',$materia->mat_id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button   type="submit" class="btn btn-sm btn-danger w-100"> <i class="fas fa-trash text-white"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- JS -->
        <script>
            function validarFormMateria(){
                var nombre = document.getElementById("mat_nombre");
                nombre.className= "form-control form-control-sm w-100";
                var return_value = true;

                if(nombre.value === ""){
                    nombre.className= "form-control form-control-sm w-100 is-invalid";
                    return_value = false;
                }

                return return_value;
            }

            function validarFrmMateriaEditar(){
                var nombre = document.getElementById("mat_nombre_editar");
                nombre.className= "form-control form-control-sm w-100";
                var return_value = true;

                if(nombre.value === ""){
                    nombre.className= "form-control form-control-sm w-100 is-invalid";
                    return_value = false;
                }

                return return_value;
            }
        </script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- Sweet Alerts 2 -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>