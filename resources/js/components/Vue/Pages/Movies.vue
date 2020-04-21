<template>
	<div class="col-lg-5 mx-auto">
		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" class="text-center">Movie</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th v-if="loading">Loading</th>
    </tr>
    <tr v-if="!loading" v-for="(n,index) in movies" :key="index">
      <th >{{index+1}}</th>
      <td class="text-center">
      	<router-link class="text-success" :to="/movies/+`${n.movie_id}`">
      		{{n.title}}
  		</router-link>
  		</td>
      
    </tr>
   </tbody>
</table>
	</div>
</template>

<script>
export default {

  name: 'Movies',

  data () {
    return {
		movies:{
			type:Object,
		},
    
    }
  },
  created(){
  	fetch('http://'+this.getHost()+'/v.1/api/movies',{
  		method:'GET'
  	}).then(
		response => response.json()
  	)
  	.then(data=>{this.movies = data}),
    this.loading = true;

  },
  mounted(){
    this.loading=false;    
    
  },
  methods:{
  	getHost(){
  		return location.host;
  	}
  }

}
</script>

