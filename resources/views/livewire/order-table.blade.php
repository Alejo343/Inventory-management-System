<div>
    <table id="productsTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $index => $row)
                <tr>
                    <!-- Columna Producto (Select) -->
                    <td>
                        <select wire:model="rows.{{ $index }}.product_id" class="form-control"
                            wire:change="update({{ $index }})">
                            <option value="">Seleccionar producto</option>
                            @foreach ($products as $product)
                                <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                            @endforeach
                        </select>
                    </td>

                    <!-- Columna Cantidad -->
                    <td>
                        <input type="number" wire:model="rows.{{ $index }}.quantity" class="form-control"
                            wire:change="update({{ $index }})" min="1" />
                    </td>

                    <!-- Columna Precio -->
                    <td>
                        <input type="number" wire:model="rows.{{ $index }}.selling_price" class="form-control"
                            readonly />
                    </td>

                    <!-- Columna Total -->
                    <td>
                        <input type="number" wire:model="rows.{{ $index }}.total" class="form-control"
                            readonly />
                    </td>

                    <!-- Columna Acciones (Eliminar) -->
                    <td>
                        <button type="button" wire:click="removeRow({{ $index }})"
                            class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
        <button type="button" wire:click="addRow" class="btn btn-success mb-2">Añadir</button>
    </div>


    {{-- tabla de total --}}
    <div class="table-responsive" id="totalTable" style="max-width: 20%;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subtotal</th>
                    <th>
                        <input type="number" wire:model="Subtotal" class="form-control" readonly />
                    </th>
                </tr>
                <tr>
                    <th>IVA</th>
                    <th>
                        <input type="number" wire:model="iva" wire:change="updateTotalIVA()" class="form-control" />
                    </th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th>
                        <input type="number" wire:model="total" class="form-control" readonly />
                    </th>
                </tr>
            </thead>
        </table>
    </div>


    <!-- Scripts para DataTables y Livewire -->
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function() {
                $('#productsTable').DataTable({
                    "paging": false,
                    "searching": false,
                    "info": false
                });
            });
        </script>
    @endpush
</div>
