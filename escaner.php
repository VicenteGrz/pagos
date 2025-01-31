<?php include('db_connect.php'); ?>
<style>
	input[type=checkbox] {
		/* Double-sized Checkboxes */
		-ms-transform: scale(1.3);
		/* IE */
		-moz-transform: scale(1.3);
		/* FF */
		-webkit-transform: scale(1.3);
		/* Safari and Chrome */
		-o-transform: scale(1.3);
		/* Opera */
		transform: scale(1.3);
		padding: 10px;
		cursor: pointer;
    }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <script src="assets/plugins/qrCode.min.js"></script>
</head>
<body>
  <div class="row justify-content-center mt-5">
    <div class="col-sm-4 shadow p-3">
      <h5 class="text-center">Buscar Registro</h5>
      <div class="row text-center">
        <a id="btn-scan-qr" href="#">
      
        <canvas hidden="" id="qr-canvas" class="img-fluid"></canvas>
        </div>
        <div class="row mx-5 my-3">
        <button class="btn btn-success btn-sm rounded-3 mb-2" onclick="encenderCamara()">Buscar</button>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Resultado de Búsqueda</title>
</head>
<body>
<style>
@media (min-width: 576px) {
      .col-sm-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 250%;
      }
    }
  </style>

<div class="container-fluid mt-5 min-vh-100">
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body overflow-auto">
          <div id="resultado-container">
            <!-- Contenido de la tabla u otro contenido aquí -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

              <!-- El contenido de la tabla se insertará aquí -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</div>
<style>
	td {
	}

	td p {
		margin: unset
	}

	img {
		max-width: 100px;
		max-height: :150px;
	}
</style>

<script src="assets/js/index.js"></script>
