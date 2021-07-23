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
                    <a class="nav-link active" aria-current="page" href="{{ route('alumnos.index') }}">Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('grados.index') }}">Grados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('materias.index') }}">Materias</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        
        <div class="container-fluid mt-3">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-graduation-cap"></i> &nbsp; Alumnos
                </div>
                <div class="card-body">
                    <button onclick="clickAgregarAlumno()" type="button" class="mb-3 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#alumnosModal"><i class="fas fa-plus text-white"></i> Agregar</button>
                    
                    <table class="table table-sm table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col" class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <th scope="row">{{ $alumno->alm_codigo }}</th>
                                <td>{{ $alumno->alm_nombre }}</td>
                                <td>{{ $alumno->alm_edad }}</td>
                                <td>{{ $alumno->alm_sexo }}</td>
                                <td>{{ $alumno->grado->grd_nombre }}</td>
                                <td>{{ $alumno->alm_observacion }}</td>
                                <td class="text-center">
                                    <i class="abrir_perfil_alumno fas fa-folder-open text-warning" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#alumnosModal" 
                                    onclick="clickEditarAlumno({{ $alumno->alm_id }}, {{ $alumno->alm_codigo }}, '{{ $alumno->alm_nombre }}', {{ $alumno->alm_edad }},
                                                                '{{ $alumno->alm_sexo }}', {{ $alumno->grado->grd_id }}, '{{ $alumno->alm_observacion }}')"></i>

                                    <form action="{{ route('alumnos.destroy',$alumno->alm_id) }}" method="POST" onsubmit="">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('¿Esta seguro que quiere eliminar este alumno?')" id="destroy_button" type="submit"><i class="borrar_perfil_alumno fa fa-trash-alt text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="alumnosModal" tabindex="-1" aria-labelledby="alumnosModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alumnosModalLabel"> Agregar Alumno<!-- Nombre de Alumno --> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="" method="post" id="frmAlumno" class="row g-3" onsubmit="return validarFrmAlumno()">
                @csrf
                    <div class="col-md-4">
                        <label for="alm_codigo" class="form-label">Codigo</label>
                        <input type="text" class="form-control" id="alm_codigo" name="alm_codigo" placeholder="0000">
                        <div class="invalid-feedback">
                            Por favor ingresar un codigo.
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="alm_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="alm_nombre" name="alm_nombre" placeholder="Luis">
                        <div class="invalid-feedback">
                            Por favor ingresar un nombre.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="alm_edad" class="form-label">Edad</label>
                        <input type="number" min="0" class="form-control" id="alm_edad" name="alm_edad" placeholder="0">
                        <div class="invalid-feedback">
                            Por favor ingresar una edad mayor a 0.
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="alm_sexo" class="form-label">Sexo</label>
                        <select id="alm_sexo" name="alm_sexo" class="form-select">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="alm_id_grd" class="form-label">Grado</label>
                        <select id="alm_id_grd" name="alm_id_grd" class="form-select">
                            @foreach ($grados as $grado)
                                <option value="{{ $grado->grd_id }}"> {{ $grado->grd_nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="alm_observacion" class="form-label">Observacion</label>
                        <input type="text" class="form-control" id="alm_observacion" name="alm_observacion" placeholder="Observaciones">
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="limpiarFrmAlumno()" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btn_alumno" name="btn_alumno" class="btn btn-success"> Agregar </button>
                    <input type="hidden" id="alm_id" name="alm_id" value="">
                    </form>
                </div>
                </div>
            </div>
        </div>

        <!-- JS -->
        <script>
            function confirmarEliminacion(){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            }

            function clickEditarAlumno(alm_id,alm_codigo,alm_nombre,alm_edad,alm_sexo,alm_id_grd,alm_observacion){
                document.getElementById("frmAlumno").action = "{{ route('alumnos.update', 1 ) }}";
                document.getElementById("alm_id").value = alm_id;
                document.getElementById("alm_codigo").value = alm_codigo;
                document.getElementById("alm_nombre").value = alm_nombre;
                document.getElementById("alm_edad").value = alm_edad;
                document.getElementById("alm_sexo").value = alm_sexo;
                document.getElementById("alm_id_grd").value = alm_id_grd;
                document.getElementById("alm_observacion").value = alm_observacion;
                document.getElementById("alumnosModalLabel").innerHTML = "Editar Alumno";
                document.getElementById("btn_alumno").innerHTML = "Guardar";
                document.getElementById("btn_alumno").className = "btn btn-primary";
                document.getElementById("frmAlumno").setAttribute("method", "PUT");
                
            }

            function clickAgregarAlumno(){
                document.getElementById("frmAlumno").action = "{{ route('alumnos.store') }}";
                document.getElementById("alm_id").value = "0";
                document.getElementById("btn_alumno").innerHTML = "Agregar";
                document.getElementById("btn_alumno").className = "btn btn-success";
                document.getElementById("alumnosModalLabel").innerHTML = "Agregar Alumno";
                document.getElementById("alm_codigo").value = "";
                document.getElementById("alm_nombre").value = "";
                document.getElementById("alm_edad").value = 0;
                document.getElementById("alm_observacion").value = "";
                document.getElementById("frmAlumno").setAttribute("method", "POST");
            }

            function limpiarFrmAlumno(){
                var codigo = document.getElementById("alm_codigo");
                var nombre = document.getElementById("alm_nombre");
                var edad = document.getElementById("alm_edad");

                codigo.className= "form-control";
                nombre.className= "form-control";
                edad.className = "form-control";
            }

            function validarFrmAlumno(){
                limpiarFrmAlumno();
                var codigo = document.getElementById("alm_codigo");
                var nombre = document.getElementById("alm_nombre");
                var edad = document.getElementById("alm_edad");
                var return_value = true;

                if(codigo.value === ""){
                    codigo.className= "form-control is-invalid";
                    return_value = false;
                }

                if(nombre.value === ""){
                    nombre.className = "form-control is-invalid";
                    return_value = false;
                }

                if(edad.value === "" || edad.value < 0){
                    edad.className = "form-control is-invalid";
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
