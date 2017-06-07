		<?php
		foreach(Yii::app()->user->getFlashes() as $key =>$message)
		{
			echo '<div class="alert alert-'.$key.'">'.$message.'</div>';
		}
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title></title>
			<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
			<meta name="viewport" content="width=device-width" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
			<style type="text/css">
				body {
					width: 100%;
					margin: 0;
					padding: 0;
					/* Prevent auto resizing of font size in certain email clients */
					-webkit-text-size-adjust: 100% !important;
					-ms-text-size-adjust: 100% !important;
				}
				img {
					border: 0 none;
					outline: none;
					text-decoration: none;
					-ms-interpolation-mode: bicubic;
				}
				table {
					border-collapse: collapse;
				}
				/* Removes unwanted gap with aligned tables in Outlook */
				table, td {
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
				}
				/* Forces Outlook to display email at 100% width */
				.ExternalClass {
					width: 100%;
				}
				/* Corrects line-height issues on Outlook */
				.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
					line-height: 100%;
				}
				/* Mobile Responsive Styles */
				/* Using attribute selectors to hide mobile styles from Yahoo! Mail */
				@media only screen and (max-width: 480px) {
					table[class=mobile-width], td[class=mobile-width], img[class=mobile-width] {
						width: 100% !important;
						height: auto !important;
					}
					table[class=center], td[class=center] {
						width: 100% !important;
						height: auto !important;
						text-align: center !important;
						padding-left: 0px !important;
						padding-right: 0px !important;
					}
					td[class=wrapper] {
						min-width: 0 !important;
						padding-top: 0 !important;
						padding-left: 0 !important;
						padding-right: 0 !important;
					}
					td[class=hero] {
						height: auto !important;
						background-image: url(img/hero-bg.jpg) !important;
						background-position: center !important;
						background-size: cover !important;
						padding-top: 70px !important;
						padding-bottom: 70px !important;
					}
				}
			</style>
		</head>

		<body style="width: 100%; -webkit-text-size-adjust: 100% !important; -ms-text-size-adjust: 100% !important; margin: 0; padding: 0;">

			<!-- /\/\/\/\/\/\/\/\/ START Inbox Preview Text /\/\/\/\/\/\/\/\/ -->
			<div style="display: none; width: 0px; height: 0px; min-height: 0px; overflow: hidden; font-size: 0px; line-height: 0px; color: #ffffff; mso-hide: all;">
				Mau bikin web pribadi atau toko online ?
			</div>
			<!-- /\/\/\/\/\/\/\/\/ END Inbox Preview Text /\/\/\/\/\/\/\/\/ -->

			<table align="center" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
				<tr>
					<!-- Change background color of email -->
					<td style="background-color: #73c2b4;">
						<table align="center" class="mobile-width" width="680" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; margin: 0 auto;">
							<tr>
								<!-- min-width necessary in order to prevent auto-sizing in Gmail app -->
								<td class="wrapper" style="padding-left: 20px; padding-right: 20px; padding-top: 45px; padding-bottom: 45px; min-width: 640px;">

									<!-- /\/\/\/\/\/\/\/\/ START Header /\/\/\/\/\/\/\/\/ -->
									<table class="mobile-width" width="640" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
										<tr>
											<td style="padding-top: 50px; padding-bottom: 50px; background-color: #ffffff;">
												<table class="mobile-width" width="640" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
													<tr>
														<td style="text-align: center;">
															<!-- Logo link back to your website -->
															<a href="http://demo.infomugi.com" target="_blank">
																<!-- Remember to add styles to img tags in order to style alt text -->
																<img src="" alt="Propel" width="136" height="30" style="vertical-align: top; border: 0 none; outline: none;" />
															</a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<!-- /\/\/\/\/\/\/\/\/ END Header /\/\/\/\/\/\/\/\/ -->

									<!-- /\/\/\/\/\/\/\/\/ START Hero /\/\/\/\/\/\/\/\/ -->
									<table class="mobile-width" width="640" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
										<tr>
											<td class="hero" background="" height="380" style="background-color: #292c34;">
						<!--[if gte mso 9]>
						<v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width: 640px; height: 380px;">
						<v:fill type="tile" src="img/hero-bg.jpg" color="#292c34" />
						<v:textbox inset="0,0,0,0">
						<![endif]-->
						<div>
							<table class="mobile-width" width="640" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
								<tr>
									<td valign="middle" class="mobile-width" height="380">
										<table class="mobile-width" width="640" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
											<tr>
												<!-- Hero headline goes here -->
												<td style="padding-left: 40px; padding-right: 40px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 35px; line-height: 47px; color: #ffffff; letter-spacing: -1px; text-align: center;">
												<?php $content ?>
												</td>
											</tr>
											<tr>
												<td style="padding-top: 25px; text-align: center;">
													<!-- Hero Button -->
													<table cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; display: inline-block;">
														<tr>
															<td style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background-color: #ef983a;">
																<a href="http://demo.infomugi.com" target="_blank" style="padding: 10px 40px; display: inline-block; border: 1px solid #ef983a; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 18px; line-height: normal; color: #ffffff; font-weight: bold; text-decoration: none;"><!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<![endif]-->Mau Lihat<!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--></a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
						<!--[if gte mso 9]>
						</v:textbox>
						</v:rect>
						<![endif]-->
					</td>
				</tr>
			</table>
			<!-- /\/\/\/\/\/\/\/\/ END Hero /\/\/\/\/\/\/\/\/ -->

			<!-- /\/\/\/\/\/\/\/\/ START Body Content /\/\/\/\/\/\/\/\/ -->
			<table class="mobile-width" width="640" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
				<tr>
					<td style="padding-left: 29px; padding-right: 29px; padding-top: 50px; padding-bottom: 60px; background-color: #ffffff;">
						<table class="mobile-width" width="582" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
							<tr>
								<td valign="top" style="padding-left: 11px; padding-right: 11px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 17px; line-height: 28px; color: #707582; text-align: center;">
									Ada jasa pembuatan website, company profile, toko online <BR> 
									game edukasi dan aplikasi multimedia:
								</td>
							</tr>
						</table>
						<table class="mobile-width" width="582" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
							<tr>
								<td valign="top">
									<table align="left" class="mobile-width" width="194" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
										<tr>
											<td valign="top" style="padding-left: 11px; padding-right: 11px; padding-top: 40px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 17px; line-height: 28px; color: #292c34; font-weight: bold; text-align: center;">
												Company Profile
												<div style="font-size: 12px; line-height: 12px; mso-line-height-rule: exactly;">&nbsp;</div>
												<!-- Button -->
												<table cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; display: inline-block;">
													<tr>
														<td style="-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
															<a href="http://demo.infomugi.com" target="_blank" style="padding: 8px 20px; display: inline-block; border: 1px solid #ef983a; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; line-height: normal; color: #ef983a; font-weight: bold; text-decoration: none;"><!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<![endif]-->Demo Website<!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--></a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<!--[if mso]></td><td valign="top"><![endif]-->
									<table align="left" class="mobile-width" width="194" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
										<tr>
											<td valign="top" style="padding-left: 11px; padding-right: 11px; padding-top: 40px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 17px; line-height: 28px; color: #292c34; font-weight: bold; text-align: center;">
												<div style="font-size: 12px; line-height: 18px; mso-line-height-rule: exactly;">&nbsp;</div>
												Toko Online
												<div style="font-size: 12px; line-height: 12px; mso-line-height-rule: exactly;">&nbsp;</div>
												<!-- Button -->
												<table cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; display: inline-block;">
													<tr>
														<td style="-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
															<a href="http://demo.infomugi.com" target="_blank" style="padding: 8px 20px; display: inline-block; border: 1px solid #ef983a; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; line-height: normal; color: #ef983a; font-weight: bold; text-decoration: none;"><!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<![endif]-->Demo Website<!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--></a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<!--[if mso]></td><td valign="top"><![endif]-->
									<table align="left" class="mobile-width" width="194" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
										<tr>
											<td valign="top" style="padding-left: 11px; padding-right: 11px; padding-top: 40px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 17px; line-height: 28px; color: #292c34; font-weight: bold; text-align: center;">
												<div style="font-size: 12px; line-height: 18px; mso-line-height-rule: exactly;">&nbsp;</div>
												Custom Web
												<div style="font-size: 12px; line-height: 12px; mso-line-height-rule: exactly;">&nbsp;</div>
												<!-- Button -->
												<table cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; display: inline-block;">
													<tr>
														<td style="-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
															<a href="http://demo.infomugi.com" target="_blank" style="padding: 8px 20px; display: inline-block; border: 1px solid #ef983a; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; line-height: normal; color: #ef983a; font-weight: bold; text-decoration: none;"><!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<![endif]-->Demo Website<!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--></a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<table class="mobile-width" width="582" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;">
							<tr>
								<td valign="top" style="padding-left: 11px; padding-right: 11px; padding-top: 40px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 17px; line-height: 28px; color: #707582; text-align: center;">
									Ada ratusan template siap untuk jadi website. <a href="http://demo.infomugi.com/jasa/promo" target="_blank" style="color: #73c2b4; font-weight: bold; border: 0 none; outline: none; text-decoration: none;">Lihat Ah..</a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<!-- /\/\/\/\/\/\/\/\/ END Body Content /\/\/\/\/\/\/\/\/ -->

			<!-- /\/\/\/\/\/\/\/\/ START Footer /\/\/\/\/\/\/\/\/ -->
			<table class="mobile-width" width="640" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;">
				<tr>
					<td style="padding-left: 40px; padding-right: 40px; padding-top: 30px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; line-height: 24px; color: #ffffff; text-align: center;">
						Email ini dikirim oleh <a href="mailto:infomugi@gmail.com" style="color: #ffffff; border: 0 none; text-decoration: none;">infomugi.com@gmail.com</a>. 
					</td>
				</tr>
			</table>
			<!-- /\/\/\/\/\/\/\/\/ END Footer /\/\/\/\/\/\/\/\/ -->

		</td>
	</tr>
</table>
</td>
</tr>
</table>

</body>
</html>