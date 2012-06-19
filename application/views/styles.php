<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/css/base.css">
  <style>
  	td{
  		padding:10px;
  	}
  </style>
  <script src="/js/libs/modernizr-2.5.0.min.js"></script>
</head>
<body style="padding:20px;">
	<table>
		<tr>
			<td>
				<img src="/img/qmax_logo.png" />
			</td>
		</tr>
		<tr>
			<td><h1>H1 heading</h1></td>
		</tr>
		<tr>
			<td><h2>H2 heading</h2></td>
		</tr>
		<tr>
			<td><h3>H3 heading</h3></td>
		</tr>
		<tr>
			<td><h4>H4 heading</h4></td>
		</tr>
		<tr>
			<td><input type="text" placeholder="Input type text" /> <input type="button" value="Continuar" /></td>
		</tr>
		<tr>
			<td><input type="text" value="Input type text" /></td>
		</tr>
		<tr>
			<td><input type="password" value="1234567" /></td>
		</tr>
		<tr>
			<td><input type="button" value="Button" /></td>
		</tr>
		<tr>
			<td><input type="submit" value="Submit" /></td>
		</tr>
		<tr>
			<td>
				<textarea>alo alo?</textarea>
			</td>
		</tr>

		<tr>
			<td>
				<fieldset>
					<legend>Fieldset</legend>
					<table>
						<tr>
							<td class="label_m"><label>Nombre:</label></td>
							<td><input type="text" placeholder="Nombre" /></td>
							<td class="label_m"><label>Apellido:</label></td>
							<td><input type="text" placeholder="Apellido" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Email:</label></td>
							<td><input type="text" placeholder="nombre@apellido.com" /></td>
							<td class="label_m"><label>Teléfono:</label></td>
							<td><input type="text" placeholder="Teléfono" /></td>
						</tr>
						<tr>
							<td class="label_m"><label>Herramienta:</label></td>
							<td>
								<select>
									<option value="">Martillo</option>
									<option value="">Destornillador</option>
									<option value="">Otra cosa</option>
								</select>
							</td>
							<td class="label_m"><label>Cosa favorita:</label></td>
							<td>
								<select>
									<option value="">Martillo</option>
									<option value="">Destornillador</option>
									<option value="">Otra cosa</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="label_t"><label>Comentarios:</label></td>
							<td colspan="3">
								<textarea>Escriba sus comentarios aquí.</textarea>
							</td>
						</tr>
						<tr>
							<td class="label_h"></td>
							<td><input type="button" value="Guardar" /></td>
							<td class="label_h"></td>
							<td></td>
						</tr>
					</table>
				</fieldset>
			</td>
		</tr>
	</table>
	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<!-- scripts concatenated and minified via build script -->
	<script src="/js/plugins.js"></script>
	<script src="/js/script.js"></script>
	<!-- end scripts -->

	<script>
		/*  
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
		*/
	</script>
</body>
</html>