import './bootstrap';
import $ from "jquery";

function populateMovieList(movies) {
  for (let m in movies) {
    let movieItem = showMovie(movies[m]);
    $('#movies-list > .row').append(movieItem);
  }
}

function showMovie(movie) {
  let movieItem = '<div class="col movie-item"><div class="border rounded shadow-sm"><div class="container m-2"><div class="row"><div class="col-4 poster" style="background-image: url(\'' + movie.poster + '\');">&nbsp;</div><div class="col-8"><div class="title"><strong>' + movie.title + '</strong></div><div class="rating mb-5">' + movie.rating + '</div><div class="artists mb-5"><strong>Director:</strong> ...</div><div class="buttons-row d-flex justify-content-end"><a href="' + route('movies.show', movie.id) + '" class="btn btn-primary">Read more</a></div></div></div></div></div></div>';
  return movieItem;
}

function showErrorLoading() {
  console.log('Could not load list');
}


$(function () {
  const url = route('movies.index');
  console.log(url);



$.ajax({
    url: url,
    type:'get',
    dataType:'json',
    success:function (response) {
        populateMovieList(response.data);
    },
    error: showErrorLoading
})    
});