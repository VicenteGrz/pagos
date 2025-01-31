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
						<b>Lista de Estudiantes </b>

							</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="">Nombre</th>
									<th class="">Datos</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$quejas = $conn->query("SELECT * FROM alumnos_2023 order by nombre asc ");
								while ($row = $quejas->fetch_assoc()) :
								?>
									<tr>

										<td>
											<?php echo ucwords($row['nombre']) ?>
										</td>
										<td class="">
											<p>Carrera: <?php echo $row['carrera'] ?></p>
											<p>Direccion: <?php echo $row['direccion'] ?></p>
											<p>Telefono: <?php echo $row['telefono'] ?></p>
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
		uni_modal("Nuevo Estudiante ", "manage_quejas.php", "mid-large")

	})
	$('.edit_student').click(function() {
		uni_modal("Gestionar Información de Estudiante", "manage_quejas.php?id=" + $(this).attr('data-id'), "mid-large")

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