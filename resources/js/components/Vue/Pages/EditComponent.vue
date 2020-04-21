<template>

	<div class="col-lg-5 mx-auto">
      <div class="alert alert-success mt-3" v-if="state" role="alert">
        {{path}} Updated! 
      </div>


		<form @:submit.prevent :action="'http://'+getHost()+`/v.1/api/`+path+'/'+id" method="POST">
			<input type="hidden" name="_method" value="PUT">

  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" name="title" @input="media.title = $event.target.value"  :value=" media.title">

    <label for="release">Release:</label>
    <input type="date" class="form-control" name="release" @input="media.release = $event.target.value" :value="media.release">

    <label for="category">Category:</label>
    <select  @input="media.category = $event.target.value" name="category" class="form-control">
    	<option  
		v-for="category in categories" 
     	:value="category != media.category ?  category : media.category"
     	:selected="media.category == category"  
    	 >
    		{{category != media.category ? category : media.category}}
    	</option>
    	
    	
    </select>

    <label for="rating">Rating:</label>
    <input type="number" class="form-control" name="rating" min="1" max="5" @input="media.rating = $event.target.value" :value=" media.rating">

    <label for="actors">Actors:</label>
    <input type="text" class="form-control" name="actors" @input="media.actors[0].name = $event.target.value" :value="  media.actors[0].name">

    <label for="directors">Directors:</label>
    <input type="text" class="form-control" name="director" @input="media.directors[0].name = $event.target.value"  :value=" media.directors[0].name">
  </div>
  <div class="row ">
  	<button class="btn btn-success mx-auto col" type="button" @click="OnSubmit()" >Update</button>
  </div>
  
</form>
	</div>
</template>

<script>
export default {

  name: 'EditComponent',

  data () {
    return {
    	media:{
    		type:Array
    	},
    	host:{
    		type:String
    	},
    	path:this.$route.params.path,
    	id:this.$route.params.id,
    	categories:['Action','Adventure','Comedy','Drama','Terror','Romance','Other'],
    	info:{
    		type:Array
    	},
      state:false


    }
  },
  created(){
  	
  	fetch('http://'+this.getHost()+'/v.1/api/'+this.path+'/'+this.id,{
  		method:'GET',
  	}).then(response => response.json())
  	.then(data => this.media = data)
  },
  methods:{
  	getHost(){
  		return location.host;
  	},
  	OnSubmit(){
  		this.info=this.media;
  		fetch('http://'+this.getHost()+'/v.1/api/'+this.path+'/'+this.id,
  		{
  			method:'PUT',
  			body:JSON.stringify(this.info),
  			headers:{
  						'Content-Type':'application/json'
  				}
  	}).then(response =>response.status)
  			.then(()=>{
  				 this.state=true
  			})

  	}
  	
  },
  
  


}
</script>

