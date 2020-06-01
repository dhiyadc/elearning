<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $classTitle ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
		html,
		body {
			height: 100%;
			overflow: hidden;
		}

	</style>
</head>

<body>
	<?php if ($this->session->flashdata('message')): ?>
	<div class="modal fade" id="modalNotif" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?=$this->session->flashdata('message');?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php endif?>

    <div id="root" class="h-100"></div>
    
	<script src='https://meet.jit.si/external_api.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/js/script.js') ?>"></script>
	<script>
		const username = '<?= $userName ?>'
		const email = '<?= $userEmail ?>'

		const isGuest = isUserGuest()
		const { domain, options} = getJitsiConfig(username, email)
		const roomSubject = '<?= $classActivity['activityDescription'] ?>'
		const roomPassword = '<?= sha1("$classId $ownerId $classActivity[activityId]") ?>'

		const api = new JitsiMeetExternalAPI(domain, options)
		api.addListener('readyToClose', () => {
			if (!isGuest) {
				window.location.replace("<?= base_url("class/$classId/$classActivity[activityId]/close") ?>");
			} else {
				window.location.replace("<?= base_url("class/$classId") ?>");
			}
			api.dispose()
		}).addListener('participantKickedOut', ({kicked}) => {
			if (api._myUserID == kicked.id) {
				api.executeCommand('hangup')
			}
		}).addListener('passwordRequired', () => {
			api.executeCommand('password', roomPassword)
		})

		if (!isGuest) {
			api.addListener('videoConferenceJoined', () => {
				api.executeCommand('subject', roomSubject)
				api.executeCommand('password', roomPassword)
			})
		}

		function getJitsiConfig(username, email) {
			const roomName = '<?= sha1("$classId $classActivity[activityDescription]") ?>'
			const domain = 'meet.jit.si'
			const options = {
				roomName: roomName,
				parentNode: document.getElementById('root'),
				width: '100%',
				height: '100%',
				userInfo: {
					email: email,
					displayName: username
				},
				interfaceConfigOverwrite: {
					SHOW_JITSI_WATERMARK: false,
					SHOW_WATERMARK_FOR_GUESTS: false,
					DISABLE_VIDEO_BACKGROUND: true,
				}
			}

			if (isGuest) {
				options.configOverwrite = {
					remoteVideoMenu: {
						disableKick: true
					},
					disableRemoteMute: true,
				}

				options.interfaceConfigOverwrite = {
					...options.interfaceConfigOverwrite,
					TOOLBAR_BUTTONS: [
						'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen', 'hangup', 'chat',
						'raisehand', 'tileview', 'settings', 'videoquality'
					],
					SETTINGS_SECTIONS: ['devices', 'language', 'profile', 'calendar'],
				}
			}

			return {
				domain: domain,
				options: options
			}
		}

		function isUserGuest() {
			return <?= $ownerId != $this->session->userdata('id_user')?>
		}

	</script>
</body>

</html>
