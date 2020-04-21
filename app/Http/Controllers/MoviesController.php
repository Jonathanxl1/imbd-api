<?php

namespace App\Http\Controllers;

use App\{movies,actors,directors};
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(movies $movies)
    {
        return $movies->all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,movies $movies)
    {
                      
                $movie = $request->all();
                
                $id_movie = $movies->insertGetId([

                    "title" => $movie['title'],
                    "release" => $movie['release'],
                    "category" => $movie['category'],
                    "rating" => $movie['rating'],
                    "created_at"=>date('Y-m-d G:i:s'),
                    "updated_at"=>date('Y-m-d G:i:s')
                    
                ]);
                    
                 $director = new directors();   
                 $id_director = $director->insertGetId([
                       "name"=>$movie['director'],
                       "created_at"=>date('Y-m-d G:i:s'),
                       "updated_at"=>date('Y-m-d G:i:s') 
                ]);
                
                $actor =  new actors();
                $id_actor = $actor->insertGetId([
                       "name"=>$movie['actors'],
                       "created_at"=>date('Y-m-d G:i:s'),
                       "updated_at"=>date('Y-m-d G:i:s') 
                ]);
                

                $movies->directors()->attach($id_director,["movie_id" => $id_movie]);
                $movies->actors()->attach($id_actor,["movie_id"=>$id_movie]);
                

                 return response('Movie Created',201);

           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show($id,movies $movies)
    {
        
         $movie = $movies::findORfail($id);
         return $movie;
                    
    }

    public function search($key,$value=null,movies $movies){

          if(in_array($key,['title','release','category','rating'])){
           
             $search = $movies->where($key,'like','%'.$value.'%')->get();

               if($search->isEmpty()){
                  
                  return response()->json("Not Found o Not Exits resource",404);
                

               }else{
                  return $search;
                  
               }
     
          }else{
            
            return response()->json("Not Found o Not Exits resource",404);
          }
          
            

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movies $movies,$id)
    {
              $data = $request->all();

              $movie=$movies::findORfail($id);
                
            
              
              $movie->title= $data['title'];
              $movie->release= $data['release'];
              $movie->category= $data['category'];
              $movie->rating= $data['rating'];
              $movie->save();

              $actors = new actors();
              $actor_id = $movie->actors[0]->relationship->actor_id;
              $actor = $actors::findORfail($actor_id);
              $actor->name= $data['actors'][0]['name'];
              $actor->save();
                
              $directors = new directors();
              $director_id = $movie->directors[0]->relationship->director_id;
              $director = $directors::findORfail($director_id);
              $director->name= $data['directors'][0]['name'];
              $director->save();


                
                return response('Movie Updated',204);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,movies $movies)
    {
       $movie = $movies::findORfail($id);
       $movie->actors()->detach();
       $movie->directors()->detach();
       $movie->delete();


      // $movie->foreign('movie_id')->references('id')->on('products')->onDelete('cascade')

        return response('Resource Deleted',200);
    }
}
