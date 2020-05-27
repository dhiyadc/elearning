<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jitsi</title>
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
	<div id="root" class="h-100"></div>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src='https://meet.jit.si/external_api.js'></script>
	<script>
		const random = Math.round((Math.random() * 100))
		const username = `user_${random}`
		const email = `user_${random}@example.com`

		const isGuest = isUserGuest()
		const {
			domain,
			options
		} = getJitsiConfig(username, email)
		const roomSubject = 'Important Meetings!'
		const roomPassword = 'w0RKh4rdPlAYh4rd!'

		const api = new JitsiMeetExternalAPI(domain, options)
		api.addListener('readyToClose', () => {
			if (!isGuest) {
				console.log('Room Master Left!')
			}
			api.dispose()
		}).addListener('participantKickedOut', ({
			kicked
		}) => {
			if (api._myUserID == kicked.id) {
				api.executeCommand('hangup')
			}
		})

		if (isGuest) {
			api.addListener('passwordRequired', () => {
				api.executeCommand('password', roomPassword)
			})
		} else {
			api.addListener('videoConferenceJoined', () => {
				api.executeCommand('subject', roomSubject);
				api.executeCommand('password', roomPassword)
			})
		}

		function getJitsiConfig(username, email) {
			const roomName = 'MyRoomId12!@'
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
			return Math.round(Math.random() * 1)
		}

	</script>
</body>

</html>
