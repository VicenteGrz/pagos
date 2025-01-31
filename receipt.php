<?php
include 'db_connect.php';
$fees = $conn->query("SELECT ef.*,s.name as sname,s.id_no,concat(c.course,'  ',c.level) as `class` FROM student_ef_list ef inner join student s on s.id = ef.student_id inner join courses c on c.id = ef.course_id  where ef.id = {$_GET['ef_id']}");
foreach ($fees->fetch_array() as $k => $v) {
	$$k = $v;
}
$payments = $conn->query("SELECT * FROM payments where ef_id = $id ");
$pay_arr = array();
while ($row = $payments->fetch_array()) {
	$pay_arr[$row['id']] = $row;
}
?>

<style>
	.flex {
		display: inline-flex;
		width: 100%;
	}

	.w-50 {
		width: 50%;
	}

	.text-center {
		text-align: center;
	}

	.text-right {
		text-align: right;
	}

	table.wborder {
		width: 100%;
		border-collapse: collapse;
	}

	table.wborder>tbody>tr,
	table.wborder>tbody>tr>td {
		border: 1px solid;
	}

	p {
		margin: unset;
	}
</style>
<div class="container-fluid">
	<p class="text-center"><b><?php echo $_GET['pid'] == 0 ? "Universidad Del Norte de Tamaulipas" : 'Recibo de Pago UNT' ?></b></p>
	<img src="na.png" alt="Descripción de la imagen">
	<hr>
	<div class="flex">
		<div class="w-50">
			<p>Folio: <b><?php echo $ef_no ?></b></p>
			<p>Fecha de Expedicion: <b><?php echo date("d/m/Y"); ?></b></p>
			<p>Alumno: <b><?php echo ucwords($sname) ?></b></p>
			<p>Matricula: <b><?php echo $id_no ?></b></p>
			<p>Periodo: <b><?php ?></b>2024</p>
			<p>Tramite: <b><?php echo $class ?></b></p>
			<p>Numero de cuenta: <b><?php  ?></b>01447065088415581</p>
			<p>Santander: <b><?php  ?></b>65508841558</p>
			<p>Deposito OXXO: <b><?php  ?></b>5579 0890 0439 7983</p>

		</div>
		<?php if ($_GET['pid'] > 0) : ?>
			<div class="w-50">
			    <p>Numero de cuenta: <b><?php  ?></b>01447065088415581</p>
			    <p>Tramite: <b><?php echo $class ?></b></p>
				<p>Fecha de Expedicion: <b><?php echo isset($pay_arr[$_GET['pid']]) ? date("d m,Y", strtotime($pay_arr[$_GET['pid']]['date_created'])) : '' ?></b></p>
				<p>Fecha de Vencimiento: <b><?php echo isset($pay_arr[$_GET['pid']]) ? date("d m,Y", strtotime($pay_arr[$_GET['pid']]['date_created'])) : '' ?></b></p>
				<p>Monto de Pago: <b><?php echo isset($pay_arr[$_GET['pid']]) ? number_format($pay_arr[$_GET['pid']]['amount'], 2) : '' ?></b></p>
				<p>Observación: <b><?php echo isset($pay_arr[$_GET['pid']]) ? $pay_arr[$_GET['pid']]['remarks'] : '' ?></b></p>
			</div>
		<?php endif; ?>
	</div>
	<hr>
	<p><b></b></p>
	<table class="wborder">
		<tr>
			<td width="50%">
				<p><b></b></p>
				<hr>
				<table width="100%">
					<tr>
						<td width="50%">Concepto</td>
					</tr>
					<?php
					$cfees = $conn->query("SELECT * FROM fees where course_id = $course_id");
					$ftotal = 0;
					while ($row = $cfees->fetch_assoc()) {
						$ftotal += $row['amount'];
					?>
						<tr>
							<td><b><?php echo $row['description'] ?></b></td>
							<td class='text-right'><b><?php echo number_format($row['amount']) ?></b></td>
						</tr>
					<?php
					}
					?>
				</table>
			</td>
			<td width="50%">
			<p><b>Información de Pago</b></p>
<table width="100%" class="wborder">
    <tr>
        <td width="50%"><?php echo "Fecha: " . date("d/m/Y"); ?></td>
        <td width="50%" class='text-right'>Monto</td>
    </tr>
</table>
					<?php
					$ptotal = 0;
					foreach ($pay_arr as $row) {
						if ($row["id"] <= $_GET['pid'] || $_GET['pid'] == 0) {
							$ptotal += $row['amount'];
					?>
							<tr>
								<td><b><?php echo date("d-m-Y", strtotime($row['date_created'])) ?></b></td>
								<td class='text-right'><b><?php echo number_format($row['amount']) ?></b></td>
							</tr>
					<?php
						}
					}
					?>
				</table>
				<table width="100%">
					<tr>
						<td>TOTAL A PAGAR</td>
						<td class='text-right'><b><?php echo number_format($ftotal) ?></b></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>