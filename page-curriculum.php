<?php
/*
Template Name: Curriculum
*/
?>
<script>
window.onload = function() {
var url = "https://api-ssl.bitly.com/v3/link/clicks?access_token=2aa5953f2486c601f9dd7c229aa1747e9e25ef99&link=http%3A%2F%2Fbit.ly%2FSZP2hr"; var request = new xMLHttpRequest(); request.open("GET", url); request.onload = function() {
		if (request.status == 200) {
			updateNumber(request.responseText);
		}
	};
	
request.send(null); }

function updateNumber(responseText) {
	var countDiv = document.getElementById("curriculumDownloads"); countDiv.innerHTML = responseText;
}

window.onload = function() {
	
}

function updateSales(sales) {
	var salesDiv = document.getElementById("sales"); 
	for (var i = 0; i < sales.length; i++) {
		var sale = sales[i];
		var div = document.createElement("div"); 
		div.setattribute("class", "saleItem");
		div.innerHTML = sale.name + " sold " + sale.sales + " gumballs";
		salesDiv.appendChild(div);
	}
}

</script>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="center-wrap clearfix">
                
                	<div class="twelvecol clearfix">
                    	<div id="curriculumDownloads"></div>
                    </div>
                    
                    <div class="twelvecol clearfix">
                    	<div id="sales"></div>
                    </div>
                    
                    <script src="http://gumball.wickedlysmart.com/?callback=updateSales"></script>
                    
                    <div id="recent-blogs" class="twelvecol first clearfix">
                    	<h2>Recently on the Blog</h2>
                    	<ul class="blog-teasers">
							<?php $the_query = new WP_Query( 'showposts=4' ); ?>
                            <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                            <li>
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?></a>
                                <a href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
								<?php the_excerpt(__('(more…)')); ?>
                           	</li>
                            <?php endwhile;?>
                        </ul>
                    </div><!--/recent-blogs-->
    				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
