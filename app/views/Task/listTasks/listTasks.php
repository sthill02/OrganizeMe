<div class="row">
	<div class="col-sm-1"></div>

	<div class="col-sm-9">
		<ol class="breadcrumb" style="background-color:#fff">
			<li>
		  		<div class="btn-group" role="group">
		    		<a href="<?= generateLink('task', 'register', [$projectId]); ?>" type="button" class="btn btn-success">
		      			<span class="glyphicon glyphicon-plus"></span>
		      			Nova tarefa
		    		</a>
		  		</div>
  			</li>
		</ol>

		<div class="table-responsive" style="margin:30px 0px;">
			<table class="table table-bordered display" id="listagem">
				<thead>
					<tr>
						<?php if(isset($tableHeader) && !empty($tableHeader)): ?>
							<?php foreach ($tableHeader as $header): ?>
								<th>
									<?= $header; ?>
								</th>
							<?php endforeach; ?>
						<?php endif; ?>

						<th>Ações</th>
					</tr>
				</thead>

				<tbody>
					<?php if(isset($tasks) && !empty($tasks)): ?>
						<?php foreach ($tasks as $task): ?>
							<tr>
								<?php foreach ($tableHeader as $key => $header): ?>
									<td>
										<?php if (strpos($key, 'date') !== false): ?>
											<?= formatDateToBR($task[$key]); ?>
										<?php elseif ($key == 'completed'): ?>
											<?= ($task['completed'] ? 'Sim' : 'Não'); ?>
										<?php else: ?>
											<?= $task[$key]; ?>
										<?php endif; ?>
									</td>
								<?php endforeach; ?>

								<td class="text-center">
									<?php if (!$task['completed'] && (($task['creator_id'] == $_SESSION['user']['id']) || ($task['performer_id'] == $_SESSION['user']['id']))): ?>
										<a class='btn btn-default' href='<?= generateLink('task', 'completeTask', [$task['project_id'], $task['id']]); ?>' title='Concluir tarefa'>
											<span class='glyphicon glyphicon-ok'></span>
										</a>
									<?php endif; ?>

									<a class='btn btn-default' href='<?= generateLink('task', 'visualize', [$task['project_id'], $task['id']]); ?>' title='Visualizar tarefa'>
										<span class='glyphicon glyphicon-eye-open'></span>
									</a>

									<?php if ($task['creator_id'] == $_SESSION['user']['id']): ?>
										<a class='btn btn-default' href='<?= generateLink('task', 'edit', [$task['project_id'], $task['id']]); ?>' title='Editar tarefa'>
											<span class='glyphicon glyphicon-pencil'></span>
										</a>

										<a class='btn btn-danger' href='#' onclick='openDeleteModal("<?= $task['project_id'] . '/' . $task['id']; ?>", "task", $(this));return false;' title='Excluir tarefa'>
											<span class='glyphicon glyphicon-remove'></span>
										</a>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	function openUploadFileModal(taskId){
		var action = $(location).attr('origin') + "/file/saveFile/" + taskId;

		$('#form-file').attr('action', action);

		$('#file_modal').modal({
			show: true,
		});
	}
</script>

<?php include_once(PATH_ROOT . '/app/views/Container/deleteModal.php') ?>

<script type="text/javascript">
	activeMenu('list_projects');
</script>