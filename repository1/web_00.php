<!DOCTYPE html>
<html>
<head>
	<title>Playlist en ligne</title>

	<link rel="stylesheet" type="text/css" href="Style.css"/>


</head>
<body>
	<fieldset id="container">
		<div id="navBar">
			<li>Menu</li>
			<li>Bienvenu</li>
			<li><a href="#playlist">Playlist</a></li>
		</div>
	</fieldset><br><br><br>
	<div id="block1"><h2>Bienvenu sur ma page, cliquer sur un titre pour lancé le lecteur</h2></div>
	<div id="block2"></div>

<br><br><br><br><br><br>

	<h3><a id="playlist"> Playlist</h3>
<br><br><br><br>

	<fieldset><legend id="lect"> Lecteur002 </legend>
		<audio src="" controls volume="" id="audio"></audio>
		
		<button id="prev"> precedent </button>
		<button id="next"> suivant </button>
		<br>
		Volume : <input id="vol" type="range" value="100" min="0" max="100" step="1"/>
		<br>
		<p id="piste"></p>
	</fieldset>

<br><br><br><br><br><br>

<div id="div" class="defaut">
 <ol id="titre">
 	<li class="song-actuel" ><a href="ressources/08 Only inhuman.mp3">Sonic Syndicate - Only inhuman</a></li>
	<li><a href="ressources/08 Bother.mp3">Stone sour - Bother</a></li>
	<li><a href="ressources/02 Piste 2.mp3">Nickelbac - Silver side up</a></li>
	<li><a href="ressources/03 Killer Queen.mp3">Queen - Killer Queen</a></li>
	<li><a href="ressources/02 Long Hard Road Out Of Hell.mp3">Marilyn Manson - Long Hard Road Out Of Hell</a></li>
	<li><a href="ressources/01 Bohemian Rhapsody.mp3">Queen - Bohemian Rhapsody</a></li>
	<li><a href="ressources/shinedown-simple-man-video.mp3">Shinedown - Simple man</a></li>
	<li><a href="ressources/jekyll-and-hyde-five-finger-death-punch.mp3">Five Finger Death Punch - jekyll and hyde</a></li>
	<li><a href="ressources/gus-g-just-cant-let-go-feat-jacob-bunton.mp3">Gus G - Just cant let go feat jacob bunton</a></li>
	<li><a href="ressources/killswitch-engage-my-curse-official-video.mp3">Killswitch Engage - My curse</a></li>
	<li><a href="ressources/motorjesus-trouble-in-motor-city.mp3">Motorjesus - Trouble in motor city</a></li>
	<li><a href="ressources/speed-of-the-beast-motorjesus.mp3">Motorjesus - Speed of the beast </a></li>
	<li><a href="ressources/01 The Number of the Beast.mp3">Iron Maiden - The Number of the Beast</a></li>
 </ol>

</div>

	
	<script src="https://code.jquery.com/jquery-3.1.0.js">
	</script>
	<script>
		$(document).ready(function(){

			audio();
			//definit le lecteur audio :
			function audio(){
				

				var songActuel = 0;
				$('#audio')[0].src = $('#titre li a')[0];
				$('#audio')[0].play();

				//ici on va gerer le click sur un titre :
				$('#titre li a').click(function(e){
					e.preventDefault();
					$('#audio')[0].src = this;
					$('#audio')[0].play();

					$('#piste').text($('#audio')[0].src);//pour affiché la piste

					$('#titre li').removeClass('song-actuel');
					 songActuel = $(this).parent().index();
					 $(this).parent().addClass('song-actuel');

				});

				$('#audio')[0].addEventListener('ended', function(){
					songActuel++;
					if(songActuel == $('#titre li a').lenght)
						songActuel = 0;

					$('#titre li ').removeClass('song-actuel');
					$('#titre li:eq('+songActuel+')').addClass('song-actuel');

					$('#audio')[0].src = $('#titre li a')[songActuel].href;
					$('#audio')[0].play();
					

				});
				//definit le bouton suivant :
				$('#next').click(function(){
					songActuel++;
					$('#titre li').removeClass('song-actuel');
					$('#titre li:eq('+songActuel+')').addClass('song-actuel');
						
					$('#audio')[0].src = $('#titre li a')[songActuel].href;
					$('#audio')[0].play();

					$('#piste').text($('#audio')[0].src);//pour affiché la piste
	

				});
				//definit le le bouton precedent :
				$('#prev').click(function(){
					songActuel--;
					$('#titre li').removeClass('song-actuel');
					$('#titre li:eq('+songActuel+')').addClass('song-actuel');	

					$('#audio')[0].src = $('#titre li a')[songActuel].href;
					$('#audio')[0].play();

					$('#piste').text($('#audio')[0].src);//pour affiché la piste

				
				});


			};
		});
		</script>
</body>
</html>
