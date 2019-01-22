<?php

echo '
<div align="center">
    <h1>
	The Basic Idea Behind Voluno
    </h1>';
	
	#youtube video (open)
	if(1==1){
		echo '
		<iframe
		src="//www.youtube.com/embed/ZUdwOOSnXq4"
		width="800"
		height="533"
		frameborder="0"
		allowfullscreen="allowfullscreen"
		>
		</iframe>';
	}
	#youtube video (close)
	
	echo '
    <table style="width:40%;">
	<tr>
	    <td style="text-align:justify">';
		
		#long text (open)
		if(1==1){
		    echo '
		    <br>
		    <br>
		    <p>
			There are many problems in our world, especially in developing countries: hunger,
			conflicts, poor health, human right\'s violations, unemployment, poor education,
			environmental damage, weak institutions, discrimination and many more...
			<br>
			<br>
			But all over the world, there are people who would like to help solve
			these problems. Unfortunately, many of them don\'t know how to do it.
			Luckily, there are realistic and effective solutions and many local
			NGOs in developing countries are working hard to implement them.
			But there is too much work to do. They can\'t do it all alone. They need support.
			<br>
			<br>
			We want to give them the support they need. How? By bringing both sides together.
			This is why we created Voluno. Voluno is a platform where volunteers can donate their
			working time to local development organizations in developing countries. Completely online.
		    </p>';
		}
		#long text (close)
		
		#bullet points (open)
		if(1==1){
		    echo '
		    <p>
			This means that volunteers can support:
		    </p>
		    <br>
		    <ul>
			<li>
			    Whomever they want
			</li>
			<li>
			    By doing whatever they can and want
			</li>
			<li>
			    From wherever they want
			</li>
			<li>
			    Whenever they want
			</li>
		    </ul>
		    <br>
		    <p>
			And NGOs can get support:
		    </p>
		    <br>
		    <ul>
			<li>
			    In any possible area
			</li>
			<li>
			    By experts from all over the world
			</li>
			<li>
			    Totally free
			</li>
			<li>
			    Whenever they need it
			</li>
		    </ul>';
		}
		#bullet points (close)
		
		#conclusion (open)
		if(1==1){
		    echo '
		    <br>
		    <p>
			Voluno enables volunteers to support local
			development organizations without even having to leave their home.
			Let\'s all work together to generate real and sustainable development now.
		    </p>
		    <br>
		    <p style="text-align: center;">
			<a href="'.get_home_url().'">
			    <strong>
				Voluno. Stay home. Take action.
			    </strong>
			</a>
		    </p>';
		}
		#conclusion (close)
		
	    echo '
	    </td>
	</tr>
    </table>
</div>';

?>