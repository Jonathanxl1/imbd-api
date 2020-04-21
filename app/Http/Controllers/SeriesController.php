<?php

namespace App\Http\Controllers;

use App\{series,directors,actors};
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(series $series)
    {
         return $series->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, series $series)
    {
                $serie = $request->all();


                
                $id_serie = $series->insertGetId([

                    "title" => $serie['title'],
                    "release" => $serie['release'],
                    "category" => $serie['category'],
                    "rating" => $serie['rating'],
                    "created_at"=>date('Y-m-d G:i:s'),
                    "updated_at"=>date('Y-m-d G:i:s')
                    
                ]);
                    
                 $director = new directors();   
                 $id_director = $director->insertGetId([
                       "name"=>$serie['director'],
                       "created_at"=>date('Y-m-d G:i:s'),
                       "updated_at"=>date('Y-m-d G:i:s') 
                ]);
                
                $actor =  new actors();
                $id_actor = $actor->insertGetId([
                       "name"=>$serie['actors'],
                       "created_at"=>date('Y-m-d G:i:s'),
                       "updated_at"=>date('Y-m-d G:i:s') 
                ]);
                

                $series->directors()->attach($id_director,["serie_id" => $id_serie]);
                $series->actors()->attach($id_actor,["serie_id"=>$id_serie]);
                

                 return response('Serie Created',201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\series  $series
     * @return \Illuminate\Http\Response
     */
    public function show($id,series $series)
    {
         $serie = $series::find($id);
        if($serie){
          return $serie;
        }else{
          return response()->json('[]',204);
        }
         
         // return $serie;
    }

    public function search($key,$value=null,series $series){

          if(in_array($key,['title','release','category','rating'])){
           
             $search = $series->where($key,'like','%'.$value.'%')->get();

             
               if($search->isEmpty()){
                  
                  return response()->json("Not Found",404);
                

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
     * @param  \App\series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, series $series,$id)
    {
              $data = $request->all();

              $serie=$series::findORfail($id);
            
               
              
              $serie->title= $data['title'];
              $serie->release= $data['release'];
              $serie->category= $data['category'];
              $serie->rating= $data['rating'];
              $serie->save();

              $actors = new actors();
              $actor_id = $serie->actors[0]->relationship->actor_id;
              $actor = $actors::findORfail($actor_id);
              $actor->name= $data['actors'][0]['name'];
              $actor->save();
                
              $directors = new directors();
              $director_id = $serie->directors[0]->relationship->director_id;
              $director = $directors::findORfail($director_id);
              $director->name= $data['directors'][0]['name'];
              $director->save();


                
                return response('Serie Updated',204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(series $series,$id)
    {
        $serie = $series::findORfail($id);
       $serie->actors()->detach();
       $serie->directors()->detach();
      
       $serie->delete();

        return response()->json('Resource Deleted',200);
    }
}
