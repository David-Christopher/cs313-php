var express = require('express');
var app = express();
var url = require('url');

app.set('port', (process.env.PORT || 5000));

app.use(express.static(__dirname + '/public'));

// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/getRate', function(request, response) {
	handleMath(request, response);
});

app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});

function handleMath(request, response) {
	var requestUrl = url.parse(request.url, true);

	console.log("Query parameters: " + JSON.stringify(requestUrl.query));

	// TODO: Here we should check to make sure we have all the correct parameters

	var operation = requestUrl.query.operation;
	var weight = Number(requestUrl.query.weight);

	computeOperation(response, operation, weight);
}

function computeOperation(response, operation, weight) {
	operation = operation.toLowerCase();

	var result = 0;

	if (operation == "letters stamped") {
		if (weight < 1) {
			result = '$0.50';
		} else if (weight < 2) {
			result = '$0.71';
		} else if (weight < 3) {
			result = '$0.92';
		} else if (weight < 3.5) {
			result = '$1.13';
		} else {
			result = 'If weight is over 3.5, please try again and choose large envelope flats. Thank you!'
		}
		
	} else if (operation == "letters metered") {
		if (weight < 1) {
			result = '$0.47';
		} else if (weight < 2) {
			result = '$0.68';
		} else if (weight < 3) {
			result = '$0.89';
		} else if (weight < 3.5) {
			result = '$1.10';
		} else {
			result = 'If weight is over 3.5, please try again and choose large envelope flats. Thank you!'
		}	

	} else if (operation == "large envelopes flats") {
		if (weight < 1) {
			result = '$1.00';
		} else if (weight < 2) {
			result = '$1.21';
		} else if (weight < 3) {
			result = '$1.42';
		} else if (weight < 4) {
			result = '$1.63';	
		} else if (weight < 5) {
			result = '$1.84';
		} else if (weight < 6) {
			result = '$2.05';
		} else if (weight < 7) {
			result = '$2.26'; 
		} else if (weight < 8) {
			result = '$2.47';
		} else if (weight < 9) {
			result = '$2.68';
		} else if (weight < 10) {
			result = '$2.89';	
		} else if (weight < 11) {
			result = '$3.10';
		} else if (weight < 12) {
			result = '$3.31';
		} else {
			result = '$3.52'; 
		}

	} else if (operation == "first-class package service—retail") {
		if (weight < 4) {
			result = '$3.5';
		} else if (weight < 8) {
			result = '$3.75';
		} else if (weight < 9) {
			result = '$4.10';
		} else if (weight < 10) {
			result = '$4.45'; 
		} else if (weight < 11) {
			result = '$4.80';
		} else if (weight < 12) {
			result = '$5.15';
		} else {
			result = '$5.50'; 
		}
	} else {
		result = "We apologize for the inconvenience. Your entries are invalid. Please try again by entering a weight and choosing an shipping option. Thank you!"
	}

	// Set up a JSON object of the values we want to pass along to the EJS result page
	var params = {operation: operation, weight: weight, result: result};

	// Render the response, using the EJS page "result.ejs" in the pages directory
	// Makes sure to pass it the parameters we need.
	response.render('views/pages/result', params);

}