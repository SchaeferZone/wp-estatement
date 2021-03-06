<?php
	global $options;

	$meta = get_post_meta( get_the_ID() );

	$subtitle_fields = get_option( 'est_property_subtitles' );
	$subtitle = est_property_subtitle( $options );
?>
<div <?php post_class('layout-property-list') ?>>
<?php est_webmaster_tools_data() ?>

	<div class='row'>
		<?php if( has_post_thumbnail() ) : ?>
			<div class='large-6 small-12 columns'>
				<div class='post-image'>
					<a href='<?php the_permalink() ?>' class='hoverlink hide-for-small'>
						<?php the_post_thumbnail( 'est_card' ) ?>
					</a>
					<a href='<?php the_permalink() ?>' class='hoverlink show-for-small mb11'>
						<?php the_post_thumbnail( 'est_card_wide' ) ?>
					</a>
				</div>
			</div>
		<?php endif ?>

		<div class='large-6 small-12 columns'>
			<hgroup>
				<h1><a href='<?php the_permalink() ?>'><?php the_title() ?></a></h1>
				<?php if( !empty( $subtitle ) ) : ?>
					<h2 class='light'><?php echo $subtitle ?></h2>
				<?php endif ?>
			</hgroup>

			<?php if( !empty( $options['show_excerpt'] ) AND $options['show_excerpt'] == 'show'  ): ?>
			<div class='excerpt content mb11'>
				<?php
					$length = get_theme_mod( 'property_excerpt_length' );
					ob_start();
					the_excerpt();
					$excerpt = ob_get_clean();
					if( !empty( $length ) AND !empty( $excerpt ) ) {
						$excerpt = strip_tags( $excerpt );
						$excerpt = substr( $excerpt, 0, $length );
						$spos = strrpos( $excerpt, ' ' );
						$excerpt = substr( $excerpt, 0, $spos );
						$excerpt .= '...';
					}

					echo $excerpt;
				?>
			</div>
			<?php endif ?>

			<?php
				show_property_detail_table( get_property_detail_list( $options ), '' )
			?>

			<?php if( $options['excerpt'] == true ) : ?>
				<div class='excerpt content'>
					<?php the_excerpt() ?>
				</div>
			<?php endif ?>


		</div>

	</div>


</div>