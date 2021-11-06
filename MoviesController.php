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







   }








}
?>