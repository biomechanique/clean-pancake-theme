<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

    <head>
        <title><?php echo __('timesheet:forproject', array($project)); ?> | <?php echo Settings::get('site_name'); ?></title>
        <!--favicon-->
        <link rel="shortcut icon" href="" />
        <!--metatags-->
        <meta name="robots" content="noindex,nofollow" />
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />

        <!-- CSS -->
        <?php echo asset::css('invoice_style.css', array('media' => 'all'), NULL, $pdf_mode); ?>
<script type="text/javascript">
      WebFontConfig = {
			google: { 
			    families: ['PT+Sans+Narrow:400,700','Droid+Serif:400,700,700italic,400italic']
			}
      };
      (function() {
    	var wf = document.createElement('script');
    	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    	wf.type = 'text/javascript';
    	wf.async = 'true';
    	var s = document.getElementsByTagName('script')[0];
    	s.parentNode.insertBefore(wf, s);
      })();
</script>
	<?php if (Settings::get('frontend_css')): ?>
	<style type="text/css"><?php echo Settings::get('frontend_css'); ?></style>
<?php endif; ?>
    </head>

    <body class="timesheet <?php echo is_admin() ? 'admin' : 'not-admin';?> <?php echo ($pdf_mode) ? 'pdf_mode' : '';?>">
	    <?php if( ! $pdf_mode): ?>
			<div id="buttonBar">

				<div id="buttonHolders">
				<?php if (is_admin()): ?>
					<?php echo anchor('admin/invoices/'.((isset($is_estimate) and $is_estimate) ? 'estimates' : 'all'), 'Go to Admin &rarr;', 'class="button"'); ?>
				<?php endif; ?>
				<div id="pdf">
					<a href="<?php echo $timesheet_url_pdf; ?>" title="Download PDF" id="download_pdf" class="button">Download PDF</a>
				</div><!-- /pdf -->

				
				</div><!-- /buttonHolders -->

			</div><!-- /buttonBar -->
		<?php endif; ?>
        <div id="wrapper">

            <div id="header">
                
                <div id="clientInfo">
            <div id="envelope2">
              <table cellspacing="5" cellpadding="5" width="100%">
                <tr>
                  <td width="50%" style="vertical-align:top;"><h2><?php echo __('timesheet:for');?><br /><?php echo $client['company'];?></h2>
                    <p>
					   <?php echo $client['company'];?> - <?php echo $client['first_name'].' '.$client['last_name'];?><br />
                       <?php echo nl2br($client['address']);?>
					</p>
				    <p>
                       <strong><?php echo __('projects:project');?>:</strong> <?php echo $project;?><br />
                       <strong><?php echo __('partial:dueon');?>: </strong><?php echo $project_due_date ? format_date($project_due_date) : '<em>n/a</em>';?><br />
                       <strong><?php echo __('timesheet:totalbillable');?>: </strong><?php echo $total_hours;?><br />
                    </p>
				  </td>
                  <td width="50%" style="text-align:right;vertical-align:top;">
                      <?php echo logo(false, false, 2);?>
                      <p><?php echo nl2br(Settings::get('mailing_address')); ?></p>
                  </td>
                </tr>
              </table>
              <br /> <br />
            </div>
		  </div><!-- /clientInfo -->
            </div><!-- /header -->
            <?php echo $template['body']; ?>
            <div id="footer">

            </div><!-- /footer --><!-- /wrapper -->

        </div>
    </body>
    
</html>