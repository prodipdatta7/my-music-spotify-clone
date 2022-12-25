<?php 
	include "includes/config.php";
	if (isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
	}
	else {
		header("Location: register.php");
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome to My Music</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div id="mainContainer">
		<div id="topContainer">
			<div id="navbarContainer">
				<nav class="navbar">
					<a href="index.php" class="logo">
						<img src="assets/images/icons/logo.jpg" alt="">
					</a>
					<div class="group">
						<div class="navItem">
							<a href="search.php" class="navItemLink">Search
								<img src="assets/images/icons/search.png" alt="Search" class="search-icon">
							</a>
						</div>
					</div>
					<div class="group">
						<div class="navItem">
							<a href="browse.php" class="navItemLink">Browse</a>
						</div>

						<div class="navItem">
							<a href="your-music.php" class="navItemLink">Your Music</a>
						</div>

						<div class="navItem">
							<a href="profile.php" class="navItemLink">Profile</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<div id="nowPlayingBarContainer">
			<div id="nowPlayingBar">
				<div id="nowPlayingLeft">
					<div class="content">
						<span class="albumLink">
							<img src="https://i.ytimg.com/vi/qqm7NBd_lo0/maxresdefault.jpg" alt="square album" class="albumArtwork">
						</span>
						<div class="trackInfo">
							<span class="trackName">
								<span>Track Name</span>
							</span>
							<span class="artistName">
								<span>Artist Name</span>
							</span>
						</div>
					</div>
				</div>
				<div id="nowPlayingCenter">
					<div class="content playerControl">
						<div class="buttons">
							<button class="controlButton shuffle" title="Shuffle button">
								<img src="assets/images/icons/shuffle.png" alt="Shuffle">
							</button>
							<button class="controlButton previous" title="Previous button">
								<img src="assets/images/icons/previous.png" alt="Previous">
							</button>
							<button class="controlButton play" title="Play button">
								<img src="assets/images/icons/play.png" alt="Play">
							</button>
							<button class="controlButton pause" title="Pause button" style="display: none;">
								<img src="assets/images/icons/pause.png" alt="Pause">
							</button>
							<button class="controlButton next" title="Next button">
								<img src="assets/images/icons/next.png" alt="Next">
							</button>
							<button class="controlButton repeat" title="Repeat button">
								<img src="assets/images/icons/repeat.png" alt="Repeat">
							</button>
						</div>
						<div class="playbackBar">
							<span class="progressTime current">0.00</span>
							<div class="progressBar">
								<div class="progressBarBG">
									<div class="progress"></div>
								</div>
							</div>
							<span class="progressTime remaining">0.00</span>
						</div>
					</div>
				</div>
				<div id="nowPlayingRight">
					<div class="volumeBar">
						<button class="controlButton volume" title="Volume Button">
							<img src="assets/images/icons/volume.png" alt="Volume Icon">
						</button>
						<div class="progressBar">
							<div class="progressBarBG">
								<div class="progress"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>