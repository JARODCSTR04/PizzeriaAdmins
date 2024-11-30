@include('/recursos/navbar')

<div class="flex justify-center mt-10">
    <div class="w-3/5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">ID de la Transacción</th>
                        <th scope="col" class="px-6 py-3">ID del Cliente</th>
                        <th scope="col" class="px-6 py-3">Email del Cliente</th>
                        <th scope="col" class="px-6 py-3">Importe</th>
                        <th scope="col" class="px-6 py-3">Moneda</th>
                        <th scope="col" class="px-6 py-3">Status del Pedido</th>
                        <th scope="col" class="px-6 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pedido->id }}
                            </th>
                            <td class="px-6 py-4">{{ $pedido->payer_id }}</td>
                            <td class="px-6 py-4">{{ $pedido->payment_id }}</td>
                            <td class="px-6 py-4">{{ $pedido->payer_email }}</td>
                            <td class="px-6 py-4">{{ $pedido->amount }}</td>
                            <td class="px-6 py-4">{{ $pedido->currency }}</td>
                            <td class="px-6 py-4">{{ $pedido->payment_status }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ URL('/pedidos/' . $pedido->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <input style="cursor: pointer; color: red" type="submit" value="Eliminar"
                                        onclick="return confirm('¿Desas eliminar este Pedido?')" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pedidos->links() }}
        </div>
    </div>
</div>