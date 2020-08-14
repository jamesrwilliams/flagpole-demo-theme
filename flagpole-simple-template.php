<?php  /* Template Name: Flagpole - Simple */ ?>
<?php get_header(); ?>

<section style="background: #eee">
	<div class="section-inner">

		<h1>Flagpole Debug</h1>

		<p style="font-size: 25px;">You are currently <mark><?php echo ( is_user_logged_in() ? 'logged in' : 'logged out') ?></mark> which might effect which flags are enabled.</p>

		<p style="margin-bottom: 0">Output of <code>[debugFlagpole_flags]</code> shortcode:</p>
        <?php echo do_shortcode('[debugFlagpole_flags]'); ?>

		<p style="margin-bottom: 0">Output of <code>[debugFlagpole_groups]</code> shortcode:</p>
		<?php echo do_shortcode('[debugFlagpole_groups]'); ?>

		<h4>Query string preview links:</h4>

		<ul>
			<li>
				<ul>
					<li><a href="./?flag=example-flag-3">example-flag-1</a></li>
					<li><a href="./?flag=example-flag-3">example-flag-2</a></li>
					<li><a href="./?flag=example-flag-3">example-flag-3</a></li>
				</ul>
			</li>
			<li>
				<ul>
					<li><a href="./?flag=group-1">group-1</a></li>
					<li><a href="./?flag=private-group-1">private-group-1</a></li>
					<li><a href="./?flag=public-group">public-group</a></li>
				</ul>
			</li>
		</ul>
        <?php checkFlag( 'random-flag-0' ); ?>
	</div>
</section>

<?php

	function checkFlag($flagKey) {

		$status = flagpole_flag_enabled( $flagKey );

		echo "<h3><code>" . $flagKey . "</code> " . ($status ? 'is enabled!' : 'is not enabled.' ) . '</h3>';

	}

?>

<?php get_footer(); ?>
