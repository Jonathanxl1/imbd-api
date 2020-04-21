<template>
	
		<div class="col-lg-5 mx-auto mb-5 mt-5">
				<h3 class="h3 text-center">Add Movies/Series</h3>

		      <div class="alert alert-success mt-3" v-if="state" role="alert">
		        Added! 
		    </div>


		<form @:submit.prevent :action="'http://'+getHost()+`/v.1/api/`+medio" method="POST">
				

		  <div class="form-group">
		  		<label for="medio">Medio</label>
		  		<select name="" class="form-control" v-model="medio"	>
		  			<option value="series">Series</option>
		  			<option value="movies">Movies</option>
		  		</select>
		    <label for="title">Title:</label>
		    <input type="text" class="form-control" name="title" v-model="media.title">

		    <label for="release">Release:</label>
		    <input type="date" class="form-control" name="release" v-model="media.release">

		    <label for="category">Category:</label>
		    <select  v-model="media.category" name="category" class="form-control">
		    	<option  
				v-for="category in categories" 
		     	:value="category"		     	  
		    	 >
		    		{{category }}
		    	</option>
		    	
		    	
		    </select>

		    <label for="rating">Rating:</label>
		    <input type="number" class="form-control" name="rating" min="1" max="5" v-model="media.rating">

		    <label for="actors">Actors:</label>
		    <input type="text" class="form-control" name="actors" v-model="media.actors">

		    <label for="directors">Directors:</label>
		    <input type="text" class="form-control" name="director" v-model="media.director">
		  </div>
		  <div class="row ">
		  	<button class="btn btn-success mx-auto col" type="button" @click="OnSubmit()" >Add</button>
		  </div>
		  
		</form>
			</div>
	
	
</template>

<script>
export default {

  name: 'Add',

  data () {
    return {

		medio:'series',
    	media:{
    		type:Object
    	},
    	state:false,
    	categories:['Action','Adventure','Comedy','Drama','Terror','Romance','Other'],

    	
    	

    }
  },
  methods:{
  	OnSubmit(){
   		fetch('http://'+this.getHost()+'/v.1/api/'+this.medio,
  		{
  			method:'POST',
  			body:JSON.stringify(this.media),
  			headers:{
  						'Content-Type':'application/json'
  				}
  	}).then(response =>response.status)
  			.then(()=>{
  				 this.state=true
  			})

  	},
  	getHost(){
		return location.host;
  	}
  }
}
</script>

