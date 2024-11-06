<div class="p-4 border rounded-lg shadow-md bg-white">
    <h3 class="text-lg font-semibold mb-2 text-gray-800">{{ $nombres_difunto }} {{ $apellido_paterno_difunto }} {{ $apellido_materno_difunto }}</h3>

    <p class="text-sm text-gray-600">
        <strong>Sexo:</strong> {{ $sexo }}
    </p>
    <p class="text-sm text-gray-600">
        <strong>Edad:</strong> {{ $edad }}
    </p>
    <p class="text-sm text-gray-600">
        <strong>Estado Civil:</strong> {{ $estado_civil }}
    </p>
    <p class="text-sm text-gray-600">
        <strong>Nacionalidad:</strong> {{ $nacionalidad }}
    </p>
    <p class="text-sm text-gray-600">
        <strong>Diagnóstico de Fallecimiento:</strong> {{ $diagnostico_fallecimiento }}
    </p>
    <p class="text-sm text-gray-600">
        <strong>Fecha de Inhumación:</strong> {{ \Carbon\Carbon::parse($fecha_inhumacion)->format('d/m/Y') }}
    </p>
    <p class="text-sm text-gray-600">
        <strong>Fecha de Vencimiento:</strong> {{ \Carbon\Carbon::parse($fecha_vencimiento)->format('d/m/Y') }}
    </p>

    <hr class="my-2">

    <h4 class="text-md font-semibold mb-2 text-gray-800">Información del Contribuyente</h4>
    <p class="text-sm text-gray-600">
        <strong>Nombre:</strong> {{ $nombres_contribuyente }}
    </p>
    <p class="text-sm text-gray-600">
        <strong>Dirección:</strong> {{ $direccion }}
    </p>
    <p class="text-sm text-gray-600">
        <strong>Zona:</strong> {{ $zona }}
    </p>
</div>
