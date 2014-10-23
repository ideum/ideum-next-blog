<?php
/**
 * The template for displaying 401 pages (Unauthorized Access)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

  $context = Timber::get_context();
  Timber::render('401.twig', $context);