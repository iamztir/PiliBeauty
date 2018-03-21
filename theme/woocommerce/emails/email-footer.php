<?php
/**
 * Email Footer
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<style>

td#credit{background-color: #00a29e;}
td#credit a img{margin:0 3px !important}
td#credit p, td#credit p a {font-size:14px; color: #fff !important;}

</style>



															</div>
														</td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- Footer -->
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
                                    	<tr>
                                        	<td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td colspan="2" valign="middle" id="credit">
                                                        	<?php echo wpautop( wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?>
                                                        	
                                                        	<a href="https://www.facebook.com/ElemieNaturals" target="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/images/fb.png" />
								</a>
								<a href="https://instagram.com/elemienaturals" target="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/images/insta.png" />
								</a>
								<a href="https://twitter.com/elemienaturals" target="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" />
								</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>