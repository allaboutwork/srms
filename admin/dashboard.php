<?php

include('srms.php');

$object = new srms();

if(!$object->is_login())
{
	header("location:".$object->base_url."");
}

if(!$object->is_master_user())
{
	header("location:".$object->base_url."admin/result.php");
}

include('header.php');

?>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

	<!-- Content Row -->
	<div class="row row-cols-1 row-cols-md-3 g-4">
		<?php
		if($object->is_master_user())
		{
		?>
		<!-- Earnings (Monthly) Card Example -->
		<div class="col mb-6">
			<div class="card border-bottom-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-m font-weight-bold text-primary text-uppercase mb-1">Total Result Publish</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $object->Get_total_result(); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col mb-6">
			<div class="card border-bottom-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-m font-weight-bold text-primary text-uppercase mb-1">Total Exam</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $object->Get_total_exam(); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col mb-6">
			<div class="card border-bottom-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-m font-weight-bold text-primary text-uppercase mb-1">Total Student</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $object->Get_total_student(); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col mb-6">
			<div class="card border-bottom-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-m font-weight-bold text-primary text-uppercase mb-1">
								Total Subject</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $object->Get_total_subject();?></div>
						</div>
					</div>
				</div>
			</div>
		</div>     
		<div class="col mb-6">
			<div class="card border-bottom-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-m font-weight-bold text-primary text-uppercase mb-1">
								Total Classes</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $object->Get_total_classes();?></div>
						</div>
					</div>
				</div>
			</div>
		</div>                  

	<?php
	}
	?>
	</div>

<?php
include('footer.php');
?>