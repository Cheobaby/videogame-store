<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingresar Producto</title>
  <!-- Enlaces a los archivos CSS de Bootstrap y Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      max-width: 500px;
      margin-top: 50px;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    .form-label {
      font-weight: bold;
      color: #555;
    }

    .form-control {
      border-radius: 0;
      box-shadow: none;
    }

    .btn-primary {
      background-color: #ff5e3a;
      border-color: #ff5e3a;
      font-size: 18px;
      font-weight: bold;
      letter-spacing: 1px;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #ff4c2a;
      border-color: #ff4c2a;
    }

    .icon-input {
      position: relative;
    }

    .icon-input i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: 10px;
      color: #aaa;
    }

    .icon-input input {
      padding-left: 35px;
    }

    .required-field::before {
      content: "*";
      color: red;
    }

    .card-header {
      background-color: #ff5e3a;
      color: #fff;
      font-weight: bold;
    }

    .card-footer {
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h1>Ingresar Producto</h1>
      </div>
      <div class="card-body">
          <form method="POST" action="insert_productos.php">          
           <div class="mb-3">
            <label for="categoria" class="form-label required-field">Categoría:</label>
            <div class="icon-input">
              <i class="fas fa-tags"></i>
              <select class="form-select" id="categoria" name="categoria" required>
                <option value="">Seleccionar</option>
                <option value="ac_1">ac_1</option>
                <option value="gm_1">gm_1</option>
                <option value="pl_1">pl_1</option>
                <option value="sw_1">sw_1</option>
                <option value="x_1">x_1</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="estatus" class="form-label required-field">Estatus:</label>
            <div class="icon-input">
              <i class="fas fa-check-circle"></i>
              <select class="form-select" id="estatus" name="estatus" required>
                <option value="">Seleccionar</option>
                <option value="PR_1">PR_1</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label required-field">Nombre del Producto:</label>
            <div class="icon-input">
              <i class="fas fa-cube"></i>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label required-field">Descripción:</label>
            <div class="icon-input">
              <i class="fas fa-align-left"></i>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
          </div>
          <div class="mb-3">
            <label for="precio" class="form-label required-field">Precio Unitario:</label>
            <div class="icon-input">
              <i class="fas fa-dollar-sign"></i>
              <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="cantidad" class="form-label required-field">Cantidad:</label>
            <div class="icon-input">
              <i class="fas fa-sort-numeric-up"></i>
              <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="idEmpleado" class="form-label required-field">ID Empleado:</label>
            <div class="icon-input">
              <i class="fas fa-id-badge"></i>
              <select class="form-select" id="idEmpleado" name="idEmpleado" required>
                <option value="">Seleccionar</option>
                <option value="1">1</option>
                <option value="10">10</option>
                <option value="100">100</option>
                <option value="102">102</option>
                <option value="106">106</option>
                <option value="109">109</option>
                <option value="11">11</option>
                <option value="111">111</option>
                <option value="112">112</option>
                <option value="113">113</option>
                <option value="115">115</option>
                <option value="116">116</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="42">42</option>
                <option value="44">44</option>
                <option value="7">7</option>
                <option value="tra_1">tra_1</option>
                <option value="tra_2">tra_2</option>
                <option value="tra_3">tra_3</option>
                <option value="tra_4">tra_4</option>
                <option value="tra_5">tra_5</option>
                <option value="tra_6">tra_6</option>
              </select>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Enlaces a los archivos JavaScript de Bootstrap y Font Awesome -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>
