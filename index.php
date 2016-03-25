<?php include('Header.php'); ?>
<div class="scrollToTop">
	Navigation<br><br>
	<a href="#WhyThisSub">Mais... Pourquoi ce sujet ?</a><br><br>
</div>
<article>
	<h1>Etude de l'entreprise Azerti</h1>
	<div class="row">
		<div class="large-12 medium-12 small-12 columns">
			<div class="large-8 large-centered medium-8 medium-centered small-12 columns">
				<ul  id="slideShow" class="example-orbit" data-orbit>
					<li class="active center">
					   <a href="PresentationAzerti.php"><img class="imageSlide" src="images/facadeL.jpg" alt="slide 2" />
					    <div class="orbit-caption">Présentation d'Azerti</div></a>
					</li>
			  		<li>
					    <a href="Echecs.php"><img class="imageSlide" src="images/Echecs.jpg" alt="image d'un pion d'échec" />
					    <div class="orbit-caption">Nos échecs et rebondissements</div></a>
					</li>
					<li>
					    <a href="Contact.php"> <img class="imageSlide" src="images/Team.jpg" alt="slide 3" />
					    <div class="orbit-caption">Un avis à nous partager ? Une question à nous poser ? Cliquez ici</div></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</article>
<section id="WhyThisSub" class="panel large-8 large-centered medium-8 medium-centered small-12 columns">
	<h2>Mais... Pourquoi ce sujet !</h2>
	<p>
		Pour choisir le sujet, nous nous sommes réunis afin de prendre en compte les goûts et les souhaits de chacun. Différents sujets
		ont été proposés, notamment sur les Youtubers, les White-Hats ou encore les droits d’auteur appliqués aux jeux vidéo. Afin de réduire la liste,
		nous avons pris en compte le fait de devoir faire une interview : il fallait trouver quelqu'un qui voudrait bien répondre à nos questions et qui
		serait disponible. Tout en sachant que nous n'y étions pas obligés, nous voulions tout de même rester dans le domaine de l'informatique. Nous avons
		cherché un sujet autour de cette entreprise qui est, par ailleurs, relativement proche de l'IUT. Nous avons tout de suite pensé au gérant de l'entreprise
		AZERTI que nous étions déjà allés voir pour une courte interview dans le cadre des cours de Projet Personnel et Professionnel. Nous nous sommes donc
		intéressés aux différentes activités de l'entreprise que nous avons recensées. L'activité de vente aux particuliers est celle qui prédomine entre toutes.
		Nous nous sommes donc penchés sur les mécanismes de la vente, plus particulièrement de l’appel d’offre, que nous avons étudiés. Il nous est venu à l'idée
		de l'expérimenter : pourquoi ne pas organiser un accord entre AZERTI et l’ABII ?
	</p>
</section>
<?php
	if(isset($_GET['form']))
	{
		if($_GET['form']==0)
		{
			?>
				<SCRIPT> alert("Votre message a bien été envoyé ! ") </SCRIPT>
			<?php
		}
		else if($_GET['form']==1)
		{
			?>
				<SCRIPT> alert("Une erreur est parvenue: votre message n'a pas été envoyé. ") </SCRIPT>
			<?php
		}
	}	
?>
<?php include('Footer.php'); ?>
		