<?php

include_once "Crud.php";


class MoviesController{

    private $crud;

    public function __construct(){

        $this->crud = new Crud();

    }



    public function addMovie(){

        $movie_data = [

            'mv_title' => $_POST['mv_title'],
            'mv_year_released' => $_POST['mv_year_released']
        ];

       $movie_id = $this->crud->create($movie_data, 'movies');

       $movie_genres = isset($_POST['genres']) ? $_POST['genres']: "";
       
       $this->createMovieGenres($movie_genres, $movie_id);

    }


    public function createMovieGenres($movie_genres,$movie_id){
   
        foreach($movie_genres as $key => $genre_id){

                $movie_genres_arr = [

                    'mvg_ref_genre' => $genre_id,
                    'mvg_ref_movie' => $movie_id
                ];

                $this->crud->create($movie_genres_arr,'mv_genres');
            }
            
    }


    public function getMovies(){

        $query = "SELECT mv_id, mv_title,img_path, gnr_name, GROUP_CONCAT(gnr_name) genres,mv_year_released
                    FROM movies
                    JOIN mv_genres on mvg_ref_movie = mv_id
                    JOIN genres on mvg_ref_genre = gnr_id";
         
                   

    
        $results = $this->crud->read($query);
        return  $results;

    }







   }
?>