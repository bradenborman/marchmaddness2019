<!DOCTYPE html>
<html>
<head>
    <title>JSSample</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

	<div id="body"></div>



<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://api.fantasydata.net/v3/cbb/stats/2019/Players/MISSR');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Ocp-Apim-Subscription-Key' => '04a1aa44805543669cf168b15f156581',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_GET);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

?>




<script type="text/javascript">
  /*
    $(function() {
        var params = {
            // Request parameters
        };
      
        $.ajax({
            url: "https://api.fantasydata.net/v3/cbb/stats/JSON/PlayerSeasonStatsByTeam/2019/MISSR?" + $.param(params),
            beforeSend: function(xhrObj){
                // Request headers
                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key","04a1aa44805543669cf168b15f156581");
            },
            type: "GET",
            // Request body
            data: "{body}",
        })
        .done(function(data) {
                   console.log(data);
                      var x = ""            
           data.forEach(function(element) {
		  console.log(element);
		  
		 x += element.Name+ "<br>"
	   });
            
            
            $('#body').html(x)
        })
        .fail(function() {
            alert("error");
        });
    }); */
</script>





</body>
</html>