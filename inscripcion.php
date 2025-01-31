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

<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">

			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Inscripciones </b>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="">id</th>
									<th class="">Nombre</th>
									<th class="">Información</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$student = $conn->query("SELECT * FROM inscripcion_universidad order by id asc ");
								while ($row = $student->fetch_assoc()) :
								?>
									<tr>
										<td class="text-center"><?php echo $i++ ?></td>
										<td>
											<?php echo $row['id'] ?>
										</td>
										<td>
											<?php echo ucwords($row['nombre']) ?>
										</td>
										<td class="">
										    <p>Carrera: <?php echo $row['carrera_interes'] ?></p>
											<p>Turno: <?php echo $row['turno'] ?></p>
											<p>Sexo: <?php echo $row['sexo'] ?></p>
											<p>Edad: <?php echo $row['edad'] ?></p>
											<p>Direccion: <?php echo $row['direccion'] ?></p>
											<p>Telefono: <?php echo $row['telefono'] ?></p>
											<p>Correo Electronico: <?php echo $row['email'] ?></p>
                                            <p>Fecha de Nacimiento: <?php echo $row['fecha_nacimiento'] ?></p>
											<p>Lugar de Nacimiento: <?php echo $row['lugar_nacimiento'] ?></p>
											<p>Carrera de Interes Secundaria: <?php echo $row['carrera_interes_sec'] ?></p>
											<p>Escuela de Procedencia: <?php echo $row['escuela_procedencia'] ?></p>
											<p>Revalidacion: <?php echo $row['revalidar'] ?></p>
											<p>Fecha de Ultimos Estudios: <?php echo $row['fecha_ult_estudios'] ?></p>
											<p>Cuenta con Beca: <?php echo $row['beca'] ?></p>
											<p>Status: <?php echo $row['status'] ?></p>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>

						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>

</div>
<style>
	td {
		vertical-align: middle !important;
	}

	td p {
		margin: unset
	}

	img {
		max-width: 100px;
		max-height: :150px;
	}
</style>

<script>
	$(document).ready(function() {
		$('table').dataTable()
	})
	$('#new_student').click(function() {
		uni_modal("Nuevo Estudiante ", "manage_student.php", "mid-large")

	})
	$('.edit_student').click(function() {
		uni_modal("Gestionar Información de Estudiante", "manage_student.php?id=" + $(this).attr('data-id'), "mid-large")

	})
	$('.delete_student').click(function() {
		_conf("Deseas eliminar este estudiante? ", "delete_student", [$(this).attr('data-id')])
	})

	function delete_student($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_student',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Datos eliminados exitósamente", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>