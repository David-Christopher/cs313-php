var express = require('express');
var app = express();
var url = require('url');

//postgresql://[user[:password]@][netloc][:port][/dbname][?param1=value1&...]
//const connectionString = "postgres://ipjvnhzdqgbjpc:c6191de210058628ab6266e9f78222b3d8fd6e0bb0a684a266cfb5c3c323caa3@localhost:5432/stocks";

app.set('port', (process.env.PORT || 5000));
app.use(express.static(__dirname + '/public'));

// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/', function(request, response) {
  response.render('pages/index')
});

app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});

// https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=MSFT&interval=1min&apikey=S4VB8BHVZPYTDGFK

/**
 * Init Alpha Vantage with your API key.
 *
 * @param {String} key 
 *   Your Alpha Vantage API key.
 */

const alpha = require('alphavantage')({ key: 'S4VB8BHVZPYTDGFK' });

app.get('/getStock', function(request, response) {
	handleStock(request, response);
});	

function handleStock(request, response){

	var requestUrl = url.parse(request.url, true);

 	console.log("Query parameters: " + JSON.stringify(requestUrl.query));

 	var ticker = requestUrl.query.ticker; 

	alpha.data.intraday(ticker).then(data => {
  		response.send(data);
	});

}
