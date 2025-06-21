<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Factura #{{ $billId }}</title>
  <style>
    body {
      background-color: #f7fafc;
      color: #2d3748;
      font-family: sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 768px;
      margin: 3rem auto;
      background-color: white;
      border: 1px solid #d1d5db;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 0.5rem;
      padding: 2rem;
    }
    .header, .footer {
      border-bottom: 1px solid #d1d5db;
      padding-bottom: 1rem;
      margin-bottom: 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }
    .header h1 {
      font-size: 1.875rem;
      font-weight: 800;
      margin: 0;
      color: #1a202c;
    }
    .header p, .client-info p, .footer {
      font-size: 0.875rem;
      color: #4a5568;
      margin: 0.25rem 0;
    }
    .text-right {
      text-align: right;
    }
    .client-info {
      margin-bottom: 2rem;
    }
    .client-info h2 {
      font-size: 1.125rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      padding-bottom: 0.25rem;
      border-bottom: 1px solid #e5e7eb;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.875rem;
      margin-bottom: 1rem;
    }
    thead {
      background-color: #1a202c;
      color: white;
    }
    th, td {
      padding: 0.75rem 1rem;
      border: 1px solid #d1d5db;
    }
    tbody tr:hover {
      background-color: #f9fafb;
    }
    tfoot {
      background-color: #f9fafb;
    }
    tfoot td {
      font-weight: 500;
      color: #4a5568;
    }
    .total td {
      font-weight: 700;
      color: #1a202c;
      border-top: 1px solid #d1d5db;
      padding-top: 1rem;
    }
    .footer-note {
      text-align: center;
      font-size: 0.75rem;
      color: #a0aec0;
      border-top: 1px solid #e2e8f0;
      padding-top: 1rem;
      margin-top: 2rem;
    }
  </style>
</head>
<body>
  <div class="container">
    
    <!-- Header -->
    <div class="header">
      <div>
        <h1>Widabol S.R.L.</h1>
        <p>Santa Cruz, Bolivia</p>
        <p>Tel: +591 1234 5678</p>
      </div>
      <div class="text-right">
        <p>Fecha: {{ now()->format('d/m/Y') }}</p>
        <p><strong>Factura #: {{ $billId }}</strong></p>
      </div>
    </div>

    <!-- Client Info -->
    <div class="client-info">
      <h2>Facturado al cliente:</h2>
      <p>{{ $cliente->nombre }}</p>
      <p>{{ $cliente->correo }}</p>
      <p>{{ $cliente->direccion }}</p>
    </div>

    <!-- Items Table -->
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Cotización ID</th>
            <th>Producto ID</th>
            <th>Cantidad</th>
            <th class="text-right">Precio Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($detalle as $tupla)
          <tr>
            <td>{{ $tupla->cotizacion_id }}</td>
            <td>{{ $tupla->producto_id }}</td>
            <td>{{ $tupla->cantidad }}</td>
            <td class="text-right">${{ number_format($tupla->precio_total, 2) }}</td>
          </tr>
          @endforeach
        </tbody>
        @php
          $subtotal = $detalle->sum('precio_total');
          $iva = $subtotal * 0.21;
          $total = $subtotal + $iva;
        @endphp
        <tfoot>
          <tr>
            <td colspan="3" class="text-right">Subtotal</td>
            <td class="text-right">${{ number_format($subtotal, 2) }}</td>
          </tr>
          <tr>
            <td colspan="3" class="text-right">IVA (21%)</td>
            <td class="text-right">${{ number_format($iva, 2) }}</td>
          </tr>
          <tr class="total">
            <td colspan="3" class="text-right">Total</td>
            <td class="text-right">${{ number_format($total, 2) }}</td>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- Footer -->
    <div class="footer-note">
      Esta factura fue generada electrónicamente y no requiere firma ni sello.
    </div>
  </div>
</body>
</html>
