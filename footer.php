			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="clearfix">

					<nav role="navigation">
						<?php bones_footer_links(); ?>
					</nav>

				</div> <!-- end #inner-footer -->

			</footer> <!-- end footer -->

            <div id="huesBar" class="clearfix" style="background:#222; padding:0 12px">
                <div class="fb-like" style="float:right;margin:7px 0 0 12px" data-href="https://www.facebook.com/healthyunderstoodeducatedsafe/" data-width="140" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                <p style="margin:14px; line-height:1.1; font-size:14px; color:rgba(255,255,255,.5); text-align:right;">
                    This project is part of <em style="font-family:georgia,serif;"><a style="text-decoration:none;" href="http://hues.xyz" alt="hues Global Justice Collective"><span style="color:#f5a81c">h</span><span style="color:#e81d76">u</span><span style="color:#42b4e3">e</span><span style="color:#00a897">s</span></a></em>, a global justice collective
                </p>
            </div>

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>
	</body>

	<script src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready( function() {

            // When site loaded, load the Popupbox First
            unloadThanksShare();

            $('#openThanksShare').click( function() {
                loadThanksShare();
            });

            $('#closeThanksShare').click( function() {
                unloadThanksShare();
            });

            $('#thanks-share-bg').click( function() {
                unloadThanksShare();
            });

            function unloadThanksShare() {    // TO Unload the Popupbox
                $('#thanks-share').css({
                    "display": "none"
                });
                $("#thanks-share-bg").css({
                    "display": "none"
                });
            }

            function loadThanksShare() {    // To Load the Popupbox
                $('#thanks-share').css({
                    "display": "block"
                });
                $("#thanks-share-bg").css({ // this is just for style
                    "display": "block"
                });
            }
        });
    </script>
</html> <!-- end page. what a ride! -->
