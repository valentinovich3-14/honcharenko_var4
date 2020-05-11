function getFilmsByCarrier(){
	$.ajax({
	  type: "GET",
	  url: "genre.php",
	  dataType: 'json',
	  success: function(result){
	  	var resultData = "";
	  	if (result.length !== undefined) {
	  		for (var i = 0; i < result.length; i++) {
			  	resultData += '<tr>';
				resultData += '<td>'+ result[i].title +'</td>'+'<td>'+ result[i].date +'</td>'; 
				resultData += '<td>'+ result[i].producer +'</td>';
				resultData += '<td><ul>';
				for (var j = 0; j < result[i].actors.length; j++) {
					resultData += '<li>'+ result[i].actors[j] +'</li>';
				}
				resultData += '</ul></td>';
				resultData += '<td><ul>';
				for (var k = 0; k < result[i].genre.length; k++) {
					resultData += '<li>'+ result[i].genre[k] +'</li>';
				}
				resultData += '</ul></td>';
				resultData += '<td>'+ result[i].country +'</td>'; 
				resultData += '</tr>';
			}
		}
	  	$('#carrier-res').html(resultData);
	  	
	  }
	});
}

function getFilmsByActor(){
	$.ajax({
	  type: "GET",
	  url: "actor.php",
	  data: {actor_film: $('[name="actor_film"]').val()},
	  dataType: 'json',
	  success: function(result){
	  	var resultData = "";
	  	if (result.length !== undefined) {
	  		for (var i = 0; i < result.length; i++) {
			  	resultData += '<li>' + result[i] + '</li>';
			}
		}
	  	$('#actor-res').html(resultData);

	  	localStorage.setItem('form2Result', JSON.stringify(result));
	  	localStorage.setItem('form2Data', $('#Form2').serialize());
	  }
	});
}


function getLocal2(e) {
	$('#actor-res').html('');
	var currentForm = $(e).parents('form');
	var result = JSON.parse(localStorage.getItem('form2Result'));
	var data = localStorage.getItem('form2Data');
	if (currentForm.serialize() === data) {
	  	var resultData = "";
	  	if (result.length !== undefined) {
	  		for (var i = 0; i < result.length; i++) {
			  	resultData += '<li>' + result[i] + '</li>';
			}
		}
	  	$('#actor-res').html(resultData);
	} else {
		alert("Данные с такими параметрами отсутствуют!");
	}
}


function getFilmsByDate(){
	$.ajax({
	  type: "GET",
	  url: "date.php",
	  dataType: 'json',
	  success: function(result){
	  	var resultData = "";
	  	if (result.length !== undefined) {
	  		for (var i = 0; i < result.length; i++) {
			  	resultData += '<tr>';
				resultData += '<td>'+ result[i].title +'</td>'+'<td>'+ result[i].date +'</td>'; 
				resultData += '<td>'+ result[i].producer +'</td>';
				resultData += '<td><ul>';
				for (var j = 0; j < result[i].actors.length; j++) {
					resultData += '<li>'+ result[i].actors[j] +'</li>';
				}
				resultData += '</ul></td>';
				resultData += '<td><ul>';
				for (var k = 0; k < result[i].genre.length; k++) {
					resultData += '<li>'+ result[i].genre[k] +'</li>';
				}
				resultData += '</ul></td>';
				resultData += '<td>'+ result[i].country +'</td>'; 
				resultData += '</tr>';
			}
		}
	  	$('#date-res').html(resultData);
	  }
	});
}