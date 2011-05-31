<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex" />
  <title>Template Test</title>
  <script src="jquery-1.4.4.min.js" type="text/javascript"></script>
  <script src="jquery.tmpl.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(document).ready(function() {
 
    var clientData = [
        { name: "Rey Bango", id: 1 },
        { name: "Mark Goldberg", id: 2 },
        { name: "Jen Statford", id: 3 }
    ];
 
$("#clientTemplate").tmpl(clientData).appendTo( "ul" );
 
});
  </script>
 
 <script id="clientTemplate" type="text/html">
    <li><a href="clients/${id}">${name}</a></li>
</script>
 
</head> 
 
<body> 
 
<ul></ul>
 
</body>
</html>
