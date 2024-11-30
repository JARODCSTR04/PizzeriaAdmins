@include('/recursos/navbar')

<div class="flex justify-center mt-10">
    <div class="w-3/5">
        <div class="mt-5">
            <a href="{{URL('materias/create')}}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Registrar Nuevo materia
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Foto</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Cantidad KG</th>
                        <th scope="col" class="px-6 py-3">Fecha de Ingreso</th>
                        <th scope="col" class="px-6 py-3">Costo</th>
                        <th scope="col" class="px-6 py-3">Categoría</th>
                        <th scope="col" class="px-6 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materias as $materia)
                        <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$materia->id}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <center>
                                    <img src="{{asset('storage/uploads').'/'.$materia->foto}}" width="100" alt="imagen del materia">
                                </center>
                            </th>
                            <td class="px-6 py-4">{{$materia->nombre}}</td>
                            <td class="px-6 py-4">{{$materia->cantidad}}</td>
                            <td class="px-6 py-4">{{$materia->fecha_ingreso}}</td>
                            <td class="px-6 py-4">{{$materia->costo}}</td>
                            <td class="px-6 py-4">{{$materia->categoria}}</td>
                            <td class="px-6 py-4">
                                <a href="{{URL('/materias/'.$materia->id.'/edit')}}">Editar</a>
                                <form action="{{URL('/materias/'.$materia->id)}}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <input style="cursor: pointer; color: red" type="submit" value="Eliminar" onclick="return confirm('¿Desas eliminar este materia?')" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$materias->links()}}
        </div>
    </div>
</div>